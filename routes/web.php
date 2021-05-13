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
    Route::get('/home_page', 'HomeController@dashboard')->name('dashboard');
    Route::get('/profile', 'ProfileController@profile');
    Route::get('/updateprofile', 'ProfileController@userprofile');
    Route::post('/updateuserprofile', 'ProfileController@updateprofile');
    Route::get('/changepassword', 'ChangePasswordController@index');
    Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');

    //Global Classes
    Route::get('global_class', 'faculty\StudentBatchController@global_class');
    Route::get('sendjoningrequest_from_global/{batch_id}', 'student\ClassController@global_joinclassrequest');

    //
    Route::get('truncate_batch', 'faculty\DashboardController@truncate_batch');
    Route::get('truncate_assignment', 'faculty\DashboardController@truncate_assignment');

    //***********************************   Faculty Routes   ***********************************//

    Route::group(['as' => 'faculty.', 'middleware' => ['auth', 'faculty']], function () {

        //Faculty Routes --> Enroll Student Routes
        Route::get('enroll_student', 'faculty\StudentBatchController@enrollstudent');
        Route::get('createbatch', 'faculty\StudentBatchController@createbatchpage');
        Route::post('/create_batch', 'faculty\StudentBatchController@createbatch')->name('createbatch');
        Route::get('/view_batch/{batch_id}', 'faculty\StudentBatchController@viewbatch');
        Route::get('/dbatch/{batch_id}', 'faculty\StudentBatchController@deletebatch');
        Route::get('/dstudent/{enrollment}', 'faculty\StudentBatchController@deletestudent');
        Route::get('/class_joining_request/{batch_id}', 'faculty\StudentBatchController@classjoiningrequest');
        Route::get('/approvestudent/{id}', 'faculty\StudentBatchController@approvestudent');
        Route::get('/rejectstudent/{id}', 'faculty\StudentBatchController@rejectstudent');

        //Faculty Routes --> Create Assignment Routes
        Route::get('create_assignment', 'faculty\AssignmentController@createassignmentpage');
        Route::post('/createnewassignment', 'faculty\AssignmentController@createassignment');
        Route::get('createassignmentdetails', 'faculty\AssignmentController@createassignmentdetails');

        Route::get('/createbatchassignment/{batch_id}', 'faculty\AssignmentController@viewperticulerbatch');

        //Faculty Routes --> My Assignment Routes
        Route::get('my_assignment', 'faculty\AssignmentController@viewmyassignment');
        Route::get('/view_batch_assignment/{batch_id}', 'faculty\AssignmentController@viewbatchassignment');
        Route::get('batchassignmentdetails/{id}', 'faculty\AssignmentController@viewbatchassignmentdetails');
        Route::get('/update_assignment_details/{id}', 'faculty\AssignmentController@update_assignment_details');
        Route::post('/update_assignment', 'faculty\AssignmentController@update_assignment');

        Route::get('/update_assignment_questions/{id}','faculty\AssignmentController@update_assignment_questions');
        Route::post('/update_questions', 'faculty\AssignmentController@update_questions');

        Route::get('/dassignment/{id}', 'faculty\AssignmentController@classjoiningrequest  ');

        //Faculty Routes --> Assignment Submission Routes
        Route::get('/assignment_questions/{id}', 'faculty\SubmissionController@viewassignmentquestions');
        Route::get('/view_submission/{id}', 'faculty\SubmissionController@viewsubmission');
        Route::post('/accept', 'faculty\SubmissionController@acceptsubmission');
        Route::get('/accept/{id}', 'faculty\SubmissionController@acceptsubmission');
        Route::get('/reject/{id}', 'faculty\SubmissionController@rejectsubmission');
    });

    //***********************************   Student Routes   ***********************************//

    Route::group(['as' => 'student.', 'middleware' => ['auth', 'student']], function () {

        //Student Routes --> Class Joining Routes
        Route::get('joinclass/{batch_id}', 'student\ClassController@joinclass');
        Route::get('sendjoningrequest/{batch_id}', 'student\ClassController@joinclassrequest');

        //Student Routes --> Submission Routes
        Route::get('/submitassignment', 'student\SubmissionController@viewmybatched');
        Route::get('/viewassignment/{id}', 'student\SubmissionController@submissionpage');

        Route::get('/viewassignmentquestions/{id}', 'student\SubmissionController@showassignmentquestion');

        Route::get('/submitquestion/{id}', 'student\SubmissionController@submitquestion');
        Route::post('/submitans', 'student\SubmissionController@submitanswer')->name('submit_answer');

        //Student Routes --> View Submission Routes
        Route::get('/mysubmission', 'student\SubmissionController@viewmyoldbatched')->name('view_mysubmission');
        Route::get('/view_submitted_assignment/{id}', 'student\SubmissionController@old_submissions');

    });
    //***********************************   Admin Routes   ***********************************//

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    });

    // Route::get('viewfile/{filename}','faculty\SubmissionController@getfile');
});
