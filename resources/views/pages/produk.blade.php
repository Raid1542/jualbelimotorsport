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
          <label class="flex items-center space-x-3 cursor-pointer hover:bg-yellow-50 rounded-md p-2 transition">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-yellow-500" />
            <span class="text-gray-700">Merah</span>
          </label>
          <label class="flex items-center space-x-3 cursor-pointer hover:bg-yellow-50 rounded-md p-2 transition">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-yellow-500" />
            <span class="text-gray-700">Kuning</span>
          </label>
          <label class="flex items-center space-x-3 cursor-pointer hover:bg-yellow-50 rounded-md p-2 transition">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-yellow-500" />
            <span class="text-gray-700">Hijau</span>
          </label>
          <label class="flex items-center space-x-3 cursor-pointer hover:bg-yellow-50 rounded-md p-2 transition">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-yellow-500" />
            <span class="text-gray-700">Biru</span>
          </label>
        </div>
      </div>

      <!-- Harga -->
      <div>
        <h3 class="font-semibold text-gray-700 mb-3">Harga</h3>
        <input type="number" placeholder="Harga" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"/>
      </div>

      <!-- Tombol aksi -->
      <div class="flex justify-between">
        <button class="px-4 py-2 text-yellow-600 border border-yellow-600 rounded-md hover:bg-yellow-600 hover:text-white transition">Reset</button>
        <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Terapkan</button>
      </div>

    </aside>

    <!-- Produk Grid -->
    <main class="flex-grow">
      <div class="mb-10 text-center">
        <h2 class="text-4xl font-bold text-gray-800">Produk Saya</h2>
        <p class="text-gray-600">Berikut daftar motor yang dijual.</p>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
  @for ($i = 1; $i <= 21; $i++)
  <a href="{{ route('produk.detail', ['id' => $i]) }}" class="block bg-white rounded-xl shadow hover:shadow-xl transition transform hover:-translate-y-1">
    <img src="https://source.unsplash.com/400x300/?motorcycle&sig={{ $i }}" class="w-full h-52 object-cover rounded-t-xl" alt="Motor {{ $i }}">
    <div class="p-5">
      <h3 class="text-xl font-semibold text-gray-800 mb-2">Motor {{ $i }}</h3>
      <p class="text-yellow-600 font-bold text-lg mb-4">Rp{{ number_format(15000000 + ($i * 1000000), 0, ',', '.') }}</p>
    </div>
  </a>
  @endfor
</div>
    </main>
  </div>
</section>
@endsection
