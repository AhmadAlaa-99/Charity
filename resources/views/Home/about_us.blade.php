@extends('layouts.master2')
@section('css')
@endsection
@section('title')
@endsection
@section('content')
    <!-- Breadcrumb Start !-->
    <div class="page-breadcrumb-area page-bg" style="background-image: url('images/breadcrumb/bg.jpg')">
        <div class="page-overlay"></div>
        <div class="feature-shape1"><img src="{{ URL::asset('main/images/breadcrumb/elements.png') }}" alt="Shape"></div>
        <div class="feature-shape2"><img src="{{ URL::asset('main/images/shape/wave-white.png') }}" alt="Shape"></div>
        <div class="feature-shape3"><img src="{{ URL::asset('main/images/shape/footer-slice-white.png') }}" alt="Shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="index.html">الصفحة الرئيسية</a></li>
                                <li class="active"><a href="#">عن الجمعية</a></li>
                            </ul>
                        </div>
                        <div class="page-heading">
                            <h2 class="page-title">من نحن</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- About us Area Start -->
  <div class="about-us-area style-1" id="about-us-area">
    <div class="heart-sketch"><img src="{{ URL::asset('main/images/about/heart.png') }}" alt="sketch"></div>
    <div class="container">
        <div class="row gy-5 align-content-center">
            <div class="col-xl-7 col-12 ">
                <!-- About Us Image Wrapper Start -->
                <div class="about-us-image-wrapper">
                    @if ($events->count() > 0)
                        <div class="first-wrapper">
                            @if ($events[0])
                                <div class="image-1">
                                    <div class="img-wrapper"><img src="{{ URL::asset($events[0]->image) }}"
                                            alt="about-us"></div>
                                </div>
                            @endif
                            @if ($events->count() > 1)
                                <div class="image-2">
                                    <div class="img-wrapper"><img src="{{ URL::asset($events[1]->image) }}"
                                            alt="about-us"></div>
                                </div>
                            @endif
                        </div>

                        <div class="second-wrapper">
                            @if ($events->count() > 2)
                                <div class="image-3">
                                    <div class="img-wrapper"><img src="{{ URL::asset($events[2]->image) }}"
                                            alt="about-us"></div>
                                </div>
                            @endif
                            @if ($events->count() > 3)
                                <div class="image-4">
                                    <div class="img-wrapper"><img src="{{ URL::asset($events[3]->image) }}"
                                            alt="about-us"></div>
                                </div>
                            @endif
                        </div>
                    @else
                        <p>No recent events to display.</p>
                    @endif

                </div>
                <!-- About Us Image Wrapper End -->
            </div>
            <div class="col-xl-5 col-12">
                <!-- About Us Content Wrapper Start -->
                <div class="about-us-content-wrapper">
                    <a href="" class="mfp-iframe video-play">
                        <div class="certified-wrapper">
                            <div class="certified">
                                <div class="circle-wrapper">
                                    <div class="circle">
                                        <svg viewBox="0 0 100 100" width="160" height="160">
                                            <defs>
                                                <path id="circle"
                                                    d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0" />
                                            </defs>
                                            <text font-size="10" letter-spacing="1.4">
                                                <textPath href="">☆ م ت ط و ع ي ن م س ت ف ي د ي ن
                                                </textPath>
                                            </text>
                                        </svg>
                                    </div>
                                    {{-- <div class="inner">
                                        <p><span class="counter">380</span>+</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="section-title">
                        <span class="short-title">جمعية الدعوة بالمزاحمية</span>
                        <h2 class="title">التعريف بالجمعية</h2>

                    </div>
                    <div class="about-us-list">
                        <div class="list-item">
                            <div class="icon"><img src="{{ URL::asset('main/images/about/icon-home.png') }}"
                                    alt="icon"></div>
                            <div class="content-wrapper">
                                <h5 class="title">من نحن</h5>
                                <p class="desc">{!! $charity->description ?? '-' !!}</p>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="icon">
                                <img src="{{ URL::asset('main/images/about/icon-hand.png') }}" alt="icon">
                            </div>
                            <div class="content-wrapper">
                                <h5 class="title">نبذة عن الجمعية</h5>
                                <p class="desc">{!! $charity->description ?? '-' !!}</p>
                            </div>
                        </div>
                        <div class="about-btn">
                            <a href="" class="theme-btn style-6 bubble">تواصل معنا</a>
                        </div>
                    </div>
                </div>
                <!-- About Us Content Wrapper End -->
            </div>
        </div>
    </div>
</div>
<!-- About us Area End -->

      <!-- Counter Area Start -->
      <div class="counter-area style-2" style="background-image: url('images/counter-area/bg.jpg')">
        <img class="feature-image1" src="{{ URL::asset('main/images/counter-area/feature-image.png') }}"
            alt="feature-image1">
        <img class="feature-image2" src="{{ URL::asset('main/images/counter-area/feature-image2.png') }}"
            alt="feature-image2">
        <div class="container">
            <div class="counter-container-wrapper">
                <!-- Single Counter Start -->
                <div class="single-counter">
                    <img class="counter-icon" src="{{ URL::asset('main/images/counter-area/logo1.png') }}"
                        alt="counter-logo">
                    <div class="counter-inner">
                        <h2 class="counter m-0">{{ \App\Models\Event::count() }}</h2>
                        <span>+</span>
                    </div>
                    <p class="title m-0">الفعاليات</p>
                </div>
                <!-- Single Counter End -->
                <div class="divider">
                    <div class="outline"></div>
                </div>
                <!-- Single Counter Start -->
                <div class="single-counter">
                    <img class="counter-icon" src="{{ URL::asset('main/images/counter-area/logo2.png') }}"
                        alt="counter-logo">
                    <div class="counter-inner">
                        <h2 class="counter m-0">{{ \App\Models\Project::count() }}</h2>
                        <span>+</span>
                    </div>
                    <p class="title m-0">المشاريع</p>
                </div>
                <!-- Single Counter End -->
                <div class="divider style-2">
                    <div class="outline"></div>
                </div>
                <!-- Single Counter Start -->
                <div class="single-counter">
                    <img class="counter-icon" src="{{ URL::asset('main/images/counter-area/logo3.png') }}"
                        alt="counter-logo">
                    <div class="counter-inner">
                        <h2 class="counter m-0">{{ \App\Models\Employee::count() }}</h2>
                        <span>+</span>
                    </div>
                    <p class="title m-0">الموظفين</p>
                </div>
                <!-- Single Counter End -->
                <div class="divider">
                    <div class="outline"></div>
                </div>
                <!-- Single Counter Start -->
                <div class="single-counter">
                    <img class="counter-icon" src="{{ URL::asset('main/images/counter-area/logo4.png') }}"
                        alt="counter-logo">
                    <div class="counter-inner">
                        <h2 class="counter m-0">{{ \App\Models\Partner::count() }}</h2>
                        <span>+</span>
                    </div>
                    <p class="title m-0">شركائنا</p>
                </div>
                <!-- Single Counter End -->
            </div>
        </div>
    </div>
    <!-- Counter Area End -->
@endsection
@section('js')
@endsection
