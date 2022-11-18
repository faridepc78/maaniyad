@section('site_title')
    <title>مانیاد | صفحه اصلی</title>
@endsection

@include('site.layout.header')

@include('site.home.sliders')

<section class="fun-facts-area ptb-100 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 col-md-3 col-sm-3">
                <div class="single-fun-facts">
                    <h3><span style="direction: ltr;" class="odometer" data-count="{{$settings['projects_count']}}">00</span>+</h3>
                    <p>پروژه های ما</p>
                </div>
            </div>

            <div class="col-lg-3 col-6 col-md-3 col-sm-3">
                <div class="single-fun-facts">
                    <h3><span style="direction: ltr;" class="odometer" data-count="{{$settings['customers_count']}}">00</span>+</h3>
                    <p>مشتریان</p>
                </div>
            </div>

            <div class="col-lg-3 col-6 col-md-3 col-sm-3">
                <div class="single-fun-facts">
                    <h3><span style="direction: ltr;" class="odometer" data-count="{{$settings['team_count']}}">00</span>+</h3>
                    <p>اعضای تیم</p>
                </div>
            </div>

            <div class="col-lg-3 col-6 col-md-3 col-sm-3">
                <div class="single-fun-facts">
                    <h3><span style="direction: ltr;" class="odometer" data-count="{{$settings['experience_count']}}">00</span>+</h3>
                    <p>سالها تجربه</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('site.home.projects')

@include('site.home.products')

@include('site.home.feedbacks')

@include('site.home.brands')

<section class="work-with-us-area ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="work-with-us-content">
            <h2>آیا می خواهید با ما همکاری کنید؟</h2>

            <a href="{{route('contact-us')}}" class="default-btn">تماس با ما <span></span></a>
        </div>
    </div>
</section>

@include('site.home.posts')

@if ($settings['instagram']!==null)
    <section class="instagram-feed-area bg-faf5f5">
        <div class="container">
            <div class="section-title">
                <span class="sub-title"><a target="_blank" href="{{$settings['instagram']}}">صفحه رسمی شرکت</a></span>
                <h2>ما را در اینستاگرام دنبال کنید</h2>
            </div>
        </div>
    </section>
@endif

@include('site.layout.footer')
