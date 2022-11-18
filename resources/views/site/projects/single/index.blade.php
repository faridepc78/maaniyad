@section('site_title')
    <title>مانیاد | پروژه ({{$project->name}})</title>
@endsection

@include('site.layout.header')

<div style="background-image: url('{{$project->image->original}}')" class="page-title-area jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>{{$project->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="projects-details-area ptb-100">
    <div class="container">
        <div class="projects-details">

            @if (count($project->gallery))

                <div class="projects-image-slides owl-carousel owl-theme">

                    @foreach($project->gallery as $value)

                        <div class="single-image">
                            <img src="{{$value->image->original}}" alt="{{$value->image->original}}">
                        </div>

                    @endforeach

                </div>

            @endif

            <div class="projects-details-desc">

                {!! $project->text !!}

                <div class="project-details-info">
                    <div class="single-info-box">
                        <h4>مشتری</h4>
                        <span>{{$project->customer}}</span>
                    </div>

                    <div class="single-info-box">
                        <h4>تاریخ</h4>
                        <span>{{\Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($project['created_at']))}}</span>
                    </div>

                    <div class="single-info-box">
                        <h4>اشتراک گذاری</h4>
                        <ul class="social">
                            <li><a href="https://telegram.me/share/url?url={{$project->path()}}" target="_blank"><i class="fa fa-telegram"></i></a></li>
                            <li><a href="https://www.instagram.com/?url={{$project->path()}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url={{$project->path()}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/sharer.php?u={{$project->path()}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?url={{$project->path()}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                    @if ($project->link!=null)
                        <div class="single-info-box">
                            <a target="_blank" href="{{$project->link}}" class="default-btn">پیش نمایش زنده <span></span></a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@include('site.layout.footer')
