<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">
                        <h3 class="h5">All Batch Details</h3>
                        <h6 class="ml-3 text-dark">( Note : Select Class to See Assignments )</h6>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ">
                            @if (!empty($studentbatch))
                            <div class="table-responsive scroll-pane scrollbar-primary scroller">
                                <table class='table text-center '>
                                    <thead>
                                        <th>No.</th>
                                        <th style="min-width: 170px">Class Name</th>
                                        <th style="min-width: 170px">Faculty Name</th>
                                        <th style="min-width: 170px">Faculty Email</th>
                                        <th  style="min-width: 170px"></th>
                                    </thead>
                                    <tbody>
                                        {{-- {{$batchdetail}} --}}

                                        @foreach ($studentbatch as $batch)

                                            <tr>
                                                <td>Name</td>
                                                <td>{{ @$batch->batch_name }}</td>
                                                <td>{{ @$batch->name }}</td>
                                                <td>{{ @$batch->creater_email }}</td>
                                                <td>
                                                    <a href="/view_submitted_assignment/{{ $batch->batch_id }}"
                                                        class="btn btn-primary btn-sm my_mainpage_link">
                                                        View Assignment</a>
                                                </td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
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
