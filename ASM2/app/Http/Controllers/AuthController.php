<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return to_route($this->defaultRouteName((int) Auth::user()->role));
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route($this->defaultRouteName((int) Auth::user()->role)))
                ->with('success', 'Đăng nhập thành công.');
        }

        return back()->withInput()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.product.index')->with('success', 'Đăng xuất thành công.');
    }

    protected function defaultRouteName(int $role): string
    {
        return $role === 1 ? 'products.index' : 'client.product.index';
    }
}
