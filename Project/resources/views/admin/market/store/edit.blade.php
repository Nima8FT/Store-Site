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
                <a href="{{ route('market.store.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('market.store.update', $product->id) }}" method="POST">
                    @csrf
                    {{method_field('put')}}
                    <div class="row mb-4">
                        <div class="form-group col-12 py-2">
                            <label for="">تعداد قابل فروش</label>
                            <input type="text" name="marketable_number"
                                value="{{ old('marketable_number', $product->marketable_number) }}"
                                class="form-control">
                            @error('marketable_number')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="">تعداد رزرو شده</label>
                            <input type="text" name="frozen_number"
                                value="{{ old('frozen_number', $product->frozen_number) }}" class="form-control">
                            @error('frozen_number')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="">تعداد فروخته شده</label>
                            <input type="text" name="sold_number"
                                value="{{ old('sold_number', $product->sold_number) }}" class="form-control">
                            @error('sold_number')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection