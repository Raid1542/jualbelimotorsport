<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Pesanan Saya')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-black font-sans">
  {{-- Jangan include item langsung di layout --}}
  {{-- @include('components.pesanan-item') --}}

  @yield('content')
  @yield('scripts')
</body>
</html>
