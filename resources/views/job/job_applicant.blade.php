@extends('layouts.header')
@section('title')
    Manage Resume - Edjuma.com
@endsection

@section('styles')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('content')

    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="single">
        <div class="container">

            <div class="sixteen columns">
                <h2>Manage Applications</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li>You are here:</li>
                        <li><a href="#">Home</a></li>
                        <li>Job Dashboard</li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>


    <!-- Content
 ================================================== -->
    <div class="container">

        <!-- Table -->
        <div class="sixteen columns">

            <p class="margin-bottom-25" style="float: left;">The job applications for <strong><a href="#">{{$job}}</a></strong> are listed below.</p>
            <strong><a href="{{route('applicant.get.shortlist',$job_id)}}" class="download-csv">View Shortlisted <i class="fa fa-users"></i></a></strong>
        </div>


        <div class="eight columns">
            <!-- Select -->
            <select data-placeholder="Filter by status" class="chosen-select-no-single">
                <option value="">Filter by status</option>
                <option value="new">New</option>
                <option value="interviewed">Interviewed</option>
                <option value="offer">Offer extended</option>
                <option value="hired">Hired</option>
                <option value="archived">Archived</option>
            </select>
            <div class="margin-bottom-15"></div>
        </div>

        <div class="eight columns">
            <!-- Select -->
            <select data-placeholder="Newest first" class="chosen-select-no-single">
                <option value="">Newest first</option>
                <option value="name">Sort by name</option>
                <option value="rating">Sort by rating</option>
            </select>
            <div class="margin-bottom-35"></div>
        </div>


        <!-- Applications -->
        <div class="sixteen columns">
        @foreach($my_applicants as $my_applicant)
            <!-- Application #1 -->
                <div class="application">
                    <div class="app-content">

                        <!-- Name / Avatar -->
                        <div class="info">
                            <img src="{{asset('edjuma/images/resumes-list-avatar-01.png')}}" alt="">
                            <span>{{\App\Helpers\Sitso::getAUser($my_applicant->user_id)}}</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i>{{\App\Helpers\Sitso::getEmail($my_applicant->user_id)}}</a></li>
                                <li><a href="{{route('applicant.resumes',[$my_applicant->user_id,\Faker\Provider\Uuid::uuid()])}}"><i class="fa fa-file-text"></i>Job Experience</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>Contact</a></li>
                                @if(\App\Helpers\Sitso::checkPro($my_applicant->user_id)>0)
                                    <li><a href="{{route('this.pro.status',$my_applicant->user_id)}}"><i class="fa fa-certificate"></i> Pro</a></li>
                                @else

                                @endif
                            </ul>
                        </div>

                        <!-- Buttons -->
                        <div class="buttons">
                            <a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>
                        </div>
                        <div class="clearfix"></div>

                    </div>

                    <!--  Hidden Tabs -->
                    <div class="app-tabs">

                        <a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>

                        <!-- First Tab -->
                        <div class="app-tab-content" id="one-1">

                            <div class="select-grid">
                                <select data-placeholder="Application Status" class="chosen-select-no-single">
                                    <option value="">Application Status</option>
                                    <option value="new">New</option>
                                    <option value="interviewed">Interviewed</option>
                                    <option value="offer">Offer extended</option>
                                    <option value="hired">Hired</option>
                                    <option value="archived">Archived</option>
                                </select>
                            </div>

                            <div class="select-grid">
                                <input type="number" min="1" max="5" placeholder="Rating (out of 5)">
                            </div>

                            <div class="clearfix"></div>
                            <a href="#" class="button margin-top-15">Save</a>
                            <a href="#" class="button gray margin-top-15 delete-application">Delete this application</a>

                        </div>

                        <!-- Second Tab -->
                        <div class="app-tab-content"  id="two-1">
                            <textarea placeholder="Private note regarding this application"></textarea>
                            <a href="#" class="button margin-top-15">Add Note</a>
                        </div>

                        <!-- Third Tab -->
                        <div class="app-tab-content"  id="three-1">
                            <i>Full Name:</i>
                            <span>John Doe</span>

                            <i>Email:</i>
                            <span><a href="http://www.vasterad.com/cdn-cgi/l/email-protection#204a4f484e0e444f45604558414d504c450e434f4d"><span class="__cf_email__" data-cfemail="157f7a7d7b3b717a7055706d74786579703b767a78">[email&#160;protected]</span></a></span>

                            <i>Message:</i>
                            <span>Praesent efficitur dui eget condimentum viverra. Sed non maximus ipsum, non consequat nulla. Vivamus nec convallis nisi, sit amet egestas magna. Quisque vulputate lorem sit amet ornare efficitur. Duis aliquam est elit, sed tincidunt enim commodo sed. Fusce tempus magna id sagittis laoreet. Proin porta luctus ante eu ultrices. Sed porta consectetur purus, rutrum tincidunt magna dictum tempus. </span>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="app-footer">

                        <ul>
                            @if(\App\Helpers\Sitso::getShortlistStatus($my_applicant->job_id,$my_applicant->user_id)>0)
                                <li><a style="color: #ececec;" href="{{route('applicant.set.shortlist',[$my_applicant->job_id,$my_applicant->user_id])}}"><i class="fa fa-user-plus"></i>Add to Shortlist</a></li>

                            @else
                                <li><a href="{{route('applicant.set.shortlist',[$my_applicant->job_id,$my_applicant->user_id])}}"><i class="fa fa-user-plus"></i>Add to Shortlist</a></li>
                            @endif
                            <li><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($my_applicant->created_at)->toDayDateTimeString()}}</li>
                        </ul>
                        <div class="clearfix"></div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('vendor/datatables/bergyDTController.min.js')}}"></script>
@endsection
