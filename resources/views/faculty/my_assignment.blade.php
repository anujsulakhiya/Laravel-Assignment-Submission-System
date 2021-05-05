<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">

                        <div class="col-md-6 float-left">
                            <h3 class="h5">Assignment Details</h3>
                        </div>
                        <div class="col-md-6 float-right">
                            <input class="form-control search" placeholder="Search by Class Name , Date etc"
                                type="text" name="search" id="search">
                        </div>
                        {{-- <h6 class="ml-3 text-dark">( Note : Select Class to See Assignments )

                        </h6> --}}
                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            @if (!empty($batchdetail[0]->id))

                                <table class='table search'>
                                    <thead>
                                        <th>No.</th>
                                        <th>Class Name</th>
                                        <th></th>
                                    </thead>
                                    <tbody class="search_table">
                                        {{-- {{$batchdetail}} --}}

                                        @foreach ($batchdetail as $batch)

                                            <tr>
                                                <td>Name</td>
                                                <td>{{ @$batch->batch_name }}</td>
                                                <td>
                                                    <a href="/view_batch_assignment/{{ $batch->id }}"
                                                        class="btn btn-primary btn-sm my_mainpage_link">View
                                                        Assignment</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            @else
                                <div class="alert alert-warning">
                                    <strong>No Class Created ! </strong> <a href="/createbatch"
                                        class="btn btn-primary btn-sm ml-5">Create New
                                        Class</a>

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
