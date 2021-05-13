<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\User;
use App\Studentbatch;
use App\Batch_detail;
use App\Assignment;
use App\Assignment_question;
use App\Batch_joining_request;
use Log;


class StudentBatchController extends Controller
{

    //Student Enrollment View

    public function global_class()
    {

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id', 'batch_name','creater_email','created_at')->where('is_deleted', '0')->get();

        $exists = Batch_joining_request::select('batch_id','status')->where( 'email', $user->email)->get()->toArray();

        // $batchdetail = Batch_detail::select('Batch_detail.id', 'Batch_detail.batch_name', 'Batch_details.creater_email', 'Batch_details.created_at' , 'Batch_joining_request.status ')->join('Batch_joining_request', 'Batch_joining_request.batch_id', '=', 'Batch_details.id')->where('creater_email', $user->email)->where('is_deleted', '0')->get();
        // $batchdetail = Batch_detail::select('Batch_detail.id', 'Batch_detail.batch_name', 'Batch_details.creater_email', 'Batch_details.created_at', 'Batch_joining_request.* ')->where('is_deleted', '0')->get();
        // dd($exists);

        return view('faculty.global_class', compact('batchdetail' , 'exists'));
        // dd($exists);

        // return view('faculty.global_class')->with('batchdetail', $batchdetail)->with('exists', $exists);
        // return view('faculty.global_class')->with('batchdetail', $batchdetail);

    }

    public function enrollstudent()
    {

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id', 'batch_name')->where('creater_email', $user->email)->where('is_deleted', '0')->get();
        return view('faculty.enroll_student', compact('batchdetail'));
    }

    //Create Batch View

    public function createbatchpage()
    {

        $user = Auth::user();
        $batchcount = Batch_detail::select('id')->where('creater_email', $user->email)->where('is_deleted', '0')->get()->count();

        return view('faculty.create_batch', compact('user', 'batchcount'));
    }

    public function createbatch(Request $req)
    {

        // \dd($req->all());
        $user = Auth::user();
        $batchcount = Batch_detail::select('id')->where('creater_email', $user->email)->where('is_deleted', '0')->get()->count();

        $validator = Validator::make($req->all(), [
            'batch_name' => 'required',
        ]);

        if ($validator->fails()) {

            return view('faculty.create_batch')->with('batchcount', $batchcount)->with('user', $user)->withErrors($validator);
        }

        // dd($req->all());

        $batchdetail = new Batch_detail;
        $batchdetail->creater_email = $req->email;
        $batchdetail->batch_name = $req->batch_name;
        $batchdetail->batch_limit = $req->batch_limit;
        $batchdetail->save();

        $i = 0;
        foreach ($req->enrollment as $enrollment) {

            if (!empty($enrollment)) {

                $batchdetails = new Studentbatch;
                $batchdetails->creater_email = $req->email;
                $batchdetails->batch_id = $batchdetail->id;
                $batchdetails->batch_name = $req->batch_name;
                $batchdetails->student_name  = $req->name[$i];
                $batchdetails->enrollment  = $enrollment;
                $batchdetails->save();
            }
            $i++;
        }

        $batchdetail = Batch_detail::select('id', 'batch_name')->where('creater_email', $user->email)->where('is_deleted', '0')->get();

        return view('faculty.enroll_student', compact('batchdetail'));
    }

    public function createbatch1(Request $req)
    {

        $validations =  [
            'batch_name' => 'required',
            'batch_limit' => 'required',
            'name' => 'required',
            'enrollment' => 'required'
        ];


        $validator = Validator::make($req->all(), $validations);

        // \dd($validator);
        // $req->validate(['batch_name' => 'required'], ['email' => 'required']);

        if ($validator->fails()) {

            return view('faculty.create_batch')->withErrors($validator);
        }

        return view('faculty.create_batch')->with('success', 'yes');

        $batchdetail = new Batch_detail;
        $batchdetail->creater_email = $req->email;
        $batchdetail->batch_name = $req->batch_name;
        $batchdetail->save();

        foreach ($req->batch_student_enrollment as $enrollment) {

            if (!empty($enrollment)) {

                $batchdetails = new Studentbatch;
                $batchdetails->creater_email = $req->email;
                $batchdetails->batch_id = $batchdetail->id;
                $batchdetails->batch_name = $req->batch_name;
                $batchdetails->enrollment  = $enrollment;
                $batchdetails->save();
            }
        }

        // $batchdetail = Batch_detail::select('*')->where('creater_email', $req->email)->where('is_deleted', '0')->get();
        // return view('faculty.create_batch', compact('batchdetail'));
    }

    //View Batch View

    public function viewbatch(Request $req)
    {

        $user = Auth::user();
        $batchstudents = Studentbatch::select('id', 'batch_name', 'enrollment')->where('creater_email', $user->email)->where('batch_id', $req->batch_id)->where('is_deleted', '0')->get();

        $batch_detail = Batch_detail::select('batch_name', 'id')->where('id', $req->batch_id)->first();
        return view('faculty.view_batch', compact('batchstudents', 'batch_detail'));
    }

    public function deletebatch(Request $req)
    {

        $user = Auth::user();
        Batch_detail::where('creater_email', $user->email)->where('id', $req->batch_id)->update(["is_deleted" => '1']);
        Assignment::where('email', $user->email)->where('batch_id', $req->batch_id)->update(["is_deleted" => '1']);
        return redirect()->back();
    }

    public function deletestudent(Request $req)
    {

        Studentbatch::where('enrollment', $req->enrollment)->update(["is_deleted" => '1']);
        Batch_joining_request::where('email', $req->enrollment)->update(["status" => 'D']);

        return redirect()->back();
    }
    public function classjoiningrequest(Request $req)
    {

        $user = Auth::user();

        $Batch_joining_request = Batch_joining_request::select('*')->where('batch_id', $req->batch_id)->where('status', 'P')->get();

        $batch_detail = Batch_detail::select('batch_name', 'id')->where('id', $req->batch_id)->first();


        return view('faculty.class_joining_request', compact('user', 'Batch_joining_request', 'batch_detail'));
    }

    public function approvestudent(Request $req)
    {

        $user = Auth::user();

        $Batch_joining_request = Batch_joining_request::select('*')->where('id', $req->id)->first();
        // dd($Batch_joining_request);
        $batch_detail = Batch_detail::select('batch_name', 'id')->where('id', $Batch_joining_request->batch_id)->first();

        $batchdetails = new Studentbatch;
        $batchdetails->creater_email = $user->email;
        $batchdetails->batch_id = $Batch_joining_request->batch_id;
        $batchdetails->batch_name = $batch_detail->batch_name;
        $batchdetails->enrollment  = $Batch_joining_request->email;
        $batchdetails->save();

        Batch_joining_request::where('id', $req->id)->update(["status" => 'A']);

        $msg = "$Batch_joining_request->name ( $Batch_joining_request->email ) is now Approved ";

        return redirect()->back()->with('message', $msg);
    }

    public function rejectstudent(Request $req)
    {

        Batch_joining_request::where('id', $req->id)->update(["status" => 'R']);

        $Batch_joining_request = Batch_joining_request::select('*')->where('id', $req->id)->first();

        $msg = "$Batch_joining_request->name ( $Batch_joining_request->email ) is Rejected ";

        return redirect()->back()->with('rmessage', $msg);
    }
}
