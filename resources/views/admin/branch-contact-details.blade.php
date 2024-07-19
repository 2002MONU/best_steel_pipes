@extends('admin.layout.main')
@section('title')  Branch Contact Details @endsection
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
          Branch Contact Details
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
                <h5 class="card-title"> Branch Contact Details  </h5>
                <a href="{{route('contactdetails.create')}}" class="btn btn-primary ms-auto">Add Branch details</a>
              </div>
            <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Branch Name</th>
                    <th>Contact</th>
                    <th>Mail</th> 
                    <th>Address</th>
                    <th>Status</th> 
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($details as $detail)
                  <tr>
                    <td>{{$detail->id}}</td>
                    <td>{{$detail->branch_name}}</td>
                    <td>{{$detail->phone_no_1}}<br>
                      {{$detail->phone_no_2}}
                    </td>
                    <td>{{$detail->email_01}}<br>
                      {{$detail->email_02}}
                    </td>
                    <td>{!! $detail->address !!}</td>
                   
                    <td>@if ($detail->status == 1)
                      <span class=" badge border border-success text-success">active</span> 
                       @else
                        <span class="badge border border-danger text-danger">Inactive</span>
                       @endif</td>
                    <td>{{ $detail->updated_at }}</td>
                    
                   
                    <td>
                      <div class="d-inline-flex gap-1">
                         <a href="{{route('contactdetails.edit', ['contactdetail' => $detail->id])}}" class="btn btn-outline-success btn-sm">
                          <i class="ri-edit-box-line"></i>
                        </a>
                      </div>
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