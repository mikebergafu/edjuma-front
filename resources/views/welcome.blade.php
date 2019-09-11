<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from www.vasterad.com/themes/workscout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 May 2018 07:09:21 GMT -->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Welcome - Edjuma</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('edjuma/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('edjuma/css/colors/green.css')}}" id="colors">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper">


    <!-- Header
    ================================================== -->
    <header class="transparent sticky-header">
        <div class="container">
            <div class="sixteen columns">

                <!-- Logo -->
                <div id="logo">
                    <h1><a href="{{url('/')}}"><img src="{{asset('edjuma/images/logo.png')}}" alt="Edjuma.com" /></a></h1>
                </div>

                <!-- Menu -->
                <nav id="navigation" class="menu">
                    <ul id="responsive">

                        <li><a href="{{route('home')}}" id="current">Home</a></li>

                        <li><a href="#">Job Seekers</a>
                            <ul>
                                <li><a href="{{route('home.jobs', \Faker\Provider\Uuid::uuid())}}">Browse Jobs</a></li>
                                <li><a href="{{route('jobs.category.list')}}">Browse Categories</a></li>
                                <li><a href="{{route('resume.form',\Faker\Provider\Uuid::uuid())}}">Add Job Experience</a></li>
                                <li><a href="manage-resumes.html">View Job Experience</a></li>
                                <li><a href="job-alerts.html">Job Alerts</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Job Posters</a>
                            <ul>
                                <li><a href="{{route('jobs.add.form')}}">Add Job</a></li>
                                <li><a href="{{route('jobs.list')}}">Manage Jobs</a></li>
                                <li><a href="manage-applications.html">Manage Applications</a></li>
                                <li><a href="browse-resumes.html">Browse Resumes</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('pro.docs.upload',\Faker\Provider\Uuid::uuid())}}">Edjuma Pro</a></li>
                        <li><a href="{{route('contacts.add.form',[\Faker\Provider\Uuid::uuid(),\Faker\Provider\Uuid::uuid()])}}">Contact</a></li>
                        <li><a href="blog.html">FAQs</a></li>
                    </ul>


                    <ul class="float-right">
                        <li><a  href="{{ route('register') }}"><i class="fa fa-user"></i> Sign Up</a></li>
                        <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Log In</a></li>
                    </ul>

                </nav>

                <!-- Navigation -->
                <div id="mobile-navigation">
                    <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
                </div>

            </div>
        </div>
    </header>
    <div class="clearfix"></div>


    <!-- Banner
    ================================================== -->
    <div id="banner" class="with-transparent-header parallax background" style="background-image: url(./edjuma/images/banner-home.jpg)" data-img-width="2000" data-img-height="1330" data-diff="300">
        <div class="container">
            <div class="sixteen columns">

                <div class="search-container">

                    <!-- Form -->
                    <h2>Find Job</h2>
                    <input type="text" class="ico-01" placeholder="job title, keywords or company name" value=""/>
                    <input type="text" class="ico-02" placeholder="city, province or region" value=""/>
                    <button><i class="fa fa-search"></i></button>

                    <!-- Browse Jobs -->
                    <div class="browse-jobs">
                        Browse job offers by <a href="browse-categories.html"> category</a> or <a href="#">location</a>
                    </div>

                    <!-- Announce -->
                    <!-- 				<div class="announce">
                                        We’ve over <strong>15 000</strong> job offers for you!
                                    </div> -->

                </div>

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
            @if($jobs->count() > 0)
            <div class="categories-boxes-container">

                <!-- Box -->
                <a href="{{route('free.jobs.by.category',[$job_categories[0]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Laptop-Phone"></i>
                    <h4>{{$job_categories[0]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[0]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('free.jobs.by.category',[$job_categories[1]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Cash-register2"></i>
                    <h4>{{$job_categories[1]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[1]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('free.jobs.by.category',[$job_categories[2]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Forest"></i>
                    <h4>{{$job_categories[2]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[2]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('free.jobs.by.category',[$job_categories[3]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Worker-Clothes"></i>
                    <h4>{{$job_categories[3]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[3]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('free.jobs.by.category',[$job_categories[4]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Medical-Sign"></i>
                    <h4>{{$job_categories[4]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[4]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('free.jobs.by.category',[$job_categories[5]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Plates"></i>
                    <h4>{{$job_categories[5]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[5]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('free.jobs.by.category',[$job_categories[6]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Car"></i>
                    <h4>{{$job_categories[6]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[6]->id)}}</span>
                </a>

                <!-- Box -->
                <a href="{{route('free.jobs.by.category',[$job_categories[7]->id,\Faker\Provider\Uuid::uuid()])}}" class="category-small-box">
                    <i class="ln ln-icon-Arrow-Next"></i>
                    <h4>{{$job_categories[7]->name}}</h4>
                    <span>{{\App\Helpers\Sitso::getCategoryJobCount($job_categories[7]->id)}}</span>
                </a>

            </div>
            @endif
            <div class="clearfix"></div>
            <div class="margin-top-30"></div>

            <a href="browse-categories.html" class="button centered">Browse All Categories</a>
            <div class="margin-bottom-55"></div>
        </div>
    </div>


    <div class="container">

        <!-- Recent Jobs -->
        <div class="eleven columns">
            <div class="padding-right">
                <h3 class="margin-bottom-25">Recent Jobs</h3>
                <div class="listings-container">
                    @if($jobs->count() > 0)
                    @foreach($jobs as $job)
                        <!-- Listing -->
                            @if($job->name=="Ground & Landscaping")
                                <a href="{{route('jobs.apply.form',$job->id)}}" class="listing internship">
                                    @elseif($job->name=="Vehicle Maintenance")
                                        <a href="{{route('jobs.apply.form',$job->id)}}" class="listing full-time">
                                            @elseif($job->name=="Web, Software & IT")
                                                <a href="{{route('jobs.apply.form',$job->id)}}" class="listing freelance">
                                                    @else
                                                        <a href="{{route('jobs.apply.form',$job->id)}}" class="listing part-time">
                                                            @endif

                                <div class="listing-logo">
                                    <img src="{{asset('edjuma/images/job-list-logo-04.png')}}" alt="">
                                </div>
                                <div class="listing-title">
                                    <h4>{{$job->job_title}}
                                        <small>Category: </small><small style="color: #26ae61">{{$job->name}} </small>
                                    </h4>
                                    <h6>{{$job->job_description}}</h6>
                                    <ul class="listing-icons">
                                        <li><i class="ln ln-icon-Map2"></i>{{$job->job_location}}</li>
                                        <li><i class="ln ln-icon-Money-2"></i> {{$job->salary."/".$job->salary_frequency}}</li>
                                        <li><div class="listing-date">{{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</div></li>
                                        <li><div class="listing-date new">Apply Now</div></li>
                                    </ul>
                                </div>
                            </a>
                    @endforeach
                            @endif
                </div>

                <a href="browse-jobs.html" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
                <div class="margin-bottom-55"></div>
            </div>
        </div>

        <!-- Job Spotlight -->
        <div class="five columns">
            <h3 class="margin-bottom-5">Job Spotlight</h3>

            <!-- Navigation -->
            <div class="showbiz-navigation">
                <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
                <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
            </div>
            <div class="clearfix"></div>

            <!-- Showbiz Container -->
            <div id="job-spotlight" class="showbiz-container">
                <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
                    <div class="overflowholder">

                        <ul>

                            <li>
                                <div class="job-spotlight">
                                    <a href="#"><h4>Social Media: Advertising Coordinator <span class="part-time">Part-Time</span></h4></a>
                                    <span><i class="fa fa-briefcase"></i> Mates</span>
                                    <span><i class="fa fa-map-marker"></i> New York</span>
                                    <span><i class="fa fa-money"></i> $20 / hour</span>
                                    <p>As advertising & content coordinator, you will support our social media team in producing high quality social content for a range of media channels.</p>
                                    <a href="job-page.html" class="button">Apply For This Job</a>
                                </div>
                            </li>

                            <li>
                                <div class="job-spotlight">
                                    <a href="#"><h4>Prestashop / WooCommerce Product Listing <span class="freelance">Freelance</span></h4></a>
                                    <span><i class="fa fa-briefcase"></i> King</span>
                                    <span><i class="fa fa-map-marker"></i> London</span>
                                    <span><i class="fa fa-money"></i> $25 / hour</span>
                                    <p>Etiam suscipit tellus ante, sit amet hendrerit magna varius in. Pellentesque lorem quis enim venenatis pellentesque.</p>
                                    <a href="job-page.html" class="button">Apply For This Job</a>
                                </div>
                            </li>

                            <li>
                                <div class="job-spotlight">
                                    <a href="#"><h4>Logo Design <span class="freelance">Freelance</span></h4></a>
                                    <span><i class="fa fa-briefcase"></i> Hexagon</span>
                                    <span><i class="fa fa-map-marker"></i> Sydney</span>
                                    <span><i class="fa fa-money"></i> $10 / hour</span>
                                    <p>Proin ligula neque, pretium et ipsum eget, mattis commodo dolor. Etiam tincidunt libero quis commodo.</p>
                                    <a href="job-page.html" class="button">Apply For This Job</a>
                                </div>
                            </li>


                        </ul>
                        <div class="clearfix"></div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>


    <section class="fullwidth-testimonial margin-top-15">

        <!-- Info Section -->
        <div class="container">
            <div class="sixteen columns">
                <h3 class="headline centered">
                    What Our Users Say 😍
                    <span class="margin-top-25">We collect reviews from our users so you can get an honest opinion of what an experience with our website are really like!</span>
                </h3>
            </div>
        </div>
        <!-- Info Section / End -->

        <!-- Testimonials Carousel -->
        <div class="fullwidth-carousel-container margin-top-20">
            <div class="testimonial-carousel testimonials">

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close.</div>
                    </div>
                    <div class="testimonial-author">
                        <img src="{{asset('edjuma/images/resumes-list-avatar-03.png')}}" alt="">
                        <h4>Tom Baker <span>HR Specialist</span></h4>
                    </div>
                </div>

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial">Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud content.</div>
                    </div>
                    <div class="testimonial-author">
                        <img src="{{asset('edjuma/images/resumes-list-avatar-02.png')}}" alt="">
                        <h4>Jennie Smith <span>Jobseeker</span></h4>
                    </div>
                </div>

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view.</div>
                    </div>
                    <div class="testimonial-author">
                        <img src="{{asset('edjuma/images/resumes-list-avatar-01.png')}}" alt="">
                        <h4>Jack Paden <span>Jobseeker</span></h4>
                    </div>
                </div>

            </div>
        </div>
        <!-- Testimonials Carousel / End -->

    </section>


    <!-- Flip banner -->
    <a href="browse-jobs.html" class="flip-banner margin-bottom-55" data-background="edjuma/images/all-categories-photo.jpg" data-color="#26ae61" data-color-opacity="0.93">
        <div class="flip-banner-content">
            <h2 class="flip-visible">Step inside and see for yourself!</h2>
            <h2 class="flip-hidden">Get Started <i class="fa fa-angle-right"></i></h2>
        </div>
    </a>
    <!-- Flip banner / End -->


    <!-- Recent Posts -->
    <div class="container">
        <div class="sixteen columns">
            <h3 class="margin-bottom-25">Recent Posts</h3>
        </div>

        <div class="one-third column">

            <!-- Post #1 -->
            <div class="recent-post">
                <div class="recent-post-img"><a href="blog-single-post.html"><img src="{{asset('edjuma/images/recent-post-01.jpg')}}" alt=""></a><div class="hover-icon"></div></div>
                <a href="blog-single-post.html"><h4>Hey Job Seeker, It’s Time To Get Up And Get Hired</h4></a>
                <div class="meta-tags">
                    <span>October 10, 2015</span>
                    <span><a href="#">0 Comments</a></span>
                </div>
                <p>The world of job seeking can be all consuming. From secretly stalking the open reqs page of your dream company to sending endless applications.</p>
                <a href="blog-single-post.html" class="button">Read More</a>
            </div>

        </div>


        <div class="one-third column">

            <!-- Post #2 -->
            <div class="recent-post">
                <div class="recent-post-img"><a href="blog-single-post.html"><img src="{{asset('edjuma/images/recent-post-02.jpg')}}" alt=""></a><div class="hover-icon"></div></div>
                <a href="blog-single-post.html"><h4>How to "Woo" a Recruiter and Land Your Dream Job</h4></a>
                <div class="meta-tags">
                    <span>September 12, 2015</span>
                    <span><a href="#">0 Comments</a></span>
                </div>
                <p>Struggling to find your significant other the perfect Valentine’s Day gift? If I may make a suggestion: woo a recruiter. </p>
                <a href="blog-single-post.html" class="button">Read More</a>
            </div>

        </div>

        <div class="one-third column">

            <!-- Post #3 -->
            <div class="recent-post">
                <div class="recent-post-img"><a href="blog-single-post.html"><img src="{{asset('edjuma/images/recent-post-03.jpg')}}" alt=""></a><div class="hover-icon"></div></div>
                <a href="blog-single-post.html"><h4>11 Tips to Help You Get New Clients Through Cold Calling</h4></a>
                <div class="meta-tags">
                    <span>August 27, 2015</span>
                    <span><a href="#">0 Comments</a></span>
                </div>
                <p>If your dream employer appears on this list, you’re certainly in good company. But it also means you’re up for some intense competition.</p>
                <a href="blog-single-post.html" class="button">Read More</a>
            </div>
        </div>

    </div>


    <!-- Footer
    ================================================== -->
    <div class="margin-top-15"></div>

    <div id="footer">
        <!-- Main -->
        <div class="container">

            <div class="seven columns">
                <h4>About</h4>
                <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
                <a href="#" class="button">Get Started</a>
            </div>

            <div class="three columns">
                <h4>Company</h4>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Our Blog</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Hiring Hub</a></li>
                </ul>
            </div>

            <div class="three columns">
                <h4>Press</h4>
                <ul class="footer-links">
                    <li><a href="#">In the News</a></li>
                    <li><a href="#">Press Releases</a></li>
                    <li><a href="#">Awards</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Timeline</a></li>
                </ul>
            </div>

            <div class="three columns">
                <h4>Browse</h4>
                <ul class="footer-links">
                    <li><a href="#">Freelancers by Category</a></li>
                    <li><a href="#">Freelancers in USA</a></li>
                    <li><a href="#">Freelancers in UK</a></li>
                    <li><a href="#">Freelancers in Canada</a></li>
                    <li><a href="#">Freelancers in Australia</a></li>
                    <li><a href="#">Find Jobs</a></li>

                </ul>
            </div>

        </div>

        <!-- Bottom -->
        <div class="container">
            <div class="footer-bottom">
                <div class="sixteen columns">
                    <h4>Follow Us</h4>
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                    </ul>
                    <div class="copyrights">©  Copyright 2018 by <a href="#">Edjuma</a>. All Rights Reserved.</div>
                </div>
            </div>
        </div>

    </div>

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

<!-- Mirrored from www.vasterad.com/themes/workscout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 May 2018 07:09:47 GMT -->
</html>
