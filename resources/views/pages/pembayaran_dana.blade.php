<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran DANA</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white text-gray-900 rounded-xl shadow-lg w-full max-w-md p-8 relative">
        <h2 class="text-2xl font-extrabold text-center text-yellow-500 mb-3 tracking-wide">Pembayaran DANA</h2>
        <div class="mb-4 text-center text-sm text-gray-700">
            Transfer ke DANA:
            <div class="font-bold text-yellow-500 text-xl mt-1 tracking-wider">0812-3456-7890</div>
            <div class="text-xs mt-1 text-gray-500">Speedzone</div>
        </div>
        <div class="mb-6 text-center">
            <span class="block text-gray-700 mb-1 font-medium">Jumlah Tagihan</span>
            <div class="bg-yellow-100 text-yellow-600 font-bold rounded-lg py-3 px-4 text-2xl my-2 border border-yellow-300 shadow-inner">
                Rp 510.000
            </div>
        </div>
        <!-- (Opsional) Countdown waktu pembayaran -->
        <div class="flex justify-center items-center mb-4">
            <span class="text-xs text-gray-500 mr-2">Batas pembayaran:</span>
            <span id="timer" class="font-semibold text-yellow-600"></span>
        </div>
        <div class="flex justify-center mb-4">
            <button onclick="copyDanaNumber()" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold px-4 py-2 rounded mr-2 text-sm shadow transition">Salin Nomor DANA</button>
            <a href="https://www.dana.id/" target="_blank" class="text-yellow-500 underline text-sm flex items-center hover:text-yellow-600 transition">Buka DANA</a>
        </div>
        <div class="bg-yellow-50 rounded-md p-3 mb-4 text-xs text-center text-yellow-600">
            Setelah Anda melakukan pembayaran, sistem kami akan otomatis memverifikasi pembayaran Anda.<br>
        </div>
        <div class="flex justify-center">
            <button onclick="cekStatusPembayaran()" class="bg-white border border-yellow-400 text-yellow-600 hover:bg-yellow-100 font-semibold py-2 px-4 rounded transition text-sm">
                Cek Status Pembayaran
            </button>
        </div>
    </div>

    <script>
    function copyDanaNumber() {
        const nomor = '0812-3456-7890';
        navigator.clipboard.writeText(nomor);
        alert('Nomor DANA disalin!');
    }

    // Dummy function untuk tombol cek status pembayaran
    function cekStatusPembayaran() {
        alert('Status pembayaran dicek! (Simulasi, seharusnya cek ke server)');
        // Di implementasi nyata, lakukan AJAX/fetch ke backend untuk cek status pembayaran
    }

    // (Opsional) Timer countdown pembayaran 1 jam dari load page
    let waktuSisa = 60 * 60; // 1 jam (dalam detik)
    function updateTimer() {
        const timer = document.getElementById('timer');
        if (!timer) return;
        const jam = Math.floor(waktuSisa / 3600);
        const menit = Math.floor((waktuSisa % 3600) / 60);
        const detik = waktuSisa % 60;
        timer.textContent = `${jam.toString().padStart(2,'0')}:${menit.toString().padStart(2,'0')}:${detik.toString().padStart(2,'0')}`;
        if (waktuSisa > 0) {
            waktuSisa--;
            setTimeout(updateTimer, 1000);
        } else {
            timer.textContent = "Waktu habis";
        }
    }
    updateTimer();
    </script>
</body>
</html>