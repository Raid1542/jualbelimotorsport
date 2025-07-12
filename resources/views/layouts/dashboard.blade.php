<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - SpeedZone</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Alpine.js -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <!-- Tailwind Dark Mode Class -->
  <script>
    tailwind.config = {
      darkMode: 'class',
    };
  </script>
</head>

<body class="font-sans bg-gradient-to-r from-yellow-50 to-white dark:from-gray-900 dark:to-gray-800 text-gray-800 dark:text-white min-h-screen transition duration-300">


  {{-- Navbar --}}
  @include('components.dashboard')

  {{-- Content --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('components.footer')

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>
</html>
