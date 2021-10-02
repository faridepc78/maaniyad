<section class="widget widget_categories">
    <h3 class="widget-title">دسته بندی</h3>

    @if (count($categories))

        <ul>
            @foreach($categories as $value)
                <li><a href="{{$value->path()}}">{{$value->name}}</a></li>
            @endforeach
        </ul>

    @endif

</section>
