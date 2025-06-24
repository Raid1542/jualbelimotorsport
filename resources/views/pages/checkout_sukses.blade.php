@extends('layouts.konfirmasi')

@section('title', 'Pesanan Berhasil')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-10 text-center">
    <div class="bg-white rounded-xl shadow p-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-green-500 mb-4" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 13l4 4L19 7" />
        </svg>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Berhasil Dibuat!</h1>
        <p class="text-gray-600 mb-4">Terima kasih telah berbelanja di <span class="text-yellow-600 font-semibold">Speedzone</span>.</p>
        <p class="text-sm text-gray-500 mb-6">Silakan cek status pesanan Anda di halaman <a href="{{ route('dashboard') }}"
            class="text-blue-600 hover:underline">Pesanan Saya</a>.</p>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-3 rounded-xl shadow">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
