@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش فایل اطلاعیه ایمیلی</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">اطلاع رسانی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">اطلاعیه ایمیلی</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش فایل اطلاعیه ایمیلی</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ویرایش فایل اطلاعیه ایمیلی</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('notify.email-file.index', $file->public_mail_id) }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('notify.email-file.update', $file->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">تصویر</label>
                            <input type="file" name="file" class="form-control">
                            @error('file')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status', $file->status) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if (old('status', $file->status) == 1) selected @endif>فعال</option>
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
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('body');
</script>

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