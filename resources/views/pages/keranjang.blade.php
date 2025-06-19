@extends('layouts.keranjang_layout')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-yellow-600">Keranjang Belanja Anda</h1>

    @if($keranjang->isEmpty())
        <div class="bg-white p-6 rounded shadow text-center">
            <p class="text-gray-600 text-lg">Keranjang kamu masih kosong</p>
            <a href="{{ route('produk') }}" class="mt-4 inline-block bg-yellow-500 text-white px-5 py-2 rounded hover:bg-yellow-600 transition">Belanja Sekarang</a>
        </div>
    @else
        <!-- PILIH SEMUA -->
        <div class="flex justify-end mb-4">
            <label class="inline-flex items-center space-x-2">
                <input type="checkbox" id="pilihSemua" class="w-5 h-5 accent-yellow-500" onchange="toggleSemua()">
                <span class="text-gray-700 font-medium">Pilih Semua</span>
            </label>
        </div>

        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <div class="bg-white rounded shadow divide-y">
                @foreach ($keranjang as $item)
                    @php
                        $produk = $item->produk;
                        $harga = $produk ? $produk->harga : 0;
                        $subtotal = $harga * $item->jumlah;
                    @endphp

                    <div class="flex items-center gap-4 p-4">
                        <input type="checkbox" name="items[]" value="{{ $item->id }}" class="item-checkbox w-5 h-5 accent-yellow-500" data-subtotal="{{ $subtotal }}" onchange="updateTotal()">

                        <div class="w-20 h-20">
                            @if($produk && $produk->gambar)
                                <img src="{{ asset('images/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="w-full h-full object-cover rounded">
                            @else
                                <div class="text-gray-400 italic">Tidak ada gambar</div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <div class="font-semibold">{{ $produk ? $produk->nama : 'Produk dihapus' }}</div>
                            <div class="text-sm text-gray-500">Harga: Rp {{ number_format($harga, 0, ',', '.') }}</div>

                            <div class="mt-2 flex items-center gap-2">
                                <form action="{{ route('keranjang.kurangi', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">−</button>
                                </form>

                                <span class="px-2">{{ $item->jumlah }}</span>

                                <form action="{{ route('keranjang.tambahlangsung', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-2 py-1 bg-yellow-400 rounded hover:bg-yellow-500">+</button>
                                </form>
                            </div>
                        </div>

                        <div class="text-right">
                            <div class="text-yellow-600 font-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</div>
                            <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?')" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 text-sm hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Ringkasan Total -->
            <div id="totalTerpilihBox" class="hidden mt-4 text-right">
                <div class="text-sm text-gray-700">Total Terpilih:</div>
                <div id="totalTerpilih" class="text-xl font-bold text-red-600">Rp 0</div>
            </div>

            <!-- Tombol Checkout -->
            <div class="flex justify-end mt-6">
                <button type="submit" id="checkoutBtn" disabled class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-xl shadow">
                    Checkout Barang Terpilih
                </button>
            </div>
        </form>
    @endif
</div>

<script>
function updateTotal() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    let total = 0;
    let aktif = false;

    checkboxes.forEach(cb => {
        if (cb.checked) {
            total += parseInt(cb.dataset.subtotal);
            aktif = true;
        }
    });

    const totalBox = document.getElementById('totalTerpilihBox');
    const totalText = document.getElementById('totalTerpilih');
    const checkoutBtn = document.getElementById('checkoutBtn');

    if (aktif) {
        totalBox.classList.remove('hidden');
        totalText.textContent = 'Rp ' + total.toLocaleString('id-ID');
        checkoutBtn.disabled = false;
    } else {
        totalBox.classList.add('hidden');
        totalText.textContent = 'Rp 0';
        checkoutBtn.disabled = true;
    }
}

function toggleSemua() {
    const masterCheckbox = document.getElementById('pilihSemua');
    const itemCheckboxes = document.querySelectorAll('.item-checkbox');

    itemCheckboxes.forEach(cb => {
        cb.checked = masterCheckbox.checked;
    });

    updateTotal();
}
</script>
@endsection
