

@extends('layouts.app')

@section('content')

<x-studentsidebar studentbreadcumb="Join Class" studentbreadcumb1="" />

<table class="table" style="overflow-x:auto;">
    <thead class="thead-light">
        <tr>
            <th class="col-md-2">Class Details</th>

            <th>
            {{-- <a href="" class="btn btn-sm btn-primary mr-2">Edit</a> --}}
            </th>

        </tr>
    </thead>
    {{-- {{$createdassignmentdetail}} --}}
    {{-- @foreach ($batch_detail as $b_detail) --}}

    <tbody class="table-bordered" style="font-size: 14px;">
        <tr>
        <th scope="col">Faculty Name</th>
        <th scope="col">{{@$faculty_name->name}}</th>
        </tr>
        <tr>
        <th scope="col">Faculty Email</th>
        <th scope="col">{{@$batch_detail->creater_email}}</th>
        </tr>
        <tr>
        <th scope="col">Class Name</th>
        <th scope="col">{{@$batch_detail->batch_name}}</th>
        </tr>
        <tr>
        <th scope="col">Description</th>
        <th scope="col">{{@$batch_detail->description}}</th>
        </tr>
        <tr>
        <th scope="col">Created At</th>
        <th scope="col">{{ date( 'F d, Y' , strtotime(@$batch_detail->created_at)) }}
            </th>
        </tr>
    </tbody>
    {{-- @endforeach --}}
</table>


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@else

<a href="/sendjoningrequest/{{@$batch_detail->id}}" class="btn btn-primary btn-sm">Send Joining Request</a>

@endif

{{-- {{$batch_detail}}
{{$user}} --}}



</div>
</div>
</div>
@endsection



