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

    public function student_count(Request $req)
    {

        $student_count = Studentbatch::where('batch_id', $req->id)->count();
        // dd($student_count);
        return $student_count;
    }

    public function global_class()
    {

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id', 'batch_name', 'creater_email', 'created_at', 'status', 'request_status')->where('is_deleted', '0')->latest()->get();

        $exists = Batch_joining_request::select('batch_id', 'status')->where('email', $user->email)->get();

        $student_count =  array();
        $student_count = array_fill(0, $batchdetail->count(), 0);

        $plucked_batch_id = $batchdetail->pluck('id')->toArray();
        $plucked_batch_request = $exists->pluck('batch_id')->toArray();
        $plucked_batch_request_status = $exists->pluck('status')->toArray();

        $i = 0;
        foreach ($batchdetail as $batch) {

            if (in_array($plucked_batch_id[$i], $plucked_batch_request)) {

                $status = Batch_joining_request::select('status')->where('email', $user->email)->where('batch_id', $batch->id)->first();
                $batch->request_status = $status->status;
            }
            $student_count[$i] = Studentbatch::where('batch_id', $batch->id)->get()->count();

            $i++;
        }

        return view('common.global_class', compact('batchdetail', 'batch_id', 'batch_status', 'student_count'))->with('user_role', $user->role_id);
    }

    public function enrollstudent()
    {

        $user = Auth::user();
        $batchdetail = Batch_detail::select('id', 'batch_name', 'status')->where('creater_email', $user->email)->where('is_deleted', '0')->latest()->get();

        $student_count =  array();
        $student_request =  array();

        $student_count = array_fill(0, $batchdetail->count(), 0);
        $student_request = array_fill(0, $batchdetail->count(), 0);

        $i = 0;

        foreach ($batchdetail as $batch) {

            $student_count[$i] = Studentbatch::where('batch_id', $batch->id)->where('is_deleted', '0')->get()->count();
            $student_request[$i] = Batch_joining_request::where('batch_id', $batch->id)->where('status', 'P')->get()->count();

            $i++;
        }

        return view('faculty.enroll_student', compact('batchdetail', 'student_count', 'student_request'));
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

        $user = Auth::user();
        $batchcount = Batch_detail::select('id')->where('creater_email', $user->email)->where('is_deleted', '0')->get()->count();

        $validator = Validator::make($req->all(), [
            'batch_name' => 'required',
        ]);

        if ($validator->fails()) {

            return view('faculty.create_batch')->with('batchcount', $batchcount)->with('user', $user)->withErrors($validator);
        }


        $batchdetail = new Batch_detail;
        $batchdetail->creater_email = $req->email;
        $batchdetail->batch_name = $req->batch_name;
        $batchdetail->batch_limit = $req->batch_limit;
        $batchdetail->status = 'Active';
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

        return $this->enrollstudent();
    }


    //View Batch View

    public function viewbatch(Request $req)
    {

        $user = Auth::user();

        $batchstudents = Studentbatch::select('id', 'batch_name', 'enrollment')->where('batch_id', $req->batch_id)->where('is_deleted', '0')->get();

        $batch_detail = Batch_detail::select('batch_name', 'id')->where('id', $req->batch_id)->first();

        // dd($batch_detail);

        return view('faculty.view_batch', compact('batchstudents', 'batch_detail' ,'user'));
    }

    public function deletebatch(Request $req)
    {

        $user = Auth::user();
        Batch_detail::where('creater_email', $user->email)->where('id', $req->batch_id)->update(["is_deleted" => '1']);
        Assignment::where('email', $user->email)->where('batch_id', $req->batch_id)->update(["is_deleted" => '1']);
        Batch_joining_request::where('batch_id', $req->batch_id)->delete();

        return $this->enrollstudent();
    }

    public function deletestudent(Request $req)
    {

        Studentbatch::where('enrollment', $req->enrollment)->update(["is_deleted" => '1']);
        Batch_joining_request::where('email', $req->enrollment)->where('batch_id', $req->id)->delete();

        return redirect()->back();
    }


    public function active_batch(Request $req)
    {

        $user = Auth::user();
        Batch_detail::where('creater_email', $user->email)->where('id', $req->batch_id)->update(["status" => 'Active']);

        return $this->enrollstudent();
        // $batchdetail = Batch_detail::select('id', 'batch_name', 'status')->where('creater_email', $user->email)->where('is_deleted', '0')->get();
        // return view('faculty.enroll_student', compact('batchdetail'));
    }

    public function deactive_batch(Request $req)
    {

        $user = Auth::user();
        Batch_detail::where('creater_email', $user->email)->where('id', $req->batch_id)->update(["status" => 'Deactive']);

        return $this->enrollstudent();

        // $batchdetail = Batch_detail::select('id', 'batch_name', 'status')->where('creater_email', $user->email)->where('is_deleted', '0')->get();
        // return view('faculty.enroll_student', compact('batchdetail'));
    }

    public function perticuler_batch_joining_request(Request $req)
    {

        // dd($req->all());

        $user = Auth::user();

        $Batch_joining_request = Batch_joining_request::select('*')->where('batch_id', $req->batch_id)->where('status', 'P')->get();

        $batchdetail = Batch_detail::select('id', 'batch_name')->where('creater_email', $user->email)->where('is_deleted', '0')->get();
        // $batch_detail = Batch_detail::select('batch_name', 'id')->where('id', $req->batch_id)->first();


        return view('faculty.all_class_joining_request', compact('user', 'Batch_joining_request','batchdetail'));
    }


    public function allclassjoiningrequest()
    {

        $user = Auth::user();

        $Batch_joining_request = Batch_joining_request::select('*')->where('creater_email', $user->email)->where('status', 'P')->latest()->get();

        $batchdetail = Batch_detail::select('id', 'batch_name')->where('creater_email', $user->email)->where('is_deleted', '0')->latest()->get();
        // $batch_detail = Batch_detail::select('batch_name', 'id')->where('id', $req->batch_id)->first();


        return view('faculty.all_class_joining_request', compact('user', 'Batch_joining_request','batchdetail'));
    }

    public function classjoiningrequest(Request $req)
    {

        $user = Auth::user();

        $Batch_joining_request = Batch_joining_request::select('*')->where('batch_id', $req->batch_id)->where('status', 'P')->get();

        $batch_detail = Batch_detail::select('batch_name', 'id')->where('id', $req->batch_id)->first();


        return view('faculty.class_joining_request', compact('user', 'Batch_joining_request', 'batch_detail'));
    }

    public function aprrovestudent_directly(Request $req)
    {
        $msg = $this->approvestudent($req);
        return $this->allclassjoiningrequest()->with('msg', $msg);
    }

    public function rejectestudent_directly(Request $req)
    {
        $msg = $this->rejectstudent($req);
        return $this->allclassjoiningrequest()->with('msg', $msg);
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

        $msg = "$Batch_joining_request->name ( $Batch_joining_request->email ) is Accepted ";

        return redirect()->back()->with('msg', $msg);

        // $msg = "$sBatch_joining_request->name ( $sBatch_joining_request->email ) is now Approved ";

        // dd($Batch_joining_request->batch_id);

        // $Batch_joining_request = Batch_joining_request::select('*')->where('batch_id', $sBatch_joining_request->batch_id)->where('status', 'P')->get();

        // $batch_detail = Batch_detail::select('batch_name', 'id')->where('id', $Batch_joining_request->batch_id)->first();

        // dd($batch_detail);


        // if (empty($Batch_joining_request)) {
        //     return view('faculty.class_joining_request', compact('user', 'batch_detail'));
        // }



        return view('faculty.class_joining_request', compact('user', 'Batch_joining_request', 'batch_detail'));
    }

    public function rejectstudent(Request $req)
    {

        Batch_joining_request::where('id', $req->id)->update(["status" => 'R']);

        $Batch_joining_request = Batch_joining_request::select('*')->where('id', $req->id)->first();

        $msg = "$Batch_joining_request->name ( $Batch_joining_request->email ) is Rejected ";

        return redirect()->back()->with('rmessage', $msg);
    }
}
