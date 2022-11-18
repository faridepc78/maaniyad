<section class="widget widget_zovio_posts_thumb">
    <h3 class="widget-title">پست های تصادفی</h3>

    @if (count($random_posts))

        @foreach($random_posts as $value)

            <article class="item">
                <a href="{{$value->path()}}" class="thumb">
                    <span style="background-image: url('{{$value->image->original}}')" class="fullimage cover" role="img"></span>
                </a>
                <div class="info">
                    <time>{{\Morilog\Jalali\CalendarUtils::strftime('j F Y',$value->created_at)}}</time>
                    <h4 class="title usmall"><a href="{{$value->path()}}">{{$value->name}}</a></h4>
                </div>

                <div class="clear"></div>
            </article>

        @endforeach

    @endif

</section>
