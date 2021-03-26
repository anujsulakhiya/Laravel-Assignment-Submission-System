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

Route::get('/home', 'HomeController@index')->name('home');

//Profile Routes
Route::get('/profile', 'ProfileController@profile');
Route::get('/updateprofile', 'ProfileController@userprofile');
Route::post('/updateuserprofile', 'ProfileController@updateprofile');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//***********************************   Faculty Routes   ***********************************//

Route::group(['as'=>'faculty.','prefix' => 'faculty','namespace'=>'Faculty','middleware'=>['auth','faculty']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

//Faculty Routes --> Enroll Student Routes
Route::get('enrollstudent', 'faculty\StudentBatchController@enrollstudent');
Route::get('createbatch', 'faculty\StudentBatchController@createbatchpage');
Route::post('/createbatch', 'faculty\StudentBatchController@createbatch');
Route::get('/viewbatch/{batch_id}', 'faculty\StudentBatchController@viewbatch');
Route::get('/dbatch/{batch_id}', 'faculty\StudentBatchController@deletebatch');
Route::get('/dstudent/{enrollment}', 'faculty\StudentBatchController@deletestudent');



//Faculty Routes --> Create Assignment Routes
Route::get('createassignment', 'faculty\AssignmentController@createassignmentpage');
Route::post('createnewassignment', 'faculty\AssignmentController@createassignment');
Route::get('createassignmentdetails', 'faculty\AssignmentController@createassignmentdetails');
Route::get('/createbatchassignment/{batch_id}', 'faculty\AssignmentController@viewperticulerbatch');

//Faculty Routes --> My Assignment Routes
Route::get('myassignment', 'faculty\AssignmentController@viewmyassignment');
Route::get('/viewbatchassignment/{batch_id}', 'faculty\AssignmentController@viewbatchassignment');
Route::get('batchassignmentdetails/{id}', 'faculty\AssignmentController@viewbatchassignmentdetails');
Route::get('/dassignment/{id}', 'faculty\AssignmentController@  ');











//***********************************   Student Routes   ***********************************//

Route::group(['as'=>'student.','prefix' => 'student','namespace'=>'Student','middleware'=>['auth','student']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

//***********************************   Admin Routes   ***********************************//

Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
