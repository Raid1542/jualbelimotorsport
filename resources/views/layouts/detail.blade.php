<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SpeedZone')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

  {{-- Header --}}
  <header class="bg-yellow-400 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
      
      <!-- Kembali ke produk -->
      <a href="{{ route('produk') }}" class="flex items-center text-white hover:text-yellow-800 transition-transform transform hover:scale-110 text-lg font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
      </a>

      <!-- Ikon -->
      <nav class="flex items-center space-x-6 text-white">
        <a href="/" class="hover:text-yellow-800 transition-transform transform hover:scale-110">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10.707 1.707a1 1 0 00-1.414 0l-8 8A1 1 0 002 11h1v6a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1v-6h1a1 1 0 00.707-1.707l-8-8z" />
          </svg>
        </a>
        <a href="/keranjang" class="hover:text-yellow-800 transition text-2xl relative">
          <i class="fas fa-shopping-cart"></i>
        </a>
      </nav>

    </div>
  </header>

  {{-- Konten --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer (opsional, bisa pakai include jika ada komponen) --}}
  @include('components.footer')

</body>
</html>
