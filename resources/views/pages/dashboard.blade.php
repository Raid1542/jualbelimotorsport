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
<section class="bg-white py-16">
  <div class="text-center mb-12">
    <h2 class="text-3xl font-extrabold text-gray-800">Produk Terbaru</h2>
    <p class="text-gray-600 mt-2">Lihat motor-motor terbaru kami yang siap untuk kamu miliki.</p>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-12 space-y-20">
@foreach($produkBaru->take(4) as $index => $item)
  <div class="flex flex-col md:flex-row {{ $index % 2 === 1 ? 'md:flex-row-reverse' : '' }} gap-10 items-center">
    <div>
      <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}"
        class="w-full h-80 object-cover rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
    </div>
    <div class="flex flex-col space-y-6">
      <h3 class="text-3xl font-bold text-gray-800 text-center">{{ $item->nama }}</h3>
      <div class="flex justify-center">
        <a href="{{ route('produk.show', ['id' => $item->id]) }}"
          class="bg-yellow-500 text-white font-semibold px-6 py-3 rounded-full hover:bg-yellow-600 transition duration-300">
          Belanja Sekarang
        </a>
      </div>
    </div>
  </div>
@endforeach
  </div>
</section>



{{-- Keunggulan SpeedZone --}}
<section class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-6 lg:px-12">
    <div class="text-center mb-12">
      <h2 class="text-4xl font-extrabold text-gray-800">Kenapa Memilih SpeedZone?</h2>
      <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Kami memberikan pengalaman berbelanja yang tidak hanya mudah, tapi juga terpercaya dan profesional.</p>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="text-center">
        <div class="mx-auto mb-4 w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" /></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Jaminan Keaslian</h3>
        <p class="text-gray-600">Proses pengiriman cepat, aman dan terpercaya.</p>
      </div>
      <div class="text-center">
        <div class="mx-auto mb-4 w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 10h11l1-2h6v10h-6l-1-2H3z" /></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Layanan Prioritas</h3>
        <p class="text-gray-600">Dukungan pelanggan cepat dan personal.</p>
      </div>
      <div class="text-center">
        <div class="mx-auto mb-4 w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3" /></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Proses Mudah</h3>
        <p class="text-gray-600">Akses histori transaksi dan motor favoritmu.</p>
      </div>
    </div>
  </div>
</section>

@endsection
