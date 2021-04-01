
@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="View Batch" breadcumb1="" />

    <div class="row mb-3">
        <div class="col-md-6 font-weight-bold p-1 ">
              Students Joining Request
        </div>
        <div class="row col-md-6">
            <div class="col-md-9">
                {{-- <input  class="form-control" value="http://127.0.0.1:8000/joinclass/{{ $batch_detail->id }}" id="myInput" readonly> --}}
            </div>
            <div class="col-md-3">
                <button class="btn btn-danger btn-sm float-right" onclick="myFunction()">Copy Link</button>
            </div>
        </div>
    </div>

    <table class='table text-center '>
        <thead class='thead-light'>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>

            <th></th>
        </thead>
        <tbody class=' table-bordered'>
        {{-- {{$batchstudents}} --}}

            @foreach($Batch_joining_request as $batch)

            <tr>
                <td>Name</td>
                <td>{{ @$batch->enrollment }}</td>
                <th></th>
                <td>
                    <div class="btn-group">
                        <a href="/viewbatch/{{$batch->id}}" class="btn btn-danger btn-sm">Edit</a>
                        <button class="btn btn-secondary btn-sm "><a class="text-white" href="/dstudent/{{$batch->enrollment}}">Remove</a></button>
                    </div>

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
