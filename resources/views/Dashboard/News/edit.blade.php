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
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">
                                                الصورة
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" name="image" class="form-control">
                                                - 416*416
                                                @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">للنشر ؟
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="col-lg-6">
                                                    <label class="switch">
                                                        <input type="checkbox" id="is_publish" name="is_publish" value="1"
                                                               {{ old('is_publish', isset($new) && $new->is_publish ? 'checked' : '') }}>
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
                                                        height: 24px;
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

                                                    input:checked + .slider {
                                                        background-color: #664543;
                                                    }

                                                    input:focus + .slider {
                                                        box-shadow: 0 0 1px #2196F3;
                                                    }

                                                    input:checked + .slider:before {
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


                                                @error('is_publish')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom08">التاريخ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" value="{{ $new->date }}" class="form-control" id="validationCustom08"
                                                    name="date" required="">
                                                @error('date')
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
                                                <label class="switch">
                                                    <input type="checkbox" id="main" name="main" value="1"
                                                           {{ old('main', isset($new) && $new->main ? 'checked' : '') }}>
                                                    <span class="slider round"></span>
                                                </label>
                                                @error('main')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="mb-3 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom01">عنوان الخبر
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-12">
                                                <textarea rows="5" cols="25" id="editor1"type="text" type="text" class="form-control"
                                                    id="validationCustom01" placeholder="عنوان الخبر الرئيسي" name="title" required="">
                                                    {!! $new->title !!}
                                            </textarea>
                                                @error('title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-xl-12">
                                        <div class="mb-4 row">
                                            <label class="col-lg-1 col-form-label" for="validationCustom02">وصف مختصر
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-12">

                                                <textarea rows="5" cols="25" id="editor2" type="text" class="form-control" name="brive_new"
                                                    placeholder="ادخل وصف مختصر" required="">
                                                    {!! $new->brive_new !!}
                                                </textarea>

                                                @error('brive_new')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="mb-3 row">
                                            <label class="col-lg-2 col-form-label" for="validationCustom03">وصف تفصيلي
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-12">
                                                <textarea rows="5" cols="25" id="editor3" type="password" name="whole_new" class="form-control"
                                                    placeholder="وصف تفصيلي للخبر" required="">
                                                    {!! $new->whole_new !!}
                                                </textarea>
                                                @error('whole_new')
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ URL::asset('dashboard/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        let editor1, editor2, editor3;

        ClassicEditor
            .create(document.querySelector('#editor1'))
            .then(editor => {
                editor1 = editor;
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(editor => {
                editor2 = editor;
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor3'))
            .then(editor => {
                editor3 = editor;
            })
            .catch(error => {
                console.error(error);
            });
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#editor1').value = editor1.getData();
            document.querySelector('#editor2').value = editor2.getData();
            document.querySelector('#editor3').value = editor3.getData();
        });
        document.querySelector('form').addEventListener('submit', function(e) {
            document.querySelector('textarea[name="title"]').value = editor1.getData();
            document.querySelector('textarea[name="brive_new"]').value = editor2.getData();
            document.querySelector('textarea[name="whole_new"]').value = editor3.getData();
        });
    </script>
@endsection
@section('js')

@endsection
