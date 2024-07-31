@extends('admin.layouts.master')

@section('head-tag')
<title>تنظیمات</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">تنظیمات</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">تنظیمات</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="٫" class="btn btn-primary btn-sm text-white p-2 fw-bold disabled" disabled>ایجاد ویژگی جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">عنوان</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">کلمات کلیدی</th>
                            <th scope="col">لوگو</th>
                            <th scope="col">ایکون</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p class="truncate-text">{{$setting->title}}</p>
                            </td>
                            <td>
                                <p class="truncate-text">{{$setting->description}}</p>
                            </td>
                            <td>
                                <p class="truncate-text">{{$setting->keywords}}</p>
                            </td>
                            <td>
                                <img src="{{ asset($setting->logo) }}" alt="" class="max-height-2" width="50"
                                    height="50">
                            </td>
                            <td>
                                <img src="{{ asset($setting->icon) }}" alt="" class="max-height-2" width="50"
                                    height="50">
                            </td>
                            <td class="width-16 text-left">
                                <a href="{{ route('setting.edit', $setting->id) }}"
                                    class="btn btn-primary btn-sm fw-bold">
                                    <i class="fa fa-edit p-1"></i>
                                    ویرایش
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