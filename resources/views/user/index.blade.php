@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-50">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 1rem; background: #23272b; color: #fff;">
            <div class="d-flex flex-column align-items-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($viewData['user']->getName()) }}&background=23272b&color=fff&size=128" alt="User Avatar" class="rounded-circle mb-3" style="width: 128px; height: 128px; object-fit: cover; border: 4px solid #ffc107;">
                <h2 class="mb-4">{{ __('Profile') }}</h2>
                <div class="w-100 mb-2">
                    <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                        <strong>{{ __('Name') }}:</strong> <em>{{ $viewData['user']->getName() }}</em>
                    </div>
                    <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                        <strong>{{ __('Email') }}:</strong> <em>{{ $viewData['user']->getEmail() }}</em>
                    </div>
                    <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                        <strong>{{ __('Address') }}:</strong>
                        @if($viewData['user']->getAddress())
                            {{ $viewData['user']->getAddress() }}
                        @else
                            <em>{{ __('No address provided') }}</em>
                        @endif
                    </div>
                    <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                        <strong>{{ __('Balance') }}:</strong> {{ number_format($viewData['user']->getBalance(), 0, '.', ',') }}
                    </div>
                </div>
                <a href="{{ route('user.edit') }}" class="btn btn-warning w-100 mt-3" >{{ __('Edit profile') }}</a>
            </div>
        </div>
    </div>
@endsection