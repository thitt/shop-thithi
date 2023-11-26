<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class AuthService.
 */
class AuthService
{
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }
    public function register($data)
    {
        $users = $this->userRepository->registerUser($data);

        if ($users) {
            Session::flash('success', __('message.auth.register_success'));
            return ROUTE_LOGIN;
        } else {
            Session::flash('error', __('message.auth.register_error'));
            return ROUTE_REGISTER;
        }
    }

    public function login($request)
    {
        if (!Auth::check()) {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            $rememberMe = $request->input('remember_me') ? true : false;
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, $rememberMe) 
            || Auth::attempt(['user_name' => $request->input('email'), 'password' => $request->input('password')], $rememberMe)) {
                return ROUTE_HOME_INDEX;
            }

            Session::flash('error', __('message.auth.login_error'));
            return ROUTE_LOGIN;
        }

        return ROUTE_HOME_INDEX;
    }

    public function logout()
    {
        Auth::logout();
    }
}
