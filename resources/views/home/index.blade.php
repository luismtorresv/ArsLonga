@extends('layouts.app')
@section('content')
  <div class="fs-4 text-center">
    {{ __('home.welcome') }}
  </div>

  <div class="container my-5">
    <div class="card bg-light border-0 shadow-sm">
      <div class="card-body p-5">
        <p class="card-text text-muted mb-0">
          {{ __('home.curious_message') }}
        </p>
      </div>
    </div>
  </div>

  <div class="container my-4">
    <h2 class="mb-4">{{ __('home.featured_products') }}</h2>

    @if (!empty($viewData['products']))
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($viewData['products'] as $product)
          <div class="col">
            <a href="#" class="text-decoration-none text-dark">
              <div class="card h-100 shadow-sm">
                @if (isset($product['image']))
                  <img src="{{ $product['image'] }}" class="card-img-top card-img-products" alt="{{ $product['name'] }}">
                @endif
                <div class="card-body">
                  <h5 class="card-title text-dark fw-semibold">
                    {{ $product['name'] }}
                  </h5>
                  <p class="card-text">
                    <span class="fw-bold text-primary">${{ number_format($product['price'] ?? 0, 2) }}</span>
                  </p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    @endif
  </div>
@endsection
