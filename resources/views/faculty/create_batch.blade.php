<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center text-weight-bold">
                        <h5 class=" "><a href="/home_page" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Create Class</h5>
                    </div>
                    <div class="card-body">

                        <form action="/create_batch" id="createbatchid" onsubmit="return post_request(this)">
                            @csrf
                            <input type="hidden" name="email" value="{{ $user->email }}">

                            <div class="row p-2 justify-content-center">

                                <div class="col-md-3">
                                    <label for="class_no">CLASS NO.</label><br>
                                    <span class="form-control font-weight-bold">{{ @$batchcount + 1 }}</span>

                                </div>

                                <div class="col-md-6">
                                    <div class="">
                                        <label for="batch_name">CLASS NAME</label>
                                        <input id="batch_name" name="batch_name" type="text"
                                            style="text-transform: capitalize"
                                            class="form-control @error('batch_name') is-invalid @enderror"
                                            placeholder="Class Name">
                                    </div>
                                    @error('batch_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-3">
                                    <div class="">
                                        <label for="batch_limit">CLASS LIMIT</label>
                                        <input id="batch_limit" type="text" style="text-transform: capitalize"
                                            class="form-control @error('batch_limit') is-invalid @enderror"
                                            placeholder="Set Limit" name="batch_limit" value="">
                                    </div>
                                    @error('batch_limit')

                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>

                                    @enderror
                                </div>


                                <div class="col-md-12 table-responsive mt-3">

                                    <table id="createbatchtable"
                                        class="table table-condensed table-bordered text-center p-0">

                                        <thead>
                                            <th>
                                                <div class="col">Sno</div>
                                            </th>
                                            <th>
                                                <div class="col">Student Name</div>
                                            </th>
                                            <th>
                                                <div class="col">Email/Enrollment</div>
                                            </th>
                                        </thead>
                                        <tbody id="batchdetails">
                                            <tr>
                                                <td class="p-0">
                                                    <button class="btn btn-sm" type="button"
                                                        onclick="deleteRow(this)"><i class="fa fa-window-close"
                                                            aria-hidden="true"></i>1</button>
                                                </td>

                                                <td class="p-0">
                                                    <input name="name[]" type="text" style="text-transform: capitalize"
                                                        class="form-control" placeholder="Name" />
                                                </td>

                                                <td class="p-0">
                                                    <input name="enrollment[]" type="text"
                                                        style="text-transform: capitalize" class="form-control Amount"
                                                        placeholder="Email / Enrollment" onkeydown="NewRow()" />
                                                </td>
                                            </tr>
                                        </tbody>
                                        <caption>
                                            <button type="button" onclick="insRow()" class=" btn-sm btn-success"><i
                                                    class="fa fa-diamond" aria-hidden="true"></i> Add (+)</button>
                                                    <span>( Note : Use Tab To Add More Name / Enrollment Field )</span>

                                        </caption>
                                    </table>

                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success m-2 mb-3"
                                        id="btnSubmit">Submit</button>

                                    <button type="button" class="btn btn-danger m-2 mb-3" id="btnClose">
                                        <a href="/home_page" class="my_mainpage_link text-white">Close</a>
                                </div>
                            </div>
                        </form>
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
