<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/view_batch_assignment/{{ @$batch_detail->id}}"
                                class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Submission Report</h3>
                    </div>

                    <div class="card-body">
                        <h4 class="box-link" class="text-left">
                            <a href="/pdfview/{{ @$batch_detail->id }}/{{ @$assignment_id }}?download=pdf">Download
                                Submission Report
                                PDF</a>
                            <div class="col-md-6 mt-2 float-right">
                                <input class="form-control search" placeholder="Search by Class Name , Date etc"
                                    type="text" name="search" id="search">
                            </div>
                        </h4>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table">


                            <div class="table-responsive scroll-pane scrollbar-primary scroller ">
                                <table class="table search">

                                    <thead>

                                        <tr>
                                            <th class="">No</th>
                                            <th style="min-width: 170px">Enrollemnt</th>
                                            <th style="min-width: 300px">Submittion Status</th>
                                            @foreach ($assignment_questions as $key => $questions)
                                                <th>Question : {{ ++$key }}</th>
                                            @endforeach
                                        </tr>

                                    </thead>
                                    <tbody class="search_table">
                                        @foreach (@$batch_student_detail as $key => $student)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ @$student->enrollment }}</td>
                                                <td>
                                                    @if (count($Submittion_detail) == count($assignment_questions))
                                                        Submitted
                                                    @elseif (!empty($Submittion_detail[0]))
                                                        Partially Submitted
                                                    @else
                                                        Not Submitted
                                                    @endif
                                                </td>
                                                @php
                                                    $i = 0;
                                                @endphp

                                                @foreach ($assignment_questions as $key => $questions)
                                                    <td>
                                                        @foreach ($Submittion_detail as $submission)

                                                            @if ($student->enrollment == $submission->enrollment)
                                                                @if ($questions->id == $submission->question_id)
                                                                    Submitted ({{ $submission->status }})
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>


                                                @endforeach
                                                </td>
                                                {{-- <td>{{ @$student->status }}</td> --}}
                                            </tr>
                                        @endforeach



                                    </tbody>
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

        serach_and_pagination();
    });

</script>
