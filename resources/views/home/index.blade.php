@extends('layouts.app')
@section('content')
    <div class="fs-4 text-center">
        {{ __('Welcome!') }}
    </div>

    <div class="container my-5">
        <div class="card bg-light border-0 shadow-sm">
            <div class="card-body p-5">
                <p class="card-text text-muted mb-0">
                    Curious on what you need to commit the perfect crime? See the products below... Or just go buy an
                    artwork or bid on an auction.
                </p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="mb-4">Featured Products</h2>

        @if (!empty($viewData['products']))
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($viewData['products'] as $product)
                    <div class="col">
                        <div class="card">
                            @if (isset($product['image']))
                                <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <p class="card-text">${{ $product['price'] ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
