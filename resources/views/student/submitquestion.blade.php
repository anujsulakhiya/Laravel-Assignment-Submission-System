@extends('layouts.app')

@section('content')

<x-studentsidebar studentbreadcumb="Submit Question " studentbreadcumb1="" />

{{-- {{dd($createdassignmentquestion)}} --}}

<form class="" action="submitans" method="POST">
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
                    <input type="hidden" name="question_id" value="{{ $createdassignmentquestion->first()->questions }}">
                </th>
            </tr>
            <tr>
                <th>
                    <div>

                        <label for="">ANSWER</label>
                        <textarea  type="text" id="qanswer" name="qanswer" rows="6" class="form-control" oncopy="return false" onpaste="return false" oncut="return false"></textarea>
                        <label for="">Only Pdf</label>
                        <input type="file" name="myfile" class="mt-2" value="">

                    </div>
                </th>
            </tr>
        </tbody>
    </table>


    <div class="mb-2 mx-3">
    <button class="btn btn-danger btn-sm" type="submit" name="submitanswer">Submit</button>
    <a href="" class="btn btn-secondary btn-sm">Back</a>
    </div>
    {{-- <input type="hidden" name="question_id" value=""> --}}
    <input type="hidden" name="assignment_id" value="">
    <input type="hidden" name="email" value="{{ $user->email}}">

</form>


</div>

</div>
</div>
</div>
@endsection
