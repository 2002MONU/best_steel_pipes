@extends('admin.layout.main')
@section('title') Get in touch @endsection
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
          Get in touch 
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
                <h5 class="card-title">Get In Touch  </h5>
                {{-- <a href="{{route('contactdetails.create')}}" class="btn btn-primary ms-auto">Add Branch details</a> --}}
              </div>
            <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Phone No</th>
                    <th>Alter Phone No</th>
                    <th>Email</th>
                    <th>Alter Email</th> 
                    <th>Whatapps</th>
                    <th>Call no</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <td>{{$getin->id}}</td>
                    <td>{{$getin->phone_01}}</td>
                    <td>{{$getin->phone_02}}</td>
                    <td>{{$getin->email_01}}</td>
                    <td>{{$getin->email_02}}</td>
                    <td>{{$getin->call_no}}</td>
                    <td>{{$getin->whatsapp}}</td>
                    <td>
                      <div class="d-inline-flex gap-1">
                         <a href="{{route('getintouchs.edit', ['getintouch' => $getin->id])}}" class="btn btn-outline-success btn-sm">
                          <i class="ri-edit-box-line"></i>
                        </a>
                      </div>
                    </td>
                    </tr>
                 
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