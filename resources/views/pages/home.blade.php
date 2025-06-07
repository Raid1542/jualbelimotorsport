@extends('layouts.home')

@section('content')

{{-- Hero Section --}}
<section class="h-screen bg-cover bg-center bg-no-repeat relative" 
  style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.85)), url('/images/miniatur.png');">

  <div class="relative z-10 max-w-7xl mx-auto h-full flex flex-col justify-center px-6 lg:px-12">
    <div class="grid md:grid-cols-2 gap-12 items-center animate-fade-in-up">

      {{-- Left Text + Search Bar --}}
      <div class="flex flex-col items-center md:items-start">
        <form action="{{ route('home') }}" method="GET" class="w-full max-w-md mb-8 relative">
          <svg xmlns="http://www.w3.org/2000/svg"
              class="w-6 h-6 absolute left-4 top-1/2 transform -translate-y-1/2 text-yellow-500"
              fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="7" stroke="currentColor" fill="none"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-linecap="round"/>
          </svg>

          <input 
              type="text" 
              name="keyword" 
              placeholder="Cari motor impianmu..." 
              value="{{ old('keyword', request('keyword')) }}"
              class="w-full px-14 py-3 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-gray-700"
          />
        </form>

        <h1 class="text-6xl md:text-8xl font-extrabold text-white leading-tight drop-shadow-2xl animate-pulse text-center md:text-left">
          Speedzone
        </h1>
        <p class="text-white text-lg mt-6 max-w-xl drop-shadow-md leading-relaxed tracking-wide text-center md:text-left">
          Temukan motor impianmu di SpeedZone! Berbagai pilihan motor sport premium dengan harga terbaik dan proses transaksi yang mudah & aman.
        </p>
        <div class="mt-8 flex flex-wrap gap-4 justify-center md:justify-start">
          <a href="#product" class="bg-yellow-500 text-white font-bold px-8 py-4 rounded-full hover:bg-yellow-600 transition-all duration-300 shadow-lg hover:scale-110">
            Lihat Produk
          </a>
        </div>
      </div>

      {{-- Right Image (Optional) --}}
      <div class="w-full max-w-md relative">
        {{-- Tambahkan gambar promosi jika diperlukan --}}
      </div>
    </div>
  </div>
</section>

{{-- Product Section --}}
<section id="product" class="bg-gray-50 py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-12">
    <div class="text-center mb-14">
      <h2 class="text-4xl font-extrabold text-gray-800">
        @if(request('keyword'))
          Hasil Pencarian: "{{ request('keyword') }}"
        @else
          Pilihan Produk Unggulan
        @endif
      </h2>
      <p class="text-gray-600 mt-3 max-w-xl mx-auto">
        @if(request('keyword'))
          Menampilkan hasil pencarian untuk motor dengan kata kunci tersebut.
        @else
          Lihat koleksi motor sport terbaik yang kami sediakan untukmu.
        @endif
      </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse ($produk as $item)
        <a href="{{ route('produk.show', $item->id) }}">
          <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-2xl transition-transform transform hover:-translate-y-2 hover:scale-105 cursor-pointer">
            <img 
              src="{{ $item->gambar ? asset('images/' . $item->gambar) : 'https://source.unsplash.com/400x300/?motorcycle' }}"
              class="w-full h-60 object-cover"
              alt="{{ $item->nama }}"
            >
            <div class="p-6">
              <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $item->nama }}</h3>
              <p class="text-xl text-yellow-600 font-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
            </div>
          </div>
        </a>
      @empty
        <p class="text-gray-600 text-center col-span-3">Produk tidak ditemukan.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
