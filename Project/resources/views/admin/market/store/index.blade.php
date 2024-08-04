@extends('admin.layouts.master')

@section('head-tag')
<title>انبار</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">انبار</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">انبار</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="#" class="btn btn-primary btn-sm text-white p-2 fw-bold disabled " disabled>ایجاد انبار
                    جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">نام کالا</th>
                            <th scope="col">تصویر کالا</th>
                            <th scope="col">تعداد قابل فروش</th>
                            <th scope="col">تعداد رزرو شده</th>
                            <th scope="col">تعداد فروخته شده</th>
                            <th scope="col" class="text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)                        
                            <tr>
                                <td>{{$product->name}}</td>
                                <td><img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}"
                                        width="50" height="50" alt="" class="max-height-2"></td>
                                <td>{{$product->marketable_number}}</td>
                                <td>{{$product->frozen_number}}</td>
                                <td>{{$product->sold_number}}</td>
                                <td class="text-left">
                                    <a href="{{ route("market.store.addToStore", $product->id) }}"
                                        class="btn btn-primary btn-sm fw-bold">
                                        <i class="fa fa-edit p-1"></i>
                                        افزایش موجودی
                                    </a>
                                    <a href="{{ route("market.store.edit", $product->id) }}"
                                        class="btn btn-warning btn-sm mx-3 fw-bold">
                                        <i class="fa fa-edit p-1"></i>
                                        اصلاح موجودی
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>

@endsection