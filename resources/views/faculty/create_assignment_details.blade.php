<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/view_batch_assignment/{{$createdassignmentdetail[0]->batch_id}}" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Assignment Details</h3>
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
{{-- {{$assignmentdetail->id}} --}}
                                            <a href="/update_assignment_details/{{ @$assignmentdetail->id }}" class="btn btn-primary mt-3 my_mainpage_link">Edit</a>

                                        </div>
                                    </div>
                                @endforeach
                                <thead class="">
                                    <tr>
                                        <th scope="col">Questions</th>

                                        <th scope="col">
                                            <div class="btn-group">
                                                <a href="/update_assignment_questions/{{ @$assignmentdetail->id }}" class="btn btn-sm btn-primary my_mainpage_link">Edit</a>
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

    });

</script>
