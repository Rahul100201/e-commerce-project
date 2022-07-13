@extends('frontend.master')
@section('content')
<br>
<div class="post-wrapper pt-100">
    <!-- Start post Area -->
    <section class="post-area">
       <div class="container-fluid">
          <div class="row justify-content-center d-flex">
             <div class="col-lg-8">
                <div class="top-posts pt-50">
                    <center>
                      <div class="row justify-content-center">
                          @foreach ($products as $p)
                           <div class="single-posts col-lg-3 col-sm-3">
                             <img class="img-fluid" src="{{url('upload/product/'.$p->product_image)}}" alt="{{$p->image}}" />
                            {{-- <div class="date mt-20 mb-20">{{$p->created_at->diffForHumans()}}</div> --}}
                            <div class="detail">
                               <a href="{{ url('product_details/'.$p->id) }}">
                                <br>
                                  <h4 class="pb-20">{{ $p->product_name  }}</h4>
                               </a>
                               <p>
                               </p>
                               <p>RS.{{ $p->product_price }}</p>
                               <p class="footer pt-20">
                                  <br>
                               </p>

                               <p></p>
                            </div>
                         </div>
                          @endforeach
</center>
                         <div class="justify-content-center d-flex mt-5">
                            <ul class="pagination" role="navigation">
                               <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                  <span class="page-link" aria-hidden="true">‹</span>
                               </li>
                               <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                               <li class="page-item"><a class="page-link" href="http://localhost:8000/posts?page=2">2</a></li>
                               <li class="page-item">
                                  <a class="page-link" href="http://localhost:8000/posts?page=2" rel="next" aria-label="Next »">›</a>
                               </li>
                            </ul>
                         </div>

                   </div>
                </div>
             </div>
        @endsection
