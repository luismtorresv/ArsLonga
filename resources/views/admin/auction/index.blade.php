@extends('layouts.admin.admin')
@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-4 mx-auto">
            <div class="card text-center shadow-sm bg-dark text-white border-warning border-2">
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
            <a href="{{ route('admin.artwork.create') }}" class="btn btn-warning fw-bold">{{ __('admin.createAuc') }}</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-bordered table-hover align-middle mb-0">
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
                    <td>{{$auction->getId()}}</td>
                    <td> {{$auction->getArtwork()->getTitle()}}</td>
                    <td>{{number_format($auction->getPriceLimit())}}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.auction.show', ['id' => $auction->getId()]) }}" class="btn btn-sm btn-outline-info me-1" title="{{ __('admin.view') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.493-.83 1.12-1.465 1.785C11.879 11.332 10.12 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.133 13.133 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM8 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                            </svg>
                        </a>
                        <a href="" class="btn btn-sm btn-outline-warning me-1" title="{{ __('admin.edit') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.854a.5.5 0 0 1 .708 0l2.292 2.292a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 12.5 5.793 10.207 3.5l1-1zm1.586 2.793-1-1L3 13.086V14h.914l8.879-8.879z"/>
                            </svg>
                        </a>
                        <form method="POST" action="" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="{{ __('admin.delete') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 5h4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H6a.5.5 0 0 1-.5-.5v-7zM4.118 4.5A1.5 1.5 0 0 1 5.5 3h5a1.5 1.5 0 0 1 1.382 1.5H15a.5.5 0 0 1 0 1h-1v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5.5H1a.5.5 0 0 1 0-1h1.118zM2.5 5v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-10z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">{{ __('auction.index.no_auctions') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection