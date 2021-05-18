<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">
                        <h3 class="h5">Assignment Details</h3>
                        <h6 class="ml-3 text-dark">( Note : Select Class to See Assignments )</h6>

                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"> Q . {{ $createdassignmentquestion->first()->questions }}</h3>
                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ">
                                <form class="" action="/submitans" method="POST" enctype="multipart/form-data"
                                    onsubmit="return post_request_with_file(this)">

                                    @csrf
                                    <input type="hidden" name="question_id" value="{{ $createdassignmentquestion->first()->id }}">

                                    <table class='table'>
                                        <thead>
                                            <th>Answers</th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div>

                                                        <span class="text-danger"></span>
                                                        <textarea type="text" id="qanswer" name="qanswer" rows="6"
                                                            class="form-control @error('qanswer') is-invalid @enderror"
                                                            oncopy="return false" onpaste="return false"
                                                            oncut="return false">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </textarea>
                                                        @error('qanswer')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label for="">Only Pdf</label>
                                                        <input type="file" name="myfile" class="mt-2" value="" required>
                                                        <div class="mb-2 mx-3">

                                                            {{-- <input class="btn btn-primary btn-sm" type="submit" name="submitanswer" onclick="checkLength()" /> --}}
                                                            <button class="btn btn-primary btn-sm" type="submit"
                                                                name="submitanswer">Submit</button>
                                                            <a href="" class="btn btn-secondary btn-sm">Back</a>
                                                        </div>
                                                        {{-- <input type="hidden" name="question_id" value=""> --}}
                                                        <input type="hidden" name="assignment_id"
                                                            value="{{ $createdassignmentquestion->first()->assignment_id }}">
                                                        <input type="hidden" name="email" value="{{ $user->email }}">
                                                    </div>

                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </form>

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


