@extends('layouts.app')

@section('title', 'Pembayaran QRIS')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow mt-6">
    <h2 class="text-xl font-bold text-yellow-600 mb-4">Pembayaran via QRIS</h2>

    <p class="mb-2"><strong>Nama Pemesan:</strong> {{ $transaksi->nama }}</p>
    <p class="mb-4"><strong>No HP:</strong> {{ $transaksi->telepon }}</p>

    <div class="mb-4 text-center">
        <img src="{{ asset('img/qris.jpg') }}" alt="QRIS" class="w-64 mx-auto mb-4">
        <p class="text-sm text-gray-500">Silakan scan QR di atas dan lakukan pembayaran.</p>
    </div>

    <form action="{{ route('pembayaran.upload', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="block mb-2 font-semibold">Upload Bukti Transfer:</label>
        <input type="file" name="bukti_transfer" accept="image/*" class="mb-4 w-full border p-2 rounded" required>

        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
            Kirim Bukti Pembayaran
        </button>
    </form>
</div>
@endsection
