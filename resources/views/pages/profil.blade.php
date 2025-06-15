@extends('layouts.profil_layout')

@section('title', 'Profil | Speedzone')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;
    $user = $user ?? auth()->user();
    $fotoProfil = ($user && $user->foto && Storage::disk('public')->exists($user->foto))
        ? Storage::url($user->foto)
        : asset('images/default.jpg');
@endphp

<main class="max-w-4xl mx-auto py-10 px-6">
    <!-- Foto Profil & Nama -->
    <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col md:flex-row items-center gap-6">
        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-yellow-400">
            <img src="{{ asset('images/' . $user->foto) }}" alt="Foto Profil" class="w-full h-full object-cover">
        </div>
        <div class="text-center md:text-left">
            <h2 class="text-3xl font-semibold text-black">{{ $user->username ?? 'Pengguna' }}</h2>
        </div>
    </div>

    <!-- Info Pribadi -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-4 text-black">Kontak</h3>
            <ul class="space-y-2 text-gray-800">
                <li><strong>Email:</strong> {{ $user->email ?? '-' }}</li>
                <li><strong>Telepon:</strong> {{ $user->telepon ?? '-' }}</li>
                <li>
                    <strong>Alamat:</strong> 
                    <p class="whitespace-pre-line">{{ $user->alamat ?? '-' }}</p>
                </li>
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
            <a href="{{ route('profil.edit_password') }}" class="w-full text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded font-semibold">
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

@section('scripts')
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
