<header class="bg-yellow-400 shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between relative min-h-[80px]">

    <!-- Panah kembali di kiri -->
    <a href="{{ route('produk') }}" class="absolute left-4 text-white hover:text-yellow-800 transition-transform transform hover:scale-110 text-lg font-medium flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
    </a>

    <!-- Ikon di kanan -->
    <div class="absolute right-4 flex items-center space-x-6 text-white">
     <!-- Home Icon (modern) -->
      <a href="/dashboard" class="hover:text-yellow-800 transition-transform transform hover:scale-110">
        <i class="fas fa-house-chimney text-2xl"></i>
      </a>

      <!-- Keranjang -->
      <a href="/keranjang" class="hover:text-yellow-800 transition text-2xl relative">
        <i class="fas fa-shopping-cart"></i>
      </a>
    </div>

  </div>
</header>
