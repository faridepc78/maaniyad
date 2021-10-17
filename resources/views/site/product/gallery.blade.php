<div class="tabs_item">
    <div class="products-details-tab-content">
        <ul class="additional-information">

            @if (count($product->gallery))

                <div class="projects-image-slides owl-carousel owl-theme">

                    @foreach($product->gallery as $value)

                        <div class="single-image">
                            <img src="{{$value->image->original}}" alt="{{$value->image->original}}">
                        </div>

                    @endforeach

                </div>

            @endif

        </ul>
    </div>
</div>
