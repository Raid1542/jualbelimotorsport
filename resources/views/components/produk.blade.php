@php
  $logoLink = match(session('produk_back_to')) {
      'home' => route('home'),
      'dashboard' => route('dashboard'),
      default => route('dashboard'),
  };
@endphp


<nav class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between relative">

    {{-- Kiri: Logo --}}
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/speedzone.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover">
      <a href="{{ $logoLink }}" class="text-2xl font-extrabold text-yellow-500">Speedzone</a>
    </div>

    {{-- Tengah: Search Bar --}}
    <form action="{{ route('produk') }}" method="GET"
          class="absolute left-1/2 transform -translate-x-1/2 w-full max-w-md">
      <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" 
                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
        </svg>

        <input 
          type="text" 
          name="keyword" 
          placeholder="Cari motor impianmu..." 
          value="{{ request('keyword') }}" 
          class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 shadow-inner 
                 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-gray-700"
          id="searchInput"
        />
      </div>
    </form>

    {{-- Kanan: Keranjang --}}
    <a href="/keranjang" class="hover:text-yellow-800 transition relative text-gray-700">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
        <path d="M6 6h15l-1.5 9h-13L4 4H2" stroke="currentColor" stroke-width="2" fill="none"/>
        <circle cx="9" cy="20" r="1.5" fill="currentColor"/>
        <circle cx="18" cy="20" r="1.5" fill="currentColor"/>
      </svg>
      @if($jumlahKeranjang > 0)
        <span class="absolute -top-2 -right-2 bg-yellow-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
          {{ $jumlahKeranjang }}
        </span>
      @endif
    </a>

  </div>
</nav>

{{-- Auto-clear search --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function () {
      if (this.value.trim() === '') {
        window.location.href = "{{ route('produk') }}";
      }
    });
  });
</script>
