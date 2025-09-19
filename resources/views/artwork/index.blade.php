@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    {{-- Generated with Claude Sonnet 3.5. --}}
    <div class="container my-4">
        @if ($viewData['artworks']->isEmpty())
            <div class="alert alert-info" role="alert">
                <p class="mb-0">{{ __('artwork.index.no_artworks') }}</p>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($viewData['artworks'] as $artwork)
                <a href="{{ route('artwork.show', ['id' => $artwork->getId()]) }}" class="text-decoration-none text-dark">
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('/storage/' . $artwork->getImage()) }}" class="card-img-top"
                                alt="{{ $artwork->getTitle() }}">
                            <div class="card-body">
                                <h5 class="card-title text-dark fw-semibold">
                                    {{ $artwork->getTitle() }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
