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

            return redirect()->route('admin.dashboard');
        }

     
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
        return redirect('/');
    }

    public function username()
    {
        return 'username';
    }
}
