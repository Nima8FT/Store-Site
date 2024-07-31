@extends('admin.layouts.master')

@section('head-tag')
<title>کاربران ادمین</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">کاربران ادمین</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">کاربران ادمین</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('user.admin-user.create') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">ایجاد
                    ادمین جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">نام</th>
                            <th scope="col">نام خانوادگی</th>
                            <th scope="col">شماره موبایل</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">تصویر</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">فعالسازی</th>
                            <th scope="col">نفش</th>
                            <th scope="col" class="text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)                        
                            <tr>
                                <td>{{ $admin->first_name }}</td>
                                <td>{{ $admin->last_name }}</td>
                                <td>{{ $admin->mobile }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <img src="{{ asset($admin->profile_photo_path) }}" alt="" class="max-height-2"
                                        width="50" height="50">
                                </td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" id="{{ $admin->id }}" onchange="ChangeStatus({{ $admin->id }})"
                                            data-url="{{ route('user.admin-user.status', $admin->id) }}" @if ($admin->status === 1)
                                            checked @endif>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" id="activation-{{ $admin->id }}" onchange="ChangeActivation({{ $admin->id }})"
                                            data-url="{{ route('user.admin-user.activation', $admin->id) }}" @if ($admin->activation === 1)
                                            checked @endif>
                                    </label>
                                </td>
                                <td>سوپر ادمین</td>
                                <td class="text-left">
                                    <a href="#" class="btn btn-warning btn-sm fw-bold">
                                        <i class="fa fa-edit p-1"></i>نقش</a>
                                    <a href="{{ route('user.admin-user.edit', $admin->id) }}" class="btn btn-primary mx-3 btn-sm fw-bold">
                                        <i class="fa fa-edit p-1"></i>
                                        ویرایش
                                    </a>
                                    <form class="d-inline" action="{{ route('user.admin-user.destroy', $admin->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold delete">
                                            <i class="fa fa-trash-alt p-1"></i>
                                            حذف
                                        </button>
                                    </form>
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
                        toastSuccess('وضعیت کاربر ادمین با موفقیت فعال شد');
                    }
                    else {
                        element.prop('checked', false);
                        toastSuccess('وضعیت کاربر ادمین با موفقیت غیر فعال شد');
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

    function ChangeActivation(id) {
        var element = $('#activation-' + id);
        var url = element.attr('data-url');
        var element_value = !element.prop('checked');
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                if (response.activation) {
                    if (response.checked) {
                        element.prop('checked', true);
                        toastSuccess('کاربر ادمین با موفقیت فعال شد');
                    }
                    else {
                        element.prop('checked', false);
                        toastSuccess('کاربر ادمین با موفقیت غیر فعال شد');
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