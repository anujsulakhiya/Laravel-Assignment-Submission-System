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
    public function createassignmentpage(){

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id','batch_name')->where( 'creater_email', $user->email )->where( 'is_deleted', '0' )->get();
        return view('faculty.createassignment' , compact('user','batchdetail'));
    }

    public function viewperticulerbatch(Request $req){

        $user = Auth::user();
        $batch_name = Batch_detail::select('batch_name')
        ->where( 'creater_email', $user->email )->where( 'id', $req->batch_id )->get();
        return view('faculty.createassignment' , compact('user','batch_name')) ;
    }

    public function createassignment(Request $req){

        // return $data = $req->all();

        $req->validate(['batch_id' => 'required'],['email' => 'required']);

        // $req->validate(['batch_id' => 'required'] , ['email' => 'required'],['subject_name' => 'required'] , ['assignment_name' => 'required'],['last_date' => 'required']);

        $assignmentdetail = new Assignment;
        $assignmentdetail->email = $req->email;
        $assignmentdetail->batch_id = $req->batch_id;
        $assignmentdetail->assignment_name = $req->assignment_name;
        $assignmentdetail->subject_name  = $req->subject_name;
        $assignmentdetail->description  = $req->description;
        $assignmentdetail->last_submission_date = $req->last_date;
        $assignmentdetail->save();

        foreach ($req->questions as $question){

            if(!empty($question)){

                $assignmentquestion = new Assignment_question;
                $assignmentquestion->assignment_id = $assignmentdetail->id;
                $assignmentquestion->email = $req->email;
                $assignmentquestion->questions  = $question;
                $assignmentquestion->save();

            }
        }
        $user = Auth::user();

        $createdassignmentdetail = Assignment::select('*')
        ->where( 'email', $user->email )
        ->where( 'id', $assignmentdetail->id )->where( 'is_deleted', '0' )->get();

        $createdassignmentquestion = Assignment_question::select('*')
        ->where( 'email', $user->email)
        ->where( 'assignment_id', $assignmentdetail->id )->where( 'is_deleted', '0' )->get();

        // return Redirect::route('clients.show, $id')->with( ['data' => $data] );

        // return redirect('faculty.createassignmentdetails')
        // ->with( ['createdassignmentdetail' => $createdassignmentdetail].
        //         ['createdassignmentquestion' => $createdassignmentquestion]
        //         );

        // return redirect('faculty.createassignmentdetails', compact('createdassignmentdetail' ,'createdassignmentquestion'));

        // return redirect()->view('faculty.createassignmentdetails',compact('createdassignmentdetail' ,'createdassignmentquestion'));

        return view('faculty.createassignmentdetails' , compact('createdassignmentdetail' ,'createdassignmentquestion'));
    }

    public function createassignmentdetails(){

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id','batch_name')->where( 'creater_email', $user->email )->where( 'is_deleted', '0' )->get();
        return view('faculty.createassignmentdetails' , compact('user','batchdetail')) ;
    }

    public function viewmyassignment(){

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id','batch_name')->where( 'creater_email', $user->email )->where( 'is_deleted', '0' )->get();
        return view('faculty.myassignment' , compact('user','batchdetail'));

    }

    public function viewbatchassignment(Request $req){

        $user = Auth::user();
        $batchassignmentdetail = Assignment::select('*')
        ->where( 'email', $user->email )->where( 'batch_id', $req->batch_id )
        ->where( 'is_deleted', '0' )->get();
        return view('faculty.viewbatchassignment' , compact('user','batchassignmentdetail'));
    }

    public function viewbatchassignmentdetails(Request $req){

        $user = Auth::user();
        $createdassignmentdetail = Assignment::select('*')
        ->where( 'email', $user->email )
        ->where( 'id', $req->id )->where( 'is_deleted', '0' )->get();

        $createdassignmentquestion = Assignment_question::select('*')
        ->where( 'email', $user->email)
        ->where( 'assignment_id', $req->id )->where( 'is_deleted', '0' )->get();

        return view('faculty.createassignmentdetails' , compact('createdassignmentdetail' ,'createdassignmentquestion'));
    }

    public function deleteassignment(Request $req){

        $user = Auth::user();
        Assignment::where( 'email', $user->email )->where( 'id', $req->id )->update(["is_deleted" => '1']);
        Assignment_question::where( 'email', $user->email )->where( 'assignment_id', $req->id )->update(["is_deleted" => '1']);
        return redirect()->back() ;
    }
}
