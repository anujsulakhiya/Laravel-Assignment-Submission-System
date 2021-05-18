<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">
                        <h3 class="h5">Active Batch Details</h3>
                        <h6 class="ml-3 text-dark">( Note : Select Class to See Assignments )</h6>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ">
                            @if (!empty($studentbatch))

                                <table class='table text-center '>
                                    <thead>
                                        <th>No.</th>
                                        <th>Class Name</th>
                                        <th>Faculty Name</th>
                                        <th>Faculty Email</th>
                                        <th></th>
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
                                                    <a href="/viewassignment/{{ $batch->batch_id }}"
                                                        class="btn btn-primary btn-sm my_mainpage_link">
                                                        View Assignment</a>
                                                </td>
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
