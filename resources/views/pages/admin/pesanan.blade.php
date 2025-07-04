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
                    <th class="px-4 py-3 text-left">Total</th>
                    <th class="px-4 py-3 text-left">Metode</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($pesanan as $index => $order)
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
                                {{ $order->status == 'menunggu konfirmasi' ? 'bg-yellow-100 text-yellow-700' :
                                   ($order->status == 'diproses' ? 'bg-blue-100 text-blue-700' :
                                   ($order->status == 'diperjalanan' ? 'bg-purple-100 text-purple-700' :
                                   ($order->status == 'selesai' ? 'bg-green-100 text-green-700' :
                                   'bg-gray-100 text-gray-700'))) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if($order->status == 'menunggu konfirmasi')
                                <form action="{{ route('admin.pesanan.konfirmasi', $order->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-2 rounded-lg">
                                        Konfirmasi Pesanan
                                    </button>
                                </form>
                            @elseif(in_array($order->status, ['diproses', 'diperjalanan']))
                                <form action="{{ route('admin.pesanan.ubah-status', $order->id) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="text-xs border rounded px-2 py-1">
                                        <option {{ $order->status == 'diproses' ? 'selected' : '' }} value="diproses">Proses</option>
                                        <option {{ $order->status == 'diperjalanan' ? 'selected' : '' }} value="diperjalanan">Kirim</option>
                                        <option value="selesai">Diterima</option>
                                    </select>
                                    @if($order->status == 'diperjalanan')
                                        <input type="text" name="no_resi" value="{{ $order->no_resi }}" placeholder="No. Resi"
                                            class="border px-2 py-1 text-xs rounded" required>
                                    @endif
                                </form>
                            @elseif($order->status == 'selesai')
                                <span class="text-sm text-green-600 font-semibold">Pesanan Selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
