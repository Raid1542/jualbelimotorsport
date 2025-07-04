@extends('layouts.layout_pesanan')

@section('title', 'Invoice')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8 bg-white shadow-xl rounded-xl print:px-0 print:shadow-none print:rounded-none">

    {{-- Header --}}
    <div class="text-center border-b pb-4 mb-6">
        <h1 class="text-3xl font-bold text-yellow-600">INVOICE</h1>
        <p class="text-gray-500 text-sm">SpeedZone - Bukti Pembelian</p>
    </div>

    {{-- Info Transaksi & Pembeli --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 text-sm">
        <div>
            <h2 class="font-semibold text-yellow-600 mb-2">Informasi Invoice</h2>
            <p><span class="font-medium">No. Invoice:</span> INV-{{ $transaksi->created_at->format('Ymd') }}-{{ str_pad($transaksi->id, 3, '0', STR_PAD_LEFT) }}</p>
            <p><span class="font-medium">Tanggal:</span> {{ $transaksi->created_at->format('d M Y, H:i') }}</p>
            <p><span class="font-medium">Status:</span> <span class="capitalize text-yellow-700 font-semibold">{{ $transaksi->status }}</span></p>
        </div>
        <div>
            <h2 class="font-semibold text-yellow-600 mb-2">Data Pembeli</h2>
            <p><span class="font-medium">Nama:</span> {{ $transaksi->user->name }}</p>
            <p><span class="font-medium">Alamat:</span> {{ $transaksi->user->alamat }}</p>
            <p><span class="font-medium">Telepon:</span> {{ $transaksi->user->telepon }}</p>
        </div>
    </div>

    {{-- Produk Dipesan --}}
    <h2 class="font-semibold text-yellow-600 mb-3 text-base">Produk yang Dipesan</h2>
    <div class="space-y-4 mb-6">
        @foreach($transaksi->detailPesanan as $item)
        <div class="flex gap-4 items-start border rounded-xl p-4 bg-gray-50 shadow-sm">
            <img src="{{ asset('images/' . optional($item->produk)->gambar) }}" alt="produk"
                 class="w-20 h-20 object-cover rounded-lg">
            <div class="flex-1">
                <h3 class="font-semibold text-gray-800 text-sm">{{ optional($item->produk)->nama ?? 'Produk tidak tersedia' }}</h3>
                <p class="text-gray-500 text-xs">Jumlah: {{ $item->jumlah }}</p>
                <p class="text-sm text-red-600 font-semibold mt-1">
                    Rp{{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}
                </p>
                <p class="text-xs text-gray-400">Harga satuan: Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Ringkasan Pembayaran --}}
    <div class="bg-white border-t pt-4 text-sm space-y-2">
        <div class="flex justify-between font-semibold">
            <span>Total Bayar:</span>
            <span class="text-red-600">Rp{{ number_format($transaksi->total, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between">
            <span>Metode Pembayaran:</span>
            <span>{{ strtoupper($transaksi->metode_pembayaran) }}</span>
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="mt-8 flex justify-between items-center print:hidden">
        <a href="{{ route('pesanan') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
            Kembali ke Pesanan
        </a>
        <button onclick="window.print()"
           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
            Cetak
        </button>
    </div>
</div>
@endsection
