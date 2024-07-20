@extends('admin.layouts.master')

@section('head-tag')
<title>کپن تخفیف</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">کپن تخفیف</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ایجاد کپن تخفیف</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.copan.create') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold">ایجاد کپن
                    تخفیف</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">کد کپن</th>
                            <th scope="col">درصد تخفیف</th>
                            <th scope="col">سقف تخفیف</th>
                            <th scope="col">نوع کپن</th>
                            <th scope="col">تاریخ شروع</th>
                            <th scope="col">تاریخ پایان</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>fgdasg</td>
                            <td>15%</td>
                            <td>25,000 تومان</td>
                            <td>عمومی</td>
                            <td>24 اردیبهشت 99</td>
                            <td>31 اردیبهشت 99</td>
                            <td class="width-16 text-left">
                                <a href="#" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    ویرایش
                                </a>
                                <a href="#" class="btn btn-danger btn-sm mx-3 fw-bold">
                                    <i class="fa fa-trash-alt p-1"></i>
                                    حذف
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>fgdasg</td>
                            <td>15%</td>
                            <td>25,000 تومان</td>
                            <td>عمومی</td>
                            <td>24 اردیبهشت 99</td>
                            <td>31 اردیبهشت 99</td>
                            <td class="width-16 text-left">
                                <a href="#" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    ویرایش
                                </a>
                                <a href="#" class="btn btn-danger btn-sm mx-3 fw-bold">
                                    <i class="fa fa-trash-alt p-1"></i>
                                    حذف
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>fgdasg</td>
                            <td>15%</td>
                            <td>25,000 تومان</td>
                            <td>عمومی</td>
                            <td>24 اردیبهشت 99</td>
                            <td>31 اردیبهشت 99</td>
                            <td class="width-16 text-left">
                                <a href="#" class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    ویرایش
                                </a>
                                <a href="#" class="btn btn-danger btn-sm mx-3 fw-bold">
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