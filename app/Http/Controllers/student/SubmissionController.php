<?php

namespace App\Http\Controllers\student;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Assignment;
use App\Assignment_question;
use App\Batch_detail;
use App\Submission;
use App\Studentbatch;




class SubmissionController extends Controller
{
    public function submissionpage()
    {

        $user = Auth::user();
        $studentbatch = Studentbatch::select('batch_id')->where('enrollment', $user->email)->where('is_deleted', '0')->get()->toarray();

        for ($i = 1; $i < count($studentbatch); $i++) {

            // foreach($studentbatch as $bid){

            $studentassignmentdetail = Assignment::select('*')->where('batch_id', $studentbatch)
                ->where('is_deleted', '0')->get();



            // }


        }

        // foreach($studentbatch as $bid){

        // $studentassignmentdetail = Assignment::select('*')->where( 'batch_id', $bid->batch_id )
        // ->where( 'is_deleted', '0' )->get();

        // }

        // $studentassignmentdetail = array_map(function ($studentbatch){

        //     dd($studentbatch);

        //     $studentassignmentdetail = Assignment::select('*')->where( 'batch_id', $studentbatch->batch_id )
        //             ->where( 'is_deleted', '0' )->get();
        //     return $studentassignmentdetail;

        // }, $studentbatch);


        // dd($studentassignmentdetail);

        return view('student.submitassignment', compact('user', 'studentassignmentdetail'));
    }

    public function showassignmentquestion(Request $req)
    {

        $user = Auth::user();

        $createdassignmentquestion = Assignment_question::select('*')->where('assignment_id', $req->id)->where('is_deleted', '0')->get();

        $submitted = Submission::select('question_id','status')->where('enrollment', $user->email)->where('assignment_id', $req->id)->where('is_deleted','0')->get();

        // $submitted =  explode(',', $s);

        // dd($submitted);

        return view('student.viewassignmentquestions', compact('user', 'createdassignmentquestion' , 'submitted'));
    }


    public function submitquestion(Request $req)
    {

        $user = Auth::user();

        $createdassignmentquestion = Assignment_question::select('*')->where('id', $req->id)->where('is_deleted', '0')->get();

        return view('student.submitquestion', compact('user', 'createdassignmentquestion'));
    }

    public function submitanswer(Request $req)
    {

        $req->validate(['qanswer' => ['required', 'min:50']], ['question_id' => 'required']);

        $user = Auth::user();

        $file = $req->file('myfile');

        $filename = $user->email . time() . '.' . $file->getClientOriginalExtension();

        Storage::putFile('uploads', $req->file('myfile'));

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
        $Submission->filename  =  $filename;
        $Submission->status    = 'P';
        $Submission->save();
        // }

        // $createdassignmentquestion = Assignment_question::select('*')->where('assignment_id', $req->assignment_id)->where('is_deleted', '0')->get();

        // return redirect()->back()   ;
        // return redirect('viewassignmentquestions/'.$Submission->assignment_id);
        // return view('student.submitassignment', compact('user'));
        return redirect('submitassignment');
    }
}
