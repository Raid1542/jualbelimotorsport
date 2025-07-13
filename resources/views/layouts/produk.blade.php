<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk - SpeedZone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-yellow-50 to-white min-h-screen text-gray-800">



  {{-- Main Content --}}
  <main>

  @include('components.produk')

    @yield('content')

   @include('components.footer')

  </main>

</body>
</html>
