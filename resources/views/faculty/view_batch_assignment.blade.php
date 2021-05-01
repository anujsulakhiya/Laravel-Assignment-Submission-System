<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5">Assignment Details</h3>
                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            @if (!empty($batchassignmentdetail[0]->id))

                                <table class='table text-center '>
                                    <thead>
                                        <th>No.</th>
                                        <th scope="col">Assignment Name</th>
                                        <th scope="col">Subject</th>
                                        <!-- <th scope="col">Year</th> -->
                                        <!-- <th scope="col">Class</th> -->
                                        <th scope="col">Created At</th>
                                        <th scope="col">Last Date</th>
                                        <th scope="col"> Update Status</th>
                                    </thead>
                                    <tbody>
                                        {{-- {{$batchdetail}} --}}

                                        @foreach ($batchassignmentdetail as $assignmentdetail)
                                            <tr>
                                                <td></td>
                                                <td>{{ $assignmentdetail->assignment_name }}</td>
                                                <td>{{ $assignmentdetail->subject_name }}</td>
                                                <td>{{ date('F d, Y', strtotime($assignmentdetail->created_at)) }}
                                                </td>
                                                <td>{{ date('F d, Y', strtotime($assignmentdetail->last_submission_date)) }}
                                                </td>
                                                <td>
                                                    <a href="/assignment_questions/{{ $assignmentdetail->id }}"
                                                        class="btn btn-sm btn-primary my_mainpage_link">View
                                                        Submissions</a>

                                                    <div class="btn-group">
                                                        <a href="/batchassignmentdetails/{{ $assignmentdetail->id }}"
                                                            class="btn btn-sm btn-primary my_mainpage_link">Details</a>
                                                        <button class="btn btn-secondary btn-sm "
                                                            onclick="return confirm('Are you sure? This Will Delete Your Assgnments and Assignment Questions');"><a
                                                                class="text-white"
                                                                href="/dassignment/{{ $assignmentdetail->id }}">Delete</a></button>

                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            @else
                                <div class="alert alert-warning">
                                    <strong><a class="text-primary my_mainpage_link" href="/create_assignment">Create
                                            Assignment</a></strong> No Assignment Created
                                    For this Batch !

                                </div>

                            @endif

                        </div>
                        <br>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>
