<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Studentbatch;
use App\Batch_detail;
use App\Assignment;
use App\Assignment_question;

class StudentBatchController extends Controller
{

    //Student Enrollment View

    public function enrollstudent(){

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id','batch_name')->where( 'creater_email', $user->email )->where( 'is_deleted', '0' )->get();
        return view('faculty.enrollstudent' , compact('batchdetail')) ;
    }

    //Create Batch View

    public function createbatchpage(){

        $user = Auth::user();
        return view('faculty.createbatch' , compact('user')) ;
    }

    public function createbatch(Request $req){

        // return $data = $req->all();

        $req->validate(['batch_name' => 'required'] , ['email' => 'required']);

        $batchdetail = new Batch_detail;
        $batchdetail->creater_email = $req->email;
        $batchdetail->batch_name = $req->batch_name;
        $batchdetail->save();

        foreach ($req->batch_student_enrollment as $enrollment){

            if(!empty($enrollment)){

                $batchdetails = new Studentbatch;
                $batchdetails->creater_email = $req->email;
                $batchdetails->batch_id = $batchdetail->id;
                $batchdetails->batch_name = $req->batch_name;
                $batchdetails->enrollment  = $enrollment;
                $batchdetails->save();
            }
        }

        $batchdetail = Batch_detail::select('*')->where( 'creater_email', $req->email )->where( 'is_deleted', '0' )->get();
        return view('faculty.enrollstudent' , compact('batchdetail')) ;


    }

    //View Batch View

    public function viewbatch(Request $req){

        $user = Auth::user();
        $batchstudents = Studentbatch::select('id','batch_name','enrollment')->where( 'creater_email', $user->email )->where( 'batch_id', $req->batch_id )->where( 'is_deleted', '0' )->get();
        $batch_name = Batch_detail::select('batch_name')->where( 'creater_email', $user->email )->first();
        return view('faculty.viewbatch' , compact('batchstudents' , 'batch_name')) ;
    }

    public function deletebatch(Request $req){

        $user = Auth::user();
        Batch_detail::where( 'creater_email', $user->email )->where( 'id', $req->batch_id )->update(["is_deleted" => '1']);
        Assignment::where( 'email', $user->email )->where( 'batch_id', $req->batch_id )->update(["is_deleted" => '1']);
        return redirect()->back() ;
    }

    public function deletestudent(Request $req){

        Studentbatch::where( 'enrollment', $req->enrollment )->update(["is_deleted" => '1']);
        return redirect()->back() ;
    }



}
