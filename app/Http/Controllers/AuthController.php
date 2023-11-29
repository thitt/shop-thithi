<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(
        AuthService $authService
    ) {
        $this->authService = $authService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return view(VIEW_LOGIN);
        }

        return redirect()->route(ROUTE_HOME_INDEX);
    }

    /**
     * Login user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $route = $this->authService->login($request);
        return redirect()->route($route)->withInput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(VIEW_REGISTER);
    }

    /**
     * Store a user.
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        $routeView = $this->authService->register($request->all());
        return redirect()->route($routeView)->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Logout user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->authService->logout();
        return redirect()->route(ROUTE_HOME_INDEX);
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        if ($this->authService->facebookCallback()) {
            return redirect()->route(ROUTE_HOME_INDEX);
        }

        Session::flash('error', __('message.auth.login_error'));
        return redirect()->route(ROUTE_LOGIN);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        if ($this->authService->googleCallback()) {
            return redirect()->route(ROUTE_HOME_INDEX);
        }

        Session::flash('error', __('message.auth.login_error'));
        return redirect()->route(ROUTE_LOGIN);
    }

    public function indexAdmin()
    {
        if (!Auth::guard('admin')->check()) {
            return view(VIEW_ADMIN_LOGIN);
        }

        return redirect()->route(ROUTE_ADMIN_HOME_INDEX);
    }

    public function loginAdmin(Request $request)
    {
        $route = $this->authService->loginAdmin($request);
        return redirect()->route($route)->withInput();
    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect()->route(ROUTE_ADMIN_LOGIN);
    }
}
