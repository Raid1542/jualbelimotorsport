
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-yellow-300 font-sans">

    <!-- NAVBAR -->
    <header class="bg-gradient-to-r from-yellow-400 to-yellow-600 shadow-md p-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/LogoSpeedzone.jpg') }}" alt="Logo Speedzone" class="w-10 h-10 rounded-full object-cover">
            <span class="font-bold text-white text-lg">SpeedZone</span>
        </div>
        <nav class="flex gap-4">
            <a href="/admin/dashboard" class="text-white hover:underline">Dashboard</a>
            <a href="/admin/riwayat-transaksi" class="font-bold text-white underline">Riwayat Transaksi</a>
        </nav>
        <a href="/logout" class="text-sm text-red-100 hover:underline">Logout</a>
    </header>

    <!-- ISI HALAMAN -->
    <div class="max-w-6xl mx-auto bg-gray-800 p-6 mt-6 rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-yellow-400">Riwayat Transaksi</h1>
            <button class="bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-semibold py-2 px-4 rounded-lg shadow">
                Ekspor
            </button>
        </div>

        <table class="min-w-full text-left border border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-yellow-500 text-gray-900">

            @extends('admin.layout')

@section('title', 'Riwayat Transaksi - Admin')

@section('konten')
    <!-- Header Halaman -->
    <div class="bg-gray-900 text-yellow-300 py-8 px-4 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <!-- Judul dan Tombol -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-yellow-400">Riwayat Transaksi</h1>
                <button class="bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-semibold py-2 px-4 rounded-lg shadow">
                    Ekspor
                </button>
            </div>

            <!-- Tabel Riwayat Transaksi -->
            <div class="overflow-x-auto bg-gray-800 rounded-xl shadow-lg">
                <table class="min-w-full border border-gray-700">
                    <thead class="bg-yellow-500 text-gray-900">
                        <tr>
                            <th class="px-4 py-2 border border-gray-700">No</th>
                            <th class="px-4 py-2 border border-gray-700">Tanggal</th>
                            <th class="px-4 py-2 border border-gray-700">Nama Produk</th>
                            <th class="px-4 py-2 border border-gray-700">Pembeli</th>
                            <th class="px-4 py-2 border border-gray-700">Jumlah</th>
                            <th class="px-4 py-2 border border-gray-700">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 1; $i <= 5; $i++)
                        <tr class="hover:bg-gray-700 text-white">
                            <td class="px-4 py-2 border border-gray-700">{{ $i }}</td>
                            <td class="px-4 py-2 border border-gray-700">2025-04-2{{ $i }}</td>
                            <td class="px-4 py-2 border border-gray-700">Produk {{ $i }}</td>
                            <td class="px-4 py-2 border border-gray-700">Pembeli {{ $i }}</td>
                            <td class="px-4 py-2 border border-gray-700">{{ rand(1, 5) }}</td>
                            <td class="px-4 py-2 border border-gray-700">Rp{{ number_format(rand(10000, 50000), 0, ',', '.') }}</td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
