@extends('layouts.keranjang_layout')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-yellow-600">Keranjang Belanja Anda</h1>

    @if($keranjang->isEmpty())
        <div class="bg-white p-6 rounded shadow text-center">
            <p class="text-gray-600 text-lg">Keranjang kamu masih kosong 😢</p>
            <a href="{{ route('produk') }}" class="mt-4 inline-block bg-yellow-500 text-white px-5 py-2 rounded hover:bg-yellow-600 transition">Belanja Sekarang</a>
        </div>
    @else
        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-yellow-500 text-white">
                    <tr>
                        <th class="p-4">Produk</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4">Jumlah</th>
                        <th class="p-4">Subtotal</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($keranjang as $item)
                        @php
                            $produk = $item->produk;
                            $harga = $produk ? $produk->harga : 0;
                            $subtotal = $harga * $item->jumlah;
                            $total += $subtotal;
                        @endphp
                        <tr class="border-b">
                            <td class="p-4">
                                <strong>{{ $produk ? $produk->name : 'Produk sudah dihapus' }}</strong>
                            </td>
                            <td class="p-4">
                                Rp {{ number_format($harga, 0, ',', '.') }}
                            </td>
                            <td class="p-4">{{ $item->jumlah }}</td>
                            <td class="p-4">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td class="p-4">
                                <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-100 font-semibold">
                        <td colspan="3" class="p-4 text-right">Total:</td>
                        <td class="p-4">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        <td class="p-4"></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('checkout', Auth::id()) }}" class="inline-block bg-yellow-500 text-white px-6 py-3 rounded hover:bg-yellow-600 transition">
                Lanjut ke Checkout
            </a>
        </div>
    @endif
</div>
@endsection
