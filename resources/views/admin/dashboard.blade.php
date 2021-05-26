<div id="wrapper" class="nav toggled" style="position: relative; box-shadow: -30px -5px 100px grey;  ">
    <!-- Sidebar -->
    <div class="c-sidebar c-sidebar-light c-sidebar-fixed  scroll-pane scrollbar-primary scroller"
        id="sidebar-wrapper" style="overflow-y:auto">
        <div class="c-sidebar-brand d-lg-down-none text-uppercase text-weight-bold text-dark">
            Assignment Submitter
        </div>
        <div class="list-group-flush ">

            <ul class="c-sidebar-nav ps ps--active-y">

                <a href="/home_page" class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                        class="fa fa-tachometer mr-2"></i> Dashboard </a>

                <a href="/profile" class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                        class="fa fa-user mr-2"></i> Profile </a>

                <a href="/global_class"
                    class="c-nav-link list-group-item list-group-item-action my_ajax_link"><i
                        class="fa fa-tachometer mr-2"></i> Global Classes </a>

                {{-- ---------------------------- Faculty Sidebar ---------------------------- --}}

                @if ($user->role_id == '1')

                    <li class="c-sidebar-nav-title">Enroll Students</li>

                    <a href="/createbatch"
                        class="c-nav-link list-group-item list-group-item-action my_ajax_link"><i
                            class="fa fa-tachometer mr-2"></i> Create Class </a>

                    <a href="/enroll_student"
                        class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                            class="fa fa-tachometer mr-2"></i> Enroll Students</a>

                    <a href="/all_class_joining_request"
                        class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                            class="fa fa-tachometer mr-2"></i> Class Joining Requests </a>

                    <li class="c-sidebar-nav-title">Assignment</li>

                    <a href="/create_assignment"
                        class="c-nav-link list-group-item list-group-item-action my_ajax_link"> <i
                            class="fa fa-tachometer mr-2"></i> Create Assignment </a>

                    <a href="/my_assignment"
                        class="c-nav-link list-group-item list-group-item-action my_ajax_link">
                        <i class="fa fa-tachometer mr-2"></i> My Assignment</a>

                    {{-- --------------------------- Student Sidebar ---------------------------- --}}

                @elseif( $user->role_id == '2' )

                    <li class="c-sidebar-nav-title">Assignmnets</li>

                    <a href="/submitassignment"
                        class="c-nav-link list-group-item list-group-item-action my_ajax_link">
                        <i class="fa fa-tachometer mr-2"></i> Submit Assignment </a>

                    <li class="c-sidebar-nav-title">View Submission</li>

                    <a href="/mysubmission"
                        class="c-nav-link list-group-item list-group-item-action my_ajax_link">
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('admin dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<header class="header bg-light" id="header">
    <div class="header__toggle text-dark">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>
    <div class="header__img">
        <img src="img/p-1.jpg">
    </div>
</header>

<div class="l-navbar " id="nav-bar">
    <nav class="nav">

        <div>
            <a href="#" class="nav__logo">
                <i class='bx bx-layer nav__logo-icon'></i>
                <span class="nav__logo-name">Assignment Submitter</span>
            </a>
            <div class="nav__list">

                <a href="/home_page" class=" nav__link bx bx-message-square-detail my_ajax_link">
                    <span class="nav__name my_ajax_link">Dashboard</span>
                </a>

                <a href="/profile" class=" nav__link bx bx-user my_ajax_link">
                    <span class="nav__name my_ajax_link">Profile</span>
                </a>

                <a href="/global_class" class=" nav__link bx bx-message-square-detail my_ajax_link">
                    <span class="nav__name my_ajax_link">Global Classes</span>
                </a>

                @if ($user->role_id == '1')

                    <a href="/createbatch" class=" nav__link bx bx-plus my_ajax_link">
                        <span class="nav__name my_ajax_link">Create Batch</span>
                    </a>

                    <a href="/home_page" class=" nav__link bx bx-message-square-detail my_ajax_link">
                        <span class="nav__name my_ajax_link">Dashboard</span>
                    </a>

                    <a href="/profile" class=" nav__link bx bx-user my_ajax_link">
                        <span class="nav__name my_ajax_link">Profile</span>
                    </a>

                    <a href="/home_page" class=" nav__link bx bx-message-square-detail my_ajax_link">
                        <span class="nav__name my_ajax_link">Dashboard</span>
                    </a>

                    <a href="/profile" class=" nav__link bx bx-user my_ajax_link">
                        <span class="nav__name my_ajax_link">Profile</span>
                    </a>
                @endif
                <a href="/profile" class="btn btn-default pull-left my" title="Edit">
                    <i class="fa fa-plus"></i>
                </a>


                <a href="/profile" class=" btn nav__link my_ajax_link">
                    <i class='bx bx-message-square-detail nav__icon my_ajax_link'></i>
                    <span class="nav__name my_ajax_link">Profile</span>
                </a>
                <a href="#" class="nav__link">
                    <i class='bx bx-list-ul nav__icon'></i>
                    <span class="nav__name">Lists</span>
                </a>
                <a href="#" class="nav__link">
                    <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                    <span class="nav__name">Analytics</span>
                </a>
                <a href="#" class="nav__link">
                    <i class='bx bx-mail-send nav__icon'></i>
                    <span class="nav__name">Support</span>
                </a>
            </div>
        </div>
        <a href="#" class="nav__link">
            <i class='bx bx-log-out nav__icon'></i>
            <span class="nav__name">Log Out</span>
        </a>
    </nav>
</div>
