@extends('layouts.master')
@section('css')
@endsection
@section('title')
    جمعبة الدعوة بالمزاحمية - اضافة فعالية
@stop
@section('content')
    <link href="{{ URL::asset('dashboard/vendor/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">اضافة</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">الفعاليات</a></li>
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
                        <h4 class="card-title">اضافة فعالية</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form method="post" action="{{ route('admin.events.store') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom08">
                                                الاسم
                                                <span class="text-danger">*</span>
                                            </label>
                                             <div class="col-lg-10">
                                                <input type="text" name="name" class="form-control">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom08">
                                                الموقع
                                                <span class="text-danger">*</span>
                                            </label>
                                             <div class="col-lg-10">
                                                <input type="text" name="location" class="form-control">
                                                @error('location')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom08">
                                                التاريخ
                                                <span class="text-danger">*</span>
                                            </label>
                                             <div class="col-lg-10">
                                                <input type="date" name="date" class="form-control">
                                                @error('date')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom08"> النوع
                                                <span class="text-danger">*</span>
                                            </label>
                                             <div class="col-lg-10">
                                                <select class="default-select wide form-control" name="type">
                                                    <option data-display="Select">تحديد النوع</option>
                                                    <option value="type1">type1</option>
                                                    <option value="type2">type2</option>
                                                </select>
                                                @error('type')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom08">
                                                الصورة
                                                <span class="text-danger">*</span>
                                            </label>
                                             <div class="col-lg-10">
                                                <input type="file" name="image" class="form-control">
                                                - 416*500
                                                @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom08">للنشر ؟
                                                <span class="text-danger">*</span>
                                            </label>
                                             <div class="col-lg-10">
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

                                    </div>
                                    <div class="col-xl-12">
                                        <div class="mb-4 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom02">وصف
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-12">
                                                <textarea type="text" name="brive" id="editor" class="form-control" name="brive" placeholder="ادخل وصف مختصر">
                                                </textarea>
                                                @error('brive')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom02">ملاحظات
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-12">
                                                <textarea type="text" cols="5" rows="5" name="notes" id="editor" class="form-control"
                                                    placeholder="ادخل وصف مختصر">
                                                </textarea>
                                                @error('notes')
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
    <script src="{{ URL::asset('dashboard/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        // تهيئة CKEditor
        let editorInstance;
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector('form').addEventListener('submit', function() {
            const editorData = editorInstance.getData();
            document.querySelector('#editor').value = editorData;
        });
    </script>

@endsection
@section('js')
@endsection
