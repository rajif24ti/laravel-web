<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:4'
        ]);

        // Data credensial yang akan dicek oleh Auth::attempt
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        // Coba login
        if (Auth::attempt($credentials)) {
            // Regenerate session agar lebih aman (wajib)
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Berhasil login!');
        }

        // Jika gagal
        return back()
            ->withErrors(['login' => 'Email atau password salah.'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
