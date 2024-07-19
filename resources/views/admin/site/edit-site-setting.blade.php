@extends('admin.layout.main')
@section('title')Edit Site   @endsection
@section('maindashboard')
 <!-- App container starts -->
 

    <!-- App hero header starts -->
    <div class="app-hero-header d-flex align-items-center">

      <!-- Breadcrumb starts -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
          <a href="{{route('admin.dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            <a href="javascript:history.back()"> Back</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
        Edit Site
        </li>
       
      </ol>
      <!-- Breadcrumb ends -->
      <script>
        window.onload = function() {
           
            @if (session('error'))
                alert("{{ session('error') }}");
            @endif
                 
        };
    </script>
    </div>
    <!-- App Hero header ends -->

    <!-- App body starts -->
    <div class="app-body">

      <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Site</h5>
            </div>
            <div class="card-body">
            <form action="{{route('sitesettings.update',['sitesetting' => $seo_setting->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Title</label>
                    <input type="text" name="title"  class="form-control" value="{{$seo_setting->title}}" placeholder="Enter title">
                    @error('title')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Footer About </label>
                      <input type="text" name="footerabout" class="form-control" placeholder="Enter footer about" value="{{$seo_setting->footerabout}}">
                      @error('footerabout')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Logo</label>
                      <input type="file" name="logo" class="form-control" accept="image/png, image/jpeg, image/jpg" >
                      <span class="text-danger">(TYPE:PNG,JPEG,JPG,SIZE:512MB)</span><br>
                      <a href="{{asset('website/dynamics/other/'.$seo_setting->logo)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->logo)}}" style="width:80px;height:80px;"></a>
                      @error('logo')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Favicon</label>
                      <input type="file" name="favicon" class="form-control"  accept="image/png, image/jpeg, image/jpg">
                      <span class="text-danger">(TYPE:PNG,JPEG,JPG,SIZE:512MB)</span><br>
                      <a href="{{asset('website/dynamics/other/'.$seo_setting->favicon)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->favicon)}}" style="width:80px;height:80px;"></a>
                      @error('favicon')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">About Banner</label>
                      <input type="file" name="about_banner" class="form-control" accept="image/png, image/jpeg, image/jpg">
                      <span class="text-danger">(TYPE:PNG,JPEG,JPG,SIZE:512MB)</span><br>
                      <a href="{{asset('website/dynamics/other/'.$seo_setting->about_banner)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->about_banner)}}" style="width:100px;height:80px;"></a>
                      @error('about_banner')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Category Banner</label>
                      <input type="file" name="category_banner" class="form-control"  accept="image/png, image/jpeg, image/jpg">
                      <span class="text-danger">(TYPE:PNG,JPEG,JPG,SIZE:512MB)</span><br>
                      <a href="{{asset('website/dynamics/other/'.$seo_setting->category_banner)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->category_banner)}}" style="width:100px;height:80px;"></a>
                      @error('category_banner')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Gallery Banner</label>
                      <input type="file" name="gallery_banner" class="form-control " accept="image/png, image/jpeg, image/jpg">
                      <span class="text-danger">(TYPE:PNG,JPEG,JPG,SIZE:512MB)</span><br>
                      <a href="{{asset('website/dynamics/other/'.$seo_setting->gallery_banner)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->gallery_banner)}}" style="width:100px;height:80px;"></a>
                      @error('gallery_banner')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Contact Banner</label>
                      <input type="file" name="contact_banner" class="form-control" accept="image/png, image/jpeg, image/jpg" >
                      <span class="text-danger">(TYPE:PNG,JPEG,JPG,SIZE:512MB)</span><br>
                      <a href="{{asset('website/dynamics/other/'.$seo_setting->contact_banner)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->contact_banner)}}" style="width:100px;height:80px;"></a>
                      @error('contact_banner')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Testimonial Image</label>
                      <input type="file" name="testimonial_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                      <span class="text-danger">(TYPE:PNG,JPEG,JPG,SIZE:512MB)</span><br>
                     <a href="{{asset('website/dynamics/other/'.$seo_setting->testimonial_image)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->testimonial_image)}}" style="width:100px;height:80px;"></a>
                      @error('testimonial_image')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Facebook Link </label>
                      <input type="text" name="facebook_link" class="form-control" placeholder="Enter facebook link" value="{{$seo_setting->facebook_link}}">
                      @error('facebook_link')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Twitter Link </label>
                      <input type="text" name="twitter_link" class="form-control" placeholder="Enter Twitter link" value="{{$seo_setting->twitter_link}}">
                      @error('twitter_link')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Youtube Link </label>
                      <input type="text" name="youtube_link" class="form-control" placeholder="Enter Youtube link" value="{{$seo_setting->youtube_link}}">
                      @error('youtube_link')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Instagram Link </label>
                      <input type="text" name="insta_link" class="form-control" placeholder="Enter Instagram link" value="{{$seo_setting->insta_link}}">
                      @error('insta_link')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Linkedin Link </label>
                      <input type="text" name="linked_link" class="form-control" placeholder="Enter Linkedin link" value="{{$seo_setting->linked_link}}">
                      @error('linked_link')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                   <div class="col-sm-12">
                  <div class="d-flex gap-2 justify-content-end">
                    <button class="btn btn-primary" type="submit">
                      Submit
                    </button>
                  </div>
                </div>
              </div>
              <!-- Row ends -->
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Row ends -->

    </div>
    <!-- App body ends -->
   
    @endsection