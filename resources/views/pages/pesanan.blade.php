@extends('layouts.layout_pesanan')

@section('content')
<main class="w-full px-4 py-6 max-w-6xl mx-auto">
  <!-- PESANAN -->
  <div id="content-pesanan" class="w-full space-y-4">
    @include('components.card_pesanan', ['status' => 'Sedang Dikirim', 'warna' => 'blue'])
  </div>

  <!-- RIWAYAT -->
  <div id="content-riwayat" class="w-full space-y-4 hidden">
    @include('components.card_pesanan', ['status' => 'Selesai', 'warna' => 'green'])
  </div>
</main>
@endsection

@section('scripts')
<script>
  function showTab(tab) {
    const pesanan = document.getElementById('content-pesanan');
    const riwayat = document.getElementById('content-riwayat');
    const tabPesanan = document.getElementById('tab-pesanan');
    const tabRiwayat = document.getElementById('tab-riwayat');

    pesanan.classList.add('hidden');
    riwayat.classList.add('hidden');
    tabPesanan.classList.remove('text-yellow-500', 'border-b-2', 'border-yellow-500');
    tabRiwayat.classList.remove('text-yellow-500', 'border-b-2', 'border-yellow-500');

    if (tab === 'pesanan') {
      pesanan.classList.remove('hidden');
      tabPesanan.classList.add('text-yellow-500', 'border-b-2', 'border-yellow-500');
    } else {
      riwayat.classList.remove('hidden');
      tabRiwayat.classList.add('text-yellow-500', 'border-b-2', 'border-yellow-500');
    }
  }
  window.onload = () => showTab('pesanan');
</script>
@endsection