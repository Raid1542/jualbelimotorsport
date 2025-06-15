@extends('layouts.dashboard')

@section('content')
<section class="py-16 max-w-4xl mx-auto">
  <h1 class="text-3xl font-bold mb-6 text-yellow-600">Pesanan Saya</h1>
  
  @if($pesanan->isEmpty())
    <p class="text-gray-500">Kamu belum memiliki pesanan.</p>
  @else
    <div class="space-y-4">
      @foreach($pesanan as $item)
        <div class="bg-white p-4 rounded shadow">
          <p><strong>Produk:</strong> {{ $item->produk->nama ?? 'Produk dihapus' }}</p>
          <p><strong>Status:</strong> {{ $item->status }}</p>
          <p><strong>Tanggal:</strong> {{ $item->created_at->format('d M Y') }}</p>
        </div>
      @endforeach
    </div>
  @endif
</section>
@endsection
