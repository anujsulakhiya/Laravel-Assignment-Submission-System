@extends('layouts.loginlayout')

@section('content')
{{-- <div class="fluid-container back-image-login">
    <div class="row justify-content-center" >
        <div class="col-md-5 mx-3 mt-5">
            <div class="card">

                <div class="card-header text-center text-white bg-primary"> <i class="fa fa-user mr-2 "></i>{{ __('User Login') }}</div>

                <div class="card-body shadow-lg p-2">
                    @if (session('alert'))
                    <div class="alert alert-warning">
                        {{ session('alert') }}
                    </div>
                @endif
                    <form method="POST" class="mt-3" action="{{ route('login') }}">
                        @csrf
                        <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">

                            <strong>Login With Google</strong></a>
                        <div class="form-group">
                            <i class="fa fa-user  ml-3"></i><label for="email" class="font-weight-bold pl-2">Email</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-key ml-3"></i><label for="password" class="font-weight-bold pl-2">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12">

                                <button type="submit" class="btn btn-outline-primary btn-block mt-3 shadow-sm ">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))

                                    <a class="btn btn-link text-secondary" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>

                </div>

                    <a class="btn btn-outline-secondary btn-block mt-3 shadow-sm " href="/">
                        {{ __('Back to Home') }}
                    </a>


            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group" style="margin-top: 100px">
          <div class="card p-4  ">
            <div class="card-body">
              <h1>Login</h1>

              <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">

                <strong>Login With Google</strong></a>
              <p class="text-muted">Sign In to your account</p>
              <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <svg class="c-icon">
                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                      </svg>
                    </span>
                  </div>
                  <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autofocus>
                  </div>
                  <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <svg class="c-icon">
                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                      </svg>
                    </span>
                  </div>
                  <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
                  </div>
                  <div class="row">
                  <div class="col-5">
                      <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                  </div>
                  </form>
                  <div class="col-7 text-right">
                      <a href="{{ route('password.request') }}" class="btn btn-link px-0">{{ __('Forgot Your Password?') }}</a>
                  </div>
                  </div>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div >
                <h2>Sign up</h2>
                <p >Welcome to Assignment Submission System Register Your Self To Continue .</p>
                @if (Route::has('password.request'))
                  <a href="{{ route('register') }}" class="btn btn-primary active mt-3">{{ __('Register') }}</a>
                @endif
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
