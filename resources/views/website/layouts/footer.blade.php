@php
$categories = \App\Models\ProductCategory::where('status', 1)->get();
foreach ($categories as $value) {
$sub_categories = \App\Models\ProductSubCategory::where('productcategory_id', $value->id)
->where('status', 1)
->select('id', 'productsubcategory', 'sub_slug')
->where('productsubcategory', '!=', null)
->get();
if(count($sub_categories) > 0) {
$value->sub_categories = $sub_categories;
} else {
$value->sub_categories = [];
}
}
$contactdetails = \App\Models\BrachName::where('status', 1)->limit(6)->get();
$details = \App\Models\ContactDetails::where('status', 1)->get();
$site_details = \App\Models\Site_setting::find(1);
$contact_det = \App\Models\ContactDetails::limit(2)->get();
$contact_wattsapp = \App\Models\ContactDetails::first();

 $getin = \App\Models\TextDetail::find(1);
@endphp
<!-- footer-area -->


<footer>
   <div class="footer-area footer-bg" >
      <div class="footer-top">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-4 col-md-7">
                  <div class="footer-widget">
                     <img src="{{asset('website/dynamics/other/'.$site_details->logo)}}"  alt="footer-logo" class="mb-3">
                     <div class="footer-content">
                        <p>{{$site_details->footerabout}}</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                  <div class="footer-widget">
                     <h2 class="fw-title">Quick Links</h2>
                     <div class="footer-link">
                        <ul class="list-wrap">
                           <li><a href="{{route('home.index')}}"><i class="fas fa-angle-double-right"></i>Home</a></li>
                           <li><a href="{{route('home.abouts-us')}}"><i class="fas fa-angle-double-right"></i>About</a></li>
                           <li><a href="{{route('home.gallery')}}"><i class="fas fa-angle-double-right"></i>Gallery</a></li>
                           <li><a href="{{route('home.contact')}}"><i class="fas fa-angle-double-right"></i>Contact</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                  <div class="footer-widget">
                     <h2 class="fw-title">Products</h2>
                     <div class="footer-link">
                        @foreach ($categories as $key => $categoryGroup)
                        <ul class="list-wrap">
                           @if (count($categoryGroup->sub_categories) > 0)
                           @foreach($categoryGroup->sub_categories as $val)
                           <li>
                              <a href="{{ route('home.product-sub-details', $val->sub_slug) }}"><i class="fas fa-angle-double-right"></i>{{ $val->productsubcategory }}</a>
                           </li>
                           @endforeach
                           @else
                           <li>
                              <a href="{{ route('home.product-details', $categoryGroup->slug) }}"><i class="fas fa-angle-double-right"></i>{{ $categoryGroup->productcategory }}</a>
                           </li>
                           @endif
                        </ul>
                        @endforeach
                        {{-- 
                        <li><a href="#"><i class="fas fa-angle-double-right"></i>RCC Pipes</a></li>
                        <li><a href="#"><i class="fas fa-angle-double-right"></i>VRCC Pipes</a></li>
                        <li><a href="#"><i class="fas fa-angle-double-right"></i>Spun Pipes</a></li>
                        --}}
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-5 col-md-6">
                  <div class="footer-widget">
                     <h2 class="fw-title">Get In Touch</h2>
                     <div class="footer-link">
                        <ul class="list-wrap">
                           <li><a href="tel:{{$getin->phone_01}}"><i class="fas fa-phone-alt"></i>+91 {{$getin->phone_01}}</a></li>
                         <li><a href="tel:{{$getin->phone_02}}"><i class="fas fa-phone-alt"></i>+91 {{$getin->phone_02}}</a></li>
                          <li><a href="mailto:{{$getin->email_01}}"><i class="fas fa-envelope"></i> {{$getin->email_01}}</a></li>
                          <li><a href="mailto:{{$getin->email_02}}"><i class="fas fa-envelope"></i> {{$getin->email_02}}</a></li>
                           <li class="">
                              @foreach($contactdetails as $index => $detail)
                              
                                    <div class="">
                                       <a href="javascript:void(0);" onclick="showTabAndRedirect('{{ $detail->id }}', '{{ route('home.contact') }}')">
                                       <i class="fas fa-map-pin"></i>{{ $detail->branch_name }}
                                       </a>
                                    </div>
                             
                              @endforeach
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="footer-bottom">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="copyright-text">
                     <p>© Copyright <?php echo date("Y"); ?>. Manvi Infra All Right Reserved </p>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="footer-bootom-menu">
                     <ul class="list-wrap">
                        <li>Design by <a href="https://thecolourmoon.com/">Colourmoon</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- footer-area-end -->
