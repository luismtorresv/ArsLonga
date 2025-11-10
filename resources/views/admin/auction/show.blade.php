@extends('layouts.admin.admin')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card bg-dark rounded-4 border-warning border-2 text-white shadow-lg">
                    <div class="card-header bg-dark rounded-top-4 border-bottom border-warning">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fw-bold text-warning mb-0">
                                <i class="bi bi-hammer"></i> {{ __('admin.auction') }} #{{ $viewData['auction']->getId() }}
                            </h2>
                            <a href="{{ route('admin.auction.edit', ['id' => $viewData['auction']->getId()]) }}"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> {{ __('admin.edit') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <!-- Artwork Information -->
                            <div class="col-12">
                                <div class="rounded-3 border-warning border p-4" style="background-color: #2d2d2d;">
                                    <h5 class="text-warning fw-bold mb-3">
                                        <i class="bi bi-palette"></i> {{ __('admin.artwork') }}
                                    </h5>
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <label
                                                class="text-warning small d-block mb-1">{{ __('admin.artworkTitle') }}</label>
                                            <h6 class="fw-bold mb-0 text-white">
                                                {{ $viewData['auction']->getArtwork()->getTitle() }}</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="text-warning small d-block mb-1">{{ __('admin.artwork') }}
                                                ID</label>
                                            <span class="badge bg-info">{{ $viewData['auction']->getArtworkId() }}</span>
                                        </div>
                                    </div>
                                    @if (isset($viewData['original_price']))
                                        <div class="border-top border-secondary mt-3 pt-3">
                                            <label
                                                class="text-warning small d-block mb-1">{{ __('admin.originalPrice') }}</label>
                                            <h5 class="text-success fw-bold mb-0">
                                                ${{ number_format($viewData['original_price']) }}
                                            </h5>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Auction Timeline -->
                            <div class="col-12">
                                <div class="rounded-3 border-warning border p-4" style="background-color: #2d2d2d;">
                                    <h5 class="text-warning fw-bold mb-3">
                                        <i class="bi bi-calendar-event"></i> {{ __('admin.timeline') }}
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label
                                                class="text-warning small d-block mb-1">{{ __('admin.form.start_date') }}</label>
                                            <div class="fw-semibold text-white">
                                                <i class="bi bi-calendar-check text-success"></i>
                                                {{ $viewData['auction']->getStartDate() ? $viewData['auction']->getStartDate()->format('M d, Y - H:i:s') : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label
                                                class="text-warning small d-block mb-1">{{ __('admin.form.final_date') }}</label>
                                            <div class="fw-semibold text-white">
                                                <i class="bi bi-calendar-x text-danger"></i>
                                                {{ $viewData['auction']->getFinalDate() ? $viewData['auction']->getFinalDate()->format('M d, Y - H:i:s') : 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Winning Bidder -->
                            <div class="col-12">
                                <div class="rounded-3 border-warning border p-4" style="background-color: #2d2d2d;">
                                    <h5 class="text-warning fw-bold mb-3">
                                        <i class="bi bi-trophy"></i> {{ __('admin.winningBidder') }}
                                    </h5>
                                    @if ($viewData['auction']->getWinningBidderId())
                                        <div>
                                            <label class="text-warning small d-block mb-1">Bidder ID</label>
                                            <span
                                                class="badge bg-warning text-dark fs-6">{{ $viewData['auction']->getWinningBidderId() }}</span>
                                        </div>
                                    @else
                                        <p class="text-white-50 mb-0">
                                            <i class="bi bi-dash-circle"></i> {{ __('admin.noWinnerYet') }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Timestamps -->
                            <div class="col-12">
                                <div class="rounded-3 border-secondary border p-4" style="background-color: #2d2d2d;">
                                    <h6 class="text-secondary fw-bold mb-3">
                                        <i class="bi bi-clock-history"></i> Timestamps
                                    </h6>
                                    <div class="row small">
                                        <div class="col-md-4">
                                            <label
                                                class="text-secondary small d-block mb-1">{{ __('admin.created') }}</label>
                                            <span class="text-white-50">
                                                {{ $viewData['auction']->getCreatedAt() ? $viewData['auction']->getCreatedAt()->format('M d, Y H:i:s') : 'N/A' }}
                                            </span>
                                        </div>
                                        <div class="col-md-4">
                                            <label
                                                class="text-secondary small d-block mb-1">{{ __('admin.updated') }}</label>
                                            <span class="text-white-50">
                                                {{ $viewData['auction']->getUpdatedAt() ? $viewData['auction']->getUpdatedAt()->format('M d, Y H:i:s') : 'N/A' }}
                                            </span>
                                        </div>
                                        <div class="col-md-4">
                                            <label
                                                class="text-secondary small d-block mb-1">{{ __('admin.auctionId') }}</label>
                                            <span class="badge bg-secondary">{{ $viewData['auction']->getId() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-dark rounded-bottom-4 border-top border-warning">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.auction.index') }}" class="btn btn-outline-warning btn-sm">
                                <i class="bi bi-arrow-left"></i> {{ __('admin.backToList') }}
                            </a>
                            <form action="{{ route('admin.auction.delete', ['id' => $viewData['auction']->getId()]) }}"
                                method="POST" onsubmit="return confirm('{{ __('admin.confirmDelete') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i> {{ __('admin.delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
