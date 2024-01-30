@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/calender.css') }}" rel="stylesheet">
@endsection
@section('title')
    جمعية الدعوة بالمزاحمية - معرض الصور
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">الشركاء</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">كافة الشركاء</a></li>
            </ol>
        </div>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <div class="mb-3 me-auto">
                <div class="card-tabs style-1 mt-3 mt-sm-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab" id="transaction-tab"
                                data-bs-target="#Resturants" role="tab">الشركاء</a>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-outline-primary mb-3"><i
                    class="fa fa-add me-3 scale3"></i>اضافة صورة
            </a>
        </div>
        <div class="row">
            @foreach ($images_gallery as $image)
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <h4 class="card-intro-title"><a href="javascript:void(0);"  onclick="event.preventDefault();
                                document.getElementById('destroy-form-{{ $image->id }}').submit();" class="btn btn-primary mb-1 me-1">حذف الصورة</a></h4>


                        <form id="destroy-form-{{ $image->id }}"
                            action="{{ route('admin.images.destroy', $image->id) }}"
                            method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>

                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ URL::asset($image->imageUrl) }}" alt="First slide">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة صورة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.images.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-form-label" for="validationCustom09">الصورة
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="file" name="images[]" accept="image/*" class="form-file-input form-control" multiple required>

                                    @error('imageUrl', 'add')
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            @if ($errors->hasBag('add'))
                $('#add').modal('show');
            @endif
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

@endsection
@section('js')
@endsection
