<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
    
    <!-- Kiri: Logo + SpeedZone -->
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/speedzone.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover">
      <h1 class="text-2xl font-extrabold text-yellow-500">Speedzone</h1>
    </div>
    
    <!-- Search Bar -->
    <form action="{{ route('produk') }}" method="GET" class="relative w-full max-w-sm mx-6">
      <!-- Ikon Search -->
      <svg xmlns="http://www.w3.org/2000/svg"
           class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"
           fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2" fill="none"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      </svg>

      <!-- Input Search -->
      <input 
        type="text" 
        name="keyword" 
        placeholder="Cari motor impianmu..." 
        value="{{ request('keyword') }}" 
        class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 shadow-inner focus:outline-none focus:ring-2 focus:ring-yellow-500 text-gray-700"
        id="searchInput"
      />
    </form>

    <!-- Kanan: Ikon Home -->
    <nav class="flex items-center space-x-6 text-gray-700">
      <a href="{{ route('dashboard') }}" class="hover:text-yellow-600 transition-transform transform hover:scale-110 text-2xl">
        <i class="fas fa-house-chimney"></i>
      </a>
    </nav>

  </div>
</header>

<!-- Auto-clear search -->
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
