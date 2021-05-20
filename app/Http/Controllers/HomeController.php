<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

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
            return view('faculty.home_page', compact('user'));
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
