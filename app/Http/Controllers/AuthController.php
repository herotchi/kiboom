<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.show-login');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('login_id', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('top');
        }

        return back()->withErrors([
            'login_id' => 'ログイン情報が間違っています。'
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show_login')->with('msg_success', 'ログアウトしました。');
    }
}
