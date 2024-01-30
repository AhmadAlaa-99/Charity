<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta name="description" content="Donik - Charity & Fundraising HTML5 Template" />
    <meta name="keywords"
        content="charity, fundraising, donate today, give back, support, donation drive, community support, kindness, charitable Cause, helping hand, humanity, charity work, financial support, charity event, supporting veterans, donors" />
    <meta name="author" content="BoomDevs" />

    <title>جمعية الدعوة بالمزاحمية</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('main/images/logo/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ URL::asset('main/images/logo/apple-touch-icon.png') }}" />
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ URL::asset('main/images/logo/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ URL::asset('main/images/logo/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ URL::asset('main/images/logo/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ URL::asset('main/images/logo/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ URL::asset('main/images/logo/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ URL::asset('main/images/logo/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ URL::asset('main/images/logo/apple-touch-icon-152x152.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ URL::asset('main/images/logo/apple-touch-icon-180x180.png') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,600&family=PT+Sans:wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Vujahday+Script&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('main/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('main/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('main/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('main/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('main/css/meanmenu.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('main/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('main/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('main/css/style.css') }}" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    {{-- <!-- Preloader Start !-->
    <div id="preloader">
        <div id="preloader-status">
            <img src="{{ URL::asset('main/images/preloader.svg')}}" alt="Preloader">
        </div>
    </div>
    <!-- Preloader End !--> --}}
 <!-- Header Start !-->
 <header class="header-area style-2">
    <div class="header-menu-area sticky-header">
        <div class="container">
            <div class="header-menu-area-inner">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-6 d-flex align-items-center">
                        <div class="logo">
                            <a href="index.html" class="standard-logo"><img
                                    src="{{ URL::asset('main/images/logo/logo.png') }}" alt="logo" /></a>
                            <a href="index.html" class="sticky-logo"><img
                                    src="{{ URL::asset('main/images/logo/logo4.png') }}" alt="logo" /></a>
                            <a href="index.html" class="retina-logo"><img
                                    src="{{ URL::asset('main/images/logo/logo.png') }}" alt="logo" /></a>
                        </div>
                    </div>
                    <div
                        class="col-xl-9 col-lg-9 col-md-6 col-6 d-flex align-items-center justify-content-between">
                        <div class="menu d-inline-block">
                            <nav id="main-menu" class="main-menu">
                                <ul>
                                    <li class="active">
                                        <a href="{{ route('welcome') }}">الرئيسية</a>
                                    </li>
                                    <li><a href="{{ route('about_us') }}">من نحن </a></li>
                                    <li><a href="{{route('projects')}}">مشاريعنا</a></li>
                                    <li><a href="{{route('events')}}">فعالياتنا</a></li>
                                    <li><a href="{{ route('contact_us') }}">اتصل بنا</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Button Start !-->
                        <a href="donation-details.html" class="header-btn style-1 bubble">تسجيل طلب عمرة</a>
                        <!-- Header Button Start !-->
                        <!-- Mobile Menu Toggle Button Start !-->
                        <div class="mobile-menu-bar  text-end">
                            <a href="#" class="mobile-menu-toggle-btn"><i class="fal fa-bars"></i></a>
                        </div>
                        <!-- Mobile Menu Toggle Button End !-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End !-->
    <!-- Header Start !-->



    <!-- Menu Sidebar Section Start -->
    <div class="menu-sidebar-area">
        <div class="menu-sidebar-wrapper">
            <div class="menu-sidebar-close">
                <button class="menu-sidebar-close-btn" id="menu_sidebar_close_btn"><i
                        class="fal fa-times"></i></button>
            </div>
            <div class="menu-sidebar-content">
                <div class="menu-sidebar-logo">
                    <a href="index.html"><img src="{{ URL::asset('main/images/logo/logo4.png') }}"
                            alt="logo" /></a>
                </div>
                <div class="mobile-nav-menu"></div>
                <div class="menu-sidebar-content">
                    <div class="menu-sidebar-single-widget">
                        <h5 class="menu-sidebar-title">Contact Info</h5>
                        <div class="header-contact-info">
                            <span><i class="fa-solid fa-location-dot"></i>{{ $charity->address ?? '' }}</span>
                            <span><a href="mailto:hello@donik.com"><i
                                        class="fa-solid fa-envelope"></i>{{ $charity->email ?? '' }}</a></span>
                            <span><a href="tel:+123-456-7890"><i
                                        class="fa-solid fa-phone"></i>{{ $charity->phone ?? '' }}</a></span>
                        </div>
                        <div class="social-profile">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Sidebar Section Start -->
    <div class="body-overlay"></div>

    @yield('content')

    <!-- Footer start -->
    <footer class="footer">
        <div class="footer-sec">
            <div class="shape-1"><img src="{{ URL::asset('main/images/footer/shape-1.png') }}" alt="Shape"></div>
            <div class="shape-2"><img src="{{ URL::asset('main/images/shape/footer-slice-white.png') }}"
                    alt="Shape"></div>
            <div class="container">
                <div class="footer-widget-wrapper">
                    <div class="footer-widget mb-30">
                        <div class="footer-widget-info">
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ URL::asset('main/images/logo/logo.png') }}"
                                        alt="Footer Logo" /></a>
                            </div>
                            <p>{{ $charity->description ?? '' }}</p>
                            <div class="social-profile">
                                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                                <a href=""><i class="fa-brands fa-twitter"></i></a>
                                <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href=""><i class="fa-brands fa-pinterest-p"></i></a>
                                <a href=""><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget mb-30">
                        <h2 class="footer-widget-title">خدماتنا</h2>
                        <div class="footer-widget-menu">
                            <ul>
                                <li><a href=""> - </a></li>
                                <li><a href=""> - </a></li>
                                <li><a href=""> - </a></li>
                                <li><a href=""> - </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-widget mb-30">
                        <h2 class="footer-widget-title">روابط صديقة</h2>
                        <div class="footer-widget-menu">
                            <ul>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-widget mb-30">
                        <h2 class="footer-widget-title">تواصل معنا</h2>
                        <div class="footer-widget-contact">
                            <div class="footer-contact">
                                <ul>
                                    <li class="address">
                                        <div class="contact-icon">
                                            <i class="icon-location-bold "></i>
                                        </div>
                                        <div class="contact-text">
                                            <p>{{ $charity->address ?? '' }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-icon">
                                            <i class="fa-regular fa-envelope"></i>
                                        </div>
                                        <div class="contact-text">
                                            <a href="mailto:hello@example.com">{{ $charity->email ?? '' }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-icon">
                                            <i class="icon-phone "></i>
                                        </div>
                                        <div class="contact-text">
                                            <a href="">{{ $charity->phone ?? '' }}</a>
                                            <a href="">{{ $charity->phone ?? '' }}</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-border"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-text">
                            <p>© 2024 <span>جميعة الدعوى</span> جميع حقوق النشر محفوظة</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer-bottom-menu">
                            <ul class="p-0">
                                <li><a href="#">Ways to donate by</a></li>
                            </ul>
                            <div class="card-wrapper">
                                <a href="#"><img src="{{ URL::asset('main/images/footer/paypal.jpg') }}"
                                        alt="card"></a>
                                <a href="#"><img src="{{ URL::asset('main/images/footer/apple-pay.jpg') }}"
                                        alt="card"></a>
                                <a href="#"><img src="{{ URL::asset('main/images/footer/visa.jpg') }}"
                                        alt="card"></a>
                                <a href="#"><img src="{{ URL::asset('main/images/footer/master.jpg') }}"
                                        alt="card"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--- End Footer !-->

    <!-- Scroll Up Section Start -->
    <div id="scrollTop" class="scrollup-wrapper">
        <div class="scrollup-btn style-1">
            <i class="fa-solid fa-arrow-up"></i>
        </div>
    </div>
    <!-- Scroll Up Section End -->

    <script src="{{ URL::asset('main/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/slick.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/waypoints.js') }}"></script>
    <script src="{{ URL::asset('main/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/inview.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/wow.js') }}"></script>
    <script src="{{ URL::asset('main/js/tilt.jquery.js') }}"></script>
    <script src="{{ URL::asset('main/js/jquery-parallax.js') }}"></script>
    <script src="{{ URL::asset('main/js/TweenMax.min.js') }}"></script>
    <script src="{{ URL::asset('main/js/custom.js') }}"></script>
</body>

</html>
