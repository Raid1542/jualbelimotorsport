@extends('layouts.admin_layout')

@section('title', 'Rekap Penjualan')
@section('judul_halaman', 'Rekap Penjualan')

@section('konten')

    {{-- Filter Form --}}
    <form method="GET" class="flex flex-wrap gap-4 items-center mb-6">
        <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="border p-2 rounded text-sm">

        <select name="status" class="border p-2 rounded text-sm">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="dibayar" {{ request('status') == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="dikirim" {{ request('status') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>

        <select name="metode" class="border p-2 rounded text-sm">
            <option value="">Semua Metode</option>
            <option value="transfer" {{ request('metode') == 'transfer' ? 'selected' : '' }}>Transfer</option>
            <option value="qris" {{ request('metode') == 'qris' ? 'selected' : '' }}>QRIS</option>
        </select>

        <button class="bg-blue-500 text-white px-4 py-2 rounded text-sm">Terapkan Filter</button>

        {{-- Tombol Ekspor --}}
        <a href="{{ route('admin.rekap-penjualan.export') }}" class="ml-auto bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow text-sm">
            Ekspor ke Excel
        </a>
    </form>

    {{-- Tabel Rekap --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left border border-gray-700">
            <thead class="bg-yellow-600 text-gray-900">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">ID Pesanan</th>
                    <th class="px-4 py-2 border">Nama Pembeli</th>
                    <th class="px-4 py-2 border">Produk</th>
                    <th class="px-4 py-2 border">Jumlah</th>
                    <th class="px-4 py-2 border">Total Harga</th>
                    <th class="px-4 py-2 border">Metode</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @forelse ($transaksis as $index => $trx)
                    @foreach ($trx->detail as $item)
                        @php
                            $subtotal = $item->produk->harga * $item->jumlah;
                            $grandTotal += $subtotal;
                        @endphp
                        <tr class="hover:bg-gray-300 text-gray-800">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">TRX-{{ str_pad($trx->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-4 py-2 border">{{ $trx->nama }}</td>
                            <td class="px-4 py-2 border">{{ $item->produk->nama_produk ?? 'Produk dihapus' }}</td>
                            <td class="px-4 py-2 border">{{ $item->jumlah }}</td>
                            <td class="px-4 py-2 border">Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 border">{{ ucfirst($trx->metode_pembayaran) }}</td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 py-6">Belum ada transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Total Penjualan --}}
    @if($transaksis->count() > 0)
        <div class="mt-4 text-right text-lg font-bold text-gray-700">
            Total Penjualan: Rp{{ number_format($grandTotal, 0, ',', '.') }}
        </div>
    @endif

@endsection
