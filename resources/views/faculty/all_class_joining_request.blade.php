<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/home_page" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>All Class Joining Request</h3>
                    </div>

                    <div class="card-body">
                        <h4 class="box-link" class="text-left"><a class="my_mainpage_link" href="/createbatch">
                                 </a>
                            <div class="col-md-6 float-right">
                                <input class="form-control search" placeholder="Search by Class Name , Date etc"
                                    type="text" name="search" id="search">
                            </div>
                        </h4>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">

                            @if (!empty($batchdetail[0]->id))
                                <table class="table search">
                                    <thead>

                                        <tr>
                                            <th class="">S.NO.</th>
                                            <th>Class Name</th>
                                            <th>Student Details</th>
                                            <th>Status</th>
                                        </tr>

                                    </thead>
                                    <tbody class="search_table">
                                        <?php $i = 1; $j=0;?>
                                        @foreach ($batchdetail as $batch)

                                            <tr>
                                                <td>{{ @$i }}</td>
                                                <td>{{ @$batch->batch_name }}</td>
                                                <td>Students : <span class="badge badge-success p-2">{{@$student_count[$j]}}</span>  &nbsp;&nbsp; Pending Requests : <span class="badge badge-info p-2">{{@$student_request[$j]}}</span> </td>
                                                <td class="my-1">


                                                    <a href="/view_batch/{{ $batch->id }}"
                                                        class="btn btn-primary btn-sm my-1 my_mainpage_link">View
                                                        Class</a>

                                                    <a href="/class_joining_request/{{ $batch->id }}"
                                                        class="btn btn-danger btn-sm my-1 my_mainpage_link"> Joining
                                                        Request</a>

                                                    {{-- <a href="/createbatchassignment/{{ $batch->id }}"
                                                        class="btn btn-success btn-sm my-1 my_mainpage_link">Create
                                                        Assignment</a> --}}



                                                    <button class="btn btn-dark btn-sm "
                                                        onclick="return confirm('Are you sure? This Will Delete Your All Assgnments Cretated For this Batch');">
                                                        <a class="text-white my-1"
                                                            href="/dbatch/{{ $batch->id }}">Delete</a>
                                                    </button>

                                                    @if ($batch->status == 'Active')
                                                        <a href="/deactive_batch/{{ $batch->id }}"
                                                            class="btn btn-success text-white btn-sm my-1 my_mainpage_link">Activated</a>
                                                    @elseif ($batch->status == 'Deactive')
                                                        <a href="/active_batch/{{ $batch->id }}"
                                                            class="btn btn-secondary btn-sm my-1 my_mainpage_link">Deactivated</a>
                                                    @endif

                                                </td>
                                            </tr>
                                            <?php $i++; $j++ ?>
                                        @endforeach


                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-warning">
                                    <strong></strong> No Class Created !
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
