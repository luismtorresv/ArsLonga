@extends('layouts.app')
@section('title', __('order.order'))
@section('content')
    <div class="container my-4">
        @if ($viewData['orders']->isEmpty())
            <div class="alert alert-info" role="alert">
                <p class="mb-0">{{ __('order.no_orders') }}</p>
            </div>
        @else
            @foreach ($viewData['orders'] as $order)
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-1">{{ __('order.order_number') }}: <strong>#{{ $order->getId() }}</strong>
                                </h5>
                                <small class="text-muted">{{ __('order.date') }}: {{ $order->getCreatedAt() }}</small>
                            </div>
                            <div class="col-md-6 text-end">
                                <h5 class="mb-0">{{ __('order.total') }}: <strong
                                        class="text-primary">${{ number_format($order->getTotal(), 2) }}</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-sm mb-0 table">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('order.item_id') }}</th>
                                        <th>{{ __('order.artwork_name') }}</th>
                                        <th>{{ __('order.price') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>#{{ $item->getId() }}</td>
                                            <td>
                                                <a href="{{ route('artwork.show', ['id' => $item->getArtwork()->getId()]) }}"
                                                    class="text-decoration-none">
                                                    {{ $item->getArtwork()->getTitle() }}
                                                </a>
                                            </td>
                                            <td>${{ number_format($item->getPrice(), 2) }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('artwork.show', ['id' => $item->getArtwork()->getId()]) }}"
                                                    class="btn btn-sm btn-outline-primary">{{ __('order.view_artwork') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
