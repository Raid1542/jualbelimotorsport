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
    $credentials = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required', 'string'],
        'role'     => ['required', 'string'],
    ]);

    // ✅ Penjual hardcoded (username: admin, password: admin123)
    if (
        $credentials['role'] === 'penjual' &&
        $credentials['username'] === 'admin' &&
        $credentials['password'] === 'admin123'
    ) {
        session([
            'username' => 'admin',
            'role' => 'penjual',
            'show_welcome' => true,
        ]);

        return redirect()->route('admin.dashboard'); // 👈 redirect ke halaman admin
    }

    // ✅ Login untuk pembeli (via database)
    if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
        $request->session()->regenerate();
        $user = Auth::user();

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

        return redirect()->route('dashboard'); // 👈 ke pages.dashboard untuk pembeli
    }

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
