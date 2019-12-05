@extends('layouts.dashboard')


@section('content')

    @if(auth()->user()->is_admin())
        <div class="row">
            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-success">
                    <h4>Users</h4>
                    <h5>{{$usersCount}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 bg-warning">
                    <h4>Payments</h4>
                    <h5>{!! get_amount($totalPayments) !!}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 bg-light">
                    <h4>Active Jobs</h4>
                    <h5>{{$activeJobs}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-danger">
                    <h4>Total Jobs</h4>
                    <h5>{{$totalJobs}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-dark">
                    <h4>Employer</h4>
                    <h5>{{$employerCount}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-info">
                    <h4>Agent</h4>
                    <h5>{{$agentCount}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-primary">
                    <h4>Applied</h4>
                    <h5>{{$totalApplicants}}</h5>
                </div>
            </div>
        </div>
    @else

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4 mb-3 mb-md-0">
                        <div class="card boxshadow">
                            <div class="card-body">
                                <h3 class="card-title ">Hired Jobs</h3>
                                <h2 class="card-text"> <span style=" color: #1d643b">10</span> Jobs </h2>
                                <a href="#!" class="btn btn-success">View All</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-3 mb-md-0">
                        <div class="card boxshadow">
                            <div class="card-body">
                                <h3 class="card-title ">Completed Jobs</h3>
                                <h2 class="card-text"> <span style=" color: #1d643b">10</span> Jobs </h2>
                                <a href="#!" class="btn btn-success">View All</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-3 mb-md-0">
                        <div class="card boxshadow">
                            <div class="card-body">
                                <h3 class="card-title ">Cancelled Jobs</h3>
                                <h2 class="card-text"> <span style=" color: #1d643b">10</span> Jobs </h2>
                                <a href="#!" class="btn btn-danger">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="margin: 20px" class="divider"></div>
                <div class="main-page-title mt-3 mb-3 d-flex">
                    <h3 class="flex-grow-1">Current Available Jobs</h3>

                    <div class="action-btn-group">@yield('title_action_btn_gorup')</div>
                </div>
            </div>
        </div>

        <div class="row">


                @foreach($jobs as $regular_job)

                    <div style="box-shadow: 0.1em 0.1em 0.5em 0.1em #dffadc; margin-bottom: 15px; " class="col-md-4 col-sm-4">
                        <!-- Card -->
                        <a style="text-decoration: none" href="{{route('job_view', $regular_job->job_slug)}}">
                                <div class="card-body">
                                    <!-- Title -->
                                    <h4 class="card-title">{!! $regular_job->job_title !!}</h4>
                                    <!-- Text -->
                                    <p class="card-text">
                                        <i class="la la-map-marker"></i>
                                        @if($regular_job->city_name)
                                            {!! $regular_job->city_name !!},
                                        @endif
                                        @if($regular_job->state_name)
                                            {!! $regular_job->state_name !!},
                                        @endif
                                        @if($regular_job->state_name)
                                            {!! $regular_job->country_name !!}
                                        @endif
                                    </p>
                                    <!-- Button -->
                                    <a href="{{route('job_view', $regular_job->job_slug)}}" class="btn btn-success">View Job</a>
                                </div>
                        </a>
                        <!-- Card -->
                    </div>

                @endforeach

        </div>
    @endif

@endsection
