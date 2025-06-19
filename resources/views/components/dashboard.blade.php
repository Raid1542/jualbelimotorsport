<nav class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center relative">

    {{-- Kiri: Logo --}}
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/speedzone.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover">
      <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-yellow-500">SpeedZone</a>
    </div>

    {{-- Tengah: Navigasi --}}
    <div class="absolute left-1/2 transform -translate-x-1/2 flex gap-8">
      <a href="{{ route('produk') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">Produk</a>
      <a href="{{ route('tentang') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">Tentang Kami</a>
      <a href="{{ route('favorite.index') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">Favorite</a>
    </div>

    {{-- Kanan: Search, Keranjang (ikon), dan Profil --}}
    <div class="flex items-center space-x-4">

      {{-- Search Bar --}}
      <form action="{{ route('produk') }}" method="GET" class="relative mr-1">
        <input type="text" name="keyword" placeholder="Cari produk..."
          class="border border-gray-300 rounded-full py-1.5 pl-4 pr-10 text-sm focus:ring-yellow-400 focus:border-yellow-500 w-48 transition">
        <button type="submit" class="absolute right-2 top-1.5 text-gray-500 hover:text-yellow-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
          </svg>
        </button>
      </form>

     {{-- Ikon Keranjang dengan badge --}}
<a href="/keranjang" class="hover:text-yellow-800 transition relative">
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


      {{-- Dropdown Profil --}}
      <div class="relative group">
        <button class="focus:outline-none">
          @php
            use Illuminate\Support\Facades\Auth;
            $user = Auth::user();
            $foto = $user && $user->foto
                ? asset('images/' . $user->foto)
                : asset('images/default.jpg');
          @endphp
          <img src="{{ $foto }}" alt="Profil"
            class="w-10 h-10 rounded-full border border-gray-300 object-cover cursor-pointer">
        </button>

        <div
          class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
          <a href="{{ route('profil') }}" class="block px-4 py-3 hover:bg-gray-100 text-gray-700">Akun Saya</a>
          <a href="{{ route('pesanan') }}" class="block px-4 py-3 hover:bg-gray-100 text-gray-700">Pesanan Saya</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 hover:bg-gray-100 text-red-600">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>
