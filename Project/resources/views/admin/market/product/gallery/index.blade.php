@extends('admin.layouts.master')

@section('head-tag')
<title>تصویر ها</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">تصویر ها</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">تصویر ها</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <div class="d-flex">
                    <section class="main-body-container-buttons d-flex justify-content-between align-items-center">
                        <a href="{{ route('market.product.index') }}"
                            class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
                    </section>
                    <a href="{{ route('market.gallery.create', $product->id) }}"
                        class="btn btn-primary btn-sm text-white p-2 fw-bold mx-3">ایجاد
                        تصویر جدید</a>
                </div>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" style="height: 150px;">
                    <thead>
                        <tr>
                            <th scope="col">نام رنگ</th>
                            <th scope="col">نام کالا</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->images as $image)
                            <tr>
                                <td><img src="{{ asset($image->image['indexArray'][$image->image['currentImage']]) }}"
                                        width="50" height="50" alt="" class="max-height-2"></td>
                                <td>{{ $image->product->name }}</td>
                                <td class="width-16 text-left">
                                    <form class="d-inline"
                                        action="{{ route('market.gallery.destroy', ['product' => $product->id, 'gallery' => $image->id]) }}"
                                        method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm mx-3 fw-bold delete">
                                            <i class="fa fa-trash-alt p-1"></i>
                                            حذف
                                        </button>
                                    </form>
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

@section('script')

@include('admin.alerts.sweetalert.confirm-delete', ['class_name' => 'delete'])

@endsection