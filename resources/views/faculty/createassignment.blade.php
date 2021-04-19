@extends('layouts.facultylayout')
@section('content')
    {{-- <x-facultysidebar breadcumb="Create Assignment" breadcumb1="" /> --}}


    <form class="" action="createnewassignment" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $user->email }}">

        <table class="table" style="overflow-x:auto;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Create Assignment</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-bordered" style="font-size: 14px;">

                <tr>
                    <th scope="col">Class Name</th>
                    <th scope="col">
                        <div class="form-group">

                            {{-- <input list="batch" autocomplete="off"
                                class="form-control custom-select form-label @error('batch_name') is-invalid @enderror" id="batch_name" name="batch_name" value="">

                            <datalist id="batch">

                                @foreach ($batchdetail as $batch)
                                    <option class="form-control" value="{{ @$batch->id }}">{{ @$batch->batch_name }}
                                    </option>
                                @endforeach

                            </datalist> --}}

                            @if (@$batch_name != '')

                                <input type="text" class="form-control @error('batch_name') is-invalid @enderror"
                                    id="batch_name" name="batch_name" value="{{ @$batch_name->first()->batch_name }}"
                                    readonly>
                                @error('batch_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            @else

                                <select class="form-control" style='width: 100%;' id="sel1" name="batch_id" required>
                                    <option value=""></option>
                                    @foreach ($batchdetail as $batch)
                                        <option value="{{ @$batch->id }}">{{ @$batch->batch_name }}</option>
                                    @endforeach
                                </select>

                            @endif




                        </div>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Subject Name</th>
                    <th scope="col">
                        <input type="text" class="form-control @error('subject_name') is-invalid @enderror"
                            id="subject_name" name="subject_name" value="Maths" required>
                        @error('subject_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </th>
                </tr>
                <tr>
                    <th scope="col">Assignment Name</th>
                    <th scope="col">
                        <input type="text" class="form-control @error('assignment_name') is-invalid @enderror"
                            id="assignment_name" name="assignment_name" value="M-III" required>
                        @error('assignment_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </th>
                </tr>
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">
                        <textarea type="text" rows="3" class="form-control" id="description" name="description"></textarea>
                    </th>
                </tr>

                <tr>
                    <th scope="col">Last Date</th>
                    <th scope="col">
                        <input type="date" class="form-control @error('last_date') is-invalid @enderror" id="last_date"
                            name="last_date" value="" required>
                        @error('last_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </th>
                </tr>
            </tbody>
        </table>
        <div style="overflow:auto; max-height:300px;"><br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Question 1</span>
                </div>
                <textarea type="text" rows="3" class="form-control" id="question2" value="1" name="questions[]">Define Maths?</textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Question 2</span>
                </div>
                <textarea type="text" rows="3" class="form-control" id="question2" value="1" name="questions[]">Define Maths?</textarea>
            </div>
            <div class="form-group" value="1" id="question"></div>

        </div>
        <div class="mb-2">
            <button class="btn btn-primary btn-sm" type="submit" name="createassignment">Create</button>
            <button class="btn btn-secondary btn-sm" type="reset">Reset</button>
            <button type="button" onclick="add()" class="btn btn-sm btn-primary">Add Question</button>
            <a onclick="goBack()" class="btn btn-secondary btn-sm">Back</a>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
@endsection

<script type="text/javascript">
    createEditableSelect(document.forms[0].batch_name);

</script>
