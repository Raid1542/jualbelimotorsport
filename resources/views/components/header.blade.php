<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
    
    {{-- Kiri: Logo dan Nama --}}
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/speedzone.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover">
      <span class="text-2xl font-extrabold text-yellow-500">Speedzone</span>
    </div>

    {{-- Tengah: Navigasi Desktop --}}
    <nav class="hidden md:flex gap-8 font-semibold">
      <a href="{{ route('produk2') }}" class="text-gray-700 hover:text-yellow-600">Produk</a>
      <a href="{{ route('tentang') }}" class="text-gray-700 hover:text-yellow-600">Tentang Kami</a>
    </nav>

    {{-- Kanan: Login & Hamburger --}}
    <div class="flex items-center space-x-4">
      {{-- Tombol Login --}}
      <a href="{{ route('login') }}">
        <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
          Login
        </button>
      </a>

      {{-- Hamburger Mobile --}}
      <button id="menu-toggle" class="md:hidden focus:outline-none text-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </div>

  {{-- Mobile Menu --}}
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
    <a href="{{ route('produk2') }}" class="block py-2 text-gray-700 hover:text-yellow-600 font-semibold">Produk</a>
    <a href="{{ route('tentang') }}" class="block py-2 text-gray-700 hover:text-yellow-600 font-semibold">Tentang Kami</a>
  </div>
</header>

{{-- JS Toggle for Mobile Menu --}}
<script>
  const toggleBtn = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  toggleBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
