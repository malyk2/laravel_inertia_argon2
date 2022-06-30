<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Auth\Login as LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function loginForm(Request $request)
    {
        return inertia('Admin/Auth/Login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (auth()->attempt(
            Arr::only($data, ['email', 'password']),
            Arr::get($data, 'remember_me')
        )) {
            return redirect()->intended('/admin/example/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
