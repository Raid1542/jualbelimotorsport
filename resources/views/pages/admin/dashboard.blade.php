@extends('layouts.admin_layout')

@section('title', 'Dashboard Penjual')
@section('judul_halaman', 'Dashboard Penjual')

@section('konten')
<div class="max-w-7xl mx-auto px-6 py-10">
  <h1 class="text-3xl font-bold text-gray-800 mb-8">Selamat datang, Admin!</h1>

  <!-- Statistik Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
    <!-- Produk Anda -->
    <div class="bg-[#ffffff] p-6 rounded-2xl shadow-md hover:shadow-lg hover:bg-[#979eaa] transition">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Produk Anda</h3>
      <div class="text-black space-y-2">
        <p>Kategori Produk: <span class="text-gray-800 font-medium">{{ $kategori_produk }}</span></p>
        <p>Jumlah Produk: <span class="text-gray-800 font-medium">{{ $jumlah_produk }}</span></p>
      </div>
    </div>

    <!-- Pesanan -->
    <div class="bg-[#ffffff] p-6 rounded-2xl shadow-md hover:shadow-lg hover:bg-[#979eaa] transition">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Pesanan</h3>
      <div class="text-black space-y-2">
        <p>Pesanan Terbaru: <span class="text-gray-800 font-medium">{{ $pesanan_terbaru }}</span></p>
        <p>Total Pesanan: <span class="text-gray-800 font-medium">{{ $total_pesanan }}</span></p>
      </div>
    </div>

    <!-- Pendapatan -->
    <div class="bg-[#ffffff] p-6 rounded-2xl shadow-md hover:shadow-lg hover:bg-[#979eaa] transition">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Pendapatan</h3>
      <div class="text-black space-y-2">
        <p>Hari Ini: <span class="text-gray-800 font-medium">Rp{{ number_format($pendapatan_harian, 0, ',', '.') }}</span></p>
        <p>Bulan Ini: <span class="text-gray-800 font-medium">Rp{{ number_format($pendapatan_bulanan, 0, ',', '.') }}</span></p>
      </div>
    </div>
  </div>

  <!-- Tabel Pesanan -->
  <h2 class="text-2xl font-bold text-gray-800 mb-4">Pesanan Terbaru</h2>
  <div class="overflow-x-auto bg-[#ffffff] rounded-xl shadow-lg">
    <table class="min-w-full divide-y divide-gray-700 text-sm">
      <thead class="bg-yellow-600 text-gray-900">
        <tr>
          <th class="px-4 py-3 text-left">ID Pesanan</th>
          <th class="px-4 py-3 text-left">Produk</th>
          <th class="px-4 py-3 text-left">Jumlah</th>
          <th class="px-4 py-3 text-left">Status</th>
          <th class="px-4 py-3 text-left">Total</th>
          <th class="px-4 py-3 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-gray-800 divide-y divide-gray-700">
        @foreach($pesanan_list as $pesanan)
        <tr class="hover:bg-[#d8dee8] transition">
          <td class="px-4 py-3">{{ $pesanan['id'] }}</td>
          <td class="px-4 py-3">{{ $pesanan['produk'] }}</td>
          <td class="px-4 py-3">{{ $pesanan['jumlah'] }}</td>
          <td class="px-4 py-3">{{ $pesanan['status'] }}</td>
          <td class="px-4 py-3">Rp{{ number_format($pesanan['total'], 0, ',', '.') }}</td>
          <td class="px-4 py-3">
            <a href="/admin/konfirmasi_pembayaran" class="text-blue-400 hover:text-yellow-300 hover:underline transition">
              Detail
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
