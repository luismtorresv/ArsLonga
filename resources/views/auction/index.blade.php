@extends('layouts.app')
@section('content')
    <header class="p-3 text-bg-dark">
        <div class="text-center fs-4">
            {{ __('Auctions!') }}
        </div>
    </header>
    <div class="row">
        @foreach ($viewData['Auctions'] as $auction)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h1>{{ $auction->getOriginalPrice() }}</h1>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
