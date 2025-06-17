@extends('layouts.admin_layout')

@section('title', 'Dashboard Penjual')
@section('judul_halaman', 'Dashboard Penjual')

@section('konten')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-10">Selamat datang, <span class="text-yellow-600">Admin!</span></h1>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        
        <!-- Produk Anda -->
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">📦 Produk Anda</h3>
            <div class="text-sm text-gray-700 space-y-2">
                <p><strong>Kategori Produk:</strong></p>
                <ul class="list-disc list-inside ml-2">
                    @foreach ($kategori_produk as $kategori)
                        <li>{{ $kategori->nama }}</li>
                    @endforeach
                </ul>
                <p><strong>Jumlah Produk:</strong> {{ $jumlah_produk }}</p>
            </div>
        </div>

        <!-- Pesanan -->
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">🧾 Pesanan</h3>
            <div class="text-sm text-gray-700 space-y-2">
                <p><strong>Pesanan Terbaru:</strong> {{ $pesanan_terbaru }}</p>
                <p><strong>Total Pesanan:</strong> {{ $total_pesanan }}</p>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">💰 Pendapatan</h3>
            <div class="text-sm text-gray-700 space-y-2">
                <p><strong>Hari Ini:</strong> Rp{{ number_format($pendapatan_harian, 0, ',', '.') }}</p>
                <p><strong>Bulan Ini:</strong> Rp{{ number_format($pendapatan_bulanan, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <!-- Tabel Pesanan Terbaru -->
    <h2 class="text-2xl font-bold text-gray-800 mb-4">🛒 Pesanan Terbaru</h2>
    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
        <table class="min-w-full divide-y divide-gray-300 text-sm text-left">
            <thead class="bg-yellow-600 text-white">
                <tr>
                    <th class="px-4 py-3">ID Pesanan</th>
                    <th class="px-4 py-3">Produk</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-800">
                @forelse($pesanan_list as $pesanan)
                <tr class="hover:bg-gray-100 transition">
                    <td class="px-4 py-3">{{ $pesanan['id'] }}</td>
                    <td class="px-4 py-3">{{ $pesanan['produk'] }}</td>
                    <td class="px-4 py-3">{{ $pesanan['jumlah'] }}</td>
                    <td class="px-4 py-3">{{ $pesanan['status'] }}</td>
                    <td class="px-4 py-3">Rp{{ number_format($pesanan['total'], 0, ',', '.') }}</td>
                    <td class="px-4 py-3">
                        <a href="/admin/konfirmasi_pembayaran" class="text-blue-500 hover:text-yellow-500 hover:underline">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500 italic">Belum ada pesanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
