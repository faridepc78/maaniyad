<section class="team-section ptb-100 bg-faf5f5">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">کارشناسان ما</span>
            <h2>تیم خلاق ما</h2>
        </div>

        <div class="row">

            @if (count($team))

                @foreach($team as $value)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-team-member">
                            <div class="member-image">
                                <img src="{{$value->image->original}}" alt="{{$value->name}}">

                                <ul class="social">

                                    @if ($value->telegram!=null)
                                        <li><a href="{{$value->telegram}}" target="_blank"><i
                                                    class="fa fa-telegram"></i></a></li>
                                    @endif

                                    @if ($value->instagram!=null)
                                        <li><a href="{{$value->instagram}}" target="_blank"><i
                                                    class="fa fa-instagram"></i></a></li>
                                    @endif

                                    @if ($value->linkedin!=null)
                                        <li><a href="{{$value->linkedin}}" target="_blank"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                    @endif

                                    @if ($value->facebook!=null)
                                        <li><a href="{{$value->facebook}}" target="_blank"><i
                                                    class="fa fa-facebook"></i></a></li>
                                    @endif

                                    @if ($value->twitter!=null)
                                        <li><a href="{{$value->twitter}}" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                    @endif

                                    @if ($value->email!=null)
                                            <li><a href="{{$value->email}}" target="_blank"><i
                                                        class="fa fa-google"></i></a></li>
                                    @endif

                                </ul>

                            </div>

                            <div class="member-content">
                                <h3>{{$value->name}}</h3>
                                <span>{{$value->job}}</span>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif

        </div>
    </div>
</section>
