@extends('website.layouts.app')
@section('maintitle') 
@if($pro_categories)
{{$pro_categories->productcategory}} 
@else
No Records Found
@endif
@endsection
@section('mainwebsite')
<main>
   <!-- breadcrumb-area -->
   <section class="breadcrumb-area breadcrumb-bg" 
      data-background="{{asset('website/dynamics/other/'.$site_details->category_banner)}}">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb-content">
                  <h2 class="title">
                     @if($pro_categories)
                     {{$pro_categories->productcategory}}
                     @else
                     No Records Found
                     @endif
                  </h2>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                           @if($pro_categories)
                           {{$pro_categories->title}}
                           @else
                           No Records Found
                           @endif
                        </li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb-area-end -->
   <!-- services-details-area -->
   @if($pro_categories)
   <section class="services-details-area pt-5 pb-5">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-xl-8">
               <div class="services-details-wrap">
                  <div class="gallery">
                     @if(!empty($pro_categories->images))
                     @foreach(json_decode($pro_categories->images) as $imagePath)
                     <img src="{{ asset('assets/dynamics/product/' . $imagePath) }}" />
                     @endforeach
                     @else
                     <div>No images found.</div>
                     @endif
                  </div>
                  <div class="services-details-content mt-2">
                     <div class="geta-quote">
                        <div class="pricing-section">
                           <h3><span>Approx Price:  </span> ₹ {{$pro_categories->price}} {{$pro_categories->unit}}</h3>
                        </div>
                        <div class="quoteup">
                           <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Get a Quote</a>
                        </div>
                     </div>
                     <div class="product-head mt-3">
                        <h4>{{$pro_categories->title}}</h4>
                        {!! $pro_categories->description !!}
                     </div>
                     <table class="table table-hover table-border mt-4" style="border:1px solid #eaeaea">
                        <tbody>
                           @foreach($product_categories_type as $type)
                           <tr>
                              <td>{{$type->heading}}</td>
                              <td>{{$type->value}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <div class="services-process-wrap">
                        <div class="row justify-content-center">
                           <div class="col-lg-12">
                              <div class="services-process-content">
                                 <h2 class="title">Following are some of the common applications of these products:</h2>
                                 <div class="row">
                                    @foreach($product_categories as $category)
                                    <div class="col-lg-6">
                                       <ul class="list-wrap">
                                          <li>
                                             <div class="services-process-item">
                                                <div class="icon">
                                                   <img src="{{ asset('assets/dynamics/product/'.$category->service_image) }}" alt="{{ $category->service_title }}">
                                                </div>
                                                <div class="content">
                                                   <h4 class="title">{{ $category->service_title }}</h4>
                                                   <p>{{ $category->service_description }}</p>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="service-benefits-wrap">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="benefits-content">
                                 <h2 class="title">Our Service Benefits</h2>
                                 {!! $pro_categories->services !!}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-6">
               <aside class="services-sidebar">
                  <div class="services-widget">
                     <h4 class="widget-title">Our Products</h4>
                     <div class="our-services-list">
                        @foreach ($categories as $key => $categoryGroup)
                        <ul class="list-wrap">
                           @if (count($categoryGroup->sub_category) > 0)
                           @foreach($categoryGroup->sub_category as $val)
                           <li>
                              <a href="{{ route('home.product-sub-details', $val->sub_slug) }}">{{ $val->productsubcategory }}<i class="fas fa-arrow-right"></i></a>
                           </li>
                           @endforeach
                           @else
                           <li>
                              <a href="{{ route('home.product-details', $categoryGroup->slug) }}">{{ $categoryGroup->productcategory }}<i class="fas fa-arrow-right"></i></a>
                           </li>
                           @endif
                        </ul>
                        @endforeach
                     </div>
                  </div>
               </aside>
            </div>
         </div>
      </div>
   </section>
   @else
   <div class="container pt-5 pb-5">
      <h2>No Records Found</h2>
   </div>
   @endif
   <!-- services-details-area-end -->
</main>
<style>
   .our-services-list {
   padding: 20px;
   background-color: #f9f9f9;
   }
   .list-wrap {
   list-style: none;
   padding: 0;
   margin: 0 0 20px 0;
   }
   .list-wrap li {
   margin: 10px 0;
   }
   .list-wrap a {
   text-decoration: none;
   color: #333;
   display: flex;
   justify-content: space-between;
   align-items: center;
   }
   .list-wrap a:hover {
   color: #007bff;
   }
   .list-wrap i {
   margin-left: 10px;
   }
</style>
@endsection