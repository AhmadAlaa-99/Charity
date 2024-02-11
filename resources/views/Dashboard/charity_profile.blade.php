@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/calender.css') }}" rel="stylesheet">
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - لوحة التحكم - ملف الجمعية
@stop
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">لوحة التحكم</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">ملف الجمعية</a></li>
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
                                    <li class="nav-item"><a href="#profile-basic" data-bs-toggle="tab"
                                            class="nav-link active">البيانات الأساسية</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-define" data-bs-toggle="tab"
                                            class="nav-link">الملف التعريفي</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-basic" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <form method="post" action="{{ route('admin.update_charity_profile') }}"
                                                    autocomplete="off" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">اسم الجمعية</label>
                                                            <input type="text" name="name"
                                                                class="form-control" value="{{ $charity->name }}" required>
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">لوغو الجمعية</label>
                                                            <input type="file" name="logo" class="form-control"
                                                                placeholder="logo">
                                                            @error('logo')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">البريد الالكتروني</label>
                                                            <input type="email" placeholder="email" value="{{ $charity->email }}"
                                                             name="email"
                                                                class="form-control" required>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">العنوان</label>
                                                            <input type="text" placeholder="address" value="{{ $charity->address }}"
                                                            name="address"
                                                                class="form-control" required>
                                                            @error('address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">رقم التصريح</label>
                                                            <input type="number" placeholder="permit_number"
                                                            value="{{ $charity->permit_number }}"
                                                                name="permit_number" class="form-control" required>
                                                            @error('permit_number')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">حساب بنكي رقم 1</label>
                                                            <input type="text" placeholder="bank_account_1"
                                                            value="{{ $charity->bank_account_1 }}"
                                                                name="bank_account_1" class="form-control" required>
                                                            @error('bank_account_1')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">حساب بنكي رقم 2</label>
                                                            <input type="text" placeholder="bank_account_2"
                                                            value="{{ $charity->bank_account_2 }}"
                                                                name="bank_account_2" class="form-control" required>
                                                            @error('bank_account_2')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">رقم الهاتف</label>
                                                            <input type="text" placeholder="phone" name="phone"
                                                            value="{{ $charity->phone }}"
                                                                class="form-control" required>
                                                            @error('phone')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>


                                                    </div>
                                                    <button class="btn btn-primary" type="submit">تحديث البيانات
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="profile-define" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <form method="post" action="{{ route('admin.update_charity_profile') }}"
                                                    autocomplete="off" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">الوصف</label>
                                                            <textarea rows="6" cols="6" rows="6" cols="6" id="editor1" type="text" placeholder="description"
                                                                name="description" class="form-control" required>
                                                                {!! $charity->description !!}
                                                            </textarea>
                                                            @error('description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">الرؤية</label>

                                                            <textarea rows="6" cols="6" type="text" id="editor2" placeholder="الرؤية" name="vision" class="form-control"
                                                                required>
                                                                {!! $charity->vision !!}
                                                            </textarea>

                                                            @error('vision')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">الرسالة</label>
                                                            <textarea rows="6" cols="6" id="editor3" type="text" placeholder="الرؤية" name="message" class="form-control"
                                                                required>
                                                                {!! $charity->message !!}
                                                            </textarea>
                                                            @error('message')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">القيمة</label>
                                                            <textarea rows="6" cols="6" id="editor4" type="text" placeholder="value" name="value" class="form-control"
                                                                required>
                                                                {!! $charity->value !!}
                                                            </textarea>
                                                            @error('value')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">الأهداف</label>
                                                            <textarea rows="6" cols="6" id="editor5" type="text" placeholder="value" name="objectives" class="form-control"
                                                                required>
                                                                {!! $charity->objectives !!}
                                                            </textarea>
                                                            @error('objectives')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="{{ URL::asset('dashboard/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    let editors = ['editor1', 'editor2', 'editor3', 'editor4', 'editor5'];
    let editorInstances = {};

    editors.forEach(function(editorId) {
        ClassicEditor
            .create(document.querySelector('#' + editorId))
            .then(editor => {
                editorInstances[editorId] = editor;
            })
            .catch(error => {
                console.error(error);
            });
    });

    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function() {
            Object.keys(editorInstances).forEach(function(editorId) {
                let nameAttribute = document.querySelector('#' + editorId).getAttribute('name');
                document.querySelector('textarea[name="' + nameAttribute + '"]').value = editorInstances[editorId].getData();
            });
        });
    });
});

//     let editor1, editor2, editor3,editor4,editor5;

//     ClassicEditor
//         .create(document.querySelector('#editor1'))
//         .then(editor => {
//             editor1 = editor;
//         })
//         .catch(error => {
//             console.error(error);
//         });

//     ClassicEditor
//         .create(document.querySelector('#editor2'))
//         .then(editor => {
//             editor2 = editor;
//         })
//         .catch(error => {
//             console.error(error);
//         });

//     ClassicEditor
//         .create(document.querySelector('#editor3'))
//         .then(editor => {
//             editor3 = editor;
//         })
//         .catch(error => {
//             console.error(error);
//         });
//         ClassicEditor
//         .create(document.querySelector('#editor4'))
//         .then(editor => {
//             editor4 = editor;
//         })
//         .catch(error => {
//             console.error(error);
//         });
//         ClassicEditor
//         .create(document.querySelector('#editor5'))
//         .then(editor => {
//             editor5 = editor;
//         })
//         .catch(error => {
//             console.error(error);
//         });
//     document.querySelector('form').addEventListener('submit', function() {
//         document.querySelector('#editor1').value = editor1.getData();
//         document.querySelector('#editor2').value = editor2.getData();
//         document.querySelector('#editor3').value = editor3.getData();
//         document.querySelector('#editor4').value = editor4.getData();
//         document.querySelector('#editor5').value = editor5.getData();

//     });
//     document.querySelector('form').addEventListener('submit', function(e) {
//     document.querySelector('textarea[name="description"]').value = editor1.getData();
//     document.querySelector('textarea[name="vision"]').value = editor2.getData();
//     document.querySelector('textarea[name="message"]').value = editor3.getData();
//     document.querySelector('textarea[name="value"]').value = editor4.getData();
//     document.querySelector('textarea[name="objectives"]').value = editor5.getData();
// });

</script>
@section('js')
@endsection
