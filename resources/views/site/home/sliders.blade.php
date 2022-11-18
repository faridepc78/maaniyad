<div class="home-slides-two owl-carousel owl-theme">

    @if (count($sliders))

        @foreach($sliders as $value)

            <div style="background-image: url('{{$value->image->original}}')" class="main-banner jarallax"
                 data-jarallax='{"speed": 0.3}'>
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="main-banner-content">
                                <h1>{{$value->name}}</h1>
                                @if ($value->text!=null)
                                    <p>{{$value->text}}</p>
                                @endif
                                @if ($value->url!=null)
                                    <div class="btn-box">
                                        <a target="_blank" href="{{$value->url}}" class="optional-btn">اطلاعات بیشتر <span></span></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    @endif

</div>
