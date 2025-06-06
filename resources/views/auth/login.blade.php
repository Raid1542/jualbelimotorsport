<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - SpeedZone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen text-gray-800">
  <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-sm">
    <div class="flex justify-center mb-6">
      <img src="/images/speedzone.jpg" alt="SpeedZone Logo" class="h-18 w-auto">
    </div>
    <h2 class="text-center text-2xl font-bold text-[#ffbf29] mb-8">Masuk</h2>

    @if ($errors->any())
      <div class="bg-red-500 text-white text-sm p-3 rounded mb-4 text-center">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-4">
        <input type="text" name="username" placeholder="Username" required autofocus
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300">
      </div>
      <div class="mb-4">
        <input type="password" name="password" placeholder="Password" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300">
      </div>
      <button type="submit"
        class="w-full py-3 rounded-lg bg-[#ffbf29] text-white font-semibold hover:bg-[#f6b958] transition duration-300">
        Masuk
      </button>
    </form>

    <p class="text-center mt-6 text-sm">
      Belum punya akun? 
      <a href="{{ route('register') }}" class="text-[#ffbf29] font-semibold hover:underline">Daftar sekarang</a>
    </p>
  </div>
</body>
</html>
