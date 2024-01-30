@extends('layouts.master')
@section('css')

@endsection
@section('title')
    جمعبة الدعوة بالمزاحمية - اضافة خبر
@stop
@section('content')
    <link href="{{ URL::asset('dashboard/vendor/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">اضافة</a></li>
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
                        <h4 class="card-title">اضافة مشروع</h4>
                    </div>





                    <div class="card-body">
                        <div class="form-validation">
                            <form method="post" action="{{ route('admin.projects.store') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">عنوان المشروع
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea rows="5" cols="25" type="text" class="form-control" id="validationCustom01"
                                                    placeholder="عنوان المشروع الرئيسي" name="name" required="">
                                            </textarea>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom03">وصف تفصيلي
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea rows="5" cols="25" type="password" name="description" class="form-control"
                                                    placeholder="وصف تفصيلي للمشروع" required="">
                                                </textarea>
                                                @error('description')
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
                                                <input type="file" name="image" class="form-control" required>
                                                @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">
                                                الملف
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" name="documention" class="form-control" required>
                                                @error('documention')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                     
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">
                                                الكلفة
                                                <span class="text-danger">*</span>

                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" name="cost" class="form-control" required>
                                                @error('cost')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">
                                                الجهة الداعمة
                                                <span class="text-danger">*</span>

                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" name="suppport_party" class="form-control" required>
                                                @error('suppport_party')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-4 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom02">الأهداف
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea rows="5" cols="25" type="text" class="form-control" name="objective"
                                                    placeholder="ادخل الأهداف " required="">
                                                </textarea>
                                                @error('objective')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom02">ملاحظات
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea rows="5" cols="25" type="text" class="form-control" name="note"
                                                    placeholder="ادخل ملاحظات " required="">
                                                </textarea>
                                                @error('note')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">التاريخ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="validationCustom08"
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
                                                    <option value="1">نعم</option>
                                                    <option value="0">لا</option>
                                                </select>
                                                @error('is_publish')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">
                                                الفئة
                                                <span class="text-danger">*</span>

                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" name="category" class="form-control" required>
                                                @error('category')
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
                                                class="btn btn-primary">تأكيد واضافة المزيد</button>
                                        </div>
                                    </div>
                                    <div class="mb-12 row sub">
                                        <div class="col-lg-12 ms-auto">
                                            <button type="submit" name="action" value="add_and_cancel"
                                                class="btn btn-danger">تأكيد واغلاق</button>
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