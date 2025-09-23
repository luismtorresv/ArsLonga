@extends('layouts.admin.admin')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg bg-dark text-white rounded-4 border-warning border-2">
                    <div class="row g-0">
                        <div class="col-md-6 p-4">
                            <h2 class="fw-bold text-warning mb-3">{{ __('admin.auction') }} {{ $viewData['auction']->getId() }}</h2>
                            <h5 class="text-info mb-3">{{ __('admin.artworkTitle') }}: <span class="fw-normal text-white">{{$viewData['auction']->getArtwork()->getTitle()}}</span></h5>
                            <div class="mb-3">
                                <span class="badge bg-secondary me-2">{{__('auction.show.original_price', ['amount' => number_format($viewData['original_price'])])}}</span>
                            </div>
                            <h5 class="text-info mb-3">{{ __('admin.priceLimit') }}: <span class="fw-normal text-white">{{number_format($viewData['auction']->getPriceLimit())}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection