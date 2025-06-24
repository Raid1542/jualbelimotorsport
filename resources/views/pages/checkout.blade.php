@extends('layouts.konfirmasi')

@section('title', 'Checkout - SpeedZone')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
   <!-- Alamat Pengiriman -->
<div class="bg-white rounded-xl shadow-md p-4 mb-4">
    <h2 class="font-bold text-lg text-yellow-600 mb-2">Alamat Pengiriman</h2>
    <p class="text-sm text-gray-700 mb-1">
        <span class="font-medium">Nama:</span> {{ Auth::user()->name ?? '-' }}
    </p>
    <p class="text-sm text-gray-700 mb-1">
        <span class="font-medium">Telepon:</span> {{ Auth::user()->telepon ?? '-' }}
    </p>
    <p class="text-sm text-gray-700">
        <span class="font-medium">Alamat:</span> {{ Auth::user()->alamat ?? '-' }}
    </p>
</div>


    <!-- Produk -->
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

        <!-- Tampilkan QR jika QRIS dipilih -->
        <div id="qrisSection" class="mt-4 hidden">
            <p class="text-sm text-gray-700 mb-2">Silakan scan QR berikut untuk pembayaran:</p>
            <img src="{{ asset('images/qris.jpg') }}" alt="QRIS" class="w-48 h-48 mx-auto rounded-xl shadow-md">
        </div>
    </div>

    <!-- Rincian -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg text-yellow-600 mb-2">Rincian Pembayaran</h2>
        <div class="flex justify-between text-sm text-gray-700 mb-1">
            <span>Subtotal</span>
            <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between text-base font-bold text-gray-800 mt-2">
            <span>Total</span>
            <span class="text-red-600">Rp{{ number_format($total, 0, ',', '.') }}</span>
        </div>
    </div>

    <!-- Tombol -->
    <form action="{{ route('checkout.proses') }}" method="POST">
        @csrf
        <input type="hidden" name="metode_pembayaran_terpilih" id="metode_pembayaran_terpilih" value="cod">
        @foreach ($selectedItems as $id)
            <input type="hidden" name="items[]" value="{{ $id }}">
        @endforeach
        <button type="submit"
            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-xl shadow">
            Buat Pesanan
        </button>
    </form>
</div>

<script>
    const radios = document.querySelectorAll('input[name="metode_pembayaran"]');
    const metodeHidden = document.getElementById('metode_pembayaran_terpilih');
    const qrisSection = document.getElementById('qrisSection');

    radios.forEach((radio) => {
        radio.addEventListener('change', function () {
            metodeHidden.value = this.value;
            qrisSection.classList.toggle('hidden', this.value !== 'qris');
        });
    });
</script>
@endsection
