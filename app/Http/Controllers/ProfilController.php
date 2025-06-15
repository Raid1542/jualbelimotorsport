<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('pages.profil', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pages.edit_profil', compact('user'));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'telepon' => 'nullable|string|max:20',
        'alamat' => 'nullable|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
    ]);

    $user->name = $request->name;
    $user->username = $request->username;
    $user->telepon = $request->telepon;
    $user->alamat = $request->alamat;

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $user->foto = $filename;
    }

    $user->save();

   return redirect()->route('profil')->with('success', 'Data berhasil disimpan!');

}


    // Tambahan method untuk edit password
    public function editPassword()
    {
        return view('pages.edit_password');  // pastikan file view ini ada
    }

    // Method untuk proses update password
    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    if (!Hash::check($request->current_password, auth()->user()->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah']);
    }

    auth()->user()->update([
        'password' => Hash::make($request->new_password),
    ]);

    return redirect()->route('profil')->with('status', 'Password berhasil diubah');
}
}