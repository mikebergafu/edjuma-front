@extends('layouts.header')
@section('title')
    Home - Edjuma.com
@endsection
@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="ten columns">
                <span>We found {{count($jobs)}} jobs matching:</span>
                <h2>All Job Categories</h2>
            </div>

            <div class="six columns">
                <a href="{{route('jobs.add.form')}}" class="button">Post a Job, It’s Free!</a>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <!-- Recent Jobs -->
        <div class="row">
            <div class="col-md-9">
                <div class="padding-right">

                    <div class="listings-container">
                    @foreach($jobs as $job)
                        <!-- Listing -->
                            @if($job->name=="Ground & Landscaping")
                                <a href="{{route('jobs.apply.form',$job->id)}}" data-confirm="Click OK to Continue with Job Application " id="confirm" class="confirm listing internship">
                                    @elseif($job->name=="Vehicle Maintenance")
                                        <a href="{{route('jobs.apply.form',$job->id)}}" data-confirm="Click OK to Continue with Job Application " id="confirm" class="confirm listing full-time">
                                            @elseif($job->name=="Web, Software & IT")
                                                <a href="{{route('jobs.apply.form',$job->id)}}" data-confirm="Click OK to Continue with Job Application " id="confirm" class="confirm listing freelance">
                                                    @else
                                                        <a href="{{route('jobs.apply.form',$job->id)}}" data-confirm="Click OK to Continue with Job Application " id="confirm" class="confirm listing part-time">
                                                            @endif

                                                            <div class="listing-logo">
                                                                <img src="{{asset('edjuma/images/job-list-logo-04.png')}}" alt="">
                                                            </div>
                                                            <div class="listing-title">
                                                                <h4>{{$job->job_title}}
                                                                    <div class="clearfix"></div>
                                                                    <small>Category: </small><small style="color: #26ae61">{{$job->name}} </small>
                                                                </h4>
                                                                <h6>{{$job->job_description}}</h6>
                                                                <ul class="listing-icons">
                                                                    <li><i class="ln ln-icon-Map2"></i>{{$job->job_location}}</li>
                                                                    <li><i class="ln ln-icon-Money-2"></i> {{$job->salary."/".$job->salary_frequency}}</li>
                                                                    <li><div class="listing-date">{{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</div></li>
                                                                    <li><div class="listing-date new">Apply Now</div></li>
                                                                </ul>
                                                            </div>
                                                        </a>



                                @endforeach
                    </div>
                    <div class="clearfix"></div>
                    <div class="pagination-container">
                        {{$jobs->links()}}
                    </div>
                </div>
            </div>


            <!-- Widgets -->
            <div class="col-md-3">

                <!-- Sort by -->
                <div class="widget">
                    <h4>Sort by</h4>

                    <!-- Select -->
                    <select data-placeholder="Choose Category" class="chosen-select-no-single">
                        <option selected="selected" value="recent">Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="expiry">Expiring Soon</option>
                        <option value="ratehigh">Hourly Rate – Highest First</option>
                        <option value="ratelow">Hourly Rate – Lowest First</option>
                    </select>

                </div>



                <!-- Location -->
                <div class="widget">
                    <h4>Location</h4>
                    <form action="#" method="get">
                        <input type="text" placeholder="State / Province" value=""/>
                        <input type="text" placeholder="City" value=""/>

                        <input type="text" class="miles" placeholder="Miles" value=""/>
                        <label for="zip-code" class="from">from</label>
                        <input type="text" id="zip-code" class="zip-code" placeholder="Zip-Code" value=""/><br>

                        <button class="button">Filter</button>
                    </form>
                </div>

                <!-- Job Type -->
                <div class="widget">
                    <h4>Job Type</h4>

                    <ul class="checkboxes">
                        <li>
                            <input id="check-1" type="checkbox" name="check" value="check-1" checked>
                            <label for="check-1">Any Type</label>
                        </li>
                        <li>
                            <input id="check-2" type="checkbox" name="check" value="check-2">
                            <label for="check-2">Full-Time <span>(312)</span></label>
                        </li>
                        <li>
                            <input id="check-3" type="checkbox" name="check" value="check-3">
                            <label for="check-3">Part-Time <span>(269)</span></label>
                        </li>
                        <li>
                            <input id="check-4" type="checkbox" name="check" value="check-4">
                            <label for="check-4">Internship <span>(46)</span></label>
                        </li>
                        <li>
                            <input id="check-5" type="checkbox" name="check" value="check-5">
                            <label for="check-5">Freelance <span>(119)</span></label>
                        </li>
                    </ul>

                </div>

                <!-- Rate/Hr -->
                <div class="widget">
                    <h4>Rate / Hr</h4>

                    <ul class="checkboxes">
                        <li>
                            <input id="check-6" type="checkbox" name="check" value="check-6" checked>
                            <label for="check-6">Any Rate</label>
                        </li>
                        <li>
                            <input id="check-7" type="checkbox" name="check" value="check-7">
                            <label for="check-7">$0 - $25 <span>(231)</span></label>
                        </li>
                        <li>
                            <input id="check-8" type="checkbox" name="check" value="check-8">
                            <label for="check-8">$25 - $50 <span>(297)</span></label>
                        </li>
                        <li>
                            <input id="check-9" type="checkbox" name="check" value="check-9">
                            <label for="check-9">$50 - $100 <span>(78)</span></label>
                        </li>
                        <li>
                            <input id="check-10" type="checkbox" name="check" value="check-10">
                            <label for="check-10">$100 - $200 <span>(98)</span></label>
                        </li>
                        <li>
                            <input id="check-11" type="checkbox" name="check" value="check-11">
                            <label for="check-11">$200+ <span>(21)</span></label>
                        </li>
                    </ul>

                </div>



            </div>
            <!-- Widgets / End -->
        </div>



    </div>

@endsection
@section('scripts')
    <script>
        // Call the dataTables jQuery plugin
        /*$(document).ready(function() {
            alert('vvbn');
        });*/

       /* $('.confirm').on('click', function (e) {
            alert('vvbn');
        });*/

    </script>
    <script>
        $('.confirm').on('click', function (e) {
            if (confirm($(this).data('confirm'))) {
                return true;
            }
            else {
                return false;
            }
        });
    </script>
@endsection
