
@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="View Batch" breadcumb1="" />


    <div class="font-weight-bold p-1">{{$batch_name->batch_name}}<a href="" class=" btn btn-danger btn-sm float-right mb-3 mx-5">Add New Enrollment</a></div>

    <table class='table text-center '>
        <thead class='thead-light'>
            <th>No.</th>
            <th>Batch Name</th>
            <th></th>
        </thead>
        <tbody class=' table-bordered'>
        {{-- {{$batchstudents}} --}}

            @foreach($batchstudents as $batch)

            <tr>
                <td>Name</td>
                <td>{{ @$batch->enrollment }}</td>
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
