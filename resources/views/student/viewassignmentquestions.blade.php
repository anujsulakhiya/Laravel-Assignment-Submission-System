@extends('layouts.app')

@section('content')

    <x-studentsidebar studentbreadcumb="View Assignment Question" studentbreadcumb1="" />

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
                <?php $i = 1; $j = 0; ?>
                @foreach ($createdassignmentquestion as $assignmentdetail)

                    <tr>
                        <th>Q{{ $i }} - {{ @$assignmentdetail->questions }} </th>

                        @if (@$submitted[$j]->question_id == $assignmentdetail->id )

                            <th class="text-center text-success text-uppercase">Submitted</th>


                        @else

                            <th class="text-center"><a href="/submitquestion/{{ $assignmentdetail->id }}"
                                    class="btn btn-sm btn-primary">Submit</a></th>

                        @endif
                        <th></th>

                    </tr>
                    <?php $i++; $j++;?>
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
@endsection
