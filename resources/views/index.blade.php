<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
</head>

<body>
    <h1>Form Pembelian</h1>
    <p>Note: Jika total belanja lebih dari 2000000 maka akan mendapat voucher sebesar 10000</p>

    <form action="{{ route('purchases.store') }}" method="post">
        @csrf
        <label for="total_amount">Total Belanja:</label>
        <input type="text" id="total_amount" name="total_amount" required>
        <button type="submit">Submit</button>
    </form>

    <form action="{{ route('vouchers.search') }}" method="post">
        @csrf
        <label for="voucher_code">Cari Voucher:</label>
        <input type="text" id="voucher_code" name="voucher_code" required>
        <button type="submit">Cari Voucher</button>
    </form>

    @isset($purchase)
    <div class="card">
        <h2>Faktur Penjualan</h2>
        <p>Total Belanja: {{ $purchase->total_amount }}</p>

        @isset($purchase->voucher)
        <h3>Informasi Voucher</h3>
        <p>Kode Voucher: {{ $purchase->voucher->code }}</p>
        <p>Status Penggunaan: {{ $purchase->voucher->used ? 'Sudah digunakan' : 'Belum digunakan' }}</p>
        <p>Nilai Voucher: {{ $purchase->voucher->nilai }}</p>
        <p>Tanggal Kedaluwarsa: {{ $purchase->voucher->expired_at }}</p>
        <a href="{{ route('vouchers.show', $purchase->voucher) }}">Lihat Voucher</a>
        @endisset
        <a href="{{ route('index') }}" class="btn btn-secondary">Kembali ke Pembelian</a>
    </div>
    @endisset
</body>

</html>