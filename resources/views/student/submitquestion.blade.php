@extends('layouts.app')

@section('content')

    <x-studentsidebar studentbreadcumb="Submit Question " studentbreadcumb1="" />



    <form class="" action="{{ route('student.submit_answer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered" style="overflow-x:auto;">

            <thead class="thead-light">
                <tr>
                    <th scope="col">Question</th>
                </tr>
            </thead>
            <tbody style="font-size: 14px;">
                <tr>
                    <th>
                        Q . {{ $createdassignmentquestion->first()->questions }}
                        <input type="hidden" name="question_id" value="{{ $createdassignmentquestion->first()->id }}">
                    </th>
                </tr>
                <tr>
                    <th>
                        <div>

                            <label for="">ANSWER</label>
                            <span class="text-danger"></span>
                            <textarea type="text" id="qanswer" name="qanswer" rows="6"
                            class="form-control @error('qanswer') is-invalid @enderror" oncopy="return false"
                            onpaste="return false" oncut="return false"></textarea>
                        @error('qanswer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="">Only Pdf</label>
                        <input type="file" name="myfile" class="mt-2" value="">

                    </div>
                </th>
            </tr>
        </tbody>
    </table>


    <div class="mb-2 mx-3">

        {{-- <input class="btn btn-primary btn-sm" type="submit" name="submitanswer" onclick="checkLength()" /> --}}
        <button class="btn btn-primary btn-sm" type="submit" name="submitanswer">Submit</button>
        <a href="" class="btn btn-secondary btn-sm">Back</a>
    </div>
    {{-- <input type="hidden" name="question_id" value=""> --}}
    <input type="hidden" name="assignment_id" value="{{ $createdassignmentquestion->first()->assignment_id }}">
    <input type="hidden" name="email" value="{{ $user->email }}">

</form>


</div>

</div>
</div>
</div>
@endsection
