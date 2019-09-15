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
                @foreach($job_categories as $job_category )
                <!-- Box -->
                <a href="{{route('jobs.by.category',[$job_category->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-{{$job_category->icon}}"></i>
                    <h4>{{$job_category->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_category->id)}}</span>
                </a>
                    @endforeach

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
