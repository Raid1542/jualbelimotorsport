<nav class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center relative">
    
    {{-- Kiri: Logo --}}
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/speedzone.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover">
      <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-yellow-500">SpeedZone</a>
    </div>

    {{-- Tengah: Navigasi Utama --}}
    <div class="absolute left-1/2 transform -translate-x-1/2 flex gap-8">
      <a href="{{ route('produk') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">Produk</a>
      <a href="{{ route('tentang') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">Tentang Kami</a>
    </div>

    {{-- Kanan: Ikon Profil Dropdown --}}
    <div class="relative group">
      <button class="focus:outline-none">
        <img src="{{ asset('images/user-icon.png') }}" alt="Profil" class="w-10 h-10 rounded-full border border-gray-300 cursor-pointer">
      </button>

      {{-- Sidebar/Dropdown --}}
      <div class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
        <a href="{{ route('profil') }}" class="block px-4 py-3 hover:bg-gray-100 text-gray-700">Akun Saya</a>
        <a href="{{ route('pesanan') }}" class="block px-4 py-3 hover:bg-gray-100 text-gray-700">Pesanan</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full text-left px-4 py-3 hover:bg-gray-100 text-red-600">Logout</button>
        </form>
      </div>
    </div>

  </div>
</nav>
