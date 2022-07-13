@extends('frontend.master')
@section('content')
<section class="page-title-area">
   <div class="container">
      <div class="page-title-content">
         <h1>Cart</h1>
         <ul>
            <li><a href="#">Home</a></li>
            <li>Cart</li>
         </ul>
      </div>
   </div>
</section>
<section class="cart-area ptb-70">
   <div class="container">
      <form>
         <div class="cart-table table-responsive">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th scope="col">Product</th>
                     <th scope="col">Name</th>
                     <th scope="col">Unit Price</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Total</th>
                  </tr>
               </thead>
               <tbody>
                   <?php
                   $totalamount=0;

                    ?>
                   @foreach ($cart as $c)
                  <tr>
                     <td class="product-thumbnail">
                        <a href="#">
                        <img src="{{ url('upload/product/'.$c->product_image) }}" alt="item">
                        </a>
                     </td>
                     <td class="product-name">
                        <a href="#">{{ $c->product_name }}</a>
                     </td>
                     <td class="product-price">
                        <span class="unit-amount">{{ $c->product_price }}</span>
                     </td>
                     <td class="product-quantity">
                        <div class="input-counter">
                           <span class="minus-btn"><i class='bx bx-minus'></i></span>
                           <input type="text" min="1"  value="{{$c->product_quantity }}">
                           <span class="plus-btn"><i class='bx bx-plus'></i></span>
                        </div>
                     </td>
                     <td class="product-subtotal">
                        <span class="subtotal-amount">{{$c->product_price*$c->product_quantity  }}</span>
                        <a href="{{ url('delete/'.$c->id) }}" class="remove"><i class='bx bx-trash'></i></a>
                     </td>
                  </tr>
                  <?php
                  $totalamount=$totalamount+($c->product_price*$c->product_quantity)

                  ?>
                  @endforeach
               </tbody>
            </table>
         </div>
         <div class="cart-buttons">
            <div class="row align-items-center">
               <div class="col-lg-7 col-sm-7 col-md-7">
                  <div class="shopping-coupon-code">
                     <input type="text" class="form-control" placeholder="Coupon code" name="coupon-code" id="coupon-code">
                     <button type="submit">Apply Coupon</button>
                  </div>
               </div>
               <div class="col-lg-5 col-sm-5 col-md-5 text-end">
                  <a href="#" class="default-btn"><i class="flaticon-view"></i> Update Cart</a>
               </div>
            </div>
         </div>
         <div class="cart-totals">
            <h3>Cart Totals</h3>
            <ul>
               <li>Subtotal <span>RS.<?php echo $totalamount?></span></li>
               <li>Shipping <span>RS.300.00</span></li>
               <li>Total <span><?php echo $totalamount?></span></li>
            </ul>

            @if (Auth::check())
                <a href="{{ url('/checkout') }}" class="default-btn"><i class="flaticon-trolley"></i> Proceed to Checkout</a>
            @else
            <a href="{{ url('/signup') }}" class="default-btn"><i class="flaticon-trolley"></i> Proceed to Checkout</a>
            @endif

         </div>
      </form>
   </div>
</section>
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
