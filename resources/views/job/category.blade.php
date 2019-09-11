@extends('layouts.header')
@section('title')
    Job Categories - Edjuma.com
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
                <span>Available Job Categories</span>
                <h2>Job Categories</h2>
            </div>

            <div class="six columns">
                <a href="{{route('jobs.add.form')}}" class="button">Post a Job, It’s Free!</a>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <!-- Categories -->
    <div class="container">
        <div class="sixteen columns">
            <h3 class="margin-bottom-20 margin-top-10">Popular Categories</h3>

            <!-- Popular Categories -->
            <div class="categories-boxes-container">

                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_categories[0]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Laptop-Phone"></i>
                    <h4>{{$job_categories[0]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[0]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_categories[1]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Cash-register2"></i>
                    <h4>{{$job_categories[1]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[1]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_categories[2]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Forest"></i>
                    <h4>{{$job_categories[2]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[2]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_categories[3]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Worker-Clothes"></i>
                    <h4>{{$job_categories[3]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[3]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_categories[4]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Medical-Sign"></i>
                    <h4>{{$job_categories[4]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[4]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_categories[5]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Plates"></i>
                    <h4>{{$job_categories[5]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[5]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_categories[6]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Car"></i>
                    <h4>{{$job_categories[6]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[6]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_categories[7]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Arrow-Next"></i>
                    <h4>{{$job_categories[7]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[7]->id)}}</span>
                </a>

            </div>

            <div class="clearfix"></div>
            <div class="margin-top-30"></div>

            <a href="browse-categories.html" class="button centered">Browse All Categories</a>
            <div class="margin-bottom-55"></div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('vendor/datatables/bergyDTController.min.js')}}"></script>
@endsection
