<div class="partner-area ptb-100 pt-0">
    <div class="partner-slides owl-carousel owl-theme">

        @if (count($brands))

            @foreach($brands as $value)

                <div class="partner-item">
                    <a title="{{$value->name}}" href="@if ($value->link!=null)
                        {{$value->link}}
                    @else
                        javascript:void(0)
                    @endif">
                        <img src="{{$value->image->original}}" alt="{{$value->name}}" title="{{$value->name}}">
                        <img src="{{$value->image->original}}" alt="{{$value->name}}" title="{{$value->name}}">
                    </a>
                </div>

            @endforeach

        @endif

    </div>
</div>
