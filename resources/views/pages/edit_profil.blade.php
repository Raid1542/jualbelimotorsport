@extends('layouts.edit_profil_layout')

@section('title', 'Edit Profil | Speedzone')

@section('content')
@include('components.navbar_edit_profil')

<main class="max-w-2xl mx-auto py-10 px-6 bg-white rounded-lg shadow-lg mt-8">
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Nama -->
        <div>
            <label for="nama" class="block text-m font-medium text-black">Nama Lengkap</label>
            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ old('nama', $user->nama ?? '') }}"
                class="mt-1 block w-full bg-white text-black rounded-md shadow-sm border-2 border-yellow-200 focus:border-yellow-600 focus:ring-yellow-400"
            >
            @error('nama')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-m font-medium text-black">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email ?? '') }}"
                class="mt-1 block w-full bg-white text-black rounded-md shadow-sm border-2 border-yellow-200 focus:border-yellow-600 focus:ring-yellow-400"
            >
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Telepon -->
        <div>
            <label for="telepon" class="block text-m font-medium text-black">Telepon</label>
            <input
                type="text"
                id="telepon"
                name="telepon"
                value="{{ old('telepon', $user->telepon ?? '') }}"
                class="mt-1 block w-full bg-white text-black rounded-md shadow-sm border-2 border-yellow-200 focus:border-yellow-600 focus:ring-yellow-400"
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
                class="mt-1 block w-full bg-white text-black rounded-md shadow-sm border-2 border-yellow-200 focus:border-yellow-600 focus:ring-yellow-400"
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
                {{-- Kalau kamu sudah upload dan simpan di storage, bisa tampilkan gambar dengan: --}}
                {{-- <img src="{{ asset('storage/foto_profil/' . $user->foto) }}" alt="Foto Profil" class="mt-2 w-24 h-24 rounded-full object-cover"> --}}
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
