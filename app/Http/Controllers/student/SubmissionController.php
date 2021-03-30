<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Assignment;
use App\Assignment_question;
use App\Batch_detail;
use App\Submission;
use App\Studentbatch;




class SubmissionController extends Controller
{
    public function submissionpage(){

        $user = Auth::user();
        $studentbatch = Studentbatch::select('batch_id')->where('enrollment', $user->email )->where( 'is_deleted', '0' )->get()->toarray();

        for($i = 1  ; $i < count($studentbatch) ; $i++){

            // foreach($studentbatch as $bid){

                $studentassignmentdetail = Assignment::select('*')->where( 'batch_id', $studentbatch )
                ->where( 'is_deleted', '0' )->get();



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

        return view('student.submitassignment' , compact('user','studentassignmentdetail'));
    }

    public function showassignmentquestion(Request $req){

        $user = Auth::user();

        $createdassignmentquestion = Assignment_question::select('*')->where( 'assignment_id', $req->id )->where( 'is_deleted', '0' )->get();

        return view('student.viewassignmentquestions' , compact('user','createdassignmentquestion'));
    }


    public function submitquestion(Request $req){

        $user = Auth::user();

        $createdassignmentquestion = Assignment_question::select('*')->where( 'assignment_id', $req->id )->where( 'is_deleted', '0' )->get();

        return view('student.submitquestion' , compact('user','createdassignmentquestion'));
    }
}
