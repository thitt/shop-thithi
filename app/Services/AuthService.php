<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

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

    public function facebookCallback()
    {
        try {
            $socialiteProfile = Socialite::driver('facebook')->stateless()->user();
            $user = $this->userRepository->findEmail($socialiteProfile->email);
            $first_name = explode(" ", $socialiteProfile->name)[1] ?? null;
            $last_name = explode(" ", $socialiteProfile->name)[0] ?? null;
            $data = [
                'first_name' => optional($user)->first_name ?? $first_name,
                'last_name' => optional($user)->last_name ?? $last_name,
                'role' => ROLE_USER['user'],
                'password' => randomPassword(LENGTH_PASSWORD),
                'email' => $socialiteProfile->email,
                'facebook_id' => $socialiteProfile->id,
            ];
            $user = $this->userRepository->updateOrCreate(['email' => $socialiteProfile->email], $data);
            Auth::login($user, true);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function googleCallback()
    {
        try {
            $socialiteProfile = Socialite::driver('google')->user();
            $user = $this->userRepository->findEmail($socialiteProfile->email);
            $data = [
                'first_name' => optional($user)->first_name ?? $socialiteProfile->user['family_name'],
                'last_name' => optional($user)->last_name ?? $socialiteProfile->user['given_name'],
                'role' => ROLE_USER['user'],
                'password' => randomPassword(LENGTH_PASSWORD),
                'email' => $socialiteProfile->email,
                'avatar' => optional($user)->avatar ?? convertImageUrlBase64($socialiteProfile->avatar),
                'social_id' => $socialiteProfile->id,
            ];
            $user = $this->userRepository->updateOrCreate(['email' => $socialiteProfile->email], $data);
            Auth::login($user, true);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
