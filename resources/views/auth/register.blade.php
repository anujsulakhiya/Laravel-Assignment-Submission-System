@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-5">
            <div class="card">
                <div class="card-header text-center text-white bg-danger"><i class="fa fa-user-secret mr-2 "></i>{{ __('Admin Register') }}</div>

                <div class="card-body shadow-lg p-2">
                    <form method="POST" class="mt-3" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <i class="fa fa-user ml-3"></i><label for="name" class="font-weight-bold pl-2">Name</label>
                            <div class="col-md-12 ">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-user ml-3"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-key ml-3"></i><label for="password_confirmation" class="font-weight-bold pl-2">Confirm Password</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="alert alert-warning text-danger ml-3">Notice : You are Sending Request for Admin Login
                            <input type="hidden" name="role" class="form-control" required value="pending_admin"  id="role">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-danger mt-3 btn-block shadow-sm font-weight-bold">
                                    {{ __('Send Request') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
