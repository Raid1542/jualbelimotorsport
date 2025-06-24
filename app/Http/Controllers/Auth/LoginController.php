<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Coba login pakai username dan password
        if (Auth::attempt($credentials)) {
    $request->session()->regenerate(); // regenerasi session agar aman
    session(['show_welcome' => true]); // ✅ SET session
    return redirect()->intended(route('dashboard')); // redirect ke dashboard
}


        // Gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Tambahan untuk pakai kolom username saat login (bukan email)
    public function username()
    {
        return 'username';
    }
}
