@extends('layouts.dashboard')

@section('content')


@if($show_welcome)
  <div class="text-black font-medium px-6 py-4 mb-6 rounded-lg">
    <div class="max-w-7xl mx-auto text-center">
      <h1 class="text-2xl md:text-3xl font-extrabold tracking-wide">Selamat Datang, {{ $user->name }}!</h1>
    </div>
  </div>
@endif


<section 
  class="w-full bg-cover bg-center bg-no-repeat relative overflow-hidden"
  style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.85)), url('/images/miniatur.png')"
>
  <div class="relative z-10 max-w-7xl mx-auto py-20 md:py-32 px-6 lg:px-12 flex flex-col items-center text-center">
    <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight drop-shadow-2xl">
      Speedzone
    </h1>
    <p class="text-white text-lg mt-6 max-w-2xl drop-shadow-md leading-relaxed tracking-wide">
     Temukan produk impianmu di Speedzone! Berbagai pilihan kategori mulai dari miniatur motor sport, miniatur motor biasa, dan mobil  dengan harga terbaik dan nikmati pengalaman belanja terbaik di Speedzone
    </p>
    <a href="{{ route('produk') }}"
       class="mt-8 bg-yellow-500 text-white font-bold px-8 py-4 rounded-full hover:bg-yellow-600 transition-all duration-300 shadow-lg hover:scale-110">
      Lihat Produk
    </a>
  </div>
</section>




{{-- Produk Section --}}
<section class="bg-gray-100 py-20">
  <div class="text-center mb-16">
    @if(request()->has('keyword'))
      <h2 class="text-4xl font-extrabold text-gray-800">Hasil Pencarian</h2>
      <p class="text-gray-600 mt-3 text-lg">Menampilkan hasil untuk: <strong>"{{ request('keyword') }}"</strong></p>
    @else
      <h2 class="text-4xl font-extrabold text-gray-800">Produk Terbaru</h2>
      <p class="text-gray-600 mt-3 text-lg">Temukan Produk terbaik pilihan anda di Speedzone, cocok untuk menjadi koleksi kamu di rumah.</p>
    @endif
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-12 space-y-20">
    @forelse($produkBaru as $index => $item)
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

          <a href="{{ route('produk.show', ['id' => $item->id]) }}"
            class="inline-block mt-6 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-7 py-3 rounded-full shadow-md hover:shadow-lg transition transform hover:scale-105 duration-300">
            Belanja Sekarang
          </a>
        </div>
      </div>
    @empty
      <div class="text-center text-gray-500 text-lg">
        Produk tidak ditemukan.
      </div>
    @endforelse
  </div>
</section>

{{-- Kenapa Memilih SpeedZone --}}
<section class="bg-gray-100 py-24 px-6 lg:px-12">
  <div class="max-w-7xl mx-auto text-center mb-16">
    <h2 class="text-4xl font-extrabold text-gray-800 mb-4">
      Kenapa Memilih <span class="text-yellow-500">Speedzone?</span>
    </h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
      Kami memberikan lebih dari sekadar produk. SpeedZone adalah pilihan cerdas untuk performa, harga, dan pelayanan terbaik.
    </p>
  </div>

  <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4 max-w-7xl mx-auto">
    @foreach([
      ['icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Garansi & Keamanan', 'desc' => 'Setiap pembelian dilengkapi garansi resmi dan sistem pembayaran aman.'],
      ['icon' => 'M3 10h11M9 21V3M17 16l4-4m0 0l-4-4m4 4H9', 'title' => 'Pengiriman Cepat', 'desc' => 'Layanan ekspedisi prioritas. Pesanan kamu akan tiba dengan cepat & aman.'],
      ['icon' => 'M7 8h10M7 12h4m1 8a9 9 0 100-18 9 9 0 000 18z', 'title' => 'Harga Terbaik', 'desc' => 'Dapatkan harga kompetitif dengan berbagai pilihan menarik.'],
      ['icon' => 'M18.364 5.636l-1.414 1.414A9 9 0 105.636 18.364l1.414-1.414a7 7 0 119.9-9.9z', 'title' => 'Banyak Pilihan', 'desc' => 'Beragam produk terbaru dari berbagai miniatur yang tersedia.']
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
