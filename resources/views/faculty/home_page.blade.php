<style>
    .card [class*="card-header-"] .card-icon,
    .card [class*="card-header-"] .card-text {
        border-radius: 3px;
        background-color: #999999;
        padding: 15px;
        margin-top: -20px;
        margin-right: 15px;
        float: left;
    }

    .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 24px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -moz-font-feature-settings: 'liga';
        -moz-osx-font-smoothing: grayscale;
    }

    .card .card-header-warning .card-icon,
    .card .card-header-warning:not(.card-header-icon):not(.card-header-text),
    .card .card-header-warning .card-text {
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
    }

    .card .card-header-warning .card-icon,
    .card .card-header-warning .card-text,
    .card .card-header-warning:not(.card-header-icon):not(.card-header-text),
    .card.bg-warning,
    .card.card-rotate.bg-warning .front,
    .card.card-rotate.bg-warning .back {
        background: linear-gradient(60deg, #ffa726, #fb8c00);
        background-color: rgba(0, 0, 0, 0);
    }

</style>

<div class="mx-5 mt-4">
    <div class="">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon text-white">
                            <i class="material-icons">book</i>
                        </div>
                        <p class="card-category">Total Assignments</p>
                        <h3 class="card-title">

                            @if (!empty($assignment_count))
                                {{ @$assignment_count }}
                            @else
                                0
                            @endif

                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="/my_assignment" class="my_mainpage_link">See Assignments</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon bg-success text-white">
                            <i class="material-icons">book</i>
                        </div>
                        <p class="card-category">Classes</p>
                        <h3 class="card-title">
                            @if (!empty($batch_count))
                                {{ @$batch_count }}
                            @else
                                0
                            @endif
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="/enroll_student" class="my_mainpage_link">See Classes</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon bg-danger text-white">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Total Students</p>
                        <h3 class="card-title">
                            @if (!empty($student_count))
                                {{ @$student_count }}
                            @else
                                0
                            @endif
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="/all_class_joining_request" class="my_mainpage_link">See Joining Request</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Followers</p>
                        <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header card-header-warning">
                        <div class="ct-chart" id="websiteViewsChart"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Active Assignments</h4>
                        <p class="card-category">
                            <span class="text-success"></span> increase in today sales.
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> Last Assignment 4 minutes ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header card-header-warning ">
                        <div class="ct-chart " id="websiteViewsChart"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Today's Assignment</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header card-header-warning">
                        <div class="ct-chart" id="websiteViewsChart"></div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Tasks</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-danger bg-success text-white">
                        <h4 class="card-title">Last Date of Assignment</h4>
                        <p class="card-category">List of Assignment Having Last Date Today</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            @if (!empty($Today_assignment_list[0]))
                                <thead class="text-warning">
                                    <th>No</th>
                                    <th>Class Name</th>
                                    <th>Assignment</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($Today_assignment_list as $assignment)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $assignment->batch_name }}</td>
                                            <td>{{ $assignment->assignment_name }}</td>
                                            <td>
                                                <a href="/view_batch_assignment/{{ $assignment->id }}"
                                                    class="btn btn-success btn-sm my-1 my_mainpage_link"  > View</a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            @else
                                No Assignments For Today
                            @endif

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-danger bg-danger text-white">
                        <h4 class="card-title">Joining Request</h4>
                        <p class="card-category">List of Joining Request </p>
                    </div>
                    <div class="card-body table-responsive">

                        @if (!empty($Today_joining_request_list[0]))


                            <table class="table table-hover">
                                <thead class="text-warning">

                                    <th>No</th>
                                    <th>Class Name</th>
                                    <th>Assignment</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($Today_joining_request_list as $request)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $request->batch_name }}</td>
                                            <td>{{ $request->email }}</td>
                                            <td>
                                                <form action="/batch_joining_request"
                                                    onsubmit="return post_request(this)">
                                                    @csrf
                                                    <input type="hidden" name="batch_id" value="{{ $request->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm my-1">
                                                        View</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            No Request Found
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="/truncate_assignment" class="btn btn-danger btn-sm my_mainpage_link">Truncate Assignment</a>
<a href="/truncate_batch" class="btn btn-danger btn-sm my_mainpage_link">Truncate Batch</a>
<a href="/logActivity" class="btn btn-danger btn-sm my_mainpage_link">logActivity</a>



<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>
