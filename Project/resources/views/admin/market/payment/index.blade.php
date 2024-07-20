@extends('admin.layouts.master')

@section('head-tag')
<title>پرداخت ها</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">پرداخت ها</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">پرداخت ها</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="#" class="btn btn-primary btn-sm text-white p-2 fw-bold disabled" disabled>ایجاد پرداخت
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
                            <th scope="col">کد تراکنش</th>
                            <th scope="col">بانک</th>
                            <th scope="col">پرداخت کننده</th>
                            <th scope="col">وضعیت پرداخت</th>
                            <th scope="col">نوع پرداخت</th>
                            <th scope="col" class="text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>23485641</td>
                            <td>ملی</td>
                            <td>نیما ملکوتی خواه</td>
                            <td>تایید شده</td>
                            <td>انلاین</td>
                            <td class="text-left">
                                <a href="#" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    مشاهده
                                </a>
                                <a href="#" class="btn btn-warning btn-sm mx-3 fw-bold">
                                    باطل کردن
                                </a>
                                <a href="#" class="btn btn-danger btn-sm mx-3 fw-bold">
                                    <i class="fa fa-reply p-1"></i>
                                    برگرداندن
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>23485641</td>
                            <td>ملی</td>
                            <td>نیما ملکوتی خواه</td>
                            <td>تایید شده</td>
                            <td>انلاین</td>
                            <td class="text-left">
                                <a href="#" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    مشاهده
                                </a>
                                <a href="#" class="btn btn-warning btn-sm mx-3 fw-bold">
                                    باطل کردن
                                </a>
                                <a href="#" class="btn btn-danger btn-sm mx-3 fw-bold">
                                    <i class="fa fa-reply p-1"></i>
                                    برگرداندن
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>23485641</td>
                            <td>ملی</td>
                            <td>نیما ملکوتی خواه</td>
                            <td>تایید شده</td>
                            <td>انلاین</td>
                            <td class="text-left">
                                <a href="#" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    مشاهده
                                </a>
                                <a href="#" class="btn btn-warning btn-sm mx-3 fw-bold">
                                    باطل کردن
                                </a>
                                <a href="#" class="btn btn-danger btn-sm mx-3 fw-bold">
                                    <i class="fa fa-reply p-1"></i>
                                    برگرداندن
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