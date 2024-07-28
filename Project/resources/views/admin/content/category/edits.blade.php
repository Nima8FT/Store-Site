@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">دسته بندی</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد دسته بندی</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ایجاد دسته بندی
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('content.category.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('content.category.update', $postCategory->id) }}" method="POST"
                    enctype="multipart/form-data" id="form">
                    @csrf
                    {{ method_field('put') }}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="name">نام دسته</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name', $postCategory->name) }}">
                            @error('name')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="tags">تگ ها</label>
                            <input type="hidden" class="form-control" name="tags" id="tags"
                                value="{{ old('tags', $postCategory->tags) }}">
                            <select name="" id="select_tags" class="select2 form-control" multiple></select>
                            @error('tags')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if(old('status', $postCategory->status) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if(old('status', $postCategory->status) == 1) selected @endif>فعال
                                </option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="img">تصویر</label>
                            <input type="file" class="form-control" name="image" id="img">
                            @error('image')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                            <div class="row mt-3">
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($postCategory->image['indexArray'] as $key => $value)

                                                                <div class="col-md-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input" name="currentImage"
                                                                            id="{{ $number }}" value="{{ $key }}" @if ($postCategory->image['currentImage'] == $key) checked @endif>
                                                                        <label for="{{$number}}" class="form-check-label mx-2"><img src="{{ asset($value) }}" alt=""
                                                                                style="max-width:100px;"></label>
                                                                    </div>
                                                                </div>
                                                                @php
                                                                    $number++;
                                                                @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="description">توضیحات</label>
                            <textarea name="description" id="description" class="form-control form-control-sm"
                                rows="6">{{ old('description', $postCategory->description) }}</textarea>
                            @error('description')
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
    CKEDITOR.replace('description');
</script>

<script>
    $(document).ready(function () {
        var input_tags = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = input_tags.val();
        var default_data = null;
        if (input_tags.val() !== null && input_tags.val().length > 0) {
            default_data = default_tags.split(',');
        }
        select_tags.select2({
            placeholder: 'لطفا تگ های خود را وارد نمایید',
            tags: true,
            data: default_data,
        })
        select_tags.children('option').attr('selected', true).trigger('change');
        $('#form').submit(function (e) {
            if (select_tags.val() !== null && select_tags.length > 0) {
                var selected_source = select_tags.val().join(',');
                input_tags.val(selected_source);
            }
        });
    });
</script>
@endsection