<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Speedzone Admin')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 text-yellow-300 font-sans">

  <div class="flex h-screen flex-col">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-yellow-400 to-yellow-600 shadow-md py-4 px-6 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <!-- Logo Bulat Lebih Besar -->
        <img src="{{ asset('images/speedzone.jpg') }}" alt="logo" class="w-16 h-16 rounded-full object-cover" />
      </div>
      <div class="absolute left-1/2 transform -translate-x-1/2">
        <span class="text-2xl font-bold tracking-wide text-white">@yield('judul_halaman', 'Dashboard Penjual')</span>
      </div>
    </nav>

    <div class="flex flex-1">

      <!-- SIDEBAR -->
      <aside class="bg-[#ffffff] w-64 p-4">
        <div class="text-gray-900 text-lg font-semibold mb-8">speedzone</div>
        <ul class="space-y-4">
          <li><a href="/admin/dashboard" class="block text-gray-800 hover:bg-yellow-500 hover:text-gray-900 px-4 py-2 rounded-lg">Dashboard</a></li>
          <li><a href="/admin/produk" class="block text-gray-800 hover:bg-yellow-500 hover:text-gray-900 px-4 py-2 rounded-lg">Produk</a></li>
          <li><a href="/admin/konfirmasi_pembayaran" class="block text-gray-800 hover:bg-yellow-500 hover:text-gray-900 px-4 py-2 rounded-lg">Pesanan</a></li>
          <li><a href="/admin/rekap-penjualan" class="block text-gray-800 hover:bg-yellow-500 hover:text-gray-900 px-4 py-2 rounded-lg">Rekap Penjualan</a></li>
          <li><a href="/logout" class="block text-red-500 hover:bg-red-700 hover:text-gray-800 px-4 py-2 rounded-lg">Logout</a></li>
        </ul>
      </aside>

      <!-- MAIN CONTENT -->
      <main class="flex-1 p-6 overflow-y-auto">
        @yield('konten')
      </main>

    </div>

  </div>

</body>
</html>
