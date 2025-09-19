@extends('layouts.app')
@section('content')
    <header class="p-3 text-bg-dark">
        <div class="text-center fs-4">
            {{ __('Auctions!') }}
        </div>
        <div class="row">
            @foreach ($viewData['Auctions'] as $auction)
                <div class=".container">
                    <h1>{{ $auction->getPrice() }}</h1>
                </div>
            @endforeach
        </div>
    @endsection
