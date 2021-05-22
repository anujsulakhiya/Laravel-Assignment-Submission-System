<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">

                        <div class="col-md-6 float-left p-0">
                            <h3 class="h5"><a href="/my_assignment"
                                    class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Assignment Details of {{$batch_detail->batch_name}}</h3>
                        </div>
                        <div class="col-md-6 float-right">
                            <input class="form-control search"
                                placeholder="Search by Subject Name , Assignment Name , Last Date etc" type="text"
                                name="search" id="search">
                        </div>
                        {{-- <h6 class="ml-3 text-dark">( Note : Select Class to See Assignments )

                        </h6> --}}
                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ">
                            @if (!empty($batchassignmentdetail[0]->id))
                                <div class="table-responsive scroll-pane scrollbar-primary scroller ">
                                    <table class='table text-center search'>
                                        <thead>
                                            <th>No.</th>
                                            <th scope="col" style="min-width: 170px">Assignment Name</th>
                                            <th scope="col" style="min-width: 150px">Subject</th>
                                            <!-- <th scope="col">Year</th> -->
                                            <!-- <th scope="col">Class</th> -->
                                            <th scope="col" style="min-width: 170px">Created At</th>
                                            <th scope="col" style="min-width: 170px">Last Date</th>
                                            <th scope="col" style="min-width: 250px"> Update Status</th>
                                        </thead>
                                        <tbody class="search_table">
                                            {{-- {{$batchdetail}} --}}
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($batchassignmentdetail as $assignmentdetail)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $assignmentdetail->assignment_name }}</td>
                                                    <td>{{ $assignmentdetail->subject_name }}</td>
                                                    <td>{{ date('F d, Y', strtotime($assignmentdetail->created_at)) }}
                                                    </td>
                                                    <td>{{ date('F d, Y', strtotime($assignmentdetail->last_submission_date)) }}
                                                    </td>
                                                    <td>

                                                        <div class="btn-group mr-2" role="group"
                                                            aria-label="First group">

                                                            <a href="/assignment_questions/{{ $assignmentdetail->id }}"
                                                                class="btn btn-sm btn-primary my_mainpage_link">View
                                                                Submissions</a>
                                                            <a href="/viewsubmittionreport/{{$batch_detail->id}}/{{ $assignmentdetail->id }}"
                                                                class="btn btn-sm btn-success my_mainpage_link">View
                                                                Report</a>

                                                        </div>

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
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
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
        serach_and_pagination();



    });

</script>
