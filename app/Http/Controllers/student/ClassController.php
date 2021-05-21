<?php

namespace App\Http\Controllers\student;
use App\Http\Controllers\faculty\StudentBatchController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Studentbatch;
use App\Batch_detail;
use App\Assignment;
use App\Assignment_question;
use App\Batch_joining_request;


class ClassController extends Controller
{

    public function joinclass(Request $req)
    {

        $user = Auth::user();

        $batch_detail = Batch_detail::select('*')->where('id', $req->batch_id)->first();

        $faculty_name = User::select('name')->where('email', $batch_detail->creater_email)->first();

        return view('student.batch_joining_request', compact('user', 'batch_detail', 'faculty_name'));
    }

    public function joinclassrequest(Request $req)
    {
        $user = Auth::user();

        $faculty_email = Batch_detail::select('batch_name','creater_email')->where('id', $req->batch_id)->first();
        // dd($faculty_email);
        $exists = Batch_joining_request::select('*')->where('email', $user->email)->where('batch_id', $req->batch_id)->where('status', 'A')->get();

        if (!count($exists)) {

            $joinclass = new Batch_joining_request;

            $joinclass->name = $user->name;
            $joinclass->email = $user->email;
            $joinclass->batch_id  = $req->batch_id;
            $joinclass->status  = "P";
            $joinclass->creater_email  = $faculty_email->creater_email;
            $joinclass->batch_name  = $faculty_email->batch_name;

            $joinclass->save();

            // $req1 = new Request();
            // $req1->batch_id = $req->batch_id;

            // return $this->joinclass($req)->with('message', 'Joining Request Sent Successfully !');
            return redirect()->back()->with('message', 'Joining Request Sent Successfully !');
        }
        // return $this->joinclass($req)->with('message', 'You Are Already Enrolled For This Class !');

        return redirect()->back()->with('message', 'You Are Already Enrolled For This Class !');
    }

    public function global_joinclassrequest(Request $req)
    {
        $user = Auth::user();

        $faculty_email = Batch_detail::select('batch_name','creater_email')->where('id', $req->batch_id)->first();

        $exists = Batch_joining_request::select('id')->where('email', $user->email)->where('batch_id', $req->batch_id)->where('status', 'P')->first();

        if ( empty($exists) ) {

            // dd($req->batch_id);

            $joinclass = new Batch_joining_request;
            $joinclass->name = $user->name;
            $joinclass->email = $user->email;
            $joinclass->batch_id  = $req->batch_id;
            $joinclass->status  = "P";
            $joinclass->creater_email  = $faculty_email->creater_email;
            $joinclass->batch_name  = $faculty_email->batch_name;
            $joinclass->save();
        }

        $faculty_function = new  StudentBatchController;
        return $faculty_function->global_class();

    }
}
