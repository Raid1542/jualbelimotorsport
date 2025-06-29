@extends('layouts.konfirmasi')

@section('title', 'Pesanan Berhasil')

@section('content')
@if(session('success'))
<!-- ✅ Modal AlpineJS muncul lalu redirect ke halaman pesanan -->
<div 
  x-data="{ open: true }"
  x-show="open"
  x-transition
  x-init="
    setTimeout(() => {
      open = false;
      window.location.href = '{{ route('pesanan') }}';
    }, 3000);
  "
  class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
>
  <div class="bg-white rounded-xl shadow-xl p-8 max-w-sm w-full text-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-green-500 mb-4" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 13l4 4L19 7" />
    </svg>
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Berhasil!</h2>
    <p class="text-gray-600 mb-4">Terima kasih telah berbelanja di <span class="text-yellow-600 font-semibold">Speedzone</span>.</p>
    <p class="text-sm text-gray-500">Mengalihkan ke halaman pesanan...</p>
  </div>
</div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
