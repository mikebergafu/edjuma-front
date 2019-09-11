@extends('layouts.header')
@section('title')
    Add Job History - Edjuma.com
@endsection

@section('styles')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="titlebar" class="single submit-page">
        <div class="container">

            <div class="sixteen columns">
                <h2><i class="fa fa-plus-circle"></i> Add a Job Experience</h2>
            </div>

            <div class="six columns">
                <a href="{{route('resumes.index',[Auth::user()->id, \Faker\Provider\Uuid::uuid()])}}" class="button">View My Job Experience <i class="fa fa-file-archive-o"></i></a>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">

        <!-- Submit Page -->
        <div class="sixteen columns">
            <div class="submit-page">
                <form method="POST" action="{{route('resume.store',\Faker\Provider\Uuid::uuid())}}" data-form="submitForm">
                {{ csrf_field() }}
                    <!-- Job Title-->
                    <div class="form">
                        <h5>Job Title</h5>
                        <input type=text class="form-control" id="job_title" name="job_title" value="{{old('job_title')}}" placeholder="Job Title" required>
                        @if ($errors->has('job_title'))
                            <span class="invalid-feedback" style="color: red;">
                                <strong>{{ $errors->first('job_title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Job Title-->
                    <div class="form">
                        <h5>Job Location</h5>
                        <input type=text class="form-control" id="location" name="location" value="{{old('location')}}" placeholder="Previous Job Location" required>
                        @if ($errors->has('location'))
                            <span class="invalid-feedback" style="color: red;">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Date -->
                    <div class="form">
                        <h5>Year</h5>
                        <input type=month class="form-control" id="month_year" name="month_year" value="{{old('month_year')}}" placeholder="Month & Year" required>
                        @if ($errors->has('month_year'))
                            <span class="invalid-feedback" style="color: red;">
                                <strong>{{ $errors->first('month_year') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="form">
                        <h5>Brief Summary</h5>
                        <textarea class="WYSIWYG"  name="summary" cols="40" rows="2" id="summary" value="{{old('summary')}}" maxlength="200" spellcheck="true"></textarea>
                        @if ($errors->has('summary'))
                            <span class="invalid-feedback" style="color: red;">
                                <strong>{{ $errors->first('summary') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="confirm" data-confirm="Click OK to Proceed " id="confirm" ><i class="fa fa-plus-circle"></i>Add</button>
                </form>
            </div>
        </div>

    </div>
    @include('modals/jobs/add-date-modal')

@endsection

@section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('vendor/datatables/bergyDTController.min.js')}}"></script>
    <script>
        $('#start_date').click(function() {
            $('#modelWindow').modal('show');
        });

    </script>

    <script>
        // A $( document ).ready() block.
        $( document ).ready(function() {
            var url = "https://webhook.site/51a071d4-09fa-4d06-923a-e1563c0deecd";
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Typical action to be performed when the document is ready:
                    alert(xhttp.responseText);
                }
            };
            xhttp.open("POST", url, true);
            xhttp.send();
        });
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
