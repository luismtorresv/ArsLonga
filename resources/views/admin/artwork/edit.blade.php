@extends('layouts.admin.admin')
@section('content')
	<div class="container py-4">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="card shadow-lg bg-dark text-white rounded-4 border-warning border-2">
					<div class="card-header bg-dark text-center rounded-top-4">
						<h3 class="mb-0 fw-bold text-warning">{{ __('admin.edit') }}</h3>
					</div>
					<div class="card-body">
						@if ($errors->any())
							<div class="alert alert-danger mb-4">
								<ul class="mb-0">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form method="POST" action="{{ route('admin.artwork.save', ['id' => $viewData['artwork']->getId()]) }}" enctype="multipart/form-data" class="row g-3">
							@csrf
							<div class="col-md-6">
								<label for="title" class="form-label fw-bold">{{ __('admin.title') }}</label>
								<input type="text" class="form-control bg-dark text-white border-warning" id="title" name="title" value="{{ old('title', $viewData['artwork']->getTitle()) }}" required>
							</div>
							<div class="col-md-6">
								<label for="author" class="form-label fw-bold">{{ __('admin.author') }}</label>
								<input type="text" class="form-control bg-dark text-white border-warning" id="author" name="author" value="{{ old('author', $viewData['artwork']->getAuthor()) }}" required>
							</div>
							<div class="col-md-6">
								<label for="keyword" class="form-label fw-bold">{{ __('admin.keyword') }}</label>
								<input type="text" class="form-control bg-dark text-white border-warning" id="keyword" name="keyword" value="{{ old('keyword', $viewData['artwork']->getKeyword()) }}">
							</div>
							<div class="col-md-6">
								<label for="category" class="form-label fw-bold">{{ __('admin.category') }}</label>
								<input type="text" class="form-control bg-dark text-white border-warning" id="category" name="category" value="{{ old('category', $viewData['artwork']->getCategory()) }}">
							</div>
							<div class="col-12">
								<label for="details" class="form-label fw-bold">{{ __('admin.details') }}</label>
								<textarea class="form-control bg-dark text-white border-warning" id="details" name="details" rows="3">{{ old('details', $viewData['artwork']->getDetails()) }}</textarea>
							</div>
							<div class="col-12">
								<label for="image" class="form-label fw-bold">{{ __('admin.image') }}</label>
								<input class="form-control bg-dark text-white border-warning" type="file" id="image" name="image">
								@if ($viewData['artwork']->getImage())
									<div class="mt-2">
										<img src="{{ asset('/storage/' . $viewData['artwork']->getImage()) }}" alt="{{ __('admin.current') }}" class="img-thumbnail" style="max-width: 120px; max-height: 120px;">
										<small class="text-muted ms-2">{{ __('admin.current') }}</small>
									</div>
								@endif
							</div>
							<div class="col-12 text-end">
								<button type="submit" class="btn btn-warning fw-bold px-4">{{ __('admin.save') }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection