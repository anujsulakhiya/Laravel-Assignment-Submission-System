@extends('layouts.Layout')

@section('content')

    <section class="forms">
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h5">Join Class</h3>
                        </div>

                        <!-- Modal HTML embedded directly into document -->

                        <div class="card">
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <h5 class="card-title">Faculty Name</h5>
                                        <p class="card-text">{{ @$faculty_name->name }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Faculty Email</h5>
                                        <p class="card-text">{{ @$batch_detail->creater_email }}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Class Name</h5>
                                        <p class="card-text">{{ @$batch_detail->batch_name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="card-title">Description</h5>
                                        <p class="card-text">
                                            @if (!empty($batch_detail->description))
                                                {{ @$batch_detail->description }}
                                            @else
                                                {{ 'No Description' }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Created At</h5>
                                        <p class="card-text">
                                            {{ date('F d, Y', strtotime(@$batch_detail->created_at)) }}
                                        </p>
                                    </div>

                                </div>
                                <br>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @else

                                    <a href="/sendjoningrequest/{{ @$batch_detail->id }}"
                                        class="btn btn-primary btn-sm my_mainpage_link">Send Joining
                                        Request</a>

                                @endif

                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>


    <script>
        $(document).ready(function() {
            set_my_ajax_link_in_mainpage();


        });

    </script>

@endsection

