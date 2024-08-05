@extends('admin.layouts.master')

@section('head-tag')
<title>کپن تخفیف</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">کپن تخفیف</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ویرایش کپن تخفیف</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ویرایش کپن تخفیف</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.copan.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('market.copan.update', $copan->id) }}" method="POST">
                    @csrf
                    {{method_field('put')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">کد کپن</label>
                            <input type="text" name="code" value="{{ old('code', $copan->code) }}" class="form-control">
                            @error('code')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">میزان تخفیف</label>
                            <input type="text" name="amount" value="{{ old('amount', $copan->amount) }}"
                                class="form-control">
                            @error('amount')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="amount_type">نوع کپن</label>
                            <select id="amount_type" name="amount_type" class="form-control">
                                <option value="0" @if (old('amount_type', $copan->amount_type) == 0) selected @endif>درصد
                                </option>
                                <option value="1" @if (old('amount_type', $copan->amount_type) == 1) selected @endif>قیمت
                                </option>
                            </select>
                            @error('amount_type')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">حداکثر تخفیف</label>
                            <input type="text" name="discount_ceiling"
                                value="{{ old('discount_ceiling', $copan->discount_ceiling) }}" class="form-control">
                            @error('discount_ceiling')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status', $copan->status) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if (old('status', $copan->status) == 1) selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ شروع</label>
                            <input type="text" name="start_date" id="start_date" class="form-control d-none"
                                value="{{ $copan->start_date }}">
                            <input type="text" class="form-control" id="start_date_view"
                                value="{{ $copan->start_date }}">
                            @error('start_date')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ پایان</label>
                            <input type="text" name="end_date" id="end_date" class="form-control d-none"
                                value="{{ $copan->end_date }}">
                            <input type="text" class="form-control" id="end_date_view" value="{{ $copan->end_date }}">
                            @error('end_date')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="type">وضعیت</label>
                            <select id="type" name="type" class="form-control">
                                <option value="0" @if (old('type', $copan->type) == 0) selected @endif>عمومی</option>
                                <option value="1" @if (old('type', $copan->type) == 1) selected @endif>شخصی</option>
                            </select>
                            @error('type')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2 user-id-select d-none">
                            <label for="inputState">انتخاب کاربر</label>
                            <select name="user_id" id="inputState" class="form-control">
                                <option value="">کاربر را انتخاب کنید</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if (old('user_id', $copan->user_id) == $user->id)
                                    selected @endif>
                                        {{ $user->fullName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection

@section('script')
<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

<script>
    $('#start_date_view').persianDatepicker({
        observe: true,
        format: 'YYYY/MM/DD H:m:s',
        altField: '#start_date',
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: true,
            }
        }
    });

    $('#end_date_view').persianDatepicker({
        observe: true,
        format: 'YYYY/MM/DD H:m:s',
        altField: '#end_date',
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: true,
            }
        }
    });
</script>

<script>
    $(document).ready(function () {
        var element = $('#type option:selected').val();
        if (element == 1) {
            $('.user-id-select').removeClass('d-none');
        }
        else {
            $('.user-id-select').addClass('d-none');
        }
        console.log(element);
        $('#type').click(function (e) {
            var element = $(this).val();
            if (element == 1) {
                $('.user-id-select').removeClass('d-none');
            }
            else {
                $('.user-id-select').addClass('d-none');
            }
        });
    });
</script>
@endsection