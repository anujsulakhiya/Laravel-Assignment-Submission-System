@extends('layouts.loginlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group" style="margin-top: 100px">
                    <div class="card p-4  ">
                        <div class="card-body">
                            <h1>Login</h1>

                            <p class="text-muted">Sign In to your account</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}"
                                        name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="{{ __('Password') }}"
                                        name="password" required>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                                    </div>
                            </form>
                            <div class="col-7 text-right">
                                <a href="{{ route('password.request') }}"
                                    class="btn btn-link px-0">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        </div>
                        <hr>

                        <div class="socl-signup">
                            <p>or sign in using
                                <a href="{{ url('auth/google') }}" class="">
                                    <img src="{{ asset('assets/images/btn_google_light_focus_ios.png') }}" alt="">
                                </a>
                            </p>
                        </div>
                        {{-- <div class="row">
                            <p class="text-muted mt-3">Or Contini</p>

                            <div class="col-7 text-right">
                                <a href="{{ url('auth/google') }}" class="">
                                    <img src="{{ asset('assets/images/btn_google_signin_light_normal_web.png') }}" alt="">
                                </a>
                            </div>
                        </div> --}}

                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>Welcome to Assignment Submission System Register Your Self To Continue .</p>
                            @if (Route::has('password.request'))
                                <a href="/#register" class="btn btn-primary active mt-3">{{ __('Register') }}</a>
                            @endif
                            <a href="/" class="btn btn-primary active mt-3">{{ __('Home') }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('javascript')

@endsection
