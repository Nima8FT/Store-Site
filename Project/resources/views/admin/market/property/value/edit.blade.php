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
        <li class="breadcrumb-item font-size-12"><a href="#">مقدار فرم کالا</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش مقدار فرم کالا</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ویرایش مقدار فرم کالا
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.value.index', $categoryAttribute->id) }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form
                    action="{{ route('market.value.update', ['categoryAttribute' => $categoryAttribute->id, 'value' => $value->id]) }}"
                    method="POST">
                    @csrf
                    {{method_field('put')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">مقدار</label>
                            <input type="text" name="value"
                                value="{{ old('value', json_decode($value->value)->value) }}" class="form-control">
                            @error('value')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">افزایش قیمت</label>
                            <input type="text" name="price_increase"
                                value="{{ old('price_increase', json_decode($value->value)->price_increase) }}"
                                class="form-control">
                            @error('price_increase')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="type">نوع</label>
                            <select id="type" name="type" class="form-control">
                                <option value="0" @if (old('type', $value->type) == 0) selected @endif>ساده</option>
                                <option value="1" @if (old('type', $value->type) == 1) selected @endif>انتخابی</option>
                            </select>
                            @error('type')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">انتخاب محصول</label>
                            <select name="product_id" id="inputState" class="form-control">
                                <option value="">محصول را انتخاب کنید</option>
                                @foreach ($categoryAttribute->category->products as $product)
                                    <option value="{{ $product->id }}" @if (old('product_id', $value->product_id) == $product->id) selected @endif>
                                        {{ $product->name }}
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