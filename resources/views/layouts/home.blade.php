<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Speedzone</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  
  
</head>
<body class="bg-yellow-400 text-gray-800">

  @yield('content')

  {{-- Include header global jika ada --}}
  @includeIf('components.header')


  @include('components.footer')
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


  </script>
</body>
</html>
