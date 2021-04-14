<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('google', function () {

    return view('googleAuth');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');

Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::group(['middleware' => 'auth'], function () {

    //***********************************   Public Routes   ***********************************//

    //Profile Routes
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/dashboard', 'HomeController@dashboard')->name('home');
    Route::get('/profile', 'ProfileController@profile');
    Route::get('/updateprofile', 'ProfileController@userprofile');
    Route::post('/updateuserprofile', 'ProfileController@updateprofile');

    //***********************************   Faculty Routes   ***********************************//

    Route::group(['as' => 'faculty.', 'middleware' => ['auth', 'faculty']], function () {
        Route::get('dashboard', 'faculty\DashboardController@index')->name('dashboard');


        //Faculty Routes --> Enroll Student Routes
        Route::get('enrollstudent', 'faculty\StudentBatchController@enrollstudent');
        Route::get('createbatch', 'faculty\StudentBatchController@createbatchpage');
        Route::post('/createbatch', 'faculty\StudentBatchController@createbatch');
        Route::get('/viewbatch/{batch_id}', 'faculty\StudentBatchController@viewbatch');
        Route::get('/dbatch/{batch_id}', 'faculty\StudentBatchController@deletebatch');
        Route::get('/dstudent/{enrollment}', 'faculty\StudentBatchController@deletestudent');
        Route::get('/classjoiningrequest/{batch_id}', 'faculty\StudentBatchController@classjoiningrequest');
        Route::get('/approvestudent/{id}', 'faculty\StudentBatchController@approvestudent');
        Route::get('/rejectstudent/{id}', 'faculty\StudentBatchController@rejectstudent');



        //Faculty Routes --> Create Assignment Routes
        Route::get('createassignment', 'faculty\AssignmentController@createassignmentpage');
        Route::post('createnewassignment', 'faculty\AssignmentController@createassignment');
        Route::get('createassignmentdetails', 'faculty\AssignmentController@createassignmentdetails');
        Route::get('/createbatchassignment/{batch_id}', 'faculty\AssignmentController@viewperticulerbatch');

        //Faculty Routes --> My Assignment Routes
        Route::get('myassignment', 'faculty\AssignmentController@viewmyassignment');
        Route::get('/viewbatchassignment/{batch_id}', 'faculty\AssignmentController@viewbatchassignment');
        Route::get('batchassignmentdetails/{id}', 'faculty\AssignmentController@viewbatchassignmentdetails');
        Route::get('/dassignment/{id}', 'faculty\AssignmentController@classjoiningrequest  ');

        //Faculty Routes --> Assignment Submission Routes
        Route::get('/assignmentquestions/{id}', 'faculty\SubmissionController@viewassignmentquestions');
        Route::get('/viewsubmission/{id}', 'faculty\SubmissionController@viewsubmission');
        Route::post('/accept', 'faculty\SubmissionController@acceptsubmission');
        Route::get('/accept/{id}', 'faculty\SubmissionController@acceptsubmission');
        Route::get('/reject/{id}', 'faculty\SubmissionController@rejectsubmission');


    });
    //***********************************   Student Routes   ***********************************//

    Route::group(['as' => 'student.', 'middleware' => ['auth', 'student']], function () {
        Route::get('dashboard', 'student\DashboardController@index')->name('dashboard');


        //Student Routes --> Class Joining Routes
        Route::get('joinclass/{batch_id}', 'student\ClassController@joinclass');
        Route::get('sendjoningrequest/{batch_id}', 'student\ClassController@joinclassrequest');

        //Student Routes --> Submission Routes
        Route::get('submitassignment', 'student\SubmissionController@submissionpage');
        Route::get('/viewassignmentquestions/{id}', 'student\SubmissionController@showassignmentquestion');

        Route::get('/submitquestion/{id}', 'student\SubmissionController@submitquestion');
        Route::post('/submitans', 'student\SubmissionController@submitanswer')->name('submit_answer');

    });
    //***********************************   Admin Routes   ***********************************//

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    });

    // Route::get('viewfile/{filename}','faculty\SubmissionController@getfile');
});
