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
      Temukan produk impianmu di Speedzone! Berbagai pilihan kategori mulai dari miniatur motor sport, miniatur motor biasa, dan mobil  dengan harga terbaik dan nikmati pengalaman belanja terbaik di Speedzone
    </p>
    <a href="{{ route('produk') }}"
       class="mt-10 bg-gray-100 text-gray-800 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-yellow-100 hover:scale-105 transition-all duration-300">
      Lihat Produk
    </a>
  </div>
</section>

{{-- Produk Section --}}
<section class="bg-gray-50 py-24">
  <div class="text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800">Produk Terbaru</h2>
    <p class="text-gray-600 mt-3 text-lg max-w-xl mx-auto">Produk terbaik pilihan untuk koleksi atau hadiah spesialmu!</p>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-12">
    @if($produkBaru->isEmpty())
      <div class="text-center text-gray-500 text-lg">Produk tidak ditemukan.</div>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($produkBaru->take(6) as $item)
          <div class="relative bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 group flex flex-col justify-between">

            {{-- Badge Produk Baru --}}
            <div class="absolute top-4 left-4 bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
              Baru
            </div>

            {{-- Gambar Produk --}}
            <a href="{{ route('produk.show', ['id' => $item->id]) }}" class="block overflow-hidden">
              <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}"
                   class="w-full h-56 object-cover transform group-hover:scale-105 transition duration-500 ease-in-out">
            </a>

            {{-- Detail Produk --}}
            <div class="p-5 text-center flex-1 flex flex-col justify-between">
              <div class="space-y-2">
                {{-- Nama Produk (dibatasi 1 baris dengan ellipsis) --}}
                <h3 class="text-xl font-bold text-gray-900 truncate" title="{{ $item->nama }}">
                  {{ $item->nama }}
                </h3>

                {{-- Tag Kategori (dibatasi juga jika panjang) --}}
                @if($item->kategori && $item->kategori->nama)
                  <span class="inline-block max-w-full truncate bg-gray-200 text-gray-700 text-xs font-medium px-3 py-1 rounded-full" title="{{ $item->kategori->nama }}">
                    {{ $item->kategori->nama }}
                  </span>
                @endif
              </div>

              {{-- Tombol Lihat Detail --}}
              <div class="mt-5">
                <a href="{{ route('produk.show', ['id' => $item->id]) }}"
                   class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold px-4 py-2 rounded-full shadow transition duration-300">
                  Lihat Detail
                </a>
              </div>
            </div>

          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>

{{-- Keunggulan SpeedZone --}}
<section class="bg-white py-24 px-6 lg:px-12">
  <div class="max-w-7xl mx-auto text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800">
      Kenapa Memilih <span class="text-yellow-500">SpeedZone?</span>
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
