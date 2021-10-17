<div class="tabs_item">
    <div class="products-details-tab-content">
        <ul class="additional-information">

            @if (count($product->attributes))

                @foreach($product->attributes as $value)

                    <li><span>{{$value->album_attribute->name}}:</span> {{$value->val}}</li>

                @endforeach

            @endif

        </ul>
    </div>
</div>
