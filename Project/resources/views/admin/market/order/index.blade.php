@extends('admin.layouts.master')

@section('head-tag')
<title>سفارشات</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">سفارشات</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">سفارشات</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="#"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold disabled" disabled>ایجاد سفارش جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" style="height: 150px;">
                    <thead>
                        <tr>
                            <th scope="col">کد سفارش</th>
                            <th scope="col">مجموع مبلغ سفارش بدون تخفیف</th>
                            <th scope="col">مجموع مبلغ تمامی تخفیفات</th>
                            <th scope="col">مبلغ تخفیف همه محصولات</th>
                            <th scope="col">مبلغ نهایی</th>
                            <th scope="col">وضعیت پرداخت</th>
                            <th scope="col">شیوه پرداخت</th>
                            <th scope="col">بانک</th>
                            <th scope="col">وضعیت ارسال</th>
                            <th scope="col">شیوه ارسال</th>
                            <th scope="col">وضعیت سفارش</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)                        
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_final_amount }}</td>
                                <td>{{$order->order_discount_amount}}</td>
                                <td>{{$order->order_total_products_discount_amount}}</td>
                                <td>{{$order->order_final_amount - $order->order_discount_amount}}</td>
                                <td>@if($order->payment_status == 0) پرداخت نشده @elseif($order->payment_status == 1) پرداخت شده @elseif($order->payment_status == 2) باطل شده @elseif($order->payment_status == 3) برگشت داده شده @endif </td>
                                <td>@if($order->payment_type == 0) انلاین @elseif($order->payment_type == 1) افلاین @elseif($order->payment_type == 2) در محل @endif </td>
                                <td>{{ $order->payment->paymentable->gateway ?? '-' }}</td>
                                <td>@if ($order->delivery_status == 0) ارسال شده @elseif($order->delivery_status == 1) در حال ارسال @elseif($order->delivery_status == 2) ارسال شده @elseif($order->delivery_status == 3) تحویل شده @endif</td>
                                <td>{{ $order->delivery->name }}</td>
                                <td>@if ($order->order_status == 0)  در انتظار تایید @elseif($order->order_status == 1) تایید نشده @elseif($order->order_status == 2) تایید شده @elseif($order->order_status == 3) باطل شده @elseif($order->order_status == 4) مرجوع شده @elseif($order->order_status == 5) بررسی نشده @endif</td>
                                <td class="width-16 text-left">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                            id="dropdownmenulink" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-tools"></i>
                                            عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownmenulink">
                                            <a href="{{ route('market.admin.market.order.show', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده
                                                فاکتور</a>
                                            <a href="{{ route('market.admin.market.order.changeSendStatus', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغیر
                                                وضعیت ارسال</a>
                                            <a href="{{ route('market.admin.market.order.changeOrderStatus', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغیر
                                                وضعیت سفارش</a>
                                            <a href="{{ route('market.admin.market.order.cancelOrder', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-window-close"></i>
                                                باطل کردن سفارش</a>
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