<!---HOME SCREEN CONTACT BUTTONS-->
<ul class="leftTwoBtncontainer d-none d-md-block d-lg-block">
   <li><a href="https://api.whatsapp.com/send?phone=+91{{$getin->whatsapp}}&amp;text=Hi" class="whatsappICon"><i class="fab fa-whatsapp"></i></a></li>
   <li><a href="tel:+91{{$getin->whatsapp}}" class="PhoneappICon"><i class="fas fa-phone-alt"></i></a></li>
</ul>
<div class="fixwhcall d-lg-none">
   <a href="https://api.whatsapp.com/send?phone=+91{{$getin->call_no}}&amp;text=Hi" class="btn-mob-whtsapp" >
   <i class="fab fa-whatsapp"></i>whatsapp
   </a>
   <a href="tel:+91{{$getin->call_no}}" class="btn-mob-call">
   <i class="fas fa-phone-alt"></i>Phone
   </a>
</div>
<!-- JS here -->
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.odometer.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/slick-animation.min.js')}}"></script>
<script src="{{asset('assets/js/ajax-form.js')}}"></script>
<script src="{{asset('assets/js/jarallax.min.js')}}"></script>
<script src="{{asset('assets/js/parallax.min.js')}}"></script>
<script src="{{asset('assets/js/gsap.js')}}"></script>
<script src="{{asset('assets/js/ScrollTrigger.js')}}"></script>
<script src="{{asset('assets/js/SplitText.js')}}"></script>
<script src="{{asset('assets/js/gsap-animation.js')}}"></script>
<script src="{{asset('assets/js/tg-cursor.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>
<script>
   function showTabAndRedirect(id, route) {
       window.location.href = `${route}?branch_id=${id}`;
   }
</script>
<!--Image Magnific Popup Script---->
<script>
   $(document).ready(function(){
   $('.image-popup-vertical-fit').magnificPopup({
       type: 'image',
   mainClass: 'mfp-with-zoom', 
   gallery:{
               enabled:true
           },
   
   zoom: {
       enabled: true,
   
       duration: 300, // duration of the effect, in milliseconds
       easing: 'ease-in-out', // CSS transition easing function
   
       opener: function(openerElement) {
   
       return openerElement.is('img') ? openerElement : openerElement.find('img');
   }
   }
   
   });
   
   });
