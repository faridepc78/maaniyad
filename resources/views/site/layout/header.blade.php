<!doctype html>
<html lang="fa">
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description"
          content="مانیاد">
    <meta name="keywords"
          content="مانیاد">
    <meta name="author" content="info@aftabeshafa.ir">
    <meta http-equiv="content-language" content="Fa">
    <meta name="robots" content="index,follow"/>
    <meta property="og:site_name" content="مانیاد">
    <meta property="og:title" content="مانیاد">
    <meta property="og:description"
          content="مانیاد">
    <meta property="og:type" content="website">
    <meta name="twitter:title" content="مانیاد">
    <meta name="theme-color" content="#4096c3"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('site_title')

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/common/images/logo/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/common/images/logo/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/common/images/logo/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/common/images/logo/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/common/images/logo/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/common/images/logo/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/common/images/logo/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/common/images/logo/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/common/images/logo/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{asset('assets/common/images/logo/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/common/images/logo/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/common/images/logo/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/common/images/logo/favicon-16x16.png')}}">
    <link rel="icon" href="{{asset('assets/common/images/logo/favicon.ico')}}" type="image/x-icon">
    <link rel="manifest" href="{{asset('assets/common/images/logo/manifest.json')}}">

    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/animate.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/flaticon.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/meanmenu.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/odometer.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/nice-select.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/rtl.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">

    <link type="text/css" rel="stylesheet" href="{{asset('assets/backend/plugins/font-awesome/css/font-awesome.min.css')}}">

    @yield('site_css')

</head>

<body>

<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="shadow"></div>
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Navbar Area -->
<div class="navbar-area navbar-style-two">
    <div class="zovio-responsive-nav">
        <div class="container">
            <div class="zovio-responsive-menu">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('assets/frontend/images/logo.png')}}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="zovio-nav">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('assets/frontend/images/logo.png')}}" alt="logo">
            </a>

            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <li class="nav-item"><a href="#" class="nav-link active">صفحه اصلی</a>
                    </li>

                    <li class="nav-item"><a href="#" class="nav-link">درباره ما <i
                                class="flaticon-down-chevron"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="about-1.html" class="nav-link">درباره ما 1</a></li>

                            <li class="nav-item"><a href="about-2.html" class="nav-link">درباره ما 2</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="#" class="nav-link">خدمات <i class="flaticon-down-chevron"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="services-1.html" class="nav-link">خدمات 1</a></li>

                            <li class="nav-item"><a href="services-2.html" class="nav-link">خدمات 2</a></li>

                            <li class="nav-item"><a href="single-services.html" class="nav-link">خدمات جداگانه</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="#" class="nav-link">پروژه ها <i class="flaticon-down-chevron"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="projects-1.html" class="nav-link">پروژه 1</a></li>

                            <li class="nav-item"><a href="projects-2.html" class="nav-link">پروژه 2</a></li>

                            <li class="nav-item"><a href="projects-3.html" class="nav-link">پروژه 3</a></li>

                            <li class="nav-item"><a href="projects-4.html" class="nav-link">پروژه 4</a></li>

                            <li class="nav-item"><a href="single-projects.html" class="nav-link">پروژه جداگانه</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="#" class="nav-link">صفحات <i class="flaticon-down-chevron"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="#" class="nav-link">تیم ما</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="team-1.html" class="nav-link">تیم ما 1</a></li>

                                    <li class="nav-item"><a href="team-2.html" class="nav-link">تیم ما 2</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="#" class="nav-link">فروشگاه</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="shop.html" class="nav-link">فروشگاه</a></li>

                                    <li class="nav-item"><a href="single-product.html" class="nav-link">فروشگاه
                                            جداگانه</a></li>

                                    <li class="nav-item"><a href="cart.html" class="nav-link">سبد خرید</a></li>

                                    <li class="nav-item"><a href="checkout.html" class="nav-link">بررسی</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="error-404.html" class="nav-link">خطای 404</a></li>

                            <li class="nav-item"><a href="faq.html" class="nav-link">سوالات متداول</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="#" class="nav-link">وبلاگ <i class="flaticon-down-chevron"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="blog-1.html" class="nav-link">وبلاگ شبکه ای</a></li>

                            <li class="nav-item"><a href="blog-2.html" class="nav-link">وبلاگ سایدبار</a></li>

                            <li class="nav-item"><a href="single-blog.html" class="nav-link">وبلاگ جداگانه</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="contact.html" class="nav-link">تماس با ما</a></li>
                </ul>

                <div class="others-options">
                    <a href="cart.html" class="cart-btn"><i class="flaticon-bag"></i></a>

                    <div class="option-item"><i class="search-btn flaticon-search"></i>
                        <i class="close-btn fas fa-times"></i>

                        <div class="search-overlay search-popup">
                            <div class='search-box'>
                                <form class="search-form">
                                    <input class="search-input" name="search" placeholder="جستجو" type="text">

                                    <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="burger-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Sidebar Modal -->
<div class="sidebar-modal">
    <div class="sidebar-modal-inner">
        <div class="sidebar-about-area">
            <div class="title">
                <h2>درباره ما</h2>
                <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                    است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                    صنعت بوده است.</p>
            </div>
        </div>

        <div class="sidebar-instagram-feed">
            <h2>اینستاگرام</h2>

            <ul>
                <li><a href="#"><img src="assets/frontend/images/services-img1.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/frontend/images/services-img2.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/frontend/images/services-img3.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/frontend/images/services-img4.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/frontend/images/services-img1.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/frontend/images/services-img2.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/frontend/images/services-img3.jpg" alt="image"></a></li>
                <li><a href="#"><img src="assets/frontend/images/services-img4.jpg" alt="image"></a></li>
            </ul>
        </div>

        <div class="sidebar-contact-area">
            <div class="contact-info">
                <div class="contact-info-content">
                    <h2>
                        <a href="tel:+0881306298615">+088 130 629 8615</a>
                        <span>یا</span>
                        <a href="mailto:zovio@site.com">zovio@site.com</a>
                    </h2>

                    <ul class="social">
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <span class="close-btn sidebar-modal-close-btn"><i class="fas fa-times"></i></span>
    </div>
</div>
<!-- End Sidebar Modal -->
