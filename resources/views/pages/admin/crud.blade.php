<!-- views/pages/admin/crud.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $produk ? 'Edit Produk' : 'Tambah Produk' }} - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-yellow-300 font-sans">

    <div class="max-w-3xl mx-auto mt-10 bg-gray-800 p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-yellow-400 mb-6">
            {{ $produk ? 'Edit Produk' : 'Tambah Produk Baru' }}
        </h1>

        <form action="{{ $form_action }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if($form_method === 'PUT')
                @method('PUT')
            @endif

            <!-- Nama -->
            <div>
                <label class="block font-medium text-yellow-300">Nama Produk</label>
                <input type="text" name="nama" value="{{ old('nama', $produk->nama ?? '') }}" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block font-medium text-yellow-300">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required>{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
            </div>

            <!-- Harga -->
            <div>
                <label class="block font-medium text-yellow-300">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $produk->harga ?? '') }}" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required>
            </div>

            <!-- Stok -->
            <div>
                <label class="block font-medium text-yellow-300">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $produk->stok ?? '') }}" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" required>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block font-medium text-yellow-300">Gambar Produk</label>
                <input type="file" name="gambar" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white" {{ $produk ? '' : 'required' }}>
                @if(isset($produk->gambar))
                    <p class="text-sm mt-2">Gambar saat ini: <strong>{{ $produk->gambar }}</strong></p>
                    <img src="{{ asset('images/' . $produk->gambar) }}" alt="gambar produk" class="w-32 mt-2 rounded">
                @endif
            </div>

            <!-- Warna -->
            <div>
                <label class="block font-medium text-yellow-300">Warna</label>
                <select name="warna" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white">
                    @foreach(['Merah', 'Biru', 'Hitam', 'Putih', 'Kuning', 'Hijau'] as $warna)
                        <option value="{{ $warna }}" {{ old('warna', $produk->warna ?? '') == $warna ? 'selected' : '' }}>
                            {{ $warna }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kategori -->
            <div>
                <label class="block font-medium text-yellow-300">Kategori</label>
                <select name="kategori" class="w-full border border-gray-600 rounded p-2 bg-gray-700 text-white">
                    @foreach(['Honda', 'Kawasaki', 'Ducati', 'Yamaha'] as $kategori)
                        <option value="{{ $kategori }}" {{ old('kategori', $produk->kategori ?? '') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg shadow">
                    {{ $button_label }}
                </button>
            </div>
        </form>
    </div>

</body>
</html>
