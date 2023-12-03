@extends('backend.layouts.app')
@section('title', __('layout.category.list'))

@section('content')
    <div class="card">
        <h5 class="card-header">{{ __('layout.category.title') }}</h5>
        <div class="card-body">
            <form class="dt_adv_search form-search" action="{{ route(ROUTE_ADMIN_CATEGORY_LIST) }}" method="GET">
                <div class="row">
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.name') }}:</label>
                                <input type="text" class="form-control dt-input" name="name"
                                       value="{{ request('name') }}">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.slug') }}:</label>
                                <input type="text" class="form-control dt-input" name="slug"
                                       value="{{ request('slug') }}">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label class="form-label">{{ __('layout.description') }}:</label>
                                <input type="text" class="form-control dt-input" name="description"
                                       value="{{ request('description') }}">
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
                    <span class="font-medium">{{ $list_category->firstItem() }}</span>
                    {{ __('layout.to') }}
                    <span class="font-medium">{{ $list_category->lastItem() }}</span>
                    {{ __('layout.of') }}
                    <span class="font-medium">{{ $list_category->total() }}</span>
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
                            {{ __('layout.description') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'description') }} float-right cursor-pointer" data-sort="description"></i>
                        </th>
                        <th>
                            {{ __('layout.slug') }}
                            <i class="js-icon-sort bx {{ iconSortListAdmin(request('sort'), request('key'), 'slug') }} float-right cursor-pointer" data-sort="slug"></i>
                        </th>
                        <th class="w-100px">{{ __('layout.category.number_product') }}</th>
                        <th>{{ __('layout.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($list_category as $category)
                        @php
                            $name_parent = $category->parent->name ?? '';
                        @endphp
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                <strong>{{ $name_parent ? ($name_parent . ' / ') : '' }}{{ $category->name }}</strong>
                            </td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->products->count() }}</td>
                            <td class="w-150px text-center">
                                <a href="{{ route(ROUTE_ADMIN_CATEGORY_EDIT, $category->id) }}">
                                    <span class="badge rounded-pill bg-label-primary">
                                        <i class="bx bx-edit-alt"></i>
                                    </span>
                                </a>
                                @if ($category->products->count() == 0)
                                    <span class="badge rounded-pill bg-label-danger btn-delete" data-toggle="modal"
                                          data-target="#modal-delete"
                                          data-url="{{ route(ROUTE_ADMIN_CATEGORY_DELETE, $category->id) }}">
                                        <i class="bx bx-trash"></i>
                                    </span>
                                @endif
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
            <div class="row mt-3 text-nowrap">
                <div class="col-4">
                    <label>
                        {{ __('layout.show') }}
                        <select class="form-select d-inline-block select-number-record" name="number_record">
                            @foreach(NUMBER_RECORD as $record)
                                <option value="{{ $record }}"
                                        @if (request('number_record') == $record) selected @endif>
                                    {{ $record }}
                                </option>
                            @endforeach
                        </select>
                        {{ __('layout.entries') }}
                    </label>
                </div>
                <div class="col-8 pagination-custom">
                    {!! $list_category->withQueryString() !!}
                </div>
            </div>
        </div>
    </div>
    @include('backend.modals.modal_delete', ['message' => __('message.category.modal_delete')])
@endsection
