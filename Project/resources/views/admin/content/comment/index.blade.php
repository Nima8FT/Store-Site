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
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">نظرات</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">نظرات</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="#" class="btn btn-primary btn-sm text-white p-2 fw-bold disabled">ایجاد نظر
                    جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">نظر</th>
                            <th scope="col">پاسخ به</th>
                            <th scope="col">کد کاربر</th>
                            <th scope="col">نویسنده نظر</th>
                            <th scope="col">کد پست</th>
                            <th scope="col">نام پست</th>
                            <th scope="col">تاییدیه</th>
                            <th scope="col">وضعیت دیدن</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)                        
                            <tr>
                                <td><p class="truncate-text">{{ $comment->body }}</p></td>
                                <td>
                                    <p class="truncate-text">{{ $comment->parent ? $comment->parent->body : 'پاسخی ندارد' }}</p>
                                </td>
                                <td>{{ $comment->author_id }}</td>
                                <td>{{ $comment->user->fullName }}</td>
                                <td>{{ $comment->commentable_id }}</td>
                                <td>{{ $comment->commentable->title }}</td>
                                <td @if (!$comment->approved) class="text-danger" @endif>{{ $comment->approved ? 'تایید شده' : 'تایید نشده'}}</td>
                                <td @if (!$comment->seen) class="text-danger" @endif>{{ $comment->seen ? 'دیده شده' : 'دیده نشده'}}</td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" id="{{ $comment->id }}" onchange="ChangeStatus({{ $comment->id }})"
                                            data-url="{{ route('content.comment.status', $comment->id) }}" @if ($comment->status === 1)
                                            checked @endif>
                                    </label>
                                </td>
                                <td class="width-16 text-left">
                                    <a href="{{ route('content.comment.show', $comment->id) }}" class="btn btn-primary btn-sm fw-bold">
                                        <i class="fa fa-eye p-1"></i>
                                        نمایش
                                    </a>
                                    @if ($comment->approved)                                     
                                        <a href="{{ route('content.comment.approved', $comment->id) }}"  class="btn btn-warning btn-sm mx-3 fw-bold">
                                            <i class="fa fa-clock p-1"></i>
                                            عدم تایید
                                        </a>
                                    @else  
                                        <a href="{{ route('content.comment.approved', $comment->id) }}"  class="btn btn-success btn-sm mx-3 fw-bold">
                                            <i class="fa fa-check p-1"></i>
                                            تایید
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>

@endsection

@section('script')
<script>
    function ChangeStatus(id) {
        var element = $('#' + id);
        var url = element.attr('data-url');
        var element_value = !element.prop('checked');
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                if (response.status === true) {
                    if (response.checked) {
                        element.prop('checked', true);
                        toastSuccess('نظر با موفقیت فعال شد');
                    }
                    else {
                        element.prop('checked', false);
                        toastSuccess('نظر با موفقیت غیر فعال شد');
                    }
                }
                else {
                    element.prop('checked', element_value);
                    toastError('ارتباط برقرار نشد');
                }
            },
            error: function (response) {
                element.prop('checked', element_value);
                toastError('ارتباط برقرار نشد');
            }
        });
    }


    function toastSuccess(message) {
        var html = '<div class="toast" data-delay="500"><div class="toast-body py-3 d-flex bg-success text-white">' +
            '<strong class="mr-auto">' + message + '</strong>' +
            '<button type="button" class="close" data-dismiss="toast" aria-label="Close">' +
            '<span aria-hidde="true">&times;</span>' +
            '</button></div></div>';

        $('.toast-wrapper').append(html);
        $('.toast').toast('show').delay(3000).queue(function () {
            $(this).remove();
        });
    }

    function toastError(message) {
        var html = '<div class="toast" data-delay="500"><div class="toast-body py-3 d-flex bg-danger text-white">' +
            '<strong class="mr-auto">' + message + '</strong>' +
            '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">' +
            '<span aria-hidde="true">&times;</span>' +
            '</button></div></div>';

        $('.toast-wrapper').append(html);
        $('.toast').toast('show').delay(3000).queue(function () {
            $(this).remove();
        });
    }
</script>

@include('admin.alerts.sweetalert.confirm-delete', ['class_name' => 'delete'])

@endsection