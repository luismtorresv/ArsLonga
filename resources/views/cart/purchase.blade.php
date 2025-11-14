@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header">
      {{ __('order.purchase_completed') }}
    </div>
    <div class="card-body">
      <div class="alert alert-success" role="alert">
        {{ __('order.order_number') }}
        <b>#{{ $viewData['order']->getId() }}</b>
      </div>
    </div>
  </div>
@endsection
