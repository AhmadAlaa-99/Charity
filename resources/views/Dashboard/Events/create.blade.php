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




                                                    <option value="كلمة">كلمة</option>
                                                    <option value="درس">درس</option>
                                                    <option value="لقاء">لقاء</option>
                                                    <option value="معرض">معرض</option>
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
                                                <label class="switch">
                                                    <input type="checkbox" id="is_publish" name="is_publish" value="1"
                                                        {{ old('is_publish') ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                                @error('is_publish')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <style>
                                                /* الأسلوب الخاص بمفتاح التبديل */
                                                .switch {
                                                    position: relative;
                                                    display: inline-block;
                                                    width: 60px;
                                                    height: 34px;
                                                    margin-top: 10px;
                                                }

                                                .switch input {
                                                    opacity: 0;
                                                    width: 0;
                                                    height: 0;
                                                }

                                                .slider {
                                                    position: absolute;
                                                    cursor: pointer;
                                                    top: 0;
                                                    left: 0;
                                                    right: 0;
                                                    bottom: 0;
                                                    background-color: #ccc;
                                                    -webkit-transition: .4s;
                                                    transition: .4s;
                                                    height: 23px;

                                                    width: 55px;
                                                }

                                                .slider:before {
                                                    position: absolute;
                                                    content: "";
                                                    height: 16px;
                                                    width: 16px;
                                                    left: 4px;
                                                    bottom: 4px;
                                                    background-color: white;
                                                    -webkit-transition: .4s;
                                                    transition: .4s;
                                                }

                                                input:checked+.slider {
                                                    background-color: #664543;
                                                }

                                                input:focus+.slider {
                                                    box-shadow: 0 0 1px #2196F3;
                                                }

                                                input:checked+.slider:before {
                                                    -webkit-transform: translateX(26px);
                                                    -ms-transform: translateX(26px);
                                                    transform: translateX(26px);
                                                }

                                                /* شكل مفتاح التبديل */
                                                .slider.round {
                                                    border-radius: 34px;
                                                }

                                                .slider.round:before {
                                                    border-radius: 50%;
                                                }
                                            </style>
                                           
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
