
<!DOCTYPE html>
<html lang="en">

  
<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2024 12:45:40 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manvi Industry | Login</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Manvi Industry">
    <meta property="og:description" content="Manvi Industry">
    <meta property="og:type" content="Manvi Industry">
    <link rel="shortcut icon" href="{{asset('assets/images/fav.png')}}">

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="{{asset('dash_assets/fonts/remix/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('dash_assets/css/main.min.css')}}">

  </head>

  <body class="login-bg">

    <!-- Container starts -->
    <div class="container">

      <!-- Auth wrapper starts -->
      <div class="auth-wrapper">
        <script>
            window.onload = function() {
               @if (session('success'))
                    alert("{{ session('success') }}");
                @endif
    
                @if (session('error'))
                    alert("{{ session('error') }}");
                @endif
            }
        </script>
        <!-- Form starts -->
        <form action="{{route('admin.loginPost')}}" method="POST">
             @csrf
          <div class="auth-box">
            <a href="#" class="auth-logo mb-4">
              <img src="{{asset('assets/images/logo.png')}}" alt="Login Logo">
            </a>

            <h4 class="mb-4">Admin Login</h4>

            <div class="mb-3">
              <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
              <input type="text" id="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter your email">
              @if ($errors->has('email'))
              <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('email') }}.</strong>
              </span>
               @endif
            </div>

            <div class="mb-2">
              <label class="form-label" for="pwd">Your password <span class="text-danger">*</span></label>
              
                <input type="password" id="pwd" class="form-control" name="password" placeholder="Enter password">
                @if ($errors->has('password'))
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('password') }}.</strong>
                </span>
                 @endif
              
            </div>
                <div class="mb-3 d-grid gap-2">
              <button type="submit" class="btn btn-primary">Login</button>
              
            </div>

          </div>

        </form>
        <!-- Form ends -->

      </div>
      <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->

  </body>


</html>