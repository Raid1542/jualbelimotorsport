<!-- resources/views/layouts/admin_layout.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'SpeedZone Admin')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 text-gray-800 font-sans">

  <div class="flex h-screen flex-col">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-yellow-400 to-yellow-600 shadow-md py-4 px-6 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <img src="{{ asset('images/speedzone.jpg') }}" alt="logo" class="w-16 h-16 rounded-full object-cover" />
      </div>
      <div class="absolute left-1/2 transform -translate-x-1/2">
        <span class="text-2xl font-bold tracking-wide text-white">@yield('judul_halaman', 'Dashboard Admin')</span>
      </div>
    </nav>

    <div class="flex flex-1">

      <!-- SIDEBAR -->
<!-- SIDEBAR -->
<aside class="bg-white w-64 p-4">
  <div class="text-gray-900 text-lg font-semibold mb-8">SpeedZone Admin</div>
  <ul class="space-y-4">
    <li><a href="{{ route('admin.dashboard') }}" class="block text-gray-800 hover:bg-yellow-500 px-4 py-2 rounded-lg">Dashboard</a></li>
    <li><a href="{{ route('admin.produk.index') }}" class="block text-gray-800 hover:bg-yellow-500 px-4 py-2 rounded-lg">Produk</a></li>
    <li><a href="{{ route('admin.transaksi') }}" class="block text-gray-800 hover:bg-yellow-500 px-4 py-2 rounded-lg">Pesanan</a></li>
    <li><a href="{{ route('admin.rekap-penjualan') }}" class="block text-gray-800 hover:bg-yellow-500 px-4 py-2 rounded-lg">Rekap Penjualan</a></li>
    <li><a href="{{ route('admin.tentangkami.index') }}" class="block text-gray-800 hover:bg-yellow-500 px-4 py-2 rounded-lg">Tentang Kami</a></li>
    <li><a href="/login" class="block text-red-500 hover:bg-red-700 px-4 py-2 rounded-lg">Logout</a></li>
  </ul>
</aside>


      <!-- KONTEN UTAMA -->
      <main class="flex-1 p-6 overflow-y-auto">
        @yield('konten')
      </main>

    </div>

  </div>

</body>
</html>
