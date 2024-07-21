@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد کاربر ادمین</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">کاربران ادمین</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد کاربر ادمین</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ایجاد کاربر ادمین
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('user.admin-user.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form>
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام خانوادگی</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">ایمیل</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">شماره موبایل</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">کلمه عبور</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تکرار کلمه عبور</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">تصویر</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">وضعیت کاربر</label>
                            <select id="inputState" class="form-control">
                                <option selected>غیر فعال</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection