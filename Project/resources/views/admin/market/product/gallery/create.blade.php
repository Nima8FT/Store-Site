@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد تصویر</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">تصویر ها</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد تصویر جدید</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ایجاد تصویر</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.gallery.index', $product->id) }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('market.gallery.store', $product->id) }}" method="POST"
                    enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="form-group col-12 py-2">
                        <label for="inputState">تصویر</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <small class="text-danger" role="alert">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="row mb-4">
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection