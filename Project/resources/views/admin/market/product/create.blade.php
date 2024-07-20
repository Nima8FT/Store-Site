@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد کالا</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">کالا ها</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد کالای جدید</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ایجاد کالا</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form>
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام کالا</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">دسته کالا</label>
                            <select id="inputState" class="form-control">
                                <option selected>دسته را انتخاب کنید</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">فرم کالا</label>
                            <select id="inputState" class="form-control">
                                <option selected>دسته را انتخاب کنید</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">تصویر</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">قیمت کالا</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">وزن کالا</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="">توضیحات</label>
                            <textarea name="body" id="body" class="form-control form-control-sm" rows="6"></textarea>
                        </div>
                        <div class="border-top border-bottom py-3">
                            <div class="product-property row">
                                <div class="form-group col-md-3 py-2 col-6">
                                    <input type="text" class="form-control" placeholder="ویژگی">
                                </div>
                                <div class="form-group col-md-3 py-2 col-6">
                                    <input type="text" class="form-control" placeholder="مقدار">
                                </div>
                            </div>
                            <button type="button"
                                class="btn bg-success btn-sm text-white fw-bold w-25 mt-2">افزودن</button>
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