<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/home_page" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Global
                            Class Details</h3>
                    </div>

                    <div class="card-body">
                        <h4 class="box-link" class="text-left">
                            {{-- <a class="my_mainpage_link" href="/createbatch">
                                Create New Class </a> --}}
                            @if (session()->has('req'))
                                <div class="alert alert-success">
                                    {{ session()->get('req') }}
                                </div>
                            @endif

                            <div class="col-md-6 float-right">
                                <input class="form-control search"
                                    placeholder="Search by Class Name , Faculty Email , Date etc" type="text"
                                    name="search" id="search">
                            </div>
                        </h4>

                    </div>

                    {{-- {{$batch_id}} --}}

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">

                            @if (!empty($batchdetail[0]->id))
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th scope="col">S.NO.</th>
                                                <th scope="col">Class Name</th>
                                                <th scope="col">Faculty</th>
                                                <th scope="col">Student Details</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Status</th>

                                            </tr>
                                        </thead>
                                        <tbody class="search_table">
                                            <?php
                                            $i = 1;
                                            $j = 0;
                                            ?>
                                            @foreach ($batchdetail as $batch)

                                                <tr>
                                                    <td scope="row">{{ @$i }}</td>
                                                    <td>{{ @$batch->batch_name }}</td>
                                                    <td>{{ @$batch->creater_email }}</td>
                                                    <td class="">Students Joined  :  <span class="badge badge-success">{{$student_count[$j]}}</span> </td>
                                                    <td class="">
                                                        {{ date('F d, Y', strtotime($batch->created_at)) }}</td>
                                                    <td class="my-1">

                                                        <a href="/view_batch/{{ $batch->id }}"
                                                            class="btn btn-primary btn-sm my-1 mx-1 my_mainpage_link">View
                                                            Class</a>

                                                        {{-- <a href="/sendjoningrequest_from_global/{{ $batch->id }}"
                                                            class="btn btn-success btn-sm my-1 my_mainpage_link">
                                                            Send Joining Request</a> --}}
                                                        {{-- @if (isset(@$batch->id) && @$batch->id == @$exists[$j]->batch_id))
                                                            <span>Yes</span>
                                                        @else
                                                            <span>No</span>
                                                        @endif --}}
                                                        {{-- {{$user_role}} --}}
                                                        @if ($user_role == 2)
                                                            {{-- {{ $batch->request_status }} --}}

                                                            @if ($batch->status == 'Active')

                                                                @if ($batch->request_status)

                                                                    @if ($batch->request_status == 'P')

                                                                        <span>Request Pending</span>

                                                                    @elseif($batch->request_status == 'A')

                                                                        <a href="/viewassignment/{{ $batch->id }}"
                                                                            class="btn btn-info btn-sm my-1 my_mainpage_link">
                                                                            View Assignments</a>

                                                                    @endif

                                                                @else

                                                                    <a href="/sendjoningrequest_from_global/{{ $batch->id }}"
                                                                        class="btn btn-success btn-sm my-1 my_mainpage_link">
                                                                        Send Joining Request</a>

                                                                @endif
                                                            @else
                                                                <span class="text-danger">Class Deactivated</span>
                                                            @endif
                                                            {{-- {{-- @else --}}

                                                        @endif


                                                        {{-- <a href="/createbatchassignment/{{ $batch->id }}"
                                                        class="btn btn-success btn-sm my-1 my_mainpage_link">Create Assignment</a> --}}

                                                        {{-- {{ $items[$j] }} --}}


                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                                $j++;
                                                ?>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

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
