# SpeedZone – Aplikasi Jual Beli Miniatur Motorsport

SpeedZone adalah aplikasi berbasis web yang dirancang untuk memudahkan proses jual beli miniatur motorsport secara daring. Aplikasi ini dibuat sebagai bagian dari tugas akhir mata kuliah Project Based Learning (PBL) oleh mahasiswa Program Studi Teknik Informatika, Politeknik Negeri Batam.

## 🎥 Video Presentasi & Demonstrasi

- 📽️ Presentasi AAS: [Klik disini](https://www.youtube.com/watch?v=Fi0Q0_EkAb4)
- 🎞️ Demonstrasi Produk: [Klik disini](https://www.youtube.com/watch?v=SC7VvIho_0I)
- 📺 Penjelasan Seluruh Fitur Aplikasi: [Klik disini](https://drive.google.com/file/d/1vf7gYc-0yp0L2RY7471Rv5ceAKfHRQcK/view?usp=sharing)

---

## 📁 Dokumentasi

- 📂 Dokumen AAS: [Klik disini](https://drive.google.com/drive/u/0/folders/1qIZf6U77_PvtuMXEBDA3EtY-SrstNKbZ)

---

## 🏍️ Deskripsi Singkat

SpeedZone adalah aplikasi web jual beli miniatur motor sport, motor, dan mobil yang dirancang untuk memberikan pengalaman transaksi online yang praktis, aman, dan nyaman bagi para pecinta otomotif miniatur.

Aplikasi ini memungkinkan penjual untuk mengunggah produk lengkap dengan foto dan spesifikasi, serta memberikan kemudahan bagi pembeli untuk mencari, memilih, dan membeli produk berdasarkan kategori atau nama.

Dengan fitur utama seperti:

- 🔐 Registrasi dan login
- 🏠 Halaman beranda dengan produk unggulan
- 🛒 Keranjang belanja & checkout
- 💳 Sistem pembayaran aman & riwayat pesanan

SpeedZone bertujuan membangun ekosistem jual beli miniatur otomotif yang lebih modern, tertata, dan ramah pengguna.

---

## 👥 Tim Pengembang

Proyek ini dikembangkan oleh:

- Raid Aqil Athallah-Ketua Proyek/3312401022
- Dionaldi Sion Yosua-3312401011
- Frima Rizky Lianda-3312401016

Manager Proyek: Yeni Rokhayati, S.Si., M.Sc

---

## 📋 Kebutuhan Fungsional

Berikut link kebutuhan fungsional dari aplikasi speedzone: [Klik disini](https://drive.google.com/file/d/1EmUcHMzv_marOjtO1gZwBgoycUmKT3Gn/view?usp=sharing)

---

## 🛡️ Kebutuhan Non-Funsional

Berikut tabel kebutuhan non-fungsional dari aplikasi speedzone:

| Kode    | Keterangan                                                                    |
|---------|-------------------------------------------------------------------------------|
| NFR-1   | Data transaksi harus terenkripsi dan data pengguna harus aman               |
| NFR-2   | Memastikan aplikasi tidak error saat dijalankan                             |
| NFR-3   | Desain yang sederhana dan mudah dipahami pengguna                           |
| NFR-4   | Memastikan aplikasi dengan respon yang cepat                                |

---

## ⚙️ Langkah Instalasi Aplikasi

Berikut langkah-langkah untuk menjalankan aplikasi ini secara lokal:

### 1. Clone Repository

Salin kode dari Github ke lokal:

```bash
git clone https://github.com/Raid1542/jualbelimotorsport
cd speedzone
```

### 2. Install Dependensi

Install semua dependensi:

```bash
composer install
npm install && npm run dev
```

### 3. Setup File .env

Salin dan buat konfigurasi:

```bash
cp .env.example .env
php artisan key:generate
```
Edit file .env untuk sesuaikan konfigurasi database:

```env
DB_DATABASE=namadatabase
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi Database

Jalankan perintah berikut:

```bash
php artisan migrate
```

### 5. Jalankan server laravel

Jalankan perintah berikut:

```bash
php artisan serve
```
Akses dibrowser:
http://localhost:8000

---

## 📄 Lisensi Proyek

Aplikasi ini dikembangkan khusus untuk keperluan akademik dalam Proyek Berbasis Pembelajaran (PBL) semester 2.
Seluruh hak cipta dan konten © 2025 dimiliki oleh Tim SpeedZone.
