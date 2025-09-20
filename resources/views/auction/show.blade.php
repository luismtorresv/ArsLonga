@extends('layouts.app')
@section('content')
    {{-- Generated with Claude Sonnet 3.5. --}}
    <div class="container mt-5">
        <div class="row">
            <!-- Right side - Details -->
            <div class="col-md-6">
                <h1 class="display-4 mb-3">Winning Bidder{{ $viewData['auction']->getWinningBiddingUser() }}</h1>

                <div class="Auction-details">
                    <div class="category-badge mb-4">
                        <span class="badge bg-secondary">Original Price:
                            {{ $viewData['auction']->getOriginalPrice() }}</span>
                        <span class="badge bg-info">Final Price: {{ $viewData['auction']->getFinalPrice() }}</span>
                    </div>

                    <div class="description mb-4">
                        <p>Artwork: {{ $viewData['auction']->getArtwork() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
