<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/view_batch_assignment/{{$createdassignmentdetail[0]->batch_id}}" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Assignment Details</h3>
                    </div>

                    <!-- Modal HTML embedded directly into document -->
                        @foreach ($createdassignmentdetail as $assignmentdetail)

                                <div class="card-body">
                                    <form action="/update_assignment" id="" onsubmit="return post_request(this)">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $assignmentdetail->id }}">

                                        <div class="row p-2">
                                            <div class="col-md-3">
                                                <div class="vol-">
                                                    <label for="batch_name">CLASS NAME</label>
                                                    <input type="text"
                                                        class="form-control @error('batch_name') is-invalid @enderror"
                                                        id="batch_name" name="batch_name"
                                                        value="{{ @$assignmentdetail->batch_id }}" readonly>
                                                    @error('batch_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror


                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <label for="subject_name">Subject Name</label>
                                                    <input id="subject_name" name="subject_name" type="text"
                                                        style="text-transform: capitalize"
                                                        value="{{ @$assignmentdetail->subject_name }}"
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
                                                    <input id="assignment_name" type="text"
                                                        style="text-transform: capitalize" value="Maths"
                                                        class="form-control @error('assignment_name') is-invalid @enderror"
                                                        placeholder="Assignment Name" name="assignment_name"
                                                        value="{{ @$assignmentdetail->assignment_name }}" required>
                                                </div>
                                                @error('assignment_name')

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>

                                                @enderror
                                            </div>

                                            <div class="col-md-3 mt-3">
                                                <div class="">
                                                    <label for="last_submission_date">Last Date</label>
                                                    <input id="last_submission_date" type="date" style="text-transform: capitalize"
                                                        class="form-control @error('last_submission_date') is-invalid @enderror"
                                                        placeholder="Last Date" name="last_submission_date"
                                                        value="{{ @$assignmentdetail->last_submission_date }}" required>
                                                </div>
                                                @error('last_submission_date')

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>

                                                @enderror
                                            </div>
                                            <div class="col-md-9 mt-3">
                                                <div class="">
                                                    <label for="description">Description</label>
                                                    <input id="description" type="text"
                                                        style="text-transform: capitalize"
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        placeholder="Description" name="description"
                                                        value="{{ @$assignmentdetail->description }}">
                                                </div>
                                                @error('description')

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>

                                                @enderror
                                            </div>


                                            <br>
                                            <div class="mx-3">
                                                <button type="submit" class="btn btn-success mt-3"
                                                    id="btnSubmit">Update</button>

                                                    <a href="/batchassignmentdetails/{{ $assignmentdetail->id }}"
                                                        class="btn  btn-primary mt-3 my_mainpage_link">Back</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach




                </div>
            </div>
        </div>
    </div>
    </div>

</section>


<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

        function open_model() {
            $("#fade").modal({
                fadeDuration: 100,
                autoOpen: false,
            });
        }



    });

</script>
