@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <span class="float-end">(<strong>{{ count($viewData['artworks']) }}</strong>)
                            {{ __('cart.items') }}</span>
                        <h5>{{ __('cart.items_in_cart') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($viewData['artworks'] as $artwork)
                                        <tr>
                                            <td width="120">
                                                <img src="{{ $artwork->getImage() }}" class="img-fluid"
                                                    alt="{{ $artwork->getTitle() }}">
                                            </td>
                                            <td>
                                                <h5>
                                                    <a href="{{ route('artwork.show', ['id' => $artwork->getId()]) }}"
                                                        class="text-decoration-none">
                                                        {{ $artwork->getTitle() }}
                                                    </a>
                                                </h5>
                                                <p class="text-muted">{{ $artwork->getDetails() }}</p>
                                                <div class="mt-2">
                                                    <form method="POST"
                                                        action="{{ route('cart.remove', ['id' => $artwork->getId()]) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $artwork->getId() }}">
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">{{ __('cart.remove_item') }}</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>${{ number_format($artwork->getPrice() * session('artworks')[$artwork->getId()], 2) }}
                                                </h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">{{ __('cart.summary') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-body justify-content-between">
                            <span>{{ __('cart.total') }}</span>
                            <h4 id="cart-total">${{ number_format($viewData['total'], 2) }}</h4>
                        </div>
                        <div class="card-body justify-content-between">
                            <span>{{ __('cart.user_balance') }}</span>
                            <h5 id="cart-userBalance">${{ number_format($viewData['userBalance'], 2) }}</h4>
                        </div>
                        <hr>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="d-grid gap-2">
                            <form method="POST" action="{{ route('cart.purchase') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    {{ __('cart.checkout') }}
                                </button>
                            </form>
                            <a href="{{ route('artwork.index') }}"
                                class="btn btn-outline-secondary w-100">{{ __('cart.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
