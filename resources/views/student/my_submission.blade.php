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
                                <div class="table-responsive scroll-pane scrollbar-primary scroller">

                                    <table class='table text-center '>
                                        <thead>
                                            <th>No.</th>
                                            <th>Class Name</th>
                                            <th>Faculty Name</th>
                                            <th>Faculty Email</th>
                                            <th>Assignment</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            {{-- {{$batchdetail}} --}}
                                            @php
                                                $i = 1; $j = 0;
                                            @endphp
                                            @foreach ($studentbatch as $batch)

                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td style="min-width: 170px">{{ @$batch->batch_name }}</td>
                                                    <td style="min-width: 170px">{{ @$batch->name }}</td>
                                                    <td style="min-width: 170px">{{ @$batch->creater_email }}</td>
                                                    <td style="min-width: 170px">Assignments  : <span class="badge badge-success p-2">{{@$assignment_count[$j]}}</span></td>
                                                    <td style="min-width: 170px">
                                                        <a href="/viewassignment/{{ $batch->batch_id }}"
                                                            class="btn btn-primary btn-sm my_mainpage_link">
                                                            View Assignment</a>
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
