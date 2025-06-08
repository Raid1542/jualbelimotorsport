@extends('layouts.checkout')

@section('title', 'Ringkasan Pembelian')

@section('content')
<main class="py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg p-6 shadow-lg">
        @component('components.product-card', [
        'image' => asset('images/miniatur.png'),
        'title' => 'Miniatur Motor Sport XYZ',
        'price' => 500000
        ])@endcomponent

        <hr class="my-4 border-gray-700">

        <div class="space-y-2">
            <div class="flex justify-between"><span>Biaya Admin</span><span>Rp 10.000</span></div>
            <div class="flex justify-between font-bold text-yellow-400"><span>Total</span><span>Rp 510.000</span></div>
        </div>

        <hr class="my-4 border-gray-700">

        <form method="POST" action="#" class="space-y-4">@csrf
            @component('components.payment-method', ['label' => 'Pilih Metode Pembayaran:'])
            <label class="flex items-center space-x-2"><input type="radio" name="metode" value="transfer" checked onchange="toggleMetode()" class="text-yellow-500 focus:ring-yellow-400"><span>Transfer Dana</span></label>
            <label class="flex items-center space-x-2"><input type="radio" name="metode" value="cod" onchange="toggleMetode()" class="text-yellow-500 focus:ring-yellow-400"><span>COD (Bayar di Tempat)</span></label>
            @endcomponent

            @component('components.form-input', ['type'=>'text','name'=>'nama','label'=>'Nama Lengkap','placeholder'=>'Masukkan nama Anda','required'=>true])@endcomponent
            @component('components.form-input', ['type'=>'text','name'=>'telepon','label'=>'Nomor Telepon','placeholder'=>'Masukkan nomor telepon','required'=>true])@endcomponent

            <div>
                <label class="block font-medium mb-1">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap pengiriman" required class="w-full border-2 border-yellow-300 text-black rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-300"></textarea>
            </div>

            <div id="transfer-section" class="space-y-2">...</div>
            <div id="cod-section" class="space-y-2 hidden">...</div>

            <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg mt-4">Buat Pesanan</button>
        </form>
    </div>
</main>
@endsection