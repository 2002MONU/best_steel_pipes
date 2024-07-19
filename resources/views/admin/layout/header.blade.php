@php 
$site_details = \App\Models\Site_setting::find(1);
$seo_details = \App\Models\SeoSetting::first();
@endphp

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{$site_details->title}}  </title>

    <!-- Meta -->
    <meta name="description" content="{{$seo_details->description}}">
    <meta name="keywords" content="{{$seo_details->keywords}}">
    <meta property="og:title" content="{{$seo_details->title}}">
    <meta property="og:description" content="{{$seo_details->description}}">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="{{asset('website/dynamics/other/'.$site_details->favicon)}}">
    <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/dataTables.bs5.css')}}">
    <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/dataTables.bs5-custom.css')}}">
    <link rel="stylesheet" href="{{asset('dash_assets/vendor/datatables/buttons/dataTables.bs5-custom.css')}}">
    <!-- *************
		************ CSS Files *************
	************* -->
    <link rel="stylesheet" href="{{asset('dash_assets/fonts/remix/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('dash_assets/css/main.min.css')}}">

    <!-- *************
		************ Vendor Css Files *************
	************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{asset('dash_assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}">
  </head>

  <body>

    <!-- Loading starts -->
    <div id="loading-wrapper">
      <div class='spin-wrapper'>
        <div class='spin'>
          <div class='inner'></div>
        </div>
        <div class='spin'>
          <div class='inner'></div>
        </div>
        <div class='spin'>
          <div class='inner'></div>
        </div>
        <div class='spin'>
          <div class='inner'></div>
        </div>
        <div class='spin'>
          <div class='inner'></div>
        </div>
        <div class='spin'>
          <div class='inner'></div>
        </div>
      </div>
    </div>
    <!-- Loading ends -->

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

      <!-- App header starts -->
      <div class="app-header d-flex align-items-center">

        <!-- Toggle buttons starts -->
        <div class="d-flex">
          <button class="toggle-sidebar">
            <i class="ri-menu-line"></i>
          </button>
          <button class="pin-sidebar">
            <i class="ri-menu-line"></i>
          </button>
        </div>
        <!-- Toggle buttons ends -->

        <!-- App brand starts -->
        <div class="app-brand ms-3">
          <a href="{{route('admin.dashboard')}}" class="d-lg-block d-none">
            <img src="{{asset('website/dynamics/other/'.$site_details->logo)}}" class="logo" alt="manvi industry">
          </a>
          <a href="{{route('admin.dashboard')}}" class="d-lg-none d-md-block">
            <img src="{{asset('website/dynamics/other/'.$site_details->logo)}}" class="logo" alt="manvi industry">
          </a>
        </div>
        <!-- App brand ends -->

        <!-- App header actions starts -->
        <div class="header-actions">

          <!-- Search container starts -->
          {{-- <div class="search-container d-lg-block d-none mx-3">
            <input type="text" class="form-control" id="searchId" placeholder="Search">
            <i class="ri-search-line"></i>
          </div> --}}
          <!-- Search container ends -->

          

          <!-- Header user settings starts -->
          <div class="dropdown ms-2">
            <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <div class="avatar-box">Admin<span class="status busy"></span></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
              <div class="px-3 py-2">
                <span class="small">Admin</span>
                {{-- <h6 class="m-0">James Bruton</h6> --}}
              </div>
              <div class="mx-2 my-2 d-grid">
                <a href="{{route('admin.change-password')}}" class="btn btn-danger">Change-password</a>
              </div>
              <div class="mx-3 my-2 d-grid">
                <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
              </div>
            </div>
          </div>
          <!-- Header user settings ends -->

        </div>
        <!-- App header actions ends -->

      </div>
      <!-- App header ends -->

      <!-- Main container starts -->
      <div class="main-container">

        <!-- Sidebar wrapper starts -->
        <nav id="sidebar" class="sidebar-wrapper">

          <!-- Sidebar profile starts -->
          <div class="sidebar-profile">
            <img src="{{asset('dash_assets/images/patient1.png')}}" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
            <div class="m-0">
              <h5 class="mb-1 profile-name text-nowrap text-truncate">Admin</h5>
            </div>
          </div>
          <!-- Sidebar profile ends -->

          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
              <li class="  {{ request()->routeIs('admin.dashboard') ? 'current-page' : '' }}">
                <a href="{{route('admin.dashboard')}}">
                  <i class="ri-home-6-line"></i>
                  <span class="menu-text"> Dashboard</span>
                </a>
              </li>
              
              <li class="treeview {{ request()->routeIs('sliders.*','aboutpages.*','brands.*','testinomials.*','ourachievements.*') ? 'current-page' : '' }}">
                <a href="#!">
                  <i class="ri-home-5-line"></i>
                  <span class="menu-text">Home</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="{{route('sliders.index')}}">Slider Details</a>
                  </li>
                  <li>
                    <a href="{{route('aboutpages.index')}}">About Details</a>
                  </li>
                  <li>
                    <a href="{{route('brands.index')}}">Brands Details</a>
                  </li>
                  <li>
                    <a href="{{route('testinomials.index')}}">Testimonial Details</a>
                  </li>
                  <li>
                    <a href="{{route('ourachievements.index')}}">Our Achievement</a>
                  </li>
                  </ul>
              </li>
              <li class="{{ request()->routeIs('galleries.*') ? 'current-page' : '' }}">
                <a href="{{route('galleries.index')}}">
                  <i class="ri-gallery-fill "></i>
                  <span class="menu-text">Gallery Details</span>
                </a>
              </li>
              <li class="{{ request()->routeIs('videos.*') ? 'current-page' : '' }}">
                <a href="{{route('videos.index')}}">
                  <i class="ri-tv-2-line "></i>
                  <span class="menu-text">Video Details</span>
                </a>
              </li>
              <li class="treeview {{ request()->routeIs('productcategories.*','productsubcategories.*','productimages.*','productservices.*') ? 'current-page' : '' }}">
                <a href="#!">
                  <i class="ri-nurse-line"></i>
                  <span class="menu-text">Product</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="{{ route('productcategories.index') }}">Product category </a>
                  </li>
                  <li>
                    <a href="{{ route('productsubcategories.index') }}">Sub-category  details</a>
                  </li>
<!--                  <li>
                    <a href="{{ route('productimages.index')}}">Product Other details  </a>
                  </li>-->
<!--                  <li>
                    <a href="{{ route('productservices.index')}}">Common Applications details </a>
                  </li>-->
                 
                </ul>
              </li>
              <li class="treeview {{ request()->routeIs('contacts.*','contactdetails.*') ? 'current-page' : '' }}">
                <a href="#!">
                  <i class="ri-contacts-book-3-line "></i>
                  <span class="menu-text">Branch Contact Details</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="{{route('contacts.index')}}"> Branch</a>
                  </li>
                  <li>
                    <a href="{{ route('contactdetails.index') }}">Branch Contact Details</a>
                </li>
                
                </ul>
              </li>
              
              <li class="{{ request()->routeIs('sitesettings.*') ? 'current-page' : '' }}">
                <a href="{{route('sitesettings.index')}}">
                  <i class="ri-seo-line"></i>
                  <span class="menu-text">Site Setting</span>
                 </a>
              </li>
              <li class="{{ request()->routeIs('seosettings.*') ? 'current-page' : '' }}">
                <a href="{{route('seosettings.index')}}">
                  <i class="ri-seo-line"></i>
                  <span class="menu-text">SEO Setting</span>
                 </a>
              </li>
              <li class="{{ request()->routeIs('getintouchs.*') ? 'current-page' : '' }}">
                <a href="{{route('getintouchs.index')}}">
                  <i class="ri-user-received-fill"></i>
                  <span class="menu-text">Get In Touch</span>
                 </a>
              </li>
              <li class="{{ request()->routeIs('enquiry-details') ? 'current-page' : '' }}">
                <a href="{{route('enquiry-details')}}">
                  <i class="ri-edit-2-fill"></i>
                  <span class="menu-text">Enquiry Details</span>
                 </a>
              </li>
              <li class="{{ request()->routeIs('admin.change-password') ? 'current-page' : '' }}">
                <a href="{{route('admin.change-password')}}">
                  <i class="ri-settings-3-line"></i>
                  <span class="menu-text">Change Password</span>
                 </a>
              </li>
              <li class="{{ request()->routeIs('logout') ? 'current-page' : '' }}">
                <a href="{{route('logout')}}">
                  <i class="ri-arrow-left-circle-fill"></i>
                  <span class="menu-text">Logout</span>
                 </a>
              </li>
            </ul>
          </div>
          <!-- Sidebar menu ends -->
          
         

        </nav>
        <!-- Sidebar wrapper ends -->

        <div class="app-container">