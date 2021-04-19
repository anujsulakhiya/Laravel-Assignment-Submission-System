@extends('layouts.StudentLayout')

@section('content')


    {{-- {{dd($studentbatch)}} --}}
    {{$studentbatch}}
    @if (!empty($studentbatch))
    <table class='table text-center '>
        <thead class='thead-light'>
            <th>No.</th>
            <th>Class Name</th>
            <th>Faculty Name</th>
            <th>Faculty Email</th>
            <th></th>
        </thead>
        <tbody class=' table-bordered'>
        {{-- {{$batchdetail}} --}}

            @foreach($studentbatch as $batch)

            <tr>
                <td>Name</td>
                <td>{{ @$batch->batch_name }}</td>
                <td>{{ @$batch->name }}</td>
                <td>{{ @$batch->creater_email }}</td>
                <td>
                    <a href="/viewassignment/{{$batch->batch_id}}" class="btn btn-primary btn-sm">View Assignment</a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
    @else
        <div class="alert alert-warning">
            <strong>Sorry !</strong> No Submission Done By You .
        </div>

    @endif


@endsection
