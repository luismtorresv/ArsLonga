@extends('layouts.app')
@section('content')
    {{-- Generated with Claude Sonnet 3.5. --}}
    <div class="container mt-5">
        <div class="row">
            <!-- Left side - Artwork Image -->
            <div class="col-md-6">
                <div class="artwork-image-container">
                    <img src="{{ asset('/storage/' . $viewData['auction']->getArtwork()->getImage()) }}"
                        class="img-fluid rounded shadow" alt="{{ $viewData['auction']->getArtwork()->getTitle() }}">
                </div>
            </div>

            <!-- Right side - Auction Details -->
            <div class="col-md-6">
                <h1 class="display-4 mb-3">{{ __('auction.show.auction_title', ['id' => $viewData['auction']->getId()]) }}
                </h1>
                <h4 class="text-muted mb-4">{{ $viewData['auction']->getArtwork()->getTitle() }}</h4>

                <div class="auction-details">
                    <div class="category-badge mb-4">
                        <span
                            class="badge bg-secondary">{{ __('auction.show.original_price', ['amount' => number_format($viewData['original_price'])]) }}</span>
                        @if ($viewData['auction']->getWinningBidderId())
                            <span class="badge bg-success">{{ __('auction.show.status.won') }}</span>
                        @else
                            <span class="badge bg-warning">{{ __('auction.show.status.active') }}</span>
                        @endif
                    </div>

                    <div class="description mb-4">
                        <h5 class="text-primary">{{ __('auction.show.artwork_details') }}</h5>
                        <p>{{ __('auction.show.title', ['title' => $viewData['auction']->getArtwork()->getTitle()]) }}</p>
                        <p>{{ __('auction.show.author', ['author' => $viewData['auction']->getArtwork()->getAuthor()]) }}
                        </p>
                        <p>{{ __('auction.show.category', ['category' => $viewData['auction']->getArtwork()->getCategory()]) }}
                        </p>
                        <p class="lead">{{ $viewData['auction']->getArtwork()->getDetails() }}</p>
                    </div>

                    @if ($viewData['auction']->getWinningBidderId())
                        <div class="winning-bidder mb-4">
                            <h5 class="text-success">{{ __('auction.show.winning_bidder') }}</h5>
                            <p>{{ __('auction.show.user_id', ['id' => $viewData['auction']->getWinningBidderId()]) }}</p>
                        </div>
                    @endif

                    <!-- Bids Section -->
                    <div class="bids-section mb-4">
                        <h5 class="text-primary">{{__('auction.show.bids.title')}}</h5>
                        @if ($viewData['auction']->getBids()->isEmpty())
                            <div class="alert alert-info" role="alert">
                                <p class="mb-0">{{__('auction.show.bids.no_bids')}}</p>
                            </div>
                        @else
                            <div class="bids-list">
                                @foreach ($viewData['auction']->getBids()->sortByDesc('price_offering') as $bid)
                                    <div class="bid-item p-3 mb-3 border rounded shadow-sm bg-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1 text-success fw-bold">${{ number_format($bid->getPriceOffering()) }}</h6>
                                                <small class="text-muted">{{__('auction.show.bids.bid_by', ['name' => $bid->getWinningBidder()->getName()])}}</small>
                                            </div>
                                            <div class="text-end">
                                                <small class="text-muted">{{ $bid->getCreatedAt() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Bid Creation Button (for logged-in users only) -->

                    @guest
                        <div class="bid-action mb-4">
                            <p class="text-muted">
                                <a href="{{ route('login') }}" class="text-decoration-none">{{__('auction.show.bid_action.login_link')}}</a> {{__('auction.show.bid_action.login_to_bid')}}
                            </p>
                        </div>
                    @else
                        @if (!$viewData['auction']->getWinningBidderId())
                            <div class="bid-action mb-4">
                                <a href="{{ route('bid.create', ['auction_id' => $viewData['auction']->getId()]) }}"
                                    class="btn btn-success btn-lg">
                                    <i class="fas fa-gavel"></i> {{__('auction.show.bid_action.place_bid')}}
                                </a>
                            </div>
                        @endif
                    @endguest

                    <div class="auction-meta text-muted">
                        <small>{{ __('auction.show.auction_id', ['id' => $viewData['auction']->getId()]) }}</small><br>
                        <small>{{ __('auction.show.created', ['date' => $viewData['auction']->getCreatedAt()]) }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
