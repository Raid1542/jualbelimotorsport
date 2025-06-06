<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - SpeedZone</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
  <div class="bg-white shadow-lg rounded-lg p-10 w-full max-w-xl">
    <h1 class="text-3xl font-bold text-[#ffbf29] text-center mb-6">Selamat Datang di SpeedZone!</h1>
    <p class="text-center text-gray-700 mb-4">
      Hai, <strong>{{ Auth::user()->name }}</strong>! Kamu berhasil login.
    </p>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg">
        Logout
      </button>
    </form>
  </div>
</body>
</html>
