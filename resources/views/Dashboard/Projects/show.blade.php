@extends('layouts.master')
@section('css')
@endsection
@section('title')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">الأخبار</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">تفاصيل خبر</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="post-details">
                            <h3 class="mb-2 text-black">{{ $project->name }}</h3>
                            <ul class="mb-4 post-meta d-flex flex-wrap">
                                <li class="post-author me-3">{{ $project->cost }}</li>
                                <li class="post-date me-3"><i class="fa fa-calender"></i>{{ $project->date }}</li>
                                <li class="post-comment"><i class="fa fa-comments-o"></i>{{ $project->category}}</li>
                            </ul>
                            <img src="{{ URL::asset($project->image) }}" alt="" class="img-fluid mb-3 w-100 rounded">
                            <p>{{ $project->description }}</p>

                            <p>{{ $project->objective }}</p>


                            <p>{{ $project->note }}</p>
                            {{ $project->suppport_party }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
