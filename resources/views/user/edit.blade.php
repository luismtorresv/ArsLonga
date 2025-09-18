@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-center align-items-center min-vh-50">
        <div class="row w-100 justify-content-center" style="max-width: 900px;">
            <div class="col-md-7 d-flex justify-content-center">
                <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 1rem; background: #23272b; color: #fff;">
                    <div class="d-flex flex-column align-items-center">
                        <h2 class="mb-4">{{ explode(' ', $viewData['user']->getName())[0] }}'s {{ __('account') }}</h2>
                        <form method="POST" action="{{ route('user.update') }}" class="w-100 mb-2">
                            @csrf
                            <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                                <label for="name" class="form-label mb-1" style="color:#fff;"><strong>{{ __('Name') }}:</strong></label>
                                <input type="text" class="form-control bg-dark text-white border-0" id="name" name="name" value="{{ $viewData['user']->getName() }}" required>
                            </div>
                            <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                                <label for="email" class="form-label mb-1" style="color:#fff;"><strong>{{ __('Email') }}:</strong></label>
                                <input type="email" class="form-control bg-dark text-white border-0" id="email" name="email" value="{{ $viewData['user']->getEmail() }}" required>
                            </div>
                            <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                                <label for="address" class="form-label mb-1" style="color:#fff;"><strong>{{ __('Address') }}:</strong></label>
                                <input type="text" class="form-control bg-dark text-white border-0" id="address" name="address" value="{{ $viewData['user']->getAddress() }}">
                            </div>
                            <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                                <label for="balance" class="form-label mb-1" style="color:#fff;"><strong>{{ __('Balance') }}:</strong></label>
                                <input type="number" class="form-control bg-dark text-white border-0" id="balance" name="balance" value="{{ $viewData['user']->getBalance() }}" min="0" step="1">
                            </div>
                            <button type="submit" class="btn btn-warning w-100 mt-3" style="font-weight: bold;">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <div class="card shadow-lg p-4 d-flex flex-column align-items-center" style="max-width: 400px; width: 100%; border-radius: 1rem; background: #23272b; color: #fff;">
                    <h4 class="mb-4" style="color:#ffc107;">{{ __('Change Password') }}</h4>
                    <form method="POST" action="{{ route('user.changePassword') }}" class="w-100">
                        @csrf
                        <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                            <label for="password" class="form-label mb-1" style="color:#fff;"><strong>{{ __('New Password') }}</strong></label>
                            <input type="password" class="form-control bg-dark text-white border-0" id="password" name="password" required minlength="8" placeholder="********">
                        </div>
                        <div class="w-100 text-start py-3 px-3 mb-2" style="background: #343a40; border-radius: 0.5rem; color: #fff; border: 1.5px solid #fff;">
                            <label for="password_confirmation" class="form-label mb-1" style="color:#fff;"><strong>{{ __('Confirm Password') }}</strong></label>
                            <input type="password" class="form-control bg-dark text-white border-0" id="password_confirmation" name="password_confirmation" required minlength="8" placeholder="********">
                        </div>
                        <button type="submit" class="btn btn-warning w-100 mt-3" style="font-weight: bold;">{{ __('Change Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection