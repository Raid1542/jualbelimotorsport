@extends('layouts.detail')

@section('content')
@if(session('success'))
<div 
  x-data="{ show: true }" 
  x-show="show"
  x-transition:enter="transition ease-out duration-300"
  x-transition:leave="transition ease-in duration-300"
  x-init="setTimeout(() => show = false, 3000)"
  class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-white text-yellow-600 px-6 py-3 rounded-lg shadow-lg z-50 text-center text-sm font-medium"
>
  {{ session('success') }}
</div>
@endif

<section class="py-16 bg-gradient-to-br from-yellow-50 to-white min-h-screen">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-start">

    <!-- Gambar Produk -->
    <div class="relative overflow-hidden rounded-3xl shadow-xl">
      <img
        src="{{ $produk->gambar ? asset('images/' . $produk->gambar) : 'https://source.unsplash.com/600x400/?motorcycle' }}"
        alt="{{ $produk->nama }}"
        class="w-full h-auto max-h-[500px] object-cover transition-transform duration-500 hover:scale-105"
      >
    </div>

    <!-- Detail Produk -->
    <div class="flex flex-col justify-between">
      <div>
        <h1 class="text-4xl font-extrabold text-gray-800 mb-2 tracking-tight">{{ $produk->nama }}</h1>
        <p class="text-yellow-600 text-3xl font-bold mb-4">
          Rp{{ number_format($produk->harga, 0, ',', '.') }}
        </p>

        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
          {{ $produk->deskripsi ?? 'Tidak ada deskripsi produk yang tersedia.' }}
        </p>

        <ul class="mb-6 space-y-2 text-base text-gray-600">
          <li><span class="font-semibold">Stok:</span> {{ $produk->stok }}</li>
          <li><span class="font-semibold">Warna:</span> {{ $produk->warna }}</li>
          <li><span class="font-semibold">Kategori:</span> {{ $produk->kategori->nama ?? '-' }}</li>
        </ul>
      </div>

      <!-- Tombol Aksi -->
      <div class="flex flex-col sm:flex-row gap-4 mt-8">
        {{-- Tambah ke Keranjang --}}
        <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST" class="w-full sm:w-auto">
          @csrf
          <button type="submit"
            class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl shadow-md font-semibold text-base transition-all duration-300">
            Masukkan ke Keranjang
          </button>
        </form>

        {{-- Beli Sekarang --}}
        <a href="{{ route('checkout.beli', $produk->id) }}"
          class="w-full sm:w-auto bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl shadow-md font-semibold text-base text-center transition-all duration-300">
          Beli Sekarang
        </a>
      </div>
    </div>

  </div>
</section>
@endsection
