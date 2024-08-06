@extends('admin.layouts.master')

@section('head-tag')
<title>فاکتور سفارش</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">فاکتور سفارش</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">فاکتور سفارش</h4>
            </section>


            <section class="table-responsive">
                <table class="table table-striped table-hover" style="height: 150px;" id="printable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-primary">
                            <td>{{ $order->id }}</td>
                            <td class="text-left">
                                <a href="#" class="btn btn-dark btn-sm text-white" id="print">
                                    <i class="fa fa-print"></i>
                                    چاپ
                                </a>
                                <a href="{{ route('market.admin.market.order.detail', $order->id) }}"
                                    class="btn btn-warning btn-sm text-dark">
                                    <i class="fa fa-book"></i>
                                    جزییات
                                </a>
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>نام مشتری</th>
                            <td class="text-left font-weight-bold">
                                {{$order->user->fullName ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>ادرس</th>
                            <td class="text-left font-weight-bold">
                                {{$order->address->address ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>کد پستی</th>
                            <td class="text-left font-weight-bold">
                                {{$order->address->postal_code ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>پلاک</th>
                            <td class="text-left font-weight-bold">
                                {{$order->address->no ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>واحد</th>
                            <td class="text-left font-weight-bold">
                                {{$order->address->unit ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>نام گیرنده</th>
                            <td class="text-left font-weight-bold">
                                {{$order->address->recipnient_first_name ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>فامیلی گیرنده</th>
                            <td class="text-left font-weight-bold">
                                {{$order->address->recipnient_last_name ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>موبایل</th>
                            <td class="text-left font-weight-bold">
                                {{$order->address->mobile ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>نوع پرداخت</th>
                            <td class="text-left font-weight-bold">
                                {{ $order->payment_type_value ?? '-' }}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>وضعیت پرداخت</th>
                            <td class="text-left font-weight-bold">
                                {{ $order->payment_status_value ?? '-' }}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>مبلغ ارسال</th>
                            <td class="text-left font-weight-bold">
                                {{$order->delivery_amount ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>وضعیت ارسال</th>
                            <td class="text-left font-weight-bold">
                                {{$order->delivery_status_value ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>تاریخ ارسال</th>
                            <td class="text-left font-weight-bold">
                                {{jalaliDate($order->delivery_time, 'H:i:s | Y/m/d') ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">مجموع مبلغ سفارش بدون تخفیف</th>
                            <td class="text-left font-weight-bold">
                                {{$order->order_final_amount ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">مجموع مبلغ تمامی تخفیفات</th>
                            <td class="text-left font-weight-bold">
                                {{$order->order_discount_amount ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">مبلغ تخفیف همه محصولات</th>
                            <td class="text-left font-weight-bold">
                                {{$order->order_total_products_discount_amount ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">مبلغ نهایی</th>
                            <td class="text-left font-weight-bold">
                                {{$order->order_final_amount - $order->order_discount_amount ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">کوپن استفاده شده</th>
                            <td class="text-left font-weight-bold">
                                {{$order->copan->code ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">تخفیف کد تخفیف</th>
                            <td class="text-left font-weight-bold">
                                {{$order->order_copan_discount_amount ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">تخفیف عمومی استفاده شده</th>
                            <td class="text-left font-weight-bold">
                                {{$order->commonDiscount->title ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">مبلغ تخفیف عمومی</th>
                            <td class="text-left font-weight-bold">
                                {{$order->order_common_discount_amount ?? '-'}}
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th scope="col">وضعیت سفارش</th>
                            <td class="text-left font-weight-bold">
                                {{$order->order_status_value ?? '-'}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>

@endsection


@section('script')

<script>
    $(document).ready(function () {
        $('#print').click(function (e) {
            printContent('printable');
        });
    });

    function printContent(el) {
        var restorePage = $('body').html();
        var printContent = $('#' + el).clone();
        $('body').empty().html(printContent);
        window.print();
        $('body').html(restorePage);
    }
</script>

@endsection