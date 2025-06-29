<div class="bg-white rounded-xl shadow-md p-4 mb-6">
    <div class="flex justify-between items-center mb-2">
        <h3 class="text-lg font-semibold text-gray-800">Pesanan #{{ $order->id }}</h3>
        <span class="text-sm font-medium px-3 py-1 rounded-full
            {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-600' :
               ($order->status === 'dibayar' ? 'bg-green-100 text-green-600' :
               ($order->status === 'dikirim' ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600')) }}">
            {{ ucfirst($order->status) }}
        </span>
    </div>

    <p class="text-sm text-gray-600 mb-2">Tanggal: {{ $order->created_at->format('d M Y, H:i') }}</p>
    <p class="text-sm text-gray-600 mb-4">Metode Pembayaran: <span class="font-medium">{{ strtoupper($order->metode_pembayaran) }}</span></p>

    <div class="space-y-3 mb-3">
        @foreach($order->detailPesanan as $item)
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/' . $item->produk->gambar) }}" alt="produk" class="w-16 h-16 object-cover rounded">
            <div class="flex-1">
                <p class="text-gray-800 font-semibold">{{ $item->produk->nama }}</p>
                <p class="text-sm text-gray-500">Jumlah: {{ $item->jumlah }} • Harga: Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="flex justify-between items-center mt-4">
        <p class="text-gray-800 font-bold">Total: Rp{{ number_format($order->total, 0, ',', '.') }}</p>

        <div class="flex gap-3">
            @if($order->metode_pembayaran === 'qris' && $order->status === 'pending')
                <a href="{{ route('checkout.qris', $order->id) }}"
                   class="text-sm px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg shadow">
                   Bayar Sekarang
                </a>
            @elseif($order->status === 'dikirim')
                <form action="{{ route('pesanan.selesai', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="text-sm px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow"
                        onclick="return confirm('Konfirmasi bahwa barang sudah diterima?')">
                        Pesanan Diterima
                    </button>
                </form>
            @endif

            @if($showInvoice ?? false)
            <a href="{{ route('pesanan.invoice', $order->id) }}"
               class="text-sm px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg shadow">
               Lihat Invoice
            </a>
            @endif
        </div>
    </div>
</div>
