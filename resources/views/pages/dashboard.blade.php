@extends('layouts.dashboard')

@section('content')

@if($show_welcome)
  <div class="bg-white text-black font-medium px-6 py-4 mb-6 rounded-lg shadow-sm">
    <div class="max-w-7xl mx-auto text-center">
      <h1 class="text-2xl md:text-3xl font-extrabold">Selamat Datang, {{ $user->name }}!</h1>
    </div>
  </div>
@endif

{{-- Hero Section --}}
<section class="w-full bg-cover bg-center bg-no-repeat relative overflow-hidden"
         style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.85)), url('/images/miniatur.png')">
  <div class="relative z-10 max-w-7xl mx-auto py-24 md:py-36 px-6 lg:px-12 text-center flex flex-col items-center">
    
    <h1 class="text-5xl md:text-6xl font-extrabold text-white leading-tight drop-shadow-xl">
      Speedzone
    </h1>
    
    <p class="text-white text-lg mt-6 max-w-2xl leading-relaxed tracking-wide">
      Temukan produk impianmu di Speedzone! Berbagai pilihan kategori mulai dari miniatur motor sport, miniatur motor biasa, dan mobil
      dengan harga terbaik dan nikmati pengalaman belanja terbaik di Speedzone.
    </p>
    
    <a href="{{ route('produk', ['from' => 'dashboard']) }}"
       class="mt-10 inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold text-lg px-8 py-3 rounded-full shadow-lg transition duration-300">
      Lihat Produk
    </a>

  </div>
</section>


<section class="bg-gray-100 py-20">
  <div class="text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800">Produk Terbaru</h2>
    <p class="text-gray-600 mt-3 text-lg max-w-2xl mx-auto">Temukan pilihan terbaik koleksi miniatur favoritmu di SpeedZone.</p>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-12 grid gap-8 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
      @foreach($produkBaru->take(8) as $item)
        <a href="{{ route('produk.show', $item->id) }}"
           class="group bg-white border rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:scale-105 overflow-hidden">

          {{-- Gambar --}}
          <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}"
               class="w-full h-44 object-cover transition-transform duration-300 ease-in-out">

          {{-- Konten --}}
          <div class="p-3 space-y-1">
            {{-- Nama Produk --}}
            <h3 class="text-sm text-gray-800 font-semibold leading-tight line-clamp-2">
              {{ $item->nama }}
            </h3>

            {{-- Harga --}}
            <div class="text-yellow-500 font-bold text-base">
              Rp{{ number_format($item->harga, 0, ',', '.') }}
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- Keunggulan SpeedZone --}}
<section class="bg-white py-24 px-6 lg:px-12">
  <div class="max-w-7xl mx-auto text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800">
      Kenapa Memilih <span class="text-yellow-500">Speedzone?</span>
    </h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto mt-4">
      Kami tidak hanya menjual produk, tapi juga memberikan pengalaman belanja yang luar biasa.
    </p>
  </div>

  <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4 max-w-7xl mx-auto">
    @foreach([
      ['icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Garansi & Keamanan', 'desc' => 'Pembelian bergaransi & sistem pembayaran terpercaya.'],
      ['icon' => 'M3 10h11M9 21V3M17 16l4-4m0 0l-4-4m4 4H9', 'title' => 'Pengiriman Cepat', 'desc' => 'Pesanan dikirim cepat dengan ekspedisi prioritas.'],
      ['icon' => 'M7 8h10M7 12h4m1 8a9 9 0 100-18 9 9 0 000 18z', 'title' => 'Harga Terbaik', 'desc' => 'Harga kompetitif dan banyak promo menarik.'],
      ['icon' => 'M18.364 5.636l-1.414 1.414A9 9 0 105.636 18.364l1.414-1.414a7 7 0 119.9-9.9z', 'title' => 'Banyak Pilihan', 'desc' => 'Miniatur motor & mobil dari berbagai jenis.']
    ] as $feature)
    <div class="bg-gray-50 border border-gray-200 p-6 rounded-2xl text-center shadow-sm hover:shadow-md transition duration-300">
      <div class="flex justify-center mb-4">
        <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}" />
          </svg>
        </div>
      </div>
      <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $feature['title'] }}</h3>
      <p class="text-sm text-gray-600">{{ $feature['desc'] }}</p>
    </div>
    @endforeach
  </div>
</section>

@endsection
