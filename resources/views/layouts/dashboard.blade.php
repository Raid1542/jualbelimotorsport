<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - SpeedZone</title>

   <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  
<body class="font-sans bg-gray-100 text-gray-800">

  {{-- Navbar khusus member --}}
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-yellow-500">SpeedZone</a>
      <div class="flex gap-6 items-center">
        <a href="{{ route('produk') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">Produk</a>
        <a href="{{ route('profil') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  {{-- Content --}}
  <main>
    @yield('content')
  </main>

</body>
</html>
