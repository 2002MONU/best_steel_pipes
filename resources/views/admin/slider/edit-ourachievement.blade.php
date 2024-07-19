@extends('admin.layout.main')
@section('title')   Edit  Achievement  @endsection
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
            Edit  Achievement
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
              <h5 class="card-title">Edit  Achievement</h5>
            </div>
            <div class="card-body">
            <form action="{{route('ourachievements.update',['ourachievement' => $our_achievement->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a1">Project Complete</label>
                    <input type="text" class="form-control" name="project_complete" value="{{$our_achievement->project_complete}}">
                    @error('project_complete')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                </div>
                 <div class="col-xxl-6 col-lg-6 col-sm-6">
                  <div class="mb-3">
                    <label class="form-label" for="a6">Project Complete Icon</label>
                    <input type="file"  name="project_icon1" accept="image/png, image/jpeg, image/jpg" class="form-control " >
                    <span class="text-danger">(NOTE:IMAGE-TYPE:PNG:JPG,JPEG,SIZE:256KB)</span>
                  <br>  <a href="{{asset('website/dynamics/slider/'.$our_achievement->project_icon1)}}"><img src="{{asset('website/dynamics/slider/'.$our_achievement->project_icon1)}}" class="bg-dark" style="width:50px;height:50px;"></a>
                    @error('image')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
                </div>
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Satisfied Clients</label>
                      <input type="text" class="form-control" name="satisfied_client" value="{{$our_achievement->satisfied_client}}">
                      @error('satisfied_client')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-6">
                    <div class="mb-3">
                      <label class="form-label" for="a6">Satisfied Clients Icon</label>
                      <input type="file"  name="satisfied_icon2" accept="image/png, image/jpeg, image/jpg" class="form-control " >
                      <span class="text-danger">(NOTE:IMAGE-TYPE:PNG:JPG,JPEG,SIZE:256KB)</span>
                    <br>  <a href="{{asset('website/dynamics/slider/'.$our_achievement->satisfied_icon2)}}"><img src="{{asset('website/dynamics/slider/'.$our_achievement->satisfied_icon2)}}" class="bg-dark" style="width:50px;height:50px;"></a>

                      @error('image')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror 
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Experienced Staff</label>
                      <input type="text" class="form-control" name="experienced_staff" value="{{$our_achievement->experienced_staff}}">
                      @error('experienced_staff')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-6">
                    <div class="mb-3">
                      <label class="form-label" for="a6">Experienced Staff Icon</label>
                      <input type="file"  name="experienced_icon3" accept="image/png, image/jpeg, image/jpg" class="form-control " >
                      <span class="text-danger">(NOTE:IMAGE-TYPE:PNG:JPG,JPEG,SIZE:256KB)</span>
                    <br>  <a href="{{asset('website/dynamics/slider/'.$our_achievement->experienced_icon3)}}"><img src="{{asset('website/dynamics/slider/'.$our_achievement->experienced_icon3)}}" class="bg-dark" style="width:50px;height:50px;"></a>

                      @error('image')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror 
                  </div>
                  </div>
                  <div class="col-xxl-6 col-lg-6 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label" for="a1">Awards Win</label>
                      <input type="text" class="form-control" name="award_win" value="{{$our_achievement->award_win}}">
                      @error('award_win')
                      <div class="error text-danger">{{ $message }}</div>
                      @enderror  
                  </div>
                  </div>
                   <div class="col-xxl-6 col-lg-6 col-sm-6">
                    <div class="mb-3">
                      <label class="form-label" for="a6">Awards Win</label>
                      <input type="file"  name="award_icon4" accept="image/png, image/jpeg, image/jpg" class="form-control " >
                      <span class="text-danger">(NOTE:IMAGE-TYPE:PNG:JPG,JPEG,SIZE:256KB)</span>
                     <br> <a href="{{asset('website/dynamics/slider/'.$our_achievement->award_icon4)}}"><img src="{{asset('website/dynamics/slider/'.$our_achievement->award_icon4)}}" class="bg-dark" style="width:50px;height:50px;"></a>

                      @error('image')
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
    <style>
        #preview {
            margin-top: 20px;
        }
        #preview img {
            width: 200px;
            height: 100px;
        }
        
    </style>
    
    @endsection