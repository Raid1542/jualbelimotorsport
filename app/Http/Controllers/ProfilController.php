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


    session()->forget('popup_success');

    return view('pages.profil', compact('user'));
}

    public function edit()
    {
        $user = Auth::user();
        return view('pages.edit_profil', compact('user'));
    }

public function update(Request $request)
{
    $user = auth()->user();


    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'telepon' => 'nullable|string|max:20',
        'alamat' => 'nullable|string',
        'foto' => 'nullable|image|max:2048',
    ]);

   
    $dataBerubah = false;

    foreach (['name', 'username', 'telepon', 'alamat'] as $field) {
        if ($request->$field !== $user->$field) {
            $dataBerubah = true;
            break;
        }
    }

    if ($request->hasFile('foto')) {
        $dataBerubah = true;
        $fotoBaru = $request->file('foto');
        $namaFoto = time() . '.' . $fotoBaru->getClientOriginalExtension();
        $fotoBaru->move(public_path('images'), $namaFoto);
        $validated['foto'] = $namaFoto;
    } else {
        unset($validated['foto']); 
    }

    
    if (!$dataBerubah) {
        return redirect()->route('profil.edit'); 
    }

    
    $user->update($validated);

    return redirect()->route('profil.edit')->with('success', 'Profil berhasil diperbarui!');
}



    public function editPassword()
    {
        return view('pages.edit_password');  
    }

    
    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = auth()->user();

    
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah']);
    }

    
    if (Hash::check($request->new_password, $user->password)) {
        return back()->withErrors(['new_password' => 'Password baru tidak boleh sama dengan password lama']);
    }

   
    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    return redirect()->route('profil.edit_password')->with('status', 'Password berhasil diubah!');
}
}