@extends('layouts.app')
@section('login')
<style>
.btn:hover {
    color: var(--bs-btn-hover-color);
    background-color: #b1822c;
    border-color: #b1822c;
}
.btn-primary {
    --bs-btn-color: #fff;
    --bs-btn-bg: #b1822c;
    --bs-btn-border-color: #b1822c;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #0b5ed7;
    --bs-btn-hover-border-color: #0a58ca;
    --bs-btn-focus-shadow-rgb: 49, 132, 253;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #0a58ca;
    --bs-btn-active-border-color: #0a53be;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #b1822c;
    --bs-btn-disabled-border-color: #b1822c;
}
</style>

    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img

                                                src="{{ URL::asset('dashboard/images/favicon.png') }}"alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">تسجيل الدخول</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>البريد الالكتروني</strong></label>
                                            <input id="email" type="email" class="form-control"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>كلمة السر</strong></label>
                                            <input type="password" class="form-control" value="Password" id="password"
                                                type="password" class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">


                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
