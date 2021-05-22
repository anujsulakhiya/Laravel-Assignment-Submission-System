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

        .table-stats table {
            font-family: none;
        }

        .order-table {
            position: relative
        }

        .order-table:after,
        .order-table:before {
            content: "";
            position: absolute;
            top: 0;
            height: 37px;
            /* width: 10px; */
            background: #e8e9ef
        }

        /* .order-table:after {
            right: -1px
        }

        .order-table:before {
            left: -1px
        } */

        .order-table tr th {
            background: #e8e9ef
        }

        .order-table tr td:last-child,
        .order-table tr th:last-child {
            text-align: none
        }

        .order-table tr:last-child td {
            border: none
        }

        .order-table .badge {
            color: #fff;
            padding: 10px;
            text-transform: uppercase;
            font-weight: 400
        }

        .order-table .badge-complete {
            background: green
        }

        .order-table .badge-pending {
            background: #fb9678
        }

        .order-table .badge-delete {
            background: #ff0000
        }

        .order-table .badge-edit {
            background: #33a2ff;
        }

        .order-table .serial {
            display: none
        }

        .table-stats table {
            font-family: open sans
        }

        .table-stats table th,
        .table-stats table td {
            border: none;
            border-bottom: 1px solid #e8e9ef;
            color: #868e96;
            font-size: 12px;
            font-weight: 400;
            padding: .75em 1.25em;
            text-transform: uppercase
        }

        .table-stats table th img,
        .table-stats table td img {
            margin-right: 10px;
            max-width: 45px
        }

        .table-stats table th .name,
        .table-stats table td .name {
            color: #343a40;
            font-size: 14px;
            text-transform: capitalize
        }

        .table-stats table td {
            color: #343a40;
            font-size: 14px;
            font-weight: 600;
            text-transform: capitalize;
            vertical-align: middle
        }

        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: 14px;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .fa-check {
            font-family: "Font Awesome 5 Free";
            content: "\f095";
            display: inline-block;
            padding-right: 3px;
            vertical-align: middle;
            font-weight: 900;
        }

    </style>
    <div class="container">
        <h3>Submission Report of Class {{ $batch_detail->batch_name }}</h3>
        <br />

        <div class="table-stats order-table">

            <table>

                <thead>
                    <tr>
                        <th class="">No</th>
                        <th style="min-width: 170px">Enrollemnt</th>
                        <th style="min-width: 350px">Submittion Status</th>
                        @foreach ($assignment_questions as $key => $questions)
                            <th style="min-width: 350px">Q : {{ ++$key }}</th>
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
                                        S ({{ $submission->status }})
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

    </div>

    <div class="justify-content-end">
        Report by Assignment Submitter
    </div>
</body>

</html>
