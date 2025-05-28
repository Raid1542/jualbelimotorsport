@extends('layouts.detail')

@section('content')
<section class="py-16 bg-gradient-to-b from-yellow-50 to-white min-h-screen">
  <div class="max-w-6xl mx-auto px-6">

    <!-- Header dengan tombol kembali -->
    <div class="mb-8">
      <a href="{{ route('produk') }}" class="flex items-center text-yellow-600 hover:text-yellow-700 font-semibold text-lg">
      </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-white rounded-3xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">

      <!-- Gambar Produk -->
    <div class="h-[500px] lg:h-[600px]">
     <img src="{{ $produk['gambar'] }}" alt="{{ $produk['nama'] }}" class="w-full h-full object-cover rounded-l-3xl">
    </div>


      <!-- Deskripsi Produk -->
      <div class="p-8 space-y-6">
        <h1 class="text-4xl font-bold text-gray-800">{{ $produk['nama'] }}</h1>
        <p class="text-2xl text-yellow-600 font-semibold">Rp{{ number_format($produk['harga'], 0, ',', '.') }}</p>
        <p class="text-gray-600 leading-relaxed">{{ $produk['deskripsi'] }}</p>

        <!-- Tombol Aksi -->
        <div class="flex gap-4 pt-4">
          <button class="inline-block px-6 py-3 border border-yellow-500 text-yellow-600 font-semibold rounded-xl hover:bg-yellow-500 hover:text-white transition-all duration-300">
            Tambah ke Keranjang
          </button>

          <button class="inline-block px-6 py-3 bg-yellow-500 text-white font-semibold rounded-xl hover:bg-yellow-600 shadow-lg transition-all duration-300">
            Beli Sekarang
          </button>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
