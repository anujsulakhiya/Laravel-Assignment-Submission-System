<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role_id == '1'){
            return view('faculty.dashboard');
        }
        elseif(Auth::user()->role_id == '2'){
            return view('student.dashboard');
        }
        elseif(Auth::user()->role_id == '3'){

            return view('admin.dashboard');
        }
        elseif(Auth::user()->role_id == '4'){
            Auth::logout();
            return view('dashboard/master/masterhome');
        }
        elseif(Auth::user()->role_id == 'pending_admin'){
            Auth::logout();
            return redirect()->back()->with('alert', 'Your Admin Login Request is Pending');
        }
        elseif(Auth::user()->role_id == 'rejected_admin'){
            Auth::logout();
            return redirect()->back()->with('alert', 'Sorry ! Your Admin Login Request is Rejected. Please Contact to Support');
        }
        else{
            Auth::logout();
            return view('welcome');
        }
    }
}
