@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد منو</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">منو</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">ایجاد منو</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    ایجاد منو
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('content.menu.index') }}"
                    class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">
                <form action="{{ route('content.menu.update', $currentMenu->id) }}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row mb-4">
                        <div class="form-group col-md-6 py-2">
                            <label for="">نام منو</label>
                            <input type="text" name="name" class="form-control"
                                value="{{old('name', $currentMenu->name)}}">
                            @error('name')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="inputState">منو والد</label>
                            <select name="parent_id" id="inputState" class="form-control">
                                <option value="" selected>منوی اصلی</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}" @if ($menu->id == old('parent_id', $currentMenu->parent_id)) selected @endif>
                                        {{$menu->name  }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="">ادرس url</label>
                            <input type="text" name="url" class="form-control"
                                value="{{old('url', $currentMenu->url)}}">
                            @error('url')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <label for="status">وضعیت</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0" @if (old('status', $currentMenu->status) == 0) selected @endif>غیر فعال
                                </option>
                                <option value="1" @if (old('status', $currentMenu->status) == 1) selected @endif>فعال
                                </option>
                            </select>
                            @error('status')
                                <small class="text-danger" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold">ثبت</button>
                </form>
            </section>
        </section>
    </section>
</section>

@endsection