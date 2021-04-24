{{-- @extends('layouts.StudentLayout')

@section('content') --}}


    {{-- {{dd($batchassignmentdetail)}} --}}

    @if (!empty($batchassignmentdetail[0]->id))
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

                @foreach ($batchassignmentdetail as $assignmentdetail)
                    <tr>


                        <th>{{ $assignmentdetail->assignment_name }}</th>
                        <th>{{ $assignmentdetail->subject_name }}</th>
                        <th>{{ date('F d, Y', strtotime($assignmentdetail->last_submission_date)) }}</th>

                        @if (strtotime($today) <= strtotime($assignmentdetail->last_submission_date))
                            <th class=""><a href="/viewassignmentquestions/{{ $assignmentdetail->id }}"
                                    class="btn btn-sm btn-primary my_mainpage_link">View Questions </a></th>
                        @else
                                <th class="text-danger">Submission Closed</th>
                        @endif




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
{{-- @endsection --}}
<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>