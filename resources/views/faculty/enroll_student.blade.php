{{-- @extends('layouts.facultylayout')

@section('content') --}}
{{-- <x-facultysidebar breadcumb="Enroll Student" breadcumb1="" /> --}}

<a href="/createbatch" class="btn btn-primary btn-sm mb-3 my_mainpage_link">Create New Class</a>

@if (!empty($batchdetail[0]->id))
    <table class='table text-center '>
        <thead class='thead-light'>
            <th>No.</th>
            <th>Class Name</th>
            <th></th>
        </thead>
        <tbody class='table-bordered'>

            {{-- {{$batchdetail}} --}}

            @foreach ($batchdetail as $batch)

                <tr>
                    <td>Name</td>
                    <td>{{ @$batch->batch_name }}</td>
                    <td>
                        <a href="/view_batch/{{ $batch->id }}" class="btn btn-primary btn-sm my_mainpage_link">View Class</a>
                        <a href="/class_joining_request/{{ $batch->id }}" class="btn btn-primary btn-sm my_mainpage_link"> Joining
                            Request</a>
                        {{-- <a href="/createbatchassignment/{{$batch->id}}" class="btn btn-primary btn-sm">Create Assignment</a> --}}
                        <button class="btn btn-secondary btn-sm "
                            onclick="return confirm('Are you sure? This Will Delete Your All Assgnments Cretated For this Batch');"><a
                                class="text-white" href="/dbatch/{{ $batch->id }}">Delete</a></button>

                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
@else
    <div class="alert alert-warning">
        <strong></strong> No Class Created !
    </div>

@endif


</div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>
{{-- @endsection --}}
