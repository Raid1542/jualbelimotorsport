@extends('layouts.home')

@section('content')
{{-- Hero Section --}}
<section class="h-screen bg-cover bg-center bg-no-repeat relative" 
  style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.85)), url('/images/iklan2.png');">

  <div class="relative z-10 max-w-7xl mx-auto h-full flex flex-col justify-center px-6 lg:px-12">
    <div class="grid md:grid-cols-2 gap-12 items-center animate-fade-in-up">

      {{-- Left Text + Search Bar --}}
      <div class="flex flex-col items-center md:items-start">
        
        {{-- Search Bar --}}
        <form action="#" method="GET" class="w-full max-w-md mb-8 relative mx-auto">
  <!-- Ikon Search -->
  <svg xmlns="http://www.w3.org/2000/svg"
       class="w-6 h-6 absolute left-4 top-1/2 transform -translate-y-1/2 text-yellow-500"
       fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2" fill="none"/>
    <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
  </svg>

  <!-- Input Search -->
  <input 
    type="text" 
    name="keyword" 
    placeholder="Cari motor impianmu..." 
    class="w-full px-14 py-3 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-gray-700"
  />
</form>


        {{-- Judul dan teks --}}
        <h1 class="text-6xl md:text-8xl font-extrabold text-white leading-tight drop-shadow-2xl animate-pulse text-center md:text-left">Speedzone</h1>
        <p class="text-white text-lg mt-6 max-w-xl drop-shadow-md leading-relaxed tracking-wide text-center md:text-left">
          Temukan motor impianmu di SpeedZone! Berbagai pilihan motor sport premium dengan harga terbaik dan proses transaksi yang mudah & aman.
        </p>
        <div class="mt-8 flex flex-wrap gap-4 justify-center md:justify-start">
          <a href="#product" class="bg-yellow-500 text-white font-bold px-8 py-4 rounded-full hover:bg-yellow-600 transition-all duration-300 shadow-lg hover:scale-110">
            Lihat Produk
          </a>
        </div>
      </div>

      {{-- Right Image --}}
      <div class="w-full max-w-md relative">
        {{-- Kalau mau gambar bisa ditaruh sini --}}
      </div>
    </div>
  </div>
</section>

{{-- Product Section --}}
<section id="product" class="bg-gray-50 py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-12">
    <div class="text-center mb-14">
      <h2 class="text-4xl font-extrabold text-gray-800">Pilihan Motor Unggulan</h2>
      <p class="text-gray-600 mt-3 max-w-xl mx-auto">Lihat koleksi motor sport terbaik yang kami sediakan untukmu.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-10">
      @foreach ([
        ['img' => '/images/Yamaha.jpg', 'nama' => 'Yamaha R15 V4', 'harga' => 'Rp 38.000.000'],
        ['img' => '/images/Honda.jpg', 'nama' => 'Honda CBR250RR', 'harga' => 'Rp 62.000.000'],
        ['img' => '/images/Ducati.jpg', 'nama' => 'Ducati Panigale V4', 'harga' => 'Rp 799.000.000']
      ] as $item)
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-2xl transition-transform transform hover:-translate-y-2 hover:scale-105 cursor-pointer">
        <img src="{{ $item['img'] }}" class="w-full h-60 object-cover" alt="{{ $item['nama'] }}">
        <div class="p-6">
          <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $item['nama'] }}</h3>
          <p class="text-xl text-yellow-600 font-bold">{{ $item['harga'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Features Section --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-8">Mengapa Memilih SpeedZone?</h2>
    <div class="grid md:grid-cols-3 gap-12 max-w-5xl mx-auto">
      <div class="flex flex-col items-center text-center p-6 border rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h3 class="text-xl font-semibold mb-2">Harga Kompetitif</h3>
        <p class="text-gray-600">Motor sport premium dengan harga terbaik dan berbagai penawaran menarik.</p>
      </div>
      <div class="flex flex-col items-center text-center p-6 border rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M9 21V3m6 18V3" />
        </svg>
        <h3 class="text-xl font-semibold mb-2">Transaksi Aman</h3>
        <p class="text-gray-600">Proses pembelian cepat, mudah, dan terjamin keamanannya.</p>
      </div>
      <div class="flex flex-col items-center text-center p-6 border rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h3 class="text-xl font-semibold mb-2">Layanan Cepat</h3>
        <p class="text-gray-600">Dukungan pelanggan responsif siap membantu setiap kebutuhanmu.</p>
      </div>
    </div>
  </div>
</section>
@endsection