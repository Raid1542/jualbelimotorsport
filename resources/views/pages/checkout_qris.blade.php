@extends('layouts.konfirmasi')

@section('title', 'Pembayaran QRIS')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-xl shadow text-center">
    <h2 class="text-xl font-bold text-yellow-600 mb-4">Scan QRIS untuk Pembayaran</h2>

    <p class="text-sm text-gray-700 mb-2">Nominal yang harus dibayar:</p>
    <div class="text-2xl font-bold text-red-600 mb-4">
        Rp{{ number_format($transaksi->total, 0, ',', '.') }}
    </div>

    <img src="{{ asset('images/qris.jpg') }}" alt="QRIS" class="w-60 h-60 mx-auto rounded-lg shadow mb-6">

    <form action="{{ route('checkout.qris.konfirmasi', $transaksi->id) }}" method="POST">
        @csrf
        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold shadow">
            Saya Sudah Membayar
        </button>
    </form>

    <p class="text-sm text-gray-500 mt-4">Setelah membayar, klik tombol di atas untuk melanjutkan.</p>
</div>
@endsection
