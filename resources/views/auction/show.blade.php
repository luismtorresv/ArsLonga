@php
  $auction = $viewData['auction'];
  $artwork = $auction->artwork;
  $winningBidder = $auction->winning_bidder;
@endphp

@extends('layouts.app')
@section('content')
  {{-- Generated with Claude Sonnet 3.5. --}}
  <div class="container mt-5">
    <div class="row">
      <!-- Left side - Artwork Image -->
      <div class="col-md-6">
        <div class="artwork-image-container">
          <img src="{{ asset('/storage/' . $artwork->getImage()) }}" class="img-fluid rounded shadow"
            alt="{{ $artwork->getTitle() }}">
        </div>
      </div>

      <!-- Right side - Auction Details -->
      <div class="col-md-6">
        <h1 class="display-4 mb-3">{{ __('auction.show.auction_title', ['id' => $auction->getId()]) }}
        </h1>
        <h4 class="text-muted mb-4">{{ $artwork->getTitle() }}</h4>

        <div class="auction-details">
          <!-- Auction Timeline and Status -->
          <div class="card border-primary mb-4">
            <div class="card-body">
              <h5 class="card-title text-primary mb-3">
                <i class="fas fa-clock"></i> {{ __('auction.show.timeline.title') }}
              </h5>

              <div class="row mb-3">
                <div class="col-6">
                  <small class="text-muted">{{ __('auction.show.timeline.starts') }}</small>
                  <div class="fw-bold">{{ $auction->getStartDate()->format('M d, Y H:i') }}</div>
                </div>
                <div class="col-6">
                  <small class="text-muted">{{ __('auction.show.timeline.ends') }}</small>
                  <div class="fw-bold">{{ $auction->getFinalDate()->format('M d, Y H:i') }}</div>
                </div>
              </div>

              <div class="mb-3">
                @if (!$auction->hasStarted())
                  <div class="alert alert-info mb-2">
                    <i class="fas fa-hourglass-start"></i>
                    {{ __('auction.show.status.not_started') }}
                  </div>
                  <div class="text-center">
                    <strong>{{ __('auction.show.countdown.starts_in') }}</strong>
                    <div class="h4 text-primary">{{ $auction->getStartDate()->diffForHumans() }}</div>
                  </div>
                @elseif ($auction->hasEnded())
                  <div class="alert alert-secondary mb-2">
                    <i class="fas fa-flag-checkered"></i>
                    {{ __('auction.show.status.ended') }}
                  </div>
                  <div class="text-muted text-center">
                    {{ __('auction.show.countdown.ended') }}
                    {{ $auction->getFinalDate()->diffForHumans() }}
                  </div>
                @else
                  <div class="alert alert-success mb-2">
                    <i class="fas fa-fire"></i>
                    {{ __('auction.show.status.active') }}
                  </div>
                  <div class="text-center">
                    <strong>{{ __('auction.show.countdown.ends_in') }}</strong>
                    <div class="h4 text-danger">
                      {{ now()->diffForHumans($auction->getFinalDate(), true) }}
                      {{ __('auction.show.countdown.remaining') }}</div>
                  </div>
                @endif
              </div>

              <div class="d-flex flex-wrap gap-2">
                <span class="badge bg-secondary">
                  {{ __('auction.show.original_price', ['amount' => number_format($viewData['original_price'])]) }}
                </span>
                @if ($winningBidder)
                  <span class="badge bg-success">
                    <i class="fas fa-trophy"></i> {{ __('auction.show.status.won') }}
                  </span>
                @endif
              </div>
            </div>
          </div>

          <div class="description mb-4">
            <h5 class="text-primary">{{ __('auction.show.artwork_details') }}</h5>
            <p>{{ __('auction.show.title', ['title' => $artwork->getTitle()]) }}</p>
            <p>{{ __('auction.show.author', ['author' => $artwork->getAuthor()]) }}
            </p>
            <p>{{ __('auction.show.category', ['category' => $artwork->getCategory()]) }}
            </p>
            <p class="lead">{{ $artwork->getDetails() }}</p>
          </div>

          @if ($winningBidder)
            <div class="winning-bidder mb-4">
              <h5 class="text-success">{{ __('auction.show.winning_bidder') }}</h5>
              <p>{{ __('auction.show.user_name', ['name' => $winningBidder->getName()]) }}
              </p>
            </div>
          @endif

          <!-- Bids Section -->
          <div class="bids-section mb-4">
            <h5 class="text-primary">{{ __('auction.show.bids.title') }}</h5>
            @if ($auction->bids->isEmpty())
              <div class="alert alert-info" role="alert">
                <p class="mb-0">{{ __('auction.show.bids.no_bids') }}</p>
              </div>
            @else
              <div class="bids-list">
                @foreach ($auction->bids->sortByDesc('price_offering') as $bid)
                  <div class="bid-item mb-3 rounded border bg-white p-3 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="text-success fw-bold mb-1">
                          ${{ number_format($bid->getPriceOffering()) }}</h6>
                        @if ($winningBidder)
                          <small class="text-muted">
                            {{ __('auction.show.bids.bid_by', ['name' => $bid->user->getName()]) }}
                          </small>
                        @endif
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

          <!-- Bid Creation Form (for logged-in users only) -->

          @guest
            <div class="bid-action mb-4">
              <div class="alert alert-warning">
                <i class="fas fa-sign-in-alt"></i>
                <a href="{{ route('login') }}"
                  class="text-decoration-none fw-bold">{{ __('auction.show.bid_action.login_link') }}</a>
                {{ __('auction.show.bid_action.login_to_bid') }}
              </div>
            </div>
          @else
            @if ($auction->hasStarted() && !$auction->hasEnded() && !$winningBidder)
              <div class="bid-action mb-4">
                <div class="card border-success shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title text-success mb-3">
                      <i class="fas fa-gavel"></i> {{ __('auction.show.bid_action.place_bid') }}
                    </h5>
                    @if ($errors->any())
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <form method="POST" action="{{ route('bid.create', ['auction_id' => $auction->getId()]) }}">
                      @csrf
                      <div class="row g-2 align-items-top">
                        <div class="col-md-8">
                          <div class="input-group input-group-lg">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="price_offering" name="price_offering"
                              placeholder="{{ __('bid.create.offer_placeholder') }}" value="{{ old('price_offering') }}"
                              min="0" step="1" required>
                          </div>
                          <small
                            class="text-muted">{{ __('bid.create.offer_hint', ['price' => number_format($viewData['original_price'])]) }}</small>
                        </div>
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-success btn-lg w-100">
                            <i class="fas fa-check"></i> {{ __('bid.create.submit_button') }}
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            @elseif (!$auction->hasStarted())
              <div class="alert alert-info">
                <i class="fas fa-clock"></i> {{ __('auction.show.bid_action.not_started') }}
              </div>
            @elseif ($auction->hasEnded() && !$winningBidder)
              <div class="alert alert-secondary">
                <i class="fas fa-hourglass-end"></i> {{ __('auction.show.bid_action.ended') }}
              </div>
            @endif
          @endguest

          <div class="auction-meta text-muted">
            <small>{{ __('auction.show.auction_id', ['id' => $auction->getId()]) }}</small><br>
            <small>{{ __('auction.show.created', ['date' => $auction->getCreatedAt()]) }}</small>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
