@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد کالا</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">کالا ها</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد کالای جدید</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">ایجاد کالا</h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('market.product.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('market.product.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data" id="form">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام کالا</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                class="form-control">
                            @error('name')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">انتخاب دسته بندی</label>
                            <select name="category_id" id="inputState" class="form-control">
                                <option value="">دسته را انتخاب کنید</option>
                                @foreach ($productCategories as $productCategory)
                                    <option value="{{ $productCategory->id }}" @if (old('category_id', $productCategory->id) == $product->category_id) selected @endif>
                                        {{ $productCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">انتخاب برند</label>
                            <select name="brand_id" id="inputState" class="form-control">
                                <option value="">برند را انتخاب کنید</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @if (old('brand_id', $brand->id) == $product->brand_id) selected
                                    @endif>
                                        {{ $brand->original_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">تصویر</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                                                        <div class="row mt-3">
                                @php
$number = 1;
                                @endphp
                                @foreach ($product->image['indexArray'] as $key => $value)
                                                                <div class="col-md-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check" name="currentImage" id="{{$number}}"
                                                                            value="{{ $key }}" @if ($product->image['currentImage'] == $key) checked @endif>
                                                                        <label for="{{$number}}" class="form-check-label mx-2">
                                                                            <img src="{{ asset($value) }}" alt="" style="max-width:120px">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                @php
    $number++;
                                                                @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">وزن</label>
                            <input type="text" name="weight" value="{{ old('weight',(int)$product->weight) }}" class="form-control">
                            @error('weight')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">طول</label>
                            <input type="text" name="length" value="{{ old('length', (int)$product->length) }}" class="form-control">
                            @error('length')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">عرض</label>
                            <input type="text" name="width" value="{{ old('width', (int)$product->width) }}" class="form-control">
                            @error('width')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">ارتفاع</label>
                            <input type="text" name="height" value="{{ old('height', (int)$product->height) }}" class="form-control">
                            @error('height')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">قیمت کالا</label>
                            <input type="text" name="price" value="{{ old('price', (int)$product->price) }}" class="form-control">
                            @error('price')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status',$product->status) == 0) selected @endif>غیر فعال</option>
                                <option value="1" @if (old('status',$product->status) == 1) selected @endif>فعال</option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="marketable">قابل فروش بودن</label>
                            <select id="marketable" name="marketable" class="form-control">
                                <option value="0" @if (old('marketable',$product->marketable) == 0) selected @endif>غیر فعال</option>
                                <option value="1" @if (old('marketable',$product->marketable) == 1) selected @endif>فعال</option>
                            </select>
                            @error('marketable')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">تاریخ انتشار</label>
                            <input type="text" name="published_at" id="published_at" class="form-control d-none">
                            <input type="text" class="form-control" id="published_at_view">
                            @error('published_at')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 py-2">
                            <label for="tags">تگ ها</label>
                            <input type="hidden" class="form-control" name="tags" id="tags" value="{{ old('tags',$product->tags) }}">
                            <select id="select_tags" class="select2 form-control" multiple>
                            </select>
                            @error('tags')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group py-2 mb-2">
                            <label for="">توضیحات</label>
                            <textarea name="introduction" id="introduction" class="form-control form-control-sm"
                                rows="6">{{ old('introduction',$product->introduction) }}</textarea>
                            @error('introduction')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="border-top border-bottom py-3">
                            @foreach ($product->metas as $meta)                            
                            <div class="product-property row">
                                <div class="form-group col-md-3 py-2 col-6">
                                    <input type="text" name="meta_key[{{$meta->id}}]" class="form-control" placeholder="ویژگی" value="{{ $meta->meta_key }}">
                                </div>
                                <div class="form-group col-md-3 py-2 col-6">
                                    <input type="text" name="meta_value[]" class="form-control" placeholder="مقدار" value="{{ $meta->meta_value }}">
                                </div>
                            </div>
                            @endforeach
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
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
    CKEDITOR.replace('introduction');
</script>

<script>
    $('#published_at_view').persianDatepicker({
        observe: true,
        format: 'YYYY/MM/DD H:m:s',
        altField: '#published_at',
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
        var input_tags = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = input_tags.val();
        var default_data = null;
        if (input_tags.val() !== null && input_tags.val().length > 0) {
            default_data = default_tags.split(',');
        }
        select_tags.select2({
            placeholder: 'لطفا تگ های خود را وارد نمایید',
            tags: true,
            data: default_data,
        })
        select_tags.children('option').attr('selected', true).trigger('change');
        $('#form').submit(function (e) {
            if (select_tags.val() !== null && select_tags.length > 0) {
                var selected_source = select_tags.val().join(',');
                input_tags.val(selected_source);
            }
        });
    });
</script>
@endsection