<header class="bg-yellow-400 shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between relative min-h-[80px]">

    <!-- Panah kembali -->
    <a href="{{ route('produk') }}" class="absolute left-4 text-white hover:text-yellow-800 transition-transform transform hover:scale-110 text-lg font-medium flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
    </a>

    <!-- Ikon kanan -->
    <div class="absolute right-6 flex items-center space-x-6 text-white">
      <!-- Home Icon (modern) -->
      <a href="/" class="hover:text-yellow-800 transition-transform transform hover:scale-110">
        <i class="fas fa-house-chimney text-2xl"></i>
      </a>

<!-- SVG Profil Modern -->
<a href="{{ route('profil') }}" class="hover:text-yellow-800 transition-transform transform hover:scale-110">
  <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
    <path d="M12 12c2.7 0 4.5-2 4.5-4.5S14.7 3 12 3 7.5 5 7.5 7.5 9.3 12 12 12zm0 2c-3 0-9 1.5-9 4.5V21h18v-2.5c0-3-6-4.5-9-4.5z" />
  </svg>
</a>



  </div>
</header>
