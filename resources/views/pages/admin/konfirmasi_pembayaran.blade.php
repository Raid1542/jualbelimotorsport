@extends('layouts.admin_layout')

@section('title', 'Konfirmasi Pembayaran')
@section('judul_halaman', 'Konfirmasi Pembayaran')

@section('konten')
    <div class="max-w-7xl mx-auto py-16 px-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Daftar Pembayaran Menunggu Konfirmasi</h2>

        <div class="overflow-x-auto bg-white shadow-xl rounded-xl p-4">
            <table class="min-w-full table-auto text-sm text-gray-800">
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
                        <td class="px-6 py-4 font-semibold text-gray-800">Rp {{ number_format($p['total'], 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-red-200 text-red-700 text-xs font-semibold rounded-full">
                                {{ $p['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <select onchange="updateStatusDropdown(this)" class="text-xs font-bold rounded-full px-2 py-1 bg-yellow-200 text-yellow-800">
                                <option disabled selected>Pilih Aksi</option>
                                <option value="Terkonfirmasi|green">Konfirmasi</option>
                                <option value="Diproses|blue">Proses Kirim</option>
                                <option value="Dikirim|purple">Dikirim</option>
                                <option value="Diterima|gray">Diterima</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function updateStatusDropdown(select) {
            const [status, color] = select.value.split('|');
            const row = select.closest('tr');
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
