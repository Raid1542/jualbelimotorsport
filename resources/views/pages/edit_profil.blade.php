@extends('layouts.edit_profil_layout')

@section('title', 'Edit Profil | Speedzone')

@section('content')
@include('components.navbar_edit_profil')

<main class="max-w-4xl mx-auto px-6 py-16">
    <div class="bg-white rounded-3xl shadow-xl p-10 space-y-10 border border-gray-100">

        <div class="text-center space-y-1">
            <h2 class="text-3xl font-bold text-gray-800">Edit Profil Anda</h2>
            <p class="text-gray-500 text-sm">Perbarui informasi akun agar tetap relevan & up-to-date</p>
        </div>

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-8">
            @csrf

            {{-- Nama --}}
            <div class="relative">
                <label for="name" class="text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required
                    class="mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-yellow-400 focus:border-yellow-500 block px-4 py-2 transition" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Username --}}
            <div class="relative">
                <label for="username" class="text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username ?? '') }}" required
                    class="mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-yellow-400 focus:border-yellow-500 block px-4 py-2 transition" />
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="relative col-span-2">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" readonly
                    class="mt-1 w-full bg-gray-100 border border-gray-200 text-gray-500 text-base rounded-lg px-4 py-2 cursor-not-allowed" />
            </div>

            {{-- Telepon --}}
            <div class="relative">
                <label for="telepon" class="text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $user->telepon ?? '') }}"
                    class="mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-yellow-400 focus:border-yellow-500 block px-4 py-2 transition" />
                @error('telepon')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Alamat --}}
            <div class="relative">
                <label for="alamat" class="text-sm font-medium text-gray-700">Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" rows="3"
                    class="mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-yellow-400 focus:border-yellow-500 block px-4 py-2 transition">{{ old('alamat', $user->alamat ?? '') }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Upload Foto --}}
            <div class="col-span-2">
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                <input type="file" name="foto" id="foto"
                    class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-white hover:file:bg-yellow-600 transition w-full" />
                @error('foto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                @if(!empty($user->foto))
                    <div class="mt-4 flex items-center gap-4">
                        <img src="{{ asset('images/' . $user->foto) }}" alt="Foto Profil"
                             class="w-20 h-20 rounded-full object-cover border border-gray-200 shadow-sm">
                        <span class="text-sm text-gray-500">Foto saat ini</span>
                    </div>
                @endif
            </div>

            {{-- Tombol --}}
            <div class="col-span-2 flex justify-end gap-4 pt-6">
                <a href="{{ route('profil') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-6 rounded-md transition">
                    Batal
                </a>
                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-md shadow-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</main>

{{-- SweetAlert --}}
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

@if(session('incomplete_profile'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Lengkapi Profil!',
        text: @json(session('incomplete_profile')),
        confirmButtonText: 'Lengkapi Sekarang',
        confirmButtonColor: '#facc15',
    });
</script>
@endif
@endsection
