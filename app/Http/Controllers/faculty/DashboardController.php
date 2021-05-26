<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Studentbatch;
use App\Batch_detail;
use App\Assignment;
use App\Assignment_question;
use App\Batch_joining_request;
use App\Submission;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        Auth::user();
        return view('faculty.home_page' , compact('user'));

    }

    public function truncate_batch(){

        Studentbatch::truncate();
        Batch_detail::truncate();
        Batch_joining_request::truncate();
        return view('faculty.home_page')->with('rmessage','Batch Tables are sucessfully Truncated');

    }

    public function truncate_assignment(){

        Assignment::truncate();
        Assignment_question::truncate();
        Submission::truncate();
        return view('faculty.home_page' , compact('user'));

    }


}
