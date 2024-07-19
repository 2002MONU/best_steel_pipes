@php
 $site_details = \App\Models\Site_setting::find(1);
 $path = request()->path();
 $seo_details = \App\Models\SeoSetting::where('page_name', $path)->first();
    $title = $description = $keywords = '';

    if ($seo_details) {
        $title = $seo_details->title;
        $description = $seo_details->description;
        $keywords = $seo_details->keywords;
    }
@endphp
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$site_details->title}} | {{$title}}</title>
    <meta name="description" content="{{$description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{$keywords}}" />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="https://manviinfra.com/" />
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="manviinfra">
    <meta property="og:description" content="{{$description}}">
    <meta property="og:url" content="https://manviinfra.com/">
    <meta property="og:site_name" content="">
    <meta property="og:updated_time" content="2021-04-13T14:03:56+00:00">
    <meta property="og:image" content="img/thumbnail-logo.jpg">
    <meta property="og:image:secure_url" content="img/thumbnail-logo.jpg">
    <meta property="og:image:width" content="521">
    <meta property="og:image:height" content="210">
    <meta property="og:image:alt" content="Homepage">
    <meta property="og:image:type" content="image/png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Homepage - manviinfra">
    <meta name="twitter:description" content="manviinfra">
    <meta name="twitter:image" content="img/thumbnail-logo.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('website/dynamics/other/'.$site_details->favicon)}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tg-cursor.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jarallax.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    @php
      $categories = \App\Models\ProductCategory::where('status', 1)->get();
      
      foreach ($categories as $value) {
        $sub_categories = \App\Models\ProductSubCategory::where('productcategory_id', $value->id)
                            ->where('status', 1)
                            ->select('id', 'productsubcategory', 'sub_slug')
                            ->where('productsubcategory', '!=', null)
                            ->get();
        if(count($sub_categories) > 0) {
            $value->sub_categories = $sub_categories;
        } else {
            $value->sub_categories = [];
        }
      }
    @endphp
    
</head>
    <body>
    <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-level-up-alt"></i>
        </button>
    <!-- Scroll-top-end-->
    <!-- header-area -->
        <header>
            <div id="sticky-header" class="menu-area transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo different-logo">
                                        <a href="{{route('home.index')}}"><img src="{{asset('website/dynamics/other/'.$site_details->logo)}}" alt="Logo"></a>
                                    </div>
                                    <div class="logo d-none">
                                        <a href="{{route('home.index')}}"><img src="{{asset('website/dynamics/other/'.$site_details->logo)}}" alt="Logo"></a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li><a href="{{route('home.index')}}">Home</a></li>
                                            <li><a href="{{route('home.abouts-us')}}">About us</a></li>
                                            <li class="menu-item-has-children"><a href="#!">Products</a>
                                                <ul class="sub-menu">
                                                    @foreach ($categories as $key => $categoryGroup)
                                                            <li class="menu-item-has-children">
                                                                @if (count($categoryGroup->sub_categories) > 0)
                                                                    <a>{{ $categoryGroup->productcategory }}</a>
                                                                    <ul class="sub-menu">
                                                                        @foreach($categoryGroup->sub_categories as $val)
                                                                            <li>
                                                                                <a href="{{ route('home.product-sub-details', $val->sub_slug) }}">{{ $val->productsubcategory }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @else
                                                                    <a href="{{ route('home.product-details', $categoryGroup->slug) }}">{{ $categoryGroup->productcategory }}</a>
                                                                @endif
                                                            </li>
                                                        @endforeach
<!--                                                    {{-- <li><a href="#">Spun/Hume Pipes</a></li> --}}-->
                                                    <li><a href="https://manviinfra.com/" target="blank">Home Construction</a></li>
                                                </ul>
                                              
                                            </li>
                                            <li><a href="{{route('home.gallery')}}">Gallery</a></li>
                                            <li><a href="{{route('home.contact')}}" >Contact us</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-md-block">
                                        <ul class="list-wrap">
                                            
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo">
                                        <a href="{{route('home.index')}}"><img src="{{asset('website/dynamics/other/'.$site_details->logo)}}" alt="Logo"></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix list-wrap">
                                            <li><a href="{{$site_details->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{$site_details->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="{{$site_details->insta_link}}"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="{{$site_details->linked_link}}"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="{{$site_details->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->

                        </div>
                    </div>
                </div>
            </div>
        </header>
    <!-- header-area-end -->
    
    <script>
        // Check if there is a success message and show it
        var successMsg = '{{ Session::get('success') }}';
        var hasSuccess = '{{ Session::has('success') }}';
        if (hasSuccess) {
            alert(successMsg);
        }

        // Check for error messages and show them
        @if ($errors->any())
            var errorMsg = '';
            @foreach ($errors->all() as $error)
                errorMsg += '{{ $error }}\n';
            @endforeach
            alert(errorMsg);
        @endif
    </script>