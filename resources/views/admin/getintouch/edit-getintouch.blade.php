@extends('admin.layout.main')
@section('title')Edit Get in touch  @endsection
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
         Edit Get in touch
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
              <h5 class="card-title">Edit Get In Touch</h5>
            </div>
            <div class="card-body">
            <form action="{{route('getintouchs.update',['getintouch' => $getin->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Phone No </label>
                    <input type="number" class="form-control" name="phone_01" value="{{$getin->phone_01}}" placeholder="Enter phone_01">
                    @error('phone_01')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                 <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Alter Phone No </label>
                    <input type="number" class="form-control" name="phone_02" value="{{$getin->phone_02}}" placeholder="Enter phone_02">
                    @error('phone_02')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Email  </label>
                    <input type="email" class="form-control" name="email_01" value="{{$getin->email_01}}" placeholder="Enter email_01">
                    @error('email_01')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Alter Email  </label>
                    <input type="email" class="form-control" name="email_02" value="{{$getin->email_02}}" placeholder="Enter email_02">
                    @error('email_02')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Call No  </label>
                    <input type="number" class="form-control" name="call_no" value="{{$getin->call_no}}" placeholder="Enter call_no">
                    @error('call_no')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1"> What Apps </label>
                    <input type="number" class="form-control" name="whatsapp" value="{{$getin->whatsapp}}" placeholder="Enter whatsapp">
                    @error('whatsapp')
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