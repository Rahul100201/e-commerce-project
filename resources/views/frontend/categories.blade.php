@extends('frontend.master')
@section('content')
<section class="page-title-area">
   <div class="container">
      <div class="page-title-content">
         <h1>Categories</h1>
         <ul>
            <li><a href="#">Home</a></li>
            <li>Categories</li>
         </ul>
      </div>
   </div>
</section>
<section class="categories-area pt-70 pb-40">
   <div class="container">
      <div class="section-title">
         <h2>Categories</h2>
      </div>
      <div class="row">
          @foreach ($cat as $c)
        <div class="col-lg-2 col-sm-4 col-md-4">
            <div class="single-categories-box">
               <img src="{{url('upload/category/'.$c->image)}}" style="height: 150px; " alt="image">
               <h3>{{ $c->name }}</h3>
               <a href="{{ url('view_categories/'.$c->id) }}" class="link-btn"></a>
            </div>
         </div>
          @endforeach

      </div>
   </div>
</section>
{{-- <section class="banner-categories-area pb-40">
   <div class="container">
      <div class="section-title">
         <h2>Categories</h2>
      </div>
      <div class="row">
         <div class="col-lg-6 col-md-6">
            <div class="single-banner-categories-box">
               <img src="assets/img/banner-categories/banner-categories-img1.jpg" alt="image">
               <div class="content">
                  <span class="sub-title">Temperature</span>
                  <h3><a href="#">Ear Thermometers</a></h3>
                  <div class="btn-box">
                     <div class="d-flex align-items-center">
                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                        <span class="price">$49.00</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="single-banner-categories-box">
               <img src="assets/img/banner-categories/banner-categories-img2.jpg" alt="image">
               <div class="content">
                  <span class="sub-title">Personal</span>
                  <h3><a href="#">Favorite Collection</a></h3>
                  <div class="btn-box">
                     <div class="d-flex align-items-center">
                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                        <span class="price">$69.00</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="single-banner-categories-box">
               <img src="assets/img/banner-categories/banner-categories-img3.jpg" alt="image">
               <div class="content">
                  <span class="sub-title">Your Equipment</span>
                  <h3><a href="#">Must Haves</a></h3>
                  <div class="btn-box">
                     <div class="d-flex align-items-center">
                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                        <span class="price">$29.00</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="single-banner-categories-box">
               <img src="assets/img/banner-categories/banner-categories-img4.jpg" alt="image">
               <div class="content">
                  <span class="sub-title">Take 20% OFF</span>
                  <h3><a href="#">Need Now!</a></h3>
                  <div class="btn-box">
                     <div class="d-flex align-items-center">
                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                        <span class="price">$55.00</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> --}}
<section class="products-promotions-area pb-40">
   <div class="container">
      <div class="section-title">
         <h2>Sale </h2>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-6">
            <div class="single-products-promotions-box">
               <img src="{{ url('upload/static_product/p2.jpeg') }}" style="width:27%;" alt="image">
               <div class="content">
                  <span class="sub-title">Special Deal</span>
                  <h3>Mega Sale On Iphone</h3>
                  <span class="discount"><span>up to</span> 10% OFF</span>

               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="single-products-promotions-box">
               <img src="{{ url('upload/static_product/p8.jpeg') }}" style="width:45%;" alt="image">
               <div class="content">
                  <span class="sub-title">New Arrivals</span>
                  <h3>Watches</h3>
                  <span class="discount"><span>up to</span> 10% OFF</span>
                  {{-- <a href="#" class="link-btn">Shop Now <i class="flaticon-next"></i></a> --}}
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
            <div class="single-products-promotions-box">
               <img src="{{ url('upload/static_product/lap.jpg') }}" style="width:63%;" alt="image">
               <div class="content">
                  <span class="sub-title">Hot Collection</span>
                  <h3>Laptops</h3>
                  <span class="discount"><span>up to</span> 10% OFF</span>
                  {{-- <a href="#" class="link-btn">Shop Now <i class="flaticon-next"></i></a> --}}
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- <section class="categories-banner-area pb-40">
   <div class="container">
      <div class="section-title">
         <h2>Categories Style 04</h2>
      </div>
      <div class="row">
         <div class="col-lg-6 col-md-12">
            <div class="categories-box">
               <img src="assets/img/banner-categories/banner-categories-img5.jpg" alt="image">
               <div class="content">
                  <h3>Drugs Collection!</h3>
               </div>
               <a href="#" class="link-btn"></a>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="categories-box">
                     <img src="assets/img/banner-categories/banner-categories-img6.jpg" alt="image">
                     <div class="content">
                        <h3>Trending Collections!</h3>
                     </div>
                     <a href="#" class="link-btn"></a>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="categories-box">
                     <img src="assets/img/banner-categories/banner-categories-img7.jpg" alt="image">
                     <div class="content">
                        <h3>Sanitizer!</h3>
                     </div>
                     <a href="#" class="link-btn"></a>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="categories-box">
                     <img src="assets/img/banner-categories/banner-categories-img8.jpg" alt="image">
                     <div class="content">
                        <h3>Hot Products!</h3>
                     </div>
                     <a href="#" class="link-btn"></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> --}}
<section class="facility-area bg-f7f8fa pt-70 pb-40">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-sm-6 col-md-3 col-6">
            <div class="single-facility-box">
               <div class="icon">
                  <i class="flaticon-free-shipping"></i>
               </div>
               <h3>Free Shipping</h3>
               <p>Free shipping world wide</p>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6 col-md-3 col-6">
            <div class="single-facility-box">
               <div class="icon">
                  <i class="flaticon-headset"></i>
               </div>
               <h3>Support 24/7</h3>
               <p>Contact us 24 hours a day</p>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6 col-md-3 col-6">
            <div class="single-facility-box">
               <div class="icon">
                  <i class="flaticon-secure-payment"></i>
               </div>
               <h3>Secure Payments</h3>
               <p>100% payment protection</p>
            </div>
         </div>
         <div class="col-lg-3 col-sm-6 col-md-3 col-6">
            <div class="single-facility-box">
               <div class="icon">
                  <i class="flaticon-return-box"></i>
               </div>
               <h3>Easy Return</h3>
               <p>Simple returns policy</p>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
