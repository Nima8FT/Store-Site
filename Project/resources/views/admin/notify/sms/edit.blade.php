@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد اطلاعیه پیامکی</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">اطلاع رسانی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">اطلاعیه پیامکی</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد اطلاعیه پیامکی</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ایجاد اطلاعیه پیامکی</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('notify.sms.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('notify.sms.update', $sms->id) }}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row mb-4">
                        <div class="form-group col-12 py-2">
                            <label for="">عنوان پیامک</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $sms->title) }}">
                            @error('title')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ انتشار</label>
                            <input type="text" name="published_at" id="published_at" class="form-control d-none"
                                value="{{ $sms->published_at }}">
                            <input type="text" class="form-control" id="published_at_view"
                                value="{{ $sms->published_at }}">
                            @error('published_at')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status', $sms->status) == 0) selected @endif>غیر فعال</option>
                                <option value="1" @if (old('status', $sms->status) == 1) selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="">توضیحات</label>
                            <textarea name="body" class="form-control form-control-sm"
                                rows="6">{{ old('body', $sms->body) }}</textarea>
                            @error('body')
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
    $('#published_at_view').persianDatepicker({
        observe: true,
        format: 'YYYY/MM/DD H:m:s',
        altField: '#published_at',
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: true,
            }
        }
    });
</script>
@endsection