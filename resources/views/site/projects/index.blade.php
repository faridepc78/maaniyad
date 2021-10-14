@section('site_title')
    <title>مانیاد | پروژه ها</title>
@endsection

@include('site.layout.header')

<div class="page-title-area page-title-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>پروژه ها</h2>
                    <p>آخرین پروژه ها</p>
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
