@extends('admin.layouts.master')

@section('head-tag')
<title>جزییات سفارش</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">جزییات سفارش</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">جزییات سفارش</h4>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover" style="height: 150px;">
                    <thead>
                        <tr>
                            <th scope="col">نام محصول</th>
                            <th scope="col">درصد فروش فوق العاده</th>
                            <th scope="col">مبلغ فروش فوق العاده</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">جمع قیمت محصول</th>
                            <th scope="col">مبلغ نهایی</th>
                            <th scope="col">رنگ</th>
                            <th scope="col">گارانتی</th>
                            <th scope="col">ویژگی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)                        
                            <tr>
                                <td>{{$item->singleProduct->name ?? '-'}}</td>
                                <td>{{$item->amazingSale->percentage ?? '-'}}</td>
                                <td>{{$item->amazing_sale_discount_amount ?? '-'}}</td>
                                <td>{{$item->number ?? '-'}}</td>
                                <td>{{$item->final_product_price ?? '-'}} تومان</td>
                                <td>{{$item->final_total_price ?? '-'}} تومان</td>
                                <td>{{$item->color->name ?? '-'}}</td>
                                <td>{{$item->guarantee->name ?? '-'}}</td>
                                <td>
                                    @forelse($item->orderItemAttributes as $attribute)
                                        {{$attribute->categoryAttribute->name ?? '-'}} :
                                        {{json_decode($attribute->categoryAttributeValue->value)->value ?? '-'}}
                                    @empty
                                    @endforelse
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