</script>
<!--Image Magnific Popup End--->
<!--GALLERY BOX SCRIPT--->
<script>// Fit inner div to gallery
   $('<div />', { 'class': 'inner'  }).appendTo('.gallery');
   
   // Create main image block and apply first img to it
   var imageSrc1 = $('.gallery').children('img').eq(0).attr('src');
   $('<div />', { 'class': 'main'  }).appendTo('.gallery .inner').css('background-image', 'url(' + imageSrc1 + ')');
   
   // Create image number label
   var noOfImages = $('.gallery').children('img').length;
   $('<span />').appendTo('.gallery .inner .main').html('Image 1 of ' + noOfImages);
   
   // Create thumb roll
   $('<div />', { 'class': 'thumb-roll'  }).appendTo('.gallery .inner');
   
   // Create thumbail block for each image inside thumb-roll
   $('.gallery').children('img').each( function() {
   var imageSrc = $(this).attr('src');
   $('<div />', { 'class': 'thumb'  }).appendTo('.gallery .inner .thumb-roll').css('background-image', 'url(' + imageSrc + ')');
   });
   
   // Make first thumbnail selected by default
   $('.thumb').eq(0).addClass('current');
   
   // Select thumbnail function
   $('.thumb').click(function() {
   
   // Make clicked thumbnail selected
   $('.thumb').removeClass('current');
   $(this).addClass('current');
   
   // Apply chosen image to main
   var imageSrc = $(this).css('background-image');
   $('.main').css('background-image', imageSrc);
   $('.main').addClass('main-selected');
   setTimeout(function() {
       $('.main').removeClass('main-selected');
   }, 500);
   
   // Change text to show current image number
   var imageIndex = $(this).index();
   $('.gallery .inner .main span').html('Image ' + (imageIndex + 1) + ' of ' + noOfImages);
   });
   
   // Arrow key control function
   $(document).keyup(function(e) {
   
   // If right arrow
   if (e.keyCode === 39) {
   
   // Mark current thumbnail
   var currentThumb = $('.thumb.current');
   var currentThumbIndex = currentThumb.index();
   if ( (currentThumbIndex+1) >= noOfImages) { // if on last image
       nextThumbIndex = 0; // ...loop back to first image
   } else {
       nextThumbIndex = currentThumbIndex+1;
   }
   var nextThumb = $('.thumb').eq(nextThumbIndex);
   currentThumb.removeClass('current');
   nextThumb.addClass('current');
   
   // Switch main image
   var imageSrc = nextThumb.css('background-image');
   $('.main').css('background-image', imageSrc);
   $('.main').addClass('main-selected');
   setTimeout(function() {
       $('.main').removeClass('main-selected');
   }, 500);
   
   // Change text to show current image number
   $('.gallery .inner .main span').html('Image ' + (nextThumbIndex+1) + ' of ' + noOfImages);
   
   }
   
   // If left arrow
   if (e.keyCode === 37) { 
   
   // Mark current thumbnail
   var currentThumb = $('.thumb.current');
   var currentThumbIndex = currentThumb.index();
   if ( currentThumbIndex == 0) { // if on first image
       prevThumbIndex = noOfImages-1; // ...loop back to last image
   } else {
       prevThumbIndex = currentThumbIndex-1;
   }
   var prevThumb = $('.thumb').eq(prevThumbIndex);
   currentThumb.removeClass('current');
   prevThumb.addClass('current');
   
   // Switch main image
   var imageSrc = prevThumb.css('background-image');
   $('.main').css('background-image', imageSrc);
   $('.main').addClass('main-selected');
   setTimeout(function() {
       $('.main').removeClass('main-selected');
   }, 500);
   
   // Change text to show current image number
   $('.gallery .inner .main span').html('Image ' + (prevThumbIndex+1) + ' of ' + noOfImages);
   
   }
   
   });
</script>
<!--GALLERY BOX END--->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Fill The Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('enquiry-post') }}" method="POST" id="registerForm">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" id="exampleInputName" required>
                            @error('full_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputMobileNo" class="form-label">Mobile Number</label>
                            <input type="text" name="mobile_no" class="form-control" id="phoneNumber" oninput="validatePhoneNumber()" required>
                           <span id="phoneError" class="text-danger"></span>
                            @error('mobile_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" required></textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div id="recaptcha" class="g-recaptcha mb-3" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
<!--                        <input type="hidden" name="g-recaptcha-response" id="recaptcha-token">-->
                        <button type="submit" class="subbmit"  onclick="onClick(event)">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function onClick(e) {
                //e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{config('services.recaptcha.site_key')}}', {action: 'submit'}).then(function(token) {
                        document.getElementById('registerForm').submit();
                    });
                });
            }
        </script>
<script>
    function validatePhoneNumber() {
    var phoneNumber = document.getElementById('phoneNumber').value;
    var phoneError = document.getElementById('phoneError');

    // Check if the input is a number
    if (isNaN(phoneNumber)) {
        phoneError.textContent = "Please enter numbers only.";
        return;
    }

    // Check if the input length is between 10 and 12
    if (phoneNumber.length < 10 || phoneNumber.length > 12) {
        phoneError.textContent = "Phone number should be between 10 and 12 digits.";
        return;
    }

    // If all conditions are met, clear any existing error message
    phoneError.textContent = "";
}

    </script>
</body>
</html>