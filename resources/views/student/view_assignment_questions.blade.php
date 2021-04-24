{{-- @extends('layouts.StudentLayout')

@section('content') --}}
{{-- {{dd($submitted)}} --}}

@if (!empty($createdassignmentquestion[0]->id))

    <table class="table table-bordered ">
        <thead class="thead-light">
            <tr class="text-center">
                <th scope="col">Questions</th>
                <th scope="col"></th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="font-size: 14px;">
            <?php
            $i = 1;
            $j = 0;
            ?>
            @foreach ($createdassignmentquestion as $assignmentdetail)

                <tr>
                    <th>Q{{ $i }} - {{ @$assignmentdetail->questions }} </th>

                    @if (@$submitted[$j]->question_id == $assignmentdetail->id)
                        @if (@$submitted[$j]->status == 'R')
                            <th class="text-center"><a href="/submitquestion/{{ $assignmentdetail->id }}"
                                    class="btn btn-sm btn-primary my_mainpage_link">Submit</a></th>
                        @else
                            <th class="text-center text-success text-uppercase">Submitted</th>

                        @endif

                    @else
                        <th class="text-center"><a href="/submitquestion/{{ $assignmentdetail->id }}"
                                class="btn btn-sm btn-primary my_mainpage_link">Submit</a></th>
                    @endif

                    @if (@$submitted[$j]->status == 'P')
                        <th class="text-center text-secondary text-uppercase">pending</th>
                    @elseif (@$submitted[$j]->status == 'A')
                        <th class="text-center text-success text-uppercase">accepted</th>
                    @elseif (@$submitted[$j]->status == 'R')
                        <th class="text-center text-danger text-uppercase">rejected</th>
                    @else
                        <th class="text-center text-danger text-uppercase"></th>
                    @endif

                    {{-- {{ @$submitted[$j]->status }} --}}


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

</div>
</div>
</div>
{{-- @endsection --}}
<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>
