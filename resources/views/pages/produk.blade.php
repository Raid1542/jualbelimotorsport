@extends('layouts.produk')

@section('content')
<section class="py-16">
  <div class="max-w-7xl mx-auto px-6 flex gap-8">

  <!-- Sidebar Filter -->
<form method="GET" action="{{ route('produk') }}" class="w-72 bg-white rounded-2xl shadow-lg p-6 space-y-6 sticky top-24 max-h-[80vh] overflow-y-auto shrink-0">
  <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L14 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 018 17v-3.586L3.293 6.707A1 1 0 013 6V4z" />
    </svg>
    Filter Produk
  </h2>

  <!-- Filter Kategori -->
  <div>
    <h3 class="text-lg font-semibold text-gray-700 mb-3">Kategori</h3>
    <div class="flex flex-col gap-2 max-h-48 overflow-y-auto pr-1">
      @forelse($kategoris as $kategori)
        <label class="flex items-center space-x-3 group hover:bg-yellow-50 px-3 py-2 rounded-md transition cursor-pointer">
          <input
            type="checkbox"
            name="kategori[]"
            value="{{ $kategori->nama }}"
            {{ in_array($kategori->nama, request()->get('kategori', [])) ? 'checked' : '' }}
            class="accent-yellow-500 w-5 h-5 rounded-md border-gray-300 focus:ring-yellow-500"
          />
          <span class="text-gray-700 group-hover:text-yellow-600 text-sm">{{ $kategori->nama }}</span>
        </label>
      @empty
        <p class="text-sm text-gray-500">Kategori belum tersedia.</p>
      @endforelse
    </div>
  </div>

  <!-- Filter Harga -->
  <div>
    <h3 class="text-lg font-semibold text-gray-700 mb-3">Harga (Rp)</h3>
    <div class="space-y-2">
      <input
        type="number"
        name="harga_min"
        placeholder="Minimum"
        value="{{ request('harga_min') }}"
        min="0"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500 text-sm"
      />
      <input
        type="number"
        name="harga_max"
        placeholder="Maksimum"
        value="{{ request('harga_max') }}"
        min="0"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-yellow-500 focus:border-yellow-500 text-sm"
      />
    </div>
  </div>

  <!-- Tombol Aksi -->
  <div class="flex justify-between pt-4 border-t">
    <a href="{{ route('produk') }}" class="px-4 py-2 text-yellow-600 border border-yellow-500 rounded-md hover:bg-yellow-500 hover:text-white transition text-sm font-semibold">
      Reset
    </a>
    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition text-sm font-semibold">
      Terapkan
    </button>
  </div>
</form>

    <!-- Produk Grid -->
    <main class="flex-grow">
      <div class="mb-10 text-center">
        <h2 class="text-4xl font-bold text-gray-800">Berikut Daftar Produk Yang Dijual</h2>
      </div>

      @if ($produks->isEmpty())
        <div class="text-center text-red-600 text-lg mt-10">
          Tidak ada produk yang ditemukan
          @if(request('keyword'))
            untuk kata kunci: <strong>"{{ request('keyword') }}"</strong>.
          @endif
        </div>
      @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
          @foreach ($produks->take(30) as $produk)
          <a href="{{ route('produk.show', $produk->id) }}" class="block bg-white rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
  <img src="{{ asset('images/' . $produk->gambar) }}" class="w-full h-52 object-cover rounded-t-xl" alt="{{ $produk->nama }}">
  <div class="p-5">
    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk->nama }}</h3>
    <p class="text-yellow-600 font-bold text-lg mb-1">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>

    {{-- Tambahan informasi kategori --}}
    <p class="text-sm text-gray-500 mb-1">
      Kategori: <span class="text-gray-700">{{ $produk->kategori->nama ?? '-' }}</span>
    </p>

    <p class="text-sm text-gray-500">
      Stok: {{ $produk->stok }} | Warna: {{ $produk->warna }}
    </p>
  </div>
</a>

          @endforeach
        </div>
      @endif
    </main>

  </div>
</section>
@endsection
