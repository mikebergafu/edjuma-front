@extends('layouts.header')
@section('title')
    Contact - Edjuma.com
@endsection

@section('styles')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
@endsection

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="single">
        <div class="container">

            <div class="sixteen columns">
                <h2>Contact</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li>You are here:</li>
                        <li><a href="#">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>




    <!-- Content
    ================================================== -->
    <!-- Container -->
    <div class="container">
        <div class="sixteen columns">

            <h3 class="margin-bottom-20">Our Office</h3>

            <!-- Google Maps -->
            <section class="google-map-container">
                <div id="map" class="google-map google-map-full"></div>
            </section>
            <!-- Google Maps / End -->

        </div>
    </div>
    <!-- Container / End -->


    <!-- Container -->
    <div class="container">

        <div class="eleven columns">

            <h3 class="margin-bottom-15">Contact Form</h3>

            <!-- Contact Form -->
            <section id="contact" class="padding-right">

                <!-- Success Message -->
                <mark id="message"></mark>

                <!-- Form -->
                <form method="POST" action="{{route('contacts.add.add',[\Faker\Provider\Uuid::uuid(),\Faker\Provider\Uuid::uuid()])}}">
                    {{ csrf_field() }}
                    <fieldset>

                        <div>
                            <label>Name:</label>
                            <input name="fullname" type="text" id="name" />
                        </div>

                        <div>
                            <label >Email: <span>*</span></label>
                            <input name="email" type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
                        </div>

                        <div>
                            <label>Subject:</label>
                            <input name="subject" type="text" id="subject" />
                        </div>

                        <div>
                            <label>Message: <span>*</span></label>
                            <textarea name="message" cols="40" rows="3" id="message" spellcheck="true"></textarea>
                        </div>

                    </fieldset>
                    <div id="result"></div>
                    <input type="submit" class="submit" value="Send Message" />
                    <div class="clearfix"></div>
                    <div class="margin-bottom-40"></div>
                </form>

            </section>
            <!-- Contact Form / End -->

        </div>
        <!-- Container / End -->


        <!-- Sidebar
        ================================================== -->
        <div class="five columns">

            <!-- Information -->
            <h3 class="margin-bottom-10">Information</h3>
            <div class="widget-box">
                <p>Morbi eros bibendum lorem ipsum dolor pellentesque pellentesque bibendum. </p>

                <ul class="contact-informations">
                    <li>45 Park Avenue, Apt. 303</li>
                    <li>New York, NY 10016 </li>
                </ul>

                <ul class="contact-informations second">
                    <li><i class="fa fa-phone"></i> <p>+48 880 440 110</p></li>
                    <li><i class="fa fa-envelope"></i> <p><a href="http://www.vasterad.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="deb3bfb7b29ebba6bfb3aeb2bbf0bdb1b3">[email&#160;protected]</a></p></li>
                    <li><i class="fa fa-globe"></i> <p>www.example.com</p></li>
                </ul>

            </div>

            <!-- Social -->
            <div class="widget margin-top-30">
                <h3 class="margin-bottom-5">Social Media</h3>
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                <div class="margin-bottom-50"></div>
            </div>

        </div>
    </div>
    <!-- Container / End -->
@endsection

@section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('vendor/datatables/bergyDTController.min.js')}}"></script>
    <!-- Google Maps -->
    <script src="{{asset('edjuma/scripts/jquery.gmaps.min.js')}}"></script>

    <script type="text/javascript">
        (function($){
            $(document).ready(function(){

                $('#googlemaps').gMap({
                    maptype: 'ROADMAP',
                    scrollwheel: false,
                    zoom: 13,
                    markers: [
                        {
                            address: 'Accra, Spintex DTD', // Your Adress Here
                            html: '<strong>Our Office</strong><br>45 Park Avenue, Apt. 303 </br>New York, NY 10016 ',
                            popup: true,
                        }
                    ],
                });

            });

        })(this.jQuery);
    </script>
    <script>
        function myMap() {
            var mapOptions = {
                center: new google.maps.LatLng(51.5, -0.12),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.HYBRID
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        }
    </script>
@endsection
