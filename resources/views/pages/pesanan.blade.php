<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pesanan Saya</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
</head>

<body class="bg-gray-100 text-black font-sans">

  <header class="bg-gradient-to-r from-yellow-400 to-yellow-500 py-4 px-4 h-16 shadow-md relative">
  <h1 class="text-2xl font-bold text-white absolute left-1/2 transform -translate-x-1/2 top-1/2 -translate-y-1/2">
    Pesanan Saya
  </h1>

  <!-- Ikon Navigasi di kanan -->
  <div class="flex items-center gap-4 text-white text-xl absolute right-4 top-1/2 -translate-y-1/2">
    <!-- Home -->
    <a href="#" class="hover:text-gray-200" title="Beranda">
      <i class="fas fa-home"></i>
    </a>
    <!-- Keranjang -->
    <a href="#" class="hover:text-gray-200" title="Keranjang">
      <i class="fas fa-shopping-cart"></i>
    </a>
  </div>
</header>


  <!-- Daftar Pesanan -->
  <div class="px-4 py-6 space-y-4">
    <!-- Pesanan Card -->
    <div class="bg-white rounded-lg p-4 flex flex-col sm:flex-row sm:items-center justify-between shadow-lg">
      <!-- Info Toko & Produk -->
      <div class="flex items-start gap-4">
        <!-- Gambar Produk -->
        <img src="https://via.placeholder.com/80" alt="Produk" class="w-20 h-20 object-cover rounded-md border border-gray-600">

        <!-- Detail Produk -->
        <div>
          <p class="text-sm text-black font-semibold">SpeedZone Official</p>
          <p class="text-yellow-600 font-bold">SpeedZone Hoodie Unisex</p>
          <p class="text-sm text-gray-700">Ukuran: M | Warna: Navy</p>
          <p class="text-sm text-gray-700">Jumlah: x1</p>
        </div>
      </div>

      <!-- Status & Aksi -->
      <div class="flex flex-col items-end mt-4 sm:mt-0">
        <span class="text-green-400 text-sm font-bold mb-1">Selesai</span>
        <span class="text-black font-semibold mb-2">Rp199.000</span>
        <div class="flex gap-2">
          <button class="bg-yellow-500 text-white text-sm font-semibold px-3 py-1 rounded hover:bg-yellow-300">Beli Lagi</button>
          <button class="border border-yellow-400 text-yellow-400 text-sm font-semibold px-3 py-1 rounded hover:bg-yellow-400 hover:text-black transition duration-200">Lihat Detail</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>