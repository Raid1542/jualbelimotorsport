<header class="bg-yellow-400 shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
    
    <!-- Kiri: Logo + SpeedZone -->
    <div class="flex items-center space-x-3">
      <h1 class="text-2xl font-bold text-white">Speedzone</h1>
    </div>
    
    <!-- Search Bar -->
    <form action="#" method="GET" class="relative max-w-sm flex-grow mx-6">
      <!-- Ikon Search -->
      <svg xmlns="http://www.w3.org/2000/svg"
           class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-yellow-500"
           fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2" fill="none"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      </svg>

      <!-- Input Search -->
      <input 
        type="text" 
        name="keyword" 
        placeholder="Cari motor impianmu..." 
        class="w-full pl-10 pr-4 py-2 rounded-full shadow-inner focus:outline-none focus:ring-2 focus:ring-yellow-500 text-gray-700"
      />
    </form>
    
    <!-- Kanan: Ikon Home + Keranjang -->
    <nav class="flex items-center space-x-6 text-white">
     <!-- Home Icon (modern) -->
      <a href="/" class="hover:text-yellow-800 transition-transform transform hover:scale-110">
        <i class="fas fa-house-chimney text-2xl"></i>
      </a>

      <!-- Cart Icon -->
      <a href="/keranjang" class="hover:text-yellow-800 transition text-2xl relative">
        <i class="fas fa-shopping-cart"></i>
      </a>
    </nav>

  </div>
</header>
