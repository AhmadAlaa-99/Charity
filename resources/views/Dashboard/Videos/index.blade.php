@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/calender.css') }}" rel="stylesheet">
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - قناة الجمعية
@stop
@section('content')
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
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">قناة الجمعية</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">الفيديوهات</a></li>
            </ol>
        </div>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <div class="mb-3 me-auto">
                <div class="card-tabs style-1 mt-3 mt-sm-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" id="transaction-tab"
                                data-bs-target="#Resturants" role="tab">الفيديوهات</a>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-outline-primary mb-3"><i
                    class="fa fa-add me-3 scale3"></i>اضافة فيديو
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12 tab-content">
                <div class="tab-pane fade show active" id="Resturants" role="tabpanel" aria-labelledby="Resturants-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    <th>التاريخ</th>
                                    <th>الرابط</th>
                                    <th>النوع</th>
                                    <th>للنشر؟</th>
                                    <th>ملاحظات</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($videos as $video)
                                    @php
                                        $i++;
                                    @endphp







                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $video->title }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $video->description }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $video->date }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $video->link }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $video->type }}</span>
                                        </td>

                                        <td>
                                            <span class="text-nowrap">
                                                {{ $video->is_publication ? 'عام' : 'خاص' }}
                                            </span>
                                        </td>


                                        <td>
                                            <span class="text-nowrap">{{ $video->notes }}</span>
                                        </td>

                                        <td>
                                            <div class="d-flex">

                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1 edit"
                                                    data-bs-toggle="modal" data-id="{{ $video->id }}"
                                                    data-title="{{ $video->title }}"
                                                    data-description="{{ $video->description }}"
                                                    data-date="{{ $video->date }}" data-link="{{ $video->link }}"
                                                    data-type="{{ $video->type }}"
                                                    data-is_publication="{{ $video->is_publication }}"
                                                    data-notes="{{ $video->notes }}" >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('destroy-form-{{ $video->id }}').submit();"><i
                                                        class="fa fa-trash"></i></a>

                                                <form id="destroy-form-{{ $video->id }}"
                                                    action="{{ route('admin.videos.destroy', $video->id) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $videos->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="add" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة فيديو</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.videos.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">العنوان
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=""
                                        value=""name="title" required="">
                                    @error('title', 'add')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">الوصف
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <textarea cols="5" rows="5"type="text" class="form-control" id="validationCustom01" placeholder=""
                                        value=""name="description" required="">
                                    </textarea>
                                    @error('description', 'add')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>


                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">الرابط
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=""
                                        value=""name="link" required="">
                                    @error('link', 'add')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>





                            <div class="mb-5 col-md-6">


                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">التاريخ
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" id="validationCustom01"
                                            placeholder="" value=""name="date" required="">
                                        @error('date', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">النوع
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" name="type">
                                            <option data-display="Select">نوع الرابط</option>
                                            <option value="channel">قناة</option>
                                            <option value="video">فيديو</option>
                                        </select>
                                        @error('type', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5 col-md-6">



                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">للنشر؟
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" name="is_publication">
                                            <option data-display="Select">للنشر؟</option>
                                            <option value="1">نعم</option>
                                            <option value="0">لا</option>
                                        </select>
                                        @error('is_publication', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom09">ملاحظات
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea type="text" name="notes" cols="5" rows="5" class="form-file-input form-control"
                                            required>

                                        </textarea>

                                        @error('notes', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 mb-0">
                                    <input type="submit" value="تأكيد الاضافة" class="submit btn btn-primary"
                                        name="submit" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal للتعديل -->
    <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- رأس المودال -->
                <div class="modal-header">
                    <h5 class="modal-title">تعديل الشريك</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- جسم المودال -->
                <div class="modal-body">
                    <form method="post" id="edit_form" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">

                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">العنوان
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="title" name="title"
                                        required="">
                                    <input type="hidden" id="edit_id" name="id">
                                    @error('title', 'edit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">الوصف
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=""
                                        value=""name="description" required="">
                                    @error('description', 'edit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>


                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">الرابط
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="validationCustom01" placeholder=""
                                        value=""name="link" required="">
                                    @error('link', 'edit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>


                            <div class="mb-5 col-md-6">


                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">التاريخ
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="validationCustom01"
                                            placeholder="" value=""name="date" required="">
                                        @error('date', 'edit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">النوع
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="type" class="form-control" id="validationCustom01"
                                            placeholder="" value=""name="type" required="">
                                        @error('type', 'edit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5 col-md-6">

                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">للنشر؟
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="" value=""name="is_publication" required="">
                                        @error('is_publication', 'edit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom09">ملاحظات
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" name="notes" accept="images/*"
                                            class="form-file-input form-control" required>
                                        @error('notes', 'edit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3 mb-0">
                                    <input type="submit" value="تأكيد التعديل" class="submit btn btn-primary"
                                        name="submit" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            @if ($errors->hasBag('add'))
                $('#add').modal('show');
            @endif
            @if ($errors->hasBag('edit'))
                $('#edit').modal('show');
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session('edit_id') && $errors->any())
                $('#edit').modal('show');
            @endif
            $('.edit').click(function() {
                $('#edit .text-danger').remove();
                var Id = $(this).data('id');
                var name = $(this).data('name');
                var link = $(this).data('link');

                $('#edit_id').val(Id);
                $('#edit input[name="name"]').val(name);
                $('#edit input[name="link"]').val(link);

                var updateUrl = "{{ url('admin/videos') }}/" + Id;
                $('#edit_form').attr('action', updateUrl);
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session('add_error') && $errors->isNotEmpty())
                $('#add').modal('show');
            @endif
            @if (session('edit_id') && $errors->isNotEmpty())
                $('#edit').modal('show');
            @endif
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session('edit_error') && $errors->isNotEmpty())
                $('#edit').modal('show');
            @endif
        });
    </script>
@endsection
@section('js')
@endsection
