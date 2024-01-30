@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/calender.css') }}" rel="stylesheet">
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - الموظفين
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">الموظفين</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">كافة الموظفين</a></li>
            </ol>
        </div>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <div class="mb-3 me-auto">
                <div class="card-tabs style-1 mt-3 mt-sm-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" id="transaction-tab"
                                data-bs-target="#Resturants" role="tab">الموظفين</a>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-outline-primary mb-3"><i
                    class="fa fa-add me-3 scale3"></i>اضافة موظف
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
                                    <th>الاسم</th>
                                    <th>القسم</th>
                                    <th>الجنسية</th>
                                    <th>الجنس</th>
                                    <th>طبيعة العمل</th>
                                    <th>المؤهلات</th>
                                    <th>النوع</th>
                                    <th>حالة العمل</th>
                                    <th>الراتب</th>
                                    <th>بدلات</th>
                                    <th>ملاحظات</th>
                                    <th>التاريخ</th>
                                    <th>العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($employees as $employee)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->section->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->nationality->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->gender }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->work_nature }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->qualification }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->type }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->work_status }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->wage }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->grant }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->notes }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $employee->date }}</span>
                                        </td>

                                        <td>
                                            <div class="d-flex">

                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1 edit"
                                                    data-bs-toggle="modal" data-id="{{ $employee->id }}"
                                                    data-date="{{ $employee->date }}"
                                                    data-section_id="{{ $employee->section_id }}"
                                                    data-nationality_id="{{ $employee->nationality_id }}"
                                                    data-gender="{{ $employee->gender }}"
                                                    data-name="{{ $employee->name }}"
                                                    data-work_nature="{{ $employee->work_nature }}"
                                                    data-qualification="{{ $employee->qualification }}"
                                                    data-type="{{ $employee->type }}"
                                                    data-work_status="{{ $employee->work_status }}"
                                                    data-wage="{{ $employee->wage }}" data-grant="{{ $employee->grant }}"
                                                    data-notes="{{ $employee->notes }}" >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('destroy-form-{{ $employee->id }}').submit();"><i
                                                        class="fa fa-trash"></i></a>

                                                <form id="destroy-form-{{ $employee->id }}"
                                                    action="{{ route('admin.employees.destroy', $employee->id) }}"
                                                    method="POST" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $employees->links() }}
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
                    <h5 class="modal-title">اضافة موظف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.employees.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">الاسم
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="validationCustom01" placeholder=""
                                            value=""name="name" required="">
                                        @error('name', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">القسم
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" name="section_id"
                                            id="validationCustom05">
                                            <option data-display="Select">Please select</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('section_id', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">الجنسية
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" name="nationality_id"
                                            id="validationCustom05">
                                            <option data-display="Select">Please select</option>
                                            @foreach ($nationalities as $nationality)
                                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('nationality_id', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">طبيعة العمل
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" name="work_nature">
                                            <option data-display="Select">تحديد طبيعة العمل</option>
                                            <option value="type1">type1</option>
                                            <option value="type2">type2</option>
                                        </select>
                                        @error('work_nature', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
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
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">المؤهلات
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea cols="5" rows="5" type="text" class="form-control" id="validationCustom01" placeholder=""
                                            value=""name="qualification" required="">
                                    </textarea>
                                        @error('qualification', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-5 col-md-6">
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">الجنس
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" name="gender">
                                            <option data-display="Select">تحديد الجنس</option>
                                            <option value="male">ذكر</option>
                                            <option value="female">انثى</option>
                                        </select>
                                        @error('gender', 'add')
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
                                            <option data-display="Select">تحديد النوع</option>
                                            <option value="full">دوام كامل</option>
                                            <option value="part">دوام جزئي</option>
                                        </select>
                                        @error('type', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">حالة العمل
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" name="work_status">
                                            <option data-display="Select">تحديد حالة العمل</option>
                                            <option value="type1">مستمر</option>
                                            <option value="type2">منقطع</option>
                                        </select>
                                        @error('work_status', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">الراتب
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" id="validationCustom01"
                                            placeholder="" value=""name="wage" required="">
                                        @error('wage', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">بدلات
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" id="validationCustom01"
                                            placeholder="" value=""name="grant" required="">
                                        @error('grant', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">ملاحظات
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea cols="5" rows="5" type="text" class="form-control" id="validationCustom01" placeholder=""
                                            value=""name="notes" required="">
                                        </textarea>
                                        @error('notes', 'add')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                        </div>
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
                                <label class="col-lg-4 col-form-label" for="validationCustom01">الاسم
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="name" name="name"
                                        required="">
                                    <input type="hidden" id="edit_id" name="id">
                                    @error('name', 'edit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">رابط
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="link" name="link"
                                        required="">
                                    @error('link', 'edit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom09">لوغو التصنيف
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="file" name="logo" accept="images/*"
                                        class="form-file-input form-control">
                                    @error('logo', 'edit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">

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

                var updateUrl = "{{ url('admin/partners') }}/" + Id;
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
