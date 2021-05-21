<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/assignment_questions/"
                                class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Submitted Questions Answer</h3>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        {{-- <h3 class="h5"> Q . {{ $Assignment_question->questions }}</h3> --}}
                    </div>
                    <div class="card-body--">
                        {{-- {{ $submitted }} --}}
                        <div class="table-stats order-table " style="text-align: none">
                            <div class="table-responsive scroll-pane scrollbar-primary scroller">
                                <table class='table'>
                                    <?php $i = 1; ?>
                                    @foreach ($createdassignmentquestion as $submission_details)

                                        <thead>
                                            <th><span
                                                    class="mx-2">{{ $i }}</span>{{ $submission_details->questions }}
                                            </th>
                                        </thead>
                                        @foreach ($submitted as $submitted_answer)
                                            @if ($submission_details->id == $submitted_answer->question_id)
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="float-right" id="status" for="">Status :
                                                            </label>
                                                            <input type="hidden" name="submission_id"
                                                                value="{{ $submitted_answer->id }}">
                                                            <textarea type="text" id="qanswer" name="qanswer"
                                                                class="form-control" oncopy="return false"
                                                                onpaste="return false" oncut="return false"
                                                                readonly>{{ $submitted_answer->qanswer }}</textarea>

                                                            <div class="mt-2">
                                                                <a target="_blank"
                                                                    href="{{ Storage::url(@$submitted_answer->filename) }}"
                                                                    class="btn btn-secondary btn-sm">View pdf</a>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            @endif
                                        @endforeach
                                        <?php $i++; ?>
                                    @endforeach
                                </table>
                            </div>
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
