@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/calender.css') }}" rel="stylesheet">
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - روابط التواصل
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">روابط التواصل</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">قسم التواصل</a></li>
            </ol>
        </div>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <div class="mb-3 me-auto">
                <div class="card-tabs style-1 mt-3 mt-sm-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="" data-bs-toggle="tab" id="transaction-tab"
                                data-bs-target="#Resturants" role="tab">اتصل بنا</a>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-outline-primary mb-3"><i
                    class="fa fa-add me-3 scale3"></i>اضافة رابط
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

                                    <th>رابط</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($contacts as $contact)
                                    @php
                                        $i++;
                                    @endphp

                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $contact->name }}</span>
                                        </td>

                                        <td>
                                            <span class="text-nowrap">{{ $contact->link }}</span>
                                        </td>

                                        <td>
                                            <div class="d-flex">

                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1 edit"
                                                    data-bs-toggle="modal" data-id="{{ $contact->id }}"
                                                    data-name="{{ $contact->name }}" data-link="{{ $contact->link }}"
                                                    >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('destroy-form-{{ $contact->id }}').submit();"><i
                                                        class="fa fa-trash"></i></a>

                                                <form id="destroy-form-{{ $contact->id }}"
                                                    action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                                    method="POST" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $contacts->links() }}
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
                    <h5 class="modal-title">اضافة رابط</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.contacts.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">الاسم
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
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
                                <label class="col-lg-4 col-form-label" for="validationCustom01">رابط
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
                    <h5 class="modal-title">تعديل الرابط</h5>
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
                                <div class="col-lg-6">
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
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="link" name="link"
                                        required="">
                                    @error('link', 'edit')
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

                var updateUrl = "{{ url('admin/contacts') }}/" + Id;
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
