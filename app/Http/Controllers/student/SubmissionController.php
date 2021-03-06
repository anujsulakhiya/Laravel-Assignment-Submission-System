<?php

namespace App\Http\Controllers\student;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Assignment;
use App\Assignment_question;
use App\Batch_detail;
use App\Submission;
use App\Studentbatch;
use Carbon\Carbon;


class SubmissionController extends Controller
{
    public function submissionpage(Request $req)
    {
        $user = Auth::user();
        $date = Carbon::now();
        //Get date and time
        $today = $date->toDateTimeString();
        // dd($today);
        $batchassignmentdetail = Assignment::select('*')
            ->where('batch_id', $req->id)
            ->where('is_deleted', '0')->get();
        return view('student.submit_assignment', compact('user', 'batchassignmentdetail' , 'today'));
    }

    public function old_submissions(Request $req)
    {
        $user = Auth::user();
        $date = Carbon::now();
        //Get date and time
        $today = $date->toDateTimeString();
        // dd($today);
        $batchassignmentdetail = Assignment::select('*')
            ->where('batch_id', $req->id)
            ->where('is_deleted', '0')->get();
        return view('student.view_submitted_assignment', compact('user', 'batchassignmentdetail' , 'today'));
    }

    public function showoldassignmentquestion(Request $req)
    {

        $user = Auth::user();


        $createdassignmentquestion = Assignment_question::select('*')->where('assignment_id', $req->id)->where('is_deleted', '0')->get();

        $submitted = Submission::select('question_id','qanswer','filename', 'status')->where('enrollment', $user->email)->where('assignment_id', $req->id)->get();

        // $submitted1 = Assignment_question::select('Assignment_question.*' , 'Submission.question_id','Submission.qanswer','Submission.filename', 'Submission.status')
        // ->join('Submission', 'Submission.question_id', '=', 'Assignment_question.id')
        // // ->join('Submission', 'Submission.enrollment', '=', 'Assignment_question.email')
        // ->where('email', $user->email)->get();

        // $submitted1 =

        // dd($submitted);

        // $submitted =  explode(',', $s);

        // dd($submitted);

        return view('student.old_submisstion_detail', compact('user', 'createdassignmentquestion', 'submitted'));
    }


    public function showassignmentquestion(Request $req)
    {

        $user = Auth::user();

        $createdassignmentquestion = Assignment_question::select('*')->where('assignment_id', $req->id)->where('is_deleted', '0')->get();

        $submitted = Submission::select('question_id', 'status')->where('enrollment', $user->email)->where('assignment_id', $req->id)->where('is_deleted', '0')->get();

        // $submitted =  explode(',', $s);

        // dd($submitted);

        return view('student.view_assignment_questions', compact('user', 'createdassignmentquestion', 'submitted'));
    }


    public function submitquestion(Request $req)
    {



        $user = Auth::user();

        $exists = Submission::select('status')->where('question_id' , $req->id)->where('status' , 'p')->first();

        if($exists == null){
            $exists = FALSE;
        }else{
            $exists = TRUE;
        }
        // dd($exists);
        $createdassignmentquestion = Assignment_question::select('*')->where('id', $req->id)->where('is_deleted', '0')->get();

        return view('student.submit_question', compact('user', 'createdassignmentquestion' , 'exists'));

    }

