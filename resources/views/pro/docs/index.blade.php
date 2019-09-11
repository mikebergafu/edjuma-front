@extends('layouts.header')

@section('title')
    Doc Upload - Edjuma.com
@endsection
@section('styles')

@endsection

@section('content')
    <!-- Titlebar
    ================================================== -->
    <div id="titlebar" class="single">
        <div class="container">

            <div class="sixteen columns">
                <h2>Edjuma for Professionals</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li>You are here:</li>
                        <li><a href="#">Home</a></li>
                        <li>Verification Documents Upload</li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>

    <!-- Container -->
    <div class="container">
        <div class="my-account">
            <ul class="tabs-nav">
                <li class=""><a href="#tab1">Upload Docs</a></li>
                <li><a href="#tab2">Register</a></li>
            </ul>

            <div class="tabs-container">
                <!-- Login -->
                <div class="tab-content" id="tab1" style="display: none;">
                    <form method="POST" action="{{ route('pro.docs.store',\Faker\Provider\Uuid::uuid()) }}" enctype="multipart/form-data">
                        @csrf
                        <p>
                            <span style="color: #ee3c31;">NOTE:</span>
                            <span style="color: #0f0f0f; font-weight: bolder;">Organise all Professional Documents as a Single PDF file and Upload for Verification & Approval. </span>
                        </p>
                        <p class="form-row form-row-wide">
                            <label for="first_name">Upload Professional Documents here:
                                <input type="file" name="photos[]" class="form-control" accept="application/pdf" style="color: #0b7bb5;" />
                            </label>
                            @if ($errors->has('photos'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('photos') }}</strong>
                                    </span>
                            @endif
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="first_name">Profession:
                                <input type="text" name="pro_field" id="pro_field" class="form-control" />
                            </label>
                            @if ($errors->has('pro_field'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('pro_field') }}</strong>
                                    </span>
                            @endif
                        </p>

                        <p class="form-row">
                            <button type="submit" class="button border fw margin-top-10" >Submit Documents</button>
                        </p>
                        <a href="{{route('image.test')}}">Show</a>

                    </form>
                </div>

                <!-- Register -->
                <div class="tab-content padding-right" id="tab2" style="display: none;">
                    <form method="POST" action="{{ route('users.register') }}">
                        @csrf
                        <p class="form-row form-row-wide">
                            <label for="first_name">First Name:
                                <i class="ln ln-icon-Male"></i>
                                <input type="text" class="input-text" name="first_name" id="first_name" value="" />
                            </label>

                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </p>
                        <p class="form-row form-row-wide">
                            <label for="last_name">Last Name/Surname:
                                <i class="ln ln-icon-Male"></i>
                                <input type="text" class="input-text" name="last_name" id="last_name" value="" />
                            </label>

                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="email2">Email Address:
                                <i class="ln ln-icon-Mail"></i>
                                <input type="text" class="input-text" name="email" id="email2" value="" />
                            </label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password1">Password:
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password1" id="password1"/>
                            </label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password2">Repeat Password:
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" id="password-confirm" name="password_confirmation"/>
                            </label>

                        </p>

                        <p class="form-row">
                            <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                        </p>

                    </form>
                </div>

            </div>

        </div>

    </div>
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
        function showHide() {
            var x = document.getElementById("myInput");
            if (x. === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
