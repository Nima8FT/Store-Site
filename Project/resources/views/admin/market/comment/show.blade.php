@extends('admin.layouts.master')

@section('head-tag')
<title>نظرات</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">نظرات</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">نمایش نظر ها</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    نمایش نظرات
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('comment.index') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">

                <div class="card mb-3">
                    <div class="card-header bg-warning">نیما ملکوتی خواه - 121548745</div>
                    <div class="card-body">
                        <h5>کد کالا 4547452 گوشی ایفون 13</h5>
                        <p>به نظر من گوشی خوبی ارزش خرید دارد</p>
                    </div>
                </div>

                <form action="">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="mb-2">پاسخ ادمین</label>
                                <textarea name="" id="" class="form-control form-control-sm" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold mt-3">ثبت</button>
                </form>

            </section>
        </section>
    </section>
</section>

@endsection