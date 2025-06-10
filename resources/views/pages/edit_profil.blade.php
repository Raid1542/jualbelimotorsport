@extends('layouts.edit_profil_layout')

@section('title', 'Edit Profil | Speedzone')

@section('content')
@include('components.navbar_edit_profil')

<main class="max-w-2xl mx-auto py-10 px-6 bg-white rounded-lg shadow-lg mt-8">
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="name" class="block text-m font-medium text-black">Nama Lengkap</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name ?? '') }}"
                class="mt-1 block w-full bg-white text-black rounded-md border border-gray-300 focus:border-yellow-500 focus:outline-none transition duration-150 ease-in-out"
                required
            >
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Username -->
        <div>
            <label for="username" class="block text-m font-medium text-black">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username', $user->username ?? '') }}"
                class="mt-1 block w-full bg-white text-black rounded-md border border-gray-300 focus:border-yellow-500 focus:outline-none transition duration-150 ease-in-out"
                required
            >
            @error('username')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email (readonly) -->
        <div>
            <label for="email" class="block text-m font-medium text-black">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email ?? '') }}"
                class="mt-1 block w-full bg-gray-100 text-black rounded-md border border-gray-300"
                readonly
            >
        </div>

        <!-- Telepon -->
        <div>
            <label for="telepon" class="block text-m font-medium text-black">Telepon</label>
            <input
                type="text"
                id="telepon"
                name="telepon"
                value="{{ old('telepon', $user->telepon ?? '') }}"
                class="mt-1 block w-full bg-white text-black rounded-md border border-gray-300 focus:border-yellow-500 focus:outline-none transition duration-150 ease-in-out"
            >
            @error('telepon')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-m font-medium text-black">Alamat</label>
            <textarea
                id="alamat"
                name="alamat"
                rows="3"
                class="mt-1 block w-full bg-white text-black rounded-md border border-gray-300 focus:border-yellow-500 focus:outline-none transition duration-150 ease-in-out"
            >{{ old('alamat', $user->alamat ?? '') }}</textarea>
            @error('alamat')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Upload Foto Profil -->
        <div>
            <label for="foto" class="block text-m font-medium text-black">Foto Profil</label>
            <input
                type="file"
                id="foto"
                name="foto"
                class="mt-1 block w-full text-sm text-black file:bg-yellow-500 file:text-white file:font-semibold file:px-4 file:py-2 file:rounded file:border-0"
            >
            @error('foto')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if(!empty($user->foto))
                <p class="mt-2 text-sm text-gray-600">Foto saat ini: {{ $user->foto }}</p>
                <img src="{{ asset('images/' . $user->foto) }}" alt="Foto Profil" class="mt-2 w-24 h-24 rounded-full object-cover">
            @endif
        </div>

        <!-- Tombol Simpan dan Batal -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('profil') }}" class="bg-red-600 hover:bg-red-400 hover:text-white text-white font-semibold py-2 px-6 rounded transition">
                Batal
            </a>
            <button type="submit" class="bg-green-600 hover:bg-green-400 text-white font-semibold py-2 px-6 rounded transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</main>
@endsection
