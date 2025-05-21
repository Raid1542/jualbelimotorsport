<!-- resources/views/pages/admin/dashboard.blade.php -->
@extends('layouts.admin_layout')

@section('title', 'Dashboard Penjual')
@section('judul_halaman', 'Dashboard Penjual')

@section('konten')
  <h1 class="text-2xl font-bold text-yellow-300 mb-6">Selamat datang, Admin!</h1>

  <!-- Statistik Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
    <!-- Card 1 -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-700 transition-all">
      <h3 class="text-yellow-400 text-2xl font-semibold">Produk Anda</h3>
      <div class="mt-4 text-white">
        <p class="text-lg">Kategori Produk: <span class="text-yellow-300">{{ $kategori_produk }}</span></p>
        <p class="text-lg">Jumlah Produk: <span class="text-yellow-300">{{ $jumlah_produk }}</span></p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-700 transition-all">
      <h3 class="text-yellow-400 text-2xl font-semibold">Pesanan Terbaru</h3>
      <div class="mt-4 text-white">
        <p class="text-lg">Pesanan Terbaru: <span class="text-yellow-300">{{ $pesanan_terbaru }}</span></p>
        <p class="text-lg">Total Pesanan: <span class="text-yellow-300">{{ $total_pesanan }}</span></p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-700 transition-all">
      <h3 class="text-yellow-400 text-2xl font-semibold">Pendapatan</h3>
      <div class="mt-4 text-white">
        <p class="text-lg">Hari Ini: <span class="text-yellow-300">Rp{{ number_format($pendapatan_harian, 0, ',', '.') }}</span></p>
        <p class="text-lg">Bulan Ini: <span class="text-yellow-300">Rp{{ number_format($pendapatan_bulanan, 0, ',', '.') }}</span></p>
      </div>
    </div>
  </div>

  <!-- Tabel Pesanan -->
  <h3 class="text-2xl font-semibold text-yellow-400 mb-4">Pesanan Terbaru</h3>
  <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
    <table class="min-w-full text-sm text-left border border-gray-700">
      <thead class="bg-yellow-500 text-gray-900">
        <tr>
          <th class="px-4 py-2 border border-gray-700">ID Pesanan</th>
          <th class="px-4 py-2 border border-gray-700">Produk</th>
          <th class="px-4 py-2 border border-gray-700">Jumlah</th>
          <th class="px-4 py-2 border border-gray-700">Status</th>
          <th class="px-4 py-2 border border-gray-700">Total</th>
          <th class="px-4 py-2 border border-gray-700">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pesanan_list as $pesanan)
        <tr class="hover:bg-gray-700 text-white">
          <td class="px-4 py-2 border border-gray-700">{{ $pesanan['id'] }}</td>
          <td class="px-4 py-2 border border-gray-700">{{ $pesanan['produk'] }}</td>
          <td class="px-4 py-2 border border-gray-700">{{ $pesanan['jumlah'] }}</td>
          <td class="px-4 py-2 border border-gray-700">{{ $pesanan['status'] }}</td>
          <td class="px-4 py-2 border border-gray-700">Rp{{ number_format($pesanan['total'], 0, ',', '.') }}</td>
          <td class="px-4 py-2 border border-gray-700 text-blue-400 hover:underline">
            <a href="/admin/konfirmasi_pembayaran">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
