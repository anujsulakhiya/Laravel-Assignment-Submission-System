
{{-- <x-facultysidebar breadcumb="" breadcumb1="" /> --}}

@extends('layouts.facultylayout')

@section('content')


<div  style="padding-right:0px; padding-left: 0px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5" id="maincontent">
            <div class="card">
                <div class="card-header">{{ __('Faculty Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
