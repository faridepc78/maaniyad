<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="#"><img src="assets/frontend/images/footer-logo.png" alt="image"></a>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد.</p>
                    </div>

                    <div class="newsletter-content">
                        <p>از منابع و ابزارهایی استفاده کنید که می توانند به شما در آماده شدن برای آینده کمک کنند.</p>

                        <form class="newsletter-form" data-toggle="validator">
                            <input type="email" class="input-newsletter" placeholder="آدرس ایمیل خود را وارد کنید"
                                   name="EMAIL" required autocomplete="off">

                            <button type="submit">مشترک شوید</button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3>پیوندهای مفید</h3>

                    <ul class="useful-links">
                        <li><a href="#">صفحه اصلی</a></li>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">نمایشگاه</a></li>
                        <li><a href="#">پروژه</a></li>
                        <li><a href="#">خدمات</a></li>
                    </ul>

                    <ul class="social">
                        <li><a href="#" target="_blank"><i class="flaticon-facebook-logo"></i></a></li>
                        <li><a href="#" target="_blank"><i class="flaticon-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="flaticon-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="flaticon-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>اطلاعات تماس</h3>

                    <ul class="footer-contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> کشور شما ، شهر و استان شما ، منطقه شما</li>
                        <li><i class="far fa-envelope"></i> <a href="#">info@yoursite.com</a></li>
                        <li><i class="fas fa-phone"></i> <a href="#">+ (321) 984 754</a></li>
                        <li><i class="fas fa-fax"></i> <a href="#">+ (321) 984 754</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <p><i class="flaticon-copyright"></i> 1398 تمام حقوق قالب محفوظ است. طراحی و توسعه توسط <a
                    href="https://www.rtl-theme.com/author/barat/?aff=barat" target="_blank">Barat Hadian</a></p>
        </div>
    </div>
</footer>
<!-- End Footer Area -->

<div class="go-top"><i class="fas fa-arrow-up"></i><i class="fas fa-arrow-up"></i></div>

<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.appear.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/odometer.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.meanmenu.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.nice-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/form-validator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/contact-form-script.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/main.js')}}"></script>
<script type="text/javascript">@include('site.layout.feedbacks')</script>

@yield('site_js')

</body>
</html>
