@extends('layouts.master2')
@section('css')
@endsection
@section('title')
@endsection
@section('content')
    <!-- Slider Section Start !-->
    <div class="slider-area style-2" id="slider-area" style="background-image: url('main/images/slider/home-slider-img1.png')">
        <div class="slider-wrapper">
            @forelse ($sliders as $slider)
            <div class="single-slider-wrapper">
                <div class="single-slider">
                    <div class="slider-overlay"></div>
                    <div class="top-shape"><img src="main/images/header-slider-2/shape1.svg" alt="Shape"></div>
                    <div class="bottom-shape"><img src="main/images/header-slider-2/shape2.svg" alt="Shape"></div>
                    <div class="container  align-self-center">
                        <div class="single-slider-inner">
                            <div class="row ">
                                <div class="col-md-7 col-12 align-self-center order-2 order-md-1">
                                    <div class="slider-content-wrapper">
                                        <div class="slider-content">
                                            <span class="slider-short-title">{{ $slider->main_title }}</span>
                                            {{ $slider->sub_title }}
                                            <h1 class="slider-title"><span>{{ $slider->details }}</span>
                                                </h1>
                                            <div class="slider-btn-wrapper style-2">
                                                <a href="" class="theme-btn style-1 bubble">تسجيل طلب عمرة</a>
                                                <a href="{{ route('contact_us') }}" class="theme-btn style-2 bubble">اتصل بنا</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 align-self-center order-1 order-md-2">
                                    <div class="slider-image">
                                        <div class="bottom-shape2"><img src="main/images/shape/ornament-dots.png" alt="">
                                        </div>
                                        <img style="width:500px; height:500px;" src="{{ $slider->image }}" alt="feature image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse

        </div>
    </div>


    <!-- Slider bottom Shape !-->
    <div class="slider-bottom-shape">
        <img src="{{ URL::asset('main/images/slider-3/Subtract.svg') }}" alt="">
    </div>

    <!-- Feature Area Start-->
    <div class="feature-area style-1">
        <div class="container">
            <div class="row gy-4  gy-lg-5 feature-area-wrapper">
                <div class="col-md-6 col-xl-3">
                    <!-- single info-card start -->
                    <div class="info-card ">
                        <div class="card-inner">
                            <div class="image-wrapper">
                                <img src="{{ URL::asset('main/images/feature/card-bg-4.jpg') }}" alt="">
                            </div>
                            <div class="content-wrapper">
                                <div class="title-wrapper">
                                    <div class="icon">
                                        <i class="icon-star"></i>
                                    </div>
                                    <h3><a href="#" class="title">رؤيتنا</a></h3>
                                </div>
                                <div class="content">
                                    <p class="desc">{{ $charity->vision ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="read-more">
                            <a href="#">
                                <span class="icon">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- single info-card End-->
                </div>
                <div class="col-md-6 col-xl-3">
                    <!-- single info-card start -->
                    <div class="info-card ">
                        <div class="card-inner">
                            <div class="image-wrapper">
                                <img src="{{ URL::asset('main/images/feature/card-bg-2.jpg') }}" alt="">
                            </div>
                            <div class="content-wrapper">
                                <div class="title-wrapper">
                                    <div class="icon">
                                        <i class="icon-messages"></i>
                                    </div>
                                    <h3><a href="#" class="title">رسالتنا</a></h3>
                                </div>
                                <div class="content">
                                    <p class="desc">{{ $charity->message ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="read-more">
                            <a href="#">
                                <span class="icon">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- single info-card End-->
                </div>
                <div class="col-md-6 col-xl-3">
                    <!-- single info-card start -->
                    <div class="info-card ">
                        <div class="card-inner">
                            <div class="image-wrapper">
                                <img src="{{ URL::asset('main/images/feature/card-bg-3.jpg') }}" alt="">
                            </div>
                            <div class="content-wrapper">
                                <div class="title-wrapper">
                                    <div class="icon">
                                        <i class="icon-gift-box"></i>
                                    </div>
                                    <h3><a href="#" class="title">قيمنا</a></h3>
                                </div>
                                <div class="content">
                                    <p class="desc">{{ $charity->message ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="read-more">
                            <a href="#">
                                <span class="icon">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- single info-card End-->
                </div>
                <div class="col-md-6 col-xl-3">
                    <!-- single info-card start -->
                    <div class="info-card ">
                        <div class="card-inner">
                            <div class="image-wrapper">
                                <img src="{{ URL::asset('main/images/feature/card-bg-1.jpg') }}" alt="">
                            </div>
                            <div class="content-wrapper">
                                <div class="title-wrapper">
                                    <div class="icon">
                                        <i class="icon-family-home"></i>
                                    </div>
                                    <h3><a href="#" class="title">أهدافنا</a></h3>
                                </div>
                                <div class="content">
                                    <p class="desc">{{ $charity->objective ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="read-more">
                            <a href="#">
                                <span class="icon">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- single info-card End-->
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Area End !-->

    <!-- About us Area Start -->
    <div class="about-us-area style-1" id="about-us-area">
        <div class="heart-sketch"><img src="{{ URL::asset('main/images/about/heart.png') }}" alt="sketch"></div>
        <div class="container">
            <div class="row gy-5 align-content-center">
                <div class="col-xl-7 col-12 ">
                    <!-- About Us Image Wrapper Start -->
                    <div class="about-us-image-wrapper">
                        <div class="shape-1"><img src="{{ URL::asset('main/images/about/circle.png') }}" alt="shape">
                        </div>
                        <div class="first-wrapper">
                            <div class="image-1">
                                <div class="sketch-1"><img src="{{ URL::asset('main/images/about/ornament.png') }}"
                                        alt="shape"></div>
                                <div class="sketch-2"><img src="{{ URL::asset('main/images/about/half-circl.png') }}"
                                        alt="shape"></div>
                                <div class="img-wrapper"><img src="{{ URL::asset('main/images/about/img-1.jpg') }}"
                                        alt="about-us"></div>
                            </div>
                            <div class="image-2">
                                <div class="sketch-3"><img src="{{ URL::asset('main/images/about/half-circl-2.png') }}"
                                        alt="shape"></div>
                                <div class="img-wrapper"><img src="{{ URL::asset('main/images/about/img-2.jpg') }}"
                                        alt="about-us"></div>
                            </div>
                        </div>
                        <div class="second-wrapper">
                            <div class="image-3">
                                <div class="img-wrapper"><img src="{{ URL::asset('main/images/about/img-3.png') }}"
                                        alt="about-us"></div>
                            </div>
                            <div class="image-4">
                                <div class="img-wrapper"><img src="{{ URL::asset('main/images/about/img-4.jpg') }}"
                                        alt="about-us"></div>
                            </div>
                        </div>
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
                                        <div class="inner">
                                            <p><span class="counter">380</span>+</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="section-title">
                            <span class="short-title">جمعية الدعوة بالمزاحمية</span>
                            <h2 class="title">التعريف بالجمعية</h2>
                            <p class="desc">{{ $charity->description ?? '-' }}</p>
                        </div>
                        <div class="about-us-list">
                            <div class="list-item">
                                <div class="icon"><img src="{{ URL::asset('main/images/about/icon-home.png') }}"
                                        alt="icon"></div>
                                <div class="content-wrapper">
                                    <h5 class="title">من نحن</h5>
                                    <p class="desc">{{ $charity->description ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="icon">
                                    <img src="{{ URL::asset('main/images/about/icon-hand.png') }}" alt="icon">
                                </div>
                                <div class="content-wrapper">
                                    <h5 class="title">الفئات المستهدفة</h5>
                                    <p class="desc">{{ $charity->description ?? '-' }}</p>
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
                        <span>K</span>
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
                        <span>K</span>
                    </div>
                    <p class="title m-0">شؤكائنا</p>
                </div>
                <!-- Single Counter End -->
            </div>
        </div>
    </div>
    <!-- Counter Area End -->

    <!-- Client Area Start -->
    <div class="client-area style-1">
        <div class="container">
            <div class="client-container-wrapper" style="background-image: url('images/client-area/pattern.png')">
                <img class="feature-image" src="{{ URL::asset('main/images/client-area/feature-image.svg') }}"
                    alt="feature-image">
                <img class="feature-image2" src="{{ URL::asset('main/images/client-area/feature-image2.png') }}"
                    alt="feature-image2">
                @php $counter = 0; @endphp

                <div class="top-client-wrapper">
                    @forelse ($partners as $partner)
                        @if ($counter < 5)
                            <div class="img-wrapper">
                                <a href="{{ $partner->link }}">
                                    <img style="width:160px; height:100px;" src="{{ URL::asset($partner->logo) }}"
                                        alt="{{ $partner->name }}">
                                </a>
                            </div>
                        @endif
                        @php $counter++; @endphp

                        @if ($counter == 5)
                </div> <!-- Close top-client-wrapper -->
                <div class="bottom-client-wrapper">
                    @endif

                    @if ($counter >= 5 && $counter < 10)
                        <div class="img-wrapper">
                            <a href="{{ $partner->link }}">
                                <img style="width:160px; height:100px;" src="{{ URL::asset($partner->logo) }}"
                                    alt="{{ $partner->name }}">
                        </div>
                    @endif
                @empty
                    <p>No partners available.</p>
                    @endforelse
                </div> <!-- Close bottom-client-wrapper -->


            </div>
        </div>
    </div>
    <!-- Client Area End -->
    <!--Causes Area Style-1 Start -->
    <div class="causes-area style-1" id="causes-area">
        <div class="feature-shape"><img src="{{ URL::asset('main/images/causes-area/circle.png') }}" alt="Shape">
        </div>
        <div class="feature-shape-2"><img src="{{ URL::asset('main/images/causes-area/heart.png') }}" alt="Shape">
        </div>
        <div class="container">
            <div class="title-area">
                <div class="section-title">
                    <span class="short-title">مشاريعنا</span>
                    <h2 class="title">أحدث مشاريع الجمعية</h2>
                </div>
                <div class="btn-wrapper"><a href="{{ route('projects') }}" class="theme-btn style-6 bubble">جميع
                        المشاريع</a></div>
            </div>
            <div class="causes-slider">
                @forelse ($projects as $project)
                    <div class="causes-card">
                        <div class="image-wrapper">
                            <a href="{{ route('project_details', $project->id) }}"><img
                                    style="width:416px; height:250px;" src="{{ URL::asset($project->image) }}"
                                    alt="profile-img"></a>
                            <div class="skill-progressbar">
                                <div class="progress-inner" data-percentage="84%">
                                    <div class="progress-content-outter">
                                        <div class="progress-content"></div>
                                    </div>
                                    <div class="progress-inner-item">
                                        <div class="goals">
                                            <p class="title">الهدف</p>
                                            <p class="price">{{ $project->cost }}</p>
                                        </div>
                                        <span class="progress-number-count">
                                            <span class="progress-percent"></span>
                                        </span>
                                        <div class="raised">
                                            <p class="title">الوصول</p>
                                            <p class="price">{{ $project->cost }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="btn-section">
                                <p class="badge-btn">{{ $project->category }}</p>
                                <div class="support">
                                    <div class="icon">
                                        <img src="{{ URL::asset('main/images/shape/hand-icon.png') }}" alt="icon">
                                    </div>
                                    <div class="support-text">
                                        {{-- <h6>15+</h6> --}}
                                        <p>{{ $project->date }}</p>
                                    </div>
                                </div>
                            </div>
                            <h3 class="title"><a href="">{{ $project->name }}</a></h3>
                            <p class="desc">{{ $project->description }}</p>
                        </div>
                    </div>
                @empty
                @endforelse



            </div>
        </div>
    </div>
    <!--Causes Area Style-1 End -->

    <!-- Donate-area style-1 Card section start !-->
    <div class="donate-area style-1" style="background-image: url('images/section-bg/donate-area.png')">
        <div class="feature-shape"><img src="{{ URL::asset('main/images/donate-area/spiral.svg') }}" alt="Shape">
        </div>
        <div class="sketch-1"><img src="{{ URL::asset('main/images/shape/slice-white.png') }}" alt="sketch"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="row gy-4 justify-content-between">
                <div class="col-lg-5 order-2 order-lg-1">
                    <div class="section-title">
                        <span class="short-title">قريبا...</span>
                        {{-- <h2 class="title">Let’s donate to needy people for better lives</h2>
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget augue lorem
                            ipsum dolor sit amet, con secte adipis elitui sque eget augue.Lorem ipsum dolor sit amet, con
                            sectetur adipiscing elit. Quisque eget augue ante, sed bibendum.</p> --}}
                    </div>
                    {{-- <div><a class="theme-btn style-1 bubble" href="">تسجبل طلب </a></div> --}}
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="donate-form">
                        <p class="sub-title">تسجيل طلب عمرة</p>
                        <h2 class="typewrite form-title " data-period="1500"
                            data-type='[ "تسجيل طلب عمرة","سجل الان","تسجيل طلب عمرة" ]'>سجل الان</h2>
                        <p class="desc">قريبا.</p>
                        {{-- <div class="progress-wrapper">
                            <div class="donate-skill-progressbar">
                                <div class="progress-inner" data-percentage="50%">
                                    <div class="sub-title">
                                        <span>Goals</span>
                                        <span>Raised</span>
                                    </div>
                                    <div class="title-wrapper">
                                        <h5 class="title">$82,000</h5>
                                        <h5 class="title">$75,000</h5>
                                    </div>
                                    <div class="progress-content-outter">
                                        <div class="progress-content"></div>
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="input-wrapper">
                            <span class="input-icon"><i class="fa-solid fa-dollar-sign"></i></span>
                            <input type="text" class="donate-input-field" id="donate-input-field"
                                placeholder="Selected Value">
                        </div>
                        <ul id="value-list" class="value-list">
                            <li class="value">$15</li>
                            <li class="value">$25</li>
                            <li class="value">$50</li>
                            <li class="value active">$100</li>
                            <li class="value">$250</li>
                            <li class="value">$350</li>
                            <li class="value">$400</li>
                            <li class="value" id="custom-amount">Set amount</li>
                        </ul>
                        <div><button type="submit" class="theme-btn style-2 bubble-yellow"> Donate Now</button></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate-area style-1 Card section end !-->


    <!-- Event Slider Area Start -->
    <div class="event-slider style-1" id="event-slider">
        <img class="shape-1" src="{{ URL::asset('main/images/causes-area/shape-1.svg') }}" alt="Shape">
        <div class="container">
            <div class="row gy-5">
                <div class=" col-12 col-lg-4 section-title">
                    <span class="short-title">احدث فعاليات الجمعية</span>
                    <h2 class="title">فعالياتنا</h2>
                    <p class="desc">استكشف فعاليات
                    </p>
                    <a class="theme-btn style-6 bubble" href="{{ route('events') }}">رؤية كافة الفعاليات</a>
                </div>
                <div class="col-12 col-lg-8 event-slider-wrapper">
                    <div class="home-three-review-slider">
                        @forelse ($events as $event)
                            <div class="event-single-card">
                                <div class="image-wrapper">
                                    <a href=""><img
                                            style="width:416px; height:500px;"src="{{ URL::asset($event->image) }}"
                                            alt=""></a>
                                </div>
                                <div class="card-content-inner">
                                    <div class="banner">

                                        <p class="date m-0">{{ $event->type }} </p>
                                        <p class="name-of-date m-0"> {{ $event->date }}</p>
                                    </div>
                                    <div class="content">
                                        <h3 class="content-title"><a href="">{{ $event->name }}</a>
                                        </h3>
                                        <div class="schedule">
                                            <div class="single-item">
                                                <i class="fa-regular fa-clock"></i>
                                                <p> {{ $event->date }}</p>
                                            </div>
                                            <div class="single-item">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p>{{ $event->location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="button-link"><i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @empty
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Slider Area End -->



    <!-- Blog-area Style-1 Start -->
    <div class="blog-area style-1">
        <img class="shape-1" src="{{ URL::asset('main/images/blog/shape-1.svg') }}" alt="Shape">
        <img class="shape-2" src="{{ URL::asset('main/images/blog/shape-2.svg') }}" alt="Shape">
        <img class="shape-3" src="{{ URL::asset('main/images/blog/shape-3.svg') }}" alt="Shape">
        <img class="shape-4" src="{{ URL::asset('main/images/blog/shape-4.svg') }}" alt="Shape">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-12">
                    <div class="section-title">
                        <span class="short-title">أخبارنا</span>
                        <h2 class="title">أخبار & مقالات</h2>
                        <p class="desc">اخبار الجمعية.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-md-start justify-content-lg-end">
                @forelse ($news as $new)
                    <div class="col-md-6 ">
                        <!-- Single Blog Card Start -->
                        <div class="blog-card">
                            <div class="image-wrapper">
                                <a href=""><img
                                        style="width:416px; height:416px;"src="{{ URL::asset($new->image) }}"
                                        alt="blog"></a>
                                <div class="tag">
                                    <h6>{{ $new->date }}</h6>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <h3><a href="" class="title">{{ $new->brive_new }}</a></h3>
                                <p class="desc">{{ $new->whole_new }}</p>
                            </div>

                        </div>
                        <!-- Single Blog Card End -->
                    </div>


                @empty
                @endforelse



            </div>
        </div>
    </div>
    <!-- Blog-area Style-1 End -->

    <!-- Testimonial Slider Area Start -->
    <div class="testimonial-slider-area style-3" style="background-image: url('images/testimonial/bg.jpg')">
        <img class="top-feature-icon" src="{{ URL::asset('main/images/shape/curlly3.png') }}" alt="Shape">
        <div class="popup-video-wrapper2">
            <div class="video-btn2" style="background-image: url('images/testimonial/play-button.svg')">
                <a href="" class="mfp-iframe video-play"><i class="fa-solid fa-play" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="container p-0">
            <div class="row m-0">
                <div class="col-lg-7 col-12 p-0">
                    <div class="slider-inner">
                        <img class=" bottom-feature-icon" src="{{ URL::asset('main/images/shape/slice.png') }}"
                            alt="Shape">
                        <div class="testimonial-slider-wrapper has-backgorund-slider style-3"
                            id="testimonial_slider-area-3">
                            @forelse ($videos as $video)
                                <div class="slider-card">
                                    <div class="quote-text"><i class="fa-solid fa-quote-right"></i></div>
                                    <div class=" section-title">
                                        <a href="{{ $video->link }}">
                                            <span class="short-title">{{ $video->name }}</span>
                                            <h2 class="title m-0">{{ $video->title }}</h2>
                                            <p class="desc m-0">“{{ $video->description }}
                                                “.
                                            </p>
                                        </a>
                                        <div class="meta-user">
                                            <div class="user-image"><img
                                                    src="{{ URL::asset('main/images/testimonial/user1.jpg') }}"
                                                    alt="user" /></div>
                                            <div class="info">
                                                <h2>{{ $video->date }}</h2>
                                                <p>{{ $video->type }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio-area style-1">
        <div class="protfolio-inner">
            @forelse ($gallery as $image)
                <div class="img-content-wrapper">
                    <img class="img-wrapper" src="{{ URL::asset($image->imageUrl) }}" alt="portfolio-image">
                    <a class="content" href="#"><i class="fa-solid fa-link-simple"></i></a>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <div class="newsletter-area style-1">

        <div class="container">

        </div>
    </div>
@endsection
@section('js')
@endsection
