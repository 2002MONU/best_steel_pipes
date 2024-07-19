@extends('admin.layout.main')
@section('title') Achievement Details @endsection
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
           Our Achievement 
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
                <h5 class="card-title">Our Achievement </h5>
                {{-- <a href="{{route('sliders.create')}}" class="btn btn-primary ms-auto">Add Slider</a> --}}
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Project Complete</th>
                    <th>Satisfied Clients</th>
                    <th>Experienced Staff</th>
                    <th>Awards Win</th>
                    <th>Created </th>
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                   
                  <tr>
                    <td>{{$achievements->id}}</td>
                    <td>{{$achievements->project_complete}}</td>
                    <td>{{$achievements->satisfied_client}}</td>
                    <td>{{$achievements->experienced_staff}}</td>
                    <td>{{$achievements->award_win}}</td>
                   <td>{{$achievements->created_at}}</td>
                    <td>{{$achievements->updated_at}}</td>
                    <td>
                      <div class="d-inline-flex gap-1">
                         <a href="{{route('ourachievements.edit',['ourachievement' => $achievements->id])}}" class="btn btn-outline-success btn-sm">
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