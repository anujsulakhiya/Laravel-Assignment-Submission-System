<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">
                        <h3 class="h5">Assignment Details</h3>
                        <h6 class="ml-3 text-dark">( Note : Select Class to See Assignments )</h6>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            @if (!empty($createdassignmentquestion[0]->id))

                                <table class='table'>
                                    <thead>
                                        <th scope="col">Questions</th>
                                        <th scope="col"></th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $j = 0;
                                        ?>
                                        @foreach ($createdassignmentquestion as $assignmentdetail)

                                            <tr>
                                                <td>Q{{ $i }} - {{ @$assignmentdetail->questions }} </td>

                                                @if (@$submitted[$j]->question_id == $assignmentdetail->id)
                                                    @if (@$submitted[$j]->status == 'R')
                                                        <td class="text-center"><a
                                                                href="/submitquestion/{{ $assignmentdetail->id }}"
                                                                class="btn btn-sm btn-primary my_mainpage_link">Submit</a>
                                                        </td>
                                                    @else
                                                        <td class="text-center text-success text-uppercase">Submitted
                                                        </td>

                                                    @endif

                                                @else
                                                    <td class="text-center"><a
                                                            href="/submitquestion/{{ $assignmentdetail->id }}"
                                                            class="btn btn-sm btn-primary my_mainpage_link">Submit</a>
                                                    </td>
                                                @endif

                                                @if (@$submitted[$j]->status == 'P')
                                                    <td class="text-center text-secondary text-uppercase">pending</td>
                                                @elseif (@$submitted[$j]->status == 'A')
                                                    <td class="text-center text-success text-uppercase">accepted</td>
                                                @elseif (@$submitted[$j]->status == 'R')
                                                    <td class="text-center text-danger text-uppercase">rejected</td>
                                                @else
                                                    <td class="text-center text-danger text-uppercase"></td>
                                                @endif

                                            </tr>
                                            <?php
                                            $i++;
                                            $j++;
                                            ?>
                                        @endforeach

                                    </tbody>
                                </table>

                            @else
                                <div class="alert alert-warning">
                                    <strong>Sorry !</strong> No Question Created For This Assignment .
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
