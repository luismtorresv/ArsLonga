@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('auth.flow.email_verification.verify_email') }}</div>

          <div class="card-body">
            @if (session('resent'))
              <div class="alert alert-success" role="alert">
                {{ __('auth.flow.email_verification.verification_link_sent') }}
              </div>
            @endif

            {{ __('auth.flow.email_verification.check_email') }}
            {{ __('auth.flow.email_verification.did_not_receive_email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit"
                class="btn btn-link m-0 p-0 align-baseline">{{ __('auth.flow.email_verification.request_new_link') }}</button>.
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
