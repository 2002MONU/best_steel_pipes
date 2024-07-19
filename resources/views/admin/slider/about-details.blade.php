@extends('admin.layout.main')
@section('title') About Details @endsection
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
        About 
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
                <h5 class="card-title">About </h5>
                {{-- <a href="{{route('sliders.create')}}" class="btn btn-primary ms-auto">Add Slider</a> --}}
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Main Title</th>
                    <th>Description</th>
                    <th>Title Icon 1</th>
                    <th>Title 1</th>
                    <th>Title Icon 2</th>
                    <th>Title 2</th>
                    <th>About Image</th>
                     <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    
                  <tr>
                    <td>{{$about->id}}</td>
                    <td>{{$about->maintitle}}</td>
                    <td></td>
                    <td><a href="{{asset('assets/dynamics/slider/'.$about->titleicon1)}}" ><img src="{{asset('assets/dynamics/slider/'.$about->titleicon1)}}" style="width:30px;height:30px;" class="bg-dark"></a></td>
                    <td>{{$about->title1}}</td>
                    <td><a href="{{asset('assets/dynamics/slider/'.$about->titleicon2)}}"><img src="{{asset('assets/dynamics/slider/'.$about->titleicon2)}}" style="width:30px;height:30px;" class="bg-dark"></a></td>
                    <td>{{$about->title2}}</td>
                    <td><a href="{{asset('assets/dynamics/slider/'.$about->aboutimage)}}"><img src="{{asset('assets/dynamics/slider/'.$about->aboutimage)}}" style="width:100px;height:100px;"></a></td>
                    <td>{{$about->updated_at}}</td>
                    <td>
                      <div class="d-inline-flex gap-1">
                         <a href="{{route('aboutpages.edit', ['aboutpage' => $about->id])}}" class="btn btn-outline-success btn-sm">
                          <i class="ri-edit-box-line"></i>
                        </a>
                        
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