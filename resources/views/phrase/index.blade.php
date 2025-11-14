@extends('layouts.app')
@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title mb-0 text-center">{{ __('phrase.title') }}</h3>
          </div>
          <div class="card-body text-center">
            <p class="lead mb-4">{{ __('phrase.subtitle') }}</p>

            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="card border-primary">
                  <div class="card-body">
                    <h5 class="card-title">{{ __('phrase.chuck_button') }}</h5>
                    <p class="card-text">{{ __('phrase.chuck_description') }}</p>
                    <a href="{{ route('phrase.show', ['type' => 'chuck']) }}" class="btn btn-primary">
                      {{ __('phrase.chuck_button') }}
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="card border-success">
                  <div class="card-body">
                    <h5 class="card-title">{{ __('phrase.local_button') }}</h5>
                    <p class="card-text">{{ __('phrase.local_description') }}</p>
                    <a href="{{ route('phrase.show', ['type' => 'local']) }}" class="btn btn-success">
                      {{ __('phrase.local_button') }}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
