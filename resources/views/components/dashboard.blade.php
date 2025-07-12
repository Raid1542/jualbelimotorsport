<nav class="bg-white shadow-md sticky top-0 z-50 transition duration-300">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

    {{-- Kiri: Logo --}}
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/speedzone.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover">
      <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-yellow-500">Speedzone</a>
    </div>

    {{-- Tengah: Search --}}
    <div class="hidden lg:flex flex-1 justify-center px-6">
      <form action="{{ route('produk') }}" method="GET" class="relative w-full max-w-md">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Cari produk..."
          class="w-full border border-gray-300 rounded-full py-2 pl-4 pr-10 text-sm
                 text-gray-700 shadow-inner
                 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition">
        <button type="submit" class="absolute right-3 top-2.5 text-gray-500 hover:text-yellow-600">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
          </svg>
        </button>
      </form>
    </div>

    {{-- Kanan: Menu --}}
    <div class="hidden lg:flex items-center space-x-5">

      {{-- Menu --}}
<a href="{{ route('produk', ['from' => 'dashboard']) }}"
   class="text-gray-700 hover:text-yellow-600 font-semibold transition duration-300 px-3 py-2 rounded-md">
   Produk
</a>

<a href="{{ route('tentang') }}"
   class="text-gray-700 hover:text-yellow-600 font-semibold transition duration-300 px-3 py-2 rounded-md">
   Tentang
</a>

<a href="{{ route('pesanan') }}"
   class="text-gray-700 hover:text-yellow-600 font-semibold transition duration-300 px-3 py-2 rounded-md">
   Pesanan
</a>


      {{-- Keranjang dengan Pop-up --}}
<div class="relative group">
  <button class="hover:text-yellow-600 relative focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
      <path d="M6 6h15l-1.5 9h-13L4 4H2" stroke="currentColor" stroke-width="2" fill="none"/>
      <circle cx="9" cy="20" r="1.5"/>
      <circle cx="18" cy="20" r="1.5"/>
    </svg>
    @if($jumlahKeranjang > 0)
    <span class="absolute -top-2 -right-2 bg-yellow-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
      {{ $jumlahKeranjang }}
    </span>
    @endif
  </button>

  {{-- Dropdown Isi Keranjang --}}
  <div class="absolute right-0 mt-2 w-80 bg-white border rounded-lg shadow-lg z-50 
              opacity-0 invisible group-hover:opacity-100 group-hover:visible 
              transition-all duration-200">
    <div class="p-4 border-b flex justify-between items-center font-semibold text-gray-800">
      <span>Keranjang ({{ $jumlahKeranjang }})</span>
      <a href="{{ route('keranjang.index') }}" class="text-sm text-yellow-500 hover:underline">Lihat Semua</a>
    </div>

    <div class="max-h-64 overflow-y-auto">
      @forelse($keranjangDropdown as $item)
        <div class="flex items-center px-4 py-3 hover:bg-gray-50 transition">
          <div class="relative w-14 h-14">
            <img src="{{ asset('images/' . $item->produk->gambar) }}" class="w-full h-full object-cover rounded">
          </div>
          <div class="ml-3 flex-1">
            <p class="text-sm font-semibold text-gray-800 truncate">{{ $item->produk->nama }}</p>
            <p class="text-xs text-gray-500">Jumlah: {{ $item->jumlah }}</p>
          </div>
        </div>
      @empty
        <div class="text-center text-gray-500 text-sm px-4 py-6">Keranjang kamu kosong</div>
      @endforelse
    </div>
  </div>
</div>
      </a>

      {{-- Profil --}}
      <div class="relative group">
        <img src="{{ $user->foto ? asset('images/' . $user->foto) : asset('images/default.jpg') }}" alt="Profil"
          class="w-10 h-10 rounded-full border object-cover cursor-pointer">
        <div class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
          <a href="{{ route('profil') }}" class="block px-4 py-3 hover:bg-gray-100 text-gray-700">Akun Saya</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 hover:bg-gray-100 text-red-600">Logout</button>
          </form>
        </div>
      </div>
    </div>

    {{-- Mobile Hamburger --}}
    <div class="lg:hidden">
      <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="text-gray-600 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </div>

  {{-- Mobile Menu --}}
  <div id="mobileMenu" class="lg:hidden px-4 pb-4 space-y-2 hidden">
    <a href="{{ route('produk', ['from' => 'dashboard']) }}" class="hover:text-yellow-600 font-semibold">Produk</a>
    <a href="{{ route('tentang') }}" class="block text-gray-700">Tentang</a>
    <a href="{{ route('pesanan') }}" class="block text-gray-700">Pesanan</a>
    <a href="{{ route('keranjang.index') }}" class="block text-gray-700">Keranjang</a>
    <a href="{{ route('profil') }}" class="block text-gray-700">Akun Saya</a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="w-full text-left text-red-600">Logout</button>
    </form>
  </div>
</nav>
