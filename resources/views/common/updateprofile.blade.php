<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center ">

                        <div class="col-md-6 float-left m-0 p-0">
                            <h3 class="h5"><a href="/home_page" class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Edit
                                Profile Details</h3>
                        </div>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <form action="/updateuserprofile" id="" onsubmit="return post_request(this)">
                                @csrf
                                <table class='table'>

                                    <tbody class=''>
                                        <tr>
                                            <td class='col-md-4'>Name</td>
                                            <td><input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ @$user->name }}" autocomplete="name"></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <input type="hidden" name="email" value="{{ @$user->email }}">
                                            <td>{{ @$user->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" name="nameupdate"
                                    class="btn btn-primary btn-sm mt-3 mx-3">Update</button>
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
