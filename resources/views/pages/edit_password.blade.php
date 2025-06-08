@extends('layouts.profil_layout')

@section('title', 'Ubah Password | Speedzone')

@section('content')
@include('components.navbar_profil')

<main class="max-w-xl mx-auto py-10 px-6">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-6 text-black">Ubah Password</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profil.update_password') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="current_password" class="block font-semibold mb-1 text-black">Password Lama</label>
                <input type="password" id="current_password" name="current_password" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-yellow-400 focus:ring focus:ring-yellow-300">
            </div>

            <div>
                <label for="new_password" class="block font-semibold mb-1 text-black">Password Baru</label>
                <input type="password" id="new_password" name="new_password" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-yellow-400 focus:ring focus:ring-yellow-300">
            </div>

            <div>
                <label for="new_password_confirmation" class="block font-semibold mb-1 text-black">Konfirmasi Password Baru</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-yellow-400 focus:ring focus:ring-yellow-300">
            </div>

            <button type="submit"
                class="w-full bg-yellow-400 hover:bg-yellow-500 text-white py-2 rounded font-semibold">
                Simpan Password Baru
            </button>
        </form>
    </div>
</main>

@endsection


