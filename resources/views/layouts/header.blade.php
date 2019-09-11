<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from www.vasterad.com/themes/workscout/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 May 2018 07:11:39 GMT -->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('edjuma/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('edjuma/css/colors/green.css')}}" id="colors">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @yield('styles')
</head>

<body>
<div id="wrapper">


    <!-- Header
    ================================================== -->
    <header class="sticky-header">
        <div class="container">
            <div class="sixteen columns">

                <!-- Logo -->
                <div id="logo">
                    <h1><a href="/"><img src="{{asset('edjuma/images/logo1.png')}}" alt="Edjuma.com" /></a></h1>
                </div>

                <!-- Menu -->
                <nav id="navigation" class="menu">
                    <ul id="responsive">

                        <li><a href="{{route('home')}}" id="current">Home</a></li>

                        <li><a href="#">Job Seekers</a>
                            <ul>
                                <li><a href="{{route('home')}}">Browse Jobs</a></li>
                                <li><a href="{{route('jobs.category.list')}}">Browse Categories</a></li>
                                <li><a href="{{route('resume.form',\Faker\Provider\Uuid::uuid())}}">Add Job Experience</a></li>
                                <li><a href="{{route('resumes.index',[\Faker\Provider\Uuid::uuid(), \Faker\Provider\Uuid::uuid()])}}">View Job Experience</a></li>
                                <li><a href="{{route('my.jobs.applied',[\Faker\Provider\Uuid::uuid(),\Faker\Provider\Uuid::uuid()])}}">Applied Jobs</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Job Posters</a>
                            <ul>
                                <li><a href="{{route('jobs.add.form')}}">Add Job</a></li>
                                <li><a href="{{route('my.job.postings',\Faker\Provider\Uuid::uuid())}}">Manage Jobs</a></li>
                                <li><a href="{{route('my.jobs.applicants', \Faker\Provider\Uuid::uuid())}}">Manage Applications</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('pro.docs.upload',\Faker\Provider\Uuid::uuid())}}">Edjuma Pro</a></li>
                        <li><a href="{{route('contacts.add.form',[\Faker\Provider\Uuid::uuid(),\Faker\Provider\Uuid::uuid()])}}">Contact</a></li>
                        <li><a href="blog.html">FAQs</a></li>
                    </ul>


                    @if(Auth::check())
                        <ul class="float-right">
                            <li ><a style="background-color: #26AE61; color: white;" title="{{Auth::user()->email}}" href="{{route('register')}}">{{strtoupper(substr(Auth::user()->first_name,0,1).substr(Auth::user()->last_name,0,1))}}</a></li>
                            <li><a href="{{route('elogout')}}"><i class="fa fa-lock"></i> Log Out</a></li>
                        </ul>

                    @else
                        <ul class="float-right">
                            <li><a href="{{route('register')}}"><i class="fa fa-user"></i> Sign Up</a></li>
                            <li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Log In</a></li>
                        </ul>

                    @endif

                </nav>

                <!-- Navigation -->
                <div id="mobile-navigation">
                    <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
                </div>

            </div>
        </div>
    </header>
    <div class="clearfix"></div>

    {{--Place Banner Here--}}
    @yield('content')

    <!-- Content
    ================================================== -->


    {{--Place Content Here--}}



    <!-- Footer
    ================================================== -->
    <div class="margin-top-30"></div>

    {{--Place footer Here--}}
   @include('layouts.footer')

    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="{{asset('edjuma/scripts/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/custom.js')}}"></script>
<script src="{{asset('edjuma/scripts/jquery.superfish.js')}}"></script>
<script src="{{asset('edjuma/scripts/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/jquery.themepunch.showbizpro.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('edjuma/scripts/chosen.jquery.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/waypoints.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/jquery.counterup.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/jquery.jpanelmenu.js')}}"></script>
<script src="{{asset('edjuma/scripts/stacktable.js')}}"></script>
<script src="{{asset('edjuma/scripts/slick.min.js')}}"></script>
<script src="{{asset('edjuma/scripts/headroom.min.js')}}"></script>



<!-- Style Switcher
================================================== -->
<script src="{{asset('edjuma/scripts/switcher.js')}}"></script>

