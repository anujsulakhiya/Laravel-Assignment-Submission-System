<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- CSS -->
    @include('inc.css')

</head>

<style>
    div#loading {
        position: absolute;
        top: 0;
        bottom: 0%;
        left: 0;
        right: 0%;
        opacity: 0.2;
        background-color: rgb(95, 95, 95);
        z-index: 99;
    }

</style>

<body class="c-app">

    {{-- c-sidebar-dark --}}

    <div id="loading" style="display:none;">
        <div class="spinner-grow text-white" style="  position:fixed; margin-top: 20% ; margin-left:55%;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div id="wrapper" class="nav" style="position: relative; box-shadow: -30px -5px 100px grey; ">
        <!-- Sidebar -->
        <div class="c-sidebar c-sidebar-light c-sidebar-fixed " id="sidebar-wrapper" style="overflow-y:scroll">
            <div class="c-sidebar-brand d-lg-down-none text-uppercase text-weight-bold text-dark">
                Assignment Submitter New
            </div>
            <div class="list-group-flush ">

                <ul class="c-sidebar-nav ps ps--active-y">

                    <a href="/home_page" class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                            class="fa fa-tachometer mr-2"></i> Dashboard </a>

                    <a href="/profile" class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                            class="fa fa-user mr-2"></i> Profile </a>

                    <a href="/global_class" class="c-nav-link list-group-item list-group-item-action my_ajax_link"><i
                            class="fa fa-tachometer mr-2"></i> Global Classes </a>

                    {{-- ---------------------------- Faculty Sidebar ---------------------------- --}}

                    @if ($user->role_id == '1')

                        <li class="c-sidebar-nav-title">Enroll Students</li>

                        <a href="/createbatch" class="c-nav-link list-group-item list-group-item-action my_ajax_link"><i
                                class="fa fa-tachometer mr-2"></i> Create Class </a>

                        <a href="/enroll_student"
                            class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                                class="fa fa-tachometer mr-2"></i> Enroll Students</a>

                        <a href="/enroll_student"
                            class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                                class="fa fa-tachometer mr-2"></i> Class Joining Requests </a>

                        <li class="c-sidebar-nav-title">Assignment</li>

                        <a href="/create_assignment"
                            class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                                class="fa fa-tachometer mr-2"></i> Create Assignment </a>

                        <a href="/my_assignment" class="c-nav-link list-group-item list-group-item-action my_ajax_link">
                            <i class="fa fa-tachometer mr-2"></i> My Assignment</a>

                        {{-- --------------------------- Student Sidebar ---------------------------- --}}

                    @elseif( $user->role_id == '2' )

                        <li class="c-sidebar-nav-title">Assignmnets</li>

                        <a href="/submitassignment"
                            class="c-nav-link list-group-item list-group-item-action my_ajax_link">
                            <i class="fa fa-tachometer mr-2"></i> Submit Assignment </a>

                        <li class="c-sidebar-nav-title">View Submission</li>

                        <a href="/mysubmission" class="c-nav-link list-group-item list-group-item-action my_ajax_link">
                            <i class="fa fa-tachometer mr-2"></i> My Submission</a>

                    @endif

                    <li class="c-sidebar-nav-title">Other</li>

                    <li class="c-sidebar-nav-item ">
                        <a class="c-nav-link list-group-item list-group-item-action" href="/">
                            <i class="fa fa-recycle mr-2"></i>
                            Recycle Bin
                        </a>
                    </li>

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

        <header class="c-header c-header-light  c-header-with-subheader navbar-fixed" style="position: ;">

            <span class="c-header-toggler-icon navbar-toggler-icon m-3" id="menu-toggle" width="97" height="46"></span>

            <ul class="c-header-nav ml-auto mr-4">

                <li class="c-header-nav-item d-md-down-none mx-2">{{ @$user->name }}</li>

                <li>
                    <a class="" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>

            </ul>

            <div class="c-subheader justify-content-end  px-3 ">
                <button class="back">go back</button>
                <!-- Breadcrumb-->
                <x-breadcrumb breadcumb="{{ @$breadcrumb }}" breadcumb1="{{ @$breadcrumbnext }}" />
            </div>

        </header>

        <style>


        </style>

        <div class="content">

            <main id="mainpage">

                @yield('content')



            </main>

        </div>



    </div>



    <!-- SCRIPT -->
    @include('inc.script')

</body>

</html>
