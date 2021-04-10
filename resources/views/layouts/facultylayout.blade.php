<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/listboxOption.js') }}" defer></script>
    <script src="{{ asset('js/combobox-list.js') }}" defer></script>
    {{-- <script src="{{ asset('js/listbox.js') }}" defer></script> --}}
    <script type="text/javascript" src="{{ URL::asset('js/listbox.js') }}"></script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <!-- Font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/css/custom.css" rel="stylesheet">
    {{-- <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body class="c-app">

    <div id="wrapper" style="position: relative;">
        <!-- Sidebar -->
        <div class="c-sidebar c-sidebar-dark c-sidebar-lg-show c-sidebar-show sidenav" id="sidebar-wrapper">
            <!-- <div class="sidebar-heading bg-danger text-light font-weight-bold">Assignment Submitter </div> -->
            <div class="c-sidebar-brand d-lg-down-none text-uppercase text-weight-bold">
                Assignment Submitter
            </div>
            <div class="list-group-flush">
                <ul class="c-sidebar-nav ps ps--active-y ">

                    <li id="dashboard" class="c-sidebar-nav-item "><a
                            class="c-nav-link list-group-item list-group-item-action" href="/home"><i
                                class="fa fa-tachometer mr-2"></i>
                            Dashboard <span class="badge badge-info">NEW</span></a></li>

                    <li class="c-sidebar-nav-item "><a class="c-nav-link list-group-item list-group-item-action"
                            href="/profile"><i class="fa fa-user mr-2"></i>
                            Profile</a></li>


                    <li class="c-sidebar-nav-title">Enroll Students</li>
                    <li class="c-sidebar-nav-item "><a class="c-nav-link list-group-item list-group-item-action"
                            href="/createbatch"><i class="fa fa-graduation-cap mr-2"></i>
                            Create Class</a></li>
                    <li class="c-sidebar-nav-item "><a class="c-nav-link list-group-item list-group-item-action"
                            href="/enrollstudent"><i class="fa fa-graduation-cap mr-2"></i>
                            Enroll Students</a></li>
                    <li class="c-sidebar-nav-item "><a class="c-nav-link list-group-item list-group-item-action"
                            href="/enrollstudent"><i class="fa fa-graduation-cap mr-2"></i>
                            Class Joining Requests </a></li>


                    <li class="c-sidebar-nav-title">Assignment</li>
                    <li class="c-sidebar-nav-item "><a class="c-nav-link list-group-item list-group-item-action"
                            href="/createassignment"><i class="fa fa-plus  mr-2"></i>
                            Create Assignment</a></li>
                    <li class="c-sidebar-nav-item "><a class="c-nav-link list-group-item list-group-item-action"
                            href="/myassignment"><i class="fa fa-book mr-2"></i>
                            My Assignment</a></li>

                    <li class="c-sidebar-nav-title">Other</li>
                    <li class="c-sidebar-nav-item "><a class="c-nav-link list-group-item list-group-item-action"
                            href="/"><i class="fa fa-recycle mr-2"></i>
                            Recycle Bin</a></li>
                    <li class="c-sidebar-nav-item ">
                        <a class="c-nav-link list-group-item list-group-item-action" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out mr-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>


                </ul>
            </div>

        </div>
    </div>

    <div class="c-wrapper c-fixed-components ">
        <header class="c-header c-header-light  c-header-with-subheader">
            <span class="c-header-toggler-icon navbar-toggler-icon m-3" id="menu-toggle" width="97" height="46"></span>
            <ul class="c-header-nav ml-auto mr-4">
                <li class="c-header-nav-item d-md-down-none mx-2">{{@$user->name}}</li>
                <li>
                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
            <div class="c-subheader px-3">
                <!-- Breadcrumb-->
                <x-breadcrumb breadcumb="" breadcumb1="" />
            </div>

        </header>

        <div class="container-fluid" ied="mainpage">

            <div>
                <main>

                    @yield('content')

                </main>
            </div>

        </div>
    </div>



</body>
<script>
    $(document).ready(function() {

        $("#selUser").select2()

        $("#dashboard").click(function() {
            $("#mainpage").load("{{ URL::to('home') }}");
        });
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    function myFunction() {

        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("Copied the Link: " + copyText.value);
    }

    $(document).ready(function() {

        // Initialize select2
        $("#sel1").select2();

    });

</script>

</html>
