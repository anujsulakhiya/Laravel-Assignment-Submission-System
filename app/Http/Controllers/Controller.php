<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\User_activity_log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function user_log_activity($req){

    //     $log = new User_activity_log;
    //     $log->user_name = $req->user_name;
    //     $log->description = $req->description;
    //     $log->detail = $req->detail;
    //     $log->properties = $req->properties;
    //     $log->save();

    // }

}
