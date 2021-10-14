@section('site_title')
    <title>مانیاد | پروژه ها-جستجو({{$keyword}})</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>پروژه ها-جستجو({{$keyword}})</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="projects-area ptb-100">
    <div class="container-fluid">
        <div class="row m-0">

            @if (count($projects))

                @foreach($projects as $value)

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div style="background-image: url('{{$value->image->original}}')" class="single-projects-box">
                            <div class="projects-content">
                                <h3><a href="{{$value->path()}}">{{$value->name}}</a></h3>
                            </div>
                        </div>
                    </div>

                @endforeach

            @else

                <div class="alert alert-danger text-center col-md-12">
                    <p>بر اساس جستجو شما نتیجه ای یافت نشد</p>
                </div>

            @endif

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    {!! $projects->links() !!}
                </div>
            </div>

        </div>
    </div>
</section>

@include('site.layout.footer')
