<form method="POST" action="/status_pesanan" class="space-y-4">
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

    <!-- COD -->
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

<script>
    // Fungsi untuk menampilkan/menyembunyikan bagian Transfer Dana atau COD
    function toggleMetode() {
        const metode = document.querySelector('input[name="metode"]:checked').value;
        document.getElementById('transfer-section').classList.toggle('hidden', metode !== 'transfer');
        document.getElementById('cod-section').classList.toggle('hidden', metode !== 'cod');
    }
    
    // Panggil toggleMetode saat halaman dimuat
    document.addEventListener('DOMContentLoaded', toggleMetode);
</script>