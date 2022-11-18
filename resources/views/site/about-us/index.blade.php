@section('site_title')
    <title>مانیاد | درباره ما</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>درباره ما</h2>
                    <p>ما چه کسی هستیم.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-section ptb-100 pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="about-text">
                    <p>{!! $settings['about_page'] !!}</p>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="about-img">
                    <img src="{{asset('assets/frontend/images/about-img2.jpg')}}" alt="image">
                    <img src="{{asset('assets/frontend/images/about-img3.jpg')}}" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>

@include('site.layout.footer')
