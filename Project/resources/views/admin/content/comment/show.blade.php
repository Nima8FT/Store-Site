@extends('admin.layouts.master')

@section('head-tag')
<title>نظرات</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">نظرات</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">نمایش نظر</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    نمایش نظر
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('content.comment.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">

                <div class="card mb-3">
                    <div class="card-header bg-warning h5">{{ $comment->user->fullName }} -
                        {{ $comment->user->id }}
                    </div>
                    <div class="card-body">
                        <h5>محصول : {{ $comment->commentable->title }} - کد محصول : {{ $comment->commentable->id }}</h5>
                        <p>{{ $comment->body }}</p>
                    </div>
                </div>

                @if (!$comment->parent)
                    <form action="{{ route('content.comment.answer', $comment->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" class="mb-2">پاسخ ادمین</label>
                                    <textarea name="body" id="" class="form-control form-control-sm" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary fw-bold mt-3">ثبت</button>
                    </form>
                @endif

            </section>
        </section>
    </section>
</section>

@endsection