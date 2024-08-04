@extends('admin.layouts.master')

@section('head-tag')
<title>مقدار فرم کالا</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">مقدار فرم کالا</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ایجاد مقدار فرم کالا</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <div>
                    <a href="{{ route('market.property.index') }}"
                        class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
                    <a href="{{ route('market.value.create', $categoryAttribute->id) }}"
                        class="btn btn-primary btn-sm text-white p-2 fw-bold">ایجاد
                        مقدار فرم جدید</a>
                </div>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">نام کالا</th>
                            <th scope="col">نام فرم کالا</th>
                            <th scope="col">مقدار</th>
                            <th scope="col">افزایش قیمت</th>
                            <th scope="col">نوع</th>
                            <th scope="col" class="text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryAttribute->values as $value)                        
                            <tr>
                                <td>{{ $value->product->name }}</td>
                                <td>{{ $categoryAttribute->name }}</td>
                                <td>{{ json_decode($value->value)->value}}</td>
                                <td>{{ json_decode($value->value)->price_increase   }}</td>
                                <td>{{ $value->type ? 'انتخابی' : 'ساده'}}</td>
                                <td class="text-left">
                                    <a href="{{ route('market.value.edit', ['categoryAttribute' => $categoryAttribute->id, 'value' => $value->id]) }}"
                                        class="btn btn-primary mx-3 btn-sm fw-bold">
                                        <i class="fa fa-edit p-1"></i>
                                        ویرایش
                                    </a>
                                    <form class="d-inline"
                                        action="{{ route('market.value.destroy', ['categoryAttribute' => $categoryAttribute->id, 'value' => $value->id]) }}"
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