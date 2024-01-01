<!DOCTYPE html>
<html>

<head>
    <title>Daftar Voucher</title>
</head>

<body>
    <h1>Daftar Voucher</h1>

    @foreach($vouchers as $voucher)
    <p><a href="{{ route('vouchers.show', $voucher) }}">{{ $voucher->code }}</a></p>
    @endforeach
</body>

</html>