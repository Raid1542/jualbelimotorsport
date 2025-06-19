<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rincian Resi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex flex-col">
    <!-- Header -->
    <div class="w-full bg-gradient-to-r from-yellow-400 to-yellow-500 py-4 px-6 shadow">
        <h1 class="text-white text-2xl font-bold text-center">Rincian Resi</h1>
    </div>

    <!-- Container utama -->
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl max-w-md w-full mx-4 p-8">
            <h2 class="text-xl font-bold text-yellow-500 text-center mb-1">Rincian Resi</h2>
            <p class="text-sm text-gray-500 mb-6 text-center">
                Terima kasih telah berbelanja di <span class="font-bold text-yellow-600">Speedzone</span>
            </p>
            <div class="space-y-1 text-gray-700 text-base mb-4">
                <div><span class="font-semibold">ID Resi:</span> 1214144</div>
                <div><span class="font-semibold">Kode Pesanan:</span> ORD-20230504-001</div>
                <div><span class="font-semibold">Nama:</span> Prima Rizky Islami</div>
                <div><span class="font-semibold">Alamat:</span> Contoh Alamat No. 123, Jakarta</div>
            </div>
            <div class="border-t border-black my-4"></div>
            <div class="mb-4">
                <div class="font-bold text-yellow-600 mb-2">Detail Produk</div>
                <div class="flex justify-between text-sm text-gray-700 mb-1">
                    <span>Kaus Polos <span class="text-xs text-gray-400">(Putih)</span></span>
                    <span>2 pcs &bull; Rp 150.000</span>
                </div>
                <div class="flex justify-between text-sm text-gray-700">
                    <span>Celana Jeans <span class="text-xs text-gray-400">(Hitam)</span></span>
                    <span>1 pcs &bull; Rp 349.999</span>
                </div>
            </div>
            <div class="border-t border-black my-4"></div>
            <div class="flex justify-between items-center text-lg font-bold text-yellow-600 mb-4">
                <span>Total</span>
                <span>Rp 649.999</span>
            </div>
            <button class="w-full py-2 bg-yellow-400 hover:bg-yellow-500 text-white font-semibold rounded-lg transition mt-2 shadow">Selesai</button>
        </div>
    </div>
</body>
</html>