<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="py-2">
                        <a href="{{ route(ROUTE_HOME_INDEX) }}">
                            <img class="h-70px" src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route(ROUTE_HOME_INDEX) }}">Home</a></li>
                        <li><a href="#">Women’s</a></li>
                        <li><a href="#">Men’s</a></li>
                        <li><a href="{{ route(ROUTE_PRODUCT_INDEX) }}">Shop</a></li>
{{--                        <li><a href="#">Pages</a>--}}
{{--                            <ul class="dropdown">--}}
{{--                                <li><a href="./product-details.html">Product Details</a></li>--}}
{{--                                <li><a href="./shop-cart.html">Shop Cart</a></li>--}}
{{--                                <li><a href="./checkout.html">Checkout</a></li>--}}
{{--                                <li><a href="./blog-details.html">Blog Details</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <li><a href="{{ route(ROUTE_BLOG_INDEX) }}">Blog</a></li>
                        <li><a href="{{ route(ROUTE_CONTACT_INDEX) }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        <a href="{{ route(ROUTE_LOGIN) }}">Login</a>
                        <a href="{{ route(ROUTE_REGISTER) }}">Register</a>
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
{{--                        <li><a href=""><span class="icon_heart_alt"></span>--}}
{{--                                <div class="tip">0</div>--}}
{{--                            </a></li>--}}
                        <li><a href="{{ route(ROUTE_CART_INDEX) }}"><span class="icon_bag_alt"></span>
                                <div class="tip">0</div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
