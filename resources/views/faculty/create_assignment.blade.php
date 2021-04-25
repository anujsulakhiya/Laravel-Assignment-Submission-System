<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5">Create Assignment</h3>
                    </div>
                    <div class="card-body">

                        <form action="/createnewassignment" id="" onsubmit="return post_request(this)">
                            @csrf
                            <input type="hidden" name="email" value="{{ $user->email }}">

                            <div class="row p-2 justify-content-center">
                                <div class="col-md-3">
                                    <div class="vol-">
                                        <label for="batch_name">CLASS NAME</label>

                                        @if (@$batch_name != '')

                                            <input type="text"
                                                class="form-control @error('batch_name') is-invalid @enderror"
                                                id="batch_name" name="batch_name"
                                                value="{{ @$batch_name->first()->batch_name }}" readonly>
                                            @error('batch_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        @else

                                            <select class="form-control" style='width: 100%;' id="sel1" name="batch_id"
                                                required>
                                                <option value=""></option>
                                                @foreach ($batchdetail as $batch)
                                                    <option value="{{ @$batch->id }}">{{ @$batch->batch_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        @endif
                                    </div>
                                    @error('batch_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label for="subject_name">Subject Name</label>
                                        <input id="subject_name" name="subject_name" type="text"
                                            style="text-transform: capitalize" value="Maths"
                                            class="form-control @error('subject_name') is-invalid @enderror"
                                            placeholder="Subject Name" required>
                                    </div>
                                    @error('subject_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <div class="">
                                        <label for="assignment_name">Assignment Name</label>
                                        <input id="assignment_name" type="text" style="text-transform: capitalize" value="Maths"
                                            class="form-control @error('assignment_name') is-invalid @enderror"
                                            placeholder="Assignment Name" name="assignment_name" value="" required>
                                    </div>
                                    @error('assignment_name')

                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>

                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="">
                                        <label for="last_date">Last Date</label>
                                        <input id="last_date" type="date" style="text-transform: capitalize"
                                            class="form-control @error('last_date') is-invalid @enderror"
                                            placeholder="Last Date" name="last_date" value="">
                                    </div>
                                    @error('last_date')

                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>

                                    @enderror
                                </div>
                                <div class="col-md-9 mt-3">
                                    <div class="">
                                        <label for="description">Description</label>
                                        <input id="description" type="text" style="text-transform: capitalize"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Description" name="description" value="">
                                    </div>
                                    @error('description')

                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>

                                    @enderror
                                </div>

                                <div class="col-md-12 table-responsive mt-3">

                                    <table id="createassignment"
                                        class="table table-condensed table-bordered text-center p-0">

                                        <thead>
                                            <th>
                                                <div class="col">Sno</div>
                                            </th>
                                            <th>
                                                <div class="col">Question</div>
                                            </th>

                                        </thead>
                                        <tbody id="createnewassignmentbody">
                                            <tr>
                                                <td class="p-0">
                                                    <button class="btn btn-sm" type="button"
                                                        onclick="delete_question(this)"><i class="fa fa-window-close"
                                                            aria-hidden="true"></i>1</button>
                                                </td>

                                                <td class="p-0">
                                                    <textarea type="text" rows="3" class="form-control" id="question2"
                                                        onkeydown="insRow_for_question_new()" value="1"
                                                        name="questions[]">Define Maths?</textarea>

                                                </td>
                                            </tr>
                                        </tbody>
                                        <caption>
                                            <button type="button" onclick="insRow_for_question()"
                                                class=" btn-sm btn-success"><i class="fa fa-diamond"
                                                    aria-hidden="true"></i> Add (+)</button>
                                        </caption>
                                    </table>

                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary m-2 mb-3"
                                        id="btnSubmit">Submit</button>
                                    <button type="button" class="btn btn-warning m-2 mb-3"
                                        id="btnDetails">Details</button>
                                    <button type="button" class="btn btn-danger m-2 mb-3" id="btnClose"
                                        onclick="go_back()">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    $("#sel1").select2();

    function go_back() {
        console.log(1);
        if (last_loaded == null) {
            load_ajax_page();
        } else {
            load_ajax_page(last_loaded);
        }
    }

</script>
