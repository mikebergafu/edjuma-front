@extends('layouts.header')
@section('title')
    Manage Jobs - Edjuma.com
@endsection

@section('styles')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="single submit-page">
        <div class="container">

            <div class="sixteen columns">
                <h2><i class="fa fa-plus-circle"></i> Add Job</h2>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">

        <!-- Submit Page -->
        <div class="sixteen columns">
            <div class="submit-page">
               <div class="row">
                   <div class="col-sm-8 col-sm-offset-2">
                       <form method="POST" action="{{route('jobs.store')}}">
                           {{ csrf_field() }}
                           <div class="form-group">
                               <label for="job_title">Job Title</label>
                               <input type="text" class="form-control" id="job_title" name="job_title" aria-describedby="jobTitleHelp" placeholder="Enter the Job Title/Name" required>
                               <small id="emailTitleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                               @if ($errors->has('job_title'))
                                   <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('job_title') }}</strong>
                                   </span>
                               @endif
                           </div>

                           <div class="form-group">
                               <label for="category">Job Category</label>
                               <select data-placeholder="Choose Categories" id="category" name="category" class="chosen-select form-control"  required>
                                   <option value="" selected disabled="disabled">Please Select Jobs Category</option>
                                   @foreach($job_categories as $category)
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                               </select>
                               @if ($errors->has('category'))
                                   <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('category') }}</strong>
                                   </span>
                               @endif
                           </div>

                           <div class="form-group">
                               <label for="job_description">Description</label>
                               <textarea class="form-control" id="job_description" name="job_description" required></textarea>
                               @if ($errors->has('job_description'))
                                   <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('job_description') }}</strong>
                                   </span>
                               @endif
                           </div>

                           <div class="form-group">
                               <div class="row">
                                   <div class="col-sm-6">
                                       <label for="job_starts">This Job Starts on</label>
                                       <input type="date" class="form-control" id="job_starts" name="job_starts" placeholder="Start Date" required>
                                       @if ($errors->has('job_starts'))
                                           <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('job_starts') }}</strong>
                                   </span>
                                       @endif
                                   </div>

                                   <div class="col-sm-6">
                                       <label for="job_starts">This Job Ends on</label>
                                       <input type="date" class="form-control" id="job_ends" name="job_ends" placeholder="End Date" required>
                                       @if ($errors->has('job_ends'))
                                           <span class="invalid-feedback" style="color: red;">
                                               <strong>{{ $errors->first('job_ends') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="row">
                                   <div class="col-sm-6">
                                       <label for="number_of_staff">No. of Staff Required</label>
                                       <input type="number" min="1" class="form-control" id="number_of_staff" name="number_of_staff" placeholder="No. of Staff" required>
                                       @if ($errors->has('number_of_staff'))
                                           <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('number_of_staff') }}</strong>
                                   </span>
                                       @endif
                                   </div>


                                   <div class="col-sm-6">
                                       <label for="job_starts">Job Location</label>
                                       <input type="text" class="form-control" id="job_location" name="job_location" placeholder="Where is this Job?" required>
                                       @if ($errors->has('job_location'))
                                           <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('job_location') }}</strong>
                                   </span>
                                       @endif
                                   </div>
                               </div>

                           </div>
                           <div class="divider">
                               Remuneration
                           </div>

                           <div class="form-group">
                               <div class="row">
                                   <div class="col-sm-6">
                                       <label for="job_starts">Salary</label>
                                       <input type="number" class="form-control" id="salary" name="salary" placeholder="Salary/Wage" required>
                                       @if ($errors->has('salary'))
                                           <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('salary') }}</strong>
                                   </span>
                                       @endif
                                   </div>

                                   <div class="col-sm-6">
                                       <label for="job_starts">Salary Frequency</label>
                                       <input type="text" class="form-control" id="salary_frequency" aria-describedby="salary_frequencyHelp" name="salary_frequency" placeholder="Frequency of Payment eg. daily, weekly, monthly, etc" required>
                                       <small id="salary_frequencyHelp" class="form-text text-muted">Frequency of Payment eg. daily, weekly, monthly, etc.</small>
                                       @if ($errors->has('salary_frequency'))
                                           <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('salary_frequency') }}</strong>
                                   </span>
                                       @endif
                                   </div>

                               </div>
                           </div>

                           <div class="divider">
                               Payment
                           </div>
                           <div class="form-group">
                               <div class="row">
                                   <div class="col-sm-6">
                                       <label for="job_starts">Mobile Money Number</label>
                                       <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile Phone No. for Payment" required>
                                       @if ($errors->has('mobile_no'))
                                           <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('mobile_no') }}</strong>
                                   </span>
                                       @endif
                                   </div>

                                   <div class="col-sm-6">
                                       <label for="category">Mobile Money Network</label>
                                       <select data-placeholder="Choose Mobile Network" id="channel" name="channel" class="chosen-select form-control"  required>
                                           <option value="" selected disabled="disabled">Please Select Mobile Money Network</option>
                                           @foreach($networks as $network)
                                               <option value="{{$network->channel}}">{{$network->name}}</option>
                                           @endforeach
                                       </select>
                                       @if ($errors->has('channel'))
                                           <span class="invalid-feedback" style="color: red;">
                                       <strong>{{ $errors->first('channel') }}</strong>
                                   </span>
                                       @endif
                                   </div>

                               </div>
                           </div>

                           <button type="submit" ><i class="fa fa-plus-circle"></i>Add</button>
                       </form>

                   </div>

               </div>
                <a href="{{route('pay.test')}}"><button class="btn btn-primary pull-right" id="btn">Read More</button></a>
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
@endsection
