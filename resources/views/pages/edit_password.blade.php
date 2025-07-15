@extends('layouts.edit_password')

@section('title', 'Ubah Password | Speedzone')

@section('content')
@include('components.edit_password')

<main class="max-w-2xl mx-auto px-6 py-16">
    <div class="bg-white rounded-3xl shadow-xl p-10 space-y-8 border border-gray-100">
        <div class="text-center space-y-1">
            <h2 class="text-3xl font-bold text-gray-800">Ubah Password</h2>
            <p class="text-gray-500 text-sm">Pastikan password baru kamu kuat & mudah diingat</p>
        </div>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded-md text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profil.update_password') }}" class="space-y-6">
            @csrf

            {{-- Password Lama --}}
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Lama</label>
                <input type="password" name="current_password" id="current_password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-900 focus:ring-yellow-400 focus:border-yellow-500 transition shadow-sm" required>
            </div>

            {{-- Password Baru --}}
            <div>
                <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                <input type="password" name="new_password" id="new_password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-900 focus:ring-yellow-400 focus:border-yellow-500 transition shadow-sm" required>
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-900 focus:ring-yellow-400 focus:border-yellow-500 transition shadow-sm" required>
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-md transition-all shadow-md">
                    Simpan Password Baru
                </button>
            </div>
        </form>
    </div>
</main>

@if(session('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: @json(session('status')),
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif
@endsection
