@extends('layouts.app')
@section('content')
    {{-- Generated with Claude Sonnet 3.5. --}}
    <div class="container mt-5">
        <div class="row">
            <!-- Left side - Artwork Image -->
            <div class="col-md-6">
                <div class="artwork-image-container">
                    <img src="{{ asset('/storage/' . $viewData['auction']->getArtwork()->getImage()) }}" 
                         class="img-fluid rounded shadow"
                         alt="{{ $viewData['auction']->getArtwork()->getTitle() }}">
                </div>
            </div>

            <!-- Right side - Auction Details -->
            <div class="col-md-6">
                <h1 class="display-4 mb-3">Auction #{{ $viewData['auction']->getId() }}</h1>
                <h4 class="text-muted mb-4">{{ $viewData['auction']->getArtwork()->getTitle() }}</h4>

                <div class="auction-details">
                    <div class="category-badge mb-4">
                        <span class="badge bg-secondary">Original Price: ${{ number_format($viewData['original_price']) }}</span>
                    </div>

                    <div class="description mb-4">
                        <h5 class="text-primary">Artwork Details</h5>
                        <p><strong>Title:</strong> {{ $viewData['auction']->getArtwork()->getTitle() }}</p>
                        <p><strong>Author:</strong> {{ $viewData['auction']->getArtwork()->getAuthor() }}</p>
                        <p><strong>Category:</strong> {{ $viewData['auction']->getArtwork()->getCategory() }}</p>
                        <p class="lead">{{ $viewData['auction']->getArtwork()->getDetails() }}</p>
                    </div>

                    @if($viewData['auction']->getWinningBidderId())
                        <div class="winning-bidder mb-4">
                            <h5 class="text-success">Winning Bidder</h5>
                            <p>User ID: {{ $viewData['auction']->getWinningBidderId() }}</p>
                        </div>
                    @endif

                    <div class="auction-meta text-muted">
                        <small>Auction ID: {{ $viewData['auction']->getId() }}</small><br>
                        <small>Created: {{ $viewData['auction']->getCreatedAt() }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
