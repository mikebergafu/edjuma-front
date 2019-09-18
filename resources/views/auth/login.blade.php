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

            <article class="card">
                <div class=" p-5">

                    <ul class="nav bg radius nav-pills nav-fill mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-card">
                                <i class="ln ln-icon-Male"></i> SignUp</a></li>
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="pill" href="#nav-tab-paypal">
                                <i class="ln ln-icon-Lock-2"></i>  Login</a></li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="nav-tab-card">
                            <p class="alert alert-success">Please fill the form below</p>
                            <form method="POST" action="{{ route('users.register') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <i class="ln ln-icon-Male"></i>
                                        <label for="first_name">First Name:</label>
                                        <input type="text" class="input-text" name="first_name" id="first_name" value="" required/>
                                    </div>
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <i class="ln ln-icon-Male"></i>
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" class="input-text" name="last_name" id="last_name" value=""  required/>
                                    </div>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <i class="ln ln-icon-Mail"></i>
                                        <label for="email2">Email Address:</label>
                                        <input type="text" class="input-text" name="email" id="email" value="" required/>
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <i class="ln ln-icon-Lock-2"></i>
                                        <label for="password1">Password:</label>
                                        <input class="input-text" type="password" name="password" id="password1" required/>
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <i class="ln ln-icon-Lock-2"></i>
                                        <label for="password2">Repeat Password:</label>
                                        <input class="input-text" type="password" id="password-confirm" name="password_confirmation" required/>
                                    </div>

                                </div>

                                <p class="form-row">
                                    <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                                </p>

                            </form>
                        </div> <!-- tab-pane.// -->




                        <div class="tab-pane fade active show" id="nav-tab-paypal">
                            <p class="alert alert-success">Already have an account </p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="form-group">
                                        <i class="ln ln-icon-Male"></i>
                                        <label for="username">Email:</label>
                                        <input type="text" class="input-text" name="email" id="email" value="" required/>
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <i class="ln ln-icon-Lock-2"></i>
                                        <label for="password">Password:</label>
                                        <input class="input-text" type="password" name="password" id="password"/>
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

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
                    {{--<div class="tab-pane fade" id="nav-tab-bank">
                        <p>Bank accaunt details</p>
                        <dl class="param">
                            <dt>BANK: </dt>
                            <dd> THE WORLD BANK</dd>
                        </dl>
                        <dl class="param">
                            <dt>Accaunt number: </dt>
                            <dd> 12345678912345</dd>
                        </dl>
                        <dl class="param">
                            <dt>IBAN: </dt>
                            <dd> 123456789</dd>
                        </dl>
                        <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>--}} <!-- tab-pane.// -->
                    </div> <!-- tab-content .// -->

                </div> <!-- card-body.// -->
            </article> <!-- card.// -->









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
