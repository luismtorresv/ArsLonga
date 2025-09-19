@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Auction</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('auction.save') }}">
                            @csrf
                            <input type="text" class="form-control mb-2" placeholder="Enter starting price" name="original_price"
                                value="{{ old('original_price') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter final price" name="final_price"
                                value="{{ old('final_price') }}" />
                            <input type="text" class="form-control mb-2" placeholder="Enter user ID"
                                name="winning_bidder_id" value="{{ old('winning_bidder_id') }}" />
                            <input type="submit" class="btn btn-primary" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
