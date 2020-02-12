@extends('layouts.theme')

@section('content')

    <section class="main-banner" style="background:#242c36 url({{asset('assets/images/slider-01.jpg')}}) no-repeat">
        <div class="container">
            <div class="caption">
                <h2>Build Your Career</h2>
                <form action="{{route('jobs_listing')}}"  method="get">
                    <fieldset>
                        <div class="col-md-4 col-sm-4 no-pad">
                            <input type="text" class="form-control border-right" name="q" placeholder="@lang('app.job_title_placeholder')" />
                        </div>

                        <div class="col-md-4 col-sm-4 no-pad">
                            <input type="text" class="form-control border-right" name="location" placeholder="@lang('app.job_location_placeholder')" />
                        </div>

                        <div class="col-md-4 col-sm-4 no-pad">
                            <button type="submit" class="btn seub-btn" value="submit" >
                                <i class="la la-search"></i> @lang('app.search') @lang('app.job')
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
    @if($regular_jobs->count())
        <div class=" pb-5 pt-5">

            <div class="container">
                <div class="regular-job-container p-3">

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-3">@lang('app.new_jobs')</h4>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($regular_jobs as $regular_job)
                            <div class="col-md-4  boxshadow p-4">
                                <!-- Card -->
                                <a style="text-decoration: none" href="{{route('job_view', $regular_job->job_slug)}}">
                                    <div class="">
                                        <div class="card-body">

                                            <!-- Title -->
                                            <h4 class="card-title">{!! $regular_job->job_title !!}</h4>
                                            <!-- Text -->
                                            <p class="card-text">
                                                <i class="la la-map-marker"></i>
                                                @if($regular_job->city_name)
                                                    {!! $regular_job->city_name !!},
                                                @endif
                                                @if($regular_job->state_name)
                                                    {!! $regular_job->state_name !!},
                                                @endif
                                                @if($regular_job->state_name)
                                                    {!! $regular_job->country_name !!}
                                                @endif
                                            </p>
                                            <!-- Button -->
                                            <a href="{{route('job_view', $regular_job->job_slug)}}" class="btn btn-success">View Job</a>

                                        </div>

                                    </div>
                                </a>
                                    <!-- Card -->




                            </div>

                        @endforeach

                    </div>


                </div>

            </div>


        </div>
    @endif




    <section class="features regular-jobs-wrap">
        <div class="container">
            <div class="col-md-6 col-sm-6">
                <div class="features-content bg-white">
                    <span style="color: green" class="box1"><i class="fa fa-building"></i></span></span>
                    <h3>@lang('app.employer')</h3>
                    <p>@lang('app.employer_new_desc')</p>
                    <a href="{{route('register_employer')}}" class="btn btn-success"><i
                            class="la la-user-plus"></i> @lang('app.register_account') </a>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="features-content bg-white">
                    <span style="color: green" class="box1"><i class="fa fa-address-book"></i></span></span>
                    <h3>@lang('app.job_seeker')</h3>
                    <p>@lang('app.job_seeker_new_desc')</p>
                    <a href="{{route('register_agent')}}" class="btn btn-success">@lang('app.register_account')</a>
                </div>
            </div>
        </div>
    </section>


    <section class="divider">
    @if($categories->count())
        <div class="home-categories-wrap bg-white pb-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">@lang('app.browse_category')</h4>
                    </div>
                </div>
                <div class="row">

                    @foreach($categories as $category)
                        <div class="col-md-4">

                            <p>
                                <a href="{{route('jobs_listing', ['category' => $category->id])}}"
                                   class="category-link"><i class="la la-th-large"></i> {{$category->category_name}}
                                    <span class="text-muted">({{$category->job_count}})</span> </a>
                            </p>

                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    @endif



    @if($premium_jobs->count())

        <div class="premium-jobs-wrap pb-5 pt-5">

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">@lang('app.premium_jobs')</h4>
                    </div>
                </div>

                <div class="row">
                    @foreach($premium_jobs as $job)
                        <div class="col-md-4 mb-3">
                            <div class="premium-job-box p-3 bg-white box-shadow">

                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="premium-job-logo">
                                            <a href="{{route('jobs_by_employer', $job->employer->company_slug)}}">
                                                <img src="{{$job->employer->logo_url}}" class="img-fluid"/>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-6">

                                        <p class="job-title">
                                            <a href="{{route('job_view', $job->job_slug)}}">{!! $job->job_title !!}</a>
                                        </p>

                                        <p class="text-muted m-0">
                                            <a href="{{route('jobs_by_employer', $job->employer->company_slug)}}"
                                               class="text-muted">
                                                {{$job->employer->company}}
                                            </a>
                                        </p>

                                        <p class="text-muted m-0">
                                            <i class="la la-map-marker"></i>
                                            @if($job->city_name)
                                                {!! $job->city_name !!},
                                            @endif
                                            @if($job->state_name)
                                                {!! $job->state_name !!},
                                            @endif
                                            @if($job->state_name)
                                                {!! $job->country_name !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

        </div>
    @endif
</section>
    <section class="counter">
        <div class="container">
            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span aria-hidden="true" class="icon-briefcase"></span>
                    <h3>1000</h3>
                    <p>Jobs Posted</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span class="box1"><span aria-hidden="true" class="icon-expand"></span></span>
                    <h3>207</h3>
                    <p>All Companies</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span class="box1"><span aria-hidden="true" class="icon-profile-male"></span></span>
                    <h3>700+</h3>
                    <p>Total Members</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span class="box1"><span aria-hidden="true" class="icon-sad"></span></span>
                    <h3>802+</h3>
                    <p>Happy Members</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pricind">
        <div class="container">
            <div class="col-md-4 col-sm-4">
                <div class="package-box">
                    <div class="package-header">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <h3>FREE ACCOUNT</h3>
                    </div>
                    <div class="package-info">
                        <ul>
                            <ul>
                                <li>Free Jobs Post</li>
                                <li>Unlimited Regular Job Post</li>
                                <li>Unlimited Applicants</li>
                                <li>Dashboard access to manage application</li>
                                <li>E-Mail support available</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="package-price">
                        <h2><sup> </sup>Free<sub></sub></h2>
                    </div>
                    <a href="{{route('new_register')}}" class="btn btn-success m-10"><i class="la la-user-plus"></i>
                        Sign Up</a>
                </div>
            </div>



            @foreach($packages as $package)
               {{-- <div class="col-xs-12 col-md-4">
                    <div class="pricing-table-wrap bg-light pt-5 pb-5 text-center">
                        <h1 class="display-4">{!! get_amount($package->price) !!}</h1>
                        <h3>{{$package->package_name}}</h3>
                        <div class="pricing-package-ribbon pricing-package-ribbon-green">Premium</div>

                        <p class="mb-2 text-muted"> {{$package->premium_job}} Premium Jobs Post</p>
                        <p class="mb-2 text-muted"> Unlimited Regular Job Post</p>
                        <p class="mb-2 text-muted"> Unlimited Applicants</p>
                        <p class="mb-2 text-muted"> Dashboard access to manage application</p>
                        <p class="mb-2 text-muted"> E-Mail support available</p>
                        <a href="{{route('checkout', $package->id)}}" class="btn btn-success mt-4"> <i
                                class="la la-shopping-cart"></i> Purchas Package</a>
                    </div>
                </div>--}}

                <div class="col-md-4 col-sm-4">
                    <div class="package-box">
                        <div class="package-header">
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                            <h3>{{$package->package_name}}</h3>
                        </div>
                        <div class="package-info">
                            <ul>
                                <li>{{$package->premium_job}} Premium Jobs Post</li>
                                <li>Unlimited Regular Job Post</li>
                                <li>Unlimited Applicants</li>
                                <li>Dashboard access to manage application</li>
                                <li>E-Mail support available</li>
                            </ul>
                        </div>
                        <div class="package-price">
                            <h2><sup>GHC </sup>{!! get_amount($package->price) !!}</sub></h2>
                        </div>
                        <a href="{{route('checkout', $package->id)}}" class="btn btn-success mt-4"> <i
                                class="la la-shopping-cart"></i> Purchas Package</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    {{--<div class="pricing-section bg-secondary pb-5 pt-5">
        <div class="container">



            <div class="row">

                <div class="col-xs-12 col-md-4">
                    <div class="pricing-table-wrap bg-light pt-5 pb-5 text-center">
                        <h1 class="display-4">$0</h1>
                        <h3>Free</h3>

                        <div class="pricing-package-ribbon pricing-package-ribbon-light">Regular</div>

                        <p class="mb-2 text-muted"> No Premium Job Post</p>
                        <p class="mb-2 text-muted"> Unlimited Regular Job Post</p>
                        <p class="mb-2 text-muted"> Unlimited Applicants</p>
                        <p class="mb-2 text-muted"> Dashboard access to manage application</p>
                        <p class="mb-2 text-muted"> No support available</p>

                        <a href="{{route('new_register')}}" class="btn btn-success mt-4"><i class="la la-user-plus"></i>
                            Sign Up</a>
                    </div>
                </div>

                @foreach($packages as $package)
                    <div class="col-xs-12 col-md-4">
                        <div class="pricing-table-wrap bg-light pt-5 pb-5 text-center">
                            <h1 class="display-4">{!! get_amount($package->price) !!}</h1>
                            <h3>{{$package->package_name}}</h3>
                            <div class="pricing-package-ribbon pricing-package-ribbon-green">Premium</div>

                            <p class="mb-2 text-muted"> {{$package->premium_job}} Premium Jobs Post</p>
                            <p class="mb-2 text-muted"> Unlimited Regular Job Post</p>
                            <p class="mb-2 text-muted"> Unlimited Applicants</p>
                            <p class="mb-2 text-muted"> Dashboard access to manage application</p>
                            <p class="mb-2 text-muted"> E-Mail support available</p>
                            <a href="{{route('checkout', $package->id)}}" class="btn btn-success mt-4"> <i
                                    class="la la-shopping-cart"></i> Purchas Package</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>--}}

    {{--<div class="home-blog-section pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pricing-section-heading mb-5 text-center">
                        <h1>From Our Blog</h1>
                        <h5 class="text-muted">Check the latest updates/news from us.</h5>
                    </div>

                </div>
            </div>


            <div class="row">

                @foreach($blog_posts as $post)

                    <div class="col-md-4">

                        <div class="blog-card-wrap bg-white p-3 mb-4">

                            <div class="blog-card-img mb-4">
                                <img src="{{$post->feature_image_thumb_uri}}" class="card-img"/>
                            </div>

                            <h4 class="mb-3">{{$post->title}}</h4>

                            <p class="blog-card-text-preview">{!! limit_words($post->post_content) !!}</p>

                            <a href="{{route('blog_post_single', $post->slug)}}" class="btn btn-success"> <i
                                    class="la la-book"></i> Read More</a>

                            <div class="blog-card-footer border-top pt-3 mt-3">
                                <span><i class="la la-user"></i> {{$post->author->name}} </span>
                                <span><i class="la la-clock-o"></i> {{$post->created_at->diffForHumans()}} </span>
                                <span><i class="la la-eye"></i> {{$post->views}} </span>
                            </div>
                        </div>


                    </div>

                @endforeach

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="home-all-blog-posts-btn-wrap text-center my-3">

                        <a href="" class="btn btn-success btn-lg"><i class="la la-link"></i> @lang('app.all_blog_posts')
                        </a>

                    </div>
                </div>
            </div>


        </div>
    </div>--}}

    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                    <h2>Want More Job & Latest Job? </h2>
                    <p>Subscribe to our mailing list to receive an update when new Job arrive!</p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type Your Email Address...">
                        <span class="input-group-btn">
							<button type="button" class="btn btn-default">subscribe!</button>
						</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
