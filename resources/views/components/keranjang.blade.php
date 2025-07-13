<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between relative">

    {{-- 🅰️ Logo --}}
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/speedzone.jpg') }}" alt="Logo" class="w-10 h-10 rounded-full object-cover">
      <a href="{{ route('dashboard') }}" class="text-xl font-extrabold text-yellow-500">Speedzone</a>
    </div>

    {{-- 🅱️ Search Bar (Desktop Only) --}}
    <form action="{{ route('produk') }}" method="GET"
          class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-full max-w-md">
      <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2" fill="none"/>
          <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
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

    {{-- 🔍 Search Button (Mobile Only) --}}
    <button id="mobile-search-toggle" class="md:hidden text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2" fill="none"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      </svg>
    </button>

  </div>

  {{-- 🔽 Search Input (Mobile) --}}
  <div id="mobile-search-form" class="md:hidden hidden px-4 pb-4">
    <form action="{{ route('produk') }}" method="GET">
      <input 
        type="text" 
        name="keyword" 
        placeholder="Cari motor impianmu..." 
        value="{{ request('keyword') }}" 
        class="w-full mt-2 pl-4 pr-4 py-2 rounded-full border border-gray-300 shadow-inner 
               focus:outline-none focus:ring-2 focus:ring-yellow-500 text-gray-700"
      />
    </form>
  </div>
</header>

<!-- 🔁 Script: Toggle & Auto-clear -->
<script>
  // Toggle pencarian mobile
  document.getElementById('mobile-search-toggle').addEventListener('click', function () {
    const mobileSearch = document.getElementById('mobile-search-form');
    mobileSearch.classList.toggle('hidden');
  });

  // Auto-clear desktop
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
      searchInput.addEventListener('input', function () {
        if (this.value.trim() === '') {
          window.location.href = "{{ route('produk') }}";
        }
      });
    }
  });
</script>
