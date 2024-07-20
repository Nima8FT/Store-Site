@extends('admin.layouts.master')

@section('head-tag')
<title>کالا ها</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">کالا ها</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">کالا ها</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold">ایجاد
                    کالای جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" style="height: 150px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام کالا</th>
                            <th scope="col">تصویر کالا</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">وزن</th>
                            <th scope="col">دسته</th>
                            <th scope="col">فرم</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>سامسونگ</td>
                            <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="" class="max-height-2">
                            <td>25,000 تومان</td>
                            <td>13 کیلوگرم</td>
                            <td>کالای الکترونیکی</td>
                            <td>نمایشگر</td>
                            </td>
                            <td class="width-16 text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                        id="dropdownmenulink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i>
                                        عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-images"></i>
                                            گالری</a>
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-list-ul"></i> فرم
                                            کالا</a>
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-edit"></i>
                                            ویرایش</a>
                                        <form action="" method="POST"><button class="dropdown-item text-end"
                                                type="submit"><i class="fa fa-window-close"></i> حذف</button></form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>سامسونگ</td>
                            <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="" class="max-height-2">
                            <td>25,000 تومان</td>
                            <td>13 کیلوگرم</td>
                            <td>کالای الکترونیکی</td>
                            <td>نمایشگر</td>
                            </td>
                            <td class="width-16 text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                        id="dropdownmenulink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i>
                                        عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-images"></i>
                                            گالری</a>
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-list-ul"></i> فرم
                                            کالا</a>
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-edit"></i>
                                            ویرایش</a>
                                        <form action="" method="POST"><button class="dropdown-item text-end"
                                                type="submit"><i class="fa fa-window-close"></i> حذف</button></form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>سامسونگ</td>
                            <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="" class="max-height-2">
                            <td>25,000 تومان</td>
                            <td>13 کیلوگرم</td>
                            <td>کالای الکترونیکی</td>
                            <td>نمایشگر</td>
                            </td>
                            <td class="width-16 text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                        id="dropdownmenulink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i>
                                        عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-images"></i>
                                            گالری</a>
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-list-ul"></i> فرم
                                            کالا</a>
                                        <a href="#" class="dropdown-item text-end"><i class="fa fa-edit"></i>
                                            ویرایش</a>
                                        <form action="" method="POST"><button class="dropdown-item text-end"
                                                type="submit"><i class="fa fa-window-close"></i> حذف</button></form>
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