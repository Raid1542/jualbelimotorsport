<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class KonfirmasiPembayaranController extends Controller
{
    public function index()
    {
        // Data pembayaran dalam format array asosiatif
        $pembayaranList = [
            [
                'nama' => 'Frima Rizky',
                'bank' => 'BCA',
                'telepon' => '08123456789',
                'alamat' => 'Jl. Kebon Jeruk No. 123',
                'total' => 40000000,
                'status' => 'Menunggu',
            ],
            [
                'nama' => 'Andi Saputra',
                'bank' => 'Mandiri',
                'telepon' => '08234567890',
                'alamat' => 'Jl. Merdeka No. 456',
                'total' => 25000000,
                'status' => 'Diproses',
            ],
            // Tambahkan data pembayaran lain sesuai kebutuhan
        ];

        // Kirim data ke view
        return view('pages.admin.konfirmasi_pembayaran', compact('pembayaranList'));
    }
}
