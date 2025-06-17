@extends('layouts.pesanan_layout')

@section('title', 'Pesanan Saya')

@section('content')
  <div class="space-y-4">
    <!-- Pesanan Card -->
    <div class="bg-white rounded-lg p-4 flex flex-col sm:flex-row sm:items-center justify-between shadow-lg">
      <!-- Info Toko & Produk -->
      <div class="flex items-start gap-4">
        <img src="{{ asset('images/Foto_1.png') }}" alt="Produk" class="w-20 h-20 object-cover rounded-md border border-gray-600">
        <div>
          <p class="text-sm text-black font-semibold">SpeedZone Official</p>
          <p class="text-yellow-600 font-bold">SpeedZone Hoodie Unisex</p>
          <p class="text-sm text-gray-700">Ukuran: M | Warna: Navy</p>
          <p class="text-sm text-gray-700">Jumlah: x1</p>
        </div>
      </div>

      <!-- Status & Aksi -->
      <div class="flex flex-col items-end mt-4 sm:mt-0">
        <span class="text-green-400 text-sm font-bold mb-1">Selesai</span>
        <span class="text-black font-semibold mb-2">Rp199.000</span>
        <div class="flex gap-2">
          <button class="bg-yellow-500 text-white text-sm font-semibold px-3 py-1 rounded hover:bg-yellow-300">Beli Lagi</button>
          <button class="border border-yellow-400 text-yellow-400 text-sm font-semibold px-3 py-1 rounded hover:bg-yellow-400 hover:text-black transition duration-200">Lihat Detail</button>
        </div>
      </div>
    </div>
  </div>
@endsection
