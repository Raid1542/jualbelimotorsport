@extends('layouts.edit_profil_layout')

@section('title', 'Edit Profil | Speedzone')

@section('content')
@include('components.navbar_edit_profil')

<main class="max-w-2xl mx-auto py-10 px-6 bg-white rounded-lg shadow-lg mt-8">
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name ?? '') }}"
                placeholder="Masukkan nama lengkap"
                class="w-full bg-white text-gray-900 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 transition-all duration-200"
                required
            >
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Username -->
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username', $user->username ?? '') }}"
                placeholder="Masukkan username"
                class="w-full bg-white text-gray-900 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 transition-all duration-200"
                required
            >
            @error('username')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

       <!-- Email (readonly) -->
<div>
    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
    <input
        type="email"
        id="email"
        name="email"
        value="{{ old('email', $user->email ?? '') }}"
        class="w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md px-4 py-2 cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 transition-all duration-200"
        readonly
    >
</div>



        <!-- Telepon -->
        <div>
            <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
            <input
                type="text"
                id="telepon"
                name="telepon"
                value="{{ old('telepon', $user->telepon ?? '') }}"
                placeholder="Nomor telepon aktif"
                class="w-full bg-white text-gray-900 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 transition-all duration-200"
            >
            @error('telepon')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <textarea
                id="alamat"
                name="alamat"
                rows="3"
                placeholder="Alamat lengkap..."
                class="w-full bg-white text-gray-900 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 transition-all duration-200"
            >{{ old('alamat', $user->alamat ?? '') }}</textarea>
            @error('alamat')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Upload Foto Profil -->
        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
            <input
                type="file"
                id="foto"
                name="foto"
                class="block w-full text-sm text-gray-700 file:bg-yellow-500 file:text-white file:font-semibold file:px-4 file:py-2 file:rounded file:border-0 transition-all"
            >
            @error('foto')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if(!empty($user->foto))
                <p class="mt-2 text-sm text-gray-600">Foto saat ini:</p>
                <img src="{{ asset('images/' . $user->foto) }}" alt="Foto Profil" class="mt-2 w-24 h-24 rounded-full object-cover">
            @endif
        </div>

        <!-- Tombol Simpan dan Batal -->
        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('profil') }}" class="bg-red-600 hover:bg-red-500 text-white font-semibold py-2 px-6 rounded transition">
                Batal
            </a>
            <button type="submit" class="bg-green-600 hover:bg-green-500 text-white font-semibold py-2 px-6 rounded transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</main>

@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: @json(session('success')),
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif
@endsection
