@extends('layouts.app')
@section('content')
    {{-- Generated with Claude Sonnet 3.5. --}}
    <div class="container my-4">
        @if ($viewData['auctions']->isEmpty())
            <div class="alert alert-info" role="alert">
                <p class="mb-0">{{ __('auction.index.no_auctions') }}</p>
            </div>
        @endif
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($viewData['auctions'] as $auction)
                <div class="col">
                    <a href="{{ route('auction.show', ['id' => $auction->getId()]) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-semibold">
                                    {{ __('auction.index.auction_number', ['id' => $auction->getId()]) }}
                                </h5>
                                <p class="card-text">
                                    {{ $auction->artwork->getTitle() }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
