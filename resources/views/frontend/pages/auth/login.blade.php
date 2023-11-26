@extends('frontend.layouts.app_auth')
@section('title', __('layout.auth.login'))

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_login.css') }}" />
@endsection

@section('content')
    <div class="d-md-flex half">
        <div class="bg" style="background-image: url({{ asset('img/auth/product_login.jpg') }});"></div>
        <div class="contents">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3 class="text-uppercase">{{ __('layout.auth.login_to') }} <strong>{{ __('layout.name_project') }}</strong></h3>
                            </div>
                            <form action="{{ route(ROUTE_CHECK_LOGIN) }}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">{{ __('layout.auth.user_name') }}</label>
                                    <input type="text" class="form-control @if ($errors->has('email')) border border-danger @endif" id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">{{ __('layout.auth.password') }}</label>
                                    <input type="password" class="form-control @if ($errors->has('password')) border border-danger @endif" id="password" name="password" value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="d-sm-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">{{ __('layout.auth.remember_me') }}</span>
                                        <input type="checkbox" checked="checked" name="remember_me"/>
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">{{ __('layout.auth.forgot_password') }}</a></span>
                                </div>

                                <input type="submit" value="{{ __('layout.auth.login') }}" class="btn btn-block py-2 btn-primary">
                                <span class="text-center my-3 d-block">{{ __('layout.auth.or') }}</span>

                                <div class="">
                                    <a href="#" class="btn btn-block py-2 btn-facebook">
                                        <span class="icon-facebook mr-3"></span> {{ __('layout.auth.login_facebook') }}
                                    </a>
                                    <a href="#" class="btn btn-block py-2 btn-google"><span class="icon-google mr-3"></span> {{ __('layout.auth.login_google') }}</a>
                                    <a href="{{ route(ROUTE_REGISTER) }}" class="btn btn-block py-2 btn-success text-white"> {{ __('layout.auth.register') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
