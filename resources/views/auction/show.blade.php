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
                <h1 class="display-4 mb-3">{{__('auction.show.auction_title', ['id' => $viewData['auction']->getId()])}}</h1>
                <h4 class="text-muted mb-4">{{ $viewData['auction']->getArtwork()->getTitle() }}</h4>

                <div class="auction-details">
                    <div class="category-badge mb-4">
                        <span class="badge bg-secondary">{{__('auction.show.original_price', ['amount' => number_format($viewData['original_price'])])}}</span>
                        <span class="badge bg-primary">{{__('auction.show.price_limit', ['amount' => number_format($viewData['auction']->getPriceLimit())])}}</span>
                        @if($viewData['auction']->getWinningBidderId())
                            <span class="badge bg-success">{{__('auction.show.status.won')}}</span>
                        @else
                            <span class="badge bg-warning">{{__('auction.show.status.active')}}</span>
                        @endif
                    </div>

                    <div class="description mb-4">
                        <h5 class="text-primary">{{__('auction.show.artwork_details')}}</h5>
                        <p>{{__('auction.show.title', ['title' => $viewData['auction']->getArtwork()->getTitle()])}}</p>
                        <p>{{__('auction.show.author', ['author' => $viewData['auction']->getArtwork()->getAuthor()])}}</p>
                        <p>{{__('auction.show.category', ['category' => $viewData['auction']->getArtwork()->getCategory()])}}</p>
                        <p class="lead">{{ $viewData['auction']->getArtwork()->getDetails() }}</p>
                    </div>

                    @if($viewData['auction']->getWinningBidderId())
                        <div class="winning-bidder mb-4">
                            <h5 class="text-success">{{__('auction.show.winning_bidder')}}</h5>
                            <p>{{__('auction.show.user_id', ['id' => $viewData['auction']->getWinningBidderId()])}}</p>
                        </div>
                    @endif

                    <div class="auction-meta text-muted">
                        <small>{{__('auction.show.auction_id', ['id' => $viewData['auction']->getId()])}}</small><br>
                        <small>{{__('auction.show.created', ['date' => $viewData['auction']->getCreatedAt()])}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
