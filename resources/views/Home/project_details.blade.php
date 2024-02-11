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
                                <li><a href="index.html">الصفحة الرئيسية</a></li>
                                <li class="active"><a href="#">مشاريعنا</a></li>
                            </ul>
                        </div>
                        <div class="page-heading">
                            <h2 class="page-title">تفاصيل المشروع</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End !-->

    <!-- Causes Details Area Start -->
    <div class="causes-details-area style-1">
        <div class="feature-icon1">
            <img src="{{ URL::asset('main/images/shape/curlly.png') }}" alt="Shape">
        </div>
        <div class="feature-icon2">
            <img src="{{ URL::asset('main/images/shape/wave.png') }}" alt="Shape">
        </div>
        <div class="page-area">
            <div class="container">
                <div class="page-content-wrapper">
                    <article class="single-post-item style-1">
                        <div class="post-thumbnail">
                            <a href="#">
                                <img src="{{ URL::asset($project->image) }}" alt="Blog Image" />
                            </a>
                        </div>
                        <div class="post-content-wrapper">
                            <h2 class="post-title">
                                <a href="blog-details.html">{{ $project->name }}</a>
                            </h2>


                            <div class="post-content">
                                <blockquote>
                                    <p>“{!! $project->description !!}”</p>
                                    <footer>وصف المشروع</footer>
                                </blockquote>
                                <blockquote>
                                    <p>“{!! $project->objective !!}”</p>
                                    <footer>اهداف المشروع</footer>
                                </blockquote>
                                <blockquote>
                                    <p>“{{ $project->category }}”</p>
                                    <footer>فئة المشروع</footer>
                                </blockquote>


                            </div>
                        </div>
                    </article>
                </div>
                <div class="author-profile">
                    <div class="content">

                        <div class="goals_actions-inner">
                            <div class="goals_actions-content">

                                <div class="goals">
                                    <h1>الجهة الداعمة</h1>
                                    <h2><span>{{ $project->suppport_party }}</span></h2>
                                </div>
                                <div class="divider">
                                    <div class="outline"></div>
                                </div>
                                <div class="goals">
                                    <h1>التاريخ</h1>
                                    <h2><span>{{ $project->date }}</span></h2>
                                </div>
                                <div class="divider">
                                    <div class="outline"></div>
                                </div>
                                <div class="goals">
                                    <h1>الهدف</h1>
                                    <h2>$<span class="counter">{{ $project->cost }}</span></h2>
                                </div>
                                <div class="divider">
                                    <div class="outline"></div>
                                </div>
                                <div class="actions">
                                    <h1>الوصول</h1>
                                    <h2>$<span class="counter">{{ $project->cost }}</span></h2>
                                </div>
                                <div class="divider">
                                    <div class="outline"></div>
                                </div>
                                <div class="actions">
                                    <h1>ملف المشروع</h1>
                                    <div class="button">
                                        <a href="{{ route('download_pro', $project->id) }}"
                                            class="theme-btn style-1 bubble">تحميل</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tags-content">

                    <p>{{ $project->note }}</p>

                </div>
            </div>
        </div>
    </div>
    <!-- Causes Details Area End -->
@endsection
@section('js')
@endsection
