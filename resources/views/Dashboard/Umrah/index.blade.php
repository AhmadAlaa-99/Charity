@extends('layouts.master')
@section('css')
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - كافة الحملات
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">حملات العمرة</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">كافة الفعاليات</a></li>
            </ol>
        </div>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <div class="mb-3 me-auto">
                <div class="card-tabs style-1 mt-3 mt-sm-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" id="public-tab"
                                data-bs-target="#umrah_soon" role="tab">قريبا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="private-tab"
                                data-bs-target="#umrah_open" role="tab">متاح للتسجيل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="private-tab"
                                data-bs-target="#umrah_done" role="tab">اغلقت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="private-tab"
                                data-bs-target="#umrah_executed" role="tab">تم التنفيذ</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('admin.umrahs.create') }}" class="btn btn-outline-primary mb-3"><i
                    class="fa fa-add me-3 scale3"></i>
                اضافة حملة </a>
        </div>
        <div class="row">
            <div class="col-xl-12 tab-content">
                <div class="tab-pane fade show active" id="umrah_soon" role="tabpanel" aria-labelledby="umrah_soon-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم الحملة</th>
                                    <th>النوع</th>
                                    <th>الشركة المنفذة</th>
                                    <th>عدد الأيام</th>
                                    <th>مكان الاقامة</th>
                                    <th>وقت التحرك</th>
                                    <th>الانطلاق - العودة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($umrah_soon as $umrah)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->type }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->company }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->n_days }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->location }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->move_on }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->start_date }} -
                                                {{ $umrah->end_date }}</span>
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
                                                     document.getElementById('destroy-form-{{ $umrah->id }}').submit();">
                                                        حذف
                                                    </a>
                                                    <form id="destroy-form-{{ $umrah->id }}"
                                                        action="{{ route('admin.umrahs.destroy', $umrah->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.umrahs.edit', $umrah->id) }}">
                                                        تعديل
                                                    </a>
                                                    <a class="dropdown-item"
                                                    href="{{ route('admin.umrahs.show', $umrah->id) }}">
                                                تفاصيل
                                                </a>



                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $umrah_soon->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show " id="umrah_open" role="tabpanel" aria-labelledby="umrah_open-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم الحملة</th>
                                    <th>النوع</th>
                                    <th>الشركة المنفذة</th>
                                    <th>عدد الأيام</th>
                                    <th>مكان الاقامة</th>
                                    <th>وقت التحرك</th>
                                    <th>الانطلاق - العودة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($umrah_open as $umrah)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->type }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->company }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->n_days }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->location }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->move_on }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->start_date }} -
                                                {{ $umrah->end_date }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-danger light sharp"
                                                    data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                        version="1.1">
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
                                                     document.getElementById('destroy-form-{{ $umrah->id }}').submit();">
                                                        حذف
                                                    </a>
                                                    <form id="destroy-form-{{ $umrah->id }}"
                                                        action="{{ route('admin.umrahs.destroy', $umrah->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.umrahs.edit', $umrah->id) }}">
                                                        تعديل
                                                    </a>
                                                    <a class="dropdown-item"
                                                    href="{{ route('admin.umrahs.show', $umrah->id) }}">
                                                تفاصيل
                                                </a>


                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $umrah_open->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="umrah_done" role="tabpanel" aria-labelledby="umrah_done-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم الحملة</th>
                                    <th>النوع</th>
                                    <th>الشركة المنفذة</th>
                                    <th>عدد الأيام</th>
                                    <th>مكان الاقامة</th>
                                    <th>وقت التحرك</th>
                                    <th>الانطلاق - العودة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($umrah_done as $umrah)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->type }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->company }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->n_days }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->location }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->move_on }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->start_date }} -
                                                {{ $umrah->end_date }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-danger light sharp"
                                                    data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                        version="1.1">
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
                                                     document.getElementById('destroy-form-{{ $umrah->id }}').submit();">
                                                        حذف
                                                    </a>
                                                    <form id="destroy-form-{{ $umrah->id }}"
                                                        action="{{ route('admin.umrahs.destroy', $umrah->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.umrahs.edit', $umrah->id) }}">
                                                        تعديل
                                                    </a>
                                                    <a class="dropdown-item"
                                                    href="{{ route('admin.umrahs.show', $umrah->id) }}">
                                                تفاصيل
                                                </a>


                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $umrah_done->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show " id="umrah_executed" role="tabpanel"
                    aria-labelledby="umrah_executed-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم الحملة</th>
                                    <th>النوع</th>
                                    <th>الشركة المنفذة</th>
                                    <th>عدد الأيام</th>
                                    <th>مكان الاقامة</th>
                                    <th>وقت التحرك</th>
                                    <th>الانطلاق - العودة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($umrah_executed as $umrah)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->type }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->company }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->n_days }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->location }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->move_on }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $umrah->start_date }} -
                                                {{ $umrah->end_date }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-danger light sharp"
                                                    data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                        version="1.1">
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
                                                     document.getElementById('destroy-form-{{ $umrah->id }}').submit();">
                                                        حذف
                                                    </a>
                                                    <form id="destroy-form-{{ $umrah->id }}"
                                                        action="{{ route('admin.umrahs.destroy', $umrah->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.umrahs.edit', $umrah->id) }}">
                                                        تعديل
                                                    </a>
                                                    <a class="dropdown-item"
                                                    href="{{ route('admin.umrahs.show', $umrah->id) }}">
                                                تفاصيل
                                                </a>



                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $umrah_executed->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
