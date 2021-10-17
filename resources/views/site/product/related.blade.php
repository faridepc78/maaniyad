<div class="related-products">
    <div class="container">
        <div class="section-title">
            <h2>محصولات مرتبط</h2>
        </div>

        <div class="row">

            @if (count($related))

                @foreach($related as $value)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-product-box">
                            <div class="product-image">
                                <a href="{{$value->path()}}">
                                    <img src="{{$value->image->original}}" alt="image">
                                </a>
                            </div>

                            <div class="product-content">
                                <h3><a href="{{$value->path()}}">{{$value->name}}</a></h3>
                                آلبوم :
                                <a style="color: red" href="{{$product->album->path()}}" class="rating-count">{{$product->album->name}}</a>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif

        </div>
    </div>
</div>
