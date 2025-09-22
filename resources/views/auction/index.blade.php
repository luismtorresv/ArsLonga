@extends('layouts.app')
@section('content')
    {{-- Generated with Claude Sonnet 3.5. --}}
    <div class="container my-4">
        <header class="p-3 text-bg-dark mb-4 rounded">
            <div class="text-center fs-4">
                {{ __('Auctions!') }}
            </div>
        </header>

        @if ($viewData['Auctions']->isEmpty())
            <div class="alert alert-info" role="alert">
                <p class="mb-0">No auctions available at the moment.</p>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($viewData['Auctions'] as $auction)
                <div class="col">
                    <a href="{{ route('auction.show', ['id' => $auction->getId()]) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-semibold">
                                    Auction #{{ $auction->getId() }}
                                </h5>
                                <p class="card-text text-muted">
                                    <strong>Price Limit:</strong> ${{ number_format($auction->getPriceLimit()) }}
                                </p>
                                <p class="card-text">
                                    <strong>Artwork:</strong> {{ $auction->getArtwork()->getTitle() }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
