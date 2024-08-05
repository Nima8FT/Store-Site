@extends('admin.layouts.master')

@section('head-tag')
<title>افزودن فروش شگفت انگیز </title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">فروش شگفت انگیز</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">افزودن به فروش شگفت انگیز</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">افزودن به فروش شگفت انگیز</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.amazing-sale.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('market.amazing-sale.update', $amazing_sale) }}" method="POST">
                    @csrf
                    {{method_field('put')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">انتخاب دسته بندی</label>
                            <select name="product_id" id="inputState" class="form-control">
                                <option value="">کالا را انتخاب کنید</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" @if (old('product_id', $amazing_sale->product_id) == $product->id) selected @endif>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">درصد تخفیف</label>
                            <input type="text" name="percentage"
                                value="{{ old('percentage', $amazing_sale->percentage) }}" class="form-control">
                            @error('percentage')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ شروع</label>
                            <input type="text" name="start_date" id="start_date" class="form-control d-none"
                                value="{{ $amazing_sale->start_date }}">
                            <input type="text" class="form-control" id="start_date_view"
                                value="{{ $amazing_sale->start_date }}">
                            @error('start_date')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ پایان</label>
                            <input type="text" name="end_date" id="end_date" class="form-control d-none"
                                value="{{ $amazing_sale->end_date }}">
                            <input type="text" class="form-control" id="end_date_view"
                                value="{{ $amazing_sale->end_date }}">
                            @error('end_date')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status', $amazing_sale->status) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if (old('status', $amazing_sale->status) == 1) selected @endif>فعال
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