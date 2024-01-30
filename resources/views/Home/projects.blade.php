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
                                <li class="active"><a href="#">المشاريع</a></li>
                            </ul>
                        </div>
                        <div class="page-heading">
                            <h2 class="page-title">مشاريعنا </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="causes-area style-3">
        <div class="container">
            <div class="causes-slider-area style-3">
                <div class="row gy-4">
                    @foreach ($projects as $project )
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="causes-card-2">
                            <div class="image-wrapper">
                                <a href="{{ route('project_details',$project->id) }}"><img style="width:416px; height:250px;"
                                    src="{{ URL::asset($project->image) }}"
                                        alt="profile-img"></a>
                            </div>
                            <div class="content">
                                <p class="theme-btn style-1">{{ $project->category }}</p>
                                <h5 class="title"><a href="{{ route('project_details',$project->id) }}">{{ $project->name }}</a></h5>
                                <p class="decs">{{ $project->description }}</p>
                            </div>
                            <div class="skill-progressbar">
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
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            <!-- Causes Slider Area End -->
        </div>
    </div>
    <!-- Causes Area End -->
@endsection
@section('js')
@endsection
