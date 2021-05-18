<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\Assignment;
use App\Assignment_question;
use App\Batch_detail;

class AssignmentController extends Controller
{
    public function createassignmentpage()
    {

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

    public function createassignment(Request $req)
    {
        // dd($req->all());

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

        $req1 = array(
            'username' => $user->email ,
            'description' => $user->email ,
            'detail' => $user->email ,
            'properties' => $user->email
        );

        $a = $this->user_log_activity($req1);



        $createdassignmentdetail = Assignment::select('*')
            ->where('email', $user->email)
            ->where('id', $assignmentdetail->id)->where('is_deleted', '0')->get();

        $createdassignmentquestion = Assignment_question::select('*')
            ->where('email', $user->email)
            ->where('assignment_id', $assignmentdetail->id)->where('is_deleted', '0')->get();

        // return Redirect::route('clients.show, $id')->with( ['data' => $data] );

        // return redirect('faculty.createassignmentdetails')
        // ->with( ['createdassignmentdetail' => $createdassignmentdetail].
        //         ['createdassignmentquestion' => $createdassignmentquestion]
        //         );

        // return redirect('faculty.createassignmentdetails', compact('createdassignmentdetail' ,'createdassignmentquestion'));

        // return redirect()->view('faculty.createassignmentdetails',compact('createdassignmentdetail' ,'createdassignmentquestion'));

        return view('faculty.create_assignment_details', compact('createdassignmentdetail', 'createdassignmentquestion'));
    }

    public function update_assignment(Request $req)
    {

        // dd($req->all());

        // Assignment::where('id', $req->id)
        // ->update(["subject_name" => $req->subject_name])
        // ->update(["assignment_name" => $req->assignment_name])
        // ->update(["last_date" => $req->last_date])
        // ->update(["description" => $req->description]);

        // Assignment::where('id', $req->id)->update($req->all());

        Assignment::where('id', $req->id)->update($req->only([
            'subject_name', 'assignment_name',
            'last_submission_date', 'description'
        ]));

        // $request = new Request();
        // $request->batch_id = $req->batch_id;
        return $this->viewbatchassignmentdetails($req);
    }

    public function update_questions(Request $req)
    {

        // dd($req->all());

        $update_questions = $req->input('questions');
        $questions_id = $req->input('question_id');
        // dd($questions_id);

        $i = '0';
        foreach ($update_questions as $question) {

                dd($questions_id[$i]);

                $u_question = Assignment_question::find($questions_id[$i]);
                $u_question->questions = $question;
                $u_question->save();

            // Assignment_question::where('id', $questions_id[$i])->update(["questions " => $update_questions[$i]]);
            $i++;
        }



        // $request = new Request();
        // $request->batch_id = $req->batch_id;
        // return $this->viewbatchassignmentdetails($req);
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

        $i=0;

        foreach($batchdetail as $batch){

            $assignment_count[$i] = Assignment::where('batch_id' , $batch->id)->get()->count();
            $i++;
        }
        // dd($assignment_count);
        return view('faculty.my_assignment', compact('user', 'batchdetail' , 'assignment_count'));
    }

    public function viewbatchassignment(Request $req)
    {

        $user = Auth::user();
        $batchassignmentdetail = Assignment::select('*')
            ->where('email', $user->email)->where('batch_id', $req->batch_id)
            ->where('is_deleted', '0')->get();
        return view('faculty.view_batch_assignment', compact('user', 'batchassignmentdetail'));
    }

    public function viewbatchassignmentdetails(Request $req)
    {

        $user = Auth::user();
        $createdassignmentdetail = Assignment::select('*')
            ->where('email', $user->email)
            ->where('id', $req->id)->where('is_deleted', '0')->get();

        $createdassignmentquestion = Assignment_question::select('*')
            ->where('email', $user->email)
            ->where('assignment_id', $req->id)->where('is_deleted', '0')->get();

        return view('faculty.create_assignment_details', compact('createdassignmentdetail', 'createdassignmentquestion'));
    }

    public function update_assignment_details(Request $req)
    {


        $user = Auth::user();
        $createdassignmentdetail = Assignment::select('*')
            ->where('email', $user->email)
            ->where('id', $req->id)->where('is_deleted', '0')->get();

        $createdassignmentquestion = Assignment_question::select('*')
            ->where('email', $user->email)
            ->where('assignment_id', $req->id)->where('is_deleted', '0')->get();

        return view('faculty.update_assignment_details', compact('createdassignmentdetail', 'createdassignmentquestion'));
    }

    public function update_assignment_questions(Request $req)
    {


        $user = Auth::user();
        $createdassignmentdetail = Assignment::select('*')
            ->where('email', $user->email)
            ->where('id', $req->id)->where('is_deleted', '0')->get();

        $createdassignmentquestion = Assignment_question::select('*')
            ->where('email', $user->email)
            ->where('assignment_id', $req->id)->where('is_deleted', '0')->get();

        return view('faculty.update_assignment_questions', compact('createdassignmentdetail', 'createdassignmentquestion'));
    }


    public function deleteassignment(Request $req)
    {

        $user = Auth::user();
        Assignment::where('email', $user->email)->where('id', $req->id)->update(["is_deleted" => '1']);
        Assignment_question::where('email', $user->email)->where('assignment_id', $req->id)->update(["is_deleted" => '1']);
        return redirect()->back();
    }
}
