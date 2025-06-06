@extends('layouts.profil_layout')

@section('title', 'Profil | Speedzone')

@section('content')
@include('components.navbar_profil')   

<main class="max-w-4xl mx-auto py-10 px-6">
    <!-- Foto Profil & Nama -->
    <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col md:flex-row items-center gap-6">
        <!-- Foto Profil -->
        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-yellow-400">
            <img src="{{ asset('storage/' . ($user->foto ?? 'default.jpg')) }}" alt="Foto Profil" class="w-full h-full object-cover">
        </div>

        <!-- Info Profil -->
        <div class="text-center md:text-left">
            <h2 class="text-3xl font-semibold text-black">{{ $user->nama }}</h2>
        </div>
    </div>

    <!-- Info Pribadi -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-4 text-black">Kontak</h3>
            <ul class="space-y-2 text-gray-800">
                <li><strong>Email:</strong> {{ $user->email }}</li>
                <li><strong>Telepon:</strong> {{ $user->telepon ?? '-' }}</li>
                <li><strong>Alamat:</strong> {{ $user->alamat ?? '-' }}</li>
            </ul>
        </div>
    </div>

    <!-- Pengaturan Akun -->
    <div class="mt-8 bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-xl font-semibold mb-4 text-black">Pengaturan Akun</h3>
        <div class="flex flex-col md:flex-row gap-4">
            <a href="{{ route('profil.edit') }}" class="w-full text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded font-semibold">
                Edit Profil
            </a>
            <a href="{{ route('password.request') }}" class="w-full text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded font-semibold">
                Ubah Kata Sandi
            </a>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded font-semibold">
                    Logout
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
@include('components.footer')  