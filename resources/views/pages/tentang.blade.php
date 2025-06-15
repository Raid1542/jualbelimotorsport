@extends('layouts.tentang')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">
  {{-- Judul Halaman --}}
  <h1 class="text-4xl font-bold text-yellow-500 mb-6 text-center">Tentang Kami</h1>

  {{-- Deskripsi Perusahaan --}}
  <p class="text-lg text-gray-700 leading-relaxed text-center max-w-3xl mx-auto mb-10">
    <strong>SpeedZone</strong> adalah platform belanja online otomotif yang menghadirkan produk berkualitas dari berbagai penjual terpercaya.
    Kami berkomitmen memberikan pengalaman belanja yang cepat, aman, dan nyaman bagi para pecinta otomotif di seluruh Indonesia.
  </p>

  {{-- Visi & Misi --}}
  <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">
    <div>
      <h2 class="text-2xl font-semibold text-yellow-600 mb-2">Visi</h2>
      <p class="text-gray-700">Menjadi platform otomotif online nomor satu di Indonesia dengan pelayanan terbaik dan produk berkualitas tinggi.</p>
    </div>
    <div>
      <h2 class="text-2xl font-semibold text-yellow-600 mb-2">Misi</h2>
      <ul class="list-disc list-inside text-gray-700 space-y-1">
        <li>Menyediakan produk otomotif yang lengkap dan terpercaya.</li>
        <li>Mendukung UMKM dan penjual lokal untuk berkembang secara digital.</li>
        <li>Memberikan layanan pelanggan yang cepat dan ramah.</li>
      </ul>
    </div>
  </div>

  {{-- Tim Kami --}}
  <div>
    <h2 class="text-3xl font-bold text-center text-yellow-500 mb-10">Tim Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

      {{-- Anggota Tim 1 --}}
      <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <img src="{{ asset('images/tim1.jpg') }}" alt="Foto Tim 1" class="w-32 h-32 rounded-full mx-auto object-cover mb-4">
        <h3 class="text-xl font-bold text-gray-800">Rafi Maulana</h3>
        <p class="text-gray-600">Founder & CEO</p>
      </div>

      {{-- Anggota Tim 2 --}}
      <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <img src="{{ asset('images/tim2.jpg') }}" alt="Foto Tim 2" class="w-32 h-32 rounded-full mx-auto object-cover mb-4">
        <h3 class="text-xl font-bold text-gray-800">Salsabila Putri</h3>
        <p class="text-gray-600">CTO & Backend Engineer</p>
      </div>

      {{-- Anggota Tim 3 --}}
      <div class="bg-white shadow-md rounded-xl p-6 text-center">
        <img src="{{ asset('images/tim3.jpg') }}" alt="Foto Tim 3" class="w-32 h-32 rounded-full mx-auto object-cover mb-4">
        <h3 class="text-xl font-bold text-gray-800">Daniel Eka</h3>
        <p class="text-gray-600">UI/UX Designer</p>
      </div>

    </div>
  </div>
</div>
@endsection
