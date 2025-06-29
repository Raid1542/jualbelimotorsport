@extends('layouts.admin_layout')

@section('title', 'Kelola Pesanan')
@section('judul_halaman', 'Kelola Pesanan')

@section('konten')
<div class="p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-4 text-yellow-600">Daftar Pesanan</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-yellow-500 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Pembeli</th>
                    <th class="px-4 py-3 text-left">Produk</th>
                    <th class="px-4 py-3 text-left">Total Harga</th>
                    <th class="px-4 py-3 text-left">Metode</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @forelse ($transaksis as $index => $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3">{{ $order->user->name }}</td>
                        <td class="px-4 py-3">
                            <ul class="list-disc pl-4">
                                @foreach($order->detailPesanan as $item)
                                    <li>{{ $item->produk->nama }} (x{{ $item->jumlah }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-4 py-3 text-red-600 font-semibold">Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 capitalize">{{ $order->metode_pembayaran }}</td>
                        <td class="px-4 py-3 capitalize">
                            <span class="inline-block px-2 py-1 rounded-xl text-xs font-semibold
                                {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' :
                                   ($order->status == 'dibayar' ? 'bg-green-100 text-green-700' :
                                   'bg-blue-100 text-blue-700') }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
    @if($order->status === 'dibayar')
        <form action="{{ route('admin.pesanan.proses', $order->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-2 rounded-lg">
                Proses Pesanan
            </button>
        </form>
    @elseif($order->status === 'diproses')
        <form action="{{ route('admin.pesanan.kirim', $order->id) }}" method="POST" class="flex gap-2">
            @csrf
            <input type="text" name="no_resi" placeholder="No. Resi"
                class="border px-2 py-1 text-xs rounded" required>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-2 rounded-lg">
                Kirim
            </button>
        </form>
    @elseif($order->status === 'dikirim')
        <span class="text-sm text-gray-500">Sedang dikirim (Resi: {{ $order->no_resi }})</span>
    @elseif($order->status === 'selesai')
        <span class="text-sm text-green-600 font-semibold">Pesanan Selesai</span>
    @else
        <span class="text-sm text-yellow-600">Menunggu Pembayaran</span>
    @endif
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                            Belum ada pesanan masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
