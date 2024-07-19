@extends('website.layouts.app')
@section('maintitle') Home @endsection
@section('mainwebsite')
<!-- mian-area -->
<main>
   <section class="banner-area">
      <div class="hero-slider-active">
         @foreach($slider as $item)
         <div class="testimonial-item">
            <div class="banner-shape" data-background="{{asset('assets//banner_shape.png')}}"></div>
            <div class="banner-bg" data-background="{{asset('assets/dynamics/slider/'.$item->image)}}">
               <div class="banner-content">
                  <h2 class="title wow fadeInDown text-left" data-wow-delay=".2s">{{$item->title}}</h2>
                  {!! $item->description !!}
                  <a href="{{route('home.abouts-us')}}" class="btn wow fadeInUp" data-wow-delay=".4s">Discover More</a>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </section>
   <!-- brand-area -->
   <!-- banner-area-end -->
   <!-- brand-area -->
   <div class="brand-area">
      <div class="container">
         <div class="brand-inner">
            <div class="row brand-active">
               @foreach($brands as $brand)
               <div class="col-12">
                  <div class="brand-item">
                     <img src="{{asset('assets/dynamics/slider/'.$brand->image)}}" alt="{{$brand->title}}">
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <!-- brand-area-end -->
   <!-- services-area -->
   <section class="services-area">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-6">
               <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                  <span class="sub-title tg-element-title">What We Produce</span>
                  <h2 class="title tg-element-title">Our Products</h2>
               </div>
            </div>
         </div>
         <div class="row justify-content-center">
    @foreach($our_product as $product)
        <div class="col-lg-6 col-md-6 col-sm-10">
            @php
                $imagePath = json_decode($product->images, true);
            @endphp
            <div class="services-item wow fadeInUp" data-wow-delay=".2s" data-background="{{ isset($imagePath[0]) ? asset('assets/dynamics/product/'.$imagePath[0]) : 'assets/images/pro-2.jpg' }}">
                <div class="services-icon">
                    <img src="{{ asset('assets/images/tubes.png') }}" alt="icon">
                </div>
                <div class="services-content">
                    <h2 class="title">
                        <a href="{{ $product->sub_slug ? route('home.product-sub-details', $product->sub_slug) : route('home.product-details', $product->slug) }}">
                            {{ $product->sub_title ?: $product->title }}
                        </a>
                    </h2>
                    <h2 class="number">{{ $product->priority }}</h2>
                    <!-- Debug Slug Values -->
                    <!--<p>Slug: {{ $product->slug }}</p>-->
                    <!--<p>Sub Slug: {{ $product->sub_slug }}</p>-->
                </div>
                <div class="services-overlay-content">
                    <h2 class="title">
                        <a href="{{ $product->sub_slug ? route('home.product-sub-details', $product->sub_slug) : route('home.product-details', $product->slug) }}">
                            {{ $product->sub_title ?: $product->title }}
                        </a>
                    </h2>
                    @php
                        $description = strip_tags($product->description); // Remove HTML tags
                        $description_words = explode(' ', $description);
                        $description_limit = 50;
                        $trimmed_description = implode(' ', array_slice($description_words, 0, $description_limit));
                    @endphp
                    <p>{{ $trimmed_description }}</p>
                    <a href="{{ $product->sub_slug ? route('home.product-sub-details', $product->sub_slug) : route('home.product-details', $product->slug) }}" class="read-more">
                        Read More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

      </div>
   </section>
   <!-- services-area-end -->
   <!-- about-area -->
   <section class="about-area pb-5">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xl-7 col-lg-6 order-0 order-lg-2">
               <div class="about-img-wrap">
                  <img src="{{(asset('assets/dynamics/slider/'.$about->aboutimage))}}" alt="" class="wow fadeInRight" data-wow-delay=".2s">
                  <div class="about-experiences-wrap">
                     <div class="experiences-item">
                        <div class="icon">
                           <img src="{{(asset('assets/dynamics/slider/'.$about->titleicon1))}}" alt="">
                        </div>
                        <div class="content">
                           <h6 class="title">{{$about->title1}}</h6>
                        </div>
                     </div>
                     <div class="experiences-item">
                        <div class="icon">
                           <img src="{{(asset('assets/dynamics/slider/'.$about->titleicon2))}}" alt="about-img">
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
                  {!! $firstPart  !!}
                  <br><br>
                  <a href="{{ route('home.abouts-us', ['id' => $about->id]) }}" class="btn">Learn More</a>
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
   <!-- counter-area-end -->
   <!-- testimonial-area -->
   <section class="testimonial-area pt-5 pb-5">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 wow fadeInLeft " data-wow-delay=".2s">
               <div class="testimonial-img">
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
                           <div class="avatar-content">
                              <h6 class="title">{{$item->clientname}}</h6>
                              <p>{{$item->designation}}</p>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     {{-- 
                     <div class="testimonial-item">
                        <div class="testimonial-icon">
                           <i class="fas fa-quote-left"></i>
                        </div>
                        <div class="testimonial-content">
                           <p>There are many varation of paissages of Lorem as the Ipum available but our majority have sufferied alterations in some form, by our by injected hsumour randomised worids which don't looks even slightly there as believable. If you going to use a passage of Lorem Ipsum.</p>
                        </div>
                        <div class="testimonial-avatar">
                           <div class="avatar-content">
                              <h6 class="title">Darrell Steward</h6>
                              <p>Engineer</p>
                           </div>
                        </div>
                     </div>
                     <div class="testimonial-item">
                        <div class="testimonial-icon">
                           <i class="fas fa-quote-left"></i>
                        </div>
                        <div class="testimonial-content">
                           <p>There are many varation of paissages of Lorem as the Ipum available but our majority have sufferied alterations in some form, by our by injected hsumour randomised worids which don't looks even slightly there as believable. If you going to use a passage of Lorem Ipsum.</p>
                        </div>
                        <div class="testimonial-avatar">
                           <div class="avatar-content">
                              <h6 class="title">Darrell Steward</h6>
                              <p>Engineer</p>
                           </div>
                        </div>
                     </div>
                     --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<!-- mian-area-end -->
@endsection