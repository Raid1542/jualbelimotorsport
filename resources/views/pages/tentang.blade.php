@extends('layouts.tentang')

@section('title', 'Tentang Kami')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen py-12 px-4 sm:px-6 lg:px-8">


  {{-- Cerita Kami --}}
  <section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto text-center px-6">
      <h2 class="text-3xl md:text-3xl font-extrabold text-gray-800 mb-6">Cerita Kami</h2>
      <p class="text-gray-700 text-lg leading-relaxed">
        <strong class="text-gray-900 font-semibold">Speedzone</strong> adalah platform belanja online miniatur motor dan mobil yang menghadirkan produk berkualitas.
        Kami berkomitmen memberikan pengalaman belanja yang cepat, aman, dan nyaman bagi para pecinta miniatur motor dan mobil di Indonesia.
        <br><br>
        Didirikan pada tahun 2025, Speedzone dimulai dari keinginan untuk menghadirkan pengalaman belanja mainan miniatur motor dan mobil yang modern dan terpercaya.
        Kami memulai dengan hanya beberapa produk dan kini telah berkembang menjadi banyak pilihan motor dan mobil dari berbagai kategori.
      </p>
    </div>
  </section>

  {{-- Nilai-Nilai Kami --}}
  <section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto text-center">
      <h2 class="text-3xl md:text-3xl font-extrabold text-gray-800 mb-4">Nilai-Nilai Kami</h2>
      <ul class="space-y-4 max-w-2xl mx-auto text-base text-gray-700 leading-relaxed">
        <li><strong class="text-gray-900">Integritas</strong> – Menyediakan informasi produk yang transparan dan jujur.</li>
        <li><strong class="text-gray-900">Inovasi</strong> – Terus meningkatkan pengalaman pengguna melalui teknologi.</li>
        <li><strong class="text-gray-900">Kepuasan Pelanggan</strong> – Mendahulukan kebutuhan dan kenyamanan pelanggan.</li>
      </ul>
    </div>
  </section>

  {{-- Cara Kami Beroperasi --}}
  <section class="bg-white py-24 px-4 lg:px-12">
    <div class="max-w-5xl mx-auto text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4">Cara Kami Beroperasi</h2>
      <p class="text-gray-600 text-lg leading-relaxed">
        Untuk menggambarkan siapa kami – bagaimana kami berbicara, bertindak, dan bereaksi terhadap situasi tertentu –
        pada dasarnya, kami <strong class="text-gray-900">Simpel, Bahagia, dan Bersama-sama</strong>.
        Nilai-nilai utama ini selalu terlihat dalam setiap langkah perjalanan Speedzone.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">
      <!-- Simpel -->
      <div class="text-center transform hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/simpel.jpg') }}" alt="Simpel" class="w-full rounded-xl shadow-lg mb-6 object-cover h-56">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Simpel</h3>
        <p class="text-gray-600 text-sm leading-relaxed px-3">
          Kami percaya akan kesederhanaan dan integritas; memastikan kehidupan yang jujur, rendah hati, dan apa adanya.
        </p>
      </div>

      <!-- Bahagia -->
      <div class="text-center transform hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/bahagia.png') }}" alt="Bahagia" class="w-full rounded-xl shadow-lg mb-6 object-cover h-56">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Bahagia</h3>
        <p class="text-gray-600 text-sm leading-relaxed px-3">
          Kami ramah, menyenangkan, dan enerjik, serta menyebarkan sukacita kepada semua orang yang kami temui.
        </p>
      </div>

      <!-- Bersama-sama -->
      <div class="text-center transform hover:scale-105 transition-transform duration-300">
        <img src="{{ asset('images/kerjasama.png') }}" alt="Bersama-sama" class="w-full rounded-xl shadow-lg mb-6 object-cover h-56">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Bersama-sama</h3>
        <p class="text-gray-600 text-sm leading-relaxed px-3">
          Kita mencapai tujuan bersama dengan bekerja sama dan saling berkolaborasi, sambil menghabiskan waktu berkualitas.
        </p>
      </div>
    </div>
  </section>

{{-- Tim Kami --}}
<div class="max-w-6xl mx-auto text-center mt-24 mb-12">
  <h1 class="text-4xl font-extrabold text-gray-800">Tim Kami</h1>
  <p class="mt-4 text-gray-600 text-lg max-w-2xl mx-auto">
    Kenali tim kami yang berdedikasi dan siap memberikan yang terbaik untuk Anda.
  </p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-20">
  @forelse ($biodataList as $biodata)
    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 text-center">
      @if ($biodata->gambar)
        <img src="{{ asset('images/' . $biodata->gambar) }}" alt="Foto {{ $biodata->nama }}"
          class="w-28 h-28 mx-auto rounded-full mb-4 object-cover border-2 border-yellow-400">
      @else
        <div class="w-28 h-28 mx-auto mb-4 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-sm">
          No Image
        </div>
      @endif

      <h2 class="text-lg font-semibold text-gray-800">{{ $biodata->nama }}</h2>

      @if ($biodata->jabatan ?? false)
        <p class="text-sm text-yellow-600 mt-1 font-medium">{{ $biodata->jabatan }}</p>
      @endif

      <p class="text-sm text-gray-500 mt-1">{{ $biodata->telepon }}</p>

      @if ($biodata->instagram)
        <div class="mt-4 flex justify-center">
          <a href="{{ $biodata->instagram }}" target="_blank" class="text-gray-400 hover:text-pink-500 transition" title="Instagram">
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
