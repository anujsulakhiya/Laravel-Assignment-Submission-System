{{-- @extends('layouts.facultylayout')
@section('content') --}}

    {{-- <x-facultysidebar breadcumb="Batch Assignment" breadcumb1="" /> --}}

    @if (!empty($batchassignmentdetail[0]->id))

        <table class="text-center table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Assignment Name</th>
                    <th scope="col">Subject</th>
                    <!-- <th scope="col">Year</th> -->
                    <!-- <th scope="col">Class</th> -->
                    <th scope="col">Created At</th>
                    <th scope="col">Last Date</th>
                    <th scope="col"> Update Status</th>
                </tr>
            </thead>
            <tbody style="font-size: 14px;">
                @foreach ($batchassignmentdetail as $assignmentdetail)
                    <tr>
                        <th>{{ $assignmentdetail->assignment_name }}</th>
                        <th>{{ $assignmentdetail->subject_name }}</th>
                        <th>{{ date('F d, Y', strtotime($assignmentdetail->created_at)) }}</th>
                        <th>{{ date('F d, Y', strtotime($assignmentdetail->last_submission_date)) }}</th>
                        <th>
                            <a href="/assignment_questions/{{ $assignmentdetail->id }}" class="btn btn-sm btn-primary my_mainpage_link">View Submissions</a>

                            <div class="btn-group">
                                <a href="/batchassignmentdetails/{{ $assignmentdetail->id }}"
                                    class="btn btn-sm btn-primary my_mainpage_link">Details</a>
                                <button class="btn btn-secondary btn-sm "
                                    onclick="return confirm('Are you sure? This Will Delete Your Assgnments and Assignment Questions');"><a
                                        class="text-white"
                                        href="/dassignment/{{ $assignmentdetail->id }}">Delete</a></button>

                            </div>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <strong><a class="text-primary" href="/createassignment">Create Assignment</a></strong> No Assignment Created
            For this Batch !
        </div>

    @endif



    </div>

    </div>
    </div>
    </div>
{{-- @endsection --}}
<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>
