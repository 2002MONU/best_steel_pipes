@extends('website.layouts.app')
@section('maintitle') Contact @endsection
@section('mainwebsite')
<main>
   <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('website/dynamics/other/'.$site_details->contact_banner)}}">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb-content">
                  <h2 class="title">Contact</h2>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">contact</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- contact-area -->
   <section class="multi-contact">
      <div class="container">
         <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-10">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  @foreach ($contactdetails as $index => $branch)
                  <li class="nav-item" role="presentation">
                     <button class="nav-link btn @if($index == 0) active @endif" id="pills-{{ $branch->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $branch->id }}" type="button" role="tab" aria-controls="pills-{{ $branch->id }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $branch->branch_name }}</button>
                  </li>
                  @endforeach
               </ul>
               <div class="tab-content" id="pills-tabContent">
                  @foreach ($contactdetails as $index => $branch)
                  @php
                  $detail = $details->firstWhere('branch_id', $branch->id);
                  @endphp
                  <div class="tab-pane fade @if($index == 0) show active @endif" id="pills-{{ $branch->id }}" role="tabpanel" aria-labelledby="pills-{{ $branch->id }}-tab">
                     @if ($detail)
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="cont-call d-flex">
                              <div class="call-phone"><i class="fas fa-phone-alt"></i></div>
                              <div class="cont-text">
                                 <h4>Call Now</h4>
                                 <p>{{ $detail->phone_no_1 }}</p>
                                 <p>{{ $detail->phone_no_2 }}</p>
                              </div>
                           </div>
                           <div class="cont-call d-flex mt-4">
                              <div class="call-phone"><i class="fas fa-envelope"></i></div>
                              <div class="cont-text">
                                 <h4>Mail</h4>
                                 <p>{{ $detail->email_01 }}</p>
                                 <p>{{ $detail->email_02 }}</p>
                              </div>
                           </div>
                           <div class="cont-call d-flex mt-4">
                              <div class="call-phone"><i class="fas fa-map-pin"></i></div>
                              <div class="cont-text">
                                 <h4>Our Location</h4>
                                 <p>{!! $detail->address !!}</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-8">
                           <iframe src="{{ $detail->map_link }}" width="100%" height="520" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                     </div>
                     @else
                     <div>No address available</div>
                     @endif
                  </div>
                  @endforeach
               </div>
               <script>
                  // Function to activate the tab based on the URL parameter
                  document.addEventListener('DOMContentLoaded', function() {
                      const urlParams = new URLSearchParams(window.location.search);
                      const branchId = urlParams.get('branch_id');
                  
                      if (branchId) {
                          const tab = document.querySelector(`#pills-${branchId}-tab`);
                          if (tab) {
                              new bootstrap.Tab(tab).show();
                          }
                      }
                  });
               </script>
            </div>
         </div>
      </div>
     
   </section>
   <!-- contact-area-end -->
</main>
@endsection