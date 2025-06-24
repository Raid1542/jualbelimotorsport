<!-- resources/views/pages/tentang-kami.blade.php -->
@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-yellow-500 mb-6">Tentang Kami</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @forelse ($data as $biodata)
        <div class="bg-white p-6 rounded-lg shadow-md border">
            @if ($biodata->gambar)
            <img src="{{ asset('images/' . $biodata->gambar) }}" alt="Foto {{ $biodata->nama }}"
                 class="w-full h-48 object-cover rounded mb-4">
            @else
            <div class="w-full h-48 bg-gray-200 rounded flex items-center justify-center text-gray-500">
                Tidak ada gambar
            </div>
            @endif

            <h2 class="text-xl font-semibold text-gray-800">{{ $biodata->nama }}</h2>
            <p class="text-gray-600 mt-2">Telepon: {{ $biodata->telepon }}</p>
        </div>
        @empty
        <p class="text-gray-600">Belum ada biodata pembuat yang tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
