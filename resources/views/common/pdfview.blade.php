<!doctype html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BigStore: Shopping Invoice</title>
</head>

<body>



    <style type="text/css">
        table td,
        table th {
            border: 1px solid black;
        }

    </style>
    <div class="container">
        <h3>Submission Report of Class {{ $batch_detail->batch_name }}</h3>
        <br />

        <div class="table-stats order-table">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Enrollemnt</th>
                        <th>Submittion Status</th>
                        @foreach ($assignment_questions as $key => $questions)
                            <th style="min-width: 150px">Q : {{ ++$key }}</th>
                        @endforeach

                    </tr>
                </thead>

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
            </table>
        </div>
        <br />
        <div class="justify-content-end">
            Report by Assignment Submitter
        </div>
    </div>


</body>

</html>
