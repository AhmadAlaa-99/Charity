@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/calender.css') }}" rel="stylesheet">
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - لوحة التحكم - الملف الشخصي
@stop
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">لوحة التحكم</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">الملف الشخصي</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                            class="nav-link active">تحديث</a>
                                    </li>
                                </ul>
                                <div class="tab-content">

                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <form method="post" action="{{ route('admin.update_profile') }}"
                                                    autocomplete="off" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">اسم المستخدم</label>
                                                            <input type="text" name="name"
                                                                value="{{ $user->name }}"class="form-control" required>
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">البريد الالكتروني</label>
                                                            <input type="email" name="email" value="{{ $user->email }}"
                                                                class="form-control" placeholder="email" required>

                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">كلمة السر</label>
                                                            <input type="password" placeholder="password" name="password"
                                                                class="form-control" required>
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">تأكيد كلمة السر</label>
                                                            <input type="password" placeholder="password"
                                                                name="password_confirmation" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">تحديث البيانات
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
