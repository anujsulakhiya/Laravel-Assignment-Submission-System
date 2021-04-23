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

<body class="c-app">

    <div id="wrapper" style="position: relative;">
        <!-- Sidebar -->
        <div class="c-sidebar c-sidebar-dark c-sidebar-lg-show c-sidebar-show sidenav" id="sidebar-wrapper">
            <div class="c-sidebar-brand d-lg-down-none text-uppercase text-weight-bold">
                Assignment Submitter New
            </div>
            <div class="list-group-flush">
                <ul class="c-sidebar-nav ps ps--active-y ">

                    <li id="" class="c-sidebar-nav-item "><a class="c-nav-link list-group-item list-group-item-action"
                            href="/home"><i class="fa fa-tachometer mr-2"></i>
                            Dashboard <span class="badge badge-info">NEW</span></a></li>

                    <li id="dashboard" class="c-sidebar-nav-item"><a
                            class="c-nav-link list-group-item list-group-item-action" href="#"><i
                                class="fa fa-tachometer mr-2"></i>Dashboard</a></li>

                    <li id="profile" class="c-sidebar-nav-item "><a
                            class="c-nav-link list-group-item list-group-item-action" href="#"><i
                                class="fa fa-user mr-2"></i>
                            Profile</a></li>


                    <li class="c-sidebar-nav-title">Enroll Students</li>

                    <li id="createbatch" class="c-sidebar-nav-item ">
                        <a class="c-nav-link list-group-item list-group-item-action" href="#">
                            <i class="fa fa-graduation-cap mr-2"></i>Create Class</a>
                    </li>

                    <li id="enrollstudent" class="c-sidebar-nav-item ">
                        <a class="c-nav-link list-group-item list-group-item-action" href="#">
                            <i class="fa fa-graduation-cap mr-2"></i>Enroll Students</a>
                    </li>

                    <li id="class_joining_requests" class="c-sidebar-nav-item ">
                        <a class="c-nav-link list-group-item list-group-item-action" href="#">
                            <i class="fa fa-graduation-cap mr-2"></i>Class Joining Requests</a>
                    </li>

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
            <div class="c-subheader px-3">
                <!-- Breadcrumb-->
                <x-breadcrumb breadcumb="{{ @$breadcrumb }}" breadcumb1="{{ @$breadcrumbnext }}" />
            </div>

        </header>

        <div class="container-fluid">

            <div>
                <main id="mainpage">

                    @yield('content')

                </main>
            </div>

        </div>
    </div>


    <!-- SCRIPT -->
    @include('inc.script')

</body>

</html>
