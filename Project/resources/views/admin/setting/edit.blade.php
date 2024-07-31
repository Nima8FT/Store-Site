@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">دسته بندی</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش دسته بندی</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ویرایش دسته بندی
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('setting.index') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf
                    {{ method_field('put') }}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="name">عنوان سایت</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ old('title', $setting->title) }}">
                            @error('title')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="name">کلمات کلیدی سایت</label>
                            <input type="text" class="form-control" name="keywords" id="keywords"
                                value="{{ old('keywords', $setting->keywords) }}">
                            @error('keywords')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="name">توضیحات سایت</label>
                            <input type="text" class="form-control" name="description" id="description"
                                value="{{ old('description', $setting->description) }}">
                            @error('description')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="img">لوگو</label>
                            <input type="file" class="form-control" name="logo" id="img">
                            @error('logo')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="img">ایکون</label>
                            <input type="file" class="form-control" name="icon" id="img">
                            @error('icon')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection