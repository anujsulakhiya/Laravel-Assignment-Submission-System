{{-- @extends('layouts.facultylayout')

@section('content') --}}
{{-- <x-facultysidebar breadcumb="My Assignment" breadcumb1="" /> --}}


@if (!empty($batchdetail[0]->id))

    <table class='table text-center '>
        <thead class='thead-light'>
            <th>No.</th>
            <th>Class Name</th>
            <th></th>
        </thead>
        <tbody class=' table-bordered'>
            {{-- {{$batchdetail}} --}}

            @foreach ($batchdetail as $batch)

                <tr>
                    <td>Name</td>
                    <td>{{ @$batch->batch_name }}</td>
                    <td>
                        <a href="/view_batch_assignment/{{ $batch->id }}"
                            class="btn btn-primary btn-sm my_mainpage_link">View Assignment</a>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

@else
    <div class="alert alert-warning">
        <strong>No Class Created ! </strong> <a href="/createbatch" class="btn btn-primary btn-sm ml-5">Create New
            Class</a>

    </div>

@endif

</div>

</div>
</div>
</div>
{{-- @endsection --}}
<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>
