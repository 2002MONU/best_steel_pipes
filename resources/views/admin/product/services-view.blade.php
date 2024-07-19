@extends('admin.layout.main')
@section('title') Common Applications @endsection
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
            Common Applications
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
                <h5 class="card-title">Common Applications </h5>
                <a href="{{route('productservices.create')}}" class="btn btn-primary ms-auto">Add Common Applications</a>
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                  @foreach($categories as $categoryGroup)
                      @foreach($categoryGroup as $category)
                          <tr>
                             <td>{{ $counter++  }}</td>
                              <td>{{ $category->productcategory }}</td>
                              <td>{{ $category->productsubcategory }}</td>
                              <td>{{ $category->title }}</td>
                              <td></td>
                              
                              <td>
                                  @if(!empty($category->image))
                                      <a href="{{ asset('assets/dynamics/product/' . $category->image) }}">
                                          <img src="{{ asset('assets/dynamics/product/' . $category->image) }}" style="width:30px;height:30px;" >
                                      </a>
                                  @else
                                      No image found
                                  @endif
                              </td>
                              <td>@if ($category->status == 1)
                                <span class=" badge border border-success text-success">active</span> 
                                 @else
                                  <span class="badge border border-danger text-danger">Inactive</span>
                                 @endif</td>
                              <td>{{ $category->updated_at }}</td>
                             
                              <td>
                                <div class="d-inline-flex gap-1">
                                  <a href="{{ route('productservices.edit', ['productservice' => $category->service_id]) }}" class="btn btn-outline-success btn-sm">
                                      <i class="ri-edit-box-line"></i>
                                  </a>
                                  <form id="delete-productservice-{{ $category->service_id }}" action="{{ route('productservices.destroy', ['productservice' => $category->service_id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                        
                                <!-- Delete Button -->
                                <a href="{{ route('productservices.destroy', ['productservice' => $category->service_id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-productservice-{{ $category->service_id }}').submit(); }">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                              </div>
                              </td>
                             
                          </tr>
                      @endforeach
                  @endforeach
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