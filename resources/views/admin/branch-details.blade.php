@extends('admin.layout.main')
@section('title') Branch @endsection
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
          Branch 
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
                <h5 class="card-title">Branch  </h5>
                <a href="{{route('contacts.create')}}" class="btn btn-primary ms-auto">Add Branch</a>
              </div>
            <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    {{-- <th>Title</th>
                    <th>Description</th> --}}
                    <th>Branch Name</th>
                    {{-- <th>Sub Category</th>--}}
                   <th>Status</th> 
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                  <tr>
                    <td>{{$branch->id}}</td>
                    <td>{{$branch->branch_name}}</td>
                    <td>@if ($branch->status == 1)
                      <span class=" badge border border-success text-success">active</span> 
                       @else
                        <span class="badge border border-danger text-danger">Inactive</span>
                       @endif</td>
                    <td>{{ $branch->updated_at }}</td>
                    
                   
                    <td>
                      <div class="d-inline-flex gap-1">
                         <a href="{{route('contacts.edit', ['contact' => $branch->id])}}" class="btn btn-outline-success btn-sm">
                          <i class="ri-edit-box-line"></i>
                        </a>
                        
                    </td>
                    </tr>
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