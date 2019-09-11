@extends('layouts.header')
@section('title')
    Manage Job Experience - Edjuma.com
@endsection

@section('styles')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('content')

    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="resume">
        <div class="container">
            <div class="ten columns">
                <div class="resume-titlebar">
                    <img src="{{asset('edjuma/images/resumes-list-avatar-01.png')}}" alt="">
                    <div class="resumes-list-content">
                        <h4>{{\App\Helpers\Sitso::getAUser($user_id)}}
                            <span>{{\App\Helpers\Sitso::getJob($user_id)}}</span></h4>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>

        <div class="six columns">
            <a href="{{route('resume.form',[Auth::user()->id, \Faker\Provider\Uuid::uuid()])}}" class="button">Add to Shortlist <i class="fa fa-plus-square"></i></a>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <!-- Recent Jobs -->
        <div class="eight columns">
            <div class="padding-right">

                <h3 class="margin-bottom-15">About Me</h3>

                <p class="margin-reset">
                    The Food Service Specialist ensures outstanding customer service is provided to food customers and that all food offerings meet the required stock levels and presentation standards. Beginning your career as a Food Steward will give you a strong foundation in Speedway’s food segment that can make you a vital member of the front line team!
                </p>

                <br>

                <p>The <strong>Food Service Specialist</strong> will have responsibilities that include:</p>

                <ul class="list-1">
                    <li>Excellent customer service skills, communication skills, and a happy, smiling attitude are essential.</li>
                    <li>Must be available to work required shifts including weekends, evenings and holidays.</li>
                    <li>Must be able to perform repeated bending, standing and reaching.</li>
                    <li>Must be able to occasionally lift up to 50 pounds</li>
                </ul>

            </div>
        </div>

        <!-- Widgets -->
        <div class="eight columns">

            <h3 class="margin-bottom-20"><i class="fa fa-briefcase"style="color: #26ae61;"></i> Work History</h3>

            <!-- Resume Table -->
            <dl class="resume-table">
                @foreach($resumes as $resume)
                    <dt>
                        <small class="date">
                            You Added this {{\Carbon\Carbon::parse($resume->created_at)->diffForHumans()}}
                            on
                            {{ \Carbon\Carbon::parse($resume->month_year)->toDayDateTimeString()}}
                        </small>
                        <strong style="color: #26ae61;">{{$resume->job_title}}
                            <a href="#"><i class="fa fa-expand"></i></a>
                        </strong>
                    </dt>
                    <dd>
                        <p></p>
                        <p>{{$resume->summary}}</p>
                    </dd>
                @endforeach

            </dl>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('vendor/datatables/bergyDTController.min.js')}}"></script>
@endsection
