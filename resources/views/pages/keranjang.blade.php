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
        <div class="flex justify-end mb-4">
            <label class="inline-flex items-center space-x-2">
                <input type="checkbox" id="pilihSemua" class="w-5 h-5 accent-yellow-500" onchange="toggleSemua()">
                <span class="text-gray-700 font-medium">Pilih Semua</span>
            </label>
        </div>

        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <div class="bg-gray-100 rounded-lg shadow divide-y">
                @foreach ($keranjang as $item)
                    @php
                        $produk = $item->produk;
                        $harga = $produk ? $produk->harga : 0;
                        $subtotal = $harga * $item->jumlah;
                    @endphp

                    <div class="keranjang-item bg-white p-4 md:p-6 flex items-start gap-4" data-id="{{ $item->id }}" data-harga="{{ $harga }}">
                        <input type="checkbox" name="items[]" value="{{ $item->id }}" class="item-checkbox mt-2 w-5 h-5 accent-yellow-500" data-subtotal="{{ $subtotal }}" onchange="updateTotal()">

                        <div class="w-24 h-24 rounded border overflow-hidden">
                            @if($produk && $produk->gambar)
                                <img src="{{ asset('images/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-gray-400 italic text-sm text-center mt-4">Tidak ada gambar</div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h2 class="text-lg font-semibold">{{ $produk ? $produk->nama : 'Produk dihapus' }}</h2>
                                    <p class="text-sm text-gray-500">Harga: Rp {{ number_format($harga, 0, ',', '.') }}</p>
                                </div>
                                <div class="text-yellow-600 font-bold text-lg subtotal-text">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="mt-3 flex items-center gap-2">
                                <button type="button" class="btn-kurang px-3 py-1 bg-gray-200 text-lg rounded hover:bg-gray-300" data-id="{{ $item->id }}">−</button>
                                <input type="text" readonly name="jumlah[{{ $item->id }}]" value="{{ $item->jumlah }}" class="qty-input w-12 text-center border border-gray-300 rounded text-lg font-medium bg-white" />
                                <button type="button" class="btn-tambah px-3 py-1 bg-yellow-400 text-lg rounded hover:bg-yellow-500" data-id="{{ $item->id }}">+</button>

                                <button type="button" class="btn-hapus ml-auto text-sm text-red-600 hover:underline" data-id="{{ $item->id }}">Hapus</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="totalTerpilihBox" class="hidden mt-6 text-right pr-2">
                <div class="text-sm text-gray-700">Total Terpilih:</div>
                <div id="totalTerpilih" class="text-2xl font-bold text-red-600">Rp 0</div>
            </div>

            <div class="flex justify-between items-center mt-6 mb-6">
    <a href="{{ route('produk') }}" 
       class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl shadow-lg font-semibold transition text-center">
        + Belanja Lagi
    </a>
    
    <button type="submit" id="checkoutBtn" disabled 
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl shadow-lg font-semibold transition">
        Checkout Barang Terpilih
    </button>
</div>



        </form>
    @endif
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    document.getElementById('totalTerpilihBox').classList.toggle('hidden', !aktif);
    document.getElementById('totalTerpilih').textContent = 'Rp ' + total.toLocaleString('id-ID');
    document.getElementById('checkoutBtn').disabled = !aktif;
}

function toggleSemua() {
    const checked = document.getElementById('pilihSemua').checked;
    document.querySelectorAll('.item-checkbox').forEach(cb => cb.checked = checked);
    updateTotal();
}

document.addEventListener('DOMContentLoaded', () => {
    // Tambah
    document.querySelectorAll('.btn-tambah').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.keranjang-item');
            const input = item.querySelector('.qty-input');
            let val = parseInt(input.value);
            const harga = parseInt(item.dataset.harga);
            val++;
            input.value = val;

            const subtotal = val * harga;
            item.querySelector('.subtotal-text').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
            item.querySelector('.item-checkbox').dataset.subtotal = subtotal;
            updateTotal();
        });
    });

    // Kurangi
    document.querySelectorAll('.btn-kurang').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.keranjang-item');
            const input = item.querySelector('.qty-input');
            let val = parseInt(input.value);
            const harga = parseInt(item.dataset.harga);
            const id = item.dataset.id;

            if (val > 1) {
                val--;
                input.value = val;

                const subtotal = val * harga;
                item.querySelector('.subtotal-text').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
                item.querySelector('.item-checkbox').dataset.subtotal = subtotal;
                updateTotal();
            } else {
                Swal.fire({
                    title: 'Hapus produk dari keranjang?',
                    text: 'Jumlah akan menjadi 0. Hapus item ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Ya, hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/keranjang/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                item.remove();
                                updateTotal();
                                Swal.fire('Dihapus!', 'Item telah dihapus.', 'success');
                            } else {
                                Swal.fire('Gagal', data.message || 'Gagal menghapus item.', 'error');
                            }
                        })
                        .catch(() => {
                            Swal.fire('Error', 'Terjadi kesalahan.', 'error');
                        });
                    }
                });
            }
        });
    });

    // Hapus manual
    document.querySelectorAll('.btn-hapus').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.keranjang-item');
            const id = item.dataset.id;

            Swal.fire({
                title: 'Yakin hapus?',
                text: 'Item akan dihapus dari keranjang.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/keranjang/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            item.remove();
                            updateTotal();
                            Swal.fire('Berhasil', 'Item dihapus.', 'success');
                        } else {
                            Swal.fire('Gagal', 'Item tidak bisa dihapus.', 'error');
                        }
                    });
                }
            });
        });
    });
});
</script>
@endsection
