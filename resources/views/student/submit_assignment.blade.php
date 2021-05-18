<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">
                        <h3 class="h5">Assignment Details</h3>
                        <h6 class="ml-3 text-dark">( Note : Select Assignment to View Questions )</h6>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ">
                            @if (!empty($batchassignmentdetail[0]->id))

                                <table class='table text-center '>
                                    <thead>
                                        <th scope="col">Assignment Name</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Last Date</th>
                                        <th scope="col"> Update Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($batchassignmentdetail as $assignmentdetail)
                                            <tr>


                                                <td>{{ $assignmentdetail->assignment_name }}</td>
                                                <td>{{ $assignmentdetail->subject_name }}</td>
                                                <td>{{ date('F d, Y', strtotime($assignmentdetail->last_submission_date)) }}
                                                </td>

                                                @if (strtotime($today) <= strtotime($assignmentdetail->last_submission_date))
                                                    <td class=""><a
                                                            href="/viewassignmentquestions/{{ $assignmentdetail->id }}"
                                                            class="btn btn-sm btn-primary my_mainpage_link">View
                                                            Questions </a></td>
                                                @else
                                                    <td class="text-danger">Submission Closed</td>
                                                @endif




                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            @else
                                <div class="alert alert-warning">
                                    <strong>Sorry !</strong> No Submission Done By You .
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
