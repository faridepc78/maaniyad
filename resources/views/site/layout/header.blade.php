<!doctype html>
<html lang="fa">
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description"
          content="مانیاد,معماری,maaniyad">
    <meta name="keywords"
          content="مانیاد,معماری,maaniyad">
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
    <link type="text/css" rel="stylesheet" href="{{asset('assets/common/plugins/validation/css/validate.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/common/plugins/toast/css/toast.min.css')}}">
    <link type="text/css" rel="stylesheet"
          href="{{asset('assets/common/plugins/font-awesome/css/font-awesome.min.css')}}">

    @yield('site_css')

</head>

<body>

<div class="preloader">
    <div class="loader">
        <div class="shadow"></div>
        <div class="box"></div>
    </div>
</div>

<div class="navbar-area navbar-style-two">
    <div class="zovio-responsive-nav">
        <div class="container">
            <div class="zovio-responsive-menu">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img style="width: 50px;height: 50px" src="{{asset('assets/common/images/maaniyad.jpeg')}}"
                             alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="zovio-nav">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="{{route('home')}}">
                <img style="width: 50px;height: 50px" src="{{asset('assets/common/images/maaniyad.jpeg')}}" alt="logo">
            </a>

            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    @auth()
                        <li class="nav-item"><a target="_blank" href="{{route('dashboard')}}"
                                                class="nav-link">پنل مدیریت</a>
                        </li>
                    @endauth

                    <li class="nav-item"><a href="{{route('home')}}"
                                            class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">صفحه
                            اصلی</a>
                    </li>

                        <li class="nav-item"><a href="{{route('albums')}}" class="nav-link">آلبوم ها <i class="flaticon-down-chevron"></i></a>
                            <ul class="dropdown-menu">

                                @if (count($albums))

                                    @foreach($albums as $value)

                                        <li class="nav-item"><a href="javascript:void(0)" class="nav-link">{{$value->name}}</a>
                                            @if (count($value->sub))

                                                <ul class="dropdown-menu">

                                                    @foreach($value->sub as $item)

                                                        <li class="nav-item"><a href="{{$item->path()}}" class="nav-link">{{$item->name}}</a></li>

                                                    @endforeach

                                                </ul>

                                            @endif

                                        </li>

                                    @endforeach

                                @endif

                            </ul>
                        </li>

                    <li class="nav-item"><a href="{{route('projects')}}"
                                            class="nav-link {{ request()->routeIs(['projects','project','projects.search']) ? 'active' : '' }}">پروژه
                            ها</a>
                    </li>

                    <li class="nav-item"><a href="{{route('blog')}}"
                                            class="nav-link {{ request()->routeIs(['blog','blog.category','blog.post','blog.search']) ? 'active' : '' }}">وبلاگ</a>
                    </li>

                    <li class="nav-item"><a href="{{route('about-us')}}"
                                            class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}">درباره
                            ما</a>
                    </li>

                    <li class="nav-item"><a href="{{route('contact-us')}}"
                                            class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}">تماس
                            با ما</a>
                    </li>

                        <li class="nav-item"><a href="{{route('agency')}}"
                                                class="nav-link {{ request()->routeIs('agency') ? 'active' : '' }}">درخواست نمایندگی فروش</a>
                        </li>

                </ul>

                <div class="others-options">

                    <div class="option-item"><i class="search-btn flaticon-search"></i>
                        <i class="close-btn fas fa-times"></i>

                        <div class="search-overlay search-popup">
                            <div class='search-box'>
                                <form id="search_form" class="search-form" method="get"
                                      action="{{route('projects.search')}}">
                                    <input id="search" value="{{request()->input('search')}}"
                                           onkeyup="this.value=removeSpaces(this.value)" class="search-input"
                                           name="search" placeholder="جستجو" type="search">

                                    <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </nav>
    </div>
</div>
