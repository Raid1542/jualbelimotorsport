@extends('layouts.layout_pesanan')

@section('title', 'Pesanan Saya')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-yellow-600 mb-6">Pesanan Saya</h2>

    <!-- Tab Navigasi -->
    <div class="bg-white shadow-md flex justify-center gap-6 py-2 mb-6">
        <button onclick="showTab('pesanan-tab')" id="btn-pesanan"
            class="text-gray-700 font-semibold border-b-2 border-yellow-500 pb-1">
            Pesanan
        </button>
        <button onclick="showTab('riwayat-tab')" id="btn-riwayat"
            class="text-gray-500 font-semibold hover:text-yellow-500 hover:border-b-2 hover:border-yellow-500 pb-1">
            Riwayat
        </button>
    </div>

    <!-- ✅ Pesanan Aktif -->
    <div id="pesanan-tab">
        @forelse($pesananAktif as $order)
            @include('components.pesanan-item', ['order' => $order, 'showInvoice' => true])
        @empty
            <p class="text-center text-gray-500">Belum ada pesanan yang dilakukan.</p>
        @endforelse
    </div>

    <!-- ✅ Riwayat Selesai -->
    <div id="riwayat-tab" class="hidden">
        @forelse($riwayatSelesai as $order)
            @include('components.pesanan-item', ['order' => $order, 'showInvoice' => true])
        @empty
            <p class="text-center text-gray-500">Belum ada riwayat pesanan.</p>
        @endforelse
    </div>
</div>

<script>
function showTab(tab) {
    document.getElementById('pesanan-tab').classList.add('hidden');
    document.getElementById('riwayat-tab').classList.add('hidden');
    document.getElementById(tab).classList.remove('hidden');

    // Toggle warna tombol
    document.getElementById('btn-pesanan').classList.remove('text-yellow-600', 'border-yellow-500');
    document.getElementById('btn-riwayat').classList.remove('text-yellow-600', 'border-yellow-500');

    if (tab === 'pesanan-tab') {
        document.getElementById('btn-pesanan').classList.add('text-yellow-600', 'border-b-2', 'border-yellow-500');
        document.getElementById('btn-riwayat').classList.remove('border-b-2');
    } else {
        document.getElementById('btn-riwayat').classList.add('text-yellow-600', 'border-b-2', 'border-yellow-500');
        document.getElementById('btn-pesanan').classList.remove('border-b-2');
    }
}
</script>
@endsection
