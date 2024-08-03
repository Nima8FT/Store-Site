@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش روش ارسال</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">روش های ارسال</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش روش ارسال</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ویرایش روش ارسال</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.delivery.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('market.delivery.update', $delivery->id) }}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام روش ارسال</label>
                            <input type="text" name="name" value="{{ old('name', $delivery->name) }}"
                                class="form-control">
                            @error('name')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">هزینه روش ارسال</label>
                            <input type="text" name="amount" value="{{ old('amount', (int) $delivery->amount) }}"
                                class="form-control">
                            @error('amount')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">زمان ارسال</label>
                            <input type="text" name="delivery_time"
                                value="{{ old('delivery_time', $delivery->delivery_time) }}" class="form-control">
                            @error('delivery_time')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">واحد زمان ارسال</label>
                            <input type="text" name="delivery_time_unit"
                                value="{{ old('delivery_time_unit', $delivery->delivery_time_unit) }}"
                                class="form-control">
                            @error('delivery_time_unit')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if(old('status', $delivery->status) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if(old('status', $delivery->status) == 1) selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection