<section class="products-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>New Arrivals</h2>
        </div>
        <div class="row">
            @foreach ($product as $p)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-products-box">
                    <div class="image">
                        <a href="{{ url('product_details/'.$p->id)}}" class="d-block text-center"><img src="{{ url('upload/product/'.$p->product_image) }}" style="width: 50%!important" alt="image"></a>
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
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView{{ $p->id }}">
                                            <i class='bx bx-search-alt'></i>
                                            <span class="tooltip-label">Quick View</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="content">
                        <h3><a href="{{ url('product_details/'.$p->id)}}">{{ $p->product_name }}</a></h3>
                        <div class="price">
                            <span class="new-price">RS.{{ $p->product_price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    @foreach ($product as $p )
    <div class="modal fade productsQuickView" id="productsQuickView{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class='bx bx-x'></i></span>
              </button>
              <div class="row align-items-center">
                 <div class="col-lg-6 col-md-6">
                    <div class="products-image">
                        <center>
                       <img src="{{ url('upload/product/'.$p->product_image) }}" alt="image">
                    </center>
                    </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                    <div class="products-content">
                       <h3><a href="#">{{ $p->product_name }}</a></h3>
                       <div class="price">
                          <span class="new-price">RS.{{ $p->product_price }}</span>
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
                          <h4>Color:</h4>
                          <ul>
                             <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Black"
                                class="color-black"></a></li>
                             <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="White"
                                class="color-white"></a></li>
                             <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Green"
                                class="color-green"></a></li>
                             <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Yellow Green"
                                class="color-yellowgreen"></a></li>
                             <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Teal"
                                class="color-teal"></a></li>
                          </ul>
                       </div>
                       <div class="products-size-wrapper">
                          <h4>Size:</h4>
                          <ul>
                             <li><a href="#">XS</a></li>
                             <li class="active"><a href="#">S</a></li>
                             <li><a href="#">M</a></li>
                             <li><a href="#">XL</a></li>
                             <li><a href="#">XXL</a></li>
                          </ul>
                       </div>
                       <a href="{{ url('product_details/'.$p->id) }}" class="view-full-info">or Buy Now</a>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  @endforeach
</section>
