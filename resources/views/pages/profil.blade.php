@extends('layouts.profil_layout')

@section('title', 'Profil | Speedzone')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;

    $user = $user ?? auth()->user();

    $fotoProfil = ($user && $user->foto && file_exists(public_path('images/' . $user->foto)))
        ? asset('images/' . $user->foto)
        : asset('images/default.jpg');
@endphp

<main class="max-w-6xl mx-auto py-16 px-6 space-y-12">

    {{-- Profil Header --}}
    <section class="bg-gradient-to-br from-yellow-100 via-white to-yellow-50 rounded-3xl shadow-xl p-10 flex flex-col md:flex-row items-center md:items-start gap-10">
        <div class="w-40 h-40 rounded-full overflow-hidden border-[6px] border-yellow-500 shadow-md">
            <img src="{{ $fotoProfil }}" alt="Foto Profil" class="w-full h-full object-cover">
        </div>
        <div class="flex-1 text-center md:text-left space-y-3">
            <h1 class="text-4xl font-bold text-gray-800 leading-tight">{{ $user->username ?? 'Pengguna' }}</h1>
            <p class="text-lg text-gray-600">Selamat datang di <span class="text-yellow-600 font-semibold">SpeedZone</span></p>
            <div class="mt-4 flex flex-wrap justify-center md:justify-start gap-4">
                <a href="{{ route('profil.edit') }}" class="px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-full font-medium transition-all shadow">
                    Edit Profil
                </a>
                <a href="{{ route('profil.edit_password') }}" class="px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-full font-medium transition-all shadow">
                    Ubah Kata Sandi
                </a>
            </div>
        </div>
    </section>

    {{-- Informasi Kontak + Logout --}}
    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Informasi Kontak --}}
        <div class="bg-white rounded-2xl shadow-md p-8">
            <h2 class="text-xl font-semibold text-yellow-600 mb-4 border-b pb-2">Informasi Kontak</h2>
            <ul class="text-gray-700 space-y-3 text-base">
                <li><span class="font-semibold">Email:</span> {{ $user->email ?? '-' }}</li>
                <li><span class="font-semibold">Telepon:</span> {{ $user->telepon ?? '-' }}</li>
                <li><span class="font-semibold">Alamat:</span> {{ $user->alamat ?? '-' }}</li>
            </ul>
        </div>

        {{-- Logout --}}
        <div class="bg-white rounded-2xl shadow-md p-8 flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-semibold text-yellow-600 mb-4 border-b pb-2">Keluar Akun</h2>
                <p class="text-gray-600 mb-6">Jika kamu ingin keluar dari akunmu, klik tombol di bawah ini.</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold shadow-md transition-all">
                    Logout
                </button>
            </form>
        </div>
    </section>

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
