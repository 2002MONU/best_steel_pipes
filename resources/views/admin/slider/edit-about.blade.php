@extends('admin.layout.main')
@section('title')Edit About  @endsection
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
         Edit About
        </li>
       
      </ol>
      <!-- Breadcrumb ends -->
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
    </div>
    <!-- App Hero header ends -->

    <!-- App body starts -->
    <div class="app-body">

      <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit About</h5>
            </div>
            <div class="card-body">
            <form action="{{route('aboutpages.update', ['aboutpage' => $about->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Main Title</label>
                    <input type="text" class="form-control" name="maintitle" placeholder="Enter Title" value="{{$about->maintitle}}">
                    @error('maintitle')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                
                <div class="col-xxl-6 col-lg-6 col-sm-6">
                  <div class="mb-3">
                    <label class="form-label" for="a6">Title icon 1</label>
                    <input type="file" id="fileinput1" name="titleicon1" accept="image/png, image/jpeg, image/jpg"" class="form-control file-input" >
                    <div id="messageId1" class="text-danger"></div>
                    <span class="text-danger">(NOTE:IMAGE-TYPE:PNG:JPG,JPEG,SIZE:256KB,DIMENSIONS-20X20-100X100)</span>
                    <a href="{{asset('assets/dynamics/slider/'.$about->titleicon1)}}"><img src="{{asset('assets/dynamics/slider/'.$about->titleicon1)}}" style="width:30px;height:30px;" class="bg-dark"></a>
                    @error('titleicon1')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
                 </div>
                 <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a2">Title 1</label>
                      <input type="text" class="form-control "  value="{{$about->title1}}" name="title1" placeholder="Enter title 1 ">
                      @error('title1')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror 
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-6">
                    <div class="mb-3">
                      <label class="form-label" for="a6">Title icon 2</label>
                      <input type="file" id="fileinput2" name="titleicon2" accept="image/png, image/jpeg, image/jpg"" class="form-control file-input" >
                      <div id="messageId2" class="text-danger"></div>
                      <span class="text-danger">(NOTE:IMAGE-TYPE:PNG:JPG,JPEG,SIZE:256KB,DIMENSIONS-20X20-100X100)</span>
                      <a href="{{asset('assets/dynamics/slider/'.$about->titleicon2)}}"><img src="{{asset('assets/dynamics/slider/'.$about->titleicon2)}}" style="width:30px;height:30px;" class="bg-dark"></a>
                      <div id="messageId2" class="text-danger"></div>
                      @error('titleicon2')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror 
                  </div>
                   </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a2">Title 2</label>
                      <input type="text" class="form-control "  name="title2" placeholder="Enter title 2 " value="{{$about->title2}}">
                      @error('title2')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror 
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a2">Our Vision</label>
                    <textarea type="text" class="form-control "  name="our_vision" placeholder="Enter Vision ">{{$about->our_vision}}</textarea>
                    @error('our_vision')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
                </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a2">Our Mission</label>
                    <textarea type="text" class="form-control "  name="our_mission" placeholder="Enter Mission ">{{$about->our_mission}}</textarea>
                    @error('our_mission')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
                </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-6">
                    <div class="mb-3">
                      <label class="form-label" for="a6">About Image</label>
                      <input type="file" id="fileInput3" name="aboutimage" accept="image/png, image/jpeg, image/jpg"" class="form-control file-input" >
                      <span class="text-danger">(NOTE:IMAGE-TYPE:PNG:JPG,JPEG,SIZE:1MB,DIMENSIONS-400X500-800X1200)</span><br>
                      <a href="{{asset('assets/dynamics/slider/'.$about->aboutimage)}}"><img src="{{asset('assets/dynamics/slider/'.$about->aboutimage)}}" style="width:100px;height:100px;"></a>
                      <div id="messageId3" class="text-danger"></div>
                      @error('aboutimage')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror 
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a2">Description</label>
                    <textarea type="text" class="form-control ckeditor"  name="description" placeholder="Enter description ">{{$about->description}}</textarea>
                    @error('description')
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
    <style>
        #preview {
            margin-top: 20px;
        }
        #preview img {
            width: 200px;
            height: 100px;
        }
        
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    @endsection