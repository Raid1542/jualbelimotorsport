<header class="bg-yellow-400 p-6 relative flex items-center justify-center">
   
    
    <!-- Judul Tengah -->
    <h1 class="text-2xl md:text-3xl font-bold text-white">Tentang Kami</h1>

    <!-- Ikon kanan -->
    <div class="absolute right-6 flex space-x-4 text-white text-2xl">
        <!-- Link ke Dashboard -->
        <a href="{{ route('dashboard') }}" class="hover:text-yellow-200">
            <i class="fas fa-home"></i>
        </a>

        <!-- Link ke Keranjang -->
        <a href="{{ route('keranjang.index') }}" class="hover:text-yellow-200">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</header>