<div id="style-switcher">
    <h2>Style Switcher <a href="#"></a></h2>

    <div>
        <h3>Predefined Colors</h3>
        <ul class="colors" id="color1">
            <li><a href="#" class="green" title="Green"></a></li>
            <li><a href="#" class="blue" title="Blue"></a></li>
            <li><a href="#" class="orange" title="Orange"></a></li>
            <li><a href="#" class="navy" title="Navy"></a></li>
            <li><a href="#" class="yellow" title="Yellow"></a></li>
            <li><a href="#" class="peach" title="Peach"></a></li>
            <li><a href="#" class="beige" title="Beige"></a></li>
            <li><a href="#" class="purple" title="Purple"></a></li>
            <li><a href="#" class="celadon" title="Celadon"></a></li>
            <li><a href="#" class="pink" title="Pink"></a></li>
            <li><a href="#" class="red" title="Red"></a></li>
            <li><a href="#" class="brown" title="Brown"></a></li>
            <li><a href="#" class="cherry" title="Cherry"></a></li>
            <li><a href="#" class="cyan" title="Cyan"></a></li>
            <li><a href="#" class="gray" title="Gray"></a></li>
            <li><a href="#" class="olive" title="Olive"></a></li>
        </ul>

        <h3>Layout Style</h3>
        <div class="layout-style">
            <select id="layout-style">
                <option value="2">Wide</option>
                <option value="1">Boxed</option>
            </select>
        </div>

        <h3>Header Style</h3>
        <div class="layout-style">
            <select id="header-style">
                <option value="1">Style 1</option>
                <option value="2">Style 2</option>
                <option value="3">Style 3</option>
            </select>
        </div>

        <h3>Background Image</h3>
        <ul class="colors bg" id="bg">
            <li><a href="#" class="bg1"></a></li>
            <li><a href="#" class="bg2"></a></li>
            <li><a href="#" class="bg3"></a></li>
            <li><a href="#" class="bg4"></a></li>
            <li><a href="#" class="bg5"></a></li>
            <li><a href="#" class="bg6"></a></li>
            <li><a href="#" class="bg7"></a></li>
            <li><a href="#" class="bg8"></a></li>
            <li><a href="#" class="bg9"></a></li>
            <li><a href="#" class="bg10"></a></li>
            <li><a href="#" class="bg11"></a></li>
            <li><a href="#" class="bg12"></a></li>
            <li><a href="#" class="bg13"></a></li>
            <li><a href="#" class="bg14"></a></li>
            <li><a href="#" class="bg15"></a></li>
            <li><a href="#" class="bg16"></a></li>
        </ul>

        <h3>Background Color</h3>
        <ul class="colors bgsolid" id="bgsolid">
            <li><a href="#" class="green-bg" title="Green"></a></li>
            <li><a href="#" class="blue-bg" title="Blue"></a></li>
            <li><a href="#" class="orange-bg" title="Orange"></a></li>
            <li><a href="#" class="navy-bg" title="Navy"></a></li>
            <li><a href="#" class="yellow-bg" title="Yellow"></a></li>
            <li><a href="#" class="peach-bg" title="Peach"></a></li>
            <li><a href="#" class="beige-bg" title="Beige"></a></li>
            <li><a href="#" class="purple-bg" title="Purple"></a></li>
            <li><a href="#" class="red-bg" title="Red"></a></li>
            <li><a href="#" class="pink-bg" title="Pink"></a></li>
            <li><a href="#" class="celadon-bg" title="Celadon"></a></li>
            <li><a href="#" class="brown-bg" title="Brown"></a></li>
            <li><a href="#" class="cherry-bg" title="Cherry"></a></li>
            <li><a href="#" class="cyan-bg" title="Cyan"></a></li>
            <li><a href="#" class="gray-bg" title="Gray"></a></li>
            <li><a href="#" class="olive-bg" title="Olive"></a></li>
        </ul>
    </div>

    <div id="reset"><a href="#" class="button color">Reset</a></div>
    @include('sweetalert::alert')

</div>

@yield('scripts')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5b9c48d6c9abba5796778eb4/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>

</html>