@extends('frontend.master')
@section('content')
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>Checkout</h1>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="checkout-area ptb-70">
        <div class="container">
            <div class="user-actions">
                <i class='bx bx-log-in'></i>
                <span>Returning customer? <a href="profile-authentication.html">Click here to login</a></span>
            </div>
            <form action="{{ url('place_order') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="billing-details">
                            <h3 class="title">Billing Details</h3>
                            <div class="row">
                                @foreach ($data as $d)

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Name <span class="required"></span></label>
                                        <input type="text" name="name" disabled  class="form-control"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>CITY<span class="required">*</span></label>
                                        <input type="text" name="city" value="{{ $d->city }}" class="form-control">

                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address" value="{{ $d->address }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>State / County <span class="required">*</span></label>
                                        <input type="text" name="country" value="{{ $d->state }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input type="text" name="zip" value="{{ $d->pincode }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" value="{{ $d->mobile }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <div class="col-lg-6 col-md-12">
                        <div class="order-details">
                            <h3 class="title">Your Order</h3>
                            <div class="order-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalamount = 0;
                                        ?>
                                        @foreach ($cart as $c)
                                            <tr>
                                                <td class="product-name">
                                                    <a href="#">{{ $c->product_name }}</a>
                                                </td>
                                                <td class="product-total">
                                                    <span
                                                    class="subtotal-amount">RS.{{ $c->product_price * $c->product_quantity }}</span>
                                                </td>
                                            </tr>
                                            <?php
                                            $totalamount = $totalamount + $c->product_price * $c->product_quantity;
                                            ?>
                                        @endforeach
                                        <td class="order-subtotal">
                                            <span>Cart Subtotal</span>
                                        </td>
                                        <td class="order-subtotal-price">
                                            <span class="order-subtotal-amount">RS.<?php echo $totalamount; ?></span>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td class="order-shipping">
                                                <span>Shipping</span>
                                            </td>
                                            <td class="shipping-price">
                                                <span>RS.300</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="total-price">
                                                <span>Order Total</span>
                                            </td>
                                            <td class="product-subtotal">
                                                <input type="hidden" name="grandtotal" value="<?php echo $totalamount; ?>">
                                               Rs.<span class="subtotal-amount"><?php echo $totalamount + 300; ?></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="payment-box">
                                <div class="payment-method">
                                    <p>
                                        <input type="radio" id="direct-bank-transfer" class="paytm" name="payment_method" value="paytm" checked>
                                        <label for="direct-bank-transfer">Paytm</label>

                                    </p>
                                    <p>
                                        <input type="radio" id="direct-bank-transfer" name="payment_method" value="Razor" checked>
                                        <label for="direct-bank-transfer">Razor Pay</label>

                                    </p>
                                    <p>
                                        <input type="radio" id="direct-bank-transfer" name="payment_method" class="card" value="card" checked>
                                        <label for="direct-bank-transfer">cards</label>

                                    </p>
                                    <p>
                                        <input type="radio" id="cash-on-delivery" name="payment_method" class="cod" value="cod">
                                        <label for="cash-on-delivery">Cash on Delivery</label>
                                    </p>
                                </div>
                                <button class="default-btn" onclick="return select_payment_method()"><i class="flaticon-tick"></i>Place Order<span></span></button>
                            </div>
                        </div>
                    </div>
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
