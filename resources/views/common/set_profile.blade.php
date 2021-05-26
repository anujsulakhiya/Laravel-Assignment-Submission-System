@include('inc.css')

<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card " style="margin-top: 15%">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5">Welcome To Assignment Submitter</h3>
                    </div>



                    <div class="card-body--">

                        <div class="card-body mt-2 shadow p-4">

                            {{ Form::open(['route' => 'set_new_profile']) }}
                            @csrf
                            <input type="hidden" name="email" value="{{$user->email}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <i class="fa fa-user"></i><label for="name"
                                                class="font-weight-bold pl-2">Name</label> :
                                            <span>{{ $user->name }}</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <i class="fa fa-user"></i><label for="name"
                                                class="font-weight-bold pl-2">Email</label> :
                                            <span>{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                        <i class="fa fa-key"></i><label for="role"
                                            class="font-weight-bold pl-2">Select Role to Continue</label>
                                        <select name="role" class="form-control" required value="{{ old('name') }}"
                                            id="role" >
                                            <option></option>
                                            <option value="1">Faculty</option>
                                            <option value="2">Student</option>
                                        </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary p-2 mt-3  shadow-sm ">
                                    {{ __('Continue To Dashboard') }}
                                </button>
                            </div>
                            {{ Form::close() }}


                        </div>
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
