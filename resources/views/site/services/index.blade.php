@section('site_title')
    <title>مانیاد | خدمات</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg4 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>خدمات</h2>
                    <p>ما اشتیاق به خدمات داخلی را تحریک می کنیم</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="company-value-area ptb-100">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-lg-6 col-md-12 p-0">
                <div class="company-value-image">
                    <img src="{{asset('assets/frontend/images/company-value-bg.jpg')}}" alt="image">
                </div>
            </div>

            <div class="col-lg-6 col-md-12 p-0">
                <div class="company-value-content">
                    <span class="sub-title">در بهترین حالت ، عزم و اراده</span>
                    <h2>ارزش های اصلی شرکت</h2>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است.</p>

                    <div class="company-value-features">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="exhibition-content">
                                    <h3>نمایشگاه ها</h3>

                                    <ul class="exhibition-list">
                                        <li>زره پوش</li>
                                        <li>سالن</li>
                                        <li>موسسه هنری کلارک</li>
                                        <li>فضای نینتندو در جهان</li>
                                        <li>فضای داخلی</li>
                                        <li>فضای خارجی</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="awards-content">
                                    <h3>معادل</h3>

                                    <ul class="awards-list">
                                        <li>2 جوایز قاره ای</li>
                                        <li>مدال آلوار آلتو</li>
                                        <li>مدال طلا</li>
                                        <li>جایزه طراحی خوب</li>
                                        <li>طراحی خوبی با رنگ سبز</li>
                                        <li>مدال طلای رویال</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-section ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
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

@include('site.layout.footer')
