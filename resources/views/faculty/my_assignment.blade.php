<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">

                        <div class="col-md-6 float-left m-0 p-0">
                            <h3 class="h5"><a href="/home_page"
                                    class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Assignment Details</h3>
                        </div>
                        <div class="col-md-6 float-right">
                            <input class="form-control search" placeholder="Search by Class Name , Date etc" type="text"
                                name="search" id="search">
                        </div>
                        {{-- <h6 class="ml-3 text-dark">( Note : Select Class to See Assignments )

                        </h6> --}}
                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ">
                            @if (!empty($batchdetail[0]->id))
                            <div class="table-responsive scroll-pane scrollbar-primary scroller ">
                                <table class='table search'>
                                    <thead>
                                        <th>No.</th>
                                        <th style="min-width: 170px">Class Name</th>
                                        <th style="min-width: 150px">Status</th>
                                        <th style="min-width: 150px"></th>
                                    </thead>
                                    <tbody class="search_table">
                                        {{-- {{$batchdetail}} --}}
                                        @php
                                           $i = 1; $j = 0;
                                        @endphp
                                        @foreach ($batchdetail as $batch)

                                            <tr>
                                                <td>{{$i }}</td>
                                                <td>{{ @$batch->batch_name }}</td>
                                                <td>Assignments  : <span class="badge badge-success p-2">{{@$assignment_count[$j]}}</span></td>
                                                <td>
                                                    <a href="/view_batch_assignment/{{ $batch->id }}" id=""
                                                        class="btn btn-primary btn-sm store_batch_id  my_mainpage_link ">View
                                                        Assignment</a>
                                                </td>
                                            </tr>
                                            @php
                                               $i++; $j++;
                                            @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
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
