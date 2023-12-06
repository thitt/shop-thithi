<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route(ROUTE_ADMIN_HOME_INDEX) }}" class="app-brand-link">
            <img src="{{ asset('img/admin_favicon.ico') }}" alt="" class="w-25">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ __('layout.name_project') }}</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ checkRouteActive(ROUTE_ADMIN_HOME_INDEX) }}">
            <a href="{{ route(ROUTE_ADMIN_HOME_INDEX) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{ __('layout.home.title') }}</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">User</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Without menu">List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Without navbar">Create</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ __('layout.product.title') }}</span>
        </li>
        <li class="menu-item {{ checkRouteActiveParent([ROUTE_ADMIN_CATEGORY_LIST, ROUTE_ADMIN_CATEGORY_CREATE, ROUTE_ADMIN_CATEGORY_EDIT]) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-category"></i>
                <div data-i18n="Authentications">{{ __('layout.category.title') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ checkRouteActive(ROUTE_ADMIN_CATEGORY_LIST) }}">
                    <a href="{{ route(ROUTE_ADMIN_CATEGORY_LIST) }}" class="menu-link">
                        <div data-i18n="Basic">{{ __('layout.list') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ checkRouteActive(ROUTE_ADMIN_CATEGORY_CREATE) }}">
                    <a href="{{ route(ROUTE_ADMIN_CATEGORY_CREATE) }}" class="menu-link">
                        <div data-i18n="Basic">{{ __('layout.create') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ checkRouteActiveParent([ROUTE_ADMIN_PRODUCT_LIST, ROUTE_ADMIN_PRODUCT_CREATE]) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
                <div data-i18n="Account Settings">{{ __('layout.product.title') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ checkRouteActive(ROUTE_ADMIN_PRODUCT_LIST) }}">
                    <a href="{{ route(ROUTE_ADMIN_PRODUCT_LIST) }}" class="menu-link">
                        <div data-i18n="Account">{{ __('layout.list') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ checkRouteActive(ROUTE_ADMIN_PRODUCT_CREATE) }}">
                    <a href="{{ route(ROUTE_ADMIN_PRODUCT_CREATE) }}" class="menu-link">
                        <div data-i18n="Notifications">{{ __('layout.create') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Blog</span></li>
        <!-- User interface -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Blog</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Accordion">List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Alerts">Create</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Setting</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Admin</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Basic Inputs">List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Input groups">Create</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <div class="menu-link cursor-pointer" data-toggle="modal" data-target="#modal-logout">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div>Logout</div>
            </div>
        </li>
    </ul>
</aside>
<!-- / Menu -->
