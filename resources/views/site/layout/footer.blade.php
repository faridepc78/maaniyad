<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="{{route('home')}}"><img style="width: 100px;height: 100px"
                                                         src="{{asset('assets/common/images/maaniyad.jpeg')}}"
                                                         alt="image"></a>
                    </div>

                    {{--<div class="newsletter-content">
                        <p>از منابع و ابزارهایی استفاده کنید که می توانند به شما در آماده شدن برای آینده کمک کنند.</p>

                        <form class="newsletter-form" data-toggle="validator">
                            <input type="email" class="input-newsletter" placeholder="آدرس ایمیل خود را وارد کنید"
                                   name="EMAIL" required autocomplete="off">

                            <button type="submit">مشترک شوید</button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>--}}
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3>پیوندهای مفید</h3>

                    <ul class="useful-links">
                        <li><a href="{{route('home')}}">صفحه اصلی</a></li>
                        <li><a href="{{route('projects')}}">پروژه ها</a></li>
                        <li><a href="{{route('blog')}}">وبلاگ</a></li>
                        <li><a href="{{route('about-us')}}">درباره ما</a></li>
                        <li><a href="{{route('contact-us')}}">تماس با ما</a></li>
                        <li><a href="{{route('agency')}}">درخواست نمایندگی فروش</a></li>
                    </ul>

                    <ul class="social">

                        @if ($settings['instagram']!==null)
                            <li><a href="{{$settings['instagram']}}" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                        @endif

                        @if ($settings['telegram']!==null)
                            <li><a href="{{$settings['telegram']}}" target="_blank"><i class="fa fa-telegram"></i></a>
                            </li>
                        @endif

                        @if ($settings['whatsapp']!==null)
                            <li><a href="{{$settings['whatsapp']}}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>اطلاعات تماس</h3>

                    <ul class="footer-contact-info">
                        @if ($settings['address']!==null)
                            <li><i class="fas fa-map-marker-alt"></i>{{$settings['address']}}</li>
                        @endif

                        @if ($settings['email']!==null)
                            <li><i class="far fa-envelope"></i> {{$settings['email']}}</li>
                        @endif

                        @if ($settings['phone']!==null)
                            <li><i class="fas fa-phone"></i> {{$settings['phone']}}</a></li>
                        @endif

                        @if ($settings['mobile']!==null)
                            <li><i class="fas fa-mobile"></i> {{$settings['mobile']}}</li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-area">
        <div class="container text-center">
            <p><i class="flaticon-copyright"></i> 1400 تمام حقوق مانیاد محفوظ است. طراحی و توسعه توسط <a
                    href="https://maaniyad.com" target="_blank">MAANIYAD</a></p>
        </div>
    </div>
</footer>

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
<script type="text/javascript" src="{{asset('assets/common/js/public.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/common/plugins/validation/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/common/plugins/validation/js/methods.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/common/plugins/toast/js/toast.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/common/plugins/toast/js/toast-options.js')}}"></script>
<script type="text/javascript">@include('site.layout.feedbacks')</script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#search_form').on('submit', function (e) {
            e.preventDefault();
            let search = $('#search').val();

            if (search.length !== 0) {
                this.submit();
            }
        });

        $('#search_blog_form').on('submit', function (e) {
            e.preventDefault();
            let search_blog = $('#search_blog').val();

            if (search_blog.length !== 0) {
                this.submit();
            }
        });
    });

</script>

@yield('site_js')

</body>
</html>
