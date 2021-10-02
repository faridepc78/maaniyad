@section('site_title')
    <title>مانیاد | سوالات متداول</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg3 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>سوالات متداول</h2>
                    <p>پرسش و پاسخ های متداول کاربران</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="faq-area ptb-100">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-lg-6 col-md-12 p-0">
                <div class="faq-image">
                    <img src="{{asset('assets/frontend/images/faq-img1.jpg')}}" alt="image">
                </div>
            </div>

            <div class="col-lg-6 col-md-12 p-0">
                <div class="faq-accordion">
                    <span class="sub-title">سوالات متداول</span>

                    @if (count($faqs))

                        <ul class="accordion">

                            @foreach($faqs as $value)

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        {{$value['name']}}
                                    </a>

                                    <p class="accordion-content">
                                        {{$value['value']}}
                                    </p>
                                </li>

                            @endforeach

                        </ul>

                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@include('site.layout.footer')
