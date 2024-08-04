@extends('admin.layouts.master')

@section('head-tag')
<title>کالا ها</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">کالا ها</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">کالا ها</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.product.create') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">ایجاد
                    کالای جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" style="height: 150px;">
                    <thead>
                        <tr>
                            <th scope="col">نام کالا</th>
                            <th scope="col">توضیح کالا</th>
                            <th scope="col">اسلاگ</th>
                            <th scope="col">تصویر کالا</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">تگ ها</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">قابل فروش بودن</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <p class="truncate-text">{{ $product->introduction }}</p>
                                </td>
                                <td>
                                    <p class="truncate-text">{{ $product->slug }}</p>
                                </td>
                                <td><img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}" width="50" height="50" alt=""
                                        class="max-height-2">
                                <td>{{$product->price}} تومان</td>
                                <td>{{ $product->tags }}</td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" id="{{ $product->id }}" onchange="ChangeStatus({{ $product->id }})"
                                        data-url="{{ route('market.product.status', $product->id) }}" @if ($product->status === 1)
                                        checked @endif>
                                    </label>
                                </td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" id="marketable-{{ $product->id }}" onchange="ChangeMarketable({{ $product->id }})"
                                        data-url="{{ route('market.product.marketable', $product->id) }}" @if ($product->marketable === 1)
                                        checked @endif>
                                    </label>
                                </td>
                                </td>
                                <td class="width-16 text-left">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                            id="dropdownmenulink" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-tools"></i>
                                            عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                                            <a href="{{ route('market.gallery.index', $product->id) }}" class="dropdown-item text-end"><i class="fa fa-images"></i>
                                                گالری</a>
                                            <a href="{{ route('market.color.index', $product->id) }}" class="dropdown-item text-end"><i class="fa fa-list-ul"></i> رنگ
                                                کالا</a>
                                            <a href="{{ route('market.product.edit', $product->id) }}" class="dropdown-item text-end"><i class="fa fa-edit"></i>
                                                ویرایش</a>
                                            <form action="{{ route('market.product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button class="dropdown-item text-end delete"
                                                    type="submit"><i class="fa fa-window-close"></i> حذف</button></form>
                                        </div>
                                    </div>
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
                        toastSuccess('وضعیت کالا با موفقیت فعال شد');
                    }
                    else {
                        element.prop('checked', false);
                        toastSuccess('وضعیت کالا با موفقیت غیر فعال شد');
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

        function ChangeMarketable(id) {
                var element = $('#marketable-' + id);
                var url = element.attr('data-url');
                var element_value = !element.prop('checked');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        if (response.marketable === true) {
                            if (response.checked) {
                                element.prop('checked', true);
                                toastSuccess('حالت کالا با موفقیت فعال شد');
                            }
                            else {
                                element.prop('checked', false);
                                toastSuccess('حالت کالا با موفقیت غیر فعال شد');
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