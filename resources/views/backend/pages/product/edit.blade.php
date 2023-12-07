@extends('backend.layouts.app')
@section('title', __('layout.product.edit'))

@section('css')
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">{{ __('layout.product.title') }}/</span> {{ __('layout.edit') }}
    </h4>
@endsection

@section('script')
    <script src="{{ asset('vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('js/backend/product.js') }}"></script>
@endsection

