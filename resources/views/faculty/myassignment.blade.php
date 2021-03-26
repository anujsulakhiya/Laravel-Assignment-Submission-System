@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="My Assignment" breadcumb1="" />

<table class='table text-center '>
    <thead class='thead-light'>
        <th>No.</th>
        <th>Batch Name</th>
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

</div>

</div>
</div>
</div>
@endsection
