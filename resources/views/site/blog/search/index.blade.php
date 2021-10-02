@section('site_title')
    <title>مانیاد | وبلاگ-جستجو({{$keyword}})</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg4 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>وبلاگ-جستجو({{$keyword}})</h2>
                    <p>اخبار ما را در وبلاگ بخوانید</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">

                    @if (count($posts))

                        @foreach($posts as $value)

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="single-blog-post">
                                    <div class="post-image">
                                        <a href="{{$value->path()}}"><img src="{{$value->image->original}}"
                                                                          alt="{{$value->image->original}}"></a>
                                    </div>

                                    <div class="post-content">
                                        <h3><a href="#">{{$value->name}}</a></h3>
                                        <p>{{strip_tags(\Illuminate\Support\Str::limit($value->text))}}</p>
                                        <a href="{{$value->path()}}" class="read-more-btn">ادامه خواندن <i
                                                class="flaticon-left-chevron"></i></a>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @else

                        <div class="alert alert-danger text-center col-md-12">
                            <p>بر اساس جستجو شما نتیجه ای یافت نشد</p>
                        </div>

                    @endif

                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            {!! $posts->links() !!}
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <aside class="widget-area" id="secondary">

                    @include('site.blog.common.search')

                    @include('site.blog.common.randomPosts')

                    @include('site.blog.common.categories')

                </aside>
            </div>

        </div>
    </div>
</section>

@include('site.layout.footer')
