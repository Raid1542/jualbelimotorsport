@extends('layouts.edit_password')

@section('title', 'Ubah Password | Speedzone')

@section('content')
@include('components.edit_password')

<main class="max-w-xl mx-auto py-10 px-6">
  <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-900">Ubah Password</h2>

    @if (session('status'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('profil.update_password') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium mb-1 text-gray-900">Password Lama</label>
            <input type="password" name="current_password"
                class="w-full bg-white text-gray-700 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 transition-all duration-200"
                required>
        </div>

        <div>
            <label class="block font-medium mb-1 text-gray-900">Password Baru</label>
            <input type="password" name="new_password"
                class="w-full bg-white text-gray-700 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 transition-all duration-200"
                required>
        </div>

        <div>
            <label class="block font-medium mb-1 text-gray-900">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation"
                class="w-full bg-white text-gray-700 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 transition-all duration-200"
                required>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                Ubah Password
            </button>
        </div>
    </form>
  </div>
</main>
@endsection
