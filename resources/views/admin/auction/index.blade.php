@extends('layouts.admin.admin')
@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-4 mx-auto">
                <div class="card bg-dark border-warning border-2 text-center text-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-2">{{ __('admin.totalAuctions') }}</h5>
                        <span class="display-6 fw-bold text-warning">{{ $viewData['auctionsCount'] ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col">
                <h2 class="mb-0">{{ __('admin.auctions') }}</h2>
            </div>
            <div class="col-auto">
                <form method="GET" action="{{ route('admin.auction.index') }}" class="d-flex">
                    <select name="sort" class="form-select me-2" onchange="this.form.submit()">
                        <option value="">{{ __('admin.sortOptions.sortDefault') }}</option>
                        <option value="price_desc" {{ $viewData['sort'] === 'price_desc' ? 'selected' : '' }}>
                            {{ __('admin.sortOptions.sortPriceDesc') }}
                        </option>
                        <option value="price_asc" {{ $viewData['sort'] === 'price_asc' ? 'selected' : '' }}>
                            {{ __('admin.sortOptions.sortPriceAsc') }}
                        </option>
                    </select>
                    <noscript>
                        <button type="submit" class="btn btn-warning">{{ __('admin.filter') }}</button>
                    </noscript>
                </form>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.auction.create') }}"
                    class="btn btn-warning fw-bold">{{ __('admin.createAuc') }}</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table-dark table-bordered table-hover mb-0 table align-middle">
                <thead class="table-secondary text-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{ __('admin.artworkTitle') }}</th>
                        <th scope="col">{{ __('admin.priceLimit') }}</th>
                        <th scope="col" class="text-center">{{ __('admin.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($viewData['auctions'] as $auction)
                        <tr>
                            <td>{{ $auction->getId() }}</td>
                            <td> {{ $auction->getArtwork()->getTitle() }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.auction.show', ['id' => $auction->getId()]) }}"
                                    class="btn btn-sm btn-outline-info me-1" title="{{ __('admin.view') }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.auction.edit', ['id' => $auction->getId()]) }}"
                                    class="btn btn-sm btn-outline-warning me-1" title="{{ __('admin.edit') }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST"
                                    action="{{ route('admin.auction.delete', ['id' => $auction->getId()]) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        title="{{ __('admin.delete') }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">{{ __('auction.index.no_auctions') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
