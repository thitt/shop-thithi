<?php

//Route name
if (!defined('ROUTE_LOGIN')) {
    define('ROUTE_LOGIN', 'auth.login');
}
if (!defined('ROUTE_CHECK_LOGIN')) {
    define('ROUTE_CHECK_LOGIN', 'auth.user.login');
}
if (!defined('ROUTE_LOGOUT')) {
    define('ROUTE_LOGOUT', 'auth.logout');
}
if (!defined('ROUTE_REGISTER')) {
    define('ROUTE_REGISTER', 'auth.register');
}
if (!defined('ROUTE_REGISTER_STORE')) {
    define('ROUTE_REGISTER_STORE', 'auth.user.store');
}
if (!defined('ROUTE_HOME_INDEX')) {
    define('ROUTE_HOME_INDEX', 'home.index');
}
if (!defined('ROUTE_PRODUCT_INDEX')) {
    define('ROUTE_PRODUCT_INDEX', 'product.index');
}
if (!defined('ROUTE_PRODUCT_DETAIL')) {
    define('ROUTE_PRODUCT_DETAIL', 'product.detail');
}
if (!defined('ROUTE_CART_INDEX')) {
    define('ROUTE_CART_INDEX', 'cart.index');
}
if (!defined('ROUTE_CHECKOUT_INDEX')) {
    define('ROUTE_CHECKOUT_INDEX', 'checkout.index');
}
if (!defined('ROUTE_BLOG_INDEX')) {
    define('ROUTE_BLOG_INDEX', 'blog.index');
}
if (!defined('ROUTE_BLOG_DETAIL')) {
    define('ROUTE_BLOG_DETAIL', 'blog.detail');
}
if (!defined('ROUTE_CONTACT_INDEX')) {
    define('ROUTE_CONTACT_INDEX', 'contact.index');
}

//View
if (!defined('VIEW_LOGIN')) {
    define('VIEW_LOGIN', 'frontend.pages.auth.login');
}
if (!defined('VIEW_REGISTER')) {
    define('VIEW_REGISTER', 'frontend.pages.auth.register');
}
if (!defined('VIEW_HOME')) {
    define('VIEW_HOME', 'frontend.pages.home.index');
}
if (!defined('VIEW_PRODUCT_LIST')) {
    define('VIEW_PRODUCT_LIST', 'frontend.pages.product.index');
}
if (!defined('VIEW_PRODUCT_DETAIL')) {
    define('VIEW_PRODUCT_DETAIL', 'frontend.pages.product.detail');
}
if (!defined('VIEW_CART_LIST')) {
    define('VIEW_CART_LIST', 'frontend.pages.cart.index');
}
if (!defined('VIEW_CHECKOUT')) {
    define('VIEW_CHECKOUT', 'frontend.pages.checkout.index');
}
if (!defined('VIEW_BLOG_LIST')) {
    define('VIEW_BLOG_LIST', 'frontend.pages.blog.index');
}
if (!defined('VIEW_BLOG_DETAIL')) {
    define('VIEW_BLOG_DETAIL', 'frontend.pages.blog.detail');
}
if (!defined('VIEW_CONTACT')) {
    define('VIEW_CONTACT', 'frontend.pages.contact.index');
}

//Constant
if (!defined('ROLE_USER')) {
    define('ROLE_USER', [
        'user' => 0,
        'admin' => 1,
        'super_admin' => 2,
    ]);
}
