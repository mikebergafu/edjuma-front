@extends('layouts.header')
@section('title')
Manage Jobs - Edjuma.com
@endsection

@section('styles')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="ten columns">
                <span>Your Job Postings</span>
                <h2>Manage Jobs</h2>
            </div>

            <div class="six columns">
                <a href="{{route('jobs.add.form')}}" class="button">Post a Job, It’s Free!</a>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <!-- Container -->
    <div class="container">

        <!-- Table -->
        <div class="sixteen columns">

            <p class="margin-bottom-25">Your listings are shown in the table below. Expired listings will be automatically removed after 30 days.</p>

            <!-- Widgets -->
            <div class="eight columns">

                <!-- Search -->
                <div class="widget">
                    <form action="#" method="get">
                        <input type="text" class="job-icons" placeholder="Search Your Job Listings" value=""/>
                    </form>
                </div>


            </div>
            <!-- Widgets / End -->
            <table class="manage-table responsive-table">

                <tr>
                    <th><i class="fa fa-file-text"></i> Title</th>
                    <th><i class="fa fa-check-square-o"></i> Filled?</th>
                    <th><i class="fa fa-calendar"></i> Date Posted</th>
                    <th><i class="fa fa-calendar"></i> Date Expires</th>
                    <th><i class="fa fa-user"></i> Applications</th>
                    <th></th>
                </tr>


                <!-- Items -->
                @foreach($my_job_postings as $my_job_posting)
                    <tr>
                        <td class="title"><a href="{{route('this.jobs.applicants',$my_job_posting->id)}}">{{$my_job_posting->job_title}}
                                <br><span class="pending" ><a style="color: #26ae61;" href="{{route('home')}}">{{\App\Helpers\Sitso::getJobCategory($my_job_posting->job_category)}}</a></span></a></td>
                        <td class="centered"><i class="fa fa-check"></i></td>
                        <td><small>{{\Carbon\Carbon::parse($my_job_posting->job_starts)->toDayDateTimeString()}}</small></td>

                        <td><small>{{\Carbon\Carbon::parse($my_job_posting->job_ends)->toDayDateTimeString()}}</small></td>
                        <td class="centered"><a href="{{route('this.jobs.applicants',$my_job_posting->id)}}" class="button">{{\App\Helpers\Sitso::getThisApplicantCount($my_job_posting->id,Auth::user()->id)}}</a></td>
                        <td class="action">
                            <a href="#" class="" style="color: #0b7bb5;"><i class="fa fa-pencil" style="color: #0b7bb5;"></i>Edit</a>
                            <a href="#" class="" style="color: #ee3c31;"><i class="fa fa-trash" style="color: #ee3c31;"></i>Delete</a>
                        </td>
                    </tr>
                @endforeach

            </table>

            <div class="clearfix"></div>

            <div class="pagination-container">
                <nav class="pagination">
                    <ul>
                        <li><a href="#" class="current-page">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="blank">...</li>
                        <li><a href="#">22</a></li>
                    </ul>
                </nav>

                <nav class="pagination-next-prev">
                    <ul>
                        <li><a href="#" class="prev">Previous</a></li>
                        <li><a href="#" class="next">Next</a></li>
                    </ul>
                </nav>
            </div>

            <br>
            <a href="{{route('jobs.add.form')}}" class="button">Add Job</a>

        </div>

    </div>


@endsection

@section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('vendor/datatables/bergyDTController.min.js')}}"></script>

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
