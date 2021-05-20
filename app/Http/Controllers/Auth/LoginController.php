<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
// use Socialite;
use Exception;
use App\User;

use Google_Client;
use Google_Service_Drive;

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

        if (Auth::check() && Auth::user()->role_id == NULL) {
            return redirect()->route('/set_profile');
        } else {
            $this->redirectTo = route('home');
        }



        // if (Auth::check() && Auth::user()->role_id == 1) {

        // } elseif (Auth::check() && Auth::user()->role_id == 2) {
        //     $this->redirectTo = route('home');
        // } elseif (Auth::check() && Auth::user()->role_id == 3) {
        //     $this->redirectTo = route('home');
        // }


        $this->middleware('guest')->except('logout');
    }

    // public function googleLogin(Request $request)
    // {
    //     $google_redirect_url = route('glogin');
    //     $gClient = new \Google_Client();
    //     $gClient->setApplicationName(config('services.google.app_name'));
    //     $gClient->setClientId(config('services.google.client_id'));
    //     $gClient->setClientSecret(config('services.google.client_secret'));
    //     $gClient->setRedirectUri($google_redirect_url);
    //     $gClient->setDeveloperKey(config('services.google.api_key'));
    //     $gClient->setScopes(array(
    //         'https://www.googleapis.com/auth/plus.me',
    //         'https://www.googleapis.com/auth/userinfo.email',
    //         'https://www.googleapis.com/auth/userinfo.profile',
    //     ));
    //     $google_oauthV2 = new \Google_Service_Oauth2($gClient);
    //     if ($request->get('code')) {
    //         $gClient->authenticate($request->get('code'));
    //         $request->session()->put('token', $gClient->getAccessToken());
    //     }
    //     if ($request->session()->get('token')) {
    //         $gClient->setAccessToken($request->session()->get('token'));
    //     }
    //     if ($gClient->getAccessToken()) {
    //         //For logged in user, get details from google using access token
    //         $guser = $google_oauthV2->userinfo->get();

    //         $request->session()->put('name', $guser['name']);
    //         if ($user = User::where('email', $guser['email'])->first()) {
    //             //logged your user via auth login
    //         } else {
    //             //register your user with response data
    //         }
    //         return redirect()->route('user.glist');
    //     } else {
    //         //For Guest user, get google login url
    //         $authUrl = $gClient->createAuthUrl();
    //         return redirect()->to($authUrl);
    //     }
    // }
    // public function listGoogleUser(Request $request)
    // {
    //     $users = User::orderBy('id', 'DESC')->paginate(5);
    //     return view('users.list', compact('users'))->with('i', ($request->input('page', 1) - 1) * 5);;
    // }
    public function redirectToGoogle()

    {
        // dd('1');
        return Socialite::driver('google')->redirect();
    }



    public function handleGoogleCallback()

    {
        // dd('2');

        try {

            $user = Socialite::driver('google')->user();

            // dd($user);
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/home');
            } else {

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    // 'role_id' => '1',

                    'google_id' => $user->id

                ]);

                // dd($newUser);

                Auth::login($newUser);

                return redirect()->back();
            }
        } catch (Exception $e) {

            // dd($e);
            return redirect('/login');
        }
    }
}
