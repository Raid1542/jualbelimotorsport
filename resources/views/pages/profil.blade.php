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

<main class="max-w-5xl mx-auto py-12 px-6 space-y-10">

    <!-- Header Profil -->
    <div class="bg-white rounded-3xl shadow-2xl p-8 flex flex-col md:flex-row items-center md:items-start gap-8">
        <div class="w-36 h-36 rounded-full overflow-hidden border-[5px] border-yellow-400 shadow-lg">
            <img src="{{ $fotoProfil }}" alt="Foto Profil" class="w-full h-full object-cover">
        </div>
        <div class="text-center md:text-left flex-1 space-y-2">
            <h2 class="text-4xl font-bold text-gray-900">{{ $user->username ?? 'Pengguna' }}</h2>
            <p class="text-gray-500 text-lg">Selamat datang kembali di <span class="text-yellow-500 font-semibold">Speedzone</span>!</p>
        </div>
    </div>

    <!-- Info & Pengaturan -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Informasi Kontak -->
        <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
            <h3 class="text-xl font-semibold text-yellow-500 flex items-center gap-2">
                📞 <span>Informasi Kontak</span>
            </h3>
            <ul class="space-y-2 text-gray-700 text-base">
                <li><span class="font-medium">Email:</span> {{ $user->email ?? '-' }}</li>
                <li><span class="font-medium">Telepon:</span> {{ $user->telepon ?? '-' }}</li>
                <li><span class="font-medium">Alamat:</span> {{ $user->alamat ?? '-' }}</li>
            </ul>
        </div>

        <!-- Pengaturan Akun -->
        <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
            <h3 class="text-xl font-semibold text-yellow-500 flex items-center gap-2">
                ⚙️ <span>Pengaturan Akun</span>
            </h3>
            <div class="flex flex-col gap-4">
                <a href="{{ route('profil.edit') }}"
                   class="flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded-lg font-semibold shadow transition-all">
                    ✏️ Edit Profil
                </a>
                <a href="{{ route('profil.edit_password') }}"
                   class="flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-white py-2 px-4 rounded-lg font-semibold shadow transition-all">
                    🔒 Ubah Kata Sandi
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg font-semibold shadow transition-all">
                        🚪 Logout
                    </button>
                </form>
            </div>
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
