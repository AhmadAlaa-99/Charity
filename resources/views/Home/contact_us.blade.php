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
                                <li class="active"><a href="#">اتصل بنا</a></li>
                            </ul>
                        </div>
                        <div class="page-heading">
                            <h2 class="page-title">اتصل بنا</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End !-->

    <!-- Contact-info Section Start !-->
    <div class="contact-info-area">
        <div class="feature-image">
            <img src="{{ URL::asset('main/images/shape/curlly.png') }}" alt="Shape">
        </div>
        <div class="container p-0">
            <div class="contact-wrapper">
                <div class="icon-card style-two">
                    <div class="icon">
                        <i class="icon-phone "></i>
                    </div>
                    <div class="content">
                        <h3 class="title">تحدث معنا</h3>
                        <a href="" class="desc">{{ $charity->phone ?? '-' }}</a>

                    </div>
                </div>
                <div class="icon-card style-two">
                    <div class="icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="content">
                        <h3 class="title">هل لديك سؤال?</h3>
                        <a href="mailto:support@website.com" class="desc">{{ $charity->email ?? '-' }}</a>

                    </div>
                </div>
                <div class="icon-card style-two">
                    <div class="icon">
                        <i class="icon-location-bold"></i>
                    </div>
                    <div class="content">
                        <h3 class="title">قم بزيارتنا في اي وقت</h3>
                        <p class="desc">{{ $charity->address ?? '-' }}</p>
                        <p class="desc">RA85600 New Avenue Road 51.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-info Section End -->

    <!-- Contact Form Start -->
    <div class="contact-form">
        <div class="container">
            <div class="row">
                <!-- Contact Form Section Start -->
                <div class="col-lg-5 col-12 contact-form-area">
                    <!-- Submit form Start -->
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="contact-title">
                                    <p class="sub-title">Get in touch</p>
                                    <p class="title">Send Us a Message</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <!-- Comment Form Start -->
                                <div class="comment-respond mt-45">
                                    <form action="#" method="post" class="comment-form">
                                        <div class="row gx-2">
                                            <div class="col-12">
                                                <div class="contacts-name">
                                                    <input name="author" type="text" placeholder="الاسم">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="contacts-email">
                                                    <input name="email" type="text" placeholder="البريد الالكتروني">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="contacts-name">
                                                    <input name="phone" type="text" placeholder="رقم الهاتف">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="contacts-name">
                                                    <input name="website" type="text" placeholder="نوع الاستفسار">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="contacts-message">
                                                    <textarea name="comment" cols="20" rows="3" placeholder="الرسالة"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="theme-btn bubble" type="submit">ارسال استفسار</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Comment Form End -->
                            </div>
                        </div>
                    </div>
                    <!-- Submit form End -->
                </div>
                <!-- Contact Form Section End -->

                <!-- Map start -->
                <div class="col-lg-7 col-12 contact-map-area">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="map-wedget">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115860.91759646642!2d89.28780421873043!3d24.84151459710791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fc54e7e81df441%3A0x27133ed921fe73f4!2sBogura!5e0!3m2!1sen!2sbd!4v1684842047185!5m2!1sen!2sbd"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Map end -->
            </div>
        </div>
    </div>
    <!-- Contact Form End -->

    <!-- Newsletter-area style-1 Start -->
    <div class="newsletter-area style-1">

        <div class="container">
            <div class="subscribe-form">

            </div>
        </div>
    </div>
    <!-- Newsletter-area style-1 End -->
@endsection
@section('js')
@endsection
