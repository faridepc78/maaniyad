@section('site_title')
    <title>مانیاد | خانه</title>
@endsection

@include('site.layout.header')

<!-- Start Navbar Area -->
<div class="navbar-area navbar-style-two">
    <div class="zovio-responsive-nav">
        <div class="container">
            <div class="zovio-responsive-menu">
                <div class="logo">
                    <a href="index-2.html">
                        <img src="{{asset('assets/frontend/images/logo.png')}}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="zovio-nav">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="index-2.html">
                <img src="{{asset('assets/frontend/images/logo.png')}}" alt="logo">
            </a>

            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link active">صفحه اصلی <i
                                class="flaticon-down-chevron"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="index.html" class="nav-link">صفحه اصلی 1</a></li>

                            <li class="nav-item"><a href="index-2.html" class="nav-link active">صفحه اصلی 2</a></li>

                            <li class="nav-item"><a href="index-3.html" class="nav-link">صفحه اصلی 3</a></li>
                        </ul>
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

<!-- Start Main Banner Area -->
<div class="home-slides-two owl-carousel owl-theme">
    <div class="main-banner item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="main-banner-content">
                        <h1>خانه های مسکونی</h1>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                            صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40
                            سال استاندارد صنعت بوده است.</p>

                        <div class="btn-box">
                            <a href="#" class="default-btn">نقل و قول <span></span></a>
                            <a href="#" class="optional-btn">اطلاعات بیشتر <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-banner item-bg3 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="main-banner-content">
                        <h1>خانه های مسکونی</h1>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                            صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40
                            سال استاندارد صنعت بوده است.</p>

                        <div class="btn-box">
                            <a href="#" class="default-btn">نقل و قول <span></span></a>
                            <a href="#" class="optional-btn">اطلاعات بیشتر <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-banner item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="main-banner-content">
                        <h1>خانه های مسکونی</h1>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                            صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40
                            سال استاندارد صنعت بوده است.</p>

                        <div class="btn-box">
                            <a href="#" class="default-btn">نقل و قول <span></span></a>
                            <a href="#" class="optional-btn">اطلاعات بیشتر <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Banner Area -->

<!-- Start About Area -->
<div class="about-section ptb-100 pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="about-text">
                    <span class="sub-title">ما چه کسی هستیم</span>
                    <h2>ما استودیوی طراح داخلی هستیم</span></h2>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است.</p>
                    <div class="quote">
                        “طراحی داخلی بهترین استفاده را از فضای موجود می کند
                    </div>
                    <a href="#" class="default-btn">اطلاعات بیشتر <span></span></a>

                    <div class="back-animation-text">استودیو طراحی</div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="about-img">
                    <img src="assets/frontend/images/about-img2.jpg" alt="image">
                    <img src="assets/frontend/images/about-img3.jpg" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Area -->

<!-- Start Offer Area -->
<section class="offer-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="offer-box">
                    <div class="icon">
                        <i class="flaticon-curtain"></i>
                    </div>
                    <h3><a href="#">طراحی حرفه ای</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="offer-box">
                    <div class="icon">
                        <i class="flaticon-desktop"></i>
                    </div>
                    <h3><a href="#">کار خلاقانه</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                <div class="offer-box">
                    <div class="icon">
                        <i class="flaticon-rulers"></i>
                    </div>
                    <h3><a href="#">معماری ماهرانه</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Offer Area -->

<!-- Start Our Story Area -->
<section class="our-story-area ptb-100 pt-0">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">داستان ما</span>
            <h2>یک داستان طراحی دارد</h2>
        </div>

        <div class="our-story-content">
            <img src="assets/frontend/images/story-bg.jpg" alt="image">

            <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="video-btn popup-youtube"><i
                    class="flaticon-play-button"></i></a>

            <div class="quote">
                <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد.</p>

                <h3>ویلیامز بانی</h3>
                <span>طراحان داخلی</span>
            </div>
        </div>
    </div>
</section>
<!-- End Our Story Area -->

