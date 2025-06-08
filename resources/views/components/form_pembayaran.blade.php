<form method="POST" action="/kirim_pesan" class="space-y-4">
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

<!-- POPUP KONFIRMASI TRANSFER DANA -->
<div id="popup-transfer" class="fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[90%] max-w-md relative">
        <button onclick="closePopup()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
            ×
        </button>
        <h2 class="text-xl font-semibold mb-4 text-center">Instruksi Pembayaran</h2>
        <p class="mb-2">Silakan transfer melalui aplikasi DANA ke:</p>
        <ul class="mb-4">
            <li><strong>Nomor DANA:</strong> 0812-3456-7890</li>
            <li><strong>Atas Nama:</strong> Miniatur Motor Store</li>
            <li><strong>Jumlah:</strong> Rp 510.000</li>
        </ul>
        <p class="text-sm text-gray-600 mb-4">Setelah transfer, pesanan akan segera diproses.</p>
        <button onclick="closePopup()" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded w-full">
            Selesai
        </button>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan/menyembunyikan bagian Transfer Dana atau COD
    function toggleMetode() {
        const metode = document.querySelector('input[name="metode"]:checked').value;
        document.getElementById('transfer-section').classList.toggle('hidden', metode !== 'transfer');
        document.getElementById('cod-section').classList.toggle('hidden', metode !== 'cod');
    }

    // Fungsi untuk menampilkan popup
    function showPopup() {
        document.getElementById('popup-transfer').classList.remove('hidden');
    }

    // Fungsi untuk menutup popup
    function closePopup() {
        document.getElementById('popup-transfer').classList.add('hidden');
    }

    // Menangani submit form
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form submit langsung
        const metode = document.querySelector('input[name="metode"]:checked').value;
        if (metode === 'transfer') {
            showPopup(); // Tampilkan popup jika metode Transfer Dana dipilih
        } else {
            // Untuk COD, bisa langsung submit form atau lakukan aksi lain
            alert('Pesanan COD berhasil dibuat!'); // Contoh untuk COD
            // this.submit(); // Uncomment jika ingin submit form untuk COD
        }
    });

    //Validasi
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
        const nama = document.querySelector('input[name="nama"]').value;
        const telepon = document.querySelector('input[name="telepon"]').value;
        const alamat = document.querySelector('textarea[name="alamat"]').value;

        if (!nama || !telepon || !alamat) {
            alert('Harap isi semua kolom yang diperlukan!');
            return;
        }

        const metode = document.querySelector('input[name="metode"]:checked').value;
        if (metode === 'transfer') {
            showPopup();
        } else {
            alert('Pesanan COD berhasil dibuat!');
            // this.submit(); // Uncomment untuk submit form
        }
    });

    function closePopup() {
        document.getElementById('popup-transfer').classList.add('hidden');
        document.querySelector('form').submit(); // Submit form setelah popup ditutup
    }

    // Panggil toggleMetode saat halaman dimuat
    document.addEventListener('DOMContentLoaded', toggleMetode);
</script>