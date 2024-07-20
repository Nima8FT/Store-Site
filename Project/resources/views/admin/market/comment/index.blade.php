@extends('admin.layouts.master')

@section('head-tag')
<title>نظرات</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">نظرات</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">نظرات</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="#" class="btn btn-primary btn-sm text-white p-2 fw-bold disabled">ایجاد نظر
                    جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام کاربر</th>
                            <th scope="col">نویسنده نظر</th>
                            <th scope="col">کد کالا</th>
                            <th scope="col">کالا</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>415687</td>
                            <td>نیما ملکوتی خواه</td>
                            <td>415687</td>
                            <td>شارژر</td>
                            <td>در انتظار تایید</td>
                            <td class="width-16 text-left">
                                <a href="{{ route('comment.create') }}" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-eye p-1"></i>
                                    نمایش
                                </a>
                                <a href="#" class="btn btn-success btn-sm mx-3 fw-bold">
                                    <i class="fa fa-check p-1"></i>
                                    تایید
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>415687</td>
                            <td>نیما ملکوتی خواه</td>
                            <td>415687</td>
                            <td>شارژر</td>
                            <td>تایید شده</td>
                            <td class="width-16 text-left">
                                <a href="#" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-eye p-1"></i>
                                    نمایش
                                </a>
                                <a href="#" class="btn btn-warning btn-sm mx-3 fw-bold">
                                    <i class="fa fa-clock p-1"></i>
                                    عدم تایید
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>415687</td>
                            <td>نیما ملکوتی خواه</td>
                            <td>415687</td>
                            <td>شارژر</td>
                            <td>در انتظار تایید</td>
                            <td class="width-16 text-left">
                                <a href="#" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-eye p-1"></i>
                                    نمایش
                                </a>
                                <a href="#" class="btn btn-success btn-sm mx-3 fw-bold">
                                    <i class="fa fa-check p-1"></i>
                                    تایید
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>

@endsection