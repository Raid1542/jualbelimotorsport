@extends('layouts.konfirmasi')

@section('title', 'Checkout - SpeedZone')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <!-- Alamat Pengiriman -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg text-yellow-600 mb-2">Alamat Pengiriman</h2>
        <p class="text-sm text-gray-800 font-medium">{{ $user->name }} - {{ $user->phone }}</p>
        <p class="text-sm text-gray-600">{{ $user->alamat }}</p>
    </div>

    <!-- Produk yang Dibeli -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg mb-3 text-yellow-600">Detail Produk</h2>
        @foreach($keranjang as $item)
        <div class="flex gap-4 items-start mb-4">
            <img src="{{ asset('images/' . $item->produk->gambar) }}" alt="produk" class="w-20 h-20 object-cover rounded">
            <div class="flex-1">
                <h3 class="font-semibold text-gray-800">{{ $item->produk->nama }}</h3>
                <p class="text-sm text-gray-500">Qty: {{ $item->jumlah }}</p>
                <p class="text-sm font-semibold text-red-600">Rp{{ number_format($item->produk->harga * $item->jumlah, 0, ',', '.') }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Metode Pembayaran -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg text-yellow-600 mb-2">Metode Pembayaran</h2>
        <div class="space-y-2">
            <label class="flex items-center gap-3">
                <input type="radio" name="metode_pembayaran" value="cod" checked class="accent-yellow-500">
                <span>COD (Bayar di Tempat)</span>
            </label>
            <label class="flex items-center gap-3">
                <input type="radio" name="metode_pembayaran" value="qris" class="accent-yellow-500">
                <span>QRIS (Scan untuk Bayar)</span>
            </label>
        </div>
    </div>

    <!-- Ringkasan Pembayaran -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg text-yellow-600 mb-2">Rincian Pembayaran</h2>
        <div class="flex justify-between text-sm text-gray-700 mb-1">
            <span>Subtotal</span>
            <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between text-sm text-gray-700 mb-1">
            <span>Ongkir</span>
            <span>Rp{{ number_format($ongkir, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between text-base font-bold text-gray-800 mt-2">
            <span>Total Pembayaran</span>
            <span class="text-red-600">Rp{{ number_format($total, 0, ',', '.') }}</span>
        </div>
    </div>

    <!-- Tombol -->
    <form action="{{ route('checkout.proses') }}" method="POST">
        @csrf
        <input type="hidden" name="metode_pembayaran_terpilih" id="metode_pembayaran_terpilih" value="cod">
        <button type="submit"
            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-xl shadow">
            Buat Pesanan
        </button>
    </form>
</div>

<script>
    // update metode pembayaran yang dipilih ke input hidden
    document.querySelectorAll('input[name="metode_pembayaran"]').forEach((radio) => {
        radio.addEventListener('change', function () {
            document.getElementById('metode_pembayaran_terpilih').value = this.value;
        });
    });
</script>
@endsection
