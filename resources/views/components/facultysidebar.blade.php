

<div class="d-flex" id="wrapper" >
    <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
      <!-- <div class="sidebar-heading bg-danger text-light font-weight-bold">Assignment Submitter </div> -->
    <div class="list-group list-group-flush">

      <a href="/home" class="list-group-item list-group-item-action bg-light"><i class="fa fa-tachometer mr-2"></i>Dashboard</a>

      <a href="/profile" class="list-group-item list-group-item-action bg-light"><i class="fa fa-user mr-2"></i>Profile</a>

      <a href="/enrollstudent" class="list-group-item list-group-item-action bg-light"><i class="fa fa-graduation-cap mr-2"></i>Enroll Students</a>

      <a href="/createassignment" class="list-group-item list-group-item-action bg-light"><i class="fa fa-plus  mr-2"></i>Create Assignment</a>

      <a href="/myassignment" class="list-group-item list-group-item-action bg-light"><i class="fa fa-book mr-2"></i>My Assignment</a>

      <a href="/submitassignment" class="list-group-item list-group-item-action bg-light"><i class="fa fa-file-text mr-2"></i>Submit Assignment</a>

      <a href="/deletedassignment" class="list-group-item list-group-item-action bg-light"><i class="fa fa-recycle  mr-2"></i>Recycle Bin</a>


      </div>
    </div>



    <div class="bg-light container-fluid">
        <div class="row">
            <nav style="padding: 0px;" class="container-fluid mb-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li><a class="text-danger" href="home"><i class="fa fa-home text-danger"></i> Home</a><i class="dot fa fa-circle"></i> </li>
                    @if (!empty($breadcumb1))
                        <?php $segments = ''; ?>
                        @foreach(Request::segments() as $segment)
                            <?php $segments .= '/'.$segment; ?>
                            <li>
                                <a class="text-danger" href="">{{ @$breadcumb  }}</a>
                                <i class="dot fa fa-circle"></i>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ @$breadcumb1 }}</li>
                        @endforeach

                        @else
                        <li class="breadcrumb-item active" aria-current="page">{{ @$breadcumb }}</li>
                    @endif
                </ol>
            </nav>
            <div class="col-md-12" id="maincontent">
                <div class='mx-3'>
    {{-- <div class="row">
        <div class="col-md-12">
            <nav class="mt-2" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li><a class="text-danger" href="dashboard"><i class="fa fa-home text-danger"></i> Home</a><i class="dot fa fa-circle"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page">My Assignment</li>
                </ol>
            </nav>
        </div> --}}


