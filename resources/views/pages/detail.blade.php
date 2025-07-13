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

    {{-- Gambar Produk --}}
    <div x-data="{ open: false }" class="relative">
      <div @click="open = true" class="cursor-zoom-in overflow-hidden rounded-3xl shadow-xl">
        <img
          src="{{ $produk->gambar ? asset('images/' . $produk->gambar) : 'https://source.unsplash.com/600x400/?motorcycle' }}"
          alt="{{ $produk->nama }}"
          class="w-full h-auto max-h-[500px] object-cover transition-transform duration-500 hover:scale-105"
        >
      </div>

      {{-- Modal Preview --}}
      <div x-show="open" x-transition x-cloak
           class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
        <div @click.outside="open = false" class="max-w-4xl mx-auto p-6">
          <img src="{{ $produk->gambar ? asset('images/' . $produk->gambar) : 'https://source.unsplash.com/600x400/?motorcycle' }}"
               alt="{{ $produk->nama }}" class="rounded-xl w-full max-h-[80vh] object-contain">
          <button @click="open = false"
                  class="mt-4 block mx-auto bg-white text-yellow-600 font-bold px-4 py-2 rounded shadow hover:bg-yellow-100 transition">
            Tutup
          </button>
        </div>
      </div>
    </div>

    {{-- Detail Produk --}}
    <div class="flex flex-col justify-between space-y-6">
      <div>
        <h1 class="text-4xl font-extrabold text-gray-800 mb-3">{{ $produk->nama }}</h1>
        <p class="text-yellow-600 text-3xl font-bold mb-6">
          Rp{{ number_format($produk->harga, 0, ',', '.') }}
        </p>

        {{-- Deskripsi --}}
        <p class="text-gray-700 leading-relaxed text-base mb-6 border-l-4 border-yellow-500 pl-4 italic">
          {{ $produk->deskripsi ?? 'Tidak ada deskripsi produk yang tersedia.' }}
        </p>

        {{-- Info + Jumlah + Tombol --}}
        <div x-data="{ count: 1 }" class="space-y-4 mt-6">
          <div class="text-sm text-gray-700 space-y-1">
            <p><strong>Stok Tersedia:</strong> {{ $produk->stok }}</p>
            <p><strong>Warna:</strong> {{ $produk->warna }}</p>
            <p><strong>Kategori:</strong> {{ $produk->kategori->nama ?? '-' }}</p>
          </div>

          {{-- Input Jumlah --}}
          <div class="flex items-center border rounded-lg px-2 py-1 bg-white shadow-sm w-max">
            <button type="button" @click="if(count > 1) count--"
                    class="text-gray-500 hover:text-red-500 px-2 text-xl font-semibold">−</button>
            <input type="number" x-model="count"
                   name="jumlah" min="1" :max="{{ $produk->stok }}"
                   class="w-12 text-center border-0 focus:ring-0 text-base font-medium" />
            <button type="button" @click="if(count < {{ $produk->stok }}) count++"
                    class="text-yellow-300 hover:text-yellow-500 px-2 text-xl font-semibold">+</button>
          </div>

        {{-- Tombol Aksi --}}
<div class="flex flex-col sm:flex-row gap-4 pt-2">
  @if($produk->stok > 0)

    {{-- Masukkan ke Keranjang --}}
<form method="POST" action="{{ route('keranjang.tambah', $produk->id) }}"
      x-ref="formKeranjang"
      @submit.prevent="$refs.jumlahInput.value = count; $refs.formKeranjang.submit()">
  @csrf
  <input type="hidden" name="jumlah" x-ref="jumlahInput" />

  <button type="submit"
    class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl shadow-md font-semibold text-base transition-all duration-300">
    Masukkan ke Keranjang
  </button>
</form>


    {{-- Beli Sekarang --}}
  {{-- Beli Sekarang --}}
<form method="GET" action="{{ route('checkout.beli', $produk->id) }}"
      x-ref="formBeliSekarang"
      @submit.prevent="$refs.inputJumlahBeli.value = count; $refs.formBeliSekarang.submit()">
  <input type="hidden" name="jumlah" x-ref="inputJumlahBeli" />
  <button type="submit"
    class="w-full sm:w-auto text-center bg-gray-100 hover:bg-gray-200 text-yellow-600 px-6 py-3 rounded-xl shadow-md font-semibold text-base transition-all duration-300">
    Beli Sekarang
  </button>
</form>



  @else
    {{-- Produk Habis --}}
    <div class="text-center text-red-600 font-semibold py-2 px-4 bg-red-100 rounded-xl shadow w-full">
      Produk Habis
    </div>
  @endif
</div>


          </div>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- Produk Lainnya --}}
@if($produkLain->isNotEmpty())
<section class="py-16 bg-gradient-to-br from-white min-h-screen">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Produk Lainnya</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
      @foreach($produkLain as $item)
      <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow hover:shadow-md transition h-full">
        <a href="{{ route('produk.show', $item->id) }}" class="flex flex-col h-full">
          <img src="{{ asset('images/' . $item->gambar) }}"
               alt="{{ $item->nama }}"
               class="w-full h-48 object-cover">

          <div class="p-4 flex flex-col justify-between flex-1">
            <h3 class="text-base font-semibold text-gray-800 truncate">{{ $item->nama }}</h3>
            <p class="text-yellow-600 font-bold mt-1 text-sm">Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
            <span class="mt-2 text-sm text-yellow-600 hover:underline">
              Lihat Detail
            </span>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
