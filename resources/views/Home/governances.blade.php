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
                                <li class="active"><a href="#">الحوكمة</a></li>
                            </ul>
                        </div>
                        <div class="page-heading">
                            <h2 class="page-title">ملفات الحوكمة </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donor_Wall Area Start -->
    <div class="donor-wall-area style-1">
        {{-- <div class="feature-icon1"><img src="images/shape/curlly.png" alt="Shape"></div>
        <div class="feature-icon2"><img src="images/shape/wave.png" alt="Shape"></div> --}}
        <div class="container">
            <div class="row gy-4">
                @foreach ($governances as $governance)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="donor-profile">
                            <div class="image-wrapper">
                                <a href="donation-details.html"><img src="{{ URL::asset($governance->image) }}"
                                        alt="donor"></a>
                            </div>
                            <div class="donor-details">
                                <h6 class="name"> <a href="donation-details.html">{{ $governance->name }}</a></h6>
                                <p>{{ $governance->date }}</p>
                            </div>
                            <div class="divider"></div>
                            <div class="donate-amount">
                                <p>تحميل الملف:</p>
                                {{-- <h5>$<span class="counter">250.00</span></h5> --}}
                            </div>
                            <a href="donation-details.html">
                                <div class="button">
                                    <i class="fa-light fas fa-file"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- Donor_Wall Area End -->
@endsection
@section('js')
@endsection
