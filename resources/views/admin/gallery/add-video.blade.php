@extends('admin.layout.main')
@section('title') Add Video  @endsection
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
         Add Video
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
              <h5 class="card-title">Add Video</h5>
            </div>
            <div class="card-body">
            <form action="{{route('videos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <!-- Row starts -->
              <div class="row gx-3">
                
                
                <div class="col-xxl-6 col-lg-6 col-sm-6">
                  <div class="mb-3">
                    <label class="form-label" for="a6">Video Link</label>
                    <input type="url" name="video"  class="form-control " >
                   @error('video')
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
            width: 150px;
            height: 100px;
        }
        
    </style>
    
    @endsection