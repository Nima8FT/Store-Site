@extends('admin.layouts.master')

@section('head-tag')
<title>سفارشات</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">سفارشات</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">سفارشات</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('delivery.create') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold disabled"
                    disabled>ایجاد سفارش جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" style="height: 150px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">کد سفارش</th>
                            <th scope="col">مبلغ سفارش</th>
                            <th scope="col">مبلغ تخفیف</th>
                            <th scope="col">مبلغ نهایی</th>
                            <th scope="col">وضعیت پرداخت</th>
                            <th scope="col">شیوه پرداخت</th>
                            <th scope="col">بانک</th>
                            <th scope="col">وضعیت ارسال</th>
                            <th scope="col">شیوه ارسال</th>
                            <th scope="col">وضعیت سفارش</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>4567812</td>
                            <td>381,000 تومان</td>
                            <td>34,000 تومان</td>
                            <td>381,000 تومان</td>
                            <td>پرداخت شده</td>
                            <td>انلاین</td>
                            <td>ملت</td>
                            <td>وضعیت ارسال</td>
                            <td>شیوه ارسال</td>
                            <td>وضعیت سفارش</td>
                            </td>
                            <td class="width-16 text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                        id="dropdownmenulink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i>
                                        عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده
                                            فاکتور</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغیر
                                            وضعیت ارسال</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغیر
                                            وضعیت سفارش</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-window-close"></i>
                                            باطل کردن سفارش</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>4567812</td>
                            <td>381,000 تومان</td>
                            <td>34,000 تومان</td>
                            <td>381,000 تومان</td>
                            <td>پرداخت شده</td>
                            <td>انلاین</td>
                            <td>ملت</td>
                            <td>وضعیت ارسال</td>
                            <td>شیوه ارسال</td>
                            <td>وضعیت سفارش</td>
                            </td>
                            <td class="width-16 text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                        id="dropdownmenulink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i>
                                        عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده
                                            فاکتور</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغیر
                                            وضعیت ارسال</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغیر
                                            وضعیت سفارش</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-window-close"></i>
                                            باطل کردن سفارش</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>4567812</td>
                            <td>381,000 تومان</td>
                            <td>34,000 تومان</td>
                            <td>381,000 تومان</td>
                            <td>پرداخت شده</td>
                            <td>انلاین</td>
                            <td>ملت</td>
                            <td>وضعیت ارسال</td>
                            <td>شیوه ارسال</td>
                            <td>وضعیت سفارش</td>
                            </td>
                            <td class="width-16 text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                        id="dropdownmenulink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i>
                                        عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده
                                            فاکتور</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغیر
                                            وضعیت ارسال</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغیر
                                            وضعیت سفارش</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-window-close"></i>
                                            باطل کردن سفارش</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>

@endsection