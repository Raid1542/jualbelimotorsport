<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pesanan</th>
            <th>Nama Pembeli</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Metode</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @php $grandTotal = 0; @endphp
        @foreach($pesanan as $trx)
            @foreach($trx->detailPesanan as $item)
                @php
                    $subtotal = $item->produk->harga * $item->jumlah;
                    $grandTotal += $subtotal;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>TRX-{{ str_pad($trx->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $trx->user->name ?? 'Tidak diketahui' }}</td>
                    <td>{{ $item->produk->nama ?? 'Produk dihapus' }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $subtotal }}</td>
                    <td>{{ ucfirst($trx->metode_pembayaran) }}</td>
                    <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        @endforeach
        <tr>
            <td colspan="5"><strong>Total Penjualan</strong></td>
            <td colspan="3"><strong>{{ $grandTotal }}</strong></td>
        </tr>
    </tbody>
</table>
