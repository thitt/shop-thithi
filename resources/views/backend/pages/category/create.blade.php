@extends('backend.layouts.app')
@section('title', __('layout.category.create'))

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span
            class="text-muted fw-light">{{ __('layout.category.title') }}/</span> {{ __('layout.create') }}</h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('layout.category.create') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route(ROUTE_ADMIN_CATEGORY_STORE) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">{{ __('layout.name') }}</label>
                            <input type="text" class="form-control @if ($errors->has('name')) border-danger @endif"
                                   id="name" name="name" value="{{ old('name') }}"/>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback d-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">{{ __('layout.description') }}</label>
                            <textarea id="description"
                                      class="form-control @if ($errors->has('description')) border-danger @endif"
                                      name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback d-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <small class="text-light fw-medium d-block">{{ __('layout.type') }}</small>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input input-category-parent" id="parent-category" type="radio" name="type_category"
                                       value="{{ IS_PARENT_CATEGORY }}" @if (old('type_category') == IS_PARENT_CATEGORY || old('type_category') == null) checked @endif>
                                <label class="form-check-label" for="parent-category">{{ __('layout.parent') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input input-category-parent" id="child-category" type="radio" name="type_category"
                                       value="{{ IS_CHILD_CATEGORY }}"  @if (old('type_category') == IS_CHILD_CATEGORY) checked @endif>
                                <label class="form-check-label" for="child-category">{{ __('layout.child') }}</label>
                            </div>
                        </div>
                        <div class="mb-3 block-category-parent">
                            <label for="list-category-parent" class="form-label">{{ __('layout.category.type_parent') }}</label>
                            <select class="form-select @if ($errors->has('parent_id')) border-danger @endif" id="list-category-parent" name="parent_id">
                                <option value="">{{ __('layout.select') }}</option>
                                @foreach($list_category_parent as $category)
                                    <option value="{{ $category->id }}" @if (old('parent_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('parent_id'))
                                <span class="invalid-feedback d-block">{{ $errors->first('parent_id') }}</span>
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

@section('script')
    <script src="{{ asset('js/backend/category.js') }}"></script>
@endsection
