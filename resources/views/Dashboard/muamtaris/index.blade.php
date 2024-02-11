@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/calender.css') }}" rel="stylesheet">
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - طلبات التسجيل
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">العمرة</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">طلبات التسجيل</a></li>
            </ol>
        </div>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <div class="mb-3 me-auto">
                <div class="card-tabs style-1 mt-3 mt-sm-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" id="transaction-tab"
                                data-bs-target="#Resturants" role="tab">طلبات التسجيل</a>
                        </li>
                    </ul>
                </div>
            </div>
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
                                    <th>الهوية</th>
                                    <th>الجنس</th>
                                    <th>الجنسية</th>
                                    <th>اخر عمرة</th>
                                    <th>العمر</th>
                                    <th>افراد العائلة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($data as $mutamer)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $mutamer->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $mutamer->number }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $mutamer->gender }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $mutamer->nationality_id }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $mutamer->last }}</span>
                                        </td>


                                        <td>
                                            <span class="text-nowrap">
                                                @php
                                                    $birthDate = Carbon\Carbon::parse($mutamer->birth_date);
                                                    $age = $birthDate->diffInYears(Carbon\Carbon::now());
                                                @endphp
                                                {{ $age }} سنة
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $mutamer->members }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-danger light sharp"
                                                    data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2">
                                                            </circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"
                                                        onclick="event.preventDefault();
                                                     document.getElementById('destroy-form-{{ $mutamer->id }}').submit();">
                                                        رفض الطلب
                                                    </a>
                                                    <form id="destroy-form-{{ $mutamer->id }}"
                                                        action="{{ route('admin.reject', $mutamer->id) }}" method="POST"
                                                        style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                    <a class="dropdown-item edit" href="" data-bs-toggle="modal"
                                                        data-id="{{ $mutamer->id }}" data-bs-target="#edit">
                                                        قبول الطلب
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $data->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- رأس المودال -->
                <div class="modal-header">
                    <h5 class="modal-title">قبول الطلب</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- جسم المودال -->
                <div class="modal-body">
                    <form method="post" id="edit_form" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom01">الحملة
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="default-select wide form-control" name="umrah_id"
                                        id="validationCustom05">
                                        <option data-display="Select">Please select</option>
                                        @foreach ($umras as $umra)
                                            <option value="{{ $umra->id }}">{{ $umra->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="edit_id" name="id">
                                    @error('name', 'edit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 mb-0">
                                    <input type="submit" value="تأكيد " class="submit btn btn-primary"
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

                $('#edit_id').val(Id);
                var updateUrl = "{{ url('admin/accept') }}/" + Id;
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
