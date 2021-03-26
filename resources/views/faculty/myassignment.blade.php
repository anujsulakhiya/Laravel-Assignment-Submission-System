@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="My Assignment" breadcumb1="" />


@if (! empty($batchdetail[0]->id))

<table class='table text-center '>
    <thead class='thead-light'>
        <th>No.</th>
        <th>Class Name</th>
        <th></th>
    </thead>
    <tbody class=' table-bordered'>
    {{-- {{$batchdetail}} --}}

        @foreach($batchdetail as $batch)

        <tr>
            <td>Name</td>
            <td>{{ @$batch->batch_name }}</td>
            <td>
                <a href="/viewbatchassignment/{{$batch->id}}" class="btn btn-danger btn-sm">View Assignment</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@else
    <div class="alert alert-warning">
        <strong>No Class Created ! </strong>    <a href="/createbatch" class="btn btn-danger btn-sm ml-5">Create New Class</a>

    </div>

@endif

</div>

</div>
</div>
</div>
@endsection
