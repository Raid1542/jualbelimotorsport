@extends('layouts.produk')

@section('content')
<section class="py-16">
  <div class="max-w-7xl mx-auto px-6 flex gap-8">

    <!-- Sidebar Filter -->
    <form method="GET" action="{{ route('produk') }}" class="w-72 bg-white rounded-lg shadow-md p-6 space-y-6 sticky top-24 max-h-[80vh] overflow-y-auto shrink-0">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Filter Produk</h2>

      <!-- Kategori -->
      <div>
        <h3 class="font-semibold text-gray-700 mb-3">Kategori</h3>
        <div class="space-y-2 max-h-40 overflow-y-auto">
          @foreach(['Motor Sport', 'Motor', 'Mobil'] as $kategori)
          <label class="flex items-center space-x-3 cursor-pointer hover:bg-yellow-50 rounded-md p-2 transition">
            <input
              type="checkbox"
              name="kategori[]"
              value="{{ $kategori }}"
              {{ in_array($kategori, request()->get('kategori', [])) ? 'checked' : '' }}
              class="form-checkbox h-5 w-5 text-yellow-500"
            />
            <span class="text-gray-700">{{ $kategori }}</span>
          </label>
          @endforeach
        </div>
      </div>

      <!-- Harga -->
      <div>
        <h3 class="font-semibold text-gray-700 mb-3">Harga</h3>
        <input type="number" name="harga_min" placeholder="Harga Minimum" value="{{ request('harga_min') }}" class="w-full px-3 py-2 mb-2 border border-gray-300 rounded-md"/>
        <input type="number" name="harga_max" placeholder="Harga Maksimum" value="{{ request('harga_max') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md"/>
      </div>

      <!-- Tombol aksi -->
      <div class="flex justify-between">
        <a href="{{ route('produk') }}" class="px-4 py-2 text-yellow-600 border border-yellow-600 rounded-md hover:bg-yellow-600 hover:text-white transition">Reset</a>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Terapkan</button>
      </div>
    </form>

    <!-- Produk Grid -->
    <main class="flex-grow">
      <div class="mb-10 text-center">
        <h2 class="text-4xl font-bold text-gray-800">Produk Saya</h2>
        <p class="text-gray-600">Berikut daftar produk yang dijual.</p>
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
            {{-- ✅ Hanya satu gambar yang benar --}}
            <img src="{{ asset('images/' . $produk->gambar) }}" class="w-full h-52 object-cover rounded-t-xl" alt="{{ $produk->nama }}">
            <div class="p-5">
              <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk->nama }}</h3>
              <p class="text-yellow-600 font-bold text-lg mb-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
              <p class="text-sm text-gray-500">Stok: {{ $produk->stok }} | Warna: {{ $produk->warna }}</p>
            </div>
          </a>
          @endforeach
        </div>
      @endif
    </main>

  </div>
</section>
@endsection
