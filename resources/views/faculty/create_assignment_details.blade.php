<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/view_batch_assignment/{{$createdassignmentdetail[0]->batch_id}}" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Assignment Details</h3>
                    </div>

                    <!-- Modal HTML embedded directly into document -->
                    <div id="fade" class="modal" style="margin-top: 100px; overflow-y:scroll">
                        @foreach ($createdassignmentdetail as $assignmentdetail)
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="h5">Edit Assignment Details</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/update_assignment" id="" onsubmit="return post_request(this)">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $assignmentdetail->id }}">

                                        <div class="row p-2 justify-content-center">
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
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success mt-3"
                                                    id="btnSubmit">Update</button>

                                                <a href="#" class="btn btn-danger mt-3" rel="modal:close">Close</a>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="card-body--">

                        <div class="table-stats order-table ov-h">
                            <table class='table'>
                                @foreach ($createdassignmentdetail as $assignmentdetail)
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <h5 class="card-title">Batch Name</h5>
                                                    <p class="card-text">{{ @$assignmentdetail->batch_id }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5 class="card-title">Subject Name</h5>
                                                    <p class="card-text">{{ @$assignmentdetail->subject_name }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5 class="card-title">Assignment Name</h5>
                                                    <p class="card-text">{{ @$assignmentdetail->assignment_name }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5 class="card-title">Description</h5>
                                                    <p class="card-text">
                                                        @if (!empty($assignmentdetail->description))
                                                            {{ @$assignmentdetail->description }}
                                                        @else
                                                            {{ 'No Description' }}
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5 class="card-title">Last Date</h5>
                                                    <p class="card-text">
                                                        {{ date('F d, Y', strtotime($assignmentdetail->last_submission_date)) }}
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5 class="card-title">Submission Link</h5>
                                                    <p class="card-text">
                                                        <a
                                                            href="">{{ env('APP_URL') . @$assignmentdetail->batch_id }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <br>

                                            <a href="#fade" class="btn btn-primary mt-3" rel="modal:open">Edit</a>

                                        </div>
                                    </div>
                                @endforeach
                                <thead class="">
                                    <tr>
                                        <th scope="col">Questions</th>

                                        <th scope="col">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="" class="btn btn-sm btn-primary">Add</a>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($createdassignmentquestion as $assignmentquestion)
                                        <tr>

                                            <td>{{ $assignmentquestion->questions }}</td>

                                            <td class=""><a href="" class="btn btn-sm btn-secondary">Remove</a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


                        </div>
                        <br>

                    </div>

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
