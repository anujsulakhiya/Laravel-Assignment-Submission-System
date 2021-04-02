
@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="View Batch" breadcumb1="" />

    <div class="row mb-3">
        <div class="col-md-6 font-weight-bold p-1 ">
              Students Joining Request For Class {{$batch_detail->batch_name }}
        </div>
        {{-- <div class="row col-md-6">
            <div class="col-md-9">
                <input  class="form-control" value="http://127.0.0.1:8000/joinclass/{{ $batch_detail->id }}" id="myInput" readonly>
            </div>
            <div class="col-md-3">
                <button class="btn btn-danger btn-sm float-right" onclick="myFunction()">Copy Link</button>
            </div>
        </div> --}}
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @elseif (session()->has('rmessage'))
    <div class="alert alert-warning">
        {{ session()->get('rmessage') }}
    </div>
    @endif


    @if (! empty($Batch_joining_request[0]->id))

    <table class='table text-center '>
        <thead class='thead-light'>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>

            <th></th>
        </thead>
        <tbody class=' table-bordered'>
        {{-- {{$Batch_joining_request}} --}}
        <?php $i = 1; ?>
            @foreach($Batch_joining_request as $batch)

            <tr>
                <td>{{@$i}}</td>
                <td>{{ @$batch->name }}</td>
                <td>{{ @$batch->email }}</td>
                <td>

                        <a href="/approvestudent/{{$batch->id}}" class="btn btn-success btn-sm">Approve</a>
                         <button class="btn btn-secondary btn-sm "><a class="text-white" href="/rejectstudent/{{$batch->id}}">Reject</a></button>


                </td>
            </tr>
            <?php $i++?>
            @endforeach


        </tbody>
    </table>
    @else

    <div class="alert alert-warning">
        <strong></strong> No Joining Request Found ! {!! "&nbsp;" !!}{!! "&nbsp;" !!}{!! "&nbsp;" !!} Joining Link {!! "&nbsp;" !!}-->{!! "&nbsp;" !!}{!! "&nbsp;" !!}http://127.0.0.1:8000/joinclass/{{ $batch_detail->id }}
    </div>


    @endif
</div>

</div>
</div>
</div>
@endsection
