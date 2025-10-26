@extends('layouts.admin.admin')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card bg-dark rounded-4 border-warning border-2 text-white shadow-lg">
                    <div class="card-header bg-dark rounded-top-4 text-center">
                        <h3 class="fw-bold text-warning mb-0">{{ __('admin.editAuction') }}</h3>
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
                        <form method="POST"
                            action="{{ route('admin.auction.save', ['id' => $viewData['auction']->getId()]) }}"
                            class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="artwork_id" class="form-label fw-bold">{{ __('admin.artwork') }}</label>
                                <select class="form-select bg-dark border-warning text-white" id="artwork_id"
                                    name="artwork_id" required>
                                    @foreach ($viewData['artworks'] as $artwork)
                                        <option value="{{ $artwork->getId() }}"
                                            {{ old('artwork_id', $viewData['auction']->getArtworkId()) == $artwork->getId() ? 'selected' : '' }}>
                                            {{ $artwork->getTitle() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-warning fw-bold px-4">{{ __('admin.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
