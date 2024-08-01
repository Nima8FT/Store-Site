@extends('admin.layouts.master')

@section('head-tag')
<title>ادمین تیکت</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش تیکت ها</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ادمین تیکت</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ادمین تیکت</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="#" class="btn btn-primary btn-sm text-white p-2 fw-bold disabled">ایجاد ادمین تیکت
                    جدید</a>
                <div class="width-16">
                    <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">نام ادمین</th>
                            <th scope="col">موبایل ادمین</th>
                            <th scope="col">ایمیل ادمین</th>
                            <th scope="col">تصویر ادمین</th>
                            <th scope="col" class="width-16 text-right">
                                <i class="fa fa-cogs mx-2"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->fullName }}</td>
                                <td>{{ $admin->mobile }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <img src="{{ asset($admin->profile_photo_path) }}" alt="" class="max-height-2"
                                        width="50" height="50">
                                </td>
                                <td class="width-16 text-left">
                                    <a href="{{ route('ticket.admin.set', $admin->id) }}"
                                        class="btn  {{ $admin->ticketAdmin ? 'btn-danger' : 'btn-success' }} btn-sm fw-bold">
                                        <i class="fa {{ $admin->ticketAdmin ? 'fa-trash-alt' : 'fa-check' }} p-1"></i>
                                        {{$admin->ticketAdmin ? 'حذف' : 'اضافه'}}
                                    </a>
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