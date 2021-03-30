@extends('layouts.app')

@section('content')

<x-studentsidebar studentbreadcumb="Submit Assignment" studentbreadcumb1="" />

{{-- {{dd($studentassignmentdetail[0]->id)}} --}}

@if (! empty($createdassignmentquestion[0]->id))

    <table class="table table-bordered ">
        <thead class="thead-light">
            <tr class="text-center">
                <th scope="col">Questions</th>
                <th scope="col"></th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="font-size: 14px;">
            <?php $i=1; ?>
            @foreach ($createdassignmentquestion as $assignmentdetail)

                <tr>
                    <th>Q{{ $i }} - {{ $assignmentdetail->questions }} </th>

                        {{-- <th class="text-center text-success text-uppercase">Submitted</th> --}}
                                <th class=""><a href="/submitquestion/{{ $assignmentdetail->id}}" class="btn btn-sm btn-danger">Submit</a></th>

                </tr>
                <?php $i++; ?>
                @endforeach
    </tbody>
    </table>

@else
    <div class="alert alert-warning">
        <strong>Sorry !</strong> No Assignment Created For You .
    </div>

@endif


</div>

</div>
</div>
</div>
@endsection
