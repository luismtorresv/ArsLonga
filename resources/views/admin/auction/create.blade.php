@extends('layouts.admin.admin')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg bg-dark text-white rounded-4 border-warning border-2">
                    <div class="card-header bg-dark text-center rounded-top-4">
                        <h3 class="mb-0 fw-bold text-warning">{{ __('admin.createAuction') }}</h3>
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
                        <form method="POST" action="{{ route('admin.auction.save') }}" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="price_limit" class="form-label fw-bold">{{ __('admin.priceLimit') }}</label>
                                <input type="number" class="form-control bg-dark text-white border-warning" 
                                       id="price_limit" name="price_limit" 
                                       value="{{ old('price_limit') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="artwork_id" class="form-label fw-bold">{{ __('admin.artwork') }}</label>
                                <select class="form-select bg-dark text-white border-warning" id="artwork_id" name="artwork_id" required>
                                    <option value="">{{ __('admin.selectArtwork') }}</option>
                                    @foreach($artworks as $artwork)
                                        <option value="{{ $artwork->id }}" {{ old('artwork_id') == $artwork->id ? 'selected' : '' }}>
                                            {{ $artwork->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-warning fw-bold px-4">{{ __('admin.createAuction') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
