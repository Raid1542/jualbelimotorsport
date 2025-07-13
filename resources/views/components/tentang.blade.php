@php
    $logoLink = url()->previous();
@endphp


<header class="bg-white shadow-md sticky top-0 z-50 px-4 py-4">
  <div class="relative flex items-center justify-between sm:justify-center">

    <!-- Kiri: Logo & Nama -->
    <a href="{{ $logoLink }}" class="absolute left-4 flex items-center space-x-3">
      <img src="{{ asset('images/speedzone.jpg') }}" alt="Logo" class="w-10 h-10 rounded-full object-cover">
      <span class="text-xl font-extrabold text-yellow-500 hidden sm:inline">Speedzone</span>
    </a>

    <!-- Tengah: Judul Halaman -->
    <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-yellow-500 text-center w-full">Tentang Kami</h1>

  </div>
</header>
