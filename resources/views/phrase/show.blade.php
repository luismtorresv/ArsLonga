@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="{{ route('phrase.index') }}" class="btn btn-outline-secondary btn-sm">
                            ← {{ __('phrase.back_to_selection') }}
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <blockquote class="blockquote">
                                <p class="lead">"{{ $viewData['phrase'] }}"</p>
                            </blockquote>
                        </div>

                        <div class="d-grid d-md-flex justify-content-md-center gap-2">
                            <a href="{{ route('phrase.show', ['type' => $viewData['type']]) }}" class="btn btn-primary">
                                {{ __('phrase.get_another') }}
                            </a>
                            <a href="{{ route('phrase.index') }}" class="btn btn-outline-secondary">
                                {{ __('phrase.change_source') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
