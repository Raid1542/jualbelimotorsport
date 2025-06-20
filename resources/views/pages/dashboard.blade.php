@extends('layouts.dashboard')

@section('content')

{{-- Hero Section --}}
<section class="h-screen bg-cover bg-center bg-no-repeat relative"
  style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.85)), url('/images/miniatur.png');">
  <div class="relative z-10 max-w-7xl mx-auto h-full flex flex-col justify-center px-6 lg:px-12">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div class="flex flex-col items-center md:items-start">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight drop-shadow-2xl text-center md:text-left">
          Selamat Datang, {{ $user->name }}
        </h1>
        <p class="text-white text-lg mt-6 max-w-xl drop-shadow-md leading-relaxed tracking-wide text-center md:text-left">
          Nikmati pengalaman belanja terbaik di SpeedZone. Temukan produk impianmu sekarang!
        </p>
        <div class="mt-8 flex flex-wrap gap-4 justify-center md:justify-start">
          <a href="{{ route('produk') }}" class="bg-yellow-500 text-white font-bold px-8 py-4 rounded-full hover:bg-yellow-600 transition-all duration-300 shadow-lg hover:scale-110">
            Lihat Produk
          </a>
        </div>
      </div>
      <div class="w-full max-w-md">
        {{-- Tambahkan banner atau gambar promo jika diperlukan --}}
      </div>
    </div>
  </div>
</section>

{{-- Produk Terbaru --}}
<section class="bg-gray-100 py-20">
  <div class="text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800">Produk Terbaru</h2>
    <p class="text-gray-600 mt-3 text-lg">Temukan produk terbaik pilihan Speedzone yang siap menemani petualanganmu.</p>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-12 space-y-20">
    @foreach($produkBaru->take(4) as $index => $item)
    <div class="group flex flex-col md:flex-row {{ $index % 2 === 1 ? 'md:flex-row-reverse' : '' }} gap-10 items-center bg-white rounded-3xl p-8 shadow-md border border-gray-200 transition-all duration-300 hover:shadow-lg">

      <!-- Gambar Produk -->
      <div class="w-full md:w-1/2 overflow-hidden rounded-2xl">
        <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}"
          class="w-full h-80 object-cover rounded-2xl transform group-hover:scale-105 transition duration-500 ease-in-out shadow-sm">
      </div>

      <!-- Detail Produk -->
      <div class="w-full md:w-1/2 text-center md:text-left text-gray-800 space-y-4">
        <h3 class="text-3xl font-bold text-yellow-600">{{ $item->nama }}</h3>
        <p class="text-gray-600 leading-relaxed text-base">
          Dilengkapi performa tinggi dan desain elegan, {{ $item->nama }} hadir untuk kamu yang ingin tampil beda.
        </p>

        <!-- Tombol -->
        <a href="{{ route('produk.show', ['id' => $item->id]) }}"
          class="inline-block mt-6 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-7 py-3 rounded-full shadow-md hover:shadow-lg transition transform hover:scale-105 duration-300">
          Belanja Sekarang
        </a>
      </div>
    </div>
    @endforeach
  </div>
</section>

<!-- Kenapa Memilih SpeedZone -->
<section class="bg-white py-24 px-6 lg:px-12">
  <div class="max-w-7xl mx-auto text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Kenapa Memilih <span class="text-yellow-500">Speedzone?</span></h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
      Kami memberikan lebih dari sekadar produk. Speedzone adalah pilihan cerdas untuk performa, harga, dan pelayanan terbaik.
    </p>
  </div>

  <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4 max-w-7xl mx-auto">
    <!-- Keunggulan 1 -->
    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition duration-300 border border-gray-200 text-center">
      <div class="flex justify-center mb-4">
        <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-semibold text-gray-800 mb-2">Garansi & Keamanan</h3>
      <p class="text-sm text-gray-600">Setiap pembelian dilengkapi garansi resmi dan sistem pembayaran aman.</p>
    </div>

    <!-- Keunggulan 2 -->
    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition duration-300 border border-gray-200 text-center">
      <div class="flex justify-center mb-4">
        <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3 10h11M9 21V3M17 16l4-4m0 0l-4-4m4 4H9" />
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-semibold text-gray-800 mb-2">Pengiriman Cepat</h3>
      <p class="text-sm text-gray-600">Layanan ekspedisi prioritas. Pesanan kamu akan tiba dengan cepat & aman.</p>
    </div>

    <!-- Keunggulan 3 -->
    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition duration-300 border border-gray-200 text-center">
      <div class="flex justify-center mb-4">
        <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M7 8h10M7 12h4m1 8a9 9 0 100-18 9 9 0 000 18z" />
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-semibold text-gray-800 mb-2">Harga Terbaik</h3>
      <p class="text-sm text-gray-600">Dapatkan harga kompetitif dengan berbagai pilihan menarik.</p>
    </div>

    <!-- Keunggulan 4 -->
    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition duration-300 border border-gray-200 text-center">
      <div class="flex justify-center mb-4">
        <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M18.364 5.636l-1.414 1.414A9 9 0 105.636 18.364l1.414-1.414a7 7 0 119.9-9.9z" />
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-semibold text-gray-800 mb-2">Banyak Pilihan</h3>
      <p class="text-sm text-gray-600">Beragam produk terbaru dari berbagai miniatur yang tersedia.</p>
    </div>
  </div>
</section>


@endsection
