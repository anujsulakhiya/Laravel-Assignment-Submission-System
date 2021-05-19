<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/home_page" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Class
                            Details</h3>
                    </div>

                    <div class="card-body">
                        <h4 class="box-link" class="text-left"><a class="my_mainpage_link" href="/createbatch">
                                Create New Class </a>
                            <div class="col-md-6 mt-2 float-right">
                                <input class="form-control search" placeholder="Search by Class Name , Date etc"
                                    type="text" name="search" id="search">
                            </div>
                        </h4>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table">


                            @if (!empty($batchdetail[0]->id))
                            <div class="table-responsive scroll-pane scrollbar-primary scroller ">
                                <table class="table search">
                                    <thead>

                                        <tr>
                                            <th class="">S.NO.</th>
                                            <th style="min-width: 170px">Class Name</th>
                                            <th style="min-width: 300px">Student Details</th>
                                            <th style="min-width: 250px">Status</th>
                                        </tr>

                                    </thead>
                                    <tbody class="search_table">
                                        <?php
                                        $i = 1;
                                        $j = 0;
                                        ?>
                                        @foreach ($batchdetail as $batch)

                                            <tr>
                                                <td>{{ @$i }}</td>
                                                <td>{{ @$batch->batch_name }}</td>
                                                <td>Students : <span
                                                        class="badge badge-success p-2">{{ @$student_count[$j] }}</span>
                                                    &nbsp;&nbsp; Pending Requests : <span
                                                        class="badge badge-info p-2">{{ @$student_request[$j] }}</span>
                                                </td>
                                                <td class="my-1">
                                                    <div class="btn-toolbar" role="toolbar"
                                                        aria-label="Toolbar with button groups">
                                                        <div class="btn-group mr-2" role="group"
                                                            aria-label="First group">

                                                            <form action="/batch_joining_request"
                                                                onsubmit="return post_request(this)">
                                                                @csrf
                                                                <input type="hidden" name="batch_id"
                                                                    value="{{ $batch->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm my-1">
                                                                    Joining
                                                                    Request</button>
                                                            </form>
                                                            <a href="/view_batch/{{ $batch->id }}"
                                                                class="btn btn-primary btn-sm my-1 my_mainpage_link">View
                                                                Class</a>

                                                        </div>
                                                        <div class="btn-group mr-2" role="group"
                                                            aria-label="Second group">
                                                            <button type="button"
                                                                class="btn btn-dark btn-sm my-1 my_mainpage_link"
                                                                onclick="return confirm('Are you sure? This Will Delete Your All Assgnments Cretated For this Batch');"><a
                                                                    class="text-white" href=""></a>
                                                                <a href="/dbatch/{{ $batch->id }}"
                                                                    class="text-white">Delete</a></button>
                                                            @if ($batch->status == 'Active')
                                                                <a href="/deactive_batch/{{ $batch->id }}"
                                                                    class="btn btn-success text-white btn-sm my-1 my_mainpage_link">Activated</a>
                                                            @elseif ($batch->status == 'Deactive')
                                                                <a href="/active_batch/{{ $batch->id }}"
                                                                    class="btn btn-secondary btn-sm my-1 my_mainpage_link">Deactivated</a>
                                                            @endif
                                                        </div>

                                                    </div>
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
