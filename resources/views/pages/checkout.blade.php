@extends('layouts.checkout')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
  <h2 class="text-2xl font-bold mb-4">Checkout Produk</h2>

  <div class="flex gap-6 items-center">
    <img src="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : 'https://source.unsplash.com/200x200/?motorcycle' }}" 
         alt="{{ $produk->nama }}" class="w-40 h-40 object-cover rounded-lg shadow">

    <div>
      <h3 class="text-xl font-semibold">{{ $produk->nama }}</h3>
      <p class="text-gray-700 mt-2">Harga: <strong>Rp {{ number_format($produk->harga, 0, ',', '.') }}</strong></p>

      <form action="{{ route('checkout.proses') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
        <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition">
          Konfirmasi & Bayar
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
