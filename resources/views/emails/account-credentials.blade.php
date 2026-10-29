<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEBIA</title>
</head>
<body style="margin:0;padding:24px;background:#f4f4f5;font-family:Arial,Helvetica,sans-serif;color:#18181b;">
    <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:12px;padding:32px;">
        <h1 style="font-size:20px;margin:0 0 8px;">Pesanan kamu sudah kami terima 🎉</h1>
        <p style="margin:0 0 16px;">@if ($plainPassword)Akun WEBIA kamu sudah dibuat otomatis.@else Pesanan baru ditambahkan ke akun WEBIA kamu.@endif</p>
        <p style="margin:0 0 24px;">Nomor pesanan: <strong>{{ $order->order_number }}</strong></p>
        @if ($plainPassword)
            <div style="background:#f4f4f5;border-radius:8px;padding:16px;margin:0 0 24px;">
                <p style="margin:0 0 8px;font-weight:bold;">Kredensial masuk portal WEBIA</p>
                <p style="margin:0;">Email: <strong>{{ $order->user?->email }}</strong></p>
                <p style="margin:0;">Kata sandi: <strong>{{ $plainPassword }}</strong></p>
            </div>
            <p style="margin:0 0 24px;font-size:13px;color:#71717a;">Simpan email ini. Kata sandi hanya dikirim sekali lewat email ini.</p>
        @endif
        <a href="{{ route('login') }}" style="display:inline-block;padding:10px 20px;background:#18181b;color:#ffffff;border-radius:8px;text-decoration:none;font-weight:bold;">Masuk ke portal</a>
        <p style="margin:16px 0 0;font-size:13px;color:#71717a;">Setelah masuk, lengkapi pembayaran di halaman detail pesanan.</p>
    </div>
    <p style="max-width:560px;margin:16px auto 0;font-size:12px;color:#71717a;">Email otomatis dari WEBIA — kamu menerima email ini karena memiliki pesanan aktif.</p>
</body>
</html>
