<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rekap Penjualan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-yellow-300 font-sans">

  <div class="flex h-screen flex-col">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-yellow-400 to-yellow-600 shadow-md py-4 px-6 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <img src="images/LogoSpeedzone.jpg" alt="Logo" class="h-14 w-14 rounded-full object-cover">
        <span class="text-2xl font-bold tracking-wide text-white">SpeedZone</span>
      </div>
      <div class="absolute left-1/2 transform -translate-x-1/2">
        <span class="text-2xl font-bold tracking-wide text-white">Rekap Penjualan</span>
      </div>
    </nav>

    <!-- Content Area -->
    <div class="flex flex-1">

      <!-- SIDEBAR -->
      <aside class="bg-gray-800 w-64 p-4">
        <div class="text-yellow-300 text-lg font-semibold mb-8">Menu</div>
        <ul class="space-y-4">
          <li><a href="/admin/dashboard" class="block text-white hover:bg-yellow-500 hover:text-gray-900 px-4 py-2 rounded-lg">Dashboard</a></li>
          <li><a href="/admin/produk" class="block text-white hover:bg-yellow-500 hover:text-gray-900 px-4 py-2 rounded-lg">Produk</a></li>
          <li><a href="/admin/konfirmasi_pembayaran" class="block text-white hover:bg-yellow-500 hover:text-gray-900 px-4 py-2 rounded-lg">Pesanan</a></li>
          <li><a href="/admin/rekap-penjualan" class="block text-white hover:bg-yellow-500 hover:text-gray-900 px-4 py-2 rounded-lg">Rekap Penjualan</a></li>
          <li><a href="/login" class="block text-red-500 hover:bg-red-700 hover:text-white px-4 py-2 rounded-lg">Logout</a></li>
        </ul>
      </aside>

      <!-- MAIN CONTENT -->
      <main class="flex-1 p-6 overflow-y-auto">

        <div class="flex justify-between items-center mb-6">
          <h3 class="text-2xl font-semibold text-yellow-400">Tabel Rekap Penjualan</h3>
          <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
            Ekspor ke Excel
          </button>
        </div>

        <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
          <table class="min-w-full text-sm text-left border border-gray-700">
            <thead class="bg-yellow-500 text-gray-900">
              <tr>
                <th class="px-4 py-2 border border-gray-700">No</th>
                <th class="px-4 py-2 border border-gray-700">ID Pesanan</th>
                <th class="px-4 py-2 border border-gray-700">Nama Pembeli</th>
                <th class="px-4 py-2 border border-gray-700">Produk</th>
                <th class="px-4 py-2 border border-gray-700">Jumlah</th>
                <th class="px-4 py-2 border border-gray-700">Total Harga</th>
                <th class="px-4 py-2 border border-gray-700">Metode</th>
              </tr>
            </thead>
            <tbody>
              @for($i = 1; $i <= 10; $i++)
              <tr class="hover:bg-gray-700 text-white">
                <td class="px-4 py-2 border border-gray-700">{{ $i }}</td>
                <td class="px-4 py-2 border border-gray-700">ORD-00{{ $i }}</td>
                <td class="px-4 py-2 border border-gray-700">Pembeli {{ $i }}</td>
                <td class="px-4 py-2 border border-gray-700">Produk {{ $i }}</td>
                <td class="px-4 py-2 border border-gray-700">2</td>
                <td class="px-4 py-2 border border-gray-700">Rp200.000</td>
                <td class="px-4 py-2 border border-gray-700">Transfer</td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>

      </main>
    </div>

  </div>

</body>
</html>
