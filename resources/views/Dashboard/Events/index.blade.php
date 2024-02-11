@extends('layouts.master')
@section('css')
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - كافة الفعاليات
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">الفعاليات</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">كافة الفعاليات</a></li>
            </ol>
        </div>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <div class="mb-3 me-auto">
                <div class="card-tabs style-1 mt-3 mt-sm-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" id="public-tab"
                                data-bs-target="#public" role="tab">عام</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab" id="private-tab"
                                data-bs-target="#private" role="tab">خاص</a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <a href="javascript:void(0);" class="btn btn-outline-primary mb-3 me-3"><i class="fa fa-add me-2 scale3"></i>
                طباعة تقرير</a> --}}
            <a href="{{ route('admin.events.create') }}" class="btn btn-outline-primary mb-3"><i
                    class="fa fa-add me-3 scale3"></i>
                اضافة فعالية </a>
        </div>
        <div class="row">
            <div class="col-xl-12 tab-content">
                <div class="tab-pane fade show active" id="public" role="tabpanel" aria-labelledby="public-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>الاسم</th>
                                    <th>النوع</th>
                                    <th>الصورة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($events_public as $event)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $event->title }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $event->type }}</span>
                                        </td>

                                        <td>
                                            <img style="width:150px; height:150px;"src="{{ URL::asset($event->image) }}">
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
                                                     document.getElementById('destroy-form-{{ $event->id }}').submit();">
                                                        حذف
                                                    </a>
                                                    <form id="destroy-form-{{ $event->id }}"
                                                        action="{{ route('admin.events.destroy', $event->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.events.edit', $event->id) }}">
                                                        تعديل
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.events.show', $event->id) }}">
                                                        تفاصيل
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $events_public->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="private" role="tabpanel" aria-labelledby="private-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>الاسم</th>
                                    <th>النوع</th>

                                    <th>الصورة</th>

                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($events_private as $event)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $event->title }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $event->type }}</span>
                                        </td>

                                        <td>
                                            <img style="width:150px; height:150px;"src="{{ URL::asset($event->image) }}">
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
                                                     document.getElementById('destroy-form-{{ $event->id }}').submit();">
                                                        حذف
                                                    </a>
                                                    <form id="destroy-form-{{ $event->id }}"
                                                        action="{{ route('admin.events.destroy', $event->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.events.edit', $event->id) }}">
                                                        تعديل
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.events.show', $event->id) }}">
                                                        تفاصيل
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $events_private->links() }}
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
