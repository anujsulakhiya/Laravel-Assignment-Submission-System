@extends('layouts.facultylayout')

@section('content')

    {{-- {{ $Assignment_question }}  --}}
    <table class="table table-bordered" style="overflow-x:auto;">
        <thead class="thead-light">
            <tr>
                <th scope="col">Questions</th>

                <th scope="col"></th>
            </tr>
        </thead>
        <tbody style="font-size: 14px;">
            @foreach ($Assignment_question as $question)
                <tr>

                    <th>Q --> {{ $question->questions}}</th>

                    <th class=""><a href="/viewsubmission/{{ $question->id }}" class="btn btn-sm btn-danger">View</a></th>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
