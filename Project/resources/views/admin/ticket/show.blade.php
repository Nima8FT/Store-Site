@extends('admin.layouts.master')

@section('head-tag')
<title>تیکت</title>
@endsection

@section('content')

<nav aria-label="breadcrumb" class="navbar-breadcrump bg-light rounded">
    <ol class="breadcrumb p-3">
        <li class="breadcrumb-item d-none"><a href="#">Home</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">بخش تیکت ها</a></li>
        <li class="breadcrumb-item font-size-12"><a href="#">تیکت ها</a></li>
        <li class="breadcrumb-item  font-size-12 active" aria-current="page">نمایش تیکت ها</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4 class="fw-bold">
                    نمایش تیکت ها
                </h4>
            </section>

            <section
                class="main-body-container-buttons d-flex justify-content-between align-items-center mb-3 border-bottom py-4">
                <a href="{{ route('ticket.index') }}" class="btn btn-primary btn-sm text-white p-2 fw-bold">بازگشت</a>
            </section>

            <section class="main-body-container-bottom">

                <div class="card mb-3">
                    <div class="card-header bg-warning h5">{{ $ticket->user->fullName }} - {{ $ticket->id }}</div>
                    <div class="card-body">
                        <h5>{{ $ticket->subject }}</h5>
                        <p>{{ $ticket->description }}</p>
                    </div>
                </div>

                @if (!$ticket->ticket_id)
                    <form action="{{ route('ticket.answer', $ticket->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" class="mb-2">پاسخ تیکت</label>
                                    <textarea name="description" id="" class="form-control form-control-sm"
                                        rows="4">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        @error('description')
                            <small class="text-danger" role="alert">{{$message}}</small>
                        @enderror
                        <button type="submit" class="btn btn-primary fw-bold mt-3">ثبت</button>
                    </form>
                @endif

            </section>
        </section>
    </section>
</section>

@endsection