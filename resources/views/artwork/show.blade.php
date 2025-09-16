@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    {{-- Generated with Claude Sonnet 3.5. --}}
    <div class="container mt-5">
        <div class="row">
            <!-- Left side - Image -->
            <div class="col-md-6">
                <div class="artwork-image-container">
                    <img src="{{ asset('/storage/' . $viewData['artwork']->getImage()) }}" class="img-fluid rounded shadow"
                        alt="{{ $viewData['artwork']->getTitle() }}">
                </div>
            </div>

            <!-- Right side - Details -->
            <div class="col-md-6">
                <h1 class="display-4 mb-3">{{ $viewData['artwork']->getTitle() }}</h1>
                <h4 class="text-muted mb-4">By {{ $viewData['artwork']->getAuthor() }}</h4>

                <div class="artwork-details">
                    <div class="category-badge mb-4">
                        <span class="badge bg-secondary">{{ $viewData['artwork']->getCategory() }}</span>
                        <span class="badge bg-info">{{ $viewData['artwork']->getKeyword() }}</span>
                    </div>

                    <div class="description mb-4">
                        <h5 class="text-primary">About this piece</h5>
                        <p class="lead">{{ $viewData['artwork']->getDetails() }}</p>
                    </div>

                    <div class="artwork-meta text-muted">
                        <small>Artwork ID: {{ $viewData['artwork']->getId() }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
