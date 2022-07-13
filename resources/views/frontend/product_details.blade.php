@extends('frontend.master')
@section('content')
<section class="page-title-area">
    <div class="container">
       <div class="page-title-content">
          <h1>Products Details</h1>
          <ul>
             <li><a href="#">Home</a></li>
             <li>Products Details</li>
          </ul>
       </div>
    </div>
 </section>
 <section class="product-details-area pt-70 pb-40">
    <div class="container">
       <div class="row">
          <div class="col-lg-5 col-md-12">
             <div class="products-details-image">
                <ul class="products-details-image-slides owl-theme owl-carousel" data-slider-id="1">
                    <center>
                   <li><img src="{{url('upload/product/'.$product_details->product_image) }}" style="width:40%!important; "alt="image"></li>
                </center>
                </ul>
                <div class="owl-thumbs products-details-image-slides-owl-thumbs" data-slider-id="1">
                 @foreach ($add_image as $ds)
                    <div class="owl-thumb-item">
                      <img src="{{url('upload/product/product_image/'.$ds->product_image) }}"style="height: 200px; width: 300px;"alt="image">
                   </div>
                    @endforeach
                </div>
             </div>
          </div>
          <div class="col-lg-7 col-md-12">
             <div class="products-details-desc">
                <h3>{{ $product_details->product_name }}</h3>
                <div class="price">
                   <span class="new-price">RS.{{ $product_details->product_price }}</span>
                   {{-- <span class="old-price">$45.00</span> --}}
                </div>
                <div class="products-review">
                   <div class="rating">
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star'></i>
                   </div>
                   <a href="#" class="rating-count">3 reviews</a>
                </div>
                <ul class="products-info">
                   <li><span>Vendor:</span> <a href="#">Lereve</a></li>
                   <li><span>Availability:</span> <a href="#">In stock (7 items)</a></li>
                   <li><span>Products Type:</span> <a href="#">Mask</a></li>
                </ul>
                <div class="products-color-switch">
                   <span>Color:</span>
                   <ul>
                      <li><a href="#" title="Black" class="color-black"></a></li>
                      <li><a href="#" title="White" class="color-white"></a></li>
                      <li class="active"><a href="#" title="Green" class="color-green"></a></li>
                      <li><a href="#" title="Yellow Green" class="color-yellowgreen"></a></li>
                      <li><a href="#" title="Teal" class="color-teal"></a></li>
                   </ul>
                </div>
                <div class="products-size-wrapper">
                   <span>Size:</span>
                   <ul>
                      <li><a href="#">XS</a></li>
                      <li class="active"><a href="#">S</a></li>
                      <li><a href="#">M</a></li>
                      <li><a href="#">XL</a></li>
                      <li><a href="#">XXL</a></li>
                   </ul>
                </div>
                <div class="products-info-btn">
                   <a href="customer-service.html"><i class='bx bxs-truck'></i> Shipping</a>
                   <a href="contact.html"><i class='bx bx-envelope'></i> Ask about this products</a>
                </div>
                <form action="{{ url('addtocart') }}" method="post">
                    @csrf
                    <input type="text" hidden name="product_id" value="{{ $product_details->id }}">
                    <input type="text" hidden  name="product_name" value="{{ $product_details->product_name}}">
                    <input type="text" hidden  name="product_price" value="{{ $product_details->product_price }}">
                    <input type="text" hidden name="product_image" value="{{ $product_details->product_image }}">

                <div class="products-add-to-cart">
                   <div class="input-counter">
                      <span class="minus-btn"><i class='bx bx-minus'></i></span>
                      <input type="text" name="quantity" value="1" min="1">
                      <span class="plus-btn"><i class='bx bx-plus'></i></span>
                   </div>
                   <button type="submit" class="default-btn"><i class="flaticon-trolley"></i> Add to Cart</button>
                </div>
            </form>
                <div class="wishlist-btn">
                   <a href="#"><i class='bx bx-heart'></i> Add to Wishlist</a>
                </div>
                <div class="buy-checkbox-btn">
                   <div class="item">
                      <input class="inp-cbx" id="cbx" type="checkbox">
                      <label class="cbx" for="cbx">
                         <span>
                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                               <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                            </svg>
                         </span>
                         <span>I agree with the terms and conditions</span>
                      </label>
                   </div>
                   <div class="item">
                      <a href="#" class="default-btn">Buy it now!</a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-12 col-md-12">
             <div class="products-details-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                   <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description">Description</a></li>
                   <li class="nav-item"><a class="nav-link" id="shipping-tab" data-bs-toggle="tab" href="#shipping" role="tab" aria-controls="shipping">Shipping</a></li>
                   <li class="nav-item"><a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews (2)</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                   <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <p>{{ $product_details->product_description }}</p>

                   </div>
                   <div class="tab-pane fade" id="shipping" role="tabpanel">
                      <div class="table-responsive">
                         <table class="table table-bordered">
                            <tbody>
                               <tr>
                                  <td>Shipping</td>
                                  <td>This item Ship to USA</td>
                               </tr>
                               <tr>
                                  <td>Delivery</td>
                                  <td>
                                     Estimated between Wednesday 07/31/2021 and Monday 08/05/2021 <br>
                                     Will usually ship within 1 bussiness day.
                                  </td>
                               </tr>
                            </tbody>
                         </table>
                      </div>
                   </div>
                   <div class="tab-pane fade" id="reviews" role="tabpanel">
                      <div class="products-reviews">
                         <h3>Products Rating</h3>
                         <div class="rating">
                            <span class="bx bxs-star checked"></span>
                            <span class="bx bxs-star checked"></span>
                            <span class="bx bxs-star checked"></span>
                            <span class="bx bxs-star checked"></span>
                            <span class="bx bxs-star"></span>
                         </div>
                         <div class="rating-count">
                            <span>4.1 average based on 4 reviews.</span>
                         </div>
                         <div class="row">
                            <div class="side">
                               <div>5 star</div>
                            </div>
                            <div class="middle">
                               <div class="bar-container">
                                  <div class="bar-5"></div>
                               </div>
                            </div>
                            <div class="side right">
                               <div>02</div>
                            </div>
                            <div class="side">
                               <div>4 star</div>
                            </div>
                            <div class="middle">
                               <div class="bar-container">
                                  <div class="bar-4"></div>
                               </div>
                            </div>
                            <div class="side right">
                               <div>03</div>
                            </div>
                            <div class="side">
                               <div>3 star</div>
                            </div>
                            <div class="middle">
                               <div class="bar-container">
                                  <div class="bar-3"></div>
                               </div>
                            </div>
                            <div class="side right">
                               <div>04</div>
                            </div>
                            <div class="side">
                               <div>2 star</div>
                            </div>
                            <div class="middle">
                               <div class="bar-container">
                                  <div class="bar-2"></div>
                               </div>
                            </div>
                            <div class="side right">
                               <div>05</div>
                            </div>
                            <div class="side">
                               <div>1 star</div>
                            </div>
                            <div class="middle">
                               <div class="bar-container">
                                  <div class="bar-1"></div>
                               </div>
                            </div>
                            <div class="side right">
                               <div>00</div>
                            </div>
                         </div>
                      </div>
                      <div class="products-review-comments">
                         <h3>3 Reviews</h3>
                         <div class="user-review">
                            <img src="assets/img/user1.jpg" alt="image">
                            <div class="review-rating">
                               <div class="review-stars">
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                               </div>
                               <span class="d-inline-block">James Anderson</span>
                            </div>
                            <span class="d-block sub-comment">Excellent</span>
                            <p>Very well built theme, couldn't be happier with it. Can't wait for future updates to see what else they add in.</p>
                         </div>
                         <div class="user-review">
                            <img src="assets/img/user2.jpg" alt="image">
                            <div class="review-rating">
                               <div class="review-stars">
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                               </div>
                               <span class="d-inline-block">Sarah Taylor</span>
                            </div>
                            <span class="d-block sub-comment">Video Quality!</span>
                            <p>Was really easy to implement and they quickly answer my additional questions!</p>
                         </div>
                         <div class="user-review">
                            <img src="assets/img/user3.jpg" alt="image">
                            <div class="review-rating">
                               <div class="review-stars">
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                               </div>
                               <span class="d-inline-block">David Warner</span>
                            </div>
                            <span class="d-block sub-comment">Perfect Coding!</span>
                            <p>Stunning design, very dedicated crew who welcome new ideas suggested by customers, nice support.</p>
                         </div>
                         <div class="user-review">
                            <img src="assets/img/user4.jpg" alt="image">
                            <div class="review-rating">
                               <div class="review-stars">
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star checked'></i>
                                  <i class='bx bxs-star'></i>
                               </div>
                               <span class="d-inline-block">King Kong</span>
                            </div>
                            <span class="d-block sub-comment">Perfect Video!</span>
                            <p>Stunning design, very dedicated crew who welcome new ideas suggested by customers, nice support.</p>
                         </div>
                      </div>
                      <div class="review-form-wrapper">
                         <h3>Add a review</h3>
                         <p class="comment-notes">Your email address will not be published. Required fields are marked <span>*</span></p>
                         <form>
                            <div class="row">
                               <div class="col-lg-12 col-md-12">
                                  <div class="rating">
                                     <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                     <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                     <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                     <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                     <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                  </div>
                               </div>
                               <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                     <input type="text" class="form-control" placeholder="Name *">
                                  </div>
                               </div>
                               <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                     <input type="email" class="form-control" placeholder="Email *">
                                  </div>
                               </div>
                               <div class="col-lg-12 col-md-12">
                                  <div class="form-group">
                                     <textarea placeholder="Your review" class="form-control" cols="30" rows="6"></textarea>
                                  </div>
                               </div>
                               <div class="col-lg-12 col-md-12">
                                  <p class="comment-form-cookies-consent">
                                     <input type="checkbox" id="test1">
                                     <label for="test1">Save my name, email, and website in this browser for the next time I comment.</label>
                                  </p>
                               </div>
                               <div class="col-lg-12 col-md-12">
                                  <button type="submit" class="default-btn">Submit</button>
                               </div>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="related-products">
       <div class="container">
          <div class="section-title">
             <h2>Related Products</h2>
          </div>
          <div class="products-slides owl-carousel owl-theme">
              @foreach ($product as $a)
             <div class="single-products-box">
                <div class="image">
                   <a href="{{ url('product_details/'.$a->id) }}" class="d-block"><img src="{{url('upload/product/'.$a->product_image)}}" style="width:50%!important" alt="image"></a>
                   <div class="new">New</div>
                   <div class="buttons-list">
                      <ul>
                         <li>
                            <div class="cart-btn">
                               <a href="#">
                               <i class='bx bxs-cart-add'></i>
                               <span class="tooltip-label">Add to Cart</span>
                               </a>
                            </div>
                         </li>
                         <li>
                            <div class="wishlist-btn">
                               <a href="#">
                               <i class='bx bx-heart'></i>
                               <span class="tooltip-label">Add to Wishlist</span>
                               </a>
                            </div>
                         </li>
                         <li>
                            <div class="quick-view-btn">
                               <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView">
                               <i class='bx bx-search-alt'></i>
                               <span class="tooltip-label">Quick View</span>
                               </a>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
                <div class="content">
                   <h3><a href="#">{{$a->product_name}}</a></h3>
                   <div class="price">
                      <span class="new-price">RS.{{$a->product_price}}</span>
                   </div>
                </div>
             </div>
              @endforeach
          </div>
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
