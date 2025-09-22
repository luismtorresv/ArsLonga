@extends('layouts.admin.admin')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg bg-dark text-white rounded-4 border-warning border-2">
                    <div class="card-header bg-dark text-center rounded-top-4">
                        <h3 class="mb-0 fw-bold text-warning">{{ __('admin.create') }}</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.artwork.save') }}" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="title" class="form-label fw-bold">{{ __('admin.title') }}</label>
                                <input type="text" class="form-control bg-dark text-white border-warning" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="author" class="form-label fw-bold">{{ __('admin.author') }}</label>
                                <input type="text" class="form-control bg-dark text-white border-warning" id="author" name="author" value="{{ old('author') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="keyword" class="form-label fw-bold">{{ __('admin.keyword') }}</label>
                                <input type="text" class="form-control bg-dark text-white border-warning" id="keyword" name="keyword" value="{{ old('keyword') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label fw-bold">{{ __('admin.category') }}</label>
                                <input type="text" class="form-control bg-dark text-white border-warning" id="category" name="category" value="{{ old('category') }}">
                            </div>
                            <div class="col-12">
                                <label for="details" class="form-label fw-bold">{{ __('admin.details') }}</label>
                                <textarea class="form-control bg-dark text-white border-warning" id="details" name="details" rows="3">{{ old('details') }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="image" class="form-label fw-bold">{{ __('admin.image') }}</label>
                                <input class="form-control bg-dark text-white border-warning" type="file" id="image" name="image">
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-warning fw-bold px-4">{{ __('admin.createA') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection