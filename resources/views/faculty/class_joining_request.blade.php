<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/enroll_student" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Students Joining Request For Class {{ $batch_detail->batch_name }}</h3>
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @elseif (session()->has('rmessage'))
                        <div class="alert alert-warning">
                            {{ session()->get('rmessage') }}
                        </div>
                    @endif
                    <div class="card-body--">



                        <div class="table-stats order-table ov-h">
                            @if (!empty($Batch_joining_request[0]->id))
                                <table class='table text-center '>
                                    <thead class=''>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class=''>
                                        <?php $i = 1; ?>
                                        @foreach ($Batch_joining_request as $batch)

                                            <tr>
                                                <td>{{ @$i }}</td>
                                                <td>{{ @$batch->name }}</td>
                                                <td>{{ @$batch->email }}</td>
                                                <td>

                                                    <a href="/approvestudent/{{ $batch->id }}"
                                                        class="btn btn-success btn-sm my_mainpage_link">Approve</a>
                                                    <button class="btn btn-secondary btn-sm  "><a
                                                            class="text-white my_mainpage_link"
                                                            href="/rejectstudent/{{ $batch->id }}">Reject</a></button>


                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else

                                <div class="alert alert-warning">
                                    <strong></strong> No Joining Request Found !
                                    {!! '&nbsp;' !!}{!! '&nbsp;' !!}{!! '&nbsp;' !!} Joining Link
                                    {!! '&nbsp;' !!}-->{!! '&nbsp;' !!}{!! '&nbsp;' !!}http://127.0.0.1:8000/joinclass/{{ $batch_detail->id }}
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

        alert($.session.get("msg"));
    });

</script>
