<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Batch_detail;
use App\Batch_joining_request;
use App\Studentbatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function assignment_count(){

        $user = Auth::user();

        $assignment_count = Assignment::select('*')->where('is_deleted' , '0')->where('email' , $user->email)->get()->count();

        return $assignment_count;
    }

    public function batch_count(){

        $user = Auth::user();

        $batch_count = Batch_detail::select('*')->where('is_deleted' , '0')->where('creater_email' , $user->email)->get()->count();

        return $batch_count;
    }

    public function student_count(){

        $user = Auth::user();

        $student_count = Studentbatch::select('*')->where('is_deleted' , '0')->where('creater_email' , $user->email)->get()->count();

        return $student_count;
    }

    public function active_assignment_count(){

        $user = Auth::user();

        $active_assignment_count = Assignment::select('*')->where('is_deleted' , '0')->where('creater_email' , $user->email)->where('status', 'A')->get()->count();

        return $active_assignment_count;
    }

    public function Today_assignment_list(){

        $user = Auth::user();
        $date = Carbon::now();
        //Get date and time
        $today = $date->toDateTimeString();
        $t = date('Y-m-d', strtotime($today));

        // dd($t);
        $Today_assignment_list = Assignment::select('Assignments.assignment_name','Assignments.batch_id','Batch_details.id','Batch_details.batch_name')->join('Batch_details', 'Batch_details.id', '=', 'Assignments.batch_id')->where('Assignments.is_deleted' , '0')->where('Assignments.email' , $user->email)->where('Assignments.last_submission_date', $t)->get();
        // dd($Today_assignment_list);
        return $Today_assignment_list;
    }

    public function Today_joining_request_list(){

        $user = Auth::user();
        $date = Carbon::now();
        //Get date and time
        $today = $date->toDateTimeString();
        $t = date('Y-m-d', strtotime($today));

        // dd($t);
        $Today_assignment_list = Batch_joining_request::select('id','email','batch_id','batch_name')->where('status' , 'P')->where('creater_email' , $user->email)->latest()->take(10)->get();
        // dd($Today_assignment_list);
        return $Today_assignment_list;
    }

    public function batch_name_by_id($id){

        $batch_name = Batch_detail::select('batch_name')->where('is_deleted' , '0')->where('id' , $id)->get();

        return $batch_name;
    }



    public function index()
    {
        $user = Auth::user();

        if (Auth::check() && Auth::user()->role_id == NULL) {
            return view('common.set_profile', compact('user'));
        }

        if (Auth::user()->role_id == '1') {
            return view('layouts.layout', compact('user'));
        } elseif (Auth::user()->role_id == '2') {
            return view('layouts.layout', compact('user'));
        } elseif (Auth::user()->role_id == '3') {

            return view('admin.dashboard', compact('user'));
        } elseif (Auth::user()->role_id == '4') {
            Auth::logout();
            return view('dashboard/master/masterhome');
        } elseif (Auth::user()->role_id == 'pending_admin') {
            Auth::logout();
            return redirect()->back()->with('alert', 'Your Admin Login Request is Pending');
        } elseif (Auth::user()->role_id == 'rejected_admin') {
            Auth::logout();
            return redirect()->back()->with('alert', 'Sorry ! Your Admin Login Request is Rejected. Please Contact to Support');
        } else {
            Auth::logout();
            return view('welcome');
        }
    }
    public function welcome(){

        return view('welcome');
    }
    public function dashboard()
    {
        $user = Auth::user();

        if($user->role_id == '1'){

            $assignment_count = $this->assignment_count();
            $batch_count = $this->batch_count();
            $student_count = $this->student_count();
            $Today_assignment_list = $this->Today_assignment_list();
            $Today_joining_request_list = $this->Today_joining_request_list();
            // dd($Today_assignment_list);
            return view('faculty.home_page', compact('user','assignment_count','batch_count','student_count','Today_assignment_list','Today_joining_request_list'));
        }
        if($user->role_id == '2'){
            return view('student.home_page', compact('user'));
        }
    }

    public function logActivity(){

        $log = Activity::all();

        return view('faculty.logActivity' , compact('log'));
    }


}
