@extends('website.layouts.app')
@section('maintitle') About-Us @endsection
@section('mainwebsite')
<main>
    <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('website/dynamics/other/'.$site_details->about_banner)}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">About Us</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
            
            <!-- about-area -->
            <section class="about-area pb-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6 order-0 order-lg-2">
                            <div class="about-img-wrap">
                                <img src="{{(asset('assets/dynamics/slider/'.$about->aboutimage))}}" alt="about-image" class="wow fadeInRight" data-wow-delay=".2s">
                                <div class="about-experiences-wrap">
                                    <div class="experiences-item">
                                        <div class="icon">
                                            <img src="{{(asset('assets/dynamics/slider/'.$about->titleicon1))}}" alt="icon1">
                                        </div>
                                        <div class="content">
                                            <h6 class="title">{{$about->title1}}</h6>
                                        </div>
                                    </div>
                                    <div class="experiences-item">
                                        <div class="icon">
                                            <img src="{{(asset('assets/dynamics/slider/'.$about->titleicon2))}}" alt="icon2">
                                        </div>
                                        <div class="content">
                                            <h6 class="title">{{$about->title2}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="about-content">
                                <div class="section-title mb-25 tg-heading-subheading animation-style3">
                                    <span class="sub-title tg-element-title">About Our Company</span>
                                    <h2 class="title tg-element-title">{{$about->maintitle}}</h2>
                                </div>
                                {!! $about->description  !!}
                            </div>
                        </div>
                    </div>
                     <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="vision">
                                <div class="vision-img">
                                    <img src="public\assets\images\binoculars.png" alt="">
                                </div>
                                <h3>Our Vision</h3>
                                <p>{{$about->our_vision}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="vision">
                                <div class="vision-img">
                                    <img src="public\assets\images\targeting.png" alt="">
                                </div>
                                <h3>Our Mission</h3>
                               <p>{{$about->our_mission}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            

             <!-- counter-area -->
             <div class="counter-area pb-120">
                <div class="container">
                    <div class="counter-inner wow fadeInUp" data-wow-delay=".2s">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter-item">
                                    <div class="counter-icon">
                                        <img src="{{asset('website/dynamics/slider/'.$our_achievement->project_icon1)}}" alt="project complete icon">
                                    </div>
                                    <div class="counter-content">
                                        <span class="count odometer">{{$our_achievement->project_complete}}></span>
                                        <p>Project Complete</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter-item">
                                    <div class="counter-icon">
                                        <img src="{{asset('website/dynamics/slider/'.$our_achievement->satisfied_icon2)}}" alt="satisfied client">
                                    </div>
                                    <div class="counter-content">
                                        <span class="count odometer">{{$our_achievement->satisfied_client}}></span>
                                        <p>Satisfied Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter-item">
                                    <div class="counter-icon">
                                        <img src="{{asset('website/dynamics/slider/'.$our_achievement->experienced_icon3)}}" alt="experienced staff">
                                    </div>
                                    <div class="counter-content">
                                        <span class="count odometer">{{$our_achievement->experienced_staff}}</span>
                                        <p>Experienced Staff</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter-item">
                                    <div class="counter-icon">
                                        <img src="{{asset('website/dynamics/slider/'.$our_achievement->award_icon4)}}" alt="">
                                    </div>
                                    <div class="counter-content">
                                        <span class="count odometer">{{$our_achievement->award_win}}></span>
                                        <p>Awards Win</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- testimonial-area -->
             <section class="testimonial-area pt-5 pb-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                            <div class="testimonial-img ">
                                <img src="{{asset('website/dynamics/other/'.$site_details->testimonial_image)}}" alt="">
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testimonial-content">
                                <div class="section-title mb-45 tg-heading-subheading animation-style3">
                                    <span class="sub-title tg-element-title">Our Testimonial</span>
                                    <h2 class="title tg-element-title">Some of Our Respected Happy Clients Says</h2>
                                </div>
                                <div class="testimonial-active">
                                    @foreach($testi as $item)
                                    <div class="testimonial-item">
                                        <div class="testimonial-icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="testimonial-content">
                                            {!! $item->description !!}
                                        </div>
                                        <div class="testimonial-avatar">
                                            <div class="avatar-thumb">
                                                <img src="{{asset('assets/dynamics/slider/'.$item->clientimage)}}" alt="">
                                            </div>
                                            <div class="avatar-content">
                                                <h6 class="title">{{$item->clientname}}</h6>
                                                <p>{{$item->designation}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </main>
        <!-- mian-area-end -->

@endsection

    