@extends('frontend.layouts.app_auth')
@section('title', __('layout.auth.register'))

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_register.css') }}" />
@endsection

@section('content')
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url({{ asset('img/auth/product_login.jpg') }});"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5">
                        <h3>{{ __('layout.auth.register') }}</h3>
                        <p class="mb-4">{{ __('layout.auth.register_memo') }}</p>
                        <form action="{{ route(ROUTE_REGISTER_STORE) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="fname">{{ __('layout.auth.first_name') }}</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @if ($errors->has('first_name')) border border-danger @endif"
                                               id="fname" name="first_name" value="{{ old('first_name') }}">
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">{{ __('layout.auth.last_name') }}</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @if ($errors->has('last_name')) border border-danger @endif"
                                               id="lname" name="last_name" value="{{ old('last_name') }}">
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="user_name">{{ __('layout.auth.user_name') }}</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @if ($errors->has('user_name')) border border-danger @endif"
                                               id="user_name" name="user_name" value="{{ old('user_name') }}"   >
                                        @if ($errors->has('user_name'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('user_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">{{ __('layout.auth.phone_number') }}</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @if ($errors->has('phone_number')) border border-danger @endif"
                                               id="lname" name="phone_number" value="{{ old('phone_number') }}">
                                        @if ($errors->has('phone_number'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="email">{{ __('layout.auth.email_address') }}</label> <span class="text-danger">*</span>
                                        <input type="email" class="form-control @if ($errors->has('email')) border border-danger @endif"
                                               id="email" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group last mb-3">
                                        <label for="password">{{ __('layout.auth.password') }}</label> <span class="text-danger">*</span>
                                        <div class="position-relative">
                                            <input type="password" class="input-password form-control @if ($errors->has('password')) border border-danger @endif"
                                                   id="password" name="password" value="{{ old('password') }}" autocomplete="new-password">
                                            <span class="icon-show-password icon-eye-slash"></span>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group last mb-3">
                                        <label for="re-password">{{ __('layout.auth.password_confirmation') }}</label> <span class="text-danger">*</span>
                                        <div class="position-relative">
                                            <input type="password" class="input-password form-control @if ($errors->has('password_confirmation')) border border-danger @endif"
                                                   id="re-password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            <span class="icon-show-password icon-eye-slash"></span>
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="city">{{ __('layout.auth.city') }}</label> <span class="text-danger">*</span>
                                        <select id="city" class="form-control @if ($errors->has('city')) border border-danger @endif"></select>
                                        <input type="hidden" name="city" value="{{ old('city') }}">
                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="district">{{ __('layout.auth.district') }}</label> <span class="text-danger">*</span>
                                        <select id="district" class="form-control @if ($errors->has('district')) border border-danger @endif" name="district"></select>
                                        <input type="hidden" name="district" value="{{ old('district') }}">
                                        @if ($errors->has('district'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('district') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="address">{{ __('layout.auth.address') }}</label>
                                        <input type="text" class="form-control @if ($errors->has('address')) border border-danger @endif"
                                               id="address" name="address" value="{{ old('address') }}">
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route(ROUTE_LOGIN) }}">
                                    <input type="button" value="{{ __('layout.auth.login') }}" class="btn px-5 btn-primary">
                                </a>
                                <input type="submit" value="{{ __('layout.auth.register') }}" class="btn px-5 btn-success float-right">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/register.js') }}" type="module"></script>
@endsection
