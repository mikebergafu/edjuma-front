@extends('layouts.header')

@section('title')
    Sign In - Edjuma.com
@endsection
@section('styles')

@endsection

@section('content')
    <!-- Titlebar
    ================================================== -->
    <div id="titlebar" class="single">
        <div class="container">

            <div class="sixteen columns">
                <h2>My Account</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li>You are here:</li>
                        <li><a href="#">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>

    <!-- Container -->
    <div class="container">
        <div class="my-account">
        <ul class="tabs-nav">
            <li class=""><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
        </ul>

        <div class="tabs-container">
            <!-- Login -->
            <div class="tab-content" id="tab1" style="display: none;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <p class="form-row form-row-wide">
                        <label for="username">Email:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="email" id="email" value="" />
                        </label>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" id="password"/>
                        </label>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </p>

                    <p class="form-row">
                        <input type="submit" class="button border fw margin-top-10" name="login" value="Login" />

                        <label for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
                    </p>

                    <p class="lost_password">
                        <a href="#" >Lost Your Password?</a>
                    </p>

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
        // A $( document ).ready() block.
        $( document ).ready(function() {


        });
    </script>
@endsection
