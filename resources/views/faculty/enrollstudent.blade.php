@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="Enroll Student" breadcumb1="" />

    <a href="/createbatch" class="btn btn-danger btn-sm mb-3">Create New Class</a>

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
                        <a href="/viewbatch/{{$batch->id}}" class="btn btn-danger btn-sm">View Class</a>
                        <a href="/classjoiningrequest/{{$batch->id}}" class="btn btn-danger btn-sm"> Joining Request</a>
                        {{-- <a href="/createbatchassignment/{{$batch->id}}" class="btn btn-danger btn-sm">Create Assignment</a> --}}
                        <button class="btn btn-secondary btn-sm " onclick="return confirm('Are you sure? This Will Delete Your All Assgnments Cretated For this Batch');"><a class="text-white" href="/dbatch/{{$batch->id}}">Delete</a></button>

                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <strong></strong> No Class Created !        </div>

    @endif


</div>

</div>
</div>
</div>
@endsection
