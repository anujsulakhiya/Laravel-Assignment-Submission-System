@extends('layouts.StudentLayout')

@section('content')


    {{-- {{$studentassignmentdetail}} --}}

    @if (!empty($studentassignmentdetail[0]->id))
        <table class="text-center table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Assignment Name</th>
                    <th scope="col">Subject</th>
                    <!-- <th scope="col">Year</th>
                    <th scope="col">Class</th> -->
                    <!-- <th scope="col">Created At</th> -->
                    <th scope="col">Last Date</th>
                    <th scope="col"> Update Status</th>
                </tr>
            </thead>
            <tbody style="font-size: 14px;">
                @foreach ($studentassignmentdetail as $assignmentdetail)
                    <tr>


                        <th>{{ $assignmentdetail->assignment_name }}</th>
                        <th>{{ $assignmentdetail->subject_name }}</th>
                        <th>{{ date('F d, Y', strtotime($assignmentdetail->last_submission_date)) }}</th>

                        <th class=""><a href="viewassignmentquestions/{{ $assignmentdetail->id }}"
                                class="btn btn-sm btn-primary">View Questions </a></th>



                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <strong>Sorry !</strong> No Assignment Created For You .
        </div>

    @endif


    </div>

    </div>
    </div>
    </div>
@endsection
