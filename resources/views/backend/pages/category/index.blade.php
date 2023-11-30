@extends('backend.layouts.app')
@section('title', __('layout.category.list'))

@section('content')
    <div class="card">
        <h5 class="card-header">{{ __('layout.category.title') }}</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{ __('layout.id') }}</th>
                        <th>{{ __('layout.name') }}</th>
                        <th>{{ __('layout.description') }}</th>
                        <th>{{ __('layout.slug') }}</th>
                        <th>{{ __('layout.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($list_category as $category)
                        <tr>
                            <td class="w-100px">{{ $category->id }}</td>
                            <td>
                                <strong>{{ $category->name }}</strong>
                            </td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->slug }}</td>
                            <td class="w-150px text-center">
                                <a href="{{ route(ROUTE_ADMIN_CATEGORY_EDIT, $category->id) }}">
                                    <span class="badge rounded-pill bg-label-primary">
                                        <i class="bx bx-edit-alt"></i>
                                    </span>
                                </a>
                                <a href="{{ route(ROUTE_ADMIN_CATEGORY_DELETE, $category->id) }}">
                                    <span class="badge rounded-pill bg-label-danger">
                                        <i class="bx bx-trash"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center">{{ __('message.no_data') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="pagination-custom">
                    {!! $list_category->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
