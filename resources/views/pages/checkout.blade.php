@extends('layouts.konfirmasi')

@section('title', 'Checkout - SpeedZone')

@section('content')

@if(session('error'))
<div class="mb-6 px-4 py-3 rounded-xl bg-red-100 border border-red-300 text-red-700 font-semibold shadow">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div 
  x-data="{ open: true }"
  x-show="open"
  x-transition
  x-init="
    setTimeout(() => {
        open = false;
        window.location.href = '{{ route('pesanan') }}';
    }, 4000)
  "
  class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
>
  <div class="bg-white rounded-xl shadow-xl p-8 max-w-sm w-full text-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-green-500 mb-4" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 13l4 4L19 7" />
    </svg>
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Berhasil!</h2>
    <p class="text-gray-600 mb-4">Terima kasih telah berbelanja di <span class="text-yellow-600 font-semibold">Speedzone</span>.</p>
    <p class="text-sm text-gray-500">Mengalihkan ke halaman pesanan...</p>
  </div>
</div>
@endif

<div class="max-w-3xl mx-auto px-4 py-6">

   {{-- Alamat --}}
   <div class="bg-white rounded-xl shadow-md p-4 mb-4">
      <h2 class="font-bold text-lg text-yellow-600 mb-2">Alamat Pengiriman</h2>
      <p class="text-sm text-gray-700 mb-1">
         <span class="font-medium">Nama:</span> {{ Auth::user()->name ?? '-' }}
      </p>
      <p class="text-sm text-gray-700 mb-1">
         <span class="font-medium">Telepon:</span> {{ Auth::user()->telepon ?? '-' }}
      </p>
      <p class="text-sm text-gray-700">
         <span class="font-medium">Alamat:</span> {{ Auth::user()->alamat ?? '-' }}
      </p>
   </div>

   {{-- Produk --}}
   <div class="bg-white rounded-xl shadow-md p-4 mb-4">
      <h2 class="font-bold text-lg mb-3 text-yellow-600">Detail Produk</h2>

      @if(!empty($keranjang))
        @foreach($keranjang as $item)
        <div class="flex gap-4 items-start mb-4">
           <img src="{{ asset('images/' . $item->produk->gambar) }}" alt="produk" class="w-20 h-20 object-cover rounded">
           <div class="flex-1">
              <h3 class="font-semibold text-gray-800">{{ $item->produk->nama }}</h3>
              <p class="text-sm text-gray-500">Qty: {{ $item->jumlah }}</p>
              <p class="text-sm font-semibold text-red-600">Rp{{ number_format($item->produk->harga * $item->jumlah, 0, ',', '.') }}</p>
           </div>
        </div>
        @endforeach

      @elseif(!empty($produk))
        <div class="flex gap-4 items-start mb-4">
          <img src="{{ asset('images/' . $produk->gambar) }}" alt="produk" class="w-20 h-20 object-cover rounded">
          <div class="flex-1">
            <h3 class="font-semibold text-gray-800">{{ $produk->nama }}</h3>
            <p class="text-sm text-gray-500">Qty: {{ $jumlah ?? 1 }}</p>
            <p class="text-sm font-semibold text-red-600">Rp{{ number_format($produk->harga * ($jumlah ?? 1), 0, ',', '.') }}</p>
          </div>
        </div>
      @endif
   </div>

   {{-- Metode Pembayaran --}}
   <div class="bg-white rounded-xl shadow-md p-4 mb-4">
      <h2 class="font-bold text-lg text-yellow-600 mb-2">Metode Pembayaran</h2>
      <div class="space-y-2">
         <label class="flex items-center gap-3">
            <input type="radio" name="metode_pembayaran" value="cod" checked class="accent-yellow-500">
            <span>COD (Bayar di Tempat)</span>
         </label>
         <label class="flex items-center gap-3">
            <input type="radio" name="metode_pembayaran" value="qris" class="accent-yellow-500">
            <span>QRIS (Scan untuk Bayar)</span>
         </label>
      </div>
   </div>

   {{-- Rincian Pembayaran --}}
   <div class="bg-white rounded-xl shadow-md p-4 mb-4">
      <h2 class="font-bold text-lg text-yellow-600 mb-2">Rincian Pembayaran</h2>
      <div class="flex justify-between text-sm text-gray-700 mb-1">
         <span>Subtotal</span>
         <span>Rp{{ number_format($subtotal ?? 0, 0, ',', '.') }}</span>
      </div>
      <div class="flex justify-between text-base font-bold text-gray-800 mt-2">
         <span>Total</span>
         <span class="text-red-600">Rp{{ number_format($total ?? 0, 0, ',', '.') }}</span>
      </div>
   </div>

   {{-- Form --}}
   <form id="formCheckout" action="{{ route('checkout.proses') }}" method="POST">
      @csrf
      <input type="hidden" name="metode_pembayaran_terpilih" id="metode_pembayaran_terpilih" value="cod">

      {{-- Untuk checkout dari keranjang --}}
      @if(!empty($selectedItems))
        @foreach ($selectedItems as $id)
          <input type="hidden" name="items[]" value="{{ $id }}">
        @endforeach

      {{-- Untuk checkout langsung beli sekarang --}}
      @elseif(!empty($produk))
        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
        <input type="hidden" name="jumlah" value="{{ $jumlah ?? 1 }}">
      @endif

      <button type="submit" id="btn-buat-pesanan"
         class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-xl shadow">
         Buat Pesanan
      </button>
   </form>
</div>

{{-- Midtrans --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

<script>
document.getElementById('formCheckout').addEventListener('submit', function (e) {
    e.preventDefault();

    const metode = document.querySelector('input[name="metode_pembayaran"]:checked')?.value;
    document.getElementById('metode_pembayaran_terpilih').value = metode;

    const form = this;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'need_payment') {
            fetch("{{ route('checkout.snap.token') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ pesanan_id: data.pesanan_id })
            })
            .then(res => res.json())
            .then(midtrans => {
                if (midtrans.snapToken) {
                    snap.pay(midtrans.snapToken, {
                        onSuccess: function(result) {
                            window.location.href = "{{ route('pesanan') }}";
                        },
                        onPending: function(result) {
                            window.location.href = "{{ route('pesanan') }}";
                        },
                        onError: function(result) {
                            alert("Pembayaran gagal.");
                        }
                    });
                } else {
                    alert("Gagal mendapatkan Snap Token.");
                }
            });
        } else if (data.status === 'success') {
            window.location.href = data.redirect;
        }
    })
    .catch(error => {
        console.error("Checkout error:", error);
        alert("Terjadi kesalahan saat checkout.");
    });
});
</script>

@endsection
