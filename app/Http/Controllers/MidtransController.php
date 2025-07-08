<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MidtransService;
use Midtrans\Snap;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function tampilkanFormBayar()
    {
        MidtransService::init();

        $orderId = uniqid('ORDER-');
        $grossAmount = 100000; // Ganti sesuai harga produk

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => 'Dion',
                'email' => 'dion@example.com',
                'phone' => '081234567890',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('pages.midtrans-bayar', compact('snapToken'));
    }

    public function handleCallback(Request $request)
    {
        MidtransService::init();

        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $paymentType = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraudStatus = $notification->fraud_status;

        // Simpan ke log dulu supaya bisa kamu cek
        \Log::info("Callback dari Midtrans:");
        \Log::info("Order ID: $orderId");
        \Log::info("Status: $transactionStatus");

        // Contoh: update tabel pesanan
        \DB::table('pesanan')->where('order_id', $orderId)->update([
            'status' => $transactionStatus
        ]);

        return response()->json(['message' => 'Callback processed']);
    }

}

