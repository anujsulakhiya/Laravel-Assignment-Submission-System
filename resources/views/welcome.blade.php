<title>{{ config('app.name') }}</title>

<!-- -------------- CSS -------------- -->

<!-- Font awesome css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Custom CSS -->
<link href="assets/css/custom.css" rel="stylesheet">

<style>
    .navbar-fixed-top {
        top: -70px;
        opacity: 0;
    }

</style>

<!-- -------------- JS -------------- -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!--Start navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-primary text-darkpl-5 fixed-top navbar-fixed-top">
    <a href="#" class="navbar-brand text-uppercase">{{ config('app.name') }}</a>
    <span style="font-size:1vw;" class="navbar-text">Makes Your Work Easy</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="myMenu">
        <ul class="navbar-nav pl-5 custom-nav">

            <li class="nav-item"> <a href="#home" class="nav-link">Home</a></s></li>
            <li class="nav-item"> <a href="#register" class="nav-link">Registration</a></s></li>
            <!-- <li class="nav-item"> <a href="user/login.php" class="nav-link">Login</a></s></li> -->
            <li class="nav-item"> <a href="#contact" class="nav-link">Contact</a></s></li>
        </ul>
    </div>
</nav>
<!--End navigation -->

<!--Start Header jumbotron -->
<header class="jumbotron back-image" style="background-image:url(assets/images/Banner3.jpg);" id="home">

    <div class="col-md-12 text-center">
        <div class="myclass mainheding">
            <h1 class="text-uppercase text-primary font-weight-bold text-shadow ">
                Welcome to {{ config('app.name') }}</h1>
            <p class="font-italic">Makes Your Work Easy</p>
            @if (Route::has('login'))
                @auth
                    <a class="btn btn-success" href="{{ url('/home') }}">Dashboard</a>
                @else
                    <a class="btn btn-success mr-4" href="{{ route('login') }}">Login</a>
                    <a href="#register" class="btn btn-primary mr-4">Register</a>
                @endauth
            @endif

        </div>
    </div>


</header>
<!--End Header jumbotron -->

<!--Start Introduntion Section -->

<!--End Introduntion Section -->

<!--Start Registration Section -->

<section class="forms" id="register"  >
    <div class="container-fluid mt-2" >
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border:0px;">
                    <div class="pt-5" >
                        <h2 class="text-center">Create an Account</h2>
                    </div>
                    <div class=" card-body">

                        <div class="col-md-8 offset-md-2">

                            <div class="card mt-2">
                                <div class="card-body mt-2 shadow p-4">

                                    {{ Form::open(['route' => 'register']) }}
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <i class="fa fa-user"></i><label for="name"
                                                class="font-weight-bold pl-2">Name</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fa fa-user"></i><label for="email"
                                                class="font-weight-bold pl-2">Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fa fa-key"></i><label for="password"
                                                class="font-weight-bold pl-2">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <i class="fa fa-key"></i><label for="password_confirmation"
                                                class="font-weight-bold pl-2">Confirm
                                                Password</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="col-md-4">
                                            <i class="fa fa-key"></i><label for="role"
                                                class="font-weight-bold pl-2">Role</label>
                                            <select name="role" class="form-control" required
                                                value="{{ old('name') }}" id="role">
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
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    {{ Form::close() }}


                                </div>
                            </div>



                        </div>
                        <br>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</section>

<!--End Registration Section -->

<!--Start Contact Section -->

<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border:0px;">
                    <div class="pt-5" id="contact">
                        <h2 class="text-center">Contact Us</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-body">

                                <div class="">

                                    <div class="card">
                                        <div class="card-body mt-2 shadow p-4">

                                            {{ Form::open(['route' => 'register']) }}
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <i class="fa fa-user"></i><label for="name"
                                                        class="font-weight-bold pl-2">Name</label>
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name">

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="fa fa-user"></i><label for="email"
                                                        class="font-weight-bold pl-2">Email</label>
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <i class="fa fa-user"></i><label for="subject"
                                                        class="font-weight-bold pl-2">Subject</label>
                                                    <input id="subject" type="text"
                                                        class="form-control @error('subject') is-invalid @enderror"
                                                        name="subject" value="{{ old('subject') }}" required>

                                                    @error('subject')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="row mt-2">

                                                <div class="col-md-12">
                                                    <i class="fa fa-user"></i><label for="email"
                                                        class="font-weight-bold pl-2">Description</label>

                                                    <textarea
                                                        class="form-control  @error('description') is-invalid @enderror"
                                                        id="description" name="description" rows="5"
                                                        value="{{ old('description') }}"
                                                        placeholder="How can we help you?"></textarea>

                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <br>
                                            <div class="">
                                                <button type="submit" class="btn btn-primary p-2 mt-1  shadow-sm ">
                                                    {{ __('Submit Query') }}
                                                </button>
                                            </div>
                                            {{ Form::close() }}


                                        </div>
                                    </div>



                                </div>
                                <br>

                            </div>
                        </div>
                        <div class="col-md-4 text-center mt-5 ">
                            <strong>Contact Info :<br><br>

                                ANUJ SULAKHIYA<br>
                                B.Tech CS (Second Year)<br>
                                College :
                                IPS ACADEMY, Indore<br>
                                Phone : +919009111944<br><br><br>
                                Address :<br>Betma,Indore,<br>Madhaya Pradesh,453001<br>
                                <a href="#" class="text-secondary">www.assignmentsubmitter.com</a>
                            </strong>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</section>


<footer class="bg-dark text-white" style="background: black">
    <div class="container">
        <div class="row py-3">
            <div class="col-md-6">
                <span class="pr-2">Follow us:</span>
                <a href="#" class="pr-2 fi-color"><i class="fa fa-facebook"></i></a>
                <a href="#" class="pr-2 fi-color"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="col-md-6 text-right">
                <a class="text-white text-weight-bold"
                    href="{{ route('register') }}">{{ __('Admin Registration') }}</a>
                <small>Designed By Anuj &copy; 2020</small>
                <!-- <small class="ml-2"><a href="#">Admin Login</a></small> -->
            </div>
        </div>
    </div>
</footer>
<!--END Contact Section -->

<script>
    /*---------------------------------------*/
    /*	NAVIGATION AND NAVIGATION VISIBLE ON SCROLL
    /*---------------------------------------*/
    $(window).on("load", function() {
        mainNav();
        $(window).scroll(function() {
            mainNav();
        });

        function mainNav() {
            var top = (document.documentElement && document.documentElement.scrollTop) || document.body
                .scrollTop;
            if (top > 40) $('.navbar-fixed-top').stop().animate({
                "opacity": '1',
                "top": '0'
            });
            else $('.navbar-fixed-top').stop().animate({
                "top": '-70',
                "opacity": '0'
            });

        }
    });

</script>
