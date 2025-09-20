@extends('layouts.app')
@section('content')
    <header class="p-3 text-bg-dark">
        <div class="text-center fs-4">
            {{ __('Auctions!') }}
        </div>
    </header>
    <div class="row">
        @foreach ($viewData['Auctions'] as $auction)
            <div class="container">
                <h1>{{ $auction->getOriginalPrice() }}</h1>
            </div>
        @endforeach
    </div>
@endsection
