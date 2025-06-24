<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pesanan Saya</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black font-sans">

  <!-- Header Kuning -->
  <header class="bg-gradient-to-r from-yellow-400 to-yellow-500 px-4 pt-6 pb-2 shadow-md">
    <div class="relative h-12">
      <h1 class="text-2xl font-bold text-white text-center">Pesanan Saya</h1>
      <div class="absolute right-0 top-0 flex items-center gap-4 text-white text-xl">
        <a href="/dashboard" class="hover:text-gray-200" title="Beranda"><i class="fas fa-home"></i></a>
        <a href="/keranjang" class="hover:text-gray-200" title="Keranjang"><i class="fas fa-shopping-cart"></i></a>
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

  <!-- Konten -->
  <main class="w-full px-4 py-6 max-w-6xl mx-auto">

    <!-- Pesanan -->
    <div id="content-pesanan" class="w-full space-y-4">
      <div class="bg-white rounded-lg p-4 shadow w-full flex flex-col sm:flex-row justify-between items-start gap-4">
        <div class="flex gap-4">
          <img src="/images/Foto_1.png" alt="Produk" class="w-20 h-20 object-cover rounded border">
          <div>
            <p class="text-sm font-semibold">SpeedZone Official</p>
            <p class="text-yellow-600 font-bold">SpeedZone Hoodie Unisex</p>
            <p class="text-sm text-gray-700">Ukuran: M | Warna: Navy</p>
            <p class="text-sm text-gray-700">Jumlah: x1</p>
          </div>
        </div>
        <div class="text-right">
          <p class="text-blue-500 text-sm font-bold mb-1">Sedang Dikirim</p>
          <p class="font-semibold mb-2">Rp199.000</p>
          <div class="flex gap-2 justify-end">
            <button class="bg-yellow-500 text-white text-sm px-3 py-1 rounded hover:bg-yellow-400">Lacak</button>
            <button class="border border-yellow-500 text-yellow-500 text-sm px-3 py-1 rounded hover:bg-yellow-100">Lihat Detail</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Riwayat -->
    <div id="content-riwayat" class="w-full space-y-4 hidden">
      <div class="bg-white rounded-lg p-4 shadow w-full flex flex-col sm:flex-row justify-between items-start gap-4">
        <div class="flex gap-4">
          <img src="/images/Foto_1.png" alt="Produk" class="w-20 h-20 object-cover rounded border">
          <div>
            <p class="text-sm font-semibold">SpeedZone Official</p>
            <p class="text-yellow-600 font-bold">SpeedZone Hoodie Unisex</p>
            <p class="text-sm text-gray-700">Ukuran: M | Warna: Navy</p>
            <p class="text-sm text-gray-700">Jumlah: x1</p>
          </div>
        </div>
        <div class="text-right">
          <p class="text-green-500 text-sm font-bold mb-1">Selesai</p>
          <p class="font-semibold mb-2">Rp199.000</p>
          <div class="flex gap-2 justify-end">
            <button class="bg-yellow-500 text-white text-sm px-3 py-1 rounded hover:bg-yellow-400">Beli Lagi</button>
            <button class="border border-yellow-500 text-yellow-500 text-sm px-3 py-1 rounded hover:bg-yellow-100">Lihat Detail</button>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!-- Script Tab Navigasi -->
  <script>
    function showTab(tab) {
      const pesanan = document.getElementById('content-pesanan');
      const riwayat = document.getElementById('content-riwayat');
      const tabPesanan = document.getElementById('tab-pesanan');
      const tabRiwayat = document.getElementById('tab-riwayat');

      // Reset tampilan tab
      pesanan.classList.add('hidden');
      riwayat.classList.add('hidden');
      tabPesanan.classList.remove('text-yellow-500', 'border-b-2', 'border-yellow-500');
      tabRiwayat.classList.remove('text-yellow-500', 'border-b-2', 'border-yellow-500');

      // Tampilkan tab sesuai klik
      if (tab === 'pesanan') {
        pesanan.classList.remove('hidden');
        tabPesanan.classList.add('text-yellow-500', 'border-b-2', 'border-yellow-500');
      } else {
        riwayat.classList.remove('hidden');
        tabRiwayat.classList.add('text-yellow-500', 'border-b-2', 'border-yellow-500');
      }
    }

    // Aktifkan tab pesanan secara default saat halaman dimuat
    window.onload = () => {
      showTab('pesanan');
    };
  </script>

</body>
</html>
