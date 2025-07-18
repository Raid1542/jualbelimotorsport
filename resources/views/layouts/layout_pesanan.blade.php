<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Pesanan Saya')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-gray-50 to-white text-gray-800 min-h-screen">


@include('components.navbar_pesanan')
  {{-- Jangan include item langsung di layout --}}
  {{-- @include('components.pesanan-item') --}}

  @yield('content')
  @yield('scripts')
</body>
</html>
