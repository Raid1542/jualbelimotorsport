@extends('layouts.admin_layout')

@section('title', 'Tentang Kami - Admin')
@section('judul_halaman', 'Biodata Pembuat')

@section('konten')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-yellow-600">Daftar Biodata Pembuat</h2>
    <a href="{{ route('admin.tentangkami.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded shadow">+ Tambah Biodata</a>
  </div>

  @if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto rounded-lg shadow border border-gray-300 bg-white">
    <table class="min-w-full table-auto text-sm text-gray-800">
      <thead class="bg-yellow-400 text-black">
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Nama</th>
          <th class="px-4 py-2">Telepon</th>
          <th class="px-4 py-2">Gambar</th>
          <th class="px-4 py-2">Ubah</th>
          <th class="px-4 py-2">Hapus</th>
        </tr>
      </thead>
      <tbody>
        @forelse($biodataList as $biodata)
        <tr class="border-t border-gray-200 hover:bg-gray-100">
          <td class="px-4 py-2">{{ $biodata->id }}</td>
          <td class="px-4 py-2">{{ $biodata->nama }}</td>
          <td class="px-4 py-2">{{ $biodata->telepon }}</td>
          <td class="px-4 py-2">
            @if($biodata->gambar)
              <img src="{{ asset('images/' . $biodata->gambar) }}" class="w-16 h-16 object-cover rounded shadow">
            @else
              <span class="text-gray-500 italic">Tidak ada gambar</span>
            @endif
          </td>
          <td class="px-4 py-2">
            <a href="{{ route('admin.tentangkami.edit', $biodata->id) }}" class="text-blue-600 hover:underline">Ubah</a>
          </td>
          <td class="px-4 py-2">
            <form action="{{ route('admin.tentangkami.destroy', $biodata->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus biodata ini?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:underline">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data biodata pembuat.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
