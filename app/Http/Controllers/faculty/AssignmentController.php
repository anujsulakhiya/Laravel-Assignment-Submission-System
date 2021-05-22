<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\Assignment;
use App\Assignment_question;
use App\Batch_detail;
use App\Studentbatch;
use App\Submission;

class AssignmentController extends Controller
{

    public function get_assignment_detail($id)
    {

        $user = Auth::user();
        $createdassignmentdetail = Assignment::select('*')
            ->where('email', $user->email)
            ->where('id', $id)->where('is_deleted', '0')->get();

        return $createdassignmentdetail;
    }

    public function get_assignment_question_detail($id)
    {

        $user = Auth::user();
        $createdassignmentquestion = Assignment_question::select('*')
            ->where('email', $user->email)
            ->where('assignment_id', $id)->where('is_deleted', '0')->get();

        return $createdassignmentquestion;
    }




    public function createassignmentpage()
    {
        // dd($this->user_email);
        $user = Auth::user();
        $batchdetail = Batch_detail::select('id', 'batch_name')->where('creater_email', $user->email)->where('is_deleted', '0')->get();
        return view('faculty.create_assignment', compact('user', 'batchdetail'));
    }

    public function autocomplete(Request $request)

    {

        $data = Batch_detail::select("batch_name")

            ->where("batch_name", "LIKE", "%{$request->input('query')}%")

            ->get();

        return response()->json($data);
    }


    public function viewperticulerbatch(Request $req)
    {

        $user = Auth::user();
        $batch_name = Batch_detail::select('batch_name')
            ->where('creater_email', $user->email)->where('id', $req->batch_id)->get();
        return view('faculty.create_assignment', compact('user', 'batch_name'));
    }

    public function viewbatchassignmentdetails(Request $req)
    {
        // dd($req->all());
        $user = Auth::user();

        $createdassignmentdetail = $this->get_assignment_detail($req->id);
        $createdassignmentquestion =  $this->get_assignment_question_detail($req->id);

        return view('faculty.create_assignment_details', compact('createdassignmentdetail', 'createdassignmentquestion'));
    }

    public function createassignment(Request $req)
    {

        $assignmentdetail = new Assignment;
        $assignmentdetail->email = $req->email;
        $assignmentdetail->batch_id = $req->batch_id;
        $assignmentdetail->assignment_name = $req->assignment_name;
        $assignmentdetail->subject_name  = $req->subject_name;
        $assignmentdetail->description  = $req->description;
        $assignmentdetail->last_submission_date = $req->last_date;
        $assignmentdetail->save();

        foreach ($req->questions as $question) {

            if (!empty($question)) {

                $assignmentquestion = new Assignment_question;
                $assignmentquestion->assignment_id = $assignmentdetail->id;
                $assignmentquestion->email = $req->email;
                $assignmentquestion->questions  = $question;
                $assignmentquestion->save();
            }
        }
        $user = Auth::user();

        $createdassignmentdetail = $this->get_assignment_detail($assignmentdetail->id);
        $createdassignmentquestion =  $this->get_assignment_question_detail($assignmentdetail->id);

        return view('faculty.create_assignment_details', compact('createdassignmentdetail', 'createdassignmentquestion'));
    }

    public function update_assignment(Request $req)
    {
        Assignment::where('id', $req->id)->update($req->only([
            'subject_name', 'assignment_name',
            'last_submission_date', 'description'
        ]));
        return $this->viewbatchassignmentdetails($req);
    }

    public function update_questions(Request $req)
    {
        $update_questions = $req->input('questions');
        $questions_id = $req->input('question_id');

        $i = '0';
        foreach ($update_questions as $question) {

            dd($questions_id[$i]);

            $u_question = Assignment_question::find($questions_id[$i]);
            $u_question->questions = $question;
            $u_question->save();
            $i++;
        }
    }

    public function createassignmentdetails()
    {

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id', 'batch_name')->where('creater_email', $user->email)->where('is_deleted', '0')->get();
        return view('faculty.create_assignment_details', compact('user', 'batchdetail'));
    }


    public function viewmyassignment()
    {

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id', 'batch_name')->where('creater_email', $user->email)->where('is_deleted', '0')->get();

        $assignment_count =  array();
        $assignment_count = array_fill(0, $batchdetail->count(), 0);

        $i = 0;

        foreach ($batchdetail as $batch) {

            $assignment_count[$i] = Assignment::where('batch_id', $batch->id)->get()->count();
            $i++;
        }
        // dd($assignment_count);
        return view('faculty.my_assignment', compact('user', 'batchdetail', 'assignment_count'));
    }

    public function viewbatchassignment(Request $req)
    {

        $user = Auth::user();
        $batchassignmentdetail = Assignment::select('*')
            ->where('email', $user->email)->where('batch_id', $req->batch_id)
            ->where('is_deleted', '0')->get();

        $batch_detail = Batch_detail::select('id','batch_name')->where('id' , $req->batch_id)->where('is_deleted' , '0')->first();

        return view('faculty.view_batch_assignment', compact('user', 'batchassignmentdetail' , 'batch_detail'));
    }



    public function update_assignment_details(Request $req)
    {

        $user = Auth::user();
        $createdassignmentdetail = $this->get_assignment_detail($req->id);
        $createdassignmentquestion =  $this->get_assignment_question_detail($req->id);
        return view('faculty.update_assignment_details', compact('createdassignmentdetail', 'createdassignmentquestion'));
    }

    public function update_assignment_questions(Request $req)
    {

        $user = Auth::user();
        $createdassignmentdetail = $this->get_assignment_detail($req->id);
        $createdassignmentquestion =  $this->get_assignment_question_detail($req->id);

        return view('faculty.update_assignment_questions', compact('createdassignmentdetail', 'createdassignmentquestion'));
    }


    public function deleteassignment(Request $req)
    {

        $user = Auth::user();
        Assignment::where('email', $user->email)->where('id', $req->id)->update(["is_deleted" => '1']);
        Assignment_question::where('email', $user->email)->where('assignment_id', $req->id)->update(["is_deleted" => '1']);

        return redirect()->back();
    }

    public function view_assignment_report(Request $request){

        $Submittion_detail = Submission::select('name','enrollment','question_id','status' ,'created_at')->where('assignment_id' , $request->assignment_id)->where('is_deleted' , '0')->get();
        $batch_detail = Batch_detail::select('id','batch_name')->where('id' , $request->batch_id)->first();
        $batch_student_detail = Studentbatch::select('enrollment')->where('batch_id' , $request->batch_id)->get();
        $assignment_id = $request->assignment_id;
        $assignment_questions = $this->get_assignment_question_detail($request->assignment_id);



        // dd($plucked_assignment_questions_id);
        return view('common.assignment_submission_report', compact('Submittion_detail', 'batch_detail' , 'batch_student_detail' ,'assignment_id','assignment_questions','plucked_assignment_questions_id'));

    }
}
