@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="Assignment Detail" breadcumb1="" />


<table class="table" style="overflow-x:auto;">
    <thead class="thead-light">
        <tr>
            <th class="col-md-2">Details</th>

            <th>
            <a href="" class="btn btn-sm btn-danger mr-2">Edit</a>
            </th>

        </tr>
    </thead>
    {{-- {{$createdassignmentdetail}} --}}
    @foreach ($createdassignmentdetail as $assignmentdetail)

    <tbody class="table-bordered" style="font-size: 14px;">
        <tr>
        <th scope="col">Batch Name</th>
        <th scope="col">{{@$assignmentdetail->batch_id}}</th>
        </tr>
        <tr>
        <th scope="col">Subject Name</th>
        <th scope="col">{{@$assignmentdetail->subject_name}}</th>
        </tr>
        <tr>
        <th scope="col">Assignment Name</th>
        <th scope="col">{{@$assignmentdetail->assignment_name}}</th>
        </tr>
        <tr>
        <th scope="col">Description</th>
        <th scope="col">{{@$assignmentdetail->description}}</th>
        </tr>
        <tr>
        <th scope="col">Last Date</th>
        <th scope="col">{{@$assignmentdetail->last_submission_date}}</th>
        </tr>
    </tbody>
    @endforeach
</table>
<div class="mt-3 text-centers" style="overflow-y:auto;overflow-x:auto;max-height:500px;">
<table class="table table-bordered" style="overflow-x:auto;">
        <thead class="thead-light">
            <tr>
                <th scope="col">Questions</th>

                <th scope="col">
                <div class="btn-group">
                    <a href="" class="btn btn-sm btn-danger">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Add</a>
                </div>
                </th>
            </tr>
        </thead>
        <tbody style="font-size: 14px;">
            @foreach ($createdassignmentquestion as $assignmentquestion)
            <tr>

                <th>{{$assignmentquestion->questions}}</th>

                <th class=""><a href="" class="btn btn-sm btn-secondary">Remove</a></th>
            </tr>
            @endforeach

    </tbody>
</table>
</div>

</div>

</div>
</div>
</div>
@endsection
