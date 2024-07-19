@extends('admin.layout.main') 
@section('title') Admin  @endsection
@section('maindashboard')
 <!-- App container starts -->


    <!-- App hero header starts -->
    <div class="app-hero-header d-flex align-items-center">
      <script>
        window.onload = function() {
            // Alert messages for login success or errors
            @if (session('success'))
                alert("{{ session('success') }}");
            @endif

            @if (session('error'))
                alert("{{ session('error') }}");
            @endif
                 
        };
    </script>
      <!-- Breadcrumb starts -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
          <a href="{{route('admin.dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
          Dashboard
        </li>
      </ol>
      <!-- Breadcrumb ends -->

     

    </div>
    <!-- App Hero header ends -->

    <!-- App body starts -->
    <div class="app-body">
      <!-- Row starts -->
      <div class="row gx-3">
          
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{route('sliders.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-success rounded-circle me-3">
                  <div class="icon-box md bg-success-subtle rounded-5">
                    <i class="ri-home-4-fill fs-4 text-success"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$banner}}</h2>
                  <p class="m-0">Banner</p>
                </div>
              </div>
             
            </div>
          </div></a>
        </div>
          
<!--        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-primary rounded-circle me-3">
                  <div class="icon-box md bg-primary-subtle rounded-5">
                    {{-- <i class="ri-lungs-line fs-4 text-primary"></i> --}}
                    <i class="ri-building-line fs-4 text-primary"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$brands}}</h2>
                  <p class="m-0">Brands</p>
                </div>
              </div>
              
            </div>
          </div>
        </div>-->
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{route('testinomials.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-danger rounded-circle me-3">
                  <div class="icon-box md bg-danger-subtle rounded-5">
                    <i class="ri-user-heart-fill  fs-4 text-success"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$testinomial}}</h2>
                  <p class="m-0">Testimonial</p>
                </div>
              </div>
              
            </div>
          </div>
                </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{route('productcategories.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-warning rounded-circle me-3">
                  <div class="icon-box md bg-warning-subtle rounded-5">
                    {{-- <i class="ri-money-dollar-circle-line fs-4 text-warning"></i> --}}
                    <i class="ri-product-hunt-fill fs-4 text-warning"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$category}}</h2>
                  <p class="m-0">Category</p>
                </div>
              </div>
              
            </div>
          </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{route('productsubcategories.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-primary rounded-circle me-3">
                  <div class="icon-box md bg-primary-subtle rounded-5">
                    {{-- <i class="ri-lungs-line fs-4 text-primary"></i> --}}
                    <i class="ri-layout-column-fill fs-4 text-primary"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$sub_category}}</h2>
                  <p class="m-0">Sub Category</p>
                </div>
              </div>
            </div>
          </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{route('galleries.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-success rounded-circle me-3">
                  <div class="icon-box md bg-success-subtle rounded-5">
                    {{-- <i class="ri-file-4-fill fs-4 text-success"></i> --}}
                    <i class="ri-gallery-fill fs-4 text-success"></i>
                    
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$gallery}}</h2>

                  <p class="m-0">Gallery</p>
                </div>
              </div>
             
            </div>
          </div>
            </a>
        </div>
       
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{route('contactdetails.index')}}">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-danger rounded-circle me-3">
                  <div class="icon-box md bg-danger-subtle rounded-5">
                    {{-- <i class="ri-microscope-line fs-4 text-danger"></i> --}}
                    <i class="ri-contacts-book-3-line fs-4 text-danger"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">{{$branch}}</h2>
                  <p class="m-0">Branch</p>
                </div>
              </div>
              
            </div>
          </div>
            </a>
        </div>
        {{-- <div class="col-xl-3 col-sm-6 col-12">
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="p-2 border border-warning rounded-circle me-3">
                  <div class="icon-box md bg-warning-subtle rounded-5">
                    <i class="ri-money-dollar-circle-line fs-4 text-warning"></i>
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h2 class="lh-1">$98000</h2>
                  <p class="m-0">Category</p>
                </div>
              </div>
              
            </div>
          </div>
        </div> --}}
      </div>
      <!-- Row ends -->

    
     

     

    </div>
    <!-- App body ends -->
    @endsection