<!-- Start Fun Facts Area -->
<section class="fun-facts-area ptb-100 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 col-md-3 col-sm-3">
                <div class="single-fun-facts">
                    <h3><span style="direction: ltr;" class="odometer" data-count="350">00</span>+</h3>
                    <p>پروژه های ما</p>
                    <div class="back-text">پ</div>
                </div>
            </div>

            <div class="col-lg-3 col-6 col-md-3 col-sm-3">
                <div class="single-fun-facts">
                    <h3><span style="direction: ltr;" class="odometer" data-count="200">00</span>+</h3>
                    <p>مشتریان</p>
                    <div class="back-text">م</div>
                </div>
            </div>

            <div class="col-lg-3 col-6 col-md-3 col-sm-3">
                <div class="single-fun-facts">
                    <h3><span style="direction: ltr;" class="odometer" data-count="180">00</span>+</h3>
                    <p>اعضای تیم</p>
                    <div class="back-text">ا</div>
                </div>
            </div>

            <div class="col-lg-3 col-6 col-md-3 col-sm-3">
                <div class="single-fun-facts">
                    <h3><span style="direction: ltr;" class="odometer" data-count="35">00</span>+</h3>
                    <p>سالها تجربه</p>
                    <div class="back-text">س</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Fun Facts Area -->

<!-- Start Services Area -->
<section class="services-section ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="section-title">
            <span class="sub-title">ما چکار می کنیم</span>
            <h2>ما اشتیاق به خدمات داخلی را تحریک می کنیم</h2>
            <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                است.</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services-box">
                    <div class="icon">
                        <i class="flaticon-double-bed"></i>
                    </div>

                    <h3><a href="#">طراحی داخلی</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services-box">
                    <div class="icon">
                        <i class="flaticon-hotel"></i>
                    </div>

                    <h3><a href="#">هندسه معماری</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services-box">
                    <div class="icon">
                        <i class="flaticon-living-room"></i>
                    </div>

                    <h3><a href="#">ظاهر بیرونی</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services-box">
                    <div class="icon">
                        <i class="flaticon-home"></i>
                    </div>

                    <h3><a href="#">طراحی دکور</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services-box">
                    <div class="icon">
                        <i class="flaticon-kitchen"></i>
                    </div>

                    <h3><a href="#">مبلمان خانگی</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services-box">
                    <div class="icon">
                        <i class="flaticon-sketch"></i>
                    </div>

                    <h3><a href="#">برنامه ریزی</a></h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال
                        استاندارد صنعت بوده است.</p>
                    <a href="#" class="read-more-btn">ادامه خواندن</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services Area -->

<!-- Start How We Work Area -->
<section class="how-we-work-section ptb-100 pt-0">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">چگونه کار می کنیم</span>
            <h2>فرایند را ثابت کنید تا بهترین نتیجه را بگیرید</h2>
            <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                است.</p>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-process-box bg-1">
                    <div class="number">
                        1
                    </div>
                    <h3>مفهومی</h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-process-box bg-2">
                    <div class="number">
                        2
                    </div>
                    <h3>اجرایی</h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-process-box bg-3">
                    <div class="number">
                        3
                    </div>
                    <h3>تعیین درصد</h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-process-box bg-4">
                    <div class="number">
                        4
                    </div>
                    <h3>پیاده سازی</h3>
                    <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت
                        بوده است.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End How We Work Area -->

<!-- Start Projects Area -->
<section class="projects-area ptb-100 pt-0">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">پروژه های ما</span>
            <h2>کارهای ما</h2>
            <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                است.</p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-projects-box bg-1">
                    <div class="projects-content">
                        <h3><a href="#">طراحی داخلی</a></h3>
                        <span class="category">هندسه معماری</span>
                    </div>

                    <a href="#" class="details-btn"></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-projects-box bg-2">
                    <div class="projects-content">
                        <h3><a href="#">طراحی کلاسیک</a></h3>
                        <span class="category">تعیین درصد</span>
                    </div>

                    <a href="#" class="details-btn"></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-projects-box bg-3">
                    <div class="projects-content">
                        <h3><a href="#">طراحی ویدیو</a></h3>
                        <span class="category">طراحی گرافیک</span>
                    </div>

                    <a href="#" class="details-btn"></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-projects-box bg-4">
                    <div class="projects-content">
                        <h3><a href="#">تصویر کامل</a></h3>
                        <span class="category">هندسه معماری</span>
                    </div>

                    <a href="#" class="details-btn"></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-projects-box bg-5">
                    <div class="projects-content">
                        <h3><a href="#">دیوارها</a></h3>
                        <span class="category">قاب عکس</span>
                    </div>

                    <a href="#" class="details-btn"></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-projects-box bg-6">
                    <div class="projects-content">
                        <h3><a href="#">کارخانه کمد</a></h3>
                        <span class="category">دیوارها</span>
                    </div>

                    <a href="#" class="details-btn"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Projects Area -->

