@extends('layouts.app')

@section('content')
<div class="fluid-container back-image-login">
    <div class="row justify-content-center" >
        <div class="col-md-5 mx-3 mt-5">
            <div class="card">

                <div class="card-header text-center text-white bg-danger"> <i class="fa fa-user mr-2 "></i>{{ __('User Login') }}</div>

                <div class="card-body shadow-lg p-2">
                    @if (session('alert'))
                    <div class="alert alert-warning">
                        {{ session('alert') }}
                    </div>
                @endif
                    <form method="POST" class="mt-3" action="{{ route('login') }}">
                        @csrf

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

                                <button type="submit" class="btn btn-outline-danger btn-block mt-3 shadow-sm ">
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
</div>
@endsection
