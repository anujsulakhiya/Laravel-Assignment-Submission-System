{{-- @extends('layouts.facultylayout')

@section('content') --}}

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

                    <th class=""><a href="/view_submission/{{ $question->id }}" class="btn btn-sm btn-danger my_mainpage_link ">View</a></th>
                </tr>
            @endforeach

        </tbody>
    </table>

{{-- @endsection --}}
<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>
