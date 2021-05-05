<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/assignment_questions/{{ $Assignment_question->assignment_id }}" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Assignment Details</h3>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"> Q . {{ $Assignment_question->questions }}</h3>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h" style="text-align: none">
                            <table class='table'>
                                <thead>
                                    <th>Answers</th>
                                </thead>
                                <tbody>
                                    @foreach ($Submitted_Assignment_question as $submission_details)
                                        <tr>
                                            <td>
                                                <label for="">Name : {{ $submission_details->name }}</label>
                                                <label class="ml-4" for="">Enrollment :
                                                    {{ $submission_details->enrollment }}</label>
                                                <label class="float-right" id="status" for="">Status :
                                                    {{ $submission_details->status }} </label>
                                                <input type="hidden" name="submission_id"
                                                    value="{{ $submission_details->id }}">
                                                <textarea type="text" id="qanswer" name="qanswer" class="form-control"
                                                    oncopy="return false" onpaste="return false" oncut="return false"
                                                    readonly>{{ $submission_details->qanswer }}</textarea>

                                                <div class="mt-2">
                                                    <a target="_blank"
                                                        href="{{ Storage::url($submission_details->filename) }}"
                                                        class="btn btn-secondary btn-sm">View pdf</a>

                                                    <a class="btn btn-danger btn-sm "
                                                        href="/accept/{{ $submission_details->id }}" id="">Accept</a>

                                                    <a href="/reject/{{ $submission_details->id }}"
                                                        class="btn btn-secondary btn-sm">Reject</a>
                                                </div>
                                            </td>
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
