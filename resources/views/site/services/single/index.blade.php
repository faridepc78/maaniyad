@section('site_title')
    <title>مانیاد | خدمت ({{$service->name}})</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg4 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>{{$service->name}}</h2>
                    <p>{{$service->bio}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="services-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="services-details-desc">
                    <div class="services-details-image">
                        <img src="{{$service->image->original}}" alt="{{$service->name}}">
                    </div>

                    {!! $service->text !!}
                </div>
            </div>
        </div>
    </div>
</section>

@include('site.layout.footer')
