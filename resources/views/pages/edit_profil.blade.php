<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profil | Speedzone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 text-yellow-300 font-sans">

    <!-- Navbar -->
    <header class="bg-yellow-400 p-6  relative flex items-center justify-center">
        <!-- Tombol kembali di kiri -->
        <a href="javascript:history.back()" class="absolute left-6 text-3xl font-semibold text-white hover:text-yellow-200">&larr;</a>
        <h1 class="text-2xl md:text-3xl font-bold text-white">Edit Profil</h1>
    </header>

    <!-- Form Edit Profil -->
    <main class="max-w-2xl mx-auto py-10 px-6 bg-white rounded-lg shadow-lg mt-8">
        <form action="update_profil" method="POST" enctype="multipart/form-data" class="space-y-6">

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-m font-medium text-black">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="Frima Rizky Lianda" class="mt-1 block w-full  bg-gray-100 text-black rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-m font-medium text-black">Email</label>
                <input type="email" id="email" name="email" value="Liaa@email.com" class="mt-1 block w-full border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Telepon -->
            <div>
                <label for="telepon" class="block text-m font-medium text-black">Telepon</label>
                <input type="text" id="telepon" name="telepon" value="+62 123 456 7890" class="mt-1 block w-full border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-m font-medium text-black">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400">Jl. Contoh Alamat No. 123, Jakarta</textarea>
            </div>

            <!-- Upload Foto Profil -->
            <div>
                <label for="foto_profil" class="block text-m font-medium text-black">Foto Profil</label>
                <input type="file" id="foto_profil" name="foto_profil" class="mt-1 block w-full text-sm text-yellow-100 file:bg-yellow-500 file:text-white file:font-semibold file:px-4 file:py-2 file:rounded file:border-0">
            </div>

            <!-- Upload Foto KTP -->
            <div>
                <label for="foto_ktp" class="block text-m font-medium text-black">Foto KTP</label>
                <input type="file" id="foto_ktp" name="foto_ktp" class="mt-1 block w-full text-sm text-yellow-100 file:bg-yellow-500 file:text-white file:font-semibold file:px-4 file:py-2 file:rounded file:border-0">
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div class="flex justify-end gap-4">
                <a href="profil" class="bg-gray-600 hover:bg-yellow-400 hover:text-gray-900 text-yellow-300 font-semibold py-2 px-6 rounded transition">
                    Batal
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-300 text-gray-900 font-semibold py-2 px-6 rounded transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </main>

</body>

</html>