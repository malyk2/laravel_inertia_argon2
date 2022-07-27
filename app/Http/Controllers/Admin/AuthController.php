<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Auth\Login as LoginRequest;
use App\Http\Requests\Admin\Auth\Register as RegisterRequest;
use App\Models\User;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
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

    public function registerForm(Request $request)
    {
        return inertia('Admin/Auth/Register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);

        return redirect()->route('examples.dashboard');
    }
}
