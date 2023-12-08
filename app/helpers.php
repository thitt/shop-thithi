<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if (!function_exists('checkUserLogin')) {
    function checkUserLogin(): bool
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }
}

if (!function_exists('getDataUserLogin')) {
    function getDataUserLogin()
    {
        return Auth::user();
    }
}

if (!function_exists('checkRouteActive')) {
    function checkRouteActive($routeName): string
    {
        $routeCurrent = Route::currentRouteName();
        if ($routeCurrent == $routeName) {
            return 'active';
        }

        return '';
    }
}

if (!function_exists('checkRouteActiveParent')) {
    function checkRouteActiveParent($routeNameChild): string
    {
        $routeCurrent = Route::currentRouteName();
        if (in_array($routeCurrent, $routeNameChild)) {
            return 'active open';
        }

        return '';
    }
}

if (!function_exists('randomPassword')) {
    function randomPassword($length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return bcrypt($randomString);
    }
}

if (!function_exists('convertImageUrlBase64')) {
    function convertImageUrlBase64($url): string
    {
        $image = file_get_contents($url);
        if ($image !== false){
            return 'data:image/jpg;base64,'.base64_encode($image);
        }

        return '';
    }
}

if (!function_exists('iconSortListAdmin')) {
    function iconSortListAdmin($sort, $key, $value)
    {
        if ($key == $value) {
            if ($sort == 'desc') {
                return 'bx-sort-down desc';
            }
            return 'bx-sort-up asc';
        }
        return 'bx-sort';
    }
}

if (!function_exists('convertBase64ToFileImage')) {
    function convertBase64ToFileImage($file): ?string
    {
        if ($file) {
            return base64_encode(file_get_contents($file));
        }

        return null;
    }
}

if (!function_exists('getNameCategory')) {
    function getNameCategory($category)
    {
        $parent = '';
        if ($category->parent) {
            $parent = ' (' . $category->parent->name . ')';
        }

        return $category->name . $parent;
    }
}

if (!function_exists('getImageBase64')) {
    function getImageBase64($image)
    {
        if ($image) {
            return 'data:image/png;base64, ' . $image;
        }

        return asset('img/product/default.png');
    }
}
