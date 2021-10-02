<section class="blog-area ptb-100 bg-faf5f5">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">وبلاگ ما</span>
            <h2>اخبار ما را دنبال کنید</h2>
        </div>

        <div class="row">

            @if (count($posts))

                @foreach($posts as $value)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-blog-post">
                            <div class="post-image">
                                <a href="{{$value->path()}}"><img src="{{$value->image->original}}" alt="{{$value->name}}"></a>
                            </div>

                            <div class="post-content">
                                <h3><a href="{{$value->path()}}">{{$value->name}}</a></h3>
                                <p>{{strip_tags(\Illuminate\Support\Str::limit($value->text))}}</p>
                                <a href="{{$value->path()}}" class="read-more-btn">ادامه خواندن <i class="flaticon-left-chevron"></i></a>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif

        </div>
    </div>
</section>
