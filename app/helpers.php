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
