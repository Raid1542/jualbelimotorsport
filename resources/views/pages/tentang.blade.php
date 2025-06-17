@extends('layouts.tentang')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">

  <h1 class="text-4xl font-bold text-yellow-500 mb-6 text-center">Tentang Kami</h1>

  <p class="text-lg text-gray-700 leading-relaxed text-center max-w-3xl mx-auto mb-10">
    {{ $tentang->deskripsi ?? 'Deskripsi belum tersedia.' }}
  </p>

  <div class="mb-12">
    <h2 class="text-2xl font-semibold text-yellow-600 mb-4">Cerita Kami</h2>
    <p class="text-gray-700 leading-relaxed">
      {{ $tentang->cerita ?? 'Cerita belum tersedia.' }}
    </p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">
    <div>
      <h2 class="text-2xl font-semibold text-yellow-600 mb-2">Visi</h2>
      <p class="text-gray-700">{{ $tentang->visi ?? '-' }}</p>
    </div>
    <div>
      <h2 class="text-2xl font-semibold text-yellow-600 mb-2">Misi</h2>
      <p class="text-gray-700">{{ $tentang->misi ?? '-' }}</p>
    </div>
  </div>

  <div class="mb-16">
    <h2 class="text-2xl font-semibold text-yellow-600 mb-4">Nilai-Nilai Kami</h2>
    <p class="text-gray-700">{{ $tentang->nilai ?? '-' }}</p>
  </div>

  <div class="mb-16">
    <h2 class="text-3xl font-bold text-center text-yellow-500 mb-10">Tim Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach($tentang->tim ?? [] as $anggota)
      <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <img src="{{ asset('images/' . $anggota['foto']) }}" alt="Foto {{ $anggota['nama'] }}" class="w-32 h-32 rounded-full mx-auto object-cover mb-4">
        <h3 class="text-xl font-bold text-gray-800">{{ $anggota['nama'] }}</h3>
        <p class="text-gray-600">{{ $anggota['jabatan'] }}</p>
      </div>
      @endforeach
    </div>
  </div>

</div>
@endsection
