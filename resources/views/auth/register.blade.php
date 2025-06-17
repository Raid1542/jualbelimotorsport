<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - SpeedZone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gradient-to-br from-yellow-100 via-white to-blue-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-sm border border-yellow-300">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="/images/speedzone.jpg" alt="SpeedZone Logo" class="h-20 w-20 rounded-full shadow object-cover">
    </div>

    <h2 class="text-center text-3xl font-bold text-[#ffbf29] mb-6">Daftar Akun</h2>

    @if ($errors->any())
      <div class="bg-red-500 text-white text-sm p-3 rounded mb-4 text-center">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-900">
      </div>

      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-900">
      </div>

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-900">
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-900">
      </div>

      <div class="mb-6">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-900">
      </div>

      <button type="submit"
        class="w-full py-3 rounded-2xl bg-[#ffbf29] text-white text-lg font-semibold hover:bg-yellow-400 transition duration-300">
        Daftar
      </button>
    </form>

    <p class="text-center mt-6 text-sm text-gray-600">
      Sudah punya akun? 
      <a href="{{ route('login') }}" class="text-[#ffbf29] font-semibold hover:underline">Masuk sekarang</a>
    </p>

  </div>

</body>
</html>
