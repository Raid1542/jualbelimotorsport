<!-- views/pages/midtrans-bayar.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Bayar dengan Midtrans</title>
</head>
<body>
    <h2>Bayar Motor</h2>
    <button id="pay-button">Bayar Sekarang</button>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script type="text/javascript">
        document.getElementById('pay-button').addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Pembayaran sukses");
                    console.log(result);
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Pembayaran gagal");
                    console.log(result);
                }
            });
        });
    </script>
</body>
</html>
