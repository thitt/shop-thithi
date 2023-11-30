<!DOCTYPE html>
<html lang="vn" class="light-style customizer-hide">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ __('layout.name_project') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/admin_favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/backend/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('css/backend/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/backend/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend/loading.css') }}" />
    @yield('css')
</head>

<body>
    @include('backend.layouts.loading')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('backend.layouts.sidebar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    @include('backend.layouts.notification')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/backend/common.js') }}"></script>
    <script src="{{ asset('js/backend/helpers.js') }}"></script>
    <script src="{{ asset('js/backend/config.js') }}"></script>
    <script src="{{ asset('js/backend/main.js') }}" type="module"></script>
    <script src="{{ asset('vendor/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/backend/dashboards-analytics.js') }}"></script>
    @yield('script')
</body>
</html>
