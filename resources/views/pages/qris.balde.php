@extends('layouts.konfirmasi')

@section('title', 'Pembayaran QRIS')

@section('content')
<div class="max-w-xl mx-auto px-4 py-10">
    <div class="bg-white shadow rounded-xl p-6 text-center">
        <h2 class="text-2xl font-bold text-yellow-600 mb-4">QRIS Pembayaran</h2>
        <p class="text-gray-700 mb-2">Silakan scan QR berikut untuk melakukan pembayaran:</p>
        <img src="{{ asset('images/qris.jpg') }}" class="w-64 h-64 mx-auto rounded-xl shadow mb-4" alt="QRIS">
        <div class="text-lg font-semibold text-red-600">Total: Rp{{ number_format($transaksi->total, 0, ',', '.') }}</div>
        <p class="text-sm text-gray-500 mt-2">Setelah membayar, silakan konfirmasi pembayaran di menu riwayat pesanan.</p>
    </div>
</div>
@endsection
