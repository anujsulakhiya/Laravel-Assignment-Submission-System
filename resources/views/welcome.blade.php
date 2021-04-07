<title>{{ config('app.name') }}</title>

<!-- -------------- CSS -------------- -->

<!-- Font awesome css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Custom CSS -->
<link href="assets/css/custom.css" rel="stylesheet">

<!-- -------------- JS -------------- -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!--Start navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-primary pl-5 fixed-top">
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
<div class="container">
    <div class="pt-5" id="register">
        <h2 class="text-center">Create an Account</h2>

    </div>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <div class="card-body shadow p-4">

                {{ Form::open(array('route' => 'register')) }}

                {{-- <form method="POST" action="{{ route('register') }}"> --}}
                    @csrf

                    <div class="form-group">
                        <i class="fa fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <i class="fa fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <i class="fa fa-key"></i><label for="password" class="font-weight-bold pl-2">Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <i class="fa fa-key"></i><label for="password_confirmation"
                            class="font-weight-bold pl-2">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <i class="fa fa-key"></i><label for="role" class="font-weight-bold pl-2">Role</label>
                        <select name="role" class="form-control" required value="{{ old('name') }}" id="role">
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


                    <button type="submit" class="btn btn-primary mt-5 btn-block shadow-sm font-weight-bold">
                        {{ __('Register') }}
                    </button>

                    {{ Form::close() }}

                {{-- </form> --}}
            </div>

        </div>
    </div>
</div>
<!--End Registration Section -->

<!--Start Contact Section -->
<div class="container-fluid bg-light shadow pt-4" id="contact">
    <h2 class="text-center mx-4 p-5 "> Contact Us</h2>
    <div class="row ">
        <div class="col-md-6 mx-5 bg-light shadow p-4">
            <form action="./inc/user_query.php" method="POST">
                <input type="text" class="form-control" name="u_name" placeholder="Name" required><br>
                <input type="text" class="form-control" name="u_subject" placeholder="Subject" required><br>
                <input type="email" class="form-control" name="u_email" placeholder="Email" required><br>
                <textarea class="form-control" name="message" rows="5" placeholder="How can we help you?"></textarea>
                <input type="submit" class="btn btn-primary mt-3" name="send" value="Send">
            </form><br><br>
            <?php if (isset($_GET['id'])) {
            echo $_GET['id'];
            } ?>
        </div>
        <div class="col-md-5  text-center  text-secondary">
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

    <br>
</div>
<footer class="container-fluid bg-dark text-white">
    <div class="container">
        <div class="row py-3">
            <div class="col-md-6">
                <span class="pr-2">Follow us:</span>
                <a href="#" class="pr-2 fi-color"><i class="fa fa-facebook"></i></a>
                <a href="#" class="pr-2 fi-color"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('register') }}">{{ __('Admin Registration') }}</a>
                <small>Designed By Anuj &copy; 2020</small>
                <!-- <small class="ml-2"><a href="#">Admin Login</a></small> -->
            </div>
        </div>
    </div>
</footer>
<!--END Contact Section -->
