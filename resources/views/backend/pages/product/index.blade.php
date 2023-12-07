@extends('backend.layouts.app')
@section('title', __('layout.category.list'))

@section('content')
    <div class="card">
        <h5 class="card-header">{{ __('layout.category.title') }}</h5>
        <div class="card-body">
            <form class="dt_adv_search form-search" action="{{ route(ROUTE_ADMIN_PRODUCT_LIST) }}" method="GET">
                <div class="row">
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.name') }}:</label>
                                <input type="text" class="form-control dt-input" name="name"
                                       value="{{ request('name') }}">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.category.title') }}:</label>
                                <select class="form-select" name="category_id">
                                    <option value="">{{ __('layout.select') }}</option>
                                    @foreach($list_category as $category)
                                        <option value="{{ $category->id }}" @if (request('category_id') == $category->id) selected @endif>
                                            {{ getNameCategory($category) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.slug') }}:</label>
                                <input type="text" class="form-control dt-input" name="slug"
                                       value="{{ request('slug') }}">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.price') }}:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price_from" value="{{ request('price_from') }}">
                                    <span class="input-group-text py-1">{{ __('layout.to') }}</span>
                                    <input type="number" class="form-control" name="price_to" value="{{ request('price_to') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.quantity') }}:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="quantity_from" value="{{ request('quantity_from') }}" disabled>
                                    <span class="input-group-text py-1">{{ __('layout.to') }}</span>
                                    <input type="number" class="form-control" name="quantity_to" value="{{ request('quantity_to') }}" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.sell_number') }}:</label>
                                <input type="text" class="form-control dt-input" name="sell_number"
                                       value="{{ request('sell_number') }}" disabled>
                            </div>
                            <input type="hidden" class="input-not-reset" name="number_record"
                                   value="{{ request('number_record') }}">
                            <div class="text-center">
                                <button type="button"
                                        class="btn btn btn-secondary btn-clear-form">{{ __('layout.button.reset') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('layout.button.search') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <p class="text-sm text-gray-700 leading-5">
                    {{ __('layout.showing') }}
                    <span class="font-medium">{{ $list_product->firstItem() }}</span>
                    {{ __('layout.to') }}
                    <span class="font-medium">{{ $list_product->lastItem() }}</span>
                    {{ __('layout.of') }}
                    <span class="font-medium">{{ $list_product->total() }}</span>
                    {{ __('layout.results') }}
                </p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="w-100px">
                            {{ __('layout.id') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'id') }} float-right cursor-pointer" data-sort="id"></i>
                        </th>
                        <th>
                            {{ __('layout.name') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'name') }} float-right cursor-pointer" data-sort="name"></i>
                        </th>
                        <th>
                            {{ __('layout.category.title') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'category_max_name') }} float-right cursor-pointer" data-sort="category_max_name"></i>
                        </th>
                        <th>
                            {{ __('layout.slug') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'slug') }} float-right cursor-pointer" data-sort="slug"></i>
                        </th>
                        <th>
                            {{ __('layout.price') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'price') }} float-right cursor-pointer" data-sort="price"></i>
                        </th>
                        <th>
                            {{ __('layout.quantity') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'product_quantities_sum_stock_quantity') }} float-right cursor-pointer" data-sort="product_quantities_sum_stock_quantity"></i>
                        </th>
                        <th>
                            {{ __('layout.sell_number') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'sell_number') }} float-right cursor-pointer" data-sort="sell_number"></i>
                        </th>
                        <th>{{ __('layout.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($list_product as $product)
                        @php

                        @endphp
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <strong>{{ $product->name }}</strong>
                            </td>
                            <td>{{ getNameCategory($product->category) }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>{{ number_format($product->product_quantities_sum_stock_quantity) }}</td>
                            <td>0</td>
                            <td class="w-150px text-center">
                                <a href="{{ route(ROUTE_ADMIN_PRODUCT_EDIT, $product->id) }}">
                                    <span class="badge rounded-pill bg-label-primary">
                                        <i class="bx bx-edit-alt"></i>
                                    </span>
                                </a>
                                <span class="badge rounded-pill bg-label-danger btn-delete" data-toggle="modal"
                                      data-target="#modal-delete"
                                      data-url="{{ route(ROUTE_ADMIN_PRODUCT_DELETE, $product->id) }}">
                                    <i class="bx bx-trash"></i>
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center">{{ __('message.no_data') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @include('backend.layouts.pagination', ['list' => $list_product])
        </div>
    </div>
    @include('backend.modals.modal_delete', ['message' => __('message.product.modal_delete')])
@endsection

