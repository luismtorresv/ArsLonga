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
        <h4 class="text-muted mb-4">{{ __('artwork.show.by', ['author' => $viewData['artwork']->getAuthor()]) }}</h4>

        <div class="artwork-details">
          <div class="category-badge mb-4">
            <span class="badge bg-secondary">{{ $viewData['artwork']->getCategory() }}</span>
            <span class="badge bg-info">{{ $viewData['artwork']->getKeyword() }}</span>
          </div>

          <div class="description mb-4">
            <h5 class="text-primary">{{ __('artwork.show.about') }}</h5>
            <p class="lead">{{ $viewData['artwork']->getDetails() }}</p>
          </div>

          <div class="artwork-meta text-muted mb-4">
            <small>{{ __('artwork.show.artworkID', ['artworkID' => $viewData['artwork']->getId()]) }}</small>
          </div>

          <!-- Price and Add to Cart Section -->
          <div class="purchase-section bg-light rounded p-4 shadow-sm">
            <div class="price-display mb-3 text-center">
              <h2 class="display-5 fw-bold text-success">
                ${{ number_format($viewData['artwork']->getPrice(), 2) }}</h2>
            </div>
            <form method="POST" action="{{ route('cart.add', ['id' => $viewData['artwork']->getId()]) }}">
              @csrf
              <input type="hidden" name="id" value="{{ $viewData['artwork']->getId() }}">
              <button type="submit" class="btn btn-success btn-lg w-100 fw-bold py-3">
                <i class="fas fa-shopping-cart me-2"></i>{{ __('cart.add') }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
