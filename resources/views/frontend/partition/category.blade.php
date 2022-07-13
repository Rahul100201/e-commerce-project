{{-- <section class="categories-area pb-40">

    <div class="container">
        <div class="section-title">
            <h2>Categories</h2>
        </div>
        @foreach ($category as $c )
        <div class="row">
            <div class="col-lg-12">
                <div class="single-categories-box">
                    <img src="{{ url('upload/category/'.$c->image) }}" alt="image">
                    <h3>{{ $c->name }}</h3>
                    <a href="products-left-sidebar.html" class="link-btn"></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section> --}}

<section class="categories-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>Categories</h2>
        </div>
        <div class="row">
            @foreach ($category as $a )

            <div class="col-lg-2 col-sm-4 col-md-4">
                <div class="single-categories-box">
                    <img src="{{url('upload/category/'.$a->image)}}" style="height: 150px" alt="image">
                    <h3>{{$a->name}}</h3>
                    <a href="{{ url('view_categories/'.$a->id) }}" class="link-btn"></a>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
