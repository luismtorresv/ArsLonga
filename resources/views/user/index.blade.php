@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-50">
        <div class="card bg-dark rounded-3 p-4 text-white shadow-lg" style="max-width: 400px; width: 100%;">
            <div class="d-flex flex-column align-items-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($viewData['user']->getName()) }}&background=23272b&color=fff&size=128"
                    alt="User Avatar" class="rounded-circle border-warning mb-3 border"
                    style="width: 128px; height: 128px; object-fit: cover; border-width: 4px;">
                <h2 class="mb-4">{{ __('user.profile') }}</h2>
                <div class="w-100 mb-2">
                    <div class="w-100 bg-secondary rounded-2 mb-2 border border-2 border-white px-3 py-3 text-start">
                        <strong>{{ __('user.name') }}:</strong> <em>{{ $viewData['user']->getName() }}</em>
                    </div>
                    <div class="w-100 bg-secondary rounded-2 mb-2 border border-2 border-white px-3 py-3 text-start">
                        <strong>{{ __('user.email') }}:</strong> <em>{{ $viewData['user']->getEmail() }}</em>
                    </div>
                    <div class="w-100 bg-secondary rounded-2 mb-2 border border-2 border-white px-3 py-3 text-start">
                        <strong>{{ __('user.address') }}:</strong>
                        @if ($viewData['user']->getAddress())
                            {{ $viewData['user']->getAddress() }}
                        @else
                            <em>{{ __('user.noAddress') }}</em>
                        @endif
                    </div>
                    <div class="w-100 bg-secondary rounded-2 mb-2 border border-2 border-white px-3 py-3 text-start">
                        <strong>{{ __('user.balance') }}:</strong>
                        {{ number_format($viewData['user']->getBalance(), 0, '.', ',') }}
                    </div>
                </div>
                <a href="{{ route('user.edit') }}"
                    class="btn btn-warning w-100 fw-bold mt-3">{{ __('user.editProfile') }}</a>
            </div>
        </div>
    </div>
@endsection
