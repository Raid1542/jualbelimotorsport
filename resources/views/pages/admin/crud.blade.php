<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $produk ? 'Edit Produk' : 'Tambah Produk' }} - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        <h1 class="text-2xl font-bold text-yellow-600 mb-6">
            {{ $produk ? 'Edit Produk' : 'Tambah Produk Baru' }}
        </h1>

        <!-- Notifikasi Error -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $form_action }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if($form_method === 'PUT')
                @method('PUT')
            @endif

            <!-- Nama -->
            <div>
                <label class="block font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="nama" value="{{ old('nama', $produk->nama ?? '') }}"
                    placeholder="Masukkan nama produk"
                    class="w-full border border-gray-300 rounded p-2 bg-white text-gray-800" required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    placeholder="Tulis deskripsi produk"
                    class="w-full border border-gray-300 rounded p-2 bg-white text-gray-800" required>{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
            </div>

            <!-- Harga -->
            <div>
                <label class="block font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $produk->harga ?? '') }}"
                    placeholder="Masukkan harga"
                    class="w-full border border-gray-300 rounded p-2 bg-white text-gray-800" required>
            </div>

            <!-- Stok -->
            <div>
                <label class="block font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $produk->stok ?? '') }}"
                    placeholder="Masukkan jumlah stok"
                    class="w-full border border-gray-300 rounded p-2 bg-white text-gray-800" required>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block font-medium text-gray-700">Gambar Produk</label>
                <input type="file" name="gambar"
                    class="w-full border border-gray-300 rounded p-2 bg-white text-gray-800"
                    {{ $produk ? '' : 'required' }}>
                @if(isset($produk->gambar))
                    <p class="text-sm mt-2 text-gray-600">Gambar saat ini:</p>
                    <img src="{{ asset('images/' . $produk->gambar) }}" alt="gambar produk"
                        class="w-32 mt-2 rounded shadow border border-gray-300">
                @endif
            </div>

            <!-- Warna -->
            <div>
                <label class="block font-medium text-gray-700">Warna</label>
                <select name="warna" class="w-full border border-gray-300 rounded p-2 bg-white text-gray-800">
                    @foreach(['Merah', 'Biru', 'Hitam', 'Putih', 'Kuning', 'Hijau'] as $warna)
                        <option value="{{ $warna }}"
                            {{ old('warna', $produk->warna ?? '') == $warna ? 'selected' : '' }}>
                            {{ $warna }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kategori -->
            <div>
                <label class="block font-medium text-gray-700">Kategori</label>
                <select name="kategori" class="w-full border border-gray-300 rounded p-2 bg-white text-gray-800">
                    @foreach(['Honda', 'Kawasaki', 'Ducati', 'Yamaha'] as $kategori)
                        <option value="{{ $kategori }}"
                            {{ old('kategori', $produk->kategori ?? '') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Submit -->
            <div class="pt-4">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg shadow transition duration-200">
                    {{ $button_label }}
                </button>
            </div>
        </form>
    </div>

</body>
</html>
