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

        $createdassignmentquestion = Assignment_question::select('*')->where('id', $req->id)->where('is_deleted', '0')->get();

        return view('student.submit_question', compact('user', 'createdassignmentquestion'));
    }

    public function submitanswer(Request $req)
    {
        dd($req->all());
        // return ;


        $req->validate(['qanswer' => ['required', 'min:50']], ['question_id' => 'required']);

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
        return redirect('submitassignment');
    }

    public function viewmybatched()
    {
        $user = Auth::user();

        $studentbatch = Studentbatch::select('Studentbatches.batch_id','Studentbatches.creater_email', 'Batch_details.batch_name' , 'users.name')->join('Batch_details', 'Batch_details.id', '=', 'Studentbatches.batch_id')->join('users', 'users.email', '=', 'Studentbatches.creater_email')->where('enrollment', $user->email)->get();

        return view('student.my_submission', compact('studentbatch'));
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
