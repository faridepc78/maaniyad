<section class="services-section ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">

        <div class="section-title">
            <span class="sub-title">ما چکار می کنیم</span>
            <h2>ما اشتیاق به خدمات داخلی را تحریک می کنیم</h2>
            <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                است.</p>
        </div>

        <div class="row">

            @if (count($services))

                @foreach($services as $value)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="services-box">
                            <div class="icon">
                                <i class="{{$value->icon}}"></i>
                            </div>

                            <h3><a href="{{$value->path()}}">{{$value->name}}</a></h3>
                            <p>{{$value->bio}}</p>
                            <a href="{{$value->path()}}" class="read-more-btn">ادامه خواندن</a>
                        </div>
                    </div>

                @endforeach

            @endif

        </div>

    </div>
</section>
