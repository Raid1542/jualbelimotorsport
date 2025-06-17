@extends('layouts.detail')

@section('content')
<section class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-start">

    <!-- Gambar Produk -->
    <div>
      <img
        src="{{ $produk->gambar ? asset('images/' . $produk->gambar) : 'https://source.unsplash.com/600x400/?motorcycle' }}"
        alt="{{ $produk->nama }}"
        class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow-md"
      >
    </div>

    <!-- Detail Produk -->
    <div>
      <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ $produk->nama }}</h2>
      <p class="text-yellow-600 text-2xl font-semibold mb-6">
        Rp{{ number_format($produk->harga, 0, ',', '.') }}
      </p>

      <p class="text-gray-700 mb-6">{{ $produk->deskripsi ?? 'Tidak ada deskripsi.' }}</p>

      <ul class="mb-6 space-y-2 text-sm text-gray-600">
        <li><strong>Stok:</strong> {{ $produk->stok }}</li>
        <li><strong>Warna:</strong> {{ $produk->warna }}</li>
        <li><strong>Kategori:</strong> {{ $produk->kategori->nama ?? '-' }}</li>
      </ul>

      <div class="flex gap-4">
        {{-- Tombol Tambah ke Keranjang (pakai POST, bukan GET) --}}
        <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
  @csrf
  <button type="submit"
    class="bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600 transition">
    Tambah ke Keranjang
  </button>
</form>


        {{-- Tombol Beli Sekarang --}}
        <a href="{{ route('checkout', $produk->id) }}"
          class="bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600 transition">
          Beli Sekarang
        </a>
      </div>
    </div>

  </div>
</section>
@endsection
