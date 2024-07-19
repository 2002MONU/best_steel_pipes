@extends('admin.layout.main')
@section('title') Edit Image  @endsection
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
         Edit Image
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
              <h5 class="card-title">Edit Product Image </h5>
            </div>
            <div class="card-body">
            <form action="{{route('productimages.update',['productimage' => $image->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Category </label>
                    <select name="category_id" class="form-control">
                        <option disabled selected>Select Category</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}" {{$item->id == $image->category_id ? 'selected' : ''}}>{{$item->productcategory}}</option>
                        @endforeach
                      </select>                  
                      @error('category_id')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Sub Category </label>
                     <select name="sub_category_id" class="form-control">
                      <option disabled selected>Select Category</option>
                      @foreach($sub_category as $itemsss)
                       <option value="{{ $itemsss->id }}" {{$itemsss->id == $image->sub_category_id ? 'selected' : ''}}>{{ $itemsss->productsubcategory }}</option>
                     @endforeach
                     </select>
                      @error('sub_category_id')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                 <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1"> heading</label>
                      <input type="text" class="form-control" name="heading"  value="{{$image->heading}}">
                      @error('heading')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1"> Value</label>
                      <input type="text" class="form-control" name="value" value="{{$image->value}}" >
                      @error('value')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a3">Status</label>
                      <select class="form-select" name="status" id="a3">
                        <option selected>Select</option>
                        <option value="1" {{ $image->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $image->status == '0' ? 'selected' : '' }}>Inactive</option>
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
   
    
    @endsection