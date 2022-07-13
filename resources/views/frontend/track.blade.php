@extends('frontend.master')
@section('content')
<section class="page-title-area">
    <div class="container">
    <div class="page-title-content">
    <h1>All In One Package Tracking</h1>
    <ul>
    <li><a href="#">Home</a></li>
    <li>Tracking Order</li>
    </ul>
    </div>
    </div>
    </section>


    <section class="track-order-area ptb-70">
    <div class="container">
    <div class="track-order-content">
    <form>
    <div class="form-group">
    <label>Order ID</label>
    <input type="text" class="form-control">
    </div>
    <div class="form-group">
    <label>Billing E-mail</label>
    <input type="email" class="form-control">
    </div>
    <button type="submit" class="default-btn">Track Order</button>
    </form>
    </div>
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
