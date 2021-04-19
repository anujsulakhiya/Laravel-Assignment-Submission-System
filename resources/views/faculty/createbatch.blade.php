@extends('layouts.facultylayout')

@section('content')

    <section class="forms">
        <div class="container-fluid mt-2">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h5">Create Class</h3>
                        </div>
                        <div class="card-body">

                            <form id="frmStockPurchase">

                                <div class="row p-2 justify-content-center">

                                    <div class="col-md-3">
                                        <label for="class_no">CLASS NO.</label>
                                        <input id="class_no" type="text" style="text-transform: capitalize"
                                            class="form-control" placeholder="" value="{{ @$batchcount }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="">
                                            <label for="batch_name">CLASS NAME</label>
                                            <input id="batch_name" name="batch_name" type="text"
                                                style="text-transform: capitalize" class="form-control"
                                                placeholder="Class Name">
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="">
                                            <label for="batch_limit">CLASS LIMIT</label>
                                            <input id="batch_limit" type="text" style="text-transform: capitalize"
                                                class="form-control" placeholder="Set Limit" value="">
                                        </div>
                                    </div>


                                    <div class="col-md-12 table-responsive mt-3">

                                        <table id="createbatchtable"
                                            class="table table-condensed table-bordered text-center p-0">

                                            <thead>
                                                <th class="col-md-1">Sno</th>
                                                <th class="col-md-2">Student Name</th>
                                                <th class="col-md-2">Email/Enrollment</th>
                                            </thead>
                                            <tbody id="batchdetails">
                                                <tr>
                                                    <td class="p-0 col-md-1">

                                                        <button class="btn" type="button" onclick="deleteRow(this)">
                                                            <i class="fa fa-window-close" aria-hidden="true"></i>
                                                            1</button>
                                                    </td>

                                                    <td class="p-0 col-md-2">
                                                        <input name="itemcode" type="text"
                                                            style="text-transform: capitalize" class="form-control"
                                                            placeholder="Name" />
                                                    </td>

                                                    <td class="p-0 col-md-2">
                                                        <input name="Amount1" type="text" style="text-transform: capitalize"
                                                            class="form-control Amount" placeholder="Email / Enrollment"
                                                            onkeydown="NewRow()" />
                                                    </td>


                                                </tr>
                                            </tbody>
                                            <caption>
                                                <button type="button" onclick="insRow()" class=" btn-sm btn-success"><i
                                                        class="fa fa-diamond" aria-hidden="true"></i> Add (+)</button>
                                            </caption>
                                        </table>

                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary m-2 mb-3"
                                            id="btnSubmit">Submit</button>
                                        <button type="button" class="btn btn-warning m-2 mb-3"
                                            id="btnDetails">Details</button>
                                        <button type="button" class="btn btn-danger m-2 mb-3" id="btnClose">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- {{ Form::open(['url' => 'createbatch']) }} --}}
    {{-- @csrf
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text font-weight-bold">Class Name</span>
        </div>
        <input type="text" class="form-control @error('batch_name') is-invalid @enderror" id="batch_name" name="batch_name"
            value="">
        @error('batch_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="hidden" name="email" value="{{ $user->email }}">
    </div>

    <div style="overflow:auto; max-height:400px;">
        <table id="batch_table" class='table'>
            <thead class='thead-light'>
                <tr>
                    <th>Enrollment</th>
                    <th></th>

                </tr>
            </thead>
            <tbody id="batch_table_body" class='table-bordered'>
                <?php
                $i = 1;
                $j = 2;
                while ($i < 10) { ?> <tr>
                    <td scope='col'>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?php echo $i; ?></span>
                            </div>
                            <input type="text" class="form-control" id="2" name="batch_student_enrollment[]">

                        </div>
                    </td>
                    <td scope='col'>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?php echo $j; ?></span>
                            </div>
                            <input type="text" class="form-control" id="2" name="batch_student_enrollment[]">

                        </div>
                    </td>
                    </tr>
                    <?php
                    $i = $i + 2;
                    $j = $j + 2;
                    }
                ?>

            </tbody>

        </table>
    </div>
    <button type="submit" name="nameupdate" class="btn btn-primary btn-sm">Create New Class</button>
    <button type="button" onclick="add_batch_enrollment_field()" class="btn btn-sm btn-primary">Add Enrollemnt
        Field</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Back</a> --}}

    {{-- {{ Form::close() }} --}}



@endsection
