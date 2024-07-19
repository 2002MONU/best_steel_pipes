@extends('admin.layout.main')
@section('title') Other Details @endsection
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
        Other Details 
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
                <h5 class="card-title">Other Details </h5>
                <a href="{{route('productimages.create')}}" class="btn btn-primary ms-auto">Add Other</a>
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
                    <th>Type </th>
                    <th>Value </th>
                    <th>Status</th>
                     <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($categories as $categoryId => $categoryItems) --}}
                      @foreach($categories as $category)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{$category->category_name}}</td>
                              <td>{{$category->subcategory_name}}</td>
                               <td>{{$category->heading}}</td>
                                <td>{{$category->value}}</td>
                              
                              <td>@if ($category->status == 1)
                                <span class=" badge border border-success text-success">active</span> 
                                 @else
                                  <span class="badge border border-danger text-danger">Inactive</span>
                                 @endif</td>
                              
                              <td>
                                <div class="d-inline-flex gap-1">
                                  <a href="{{ route('productimages.edit', ['productimage' => $category->id]) }}" class="btn btn-outline-success btn-sm">
                                      <i class="ri-edit-box-line"></i>
                                  </a>
                                  <form id="delete-productimage-{{ $category->id }}" action="{{ route('productimages.destroy', ['productimage' => $category->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                        
                                <!-- Delete Button -->
                                <a href="{{ route('productimages.destroy', ['productimage' => $category->id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-productimage-{{ $category->id }}').submit(); }">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                              </div>
                              </td>
                          </tr>
                      @endforeach
                  {{-- @endforeach --}}
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