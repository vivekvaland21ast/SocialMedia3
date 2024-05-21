<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginUserController extends Controller
{
    public function loginShow()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Session::regenerate();
            return redirect()->intended('/home');
        }

        return redirect('/login')->withErrors(['error' => 'Invalid credentials. Please try again.']);;
    }

    public function logout()
    {
        Auth::logout();
        // request()->session()->invalidate();
        // request()->session()->regenerateToken();
        return redirect('/');
    }

}
