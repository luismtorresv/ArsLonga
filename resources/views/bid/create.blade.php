@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('bid.create.title') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('bid.save') }}">
                            @csrf
                            <input type="text" class="form-control mb-2"
                                placeholder="{{ __('bid.create.offer_placeholder') }}" name="price_offering"
                                value="{{ old('price_offering') }}" />
                            <input type="hidden" name="auction_id" value="{{ $viewData['auction_id'] }}">
                            <input type="submit" class="btn btn-primary" value="{{ __('bid.create.submit_button') }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
