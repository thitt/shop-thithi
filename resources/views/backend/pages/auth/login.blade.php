@extends('backend.layouts.app_auth')
@section('title', __('layout.auth.login'))

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">{{ __('layout.auth.welcome_admin') }} {{ __('layout.name_project') }}! 👋</h4>
                        <form id="formAuthentication" class="mb-3" action="{{ route(ROUTE_ADMIN_CHECK_LOGIN) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('layout.auth.email') }}</label>
                                <input
                                    type="email"
                                    class="form-control @if ($errors->has('email')) border border-danger @endif"
                                    id="email"
                                    name="email"
                                    placeholder="{{ __('layout.auth.enter_email') }}"
                                    value="{{ old('email') }}"
                                />
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback d-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">{{ __('layout.auth.password') }}</label>
                                    <a href="#">
                                        <small>{{ __('layout.auth.forgot_password') }}?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control @if ($errors->has('password')) border border-danger @endif"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    />
                                    <span class="input-group-text cursor-pointer @if ($errors->has('password')) border border-danger @endif">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback d-block">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">{{ __('layout.auth.login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
