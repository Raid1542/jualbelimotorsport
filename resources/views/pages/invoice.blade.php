@extends('layouts.layout_pesanan')

@section('title', 'Invoice')

@section('content')
<div class="pt-32 pb-12 px-4 max-w-5xl mx-auto">
    <div class="bg-white shadow-lg rounded-xl p-6 md:p-10 print:shadow-none print:p-0 print:rounded-none">

        {{-- Header --}}
        <div class="text-center border-b pb-4 mb-6">
            <h1 class="text-3xl font-extrabold text-yellow-600">INVOICE</h1>
            <p class="text-gray-500 text-sm">SpeedZone - Bukti Pembelian Resmi</p>
        </div>

        {{-- Informasi Pengiriman & Pembeli --}}
        <div class="grid md:grid-cols-2 gap-6 mb-10 text-sm text-gray-800">
            <div>
                <h2 class="font-bold text-yellow-600 mb-2">Informasi Pengiriman</h2>
                <ul class="space-y-1">
                    <li><strong>No. Resi:</strong>
                        @if($pesanan->no_resi)
                            <span class="text-yellow-600 font-semibold">{{ $pesanan->no_resi }}</span>
                        @else
                            <span class="text-gray-400 italic">Belum tersedia</span>
                        @endif
                    </li>
                    <li><strong>Tanggal:</strong> {{ $pesanan->created_at->format('d M Y, H:i') }}</li>
                    <li><strong>Status:</strong> <span class="capitalize">{{ $pesanan->status }}</span></li>
                </ul>
            </div>
            <div>
                <h2 class="font-bold text-yellow-600 mb-2">Data Pembeli</h2>
                <ul class="space-y-1">
                    <li><strong>Nama:</strong> {{ $pesanan->user->name }}</li>
                    <li><strong>Alamat:</strong> {{ $pesanan->user->alamat }}</li>
                    <li><strong>Telepon:</strong> {{ $pesanan->user->telepon }}</li>
                </ul>
            </div>
        </div>

        {{-- Detail Produk --}}
        <div class="mb-8">
            <h2 class="font-bold text-yellow-600 mb-3">Detail Produk</h2>
            <div class="overflow-x-auto border rounded-xl">
                <table class="w-full text-sm text-gray-800">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr class="text-left">
                            <th class="px-4 py-3 border-b">Produk</th>
                            <th class="px-4 py-3 border-b text-center">Jumlah</th>
                            <th class="px-4 py-3 border-b text-right">Harga Satuan</th>
                            <th class="px-4 py-3 border-b text-right">Subtotal</th>
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
        </div>

        {{-- Ringkasan Pembayaran --}}
        <div class="flex justify-end mb-8">
            <div class="w-full sm:w-1/2 space-y-2 text-sm text-gray-700">
                <div class="flex justify-between font-semibold text-lg border-t pt-3">
                    <span>Total Bayar:</span>
                    <span class="text-red-600">Rp{{ number_format($pesanan->total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Metode Pembayaran:</span>
                    <span>{{ strtoupper($pesanan->metode_pembayaran) }}</span>
                </div>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-8 flex justify-between items-center print:hidden">
            <a href="{{ route('pesanan') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                ← Kembali ke Pesanan
            </a>
            <button onclick="window.print()"
               class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                🖨️ Cetak Invoice
            </button>
        </div>
    </div>
</div>
@endsection
