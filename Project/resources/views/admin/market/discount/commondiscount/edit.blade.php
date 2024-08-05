@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد تخفیف عمومی</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">عمومی تخفیف</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد تخفیف عمومی</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ایجاد تخفیف عمومی</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.common-discount.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('market.common-discount.update', $common_discount->id) }}" method="POST">
                    @csrf
                    {{method_field('put')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">عنوان مناسبت</label>
                            <input type="text" name="title" value="{{ old('title', $common_discount->title) }}"
                                class="form-control">
                            @error('title')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">درصد تخفیف</label>
                            <input type="text" name="percentage"
                                value="{{ old('percentage', $common_discount->percentage) }}" class="form-control">
                            @error('percentage')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">حداکثر تخفیف</label>
                            <input type="text" name="discount_ceiling"
                                value="{{ old('discount_ceiling', $common_discount->discount_ceiling) }}"
                                class="form-control">
                            @error('discount_ceiling')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">حداقل مبلغ خرید</label>
                            <input type="text" name="minimal_order_amount"
                                value="{{ old('minimal_order_amount', $common_discount->minimal_order_amount) }}"
                                class="form-control">
                            @error('minimal_order_amount')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ شروع</label>
                            <input type="text" name="start_date" id="start_date" class="form-control d-none" value="{{ $common_discount->start_date }}">
                            <input type=" text" class="form-control" id="start_date_view" value="{{ $common_discount->start_date }}">
                            @error('start_date')
                                <small class=" text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ پایان</label>
                            <input type="text" name="end_date" id="end_date" class="form-control d-none" value="{{ $common_discount->end_date }}">
                            <input type=" text" class="form-control" id="end_date_view" value="{{ $common_discount->end_date }}">
                            @error('end_date')
                                <small class=" text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status', $common_discount->status) == 0) selected @endif>غیر
                                    فعال</option>
                                <option value="1" @if (old('status', $common_discount->status) == 1) selected @endif>فعال
                                </option>
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

@section('script')
<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

<script>
    $('#start_date_view').persianDatepicker({
        observe: true,
        format: 'YYYY/MM/DD H:m:s',
        altField: '#start_date',
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: true,
            }
        }
    });

    $('#end_date_view').persianDatepicker({
        observe: true,
        format: 'YYYY/MM/DD H:m:s',
        altField: '#end_date',
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: true,
            }
        }
    });
</script>
@endsection