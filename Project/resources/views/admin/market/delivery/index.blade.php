@extends('admin.layouts.master')

@section('head-tag')
<title>روش های ارسال</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">روش های ارسال</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">روش های ارسال</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.delivery.create') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">ایجاد روش
                    ارسال جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">نام روش ارسال</th>
                            <th scope="col">هزینه ارسال</th>
                            <th scope="col">زمان ارسال</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($delivery_methods as $delivery_method)                        
                            <tr>
                                <td>{{ $delivery_method->name }}</td>
                                <td>{{ $delivery_method->amount }} تومان</td>
                                <td>{{ $delivery_method->delivery_time }} - {{ $delivery_method->delivery_time_unit }}</td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" id="{{ $delivery_method->id }}"
                                            onchange="changeStatus({{ $delivery_method->id }})"
                                            data-url="{{ route('market.delivery.status', $delivery_method->id) }}"
                                             @if ($delivery_method->status === 1) checked @endif>
                                    </label>
                                </td>
                                <td class="width-16 text-left">
                                    <a href="{{ route('market.delivery.edit', $delivery_method->id) }}" class="btn btn-primary btn-sm fw-bold">
                                        <i class="fa fa-edit p-1"></i>
                                        ویرایش
                                    </a>
                                    <form class="d-inline" action="{{ route('market.delivery.destroy', $delivery_method->id) }}" method="POST">
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
<script type="text/javascript">
    function changeStatus(id) {
        var element = $("#" + id);
        var url = element.attr("data-url");
        var element_value = !element.prop('checked');

        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                if (response.status == true) {
                    if (response.checked) {
                        element.prop('checked', true);
                        toastSuccess(' روش ارسال با موفقیت فعال شد');
                    }
                    else {
                        element.prop('checked', false);
                        toastSuccess(' روش ارسال با موفقیت غیرفعال شد');
                    }
                }
                else {
                    element.prop('checked', element_value);
                    toastError('ارتباط برقرار نشد');
                }
            },
            error: function () {
                element.prop('checked', element_value);
                toastError('ارتباط برقرار نشد');
            }
        });

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
    }
</script>

@include('admin.alerts.sweetalert.confirm-delete', ['class_name' => 'delete'])

@endsection