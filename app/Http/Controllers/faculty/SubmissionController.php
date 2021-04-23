<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Assignment;
use App\Assignment_question;
use App\Batch_detail;
use App\Submission;
use App\Studentbatch;
use File;
use Response;


class SubmissionController extends Controller
{
    public function viewassignmentquestions(Request $req)
    {

        $Assignment_question = Assignment_question::select('*')->where('assignment_id', $req->id)->where('is_deleted', '0')->get();

        return view('faculty/assignment_questions', compact('Assignment_question'));
    }

    public function viewsubmission(Request $req)
    {
        $Assignment_question = Assignment_question::select('questions')->where('id', $req->id)->where('is_deleted', '0')->first();

        $Submitted_Assignment_question = Submission::select('*')->where('question_id', $req->id)->where('is_deleted', '0')->get();

        return view('faculty/view_submission', compact('Submitted_Assignment_question', 'Assignment_question'));
    }


    public function acceptsubmission(Request $req)
    {
        // dd($req);

        Submission::where('id', $req->id)->update(["status" => 'A']);

        return redirect()->back();
        // return response()->json(['success'=>'Ajax request submitted successfully']);
    }


    public function rejectsubmission(Request $req)
    {
        // dd($req);

        Submission::where('id', $req->id)->update(["status" => 'R']);
        Submission::where('id', $req->id)->update(["is_deleted" => '1']);

        return redirect()->back();
        // return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
