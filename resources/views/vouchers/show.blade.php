<!DOCTYPE html>
<html>

<head>
    <title>Detail Voucher</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />

</head>

<body>
    <h1>Detail Voucher</h1>

    <p>Kode Voucher: {{ $voucher->code }}</p>
    <p>Nilai Voucher: {{ $voucher->nilai }}</p>
    <p>Status Penggunaan: {{ $voucher->used ? 'Sudah digunakan' : 'Belum digunakan' }}</p>
    <p>Tanggal Kedaluwarsa: {{ $voucher->expired_at }}</p>

    @if(!$voucher->used && $voucher->expired_at >= now())
    <form action="{{ route('vouchers.useVoucher', $voucher) }}" method="post">
        @csrf
        <button type="submit">Gunakan Voucher</button>
    </form>
    @endif
    <a href="{{ route('index') }}" class="btn btn-secondary">Kembali ke Pembelian</a>

</body>

</html>