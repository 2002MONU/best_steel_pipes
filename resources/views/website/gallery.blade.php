@extends('website.layouts.app')
@section('maintitle') Gallery @endsection
@section('mainwebsite')
<main>
<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('website/dynamics/other/'.$site_details->gallery_banner)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="title">Gallery</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->
 <!-- project-area -->
 <section class="inner-project-area pt-5 pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60">
                    <span class="sub-title">Gallery</span>
                    <h2 class="title">Our Latest Gallery</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($galleries as $gallery)
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="project-item-two">
                    <div class="project-thumb-two">
                    <a class="image-popup-vertical-fit" href="{{asset('assets/dynamics/gallery/'.$gallery->image)}}" title="{{$gallery->title}}">
					    <img src="{{asset('assets/dynamics/gallery/'.$gallery->image)}}" alt="{{$gallery->title}}" />
				    </a>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
       
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60">
                    <span class="sub-title">Videos</span>
                    <h2 class="title">Our Latest Videos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($videos as $video)
                
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="project-item-two">
                    <div class="project-thumb-two">
                        <iframe  src="{{$video->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="project-item-two">
                    <div class="project-thumb-two">
                        <iframe  src="https://www.youtube.com/embed/VaEMyw10-Nc?si=fMss8d-Ec-vuJllS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="project-item-two">
                    <div class="project-thumb-two">
                        <iframe  src="https://www.youtube.com/embed/VaEMyw10-Nc?si=fMss8d-Ec-vuJllS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="project-item-two">
                    <div class="project-thumb-two">
                        <iframe  src="https://www.youtube.com/embed/VaEMyw10-Nc?si=fMss8d-Ec-vuJllS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div> --}}
        </div>
        </div>
</section>
<!-- project-area-end -->
</main>
@endsection

    