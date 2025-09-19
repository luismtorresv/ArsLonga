@extends('layouts.app')
@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-50">
        <div class="row w-100 justify-content-center align-items-center mx-auto" style="max-width: 1200px; min-height: 600px;">
            <div class="col-lg-8 d-flex justify-content-center align-items-center">
                <div class="card shadow-lg p-5 bg-dark text-white rounded-4 mx-auto w-100" style="max-width: 480px; min-height: 600px;">
                    <div class="d-flex flex-column align-items-center">
                        <h2 class="mb-4">{{ __('Profile') }}</h2>
                        <form method="POST" action="{{ route('user.update') }}" class="w-100 mb-2">
                            @csrf
                            <div class="w-100 text-start py-3 px-3 mb-2 bg-secondary rounded-2 border border-white border-2">
                                <label for="name" class="form-label mb-1 text-white"><strong>{{ __('Name') }}:</strong></label>
                                <input type="text" class="form-control bg-dark text-white border-0" id="name" name="name" value="{{ $viewData['user']->getName() }}" required>
                            </div>
                            <div class="w-100 text-start py-3 px-3 mb-2 bg-secondary rounded-2 border border-white border-2">
                                <label class="form-label mb-1 text-white"><strong>{{ __('Email') }}:</strong></label>
                                <input type="text" class="form-control bg-dark text-white border-0" value="{{ $viewData['user']->getEmail() }}" readonly tabindex="-1">
                            </div>
                            <div class="w-100 text-start py-3 px-3 mb-2 bg-secondary rounded-2 border border-white border-2">
                                <label for="address" class="form-label mb-1 text-white"><strong>{{ __('Address') }}:</strong></label>
                                <input type="text" class="form-control bg-dark text-white border-0" id="address" name="address" value="{{ $viewData['user']->getAddress() }}">
                            </div>
                            <div class="w-100 text-start py-3 px-3 mb-2 bg-secondary rounded-2 border border-white border-2">
                                <label class="form-label mb-1 text-white"><strong>{{ __('Balance') }}:</strong></label>
                                <input type="text" class="form-control bg-dark text-white border-0" value="{{ number_format($viewData['user']->getBalance(), 0, '.', ',') }}" readonly tabindex="-1">
                            </div>
                            <button type="submit" class="btn btn-warning w-100 mt-3 fw-bold">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center justify-content-end" style="min-height: 600px;">
                <div class="card shadow-lg p-3 bg-dark text-white rounded-4 d-flex flex-column align-items-center ms-auto w-100" style="max-width: 300px; min-height: 220px;">
                    <h4 class="mb-4">{{ __('Change Password') }}</h4>
                    <form method="POST" action="{{ route('user.changePassword') }}" class="w-100">
                        @csrf
                        <div class="w-100 text-start py-3 px-3 mb-2 bg-secondary rounded-2 border border-white border-2">
                            <label for="password" class="form-label mb-1 text-white"><strong>{{ __('New Password') }}</strong></label>
                            <input type="password" class="form-control bg-dark text-white border-0" id="password" name="password" required minlength="8" placeholder="********">
                        </div>
                        <div class="w-100 text-start py-3 px-3 mb-2 bg-secondary rounded-2 border border-white border-2">
                            <label for="password_confirmation" class="form-label mb-1 text-white"><strong>{{ __('Confirm Password') }}</strong></label>
                            <input type="password" class="form-control bg-dark text-white border-0" id="password_confirmation" name="password_confirmation" required minlength="8" placeholder="********">
                        </div>
                        <button type="submit" class="btn btn-warning w-100 mt-3 fw-bold">{{ __('Change Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection