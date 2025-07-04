@extends('layouts.app') 

@section('title', 'SpeedZone - Temukan Motor Impianmu')

@section('content')

{{-- Hero Section --}}
<section class="h-screen bg-cover bg-center bg-no-repeat relative"
  style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.85)), url('/images/miniatur.png');">
  <div class="relative z-10 max-w-7xl mx-auto h-full flex flex-col justify-center px-6 lg:px-12">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div class="flex flex-col items-center md:items-start">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white leading-tight drop-shadow-2xl text-center md:text-left">
          SpeedZone
        </h1>
        <p class="text-white text-lg mt-6 max-w-xl drop-shadow-md leading-relaxed tracking-wide text-center md:text-left">
          Temukan produk impianmu di Speedzone! Berbagai pilihan kategori mulai dari miniatur motor sport, miniatur motor biasa, dan mobil  dengan harga terbaik dan nikmati pengalaman belanja terbaik di Speedzone
        </p>
        <div class="mt-8 flex flex-wrap gap-4 justify-center md:justify-start">
          <a href="{{ route('produk', $produk->id) }}"
             class="bg-yellow-500 text-white font-bold px-8 py-4 rounded-full hover:bg-yellow-600 transition-all duration-300 shadow-lg hover:scale-110">
            Lihat Produk
          </a>
        </div>
      </div>
      <div class="w-full max-w-md">
        {{-- Tambahkan gambar banner promosi jika ingin --}}
      </div>
    </div>
  </div>
</section>

{{-- Produk Preview --}}
<section class="bg-gray-100 py-20">
  <div class="text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800">Produk Terbaru</h2>
    <p class="text-gray-600 mt-3 text-lg">Temukan Produk terbaik Plihan anda di Speedzone cocok untuk menjadi koleksi kamu dirumah.</p>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-12 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
    @forelse($produkBaru->take(3) as $item)
      <div class="bg-white rounded-3xl p-6 shadow-md border border-gray-200 hover:shadow-lg transition-all duration-300">
        <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}"
             class="w-full h-48 object-cover rounded-xl mb-4 transition transform hover:scale-105 duration-300">
        <h3 class="text-xl font-bold text-yellow-600 mb-2">{{ $item->nama }}</h3>
        <p class="text-gray-600 text-sm mb-4">Desain premium & performa tinggi untuk gaya hidupmu.</p>
        <a href="{{ route('produk.show', $item->id) }}"
           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-full text-sm font-semibold transition">
          Lihat Detail
        </a>
      </div>
    @empty
      <p class="text-gray-500 text-center col-span-full">Belum ada produk.</p>
    @endforelse
  </div>
</section>

{{-- Fitur Unggulan --}}
<section class="bg-white py-24 px-6 lg:px-12">
  <div class="max-w-7xl mx-auto text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-4">
      Kenapa Memilih <span class="text-yellow-500">Speedzone?</span>
    </h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
      SpeedZone hadir dengan kualitas, layanan, dan kepercayaan terbaik untuk para pecinta miniatur.
    </p>
  </div>

  <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4 max-w-7xl mx-auto">
    @foreach([
      ['icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Garansi Aman', 'desc' => 'Garansi resmi & sistem pembayaran terverifikasi.'],
      ['icon' => 'M3 10h11M9 21V3M17 16l4-4m0 0l-4-4m4 4H9', 'title' => 'Pengiriman Kilat', 'desc' => 'Ekspedisi cepat, pesanan sampai dengan aman.'],
      ['icon' => 'M7 8h10M7 12h4m1 8a9 9 0 100-18 9 9 0 000 18z', 'title' => 'Harga Terbaik', 'desc' => 'Harga bersaing dan promo menarik.'],
      ['icon' => 'M18.364 5.636l-1.414 1.414A9 9 0 105.636 18.364l1.414-1.414a7 7 0 119.9-9.9z', 'title' => 'Banyak Pilihan', 'desc' => 'Banyak produk miniatur tersedia.']
    ] as $feature)
    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition duration-300 border border-gray-200 text-center">
      <div class="flex justify-center mb-4">
        <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}" />
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $feature['title'] }}</h3>
      <p class="text-sm text-gray-600">{{ $feature['desc'] }}</p>
    </div>
    @endforeach
  </div>
</section>

@endsection
