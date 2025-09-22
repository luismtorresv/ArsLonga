@extends('layouts.admin.admin')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg bg-dark text-white rounded-4 border-warning border-2">
                    <div class="row g-0">
                        <div class="col-md-6 d-flex align-items-center justify-content-center p-4">
                            <img src="{{ asset('/storage/' . $viewData['artwork']->getImage()) }}" class="img-fluid rounded-3 border border-2 border-warning shadow" alt="{{ $viewData['artwork']->getTitle() }}" style="max-height: 400px;">
                        </div>
                        <div class="col-md-6 p-4">
                            <h2 class="fw-bold text-warning mb-3">{{ $viewData['artwork']->getTitle() }}</h2>
                            <h5 class="text-info mb-3">{{ __('admin.author') }}: <span class="fw-normal text-white">{{ $viewData['artwork']->getAuthor() }}</span></h5>
                            <div class="mb-3">
                                <span class="badge bg-secondary me-2">{{ $viewData['artwork']->getCategory() }}</span>
                                <span class="badge bg-info">{{ $viewData['artwork']->getKeyword() }}</span>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-primary mb-1">{{ __('admin.details') }}</h6>
                                <p class="lead mb-0">{{ $viewData['artwork']->getDetails() }}</p>
                            </div>
                            <div class="mt-4">
                                <span class="text-muted">ID: {{ $viewData['artwork']->getId() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection