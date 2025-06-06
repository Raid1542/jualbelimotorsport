@extends('layouts.produk')

@section('content')
<section class="py-16">
  <div class="max-w-7xl mx-auto px-6 flex gap-8">
    <!-- Sidebar Filter -->
<aside class="w-72 bg-white rounded-lg shadow-md p-6 space-y-6 sticky top-24 max-h-[80vh] overflow-y-auto shrink-0">

  <h2 class="text-xl font-semibold text-gray-800 mb-4">Filter Produk</h2>

  <!-- Kategori -->
  <div>
    <h3 class="font-semibold text-gray-700 mb-3">Kategori</h3>
    <div class="space-y-2 max-h-40 overflow-y-auto">
      @foreach(['Motor', 'Mobil'] as $kategori)
      <label class="flex items-center space-x-3 cursor-pointer hover:bg-yellow-50 rounded-md p-2 transition">
        <input type="checkbox" name="kategori[]" value="{{ $kategori }}" class="form-checkbox h-5 w-5 text-yellow-500" />
        <span class="text-gray-700">{{ $kategori }}</span>
      </label>
      @endforeach
    </div>
  </div>

  <!-- Warna -->
  <div>
    <h3 class="font-semibold text-gray-700 mb-3">Warna</h3>
    <div class="space-y-2 max-h-40 overflow-y-auto">
      @foreach(['Merah', 'Hitam', 'Putih', 'Biru', 'Kuning'] as $warna)
      <label class="flex items-center space-x-3 cursor-pointer hover:bg-yellow-50 rounded-md p-2 transition">
        <input type="checkbox" name="warna[]" value="{{ $warna }}" class="form-checkbox h-5 w-5 text-yellow-500" />
        <span class="text-gray-700">{{ $warna }}</span>
      </label>
      @endforeach
    </div>
  </div>

  <!-- Harga -->
  <div>
    <h3 class="font-semibold text-gray-700 mb-3">Harga</h3>
    <input type="number" name="harga_min" placeholder="Harga Minimum" class="w-full px-3 py-2 mb-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"/>
    <input type="number" name="harga_max" placeholder="Harga Maksimum" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"/>
  </div>

  <!-- Tombol aksi -->
  <div class="flex justify-between">
    <button type="reset" class="px-4 py-2 text-yellow-600 border border-yellow-600 rounded-md hover:bg-yellow-600 hover:text-white transition">Reset</button>
    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Terapkan</button>
  </div>

</aside>


    <!-- Produk Grid -->
    <main class="flex-grow">
      <div class="mb-10 text-center">
        <h2 class="text-4xl font-bold text-gray-800">Produk Saya</h2>
        <p class="text-gray-600">Berikut daftar produk yang dijual.</p>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach ($produks->take(30) as $produk)
        <a href="{{ route('produk.detail', $produk->id) }}" class="block bg-white rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
          <img src="{{ $produk->gambar ?? 'https://source.unsplash.com/400x300/?motorcycle&sig=' . $produk->id }}" class="w-full h-52 object-cover rounded-t-xl" alt="{{ $produk->nama }}">
          <div class="p-5">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk->nama }}</h3>
            <p class="text-yellow-600 font-bold text-lg mb-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500">Stok: {{ $produk->stok }} | Warna: {{ $produk->warna }}</p>
          </div>
        </a>
        @endforeach
      </div>
    </main>
  </div>
</section>
@endsection
