<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ringkasan Pembelian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-black">

    <!-- Header -->
    <header class="bg-yellow-400 text-white py-4 shadow text-center text-2xl font-bold">
        Ringkasan Pembelian
    </header>

    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg p-6 shadow-lg">

            <!-- Produk -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/miniatur.png') }}" alt="Miniatur Motor" class="w-24 h-24 rounded-md object-cover">
                <div>
                    <h2 class="text-lg font-semibold">Miniatur Motor Sport XYZ</h2>
                    <p class="text-yellow-400 font-bold text-xl">Rp 500.000</p>
                </div>
            </div>

            <hr class="my-4 border-gray-700">

            <!-- Rincian Pembayaran -->
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span>Biaya Admin</span>
                    <span>Rp 10.000</span>
                </div>
                <div class="flex justify-between font-bold text-yellow-400">
                    <span>Total</span>
                    <span>Rp 510.000</span>
                </div>
            </div>

            <hr class="my-4 border-gray-700">

            <!-- Form Pembayaran -->
            <form method="POST" action="#" class="space-y-4">
                @csrf

                <!-- Metode Pembayaran -->
                <div>
                    <label class="block font-medium mb-1">Pilih Metode Pembayaran:</label>
                    <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-2 sm:space-y-0">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="metode" value="transfer" checked onchange="toggleMetode()" class="text-yellow-500 focus:ring-yellow-400">
                            <span>Transfer Dana</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="metode" value="cod" onchange="toggleMetode()" class="text-yellow-500 focus:ring-yellow-400">
                            <span>COD (Bayar di Tempat)</span>
                        </label>
                    </div>
                </div>

                <!-- Data Diri -->
                <div>
                    <label class="block font-medium mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan nama Anda" required
                        class="w-full border-2 border-yellow-300 text-black rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                </div>
                <div>
                    <label class="block font-medium mb-1">Nomor Telepon</label>
                    <input type="text" name="telepon" placeholder="Masukkan nomor telepon" required
                        class="w-full border-2 border-yellow-300 text-black rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                </div>
                <div>
                    <label class="block font-medium mb-1">Alamat Lengkap</label>
                    <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap pengiriman" required
                        class="w-full border-2 border-yellow-300 text-black rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-300"></textarea>
                </div>

                <!-- Transfer Dana -->
                <div id="transfer-section" class="space-y-2">
                    <div>
                        <label class="block font-medium mb-1">Catatan</label>
                        <textarea class="w-full text-black rounded px-4 py-2 border-2 border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                            placeholder="Isi catatan jika ada..." rows="2"></textarea>
                    </div>
                </div>

                <!-- COD (tidak ada tambahan) -->
                <div id="cod-section" class="space-y-2">
                    <div>
                        <label class="block font-medium mb-1">Catatan</label>
                        <textarea class="w-full text-black rounded px-4 py-2 border-2 border-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                            placeholder="Isi catatan jika ada..." rows="2"></textarea>
                    </div>
                </div>

                <!-- Tombol -->
                <button type="submit"
                    class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg mt-4">
                    Buat Pesanan
                </button>
            </form>
        </div>
    </main>

    <!-- Script Toggle Metode -->
    <script>
        function toggleMetode() {
            const metode = document.querySelector('input[name="metode"]:checked').value;
            document.getElementById('transfer-section').classList.toggle('hidden', metode !== 'transfer');
            document.getElementById('cod-section').classList.toggle('hidden', metode !== 'cod');
        }

        document.addEventListener('DOMContentLoaded', toggleMetode);
    </script>

</body>
</html>
