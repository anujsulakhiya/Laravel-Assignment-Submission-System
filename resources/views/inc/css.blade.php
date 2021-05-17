<!-- Styles -->

<!-- Font awesome css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

{{-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> --}}

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- jquery.modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- styles needed by jScrollPane -->
<link type="text/css" href="{{ asset('assets/css/jquery.jscrollpane.css') }}" rel="stylesheet" media="all" />


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

    .orders {
        overflow: hidden
    }

    .card {
        margin-bottom: 1.875em;
        border-radius: 5px;
        padding: 0;
        border: 0 solid transparent;
        -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, .08);
        box-shadow: 0 0 20px rgba(0, 0, 0, .08)
    }

    .card .box-title {
        font-weight: 600;
        font-size: 22px;
        padding: 5px 0
    }

    .card .weather-title.box-title {
        padding: 0 15px;
        line-height: 50px;
        background: #fff;
        border-radius: 5px 5px 0 0
    }

    .card .box-link {
        font-weight: 600;
        font-size: 16px;
        padding: 5px 0
    }

    .card .box-link a {
        color: green;
        text-decoration: underline;
    }

    .table-stats table {
        font-family: open sans
    }

    .table-stats table th,
    .table-stats table td {
        border: none;
        border-bottom: 1px solid #e8e9ef;
        color: #868e96;
        font-size: 12px;
        font-weight: 400;
        padding: .75em 1.25em;
        text-transform: uppercase
    }

    .table-stats table th img,
    .table-stats table td img {
        margin-right: 10px;
        max-width: 45px
    }

    .table-stats table th .name,
    .table-stats table td .name {
        color: #343a40;
        font-size: 14px;
        text-transform: capitalize
    }

    .table-stats table td {
        color: #343a40;
        font-size: 14px;
        font-weight: 600;
        text-transform: capitalize;
        vertical-align: middle
    }

    .order-table {
        position: relative
    }

    .order-table:after,
    .order-table:before {
        content: "";
        position: absolute;
        top: 0;
        height: 37px;
        width: 10px;
        background: #e8e9ef
    }

    .order-table:after {
        right: -1px
    }

    .order-table:before {
        left: -1px
    }

    .order-table tr th {
        background: #e8e9ef
    }

    .order-table tr td:last-child,
    .order-table tr th:last-child {
        text-align: none
    }

    .order-table tr:last-child td {
        border: none
    }

    .order-table .badge {
        color: #fff;
        padding: 10px;
        text-transform: uppercase;
        font-weight: 400
    }

    .order-table .badge-complete {
        background: green
    }

    .order-table .badge-pending {
        background: #fb9678
    }

    .order-table .badge-delete {
        background: #ff0000
    }

    .order-table .badge-edit {
        background: #33a2ff;
    }

    .order-table .serial {
        display: none
    }

    .ov-h {
        overflow: hidden
    }

    .badge a {
        color: #fff;
    }

    .navbar-fixed {
        top: 0;
        z-index: 100;
        position: fixed;
        width: 100%;
    }

    .classiframe {
        padding-top: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .left-panel {
        background: #fff;
        height: 100vh;
        padding: 0;
        vertical-align: top;
        width: 280px;
        -webkit-box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
        box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
        position: fixed;
        left: 0;
        bottom: 0;
        top: 55px;
        z-index: 999
    }

    .right-panel {
        background: #f1f2f7;
        margin-left: 270px;
        margin-top: 40px
    }

    .right-panel {
        background: #f1f2f7;
        margin-left: 280px;
        margin-top: 55px
    }

    .right-panel .top-left {
        width: 350px;
        float: left
    }

    .right-panel .top-rigth {
        float: left
    }

    .right-panel .breadcrumbs {
        float: left;
        margin-top: 30px;
        padding: 0 1.875em;
        width: 100%
    }

    .right-panel .breadcrumbs .breadcrumbs-inner {
        background-color: #fff
    }

    .right-panel .breadcrumbs .col-lg-8 .page-header {
        float: left
    }

    .right-panel .page-header {
        min-height: 50px;
        margin: 0;
        padding: 0 15px;
        background: #fff;
        border-bottom: 0
    }

    .right-panel .page-header h1 {
        font-size: 18px;
        padding: 15px 0
    }

    .right-panel .page-header .breadcrumb {
        margin: 0;
        padding: 13.5px 0;
        background: #fff;
        text-transform: capitalize
    }

    .right-panel .page-header .breadcrumb>li+li:before {
        padding: 0 5px;
        color: #ccc;
        content: "/\00a0"
    }

    .right-panel header.header {
        background: #fff;
        border-bottom: 1px solid #e8e9ed;
        -webkit-box-shadow: none;
        box-shadow: none;
        clear: both;
        padding: 0 30px;
        height: 55px;
        position: fixed;
        left: 280px;
        left: 0;
        right: 0;
        top: 0;
        z-index: 999
    }

    .right-panel .navbar-brand {
        width: 250px;
        display: inline-block
    }

    .right-panel .menutoggle {
        padding-top: 7px
    }

    .right-panel .navbar-header {
        width: 100%;
        background-color: #fff;
        padding: 0 1.25em 0 0
    }

    .right-panel .navbar-header>a {
        display: inline-block
    }

    .right-panel .navbar-brand {
        line-height: 42px
    }

    .right-panel .navbar-brand img {
        max-width: 145px
    }

    .right-panel .navbar-brand.hidden {
        display: none
    }

    .open .right-panel {
        margin-left: 83px
    }

    /* main content csss to fix in right side */
    .content {
        margin-left: 265px;
        margin-top: 110px;
        margin-right: 10px;
        width: auto;
        position: relative;
        overflow: auto;
        z-index: 1;
    }

    @media (max-width:600px) {

        .content {
            margin-left: 25px;
        }
    }

    .modal {
        display: none;
        vertical-align: right;
        position: relative;
        z-index: 1;
        max-width: 70%;
        max-height: 70%;
        box-sizing: border-box;
        width: 90%;
        background: #fff;
        padding: 15px 30px;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        -o-border-radius: 8px;
        -ms-border-radius: 8px;
        border-radius: 0px;
        -webkit-box-shadow: 0 0 10px #000;
        -moz-box-shadow: 0 0 10px #000;
        -o-box-shadow: 0 0 10px #000;
        -ms-box-shadow: 0 0 10px #000;
        box-shadow: 0 0 10px #000;
        text-align: left;
        margin-left: 25%
    }

</style>
