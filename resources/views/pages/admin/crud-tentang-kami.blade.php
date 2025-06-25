@extends('layouts.admin_layout')

@section('title', isset($biodata) ? 'Edit Biodata' : 'Tambah Biodata')
@section('judul_halaman', isset($biodata) ? 'Edit Biodata Pembuat' : 'Tambah Biodata Pembuat')

@section('konten')
  <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow border border-gray-300">
    <h2 class="text-2xl font-bold text-yellow-600 mb-4">
      {{ isset($biodata) ? 'Edit Biodata' : 'Tambah Biodata Baru' }}
    </h2>

    @if ($errors->any())
      <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ $form_action }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      @if ($form_method === 'PUT')
        @method('PUT')
      @endif

      <!-- Nama -->
      <div>
        <label class="block font-medium text-gray-700">Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $biodata->nama ?? '') }}"
               class="w-full border border-gray-300 rounded p-2 text-gray-900" required>
      </div>

      <!-- Telepon -->
      <div>
        <label class="block font-medium text-gray-700">Telepon</label>
        <input type="text" name="telepon" value="{{ old('telepon', $biodata->telepon ?? '') }}"
               class="w-full border border-gray-300 rounded p-2 text-gray-900" required>
      </div>

      <!-- Instagram -->
      <div>
        <label class="block font-medium text-gray-700">Instagram</label>
        <input type="text" name="instagram" value="{{ old('instagram', $biodata->instagram ?? '') }}"
               class="w-full border border-gray-300 rounded p-2 text-gray-900" placeholder="@username">
      </div>

      <!-- Gambar -->
      <div>
        <label class="block font-medium text-gray-700">Gambar</label>
        <input type="file" name="gambar" class="w-full border border-gray-300 rounded p-2 text-gray-900">
        @if(isset($biodata->gambar))
          <p class="mt-2 text-sm text-gray-600">Gambar saat ini:</p>
          <img src="{{ asset('images/' . $biodata->gambar) }}" class="w-32 mt-2 rounded shadow border">
        @endif
      </div>

      <!-- Tombol Submit -->
      <div class="pt-4">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg shadow">
          {{ $button_label }}
        </button>
      </div>
    </form>
  </div>
@endsection
