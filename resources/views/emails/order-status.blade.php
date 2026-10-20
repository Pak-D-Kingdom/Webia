<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEBIA</title>
</head>
<body style="margin:0;padding:24px;background:#f4f4f5;font-family:Arial,Helvetica,sans-serif;color:#18181b;">
    <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:12px;padding:32px;">
        <h1 style="font-size:20px;margin:0 0 8px;">{{ $heading }}</h1>
        <p style="margin:0 0 16px;">{{ $intro }}</p>
        <p style="margin:0 0 24px;">Nomor pesanan: <strong>{{ $order->order_number }}</strong></p>
        <a href="{{ $url }}" style="display:inline-block;padding:10px 20px;background:#18181b;color:#ffffff;border-radius:8px;text-decoration:none;font-weight:bold;">Lihat pesanan</a>
    </div>
    <p style="max-width:560px;margin:16px auto 0;font-size:12px;color:#71717a;">Email otomatis dari WEBIA — kamu menerima email ini karena memiliki pesanan aktif.</p>
</body>
</html>
