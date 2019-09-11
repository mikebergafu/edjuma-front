@extends('layouts.header')
@section('title')
    Update Resume - Edjuma.com
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
                <h2><i class="fa fa-plus-circle"></i> Add Resume</h2>
            </div>

            <div class="six columns">
                <a href="{{route('resumes.index',[Auth::user()->id, \Faker\Provider\Uuid::uuid()])}}" class="button">View My Resume <i class="fa fa-file-archive-o"></i></a>
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
