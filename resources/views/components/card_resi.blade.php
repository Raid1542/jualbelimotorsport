<div class="bg-white shadow-lg rounded-xl w-full max-w-md p-6 font-sans">
    <!-- Header -->
    <div class="text-center mb-4">
        <h1 class="text-2xl font-bold text-yellow-500">Speedzone</h1>
        <p class="text-sm text-gray-600">Rincian Resi Pengiriman</p>
    </div>

    <div class="border-t border-gray-300 my-4"></div>

    <!-- Info Resi -->
    <div class="text-sm text-gray-700 space-y-1">
        <p><span class="font-semibold">ID Resi:</span> {{ $data['id_resi'] }}</p>
        <p><span class="font-semibold">Kode Pesanan:</span> {{ $data['kode_pesanan'] }}</p>
        <p><span class="font-semibold">Nama:</span> {{ $data['nama'] }}</p>
        <p><span class="font-semibold">Alamat:</span> {{ $data['alamat'] }}</p>
    </div>

    <div class="border-t border-gray-300 my-4"></div>

    <!-- Rincian Produk -->
    <div class="text-sm text-gray-700">
        <p class="font-bold text-yellow-600 mb-2">Detail Produk:</p>
        @foreach ($data['produk'] as $item)
        <div class="flex justify-between mb-1">
            <span>{{ $item['nama'] }} <span class="text-xs text-gray-400">({{ $item['varian'] }})</span></span>
            <span>{{ $item['jumlah'] }} pcs • Rp{{ number_format($item['harga'], 0, ',', '.') }}</span>
        </div>
        @endforeach
    </div>

    <div class="border-t border-gray-300 my-4"></div>

    <!-- Total -->
    <div class="flex justify-between font-bold text-sm text-yellow-600">
        <span>Total</span>
        <span>Rp{{ number_format($data['total'], 0, ',', '.') }}</span>
    </div>

    <!-- Footer -->
    <div class="mt-6 text-center">
        <p class="text-xs text-gray-500">Terima kasih telah berbelanja di Speedzone</p>
        <button class="mt-4 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white text-sm rounded-lg shadow transition">
            Kembali ke Beranda
        </button>
    </div>
</div>