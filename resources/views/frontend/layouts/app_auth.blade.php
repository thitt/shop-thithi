<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ __('layout.name_project') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @yield('css')
</head>
<body>
    @include('frontend.layouts.notification')
    @yield('content')

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
{{--    <script src="{{ asset('js/popper.min.js') }}"></script>--}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--    <script src="{{ asset('js/main.js') }}"></script>--}}
    <script src="{{ asset('js/common.js') }}"></script>
    @yield('script')
</body>
</html>
