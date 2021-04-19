<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function profile(){

        $user = Auth::user();
        return view('common/profile', compact('user'));
    }


    public function userprofile(){

        $user = Auth::user();
        return view('common/updateprofile', compact('user'));
    }

    public function updateprofile(Request $req){

        $req->validate(['name' => 'required']);

        $user = User::where( 'email', $req->email )->first();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();

        $user = Auth::user();
        return view('common/profile', compact('user'));
    }

    public function updateuserpassword(){

        $user = Auth::user();
        return view('auth/passwords/mannualreset', compact('user'));
    }

}
