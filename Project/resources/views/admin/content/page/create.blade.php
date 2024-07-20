@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد پیج</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">پیج ساز</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد پیج</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ایجاد پیج
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('content.page.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form>
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">عنوان</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">ادرس url</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="">توضیحات</label>
                            <textarea name="body" id="body" class="form-control form-control-sm" rows="6"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection

@section('script')
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('body');
</script>
@endsection