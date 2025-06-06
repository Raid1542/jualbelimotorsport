@extends('layouts.profil_layout')

@section('title', 'Profil | Speedzone')

@section('content')
@include('components.navbar_profil')   
    <!-- Konten Profil -->
    <main class="max-w-4xl mx-auto py-10 px-6">
        <!-- Foto Profil & Nama -->
        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col md:flex-row items-center gap-6">
            <!-- Foto Profil -->
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-yellow-400">
                <img src="images/lia.jpg" alt="Foto Profil" class="w-full h-full object-cover">
            </div>

            <!-- Info Profil -->
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-semibold text-black">Frima Rizky Lianda</h2>
            </div>
        </div>

        <!-- Info Pribadi -->
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Detail Kontak -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4 text-black">Kontak</h3>
                <ul class="space-y-2 text-gray-800">
                    <li><strong>Email:</strong> Liaa@email.com</li>
                    <li><strong>Telepon:</strong> +62 123 456 7890</li>
                    <li><strong>Alamat:</strong> Jl. Contoh Alamat No. 123, Jakarta</li>
                </ul>
            </div>
        </div>

        <!-- Pengaturan Akun -->
        <div class="mt-8 bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-4 text-black">Pengaturan Akun</h3>
            <div class="flex flex-col md:flex-row gap-4">
                <a href="edit_profil" class="w-full text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded font-semibold">
                    Edit Profil
                </a>
                <a href="/reset_password" class="w-full text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded font-semibold">
                    Ubah Kata Sandi
                </a>
                <a href="/login" class="w-full text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded font-semibold">
                    Logout
                </a>
            </div>
        </div>
    </main>
@endsection