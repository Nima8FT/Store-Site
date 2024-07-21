@extends('admin.layouts.master')

@section('head-tag')
<title>نقش ها</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">نقش ها</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">نقش ها</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('user.role.create') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold">ایجاد
                    نقش جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام نقش</th>
                            <th scope="col">دسترسی ها</th>
                            <th scope="col" class="text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>پشتیبان فروش</td>
                            <td>
                                مشاهده سفارشات <br>
                                مشاهده پرداخت ها <br>
                                مشاهده تخفیف ها <br>
                            </td>
                            <td class="text-left">
                                <a href="#" class="btn btn-success btn-sm fw-bold">
                                    <i class="fa fa-user-graduate p-1"></i>
                                    دسترسی ها
                                </a>
                                <a href="#" class="btn btn-primary mx-3 btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    ویرایش
                                </a>
                                <a href="#" class="btn btn-danger btn-sm fw-bold">
                                    <i class="fa fa-trash-alt p-1"></i>
                                    حذف
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>پشتیبان فروش</td>
                            <td>
                                مشاهده سفارشات <br>
                                مشاهده پرداخت ها <br>
                                مشاهده تخفیف ها <br>
                            </td>
                            <td class="text-left">
                                <a href="#" class="btn btn-success btn-sm fw-bold">
                                    <i class="fa fa-user-graduate p-1"></i>
                                    دسترسی ها
                                </a>
                                <a href="#" class="btn btn-primary mx-3 btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    ویرایش
                                </a>
                                <a href="#" class="btn btn-danger btn-sm fw-bold">
                                    <i class="fa fa-trash-alt p-1"></i>
                                    حذف
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>پشتیبان فروش</td>
                            <td>
                                مشاهده سفارشات <br>
                                مشاهده پرداخت ها <br>
                                مشاهده تخفیف ها <br>
                            </td>
                            <td class="text-left">
                                <a href="#" class="btn btn-success btn-sm fw-bold">
                                    <i class="fa fa-user-graduate p-1"></i>
                                    دسترسی ها
                                </a>
                                <a href="#" class="btn btn-primary mx-3 btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    ویرایش
                                </a>
                                <a href="#" class="btn btn-danger btn-sm fw-bold">
                                    <i class="fa fa-trash-alt p-1"></i>
                                    حذف
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