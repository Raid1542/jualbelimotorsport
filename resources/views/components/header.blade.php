<header class="fixed top-0 left-0 w-full z-10 flex items-center justify-between px-8 py-4 bg-yellow-400 bg-opacity-90 shadow">
  <div class="flex items-center space-x-3 font-bold text-xl text-white">
    <!-- Logo bulat diperbesar -->
    <div class="w-16 h-16 rounded-full overflow-hidden bg-white flex-shrink-0">
      <img src="/images/speedzone.jpg" alt="logo" class="w-full h-full object-cover" />
    </div>
    <span class="text-2xl md:text-3xl font-extrabold">Speedzone</span>
  </div>

  <nav class="hidden md:flex space-x-6 text-gray font-medium">
    <a href="#product" class="hover:text-yellow-700 hover:underline underline-offset-4 transition duration-200">Beranda</a>
    <a href="/produk" class="hover:text-yellow-700 hover:underline underline-offset-4 transition duration-200">Produk</a>
    <a href="#" class="hover:text-yellow-700 hover:underline underline-offset-4 transition duration-200">Tentang Kami</a>
  </nav>

  <div class="flex items-center space-x-4">
    <!-- Tombol Login -->
    <a href="{{ route('login') }}">
      <button class="px-4 py-1 bg-yellow-600 text-white font-semibold rounded-md transition hover:bg-yellow-700 active:scale-95">
        Login
      </button>
    </a>

    <!-- Ikon Keranjang Modern (Font Awesome) -->
    <a href="keranjang" class="text-white hover:text-yellow-800 transition text-2xl relative">
      <i class="fas fa-shopping-cart"></i>
      <!-- Badge jika ingin menampilkan jumlah item -->
      <!-- <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs px-1.5 rounded-full">3</span> -->
    </a>
  </div>
</header>