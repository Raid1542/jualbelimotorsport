@extends('layouts.konfirmasi')

@section('title', 'Konfirmasi Pembayaran - SpeedZone')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <!-- Informasi Transaksi -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="text-lg font-bold text-yellow-600 mb-2">Informasi Transaksi</h2>
        <p class="text-sm text-gray-700"><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
        <p class="text-sm text-gray-700"><strong>Status:</strong>
            <span class="font-semibold {{ $transaksi->status == 'menunggu pembayaran' ? 'text-red-600' : 'text-green-600' }}">
                {{ ucfirst($transaksi->status) }}
            </span>
        </p>
        <p class="text-sm text-gray-700"><strong>Metode Pembayaran:</strong> {{ strtoupper($transaksi->metode_pembayaran) }}</p>
    </div>

    <!-- Detail Produk -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="text-lg font-bold text-yellow-600 mb-2">Produk yang Dibeli</h2>
        @foreach ($transaksi->detail as $item)
        <div class="flex gap-4 items-start mb-4">
            <img src="{{ asset('images/' . $item->produk->gambar) }}" alt="produk" class="w-20 h-20 object-cover rounded">
            <div>
                <h3 class="font-semibold text-gray-800">{{ $item->produk->nama }}</h3>
                <p class="text-sm text-gray-500">Qty: {{ $item->jumlah }}</p>
                <p class="text-sm text-red-600 font-semibold">Rp{{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Ringkasan Pembayaran -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="text-lg font-bold text-yellow-600 mb-2">Ringkasan Pembayaran</h2>
        <div class="flex justify-between text-sm text-gray-700 mb-1">
            <span>Total Harga</span>
            <span>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
        </div>
    </div>

    @if ($transaksi->metode_pembayaran == 'qris' && $transaksi->status == 'menunggu pembayaran')
    <!-- Form Upload Bukti Transfer -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="text-lg font-bold text-yellow-600 mb-2">Upload Bukti Pembayaran</h2>
        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pengirim</label>
                <input type="text" name="nama_pengirim" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Transfer</label>
                <input type="file" name="bukti_transfer" class="w-full border rounded px-3 py-2" accept="image/*" required>
            </div>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded shadow">
                Kirim Bukti Pembayaran
            </button>
        </form>
    </div>
    @endif

    <a href="{{ route('dashboard') }}" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Kembali ke Dashboard</a>
</div>
@endsection
