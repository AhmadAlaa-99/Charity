@extends('layouts.master')
@section('css')
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - كافة المشاريع
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
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">المشاريع</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">كافة المشاريع</a></li>
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
            <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-primary mb-3"><i
                    class="fa fa-add me-3 scale3"></i>
                اضافة مشروع </a>
        </div>
        <div class="row">
            <div class="col-xl-12 tab-content">
                <div class="tab-pane fade show active" id="public" role="tabpanel" aria-labelledby="public-tab">
                    <div class="table-responsive fs-14">
                        <table class="table card-table display mb-4 dataTablesCard text-black" id="example5">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>العنوان</th>

                                    <th>الفئة</th>
                                    <th>الكلفة</th>
                                    <th>الجهة الداعمة</th>

                                    <th>الصورة</th>
                                    <th>الملف</th>
                                    <th>التاريخ</th>

                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($projects_public as $project)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $project->name }}</span>
                                        </td>

                                        <td>
                                            <span class="text-nowrap">{{ $project->category }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $project->cost }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $project->suppport_party }}</span>
                                        </td>

                                        <td>
                                            <img style="width:150px; height:150px;"src="{{ URL::asset($project->image) }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.download.document.project',$project->id) }}"
                                                 class="btn btn-success light">تحميل الملف</a>
                                        </td>

                                        <td>
                                            <span class="text-nowrap">{{ $project->date }}</span>
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
                                                     document.getElementById('destroy-form-{{ $project->id }}').submit();">
                                                        حذف
                                                    </a>
                                                    <form id="destroy-form-{{ $project->id }}"
                                                        action="{{ route('admin.projects.destroy', $project->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.projects.edit', $project->id) }}">
                                                        تعديل
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.projects.show', $project->id) }}">
                                                        تفاصيل
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $projects_public->links() }}
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
                                    <th>العنوان</th>

                                    <th>الفئة</th>
                                    <th>الكلفة</th>
                                    <th>الجهة الداعمة</th>

                                    <th>الصورة</th>
                                    <th>الملف</th>
                                    <th>التاريخ</th>

                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($projects_private as $new)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td><span>#{{ $i }}</span></td>
                                        <td>
                                            <span class="text-nowrap">{{ $project->name }}</span>
                                        </td>

                                        <td>
                                            <span class="text-nowrap">{{ $project->category }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $project->cost }}</span>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $project->suppport_party }}</span>
                                        </td>

                                        <td>
                                            <img style="width:150px; height:150px;"src="{{ URL::asset($project->image) }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.download.document.project',$project->id) }}"
                                                class="btn btn-success light">تحميل الملف</a>
                                        </td>
                                        <td>
                                            <span class="text-nowrap">{{ $project->date }}</span>
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
                                                     document.getElementById('destroy-form-{{ $project->id }}').submit();">
                                                        حذف
                                                    </a>
                                                    <form id="destroy-form-{{ $project->id }}"
                                                        action="{{ route('admin.projects.destroy', $project->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>

                                                    <a class="dropdown-item" {{-- href="{{ route('admin.projects.edit', $project->id) }}" --}}>
                                                        تعديل
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $projects_private->links() }}
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
