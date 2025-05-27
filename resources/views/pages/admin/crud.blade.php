<!-- views/admin/crud.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-yellow-300 font-sans">

    <div class="max-w-3xl mx-auto mt-10 bg-gray-800 p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-yellow-400 mb-6">Tambah Produk Baru</h1>
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

            <!-- Nama -->
            <div>
                <label class="block font-medium text-yellow-300">Nama Produk</label>
                <input type="text" name="nama" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required>
            </div>
            <!-- Deskripsi -->
            <div>
                <label class="block font-medium text-yellow-300">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required></textarea>
            </div>
            <!-- Harga -->
            <div>
                <label class="block font-medium text-yellow-300">Harga</label>
                <input type="number" name="harga" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required>
            </div>
            <!-- Stok -->
            <div>
                <label class="block font-medium text-yellow-300">Stok</label>
                <input type="number" name="stok" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required>
            </div>
            <!-- Gambar -->
            <div>
                <label class="block font-medium text-yellow-300">Gambar Produk</label>
                <input type="file" name="gambar" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required>
            </div>
            <!-- Warna -->
            <div>
                <label class="block font-medium text-yellow-300">Warna</label>
                <select name="warna" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white">
                    <option value="Merah">Merah</option>
                    <option value="Biru">Biru</option>
                    <option value="Hitam">Hitam</option>
                    <option value="Putih">Putih</option>
                    <option value="Kuning">Kuning</option>
                    <option value="Hijau">Hijau</option>
                </select>
            </div>
            <!-- Kategori -->
            <div>
                <label class="block font-medium text-yellow-300">Kategori</label>
                <select name="kategori" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white">
                    <option value="Honda">Honda</option>
                    <option value="Kawasaki">Kawasaki</option>
                    <option value="Suzuki">Ducati</option>
                    <option value="Suzuki">Yamaha</option>
                </select>
            </div>
            <!-- Submit -->
            <div class="pt-4">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg shadow">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>

</body>
</html>