<section class="testimonials-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">توصیه ها</span>
            <h2>آنچه مردم در مورد طراحی استودیوی ما می گویند</h2>
        </div>

        <div class="testimonials-slides owl-carousel owl-theme">

            @if (count($feedbacks))

                @foreach($feedbacks as $value)

                    <div class="single-testimonials-item">
                        <p>{{$value->text}}</p>

                        <div class="client-info">
                            <img src="{{$value->image->original}}" alt="{{$value->name}}">

                            <h3>{{$value->name}}</h3>
                            <span>{{$value->job}}</span>
                        </div>
                    </div>

                @endforeach

            @endif

        </div>
    </div>
</section>
