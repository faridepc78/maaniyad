<section class="projects-area ptb-100 pt-0">
    <div class="container">
        <div class="section-title">
            <h2>پروژه ها</h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row m-0">

            @if (count($projects))

                @foreach($projects as $value)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div style="background-image: url('{{$value->image->original}}')" class="single-projects-box">
                            <div class="projects-content">
                                <h3><a href="{{$value->path()}}">{{$value->name}}</a></h3>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif

        </div>
    </div>
</section>
