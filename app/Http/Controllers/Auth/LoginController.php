<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'role'     => ['required', 'string'],
        ]);

        // Coba login biasa
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Periksa apakah role cocok
            if ($user->role !== $credentials['role']) {
                Auth::logout();
                return back()->withErrors([
                    'username' => 'Role tidak sesuai dengan akun.',
                ])->onlyInput('username');
            }

            session([
                'role' => $user->role,
                'show_welcome' => true,
            ]);

            // Kalau role penjual, arahkan ke admin dashboard
            if ($user->role === 'penjual') {
                return redirect()->route('admin.dashboard');
            }

            // Role lain arahkan ke dashboard biasa
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function username()
    {
        return 'username';
    }
}
