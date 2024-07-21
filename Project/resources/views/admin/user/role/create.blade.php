@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد نقش</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">نقش ها</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد نقش</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ایجاد نقش جدید
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('user.role.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form>
                    <div class="row mb-4 d-flex justify-content-around align-items-center">
                        <div class="form-group col-md-5">
                            <label for="">عنوان نقش</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="">توضیح نقش</label>
                            <input type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary fw-bold col-md-2 mt-4"
                            style="height: 35px;width:10%">ثبت</button>
                    </div>

                    <div class="col-12 row border-top py-2">
                        <div class="col-md-3">
                            <div class="form-check d-flex align-items-center mt-2">
                                <input type="checkbox" class="form-check-input mx-1" id="check1" checked>
                                <label for="check1" class="form-check-label mx-2 mt-2">نمایش دسته جدید</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check d-flex align-items-center mt-2">
                                <input type="checkbox" class="form-check-input mx-1" id="check1" checked>
                                <label for="check1" class="form-check-label mx-2 mt-2">نمایش دسته جدید</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check d-flex align-items-center mt-2">
                                <input type="checkbox" class="form-check-input mx-1" id="check1" checked>
                                <label for="check1" class="form-check-label mx-2 mt-2">نمایش دسته جدید</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check d-flex align-items-center mt-2">
                                <input type="checkbox" class="form-check-input mx-1" id="check1" checked>
                                <label for="check1" class="form-check-label mx-2 mt-2">نمایش دسته جدید</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check d-flex align-items-center mt-2">
                                <input type="checkbox" class="form-check-input mx-1" id="check1" checked>
                                <label for="check1" class="form-check-label mx-2 mt-2">نمایش دسته جدید</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check d-flex align-items-center mt-2">
                                <input type="checkbox" class="form-check-input mx-1" id="check1" checked>
                                <label for="check1" class="form-check-label mx-2 mt-2">نمایش دسته جدید</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check d-flex align-items-center mt-2">
                                <input type="checkbox" class="form-check-input mx-1" id="check1" checked>
                                <label for="check1" class="form-check-label mx-2 mt-2">نمایش دسته جدید</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check d-flex align-items-center mt-2">
                                <input type="checkbox" class="form-check-input mx-1" id="check1" checked>
                                <label for="check1" class="form-check-label mx-2 mt-2">نمایش دسته جدید</label>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection