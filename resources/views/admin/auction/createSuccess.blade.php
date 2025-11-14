@extends('layouts.admin.admin')
@section('content')
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="alert alert-success fs-4 fw-bold mb-0 text-center" role="alert">
          {{ __('admin.createSuccess') }}
        </div>
      </div>
    </div>
  </div>
@endsection
