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
        <li class="breadcrumb-item font-size-12"><a href="#">کپن تخفیف</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد کپن تخفیف</li>
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
                <a href="{{ route('market.copan.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form>
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">کد کپن</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">نوع کپن</label>
                            <select id="inputState" class="form-control">
                                <option selected>عمومی</option>
                                <option>خصوصی</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">درصد تخفیف</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">حداکثر تخفیف</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">عنوان مناسبت</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ شروع</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ پایان</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection