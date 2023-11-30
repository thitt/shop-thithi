@extends('backend.layouts.app')
@section('title', __('layout.category.edit'))

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span
            class="text-muted fw-light">{{ __('layout.category.title') }}/</span> {{ __('layout.edit') }}</h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('layout.category.edit') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route(ROUTE_ADMIN_CATEGORY_UPDATE, request('id')) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">{{ __('layout.name') }}</label>
                            <input type="text" class="form-control @if ($errors->has('name')) border-danger @endif"
                                   id="name" name="name" value="{{ old('name', $data_category['name']) }}"/>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback d-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="slug">{{ __('layout.slug') }}</label>
                            <input type="text" class="form-control @if ($errors->has('slug')) border-danger @endif"
                                   id="slug" name="slug" value="{{ old('slug', $data_category['slug']) }}"/>
                            @if ($errors->has('slug'))
                                <span class="invalid-feedback d-block">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">{{ __('layout.description') }}</label>
                            <textarea id="description"
                                      class="form-control @if ($errors->has('description')) border-danger @endif"
                                      name="description">{{ old('description', $data_category['description']) }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback d-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <a href="{{ route(ROUTE_ADMIN_CATEGORY_LIST) }}">
                            <button type="button" class="btn btn-secondary">{{ __('layout.button.back') }}</button>
                        </a>
                        <button type="submit" class="btn btn-primary btn-loading">{{ __('layout.button.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
