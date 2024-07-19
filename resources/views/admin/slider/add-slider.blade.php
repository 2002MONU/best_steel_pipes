@extends('admin.layout.main')
@section('title')Add Slider  @endsection
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
         Add Slider
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
              <h5 class="card-title">Add Slider</h5>
            </div>
            <div class="card-body">
            <form action="{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                    @error('title')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a2">Description</label>
                    <textarea type="text" class="form-control ckeditor"  name="description" placeholder="Enter description "></textarea>
                    @error('description')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-6">
                  <div class="mb-3">
                    <label class="form-label" for="a6">Slider Image</label>
                    <input type="file" id="imageInput" name="image" accept="image/png, image/jpeg, image/jpg" class="form-control " >
                    <span class="text-danger">(NOTE:IMAGE-TYPE:PNG:JPG,JPEG,SIZE:1MB,DIMENSIONS-1100X700-2500X1200)</span>
                    @error('image')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
                  <div id="preview" class="text-danger">
                    <!-- Image preview will be displayed here -->
                  </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a3">Status</label>
                      <select class="form-select" name="status" id="a3">
                        <option selected>Select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                      @error('status')
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