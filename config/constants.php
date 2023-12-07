<?php

//Route name
if (!defined('ROUTE_LOGIN')) {
    define('ROUTE_LOGIN', 'auth.login');
}
if (!defined('ROUTE_CHECK_LOGIN')) {
    define('ROUTE_CHECK_LOGIN', 'auth.user.login');
}
if (!defined('ROUTE_LOGIN_FACEBOOK')) {
    define('ROUTE_LOGIN_FACEBOOK', 'login.facebook');
}
if (!defined('ROUTE_LOGIN_GOOGLE')) {
    define('ROUTE_LOGIN_GOOGLE', 'login.google');
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
//Route admin
if (!defined('ROUTE_ADMIN_LOGIN')) {
    define('ROUTE_ADMIN_LOGIN', 'auth.admin.login');
}
if (!defined('ROUTE_ADMIN_CHECK_LOGIN')) {
    define('ROUTE_ADMIN_CHECK_LOGIN', 'auth.admin.check.login');
}
if (!defined('ROUTE_ADMIN_LOGOUT')) {
    define('ROUTE_ADMIN_LOGOUT', 'auth.admin.logout');
}
if (!defined('ROUTE_ADMIN_HOME_INDEX')) {
    define('ROUTE_ADMIN_HOME_INDEX', 'admin.home.index');
}
if (!defined('ROUTE_ADMIN_CATEGORY_LIST')) {
    define('ROUTE_ADMIN_CATEGORY_LIST', 'admin.category.index');
}
if (!defined('ROUTE_ADMIN_CATEGORY_CREATE')) {
    define('ROUTE_ADMIN_CATEGORY_CREATE', 'admin.category.create');
}
if (!defined('ROUTE_ADMIN_CATEGORY_STORE')) {
    define('ROUTE_ADMIN_CATEGORY_STORE', 'admin.category.store');
}
if (!defined('ROUTE_ADMIN_CATEGORY_EDIT')) {
    define('ROUTE_ADMIN_CATEGORY_EDIT', 'admin.category.edit');
}
if (!defined('ROUTE_ADMIN_CATEGORY_UPDATE')) {
    define('ROUTE_ADMIN_CATEGORY_UPDATE', 'admin.category.update');
}
if (!defined('ROUTE_ADMIN_CATEGORY_DELETE')) {
    define('ROUTE_ADMIN_CATEGORY_DELETE', 'admin.category.delete');
}
if (!defined('ROUTE_ADMIN_PRODUCT_LIST')) {
    define('ROUTE_ADMIN_PRODUCT_LIST', 'admin.product.index');
}
if (!defined('ROUTE_ADMIN_PRODUCT_CREATE')) {
    define('ROUTE_ADMIN_PRODUCT_CREATE', 'admin.product.create');
}
if (!defined('ROUTE_ADMIN_PRODUCT_STORE')) {
    define('ROUTE_ADMIN_PRODUCT_STORE', 'admin.product.store');
}
if (!defined('ROUTE_ADMIN_PRODUCT_EDIT')) {
    define('ROUTE_ADMIN_PRODUCT_EDIT', 'admin.product.edit');
}
if (!defined('ROUTE_ADMIN_PRODUCT_UPDATE')) {
    define('ROUTE_ADMIN_PRODUCT_UPDATE', 'admin.product.update');
}
if (!defined('ROUTE_ADMIN_PRODUCT_DELETE')) {
    define('ROUTE_ADMIN_PRODUCT_DELETE', 'admin.product.delete');
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
//View admin
if (!defined('VIEW_ADMIN_LOGIN')) {
    define('VIEW_ADMIN_LOGIN', 'backend.pages.auth.login');
}
if (!defined('VIEW_ADMIN_HOME')) {
    define('VIEW_ADMIN_HOME', 'backend.pages.home.index');
}
if (!defined('VIEW_ADMIN_CATEGORY_LIST')) {
    define('VIEW_ADMIN_CATEGORY_LIST', 'backend.pages.category.index');
}
if (!defined('VIEW_ADMIN_CATEGORY_CREATE')) {
    define('VIEW_ADMIN_CATEGORY_CREATE', 'backend.pages.category.create');
}
if (!defined('VIEW_ADMIN_CATEGORY_EDIT')) {
    define('VIEW_ADMIN_CATEGORY_EDIT', 'backend.pages.category.edit');
}
if (!defined('VIEW_ADMIN_PRODUCT_LIST')) {
    define('VIEW_ADMIN_PRODUCT_LIST', 'backend.pages.product.index');
}
if (!defined('VIEW_ADMIN_PRODUCT_CREATE')) {
    define('VIEW_ADMIN_PRODUCT_CREATE', 'backend.pages.product.create');
}
if (!defined('VIEW_ADMIN_PRODUCT_EDIT')) {
    define('VIEW_ADMIN_PRODUCT_EDIT', 'backend.pages.product.edit');
}

//Constant
if (!defined('ROLE_USER')) {
    define('ROLE_USER', [
        'user' => 0,
        'admin' => 1,
        'super_admin' => 2,
    ]);
}
if (!defined('LENGTH_PASSWORD')) {
    define('LENGTH_PASSWORD', 8);
}
if (!defined('MAX_RECORD')) {
    define('MAX_RECORD', 20);
}
if (!defined('NUMBER_RECORD')) {
    define('NUMBER_RECORD', [
        20, 50, 100
    ]);
}
if (!defined('IS_PARENT_CATEGORY')) {
    define('IS_PARENT_CATEGORY', 0);
}
if (!defined('IS_CHILD_CATEGORY')) {
    define('IS_CHILD_CATEGORY', 1);
}
if (!defined('ROLE_IMAGE')) {
    define('ROLE_IMAGE', [
        'image_base' => 0,
        'image_small' => 1,
        'image_thumbnail' => 2,
        'image_swatch' => 3,
    ]);
}
