@extends('layouts.layout_pesanan')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-yellow-600 mb-6">Riwayat Pesanan</h2>

    @forelse($pesanan as $order)
    <div class="bg-white rounded-xl shadow-md p-4 mb-6">
        <div class="flex justify-between items-center mb-2">
            <h3 class="text-lg font-semibold text-gray-800">Pesanan #{{ $order->id }}</h3>
            <span class="text-sm font-medium px-3 py-1 rounded-full bg-green-100 text-green-600">
                Selesai
            </span>
        </div>

        <p class="text-sm text-gray-600 mb-2">Tanggal: {{ $order->created_at->format('d M Y, H:i') }}</p>
        <p class="text-sm text-gray-600 mb-4">Metode Pembayaran: <span class="font-medium">{{ strtoupper($order->metode_pembayaran) }}</span></p>

        <div class="space-y-3 mb-3">
            @foreach($order->detailPesanan as $item)
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/' . $item->produk->gambar) }}" alt="produk" class="w-16 h-16 object-cover rounded">
                <div class="flex-1">
                    <p class="text-gray-800 font-semibold">{{ $item->produk->nama }}</p>
                    <p class="text-sm text-gray-500">Jumlah: {{ $item->jumlah }} • Harga: Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center mt-4">
            <p class="text-gray-800 font-bold">Total: Rp{{ number_format($order->total, 0, ',', '.') }}</p>

            {{-- Tombol Invoice --}}
            <a href="{{ route('pesanan.invoice', $order->id) }}"
               class="text-sm px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg shadow">
               Lihat Invoice
            </a>
        </div>
    </div>
    @empty
        <p class="text-center text-gray-500">Belum ada pesanan yang selesai.</p>
    @endforelse
</div>
@endsection
