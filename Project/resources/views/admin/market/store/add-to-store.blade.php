@extends('admin.layouts.master')

@section('head-tag')
<title>اضافه کردن به انبار</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">انبار</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">اضافه کردن به انبار</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">اضافه کردن به انبار</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.store.index') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form>
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام تحویل گیرنده</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام تحویل دهنده</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تعداد</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="mb-2">توضیحات</label>
                            <textarea name="" id="" class="form-control form-control-sm" rows="4"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection