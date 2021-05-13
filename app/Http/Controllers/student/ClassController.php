<?php

namespace App\Http\Controllers\student;

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
        // dd($req->batch_id);
        $user = Auth::user();

        $exists = Batch_joining_request::select('*')->where('email', $user->email)->where('batch_id', $req->batch_id)->where('status', 'A')->get();

        if (!count($exists)) {

            $joinclass = new Batch_joining_request;

            $joinclass->name = $user->name;
            $joinclass->email = $user->email;
            $joinclass->batch_id  = $req->batch_id;
            $joinclass->status  = "P";
            $joinclass->save();

            return redirect()->back()->with('message', 'Joining Request Sent Successfully !');
        }
        return redirect()->back()->with('message', 'You Are Already Enrolled For This Class !');
    }

    public function global_joinclassrequest(Request $req)
    {
        // dd($req->batch_id);
        $user = Auth::user();

        $exists = Batch_joining_request::select('id')->where('email', $user->email)->where('batch_id', $req->batch_id)->where('status', 'P')->first();



        if ( empty($exists) ) {

            // dd($req->batch_id);

            $joinclass = new Batch_joining_request;
            $joinclass->name = $user->name;
            $joinclass->email = $user->email;
            $joinclass->batch_id  = $req->batch_id;
            $joinclass->status  = "P";
            $joinclass->save();
        }

        $batchdetail = Batch_detail::select('id', 'batch_name', 'creater_email', 'created_at')->where('is_deleted', '0')->get();

        $exists = Batch_joining_request::select('batch_id', 'status')->where('email', $user->email)->get();

        return view('faculty.global_class')->with('batchdetail', $batchdetail)->with('exists', $exists);

        // return redirect()->back()->with('message', 'You Are Already Enrolled For This Class !');
    }
}
