@extends('admin.layouts.master')

@section('head-tag')
<title>فرم کالا</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">فرم کالا</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد فرم کالا</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ایجاد فرم کالا
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.property.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('market.property.update', $categoryAttribute) }}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام فرم</label>
                            <input type="text" name="name" value="{{ old('name', $categoryAttribute->name) }}"
                                class="form-control">
                            @error('name')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">واحد اندازه گیری</label>
                            <input type="text" name="unit" value="{{ old('unit', $categoryAttribute->unit) }}"
                                class="form-control">
                            @error('unit')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="inputState">انتخاب دسته بندی</label>
                            <select name="category_id" id="inputState" class="form-control">
                                <option value="">دسته را انتخاب کنید</option>
                                @foreach ($productCategories as $productCategory)
                                    <option value="{{ $productCategory->id }}" @if (old('category_id', $productCategory->id) == $categoryAttribute->category_id) selected @endif>
                                        {{ $productCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection