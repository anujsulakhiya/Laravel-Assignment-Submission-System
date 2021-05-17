<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Socialite;
use Exception;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        if (Auth::check() && Auth::user()->role_id == 1) {
            $this->redirectTo = view('faculty.home_page');
        } elseif (Auth::check() && Auth::user()->role_id == 2) {
            $this->redirectTo = view('student.home_page');
        } elseif (Auth::check() && Auth::user()->role_id == 3) {
            $this->redirectTo = view('admin.home_page');
        }


        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();
    }



    public function handleGoogleCallback()

    {

        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/home');

            } else {

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'role_id' => '1',

                    'google_id' => $user->id

                ]);

                Auth::login($newUser);

                return redirect()->back();
            }
        } catch (Exception $e) {

            return redirect('auth/google');
        }
    }
}
