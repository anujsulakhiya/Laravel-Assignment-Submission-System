

<!-- Styles -->

    <!-- Font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Scripts -->


<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<style>
    html {
        scroll-behavior: smooth;
    }

    body {
        overflow: auto;
    }

    .sidenav {
        height: 100%;
        /* width: 160px;
    /* position: fixed; */
        /* z-index: 1;
    top: 0;
    left: 0; */
        /* background-color: #111; */
        /* overflow-x: hidden;
    padding-top: 20px;
    */
    }

    a:link {
        text-decoration: none;
    }

    .navbar #myMenu .custom-nav .nav-item a {
        color: white;
    }

    .navbar #myMenu .custom-nav .nav-item a:hover {
        color: #ffb5b0;
    }

    .back-image {
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        min-height: 90vh;
        border-radius: 0px;
        margin-top: 56px;
    }

    .back-image-login {
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        min-height: 90vh;
        border-radius: 0px;
        /* margin-top: 56px; */
    }

    .appback-image {
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        min-height: 90vh;
        border-radius: 0px;
    }

    .font-italic {
        font-size: 22px;
    }

    .mainheding {
        margin-top: 50px;
    }

    @media only screen and (max-width: 600px) {
        .myclass {
            margin-top: 80px;
            text-align: center;
        }
    }

    .fi-color {
        color: #dc3545;
    }

    .fi-color:hover {
        color: #f5adb4;
    }

    .text-shadow {
        text-shadow: 4px 4px 7px rgb(247, 197, 197);
    }

    /* .button {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .btn {
        border-radius: 0rem;
        border: 0px;
    } */

    #wrapper {
        overflow-x: hidden;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.9rem 0.25rem;
        font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
        width: 15rem;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
    }

    .list-group-item.active {
        z-index: 2;
        color: #dc3545;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .table td,
    .table th {
        padding: 0.45rem;
        vertical-align: middle;
    }

    .breadcrumb {
        /* padding: .75rem 1.25rem; */
        border-radius: 0rem;
    }

    .dot {
        font-size: 5px;
        position: relative;
        top: -3px;
        margin-left: .5rem;
        margin-right: .5rem;
        color: #000000 !important;
    }

    .form-control {
        border-radius: 0rem;
    }

    .input-group-text {
        border-radius: 0%;
    }


    /* Style The Dropdown Button */

    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }


    /* The container <div> - needed to position the dropdown content */

    .dropdown {
        position: relative;
        display: inline-block;
    }


    /* Dropdown Content (Hidden by Default) */

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }


    /* Links inside the dropdown */

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }


    /* Change color of dropdown links on hover */

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }


    /* Show the dropdown menu on hover */

    .dropdown:hover .dropdown-content {
        display: block;
    }


    /* Change the background color of the dropdown button when the dropdown content is shown */

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }

    /* .breadcrumb {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding: .75rem 1rem;
        margin-bottom: 0rem;
        list-style: none;
        background-color: #e9ecef;
        border-radius: .25rem;
    } */

</style>
