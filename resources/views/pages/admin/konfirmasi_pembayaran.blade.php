<!-- views/pages/admin/konfirmasi_pembayaran.blade..php -->

@extends('layouts.admin_layout')

@section('title', 'Konfirmasi Pembayaran')
@section('judul_halaman', 'Konfirmasi Pembayaran')

@section('konten')
    <div class="max-w-7xl mx-auto py-16 px-6">
        <h2 class="text-2xl font-bold text-yellow-400 mb-8 text-center">Daftar Pembayaran Menunggu Konfirmasi</h2>

        <div class="overflow-x-auto bg-gray-800 shadow-xl rounded-xl p-4">
            <table class="min-w-full table-auto text-sm text-yellow-300">
                <thead class="bg-yellow-600 text-gray-900 uppercase text-left">
                    <tr>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Bank</th>
                        <th class="px-6 py-3">Telepon</th>
                        <th class="px-6 py-3">Alamat</th>
                        <th class="px-6 py-3">Total</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($pembayaranList as $p)
                    <tr>
                        <td class="px-6 py-4">{{ $p['nama'] }}</td>
                        <td class="px-6 py-4">{{ $p['bank'] }}</td>
                        <td class="px-6 py-4">{{ $p['telepon'] }}</td>
                        <td class="px-6 py-4">{{ $p['alamat'] }}</td>
                        <td class="px-6 py-4 font-semibold text-yellow-400">Rp {{ number_format($p['total'], 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-red-200 text-red-700 text-xs font-semibold rounded-full">{{ $p['status'] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-2">
                                <button onclick="updateStatus(this, 'Terkonfirmasi', 'green')"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    Konfirmasi
                                </button>
                                <button onclick="updateStatus(this, 'Diproses', 'blue')"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    Proses Kirim
                                </button>
                                <button onclick="updateStatus(this, 'Dikirim', 'purple')"
                                    class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    Dikirim
                                </button>
                                <button onclick="updateStatus(this, 'Diterima', 'gray')"
                                    class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    Diterima
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function updateStatus(button, status, color) {
            const row = button.closest('tr');
            const statusSpan = row.querySelector('td:nth-child(6) span');

            const colorMap = {
                red: 'bg-red-200 text-red-700',
                green: 'bg-green-200 text-green-700',
                blue: 'bg-blue-200 text-blue-700',
                purple: 'bg-purple-200 text-purple-700',
                gray: 'bg-gray-300 text-gray-800'
            };

            statusSpan.textContent = status;
            statusSpan.className = `px-2 py-1 ${colorMap[color]} text-xs font-semibold rounded-full`;
        }
    </script>
@endsection
