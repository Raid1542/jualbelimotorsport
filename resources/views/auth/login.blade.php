<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - SpeedZone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
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

    <h2 class="text-center text-3xl font-bold text-[#ffbf29] mb-6">Masuk</h2>

    @if ($errors->any())
      <div class="bg-red-500 text-white text-sm p-3 rounded mb-4 text-center">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
        <input type="text" name="username" id="username" placeholder="Masukkan username" value="{{ old('username') }}" required autofocus
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-900">
      </div>

      <div class="mb-4 relative">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan password" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 pr-10 focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white text-gray-900">
        
        <!-- Icon Mata -->
        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-3 top-8 flex items-center text-gray-500">
          <i id="eyeIcon" class="ph ph-eye text-xl"></i>
        </button>
      </div>

      <button type="submit"
        class="w-full py-3 rounded-lg bg-[#ffbf29] text-white font-semibold hover:bg-yellow-400 transition duration-300">
        Masuk
      </button>
    </form>

    <p class="text-center mt-6 text-sm text-gray-600">
      Belum punya akun? 
      <a href="{{ route('register') }}" class="text-[#ffbf29] font-semibold hover:underline">Daftar sekarang</a>
    </p>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById("password");
      const icon = document.getElementById("eyeIcon");

      if (input.type === "password") {
        input.type = "text";
        icon.classList.replace("ph-eye", "ph-eye-slash");
      } else {
        input.type = "password";
        icon.classList.replace("ph-eye-slash", "ph-eye");
      }
    }
  </script>

</body>
</html>
