@extends('layouts.konfirmasi') {{-- atau layout kamu yang lain --}}

@section('title', 'Konfirmasi Pembayaran')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold text-yellow-600 mb-6">Konfirmasi Pembayaran</h2>

    <div class="mb-6">
        <h3 class="font-semibold text-lg">Informasi Transaksi</h3>
        <p><strong>Nama:</strong> {{ $transaksi->nama }}</p>
        <p><strong>Alamat:</strong> {{ $transaksi->alamat }}</p>
        <p><strong>No HP:</strong> {{ $transaksi->no_hp }}</p>
        <p><strong>Status:</strong> <span class="text-blue-600">{{ $transaksi->status }}</span></p>
    </div>

    <div>
        <h3 class="font-semibold text-lg mb-2">Detail Pesanan:</h3>
        <table class="w-full table-auto border text-left">
            <thead class="bg-yellow-200">
                <tr>
                    <th class="p-2">Produk</th>
                    <th class="p-2">Jumlah</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->detail as $item)
                <tr class="border-t">
                    <td class="p-2">{{ $item->produk->nama ?? 'Produk tidak tersedia' }}</td>
                    <td class="p-2">{{ $item->jumlah }}</td>
                    <td class="p-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="p-2">Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-right mt-4">
        <h3 class="text-xl font-bold">Total: Rp {{ number_format($transaksi->total_harga ?? $transaksi->total ?? 0, 0, ',', '.') }}</h3>
    </div>
</div>
@endsection
