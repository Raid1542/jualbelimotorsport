<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
   public function index()
   {
       // Dummy data user (belum pakai login)
       $user = (object)[
           'nama' => 'Frima Rizky',
           'email' => 'frima@example.com',
           'telepon' => '081234567890',
           'alamat' => 'Jl. Informatika No. 10',
           'foto' => null, // Atau 'default.jpg' jika sudah ada di storage
       ];

       return view('pages.profil', compact('user'));
   }

   // Menampilkan form edit profil
   public function edit()
   {
       // Dummy data user untuk edit (bisa ambil data user asli jika sudah login)
       $user = (object)[
           'nama' => 'Frima Rizky',
           'email' => 'frima@example.com',
           'telepon' => '081234567890',
           'alamat' => 'Jl. Informatika No. 10',
           'foto' => null,
       ];

       return view('pages.edit_profil', compact('user'));
   }

   // Proses update profil (POST)
   public function update(Request $request)
   {
       $request->validate([
           'nama' => 'required|string|max:255',
           'email' => 'required|email',
           'telepon' => 'nullable|string|max:20',
           'alamat' => 'nullable|string|max:255',
           'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
       ]);

       // Simulasi upload file (tidak disimpan benar-benar)
       if ($request->hasFile('foto')) {
           $fotoName = $request->file('foto')->getClientOriginalName();
       } else {
           $fotoName = null;
       }

       // Simpan data ke session (bukan ke database)
       $profilBaru = [
           'nama' => $request->nama,
           'email' => $request->email,
           'telepon' => $request->telepon,
           'alamat' => $request->alamat,
           'foto' => $fotoName
       ];

       return redirect()->back()->with('success', 'Profil berhasil disimpan sementara. (belum terhubung ke user)')->with('profil', $profilBaru);
   }

   // Menampilkan form ubah password
   public function editPassword()
   {
       return view('pages.edit_password');
   }

   // Proses update password
   public function updatePassword(Request $request)
   {
       $request->validate([
           'current_password' => ['required'],
           'new_password' => ['required', 'min:8'],
           'new_password_confirmation' => ['same:new_password'],
       ]);

       // Dummy check password karena belum pakai autentikasi asli
       // Kalau sudah ada login, ganti dengan user dari Auth
       $user = (object)[
           'password' => bcrypt('passwordlama') // contoh hash password lama
       ];

       // Cek password lama - ganti dengan Hash::check jika pakai user asli
       if (!Hash::check($request->current_password, $user->password)) {
           return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
       }

       // Simulasi update password (belum tersambung ke database)
       // Jika pakai user asli: 
       // Auth::user()->update(['password' => Hash::make($request->new_password)]);

       return redirect()->route('profil')->with('success', 'Password berhasil diubah (simulasi).');
   }
}
