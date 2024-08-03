@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">دسته بندی</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    دسته بندی
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.category.create') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">ایجاد دسته بندی</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">نام دسته</th>
                            <th scope="col">دسته والد</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">اسلاگ</th>
                            <th scope="col">تصویر</th>
                            <th scope="col">تگ ها</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">نمایش در منو</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productCategories as $productCategory)                        
                            <tr>
                                <td>{{ $productCategory->name }}</td>
                                <td>{{ $productCategory->parent ? $productCategory->parent->name : 'دسته اصلی'}}</td>
                                <td>
                                    <p class="truncate-text">{{ $productCategory->description }}</p>
                                </td>
                                <td>
                                    <p class="truncate-text">{{ $productCategory->slug }}</p>
                                </td>
                                <td>
                                    <img src="{{ asset($productCategory->image['indexArray'][$productCategory->image['currentImage']]) }}" alt="" class="max-height-2" width="50"
                                        height="50">
                                </td>
                                                                <td>
                                                                    <p class="truncate-text">{{ $productCategory->tags }}</p>
                                                                </td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" id="{{ $productCategory->id }}" onchange="ChangeStatus({{ $productCategory->id }})"
                                            data-url="{{ route('market.category.status', $productCategory->id) }}" @if ($productCategory->status === 1)
                                            checked @endif>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" id="showmenu-{{ $productCategory->id }}"
                                            onchange="ChangeShowMenu({{ $productCategory->id }})"
                                            data-url="{{ route('market.category.showmenu', $productCategory->id) }}" @if ($productCategory->show_in_menu === 1)
                                            checked @endif>
                                    </label>
                                </td>
                                <td class="width-16 text-left">
                                    <a href="{{ route('market.category.edit', $productCategory->id) }}" class="btn btn-primary btn-sm fw-bold">
                                        <i class="fa fa-edit p-1"></i>
                                        ویرایش
                                    </a>
                                    <form class="d-inline" action="{{ route('market.category.destroy', $productCategory->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm mx-3 fw-bold delete">
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
                        toastSuccess('دسته بندی با موفقیت فعال شد');
                    }
                    else {
                        element.prop('checked', false);
                        toastSuccess('دسته بندی با موفقیت غیر فعال شد');
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

    function ChangeShowMenu(id) {
        var element = $('#showmenu-' + id);
        var url = element.attr('data-url');
        var element_value = !element.prop('checked');
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                if (response.show_in_menu) {
                    if (response.checked) {
                        element.prop('checked', true);
                        toastSuccess('وضعیت نمایش دسته بندی با موفقیت فعال شد');
                    }
                    else {
                        element.prop('checked', false);
                        toastSuccess('وضعیت نمایش دسته بندی با موفقیت غیر فعال شد');
                    }
                }
                else {
                    element.prop('checked', element_value);
                    toastError('ارتباط برقرار نشد');
                }
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