<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>SpeedZone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

  {{-- Navbar --}}
  @include('components.tentang')

  {{-- Content --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('components.footer')

</body>
</html>
