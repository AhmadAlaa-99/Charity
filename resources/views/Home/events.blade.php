@extends('layouts.master2')
@section('css')
@endsection
@section('title')
@endsection
@section('content')
    <!-- Breadcrumb Start !-->
    <div class="page-breadcrumb-area page-bg" style="background-image: url('images/breadcrumb/bg.jpg')">
        <div class="page-overlay"></div>
        <div class="feature-shape1">
            <img src="{{ URL::asset('main/images/breadcrumb/elements.png') }}" alt="Shape">
        </div>
        <div class="feature-shape2">
            <img src="{{ URL::asset('main/images/shape/wave-white.png') }}" alt="Shape">
        </div>
        <div class="feature-shape3">
            <img src="{{ URL::asset('main/images/shape/footer-slice-white.png') }}" alt="Shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('welcome') }}">الصفحة الرئيسية</a></li>
                                <li class="active"><a href="#">الفعاليات</a></li>
                            </ul>
                        </div>
                        <div class="page-heading">
                            <h2 class="page-title">فعاليات الجميعة</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End !-->

    <!-- Event-area Style-1 Start -->
    <div class="event-area style-1">
        <div class="container">
            <div class="row gy-4">
                @foreach ($events as $event)
                <div class="col-lg-6">
                    <div class="event-card">
                        <div class="image-wrapper">
                            <img style="width:416px; height:500px;" src="{{ URL::asset($event->image) }}" alt="event">
                        </div>
                        <div class="content-wrapper">
                            <div class="meta-info">
                                <div class="single-meta">
                                    <i class="fa-regular fa-calendar-days"></i>
                                    <p class="meta-text">{{ $event->date }}</p>
                                </div>
                                <div class="single-meta">
                                    <i class="fa-regular fa-clock"></i>
                                    <p class="meta-text">{{ $event->location }}</p>
                                </div>
                                <div class="single-meta">
                                    <i class="icon-location-bold"></i>
                                    <p class="meta-text">{{ $event->type }}</p>
                                </div>
                            </div>
                            <h5 class="title">{{ $event->name }}</h5>
                            <p class="desc">{{ $event->brive }}</p>
                            <div class="event-card-btn">
                                <a class="theme-btn style-1 bubble" href="#">
                                   {{$event->notes}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="newsletter-area style-1">

        <div class="container">
            <div class="subscribe-form">

            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection
