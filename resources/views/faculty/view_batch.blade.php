<style>
    input {
        background: rgba(255, 255, 255, 0.4);
        border: none;
        position: relative;
        display: ;
        outline: none;
        width: 300px;
        height: 20p;
        margin: 0 auto;
        padding: 10px;
        color: #333;
        -webkit-box-shadow: 0 2px 10px 1px rgba(0, 0, 0, 0.5);
        box-shadow: 0 2px 10px 1px rgba(0, 0, 0, 0.5);
    }

    ::-webkit-input-placeholder {
        color: #666;
    }

    :-moz-placeholder {
        color: #666;
    }

    ::-moz-placeholder {
        color: #666;
    }

    :-ms-input-placeholder {
        color: #666;
    }

    button {
        position: absolute;
        right: 0px;
        top: 5px;
        border: none;
        height: 30px;
        width: 60px;
        border-radius: 100%;
        outline: none;
        text-align: center;
        font-weight: bold;
        padding: 2px;
    }

</style>

<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">

                        <h3 class="h5"> <a href="/enroll_student" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>
                            Class Details</h3>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 font-weight-bold">
                                <h5 class="text-uppercase">{{ $batch_detail->batch_name }}</h5>
                            </div>
                            <div class="row col-md-6 ">

                                <input class="" value="http://127.0.0.1:8000/joinclass/{{ $batch_detail->id }}?m=join"
                                    id="myInput" readonly>
                                <button class="btn btn-primary btn-sm" onclick="myFunction()">Copy
                                    Link</button>


                            </div>
                        </div>
                        {{-- <a href="" class="btn btn-primary btn-sm float-right mb-3 mx-5">Add New Enrollment</a> --}}
                    </div>

                    <div class="card-body--">
                        <div class="table-responsive scroll-pane scrollbar-primary scroller">
                            @if (!empty($batchstudents[0]->id))
                                <table class='table text-center '>
                                    <thead class=''>
                                        <tr>
                                            <th style="min-width: 70px">S No.</th>
                                            <th style="min-width: 170px">Student Name</th>
                                            <th style="min-width: 170px">Enrollment</th>
                                            @if ($user->role_id == '1')
                                                <th style="min-width: 150px"></th>
                                            @endif

                                        </tr>
                                    </thead>
                                    {{-- {{$batchstudents}} --}}
                                    <tbody class=''>
                                        <?php $i = 1; ?>
                                        @foreach ($batchstudents as $batch)

                                            <tr>
                                                <td>{{ @$i }}</td>
                                                <td>{{ @$batch->student_name }}</td>
                                                <td>{{ @$batch->enrollment }}</td>

                                                @if ($user->role_id == '1')
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="/viewbatch/{{ $batch->id }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                            <button class="btn btn-secondary btn-sm "><a
                                                                    class="text-white"
                                                                    href="/dstudent/{{ $batch->enrollment }}/{{ $batch_detail->id }}">Remove</a>
                                                            </button>
                                                        </div>
                                                    </td>

                                                @endif
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-warning">
                                    <div class="alert alert-warning">
                                        No Student Joined Yet !
                                    </div>

                                </div>

                            @endif

                        </div>
                        <br>

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
