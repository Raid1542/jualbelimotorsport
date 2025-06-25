<header class="bg-gradient-to-r from-yellow-400 to-yellow-500 px-4 pt-6 pb-4 shadow-md">
    <div class="relative h-12">
        <h1 class="text-2xl font-bold text-white text-center">Pesanan Saya</h1>
        <div class="absolute right-0 top-0 flex items-center gap-4 text-white text-xl">
            <a href="/dashboard" class="hover:text-gray-200"><i class="fas fa-home"></i></a>
            <a href="/keranjang" class="hover:text-gray-200"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </div>
</header>

<!-- Tab Navigasi -->
<div class="bg-white shadow-md flex justify-center gap-6 py-2">
    <button onclick="showTab('pesanan')" id="tab-pesanan"
        class="text-gray-600 font-semibold hover:text-yellow-500 hover:border-b-2 hover:border-yellow-500 pb-1">
        Pesanan
    </button>
    <button onclick="showTab('riwayat')" id="tab-riwayat"
        class="text-gray-600 font-semibold hover:text-yellow-500 hover:border-b-2 hover:border-yellow-500 pb-1">
        Riwayat
    </button>
</div>