    public function submitanswer(Request $req)
    {


        // dd();
        $user = Auth::user();

        $validator = Validator::make($req->all(), [
            'qanswer' => 'required | min:50',
        ]);

        if ($validator->fails()) {

            return view('student.submit_question')->withErrors($validator);
        }

        $file = $req->file('myfile');

        $originalfile = $file->hashName();

        // dd($originalfile);

        // $filename = $user->email . time() . '.' . $file->getClientOriginalExtension();

        // $file = $filename;

        // dd($file);

        Storage::putFile('public', $req->file('myfile'));

        // if ($req->hasFile('myfile')) {

        //     $fileName = time() . '.' . $req->file()->extension();

        //     $req->file()->move(public_path('uploads'), $fileName);
        // }

        $Submission = new Submission;
        $Submission->name = $user->name;
        $Submission->enrollment = $user->email;
        $Submission->assignment_id = $req->assignment_id;
        $Submission->question_id = $req->question_id;
        $Submission->qanswer   = $req->qanswer;
        $Submission->filename  =  $originalfile;
        $Submission->status    = 'P';
        $Submission->save();
        // }

        // $createdassignmentquestion = Assignment_question::select('*')->where('assignment_id', $req->assignment_id)->where('is_deleted', '0')->get();

        // return redirect()->back()   ;
        // return redirect('viewassignmentquestions/'.$Submission->assignment_id);
        // return view('student.submitassignment', compact('user'));

        // $studentbatch = Studentbatch::select('Studentbatches.batch_id','Studentbatches.creater_email', 'Batch_details.batch_name' , 'users.name')->join('Batch_details', 'Batch_details.id', '=', 'Studentbatches.batch_id')->join('users', 'users.email', '=', 'Studentbatches.creater_email')->where('enrollment', $user->email)->where('Batch_details.is_deleted', '0')->where('Batch_details.status', 'Active')->get();

        // echo "<script>";
        // echo "page_name = /submitassignment;";
        // echo "alert(page_name);";
        // echo "</script>";


        return redirect()->back()->with('msg' , 'Submitted Successfully');

        // return $this->viewmybatched();
        // return view('student.my_submission', compact('studentbatch'));
        // return view('student.submit_question')->with('msg' , 'Submitted Successfully');

        // return $this->submitquestion($req);

        // return redirect('submitassignment');
    }

    public function viewmybatched()
    {

        // dd('1');
        $user = Auth::user();

        $studentbatch = Studentbatch::select('Studentbatches.batch_id','Studentbatches.creater_email', 'Batch_details.batch_name' , 'users.name')->join('Batch_details', 'Batch_details.id', '=', 'Studentbatches.batch_id')->join('users', 'users.email', '=', 'Studentbatches.creater_email')->where('enrollment', $user->email)->where('Batch_details.is_deleted', '0')->where('Batch_details.status', 'Active')->get();

        $assignment_count =  array();
        $assignment_count = array_fill(0, $studentbatch->count(), 0);

        $i = 0;

        foreach ($studentbatch as $batch) {

            $assignment_count[$i] = Assignment::where('batch_id', $batch->batch_id)->get()->count();
            $i++;
        }
        // dd($assignment_count);
        return view('student.my_submission', compact('studentbatch' , 'assignment_count'));
    }

    public function viewmyoldbatched()
    {
        $user = Auth::user();

        $studentbatch = Studentbatch::select('Studentbatches.batch_id','Studentbatches.creater_email', 'Batch_details.batch_name' , 'users.name')->join('Batch_details', 'Batch_details.id', '=', 'Studentbatches.batch_id')->join('users', 'users.email', '=', 'Studentbatches.creater_email')->where('enrollment', $user->email)->where('Batch_details.is_deleted', '0')->get();

        $assignment_count =  array();
        $assignment_count = array_fill(0, $studentbatch->count(), 0);

        $i = 0;

        foreach ($studentbatch as $batch) {

            $assignment_count[$i] = Assignment::where('batch_id', $batch->batch_id)->get()->count();
            $i++;
        }
        return view('student.old_submissions', compact('studentbatch' , 'assignment_count'));
    }

    public function viewmysubmission()
    {

        $user = Auth::user();

        $mysubmission = Submission::select('*')->where('enrollment', $user->email)->get();
        // dd($mysubmission);

        // $assignment_detail = Assignment::select('assignment_name')->where('id' , $mysubmission->assignment_id)->get();

        return view('student.my_submission', compact('mysubmission', 'assignment_detail'));
    }
}
