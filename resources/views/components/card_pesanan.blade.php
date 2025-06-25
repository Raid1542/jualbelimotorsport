<div class="bg-white rounded-lg p-4 shadow w-full flex flex-col sm:flex-row justify-between items-start gap-4"> 
    <div class="flex gap-4">
        <img src="/images/Foto_1.png" alt="Produk" class="w-20 h-20 object-cover rounded border">
        <div>
            <p class="text-sm font-semibold">SpeedZone Official</p>
            <p class="text-yellow-600 font-bold">SpeedZone Hoodie Unisex</p>
            <p class="text-sm text-gray-700">Ukuran: M | Warna: Navy</p>
            <p class="text-sm text-gray-700">Jumlah: x1</p>
        </div>
    </div>
    <div class="text-right">
        <p class="text-{{ $warna }}-500 text-sm font-bold mb-1">{{ $status }}</p>
        <p class="font-semibold mb-2">Rp199.000</p>
        <div class="flex gap-2 justify-end">
            @if ($status === 'Selesai')
                <button class="bg-yellow-500 text-white text-sm px-3 py-1 rounded hover:bg-yellow-400">Beli Lagi</button>
            @endif
            <button class="border border-yellow-500 text-yellow-500 text-sm px-3 py-1 rounded hover:bg-yellow-100">Detail</button>
        </div>
    </div>
</div>
