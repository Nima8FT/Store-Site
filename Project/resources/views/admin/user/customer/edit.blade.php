@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش کاربر مشتری</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">کاربران مشتری</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش کاربر مشتری</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ویرایش کاربر مشتری
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('user.customer.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('user.customer.update', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام</label>
                            <input type="text" name="first_name" class="form-control"
                                value="{{ old('first_name', $user->first_name) }}">
                            @error('first_name')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام خانوادگی</label>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ old('last_name', $user->last_name) }}">
                            @error('last_name')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">کد ملی</label>
                            <input type="text" name="national_code" class="form-control"
                                value="{{ old('national_code', $user->national_code) }}">
                            @error('national_code')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status', $user->status) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if (old('status', $user->status) == 1) selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="activation">وضعیت فعال سازی</label>
                            <select id="activation" name="activation" class="form-control">
                                <option value="0" @if (old('activation', $user->activation) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if (old('activation', $user->activation) == 1) selected @endif>فعال
                                </option>
                            </select>
                            @error('activation')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">تصویر</label>
                            <input type="file" name="profile_photo_path" class="form-control">
                            <img src="{{ asset($user->profile_photo_path) }}" width="50" height="50" class="mt-2"
                                alt="">
                            @error('profile_photo_path')
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