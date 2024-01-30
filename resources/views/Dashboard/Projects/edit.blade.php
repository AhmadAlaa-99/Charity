@extends('layouts.master')
@section('css')

@endsection
@section('title')
    جمعبة الدعوة بالمزاحمية - تعديل خبر
@stop
@section('content')
    <link href="{{ URL::asset('dashboard/vendor/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">تعديل</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">الأخبار</a></li>
            </ol>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">تعديل خبر</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form method="post" action="{{ route('admin.news.update', $new->id) }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">عنوان الخبر
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea rows="5" cols="25" type="text" class="form-control" id="validationCustom01"
                                                    placeholder="عنوان الخبر الرئيسي" name="title" required="">
                                                    {{ $new->title }}
                                            </textarea>
                                                @error('title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom03">وصف تفصيلي
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea rows="5" cols="25" type="password" name="whole_new" class="form-control"
                                                    placeholder="وصف تفصيلي للخبر" required="">
                                                    {{ $new->whole_new }}
                                                </textarea>
                                                @error('whole_new')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">
                                                الصورة
                                                <span class="text-danger">*</span>

                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" name="image" class="form-control">
                                                @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-4 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom02">وصف مختصر
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea rows="5" cols="25" type="text" class="form-control" name="brive_new"
                                                    placeholder="ادخل وصف مختصر" required="">
                                                    {{ $new->brive_new }}
                                                </textarea>
                                                @error('brive_new')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">التاريخ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" value="{{ $new->date }}"
                                                    name="date" required="">
                                                @error('date')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">للنشر ؟
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="default-select wide form-control" name="is_publish">
                                                    <option data-display="Select">للنشر؟</option>
                                                    <option {{ $new->is_publish == true ? 'selected' : '' }}
                                                        value="1">نعم</option>
                                                    <option {{ $new->is_publish == false ? 'selected' : '' }}
                                                        value="0">لا</option>
                                                </select>
                                                @error('is_publish')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">تعيين ك خبر
                                                رئيسي؟
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="default-select wide form-control" name="main">
                                                    <option data-display="Select">خبر رئيسي</option>
                                                    <option {{ $new->main == true ? 'selected' : '' }} value="1">نعم
                                                    </option>
                                                    <option {{ $new->main == false ? 'selected' : '' }} value="0">لا
                                                    </option>
                                                </select>
                                                @error('main')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <style>
                                        .sub {
                                            display: inline-block;
                                        }
                                    </style>
                                    <div class="mb-12 row sub " style="color: black">
                                        <div class="col-lg-12 ms-auto">
                                            <button type="submit" name="action" value="more_add"
                                                class="btn btn-primary">حفظ التعديلات</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endsection
@section('js')

@endsection
