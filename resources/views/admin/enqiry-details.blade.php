@extends('admin.layout.main')
@section('title') Enquiry @endsection
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
          Enquiry 
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
                <h5 class="card-title">Enquiry  </h5>
                {{-- <a href="{{route('contacts.create')}}" class="btn btn-primary ms-auto">Add Branch</a> --}}
              </div>
            <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Full name</th>
                    <th>Email</th> 
                    <th>Mobile No</th>
                    <th>Message</th>
                    <th>Created At</th>
                   <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($enqueries as $enquiry)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$enquiry->full_name}}</td>
                   <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->mobile_no }}</td>
                   <td>{{ $enquiry->message }}</td>
                   <td>{{ $enquiry->created_at }}</td>
                    <td>
                      <div class="d-inline-flex gap-1">
                         <a href="{{route('enquiry-delete',  $enquiry->id)}}" class="btn btn-outline-danger btn-sm">
                          <i class="ri-delete-bin-line"></i>
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