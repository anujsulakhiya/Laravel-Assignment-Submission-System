<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/view_batch_assignment/{{ $createdassignmentdetail[0]->batch_id }}"
                                class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Assignment Details</h3>
                    </div>
                    {{$createdassignmentquestion}}
                    <!-- Modal HTML embedded directly into document -->
                    @foreach ($createdassignmentquestion as $assignmentquestion)

                        <div class="card-body">
                            <form action="/update_questions" id="" onsubmit="return post_request(this)">
                                @csrf

                                <div class="row p-2">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Questions</th>

                                                {{-- <th scope="col">
                                                    <div class="btn-group">
                                                        <a href="/update_assignment_questions/{{ @$assignmentdetail->id }}"
                                                        class="btn btn-sm btn-primary my_mainpage_link">Edit</a>
                                                    <a href="" class="btn btn-sm btn-primary">Add</a>
                                                    </div>
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($createdassignmentquestion as $assignmentquestion)
                                                <tr>


                                                    <td>
                                                        <textarea type="text" rows="3" class="form-control" value=""
                                                        name="questions[]">{{ $assignmentquestion->questions }}</textarea></td>
                                                        <input type="hidden" name="question_id[]" value="{{ $assignmentquestion->id }}">

                                                    {{-- <td class=""><a href="" class="btn btn-sm btn-secondary">Remove</a>
                                                    </td> --}}
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    <br>
                                    <div class="mx-3">
                                        <button type="submit" class="btn btn-success mt-3"
                                            id="btnSubmit">Update</button>

                                        <a href="/batchassignmentdetails/{{ $assignmentquestion->id }}"
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
