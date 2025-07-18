<!-- views/pages/admin/produk.blade.php -->
@extends('layouts.admin_layout')

@section('title', 'Produk - Admin')
@section('judul_halaman', 'Produk')

@section('konten')
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-yellow-600">Daftar Produk</h2>
    <a href="{{ route('admin.produk.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded shadow">+ Tambah Produk</a>
  </div>

  <div class="overflow-x-auto rounded-lg shadow border border-gray-300 bg-white">
    <table class="min-w-full table-auto text-sm text-gray-800">
      <thead class="bg-yellow-400 text-black">
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Nama</th>
          <th class="px-4 py-2">Gambar</th>
          <th class="px-4 py-2">Deskripsi</th>
          <th class="px-4 py-2">Harga</th>
          <th class="px-4 py-2">Stok</th>
          <th class="px-4 py-2">Warna</th>
          <th class="px-4 py-2">Kategori</th>
          <th class="px-4 py-2">Ubah</th>
          <th class="px-4 py-2">Hapus</th>
        </tr>
      </thead>
      <tbody>
        @foreach($produkList as $produk)
        <tr class="border-t border-gray-200 hover:bg-gray-100">
          <td class="px-4 py-2">{{ $produk['id'] }}</td>
          <td class="px-4 py-2">{{ $produk['nama'] }}</td>
          <td class="px-4 py-2">
            <img src="{{ asset('images/'.$produk['gambar']) }}" alt="Gambar Produk {{ $produk['id'] }}" class="w-16 h-16 object-cover rounded">
          </td>
          <td class="px-4 py-2 max-w-xs overflow-hidden whitespace-nowrap text-ellipsis" title="{{ $produk['deskripsi'] }}">
            {{ $produk['deskripsi'] }}
          </td>
          <td class="px-4 py-2 text-yellow-600 font-semibold">Rp{{ number_format($produk['harga'], 0, ',', '.') }}</td>
          <td class="px-4 py-2">{{ $produk['stok'] }}</td>
          <td class="px-4 py-2">{{ $produk['warna'] }}</td>
          <td class="px-4 py-2">
            {{ $produk->kategori->nama ?? '-' }}
          </td>
          <td class="px-4 py-2">
            <a href="{{ route('admin.produk.edit', $produk->id) }}" class="text-blue-600 hover:underline">Ubah</a>
          </td>
          <td class="px-4 py-2">
            <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:underline">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
