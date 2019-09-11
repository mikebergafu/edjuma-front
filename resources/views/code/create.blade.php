@extends('layouts.header')

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="ten columns">
                <span>Corporate Verification:</span>
                <h2>Get an Institution or Organisation Code Now!</h2>
            </div>

            <div class="six columns">
                <a href="add-job.html" class="button">Post a Job, It’s Free!</a>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <!-- Container -->
    <div class="container">

        <div class="my-account">

            <ul class="tabs-nav">
                <li><a href="#tab1">Corporate Code Request</a></li>
                <li><a href="#tab2">Login</a></li>

            </ul>

            <div class="tabs-container">
                <!--Code Request -->
                <div class="tab-content" id="tab1" style="display: none;">

                    <form method="POST" action="{{ route('corporate.code.get') }}">
                        @csrf
                        <p class="form-row form-row-wide">
                            <label for="name">Name of Organisation:
                                <i class="ln ln-icon-Office"></i>
                                <input type="text" class="input-text" name="name" id="name" value="" />
                            </label>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </p>
                        <p class="form-row form-row-wide">
                            <label for="email2">Mobile Phone No.:
                                <i class="ln ln-icon-Phone-4G"></i>
                                <input type="text" class="input-text" name="phone" id="phone" value="" />
                            </label>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </p>
                        <p class="form-row form-row-wide">
                            <label for="email2">Email Address:
                                <i class="ln ln-icon-Mail"></i>
                                <input type="text" class="input-text" name="email" id="email" value="" />
                            </label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </p>

                        <p class="form-row">
                            <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                        </p>

                    </form>
                </div>
                <!-- Login -->
                <div class="tab-content" id="tab2" style="display: none;">
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

            </div>
        </div>
    </div>

@endsection
