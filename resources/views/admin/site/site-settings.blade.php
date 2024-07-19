@extends('admin.layout.main')
@section('title') Seo Setting @endsection
@section('maindashboard')

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
          Seo Setting 
          </li>
        </ol>
        <!-- Breadcrumb ends -->
       </div>
      <!-- App Hero header ends -->
   <!-- App body starts -->
   <div class="app-body">

    <!-- Row starts -->
    <div class="row gx-3">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">Seo Setting  </h5>
                {{-- <a href="{{route('contactdetails.create')}}" class="btn btn-primary ms-auto">Add Branch details</a> --}}
              </div>
            <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    
                    <th>Footer About</th> 
                    <th>Logo</th>
                    <th>Favicon</th>
                   <th>About Banner</th> 
                    <th>Category Banner</th> 
                    <th>Gallery Banner</th> 
                    <th>Contact Banner</th> 
                    <th>Testimonial Image</th> 
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <td>{{$seo_setting->id}}</td>
                    <td>{{$seo_setting->title}}</td>
                   <td>{{$seo_setting->footer_about}}</td>
                    <td><a href="{{asset('website/dynamics/other/'.$seo_setting->logo)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->logo)}}" style="width:80px;height:80px;"></a> </td>
                    <td><a href="{{asset('website/dynamics/other/'.$seo_setting->favicon)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->favicon)}}" style="width:80px;height:80px;"></a> </td>
                    <td><a href="{{asset('website/dynamics/other/'.$seo_setting->about_banner)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->about_banner)}}" style="width:80px;height:80px;"></a> </td>
                    <td><a href="{{asset('website/dynamics/other/'.$seo_setting->category_banner)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->category_banner)}}" style="width:80px;height:80px;"></a> </td>
                    <td><a href="{{asset('website/dynamics/other/'.$seo_setting->gallery_banner)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->gallery_banner)}}" style="width:80px;height:80px;"></a> </td>
                    <td><a href="{{asset('website/dynamics/other/'.$seo_setting->contact_banner)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->contact_banner)}}" style="width:80px;height:80px;"></a> </td>
                    <td><a href="{{asset('website/dynamics/other/'.$seo_setting->testimonial_image)}}"><img src="{{asset('website/dynamics/other/'.$seo_setting->testimonial_image)}}" style="width:80px;height:80px;"></a><br> </td>
                    
                    <td>{{$seo_setting->updated_at}}</td>
                    <td>
                      <div class="d-inline-flex gap-1">
                         <a href="{{route('sitesettings.edit', ['sitesetting' => $seo_setting->id])}}" class="btn btn-outline-success btn-sm">
                          <i class="ri-edit-box-line"></i>
                        </a>
                      </div>
                    </td>
                    </tr>
                 
                </tbody>
              </table>
            </div>
            <!-- Table ends -->

           
          </div>
        </div>
      </div>
    </div>
    <!-- Row ends -->

  </div>
  <!-- App body ends -->
@endsection