<!-- Start Team Area -->
<section class="team-section ptb-100 bg-faf5f5">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">کارشناسان ما</span>
            <h2>تیم خلاق ما</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team-member">
                    <div class="member-image">
                        <img src="assets/frontend/images/team1.jpg" alt="image">

                        <ul class="social">
                            <li><a href="#" target="_blank"><i class="flaticon-facebook-logo"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-linkedin"></i></a></li>
                        </ul>
                    </div>

                    <div class="member-content">
                        <h3>سوزان لوئیس</h3>
                        <span>مدیر عامل و موسس</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team-member">
                    <div class="member-image">
                        <img src="assets/frontend/images/team2.jpg" alt="image">

                        <ul class="social">
                            <li><a href="#" target="_blank"><i class="flaticon-facebook-logo"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-linkedin"></i></a></li>
                        </ul>
                    </div>

                    <div class="member-content">
                        <h3>رز کاپا</h3>
                        <span>مدیر تیم ورزشی</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                <div class="single-team-member">
                    <div class="member-image">
                        <img src="assets/frontend/images/team3.jpg" alt="image">

                        <ul class="social">
                            <li><a href="#" target="_blank"><i class="flaticon-facebook-logo"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="flaticon-linkedin"></i></a></li>
                        </ul>
                    </div>

                    <div class="member-content">
                        <h3>روزانا پتی</h3>
                        <span>معمار</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Team Area -->

<!-- Start Testimonials Area -->
<section class="testimonials-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">توصیه ها</span>
            <h2>آنچه مردم در مورد طراحی استودیوی ما می گویند</h2>
        </div>

        <div class="testimonials-slides owl-carousel owl-theme">
            <div class="single-testimonials-item">
                <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                    است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                    صنعت بوده است.</p>

                <div class="client-info">
                    <img src="assets/frontend/images/author1.jpg" alt="image">

                    <h3>ویلیامز بانی</h3>
                    <span>طراحی دکور داخلی</span>
                </div>
            </div>

            <div class="single-testimonials-item">
                <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                    است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                    صنعت بوده است.</p>

                <div class="client-info">
                    <img src="assets/frontend/images/author2.jpg" alt="image">

                    <h3>جک لوكاس</h3>
                    <span>طراح هندسه معماری</span>
                </div>
            </div>

            <div class="single-testimonials-item">
                <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                    است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                    صنعت بوده است.</p>

                <div class="client-info">
                    <img src="assets/frontend/images/author3.jpg" alt="image">

                    <h3>سارا تايلور</h3>
                    <span>مدیر سایت</span>
                </div>
            </div>

            <div class="single-testimonials-item">
                <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده
                    است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                    صنعت بوده است.</p>

                <div class="client-info">
                    <img src="assets/frontend/images/author4.jpg" alt="image">

                    <h3>لیام ایلیا</h3>
                    <span>رئیس کل</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonials Area -->

<!-- Start Partner Area -->
<div class="partner-area ptb-100 pt-0">
    <div class="partner-slides owl-carousel owl-theme">
        <div class="partner-item">
            <a href="#">
                <img src="assets/frontend/images/partner1.png" alt="image">
                <img src="assets/frontend/images/partner1.png" alt="image">
            </a>
        </div>

        <div class="partner-item">
            <a href="#">
                <img src="assets/frontend/images/partner2.png" alt="image">
                <img src="assets/frontend/images/partner2.png" alt="image">
            </a>
        </div>

        <div class="partner-item">
            <a href="#">
                <img src="assets/frontend/images/partner3.png" alt="image">
                <img src="assets/frontend/images/partner3.png" alt="image">
            </a>
        </div>

        <div class="partner-item">
            <a href="#">
                <img src="assets/frontend/images/partner4.png" alt="image">
                <img src="assets/frontend/images/partner4.png" alt="image">
            </a>
        </div>

        <div class="partner-item">
            <a href="#">
                <img src="assets/frontend/images/partner5.png" alt="image">
                <img src="assets/frontend/images/partner5.png" alt="image">
            </a>
        </div>

        <div class="partner-item">
            <a href="#">
                <img src="assets/frontend/images/partner6.png" alt="image">
                <img src="assets/frontend/images/partner6.png" alt="image">
            </a>
        </div>
    </div>
