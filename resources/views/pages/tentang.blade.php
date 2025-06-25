@extends('layouts.tentang')

@section('title', 'Tentang Kami')

@section('content')
<div class="bg-gray-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-800">Tentang Kami</h1>
        <p class="mt-4 text-gray-600 text-lg max-w-2xl mx-auto">
            Kenali tim kami yang berdedikasi dan siap memberikan yang terbaik untuk Anda.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @forelse ($biodataList as $biodata)
        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 p-6 text-center group hover:scale-105">
            @if ($biodata->gambar)
                <img src="{{ asset('images/' . $biodata->gambar) }}" alt="Foto {{ $biodata->nama }}" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover border-4 border-yellow-400 shadow-md">
            @else
                <div class="w-32 h-32 mx-auto mb-4 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-sm">
                    No Image
                </div>
            @endif

            <h2 class="text-xl font-bold text-gray-800">{{ $biodata->nama }}</h2>

            @if ($biodata->jabatan ?? false)
                <p class="text-sm text-yellow-600 font-semibold mt-1">{{ $biodata->jabatan }}</p>
            @endif

            <p class="text-sm text-gray-500 mt-1">{{ $biodata->telepon }}</p>

            <div class="mt-3">
                <span class="inline-block px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">
                    Tim SpeedZone
                </span>
            </div>

            @if ($biodata->instagram)
            <div class="mt-4 flex justify-center">
                <a href="{{ $biodata->instagram }}" target="_blank" class="text-gray-400 hover:text-pink-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.2c3.18 0 3.56.01 4.81.07 1.17.06 1.98.25 2.45.41a4.9 4.9 0 011.68 1.1c.47.48.83 1.04 1.1 1.68.16.47.35 1.28.41 2.45.06 1.25.07 1.63.07 4.81s-.01 3.56-.07 4.81c-.06 1.17-.25 1.98-.41 2.45a4.9 4.9 0 01-1.1 1.68c-.48.47-1.04.83-1.68 1.1-.47.16-1.28.35-2.45.41-1.25.06-1.63.07-4.81.07s-3.56-.01-4.81-.07c-1.17-.06-1.98-.25-2.45-.41a4.9 4.9 0 01-1.68-1.1c-.47-.48-.83-1.04-1.1-1.68-.16-.47-.35-1.28-.41-2.45C2.21 15.56 2.2 15.18 2.2 12s.01-3.56.07-4.81c.06-1.17.25-1.98.41-2.45a4.9 4.9 0 011.1-1.68c.48-.47 1.04-.83 1.68-1.1.47-.16 1.28-.35 2.45-.41C8.44 2.21 8.82 2.2 12 2.2zm0 1.8c-3.14 0-3.49.01-4.72.07-1.02.05-1.58.22-1.94.37a3.08 3.08 0 00-1.13.74 3.08 3.08 0 00-.74 1.13c-.15.36-.32.92-.37 1.94C3.21 8.51 3.2 8.86 3.2 12s.01 3.49.07 4.72c.05 1.02.22 1.58.37 1.94.17.42.4.78.74 1.13.35.34.71.57 1.13.74.36.15.92.32 1.94.37 1.23.06 1.58.07 4.72.07s3.49-.01 4.72-.07c1.02-.05 1.58-.22 1.94-.37.42-.17.78-.4 1.13-.74.34-.35.57-.71.74-1.13.15-.36.32-.92.37-1.94.06-1.23.07-1.58.07-4.72s-.01-3.49-.07-4.72c-.05-1.02-.22-1.58-.37-1.94a3.08 3.08 0 00-.74-1.13 3.08 3.08 0 00-1.13-.74c-.36-.15-.92-.32-1.94-.37C15.49 4.01 15.14 4 12 4zm0 3.2a4.8 4.8 0 110 9.6 4.8 4.8 0 010-9.6zm0 1.8a3 3 0 100 6 3 3 0 000-6zm4.9-.9a1.1 1.1 0 110 2.2 1.1 1.1 0 010-2.2z"/>
                    </svg>
                </a>
            </div>
            @endif
        </div>
        @empty
        <p class="text-center text-gray-500 col-span-full">Belum ada data pembuat.</p>
        @endforelse
    </div>
</div>
@endsection
