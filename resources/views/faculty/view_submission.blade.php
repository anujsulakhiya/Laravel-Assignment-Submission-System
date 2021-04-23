{{-- @extends('layouts.facultylayout')

@section('content') --}}
    {{-- {{ $Submitted_Assignment_question }} --}}

    <table class="table table-bordered" style="overflow-x:auto;">
        <thead class="thead-light">
            <tr>
                <th scope="col">Question</th>
            </tr>
        </thead>
        <tbody style="font-size: 14px;">
            <tr>
                <th>
                    Q . {{ $Assignment_question->questions }}
                </th>
            </tr>
        </tbody>
        <thead class="thead-light">
            <tr>
                <th scope="col">Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Submitted_Assignment_question as $submission_details)

                <tr>
                    <th>
                        <label for="">Name : {{ $submission_details->name }}</label>
                        <label class="ml-4" for="">Enrollment : {{ $submission_details->enrollment }}</label>
                        <label class="float-right" id="status" for="">Status : {{ $submission_details->status }} </label>
                        <input type="hidden" name="submission_id" value="{{ $submission_details->id }}">
                        <textarea type="text" id="qanswer" name="qanswer" class="form-control" oncopy="return false"
                            onpaste="return false" oncut="return false"
                            readonly>{{ $submission_details->qanswer }}</textarea>

                <form class="my-2" action="" enctype='multipart/form-data' method="POST">
                    <a target="_blank" href="{{Storage::url($submission_details->filename)}}"
                        class="btn btn-secondary btn-sm">View pdf</a>
                    <input type="hidden" name="question_id" value="">
                    <input type="hidden" name="enrollment" value="">

                    <a class="btn btn-danger btn-sm" href="/accept/{{$submission_details->id}}" id="">Accept</a>
                    {{-- <button class="btn btn-danger btn-sm" type="submit" name="accept" id="">Accept</button> --}}
                    <!-- <button class="btn btn-secondary btn-sm" type="submit" name="reject">Reject</button> -->
                    <a href="/reject/{{$submission_details->id}}" class="btn btn-secondary btn-sm">Reject</a>
                </form>
                    </th>

                </tr>

            @endforeach
        </tbody>
    </table>
    
{{-- @endsection --}}
{{-- {{Storage::url('app/uploads/'.$submission_details->filename)} --}}
