@extends('backend.layouts.app')
@section('title', __('layout.product.create'))

@section('css')
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">{{ __('layout.product.title') }}/</span> {{ __('layout.create') }}
    </h4>
    <div class="card">
        <h5 class="card-header">{{ __('layout.product.create') }}</h5>
        <div class="card-body">
            <form class="row g-3 form-create-product" action="{{ route(ROUTE_ADMIN_PRODUCT_STORE) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="check_form_validate" value="{{ old('check_form_validate') ? 'true' : 'false' }}">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <h6>1. {{ __('layout.product.info') }}</h6>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="is-active" name="active"
                                   @if (old('active', ACTIVE) == ACTIVE) checked @endif value="{{ ACTIVE }}">
                            <label class="form-check-label" for="is-active">{{ __('layout.display') }}</label>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="name">{{ __('layout.name') }}</label> <span class="text-danger">*</span>
                    <input type="text" id="name" class="form-control @if ($errors->has('name')) border-danger @endif"
                           name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback d-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="category-id">{{ __('layout.category.title') }}</label> <span class="text-danger">*</span>
                    <select class="form-control @if ($errors->has('category_id')) border-danger @endif" id="category-id" name="category_id">
                        <option value="">{{ __('layout.select') }}</option>
                        @foreach($list_category as $category)
                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                {{ $category->name }}{{ $category->parent ? ('(' .$category->parent->name . ')') : ''}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="invalid-feedback d-block">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="slug">{{ __('layout.price') }}</label> <span class="text-danger">*</span>
                    <input class="form-control @if ($errors->has('price')) border-danger @endif"
                           type="number" id="slug" name="price" value="{{ old('price') }}">
                    @if ($errors->has('price'))
                        <span class="invalid-feedback d-block">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="slug">{{ __('layout.weight') }}</label> <span class="text-danger">*</span>
                    <input class="form-control @if ($errors->has('weight')) border-danger @endif"
                           type="number" id="slug" name="weight" value="{{ old('weight') }}">
                    @if ($errors->has('weight'))
                        <span class="invalid-feedback d-block">{{ $errors->first('weight') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="image-base" class="form-label">{{ __('layout.image_base') }}</label> <span class="text-danger">*</span>
                    <input class="form-control input-image @if ($errors->has('image_base')) border-danger @endif"
                           type="file" id="image-base" name="image_base">
                    @if ($errors->has('image_base'))
                        <span class="invalid-feedback d-block">{{ $errors->first('image_base') }}</span>
                    @endif
                    <div class="block-img mt-2 preview-image"></div>
                </div>
                <div class="col-md-6">
                    <label for="image-small" class="form-label">{{ __('layout.image_small') }}</label>
                    <input class="form-control input-image @if ($errors->has('image_small')) border-danger @endif"
                           type="file" id="image-small" name="image_small">
                    @if ($errors->has('image_small'))
                        <span class="invalid-feedback d-block">{{ $errors->first('image_small') }}</span>
                    @endif
                    <div class="block-img mt-2 preview-image"></div>
                </div>
                <div class="col-md-6">
                    <label for="image-thumbnail" class="form-label">{{ __('layout.image_thumbnail') }}</label>
                    <input class="form-control input-image @if ($errors->has('image_thumbnail')) border-danger @endif"
                           type="file" id="image-thumbnail" name="image_thumbnail">
                    @if ($errors->has('image_thumbnail'))
                        <span class="invalid-feedback d-block">{{ $errors->first('image_thumbnail') }}</span>
                    @endif
                    <div class="block-img mt-2 preview-image"></div>
                </div>
                <div class="col-md-6">
                    <label for="image-swatch" class="form-label">{{ __('layout.image_swatch') }}</label>
                    <input class="form-control input-image @if ($errors->has('image_swatch')) border-danger @endif"
                           type="file" id="image-swatch" name="image_swatch">
                    @if ($errors->has('image_swatch'))
                        <span class="invalid-feedback d-block">{{ $errors->first('image_swatch') }}</span>
                    @endif
                    <div class="block-img mt-2 preview-image"></div>
                </div>

                <div class="col-md-12">
                    <label for="editor" class="form-label">{{ __('layout.description') }}</label>
                    <div id="editor" class="h-px-300"></div>
                    <textarea name="description" class="d-none"></textarea>
                </div>
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-between">
                        <h6>2. {{ __('layout.product.quantity') }}</h6>
                        <button type="button" class="btn btn-sm rounded-pill btn-icon btn-primary btn-add-product-quantity">
                            <span class="tf-icons bx bx-plus"></span>
                        </button>
                    </div>
                    <hr class="my-0">
                </div>
                <div class="block-product-quantity">
                    @forelse((old('stock_quantity') ?? []) as $key => $stock_quantity_old)
                        @php
                            $color_old = old('color')[$key] ?? null;
                            $size_old = old('size')[$key] ?? null;
                        @endphp
                        <div class="js-product-quantity row g-3 mt-0 @if ($key != 0) clone-product-quantity @endif">
                            <div class="col-md-6">
                                <label class="form-label" for="stock-quantity">{{ __('layout.quantity') }} <span class="text-danger">*</span></label>
                                <input type="number" id="stock-quantity" class="form-control input-stock-quantity @if ($errors->has('stock_quantity.' . $key)) border-danger @endif"
                                       name="stock_quantity[{{ $key }}]" value="{{ $stock_quantity_old }}">
                                @if ($errors->has('stock_quantity.' . $key))
                                    <span class="invalid-feedback d-block">{{ $errors->first('stock_quantity.' . $key) }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 text-end">
                                <button type="button" class="btn btn-icon btn-danger btn-delete-product-quantity @if ($key == 0) d-none @endif">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label d-block">{{ __('layout.color') }} <span class="text-danger">*</span></label>
                                @foreach($list_color as $key_color => $color)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input input-color cursor-pointer" id="color-{{ $color->id }}-{{ $key }}"
                                               type="radio" name="color[{{ $key }}]" value="{{ $color->id }}" @if ($color->id == $color_old) checked @endif>
                                        <label class="form-check-label label-input cursor-pointer" for="color-{{ $color->id }}-{{ $key }}">{{ $color->color_name }}</label>
                                        <span class="badge" style="background-color: {{ $color->hex_code }}"> </span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <label class="form-label d-block">{{ __('layout.size') }} <span class="text-danger">*</span></label>
                                @foreach($list_size as $key_size => $size)
                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input input-size cursor-pointer" id="size-{{ $size->id }}-{{ $key }}" type="radio"
                                               name="size[{{ $key }}]" value="{{ $size->id }}" @if ($size->id == $size_old) checked @endif>
                                        <label class="form-check-label label-input cursor-pointer" for="size-{{ $size->id }}-{{ $key }}">{{ $size->size_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-12">
                                <hr class="my-0">
                            </div>
                            <input type="hidden" class="count-product-quantity" value="{{ $key }}">
                        </div>
                    @empty
                        <div class="js-product-quantity row g-3 mt-0">
                            <div class="col-md-6">
                                <label class="form-label" for="stock-quantity">{{ __('layout.quantity') }}</label> <span class="text-danger">*</span>
                                <input type="number" id="stock-quantity" class="form-control input-stock-quantity" name="stock_quantity[0]" value="0">
                            </div>
                            <div class="col-md-6 text-end">
                                <button type="button" class="btn btn-icon btn-danger btn-delete-product-quantity d-none">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label d-block">{{ __('layout.color') }} <span class="text-danger">*</span></label>
                                @foreach($list_color as $key_color => $color)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input input-color cursor-pointer" id="color-{{ $color->id }}"
                                               type="radio" name="color[0]" value="{{ $color->id }}" @if ($key_color == 0) checked @endif>
                                        <label class="form-check-label label-input cursor-pointer" for="color-{{ $color->id }}">{{ $color->color_name }}</label>
                                        <span class="badge" style="background-color: {{ $color->hex_code }}"> </span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <label class="form-label d-block">{{ __('layout.size') }} <span class="text-danger">*</span></label>
                                @foreach($list_size as $key_size => $size)
                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input input-size cursor-pointer" id="size-{{ $size->id }}" type="radio"
                                               name="size[0]" value="{{ $size->id }}" @if ($key_size == 0) checked @endif>
                                        <label class="form-check-label label-input cursor-pointer" for="size-{{ $size->id }}">{{ $size->size_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-12">
                                <hr class="my-0">
                            </div>
                            <input type="hidden" class="count-product-quantity" value="0">
                        </div>
                    @endforelse
                </div>

                <div class="col-12">
                    <a href="{{ route(ROUTE_ADMIN_PRODUCT_LIST) }}">
                        <button type="button" class="btn btn-secondary">{{ __('layout.button.back') }}</button>
                    </a>
                    <button type="submit" class="btn btn-primary btn-loading">{{ __('layout.button.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('js/backend/product.js') }}"></script>
@endsection
