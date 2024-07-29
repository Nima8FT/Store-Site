@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش پست</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">پست</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش پست</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ویرایش پست</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('content.post.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('content.post.update',$post->id) }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">عنوان پست</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $post->title) }}">
                            @error('title')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">دسته بندی</label>
                            <select id="inputState" class="form-control" name="category_id">
                                <option selected>دسته را انتخاب کنید</option>
                                @foreach ($postCategories as $postCategory)
                                    <option value="{{$postCategory->id}}" @if (old('category_id',$post->category_id) == $postCategory->id)
                                    selected @endif>{{$postCategory->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">تصویر</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                            <div class="row mt-3">
                                @php
$number =1;
                                @endphp
                                @foreach ($post->image['indexArray'] as $key => $value)
                                <div class="col-md-3">
                                     <div class="form-check">
                                            <input type="radio" class="form-check" name="currentImage" id="{{$number}}" value="{{ $key }}" @if ($post->image['currentImage'] == $key) checked @endif>
                                        <label for="{{$number}}" class="form-check-label mx-2">
                                            <img src="{{ asset($value) }}" alt="" style="max-width:120px">
                                        </label>
                                        </div>
                                </div>
                                @php
                                $number++;
                                @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status',$post->status) == 0) selected @endif>غیر فعال</option>
                                <option value="1" @if (old('status', $post->status) == 1) selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="commentable">امکان درج کامنت</label>
                            <select id="commentable" name="commentable" class="form-control">
                                <option value="0" @if (old('commentable',$post->commentable) == 0) selected @endif>غیر فعال</option>
                                <option value="1" @if (old('commentable',$post->commentable) == 1) selected @endif>فعال</option>
                            </select>
                            @error('commentable')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ انتشار</label>
                            <input type="text" name="published_at" id="published_at" class="form-control d-none">
                            <input type="text" class="form-control" id="published_at_view">
                            @error('published_at')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="tags">تگ ها</label>
                            <input type="hidden" class="form-control" name="tags" id="tags" value="{{ old('tags',$post->tags) }}">
                            <select id="select_tags" class="select2 form-control" multiple>
                            </select>
                            @error('tags')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="">خلاصه پست</label>
                            <textarea name="summary" id="summary" class="form-control form-control-sm"
                                rows="6">{{old('summary',$post->summary) }}</textarea>
                            @error('summary')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="">توضیحات</label>
                            <textarea name="body" id="body" class="form-control form-control-sm"
                                rows="6">{{old('body',$post->body) }}</textarea>
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
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
    CKEDITOR.replace('summary');
    CKEDITOR.replace('body');
</script>

<script>
    $('#published_at_view').persianDatepicker({
        observe: true,
        format: 'YYYY/MM/DD',
        altField: '#published_at',
    });
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