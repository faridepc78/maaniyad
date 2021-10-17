@section('site_title')
    <title>مانیاد | محصولات آلبوم ({{$album['name']}})</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg5 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>محصولات آلبوم ({{$album['name']}})</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="shop-area ptb-100">
    <div class="container">

        <textarea readonly rows="10" style="resize: vertical" class="form-control">{{$album['text']}}
        </textarea>

        <br>

        <div class="row">

            @if (count($products))

                @foreach($products as $value)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-product-box">
                            <div class="product-image">
                                <a href="{{$value->path()}}">
                                    <img src="{{$value->image->original}}" alt="image">
                                </a>
                            </div>

                            <div class="product-content">
                                <h3><a href="{{$value->path()}}">{{$value->name}}</a></h3>
                                <p style="color: red">{{$value['code']}}</p>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    {!! $products->links() !!}
                </div>
            </div>

        </div>

    </div>
</section>

@include('site.layout.footer')
