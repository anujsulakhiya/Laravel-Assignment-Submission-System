<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/home_page" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>All
                            Class Joining Request</h3>
                    </div>

                    <div class="card-body">
                        <h4 class="box-link" class="text-left">
                            <div class="row">
                                <div class="col-md-6 float-left">
                                    <form action="/batch_joining_request" id="" onsubmit="return post_request(this)">
                                        @csrf


                                        <div class="row">
                                            <div class="col-md-8 mt-2">

                                                <select class=" " style='width: 100%;' id="sel1" name="batch_id"
                                                    required>
                                                    <option value=""><span>Filter Class Request </span></option>
                                                    @foreach (@$batchdetail as $batch)
                                                        <option class="search_by_batch" value="{{ @$batch->id }}">
                                                            {{ @$batch->batch_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 my-2">
                                                <button type="submit" class="btn btn-success "
                                                    id="btnSubmit">Search</button>

                                                    <a href="/all_class_joining_request" class="btn btn-dark text-white my_mainpage_link">View All </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="col-md-6 float-right">
                                    <input class="form-control search" placeholder="Search by Class Name , Date etc"
                                        type="text" name="search" id="search" value="{{ old('search') }}"
                                        autocomplete="search">
                                </div>
                            </div>
                        </h4>



                    </div>
                    @if (session()->has('msg'))
                        <div class="alert alert-success">
                            {{ session()->get('msg') }}
                        </div>
                    @elseif (session()->has('rmessage'))
                        <div class="alert alert-warning">
                            {{ session()->get('rmessage') }}
                        </div>
                    @endif

                    <div class="card-body--">

                        <div class="table-stats order-table">
                            {{-- {{$Batch_joining_request}} --}}
                            @if (!empty($Batch_joining_request[0]->id))
                            <div class="table-responsive scroll-pane scrollbar-primary scroller">
                                <table class="table search">
                                    <thead>

                                        <tr>
                                            <th class="">S.NO.</th>
                                            <th style="min-width: 130px">Class Name</th>
                                            <th style="min-width: 300px">Student Details</th>
                                            <th style="min-width: 170px">Requested on</th>
                                            <th style="min-width: 150px">Status</th>
                                        </tr>

                                    </thead>
                                    <tbody class="search_table">
                                        <?php
                                        $i = 1;
                                        $j = 0;
                                        ?>
                                        @foreach ($Batch_joining_request as $batch)

                                            <tr>
                                                <td>{{ @$i }}</td>
                                                <td>{{ @$batch->batch_name }}</td>
                                                <td>Name: {{ @$batch->name }}</span> <br> Email
                                                    :{{ @$batch->email }}
                                                </td>
                                                <td>{{ date('F d, Y', strtotime(@$batch->created_at)) }}</td>

                                                <td class="my-1">


                                                    <a href="/approvestudentdirectly/{{ $batch->id }}"
                                                        class="btn btn-success btn-sm my_mainpage_link">Approve</a>
                                                    <button class="btn btn-danger btn-sm  "><a
                                                            class="text-white my_mainpage_link"
                                                            href="/rejectestudent_directly/{{ $batch->id }}">Reject</a></button>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                            $j++;
                                            ?>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="alert alert-warning">
                                    <div class="alert alert-warning">
                                        No Joining Request Found !
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
    </div>

</section>

<script>
    $("#sel1").select2();
    $(document).ready(function() {

        set_my_ajax_link_in_mainpage();

        $(".search_by_batch").on("click", function() {
            var value = $(this).val().toLowerCase();
            $(".search_table tr").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        serach_and_pagination();
    });

</script>