</div>
<!-- End Partner Area -->

<!-- Start Work With Us Area -->
<section class="work-with-us-area ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="work-with-us-content">
            <h2>آیا می خواهید با ما همکاری کنید؟</h2>

            <a href="#" class="default-btn">تماس با ما <span></span></a>
        </div>
    </div>
</section>
<!-- End Work With Us Area -->

<!-- Start Blog Area -->
<section class="blog-area ptb-100 bg-faf5f5">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">وبلاگ ما</span>
            <h2>اخبار ما را دنبال کنید</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-blog-post">
                    <div class="post-image">
                        <a href="#"><img src="assets/frontend/images/blog-img1.jpg" alt="image"></a>
                    </div>

                    <div class="post-content">
                        <h3><a href="#">طراحی برتر معماری و نمایشگاه</a></h3>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                            صنعت بوده است</p>
                        <a href="#" class="read-more-btn">ادامه خواندن <i class="flaticon-left-chevron"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-blog-post">
                    <div class="post-image">
                        <a href="#"><img src="assets/frontend/images/blog-img2.jpg" alt="image"></a>
                    </div>

                    <div class="post-content">
                        <h3><a href="#">روانشناسی برای طراح داخلی</a></h3>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                            صنعت بوده است</p>
                        <a href="#" class="read-more-btn">ادامه خواندن <i class="flaticon-left-chevron"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                <div class="single-blog-post">
                    <div class="post-image">
                        <a href="#"><img src="assets/frontend/images/blog-img3.jpg" alt="image"></a>
                    </div>

                    <div class="post-content">
                        <h3><a href="#">منابع موجود را بهبود بخشیم</a></h3>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                            صنعت بوده است</p>
                        <a href="#" class="read-more-btn">ادامه خواندن <i class="flaticon-left-chevron"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->

<!-- Start Instagram Feed Area -->
<section class="instagram-feed-area bg-faf5f5">
    <div class="container">
        <div class="section-title">
            <span class="sub-title"><a href="#">موضوعات ما</a></span>
            <h2>ما را در اینستاگرام دنبال کنید</h2>
        </div>
    </div>

    <div class="instagram-feed-slides owl-carousel owl-theme">
        <div class="single-instagram-item">
            <img src="assets/frontend/images/projects-img1.jpg" alt="image">

            <span class="instagram-icon">
                        <span class="fab fa-instagram"></span>
                    </span>

            <a href="#"></a>
        </div>

        <div class="single-instagram-item">
            <img src="assets/frontend/images/projects-img2.jpg" alt="image">

            <span class="instagram-icon">
                        <span class="fab fa-instagram"></span>
                    </span>

            <a href="#"></a>
        </div>

        <div class="single-instagram-item">
            <img src="assets/frontend/images/projects-img3.jpg" alt="image">

            <span class="instagram-icon">
                        <span class="fab fa-instagram"></span>
                    </span>

            <a href="#"></a>
        </div>

        <div class="single-instagram-item">
            <img src="assets/frontend/images/projects-img4.jpg" alt="image">

            <span class="instagram-icon">
                        <span class="fab fa-instagram"></span>
                    </span>

            <a href="#"></a>
        </div>

        <div class="single-instagram-item">
            <img src="assets/frontend/images/projects-img5.jpg" alt="image">

            <span class="instagram-icon">
                        <span class="fab fa-instagram"></span>
                    </span>

            <a href="#"></a>
        </div>

        <div class="single-instagram-item">
            <img src="assets/frontend/images/projects-img6.jpg" alt="image">

            <span class="instagram-icon">
                        <span class="fab fa-instagram"></span>
                    </span>

            <a href="#"></a>
        </div>
    </div>
</section>
<!-- End Instagram Feed Area -->

@include('site.layout.footer')
