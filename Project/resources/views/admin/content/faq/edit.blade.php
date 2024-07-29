@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش سوال</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">سوالات متداول</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش سوالات متداول</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ویرایش سوال</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('content.faq.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('content.faq.update', $faq->id) }}" method="POST" id="form">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status', $faq->status) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if (old('status', $faq->status) == 1) selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="tags">تگ ها</label>
                            <input type="hidden" class="form-control" name="tags" id="tags"
                                value="{{ old('tags', $faq->tags) }}">
                            <select id="select_tags" class="select2 form-control" multiple>
                            </select>
                            @error('tags')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="">پرسش</label>
                            <textarea name="question" id="question" class="form-control form-control-sm"
                                rows="6">{{old('question', $faq->question) }}</textarea>
                            @error('question')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="">پاسخ</label>
                            <textarea name="answer" id="answer" class="form-control form-control-sm"
                                rows="6">{{old('answer', $faq->answer) }}</textarea>
                            @error('answer')
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
    CKEDITOR.replace('question');
    CKEDITOR.replace('answer');
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