@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش تیکت</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">دسته بندی تیکت</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش دسته بندی تیکت</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ویرایش دسته بندی تیکت
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('ticket.category.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('ticket.category.update', $ticketCategory->id) }}" method="POST"
                    enctype="multipart/form-data" id="form">
                    @csrf
                    {{ method_field('put') }}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="name">نام دسته</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name', $ticketCategory->name) }}">
                            @error('name')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if(old('status', $ticketCategory->status) == 0) selected @endif>غیر
                                    فعال
                                </option>
                                <option value="1" @if(old('status', $ticketCategory->status) == 1) selected @endif>فعال
                                </option>
                            </select>
                            @error('status')
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