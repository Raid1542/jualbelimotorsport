<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>@yield('title', 'Speedzone')</title>

  {{-- Tailwind CSS CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  @stack('head')

</head>
<body class="bg-yellow-50 text-gray-800">


  @includeIf('components.header')

  <main>
    @yield('content')
  </main>

  @includeIf('components.footer')


  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


  @stack('scripts')

</body>
</html>
