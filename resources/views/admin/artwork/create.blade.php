@extends('layouts.admin.admin')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card bg-dark rounded-4 border-warning border-2 text-white shadow-lg">
                    <div class="card-header bg-dark rounded-top-4 text-center">
                        <h3 class="fw-bold text-warning mb-0">{{ __('admin.create') }}</h3>
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
                        <form method="POST" action="{{ route('admin.artwork.save') }}" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="title" class="form-label fw-bold">{{ __('admin.title') }}</label>
                                <input type="text" class="form-control bg-dark border-warning text-white" id="title"
                                    name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="author" class="form-label fw-bold">{{ __('admin.author') }}</label>
                                <input type="text" class="form-control bg-dark border-warning text-white" id="author"
                                    name="author" value="{{ old('author') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="keyword" class="form-label fw-bold">{{ __('admin.keyword') }}</label>
                                <input type="text" class="form-control bg-dark border-warning text-white" id="keyword"
                                    name="keyword" value="{{ old('keyword') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label fw-bold">{{ __('admin.category') }}</label>
                                <input type="text" class="form-control bg-dark border-warning text-white" id="category"
                                    name="category" value="{{ old('category') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label fw-bold">{{ __('admin.price') }}</label>
                                <input type="text" class="form-control bg-dark border-warning text-white" id="price"
                                    name="price" value="{{ old('price') }}">
                            </div>
                            <div class="col-12">
                                <label for="details" class="form-label fw-bold">{{ __('admin.details') }}</label>
                                <textarea class="form-control bg-dark border-warning text-white" id="details" name="details" rows="3">{{ old('details') }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="image" class="form-label fw-bold">{{ __('admin.image') }}</label>
                                <input class="form-control bg-dark border-warning text-white" type="file" id="image"
                                    name="image">
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit"
                                    class="btn btn-warning fw-bold px-4">{{ __('admin.createA') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
