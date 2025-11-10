@extends('layouts.admin.admin')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card bg-dark rounded-4 border-warning border-2 text-white shadow-lg">
                    <div class="card-header bg-dark rounded-top-4 text-center">
                        <h3 class="fw-bold text-warning mb-0">{{ __('admin.createAuction') }}</h3>
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
                            <div class="row">
                                <legend>Start and end times</legend>
                                <div class="col">
                                    <label for="start_date"
                                        class="form-label fw-bold">{{ __('admin.form.start_date') }}</label>
                                    <input type="datetime-local" step="1"
                                        class="form-control bg-dark border-warning text-white" id="start_date"
                                        name="start_date" value="{{ old('start_date') }}" required>
                                </div>
                                <div class="col">
                                    <label for="final_date"
                                        class="form-label fw-bold">{{ __('admin.form.final_date') }}</label>
                                    <input type="datetime-local" step="1"
                                        class="form-control bg-dark border-warning text-white" id="final_date"
                                        name="final_date" value="{{ old('final_date') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="artwork_id" class="form-label fw-bold">{{ __('admin.artwork') }}</label>
                                <select class="form-select bg-dark border-warning text-white" id="artwork_id"
                                    name="artwork_id" required>
                                    <option value="">{{ __('admin.selectArtwork') }}</option>
                                    @foreach ($artworks as $artwork)
                                        <option value="{{ $artwork->id }}"
                                            {{ old('artwork_id') == $artwork->id ? 'selected' : '' }}>
                                            {{ $artwork->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit"
                                    class="btn btn-warning fw-bold px-4">{{ __('admin.createAuction') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
