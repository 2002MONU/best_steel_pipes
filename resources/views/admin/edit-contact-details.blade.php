@extends('admin.layout.main')
@section('title')Edit Branch Contact  @endsection
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
         Edit Branch Contact
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
              <h5 class="card-title">Edit Branch Contact</h5>
            </div>
            <div class="card-body">
            <form action="{{route('contactdetails.update',['contactdetail' => $branch_details->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Branch Name</label>
                    <select name="branch_id" class="form-control">
                        <option value="">Select Branch Name</option>
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}" {{$branch->id == $branch_details->branch_id ? 'selected' : ''}}>{{$branch->branch_name}}</option>
                        @endforeach
                    </select>
                    @error('branch_id')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Contact </label>
                      <input type="number" name="phone_no_1" class="form-control" value="{{$branch_details->phone_no_1}}" placeholder="Enter Contact">
                      @error('phone_no_1')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Alter Contact </label>
                      <input type="number" name="phone_no_2" class="form-control" value="{{$branch_details->phone_no_2}}" placeholder="Enter Contact">
                      @error('phone_no_2')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Email</label>
                      <input type="email" name="email_01" class="form-control" value="{{$branch_details->email_01}}" placeholder="Enter Email">
                      @error('email_01')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Alter Email</label>
                      <input type="email" name="email_02" class="form-control" value="{{$branch_details->email_02}}" placeholder="Enter Email">
                      @error('email_02')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Address</label>
                      <textarea type="text" name="address" class="form-control ckeditor" placeholder="Enter Address">{{$branch_details->address}}</textarea>
                      @error('address')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Map Link</label>
                      <input type="url" name="map_link" class="form-control" value="{{$branch_details->map_link}}" placeholder="Enter Map Link">
                      @error('map_link')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a3">Status</label>
                      <select class="form-select" name="status" id="a3">
                        <option selected>Select</option>
                        <option value="1" {{ $branch_details->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $branch_details->status == '0' ? 'selected' : '' }}>Inactive</option>
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
   
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    @endsection