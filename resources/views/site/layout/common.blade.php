<div class="col-lg-5 col-md-12">
    <div class="contact-info">
        <ul>
            <li>
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <span>آدرس</span>
                {{$settings['address']}}
            </li>

            <li>
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <span>ایمیل</span>
                <h6>{{$settings['email']}}</h6>
            </li>

            <li>
                <div class="icon">
                    <i class="fas fa-phone-volume"></i>
                </div>
                <span>تماس بگیرید</span>
                <h6>
                    {{$settings['phone']}}
                    <br><br>
                    {{$settings['mobile']}}
                </h6>
            </li>
        </ul>
    </div>
</div>
