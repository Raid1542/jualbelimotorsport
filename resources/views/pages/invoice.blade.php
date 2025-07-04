@extends('layouts.layout_pesanan')

@section('title', 'Invoice')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8 bg-white shadow-xl rounded-xl print:px-0 print:shadow-none print:rounded-none">

    {{-- Header --}}
    <div class="text-center border-b pb-4 mb-6">
        <h1 class="text-3xl font-bold text-yellow-600">INVOICE</h1>
        <p class="text-gray-500 text-sm">SpeedZone - Bukti Pembelian</p>
    </div>

    {{-- Info pesanan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 text-sm">
        <div>
            <h2 class="font-semibold text-yellow-600 mb-1">Informasi Invoice</h2>
            <p><strong>No. Invoice:</strong> INV-{{ $pesanan->created_at->format('Ymd') }}-{{ str_pad($pesanan->id, 3, '0', STR_PAD_LEFT) }}</p>
            <p><strong>Tanggal:</strong> {{ $pesanan->created_at->format('d M Y, H:i') }}</p>
            <p><strong>Status:</strong> <span class="capitalize">{{ $pesanan->status }}</span></p>
        </div>
        <div>
            <h2 class="font-semibold text-yellow-600 mb-1">Data Pembeli</h2>
            <p><strong>Nama:</strong> {{ $pesanan->user->name }}</p>
            <p><strong>Alamat:</strong> {{ $pesanan->user->alamat }}</p>
            <p><strong>Telepon:</strong> {{ $pesanan->user->telepon }}</p>
        </div>
    </div>

    {{-- Daftar Produk --}}
    <div class="mb-6">
        <h2 class="font-semibold text-yellow-600 mb-3">Detail Produk</h2>
        <table class="w-full text-sm border border-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-left">
                <tr>
                    <th class="px-4 py-2 border-b">Produk</th>
                    <th class="px-4 py-2 border-b text-center">Jumlah</th>
                    <th class="px-4 py-2 border-b text-right">Harga Satuan</th>
                    <th class="px-4 py-2 border-b text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan->detailPesanan as $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $item->produk->nama }}</td>
                    <td class="px-4 py-2 text-center">{{ $item->jumlah }}</td>
                    <td class="px-4 py-2 text-right">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 text-right">Rp{{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Ringkasan --}}
    <div class="flex justify-end">
        <div class="w-full sm:w-1/2 text-sm space-y-1">
            <div class="flex justify-between font-semibold border-t pt-2">
                <span>Total Bayar:</span>
                <span class="text-red-600">Rp{{ number_format($pesanan->total, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Metode Pembayaran:</span>
                <span>{{ strtoupper($pesanan->metode_pembayaran) }}</span>
            </div>
        </div>
    </div>

    {{-- Aksi --}}
    <div class="mt-8 flex justify-between items-center print:hidden">
        <a href="{{ route('pesanan') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
            Kembali ke Pesanan
        </a>
    </div>
</div>
@endsection
