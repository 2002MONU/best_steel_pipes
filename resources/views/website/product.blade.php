@extends('website.layouts.app')
@section('maintitle') product @endsection
@section('mainwebsite')
<main>
<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('website/dynamics/other/'.$site_details->category_banner)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="title">Products</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->
<!-- area-bg -->
<!--<div class="area-bg-four" data-background="{{asset('assets/img/bg/area_bg04.jpg')}}">-->

<!-- project-area -->
<section class="project-area-four">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60">
                    <span class="sub-title">Latest Projects</span>
                    <h2 class="title">Explore Our Latest Projects</h2>
                </div>
            </div>
        </div>
        <div class="row">
           @if($our_product->isEmpty())
    <div class="col-lg-12">
        <div class="alert alert-warning" role="alert">
            No products available.
        </div>
    </div>
@else
@foreach($our_product as $product)
    <div class="col-lg-4">
        @php
            $imagePath = json_decode($product->images, true);
            $productUrl = $product->slug ? route('home.product-details', $product->slug) : ($product->sub_slug ? route('home.product-sub-details', $product->sub_slug) : '#');
            // Debugging: Log the URLs and product data
            \Log::info('Product URL:', ['url' => $productUrl, 'sub_slug' => $product->sub_slug, 'slug' => $product->slug]);
        @endphp
        <div class="project-item-four">
            <div class="project-thumb-four">
                <a href="{{ $productUrl }}">
                    <img src="{{ isset($imagePath[0]) ? asset('assets/dynamics/product/' . $imagePath[0]) : asset('assets/images/pro-3.jpg') }}" alt="{{ $product->title }}">
                </a>
            </div>
            <div class="project-content-four">
                <div class="content-left">
                    <h2 class="title">
                        <a href="{{ $productUrl }}">
                            {{ $product->sub_title ?: $product->title }}
                        </a>
                    </h2>
                    <ul class="list-wrap">
                        <li><a href="{{ $productUrl }}">
                            {{ $product->sub_title ?: $product->title }}
                        </a></li>
                        <li>Pipes</li>
                    </ul>
                </div>
                <div class="content-right">
                    <a href="{{ $productUrl }}" class="link-btn"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endif

             
        </div>
    </div>
</section>
<!-- project-area-end -->
</main>
@endsection