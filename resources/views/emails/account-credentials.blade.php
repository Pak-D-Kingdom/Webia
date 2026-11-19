<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEBIA</title>
</head>
<body style="margin:0;padding:24px;background:#f4f4f5;font-family:Arial,Helvetica,sans-serif;color:#18181b;">
    <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:12px;padding:32px;">
        <h1 style="font-size:20px;margin:0 0 8px;">Pembayaran kamu sudah dikonfirmasi</h1>
        <p style="margin:0 0 16px;">{{ $passwordSetupUrl ? 'Akun WEBIA kamu sudah dibuat. Atur password untuk mulai menggunakan portal.' : 'Pesanan baru sudah ditambahkan ke akun WEBIA kamu.' }}</p>
        <p style="margin:0 0 24px;">Nomor pesanan: <strong>{{ $order->order_number }}</strong></p>
        <div style="background:#f4f4f5;border-radius:8px;padding:16px;margin:0 0 24px;">
            <p style="margin:0 0 12px;font-weight:bold;">Informasi masuk portal WEBIA</p>
            <p style="margin:0;">Email masuk: <strong>{{ $order->user?->email ?? $order->guest_email }}</strong></p>
        </div>
        @if ($passwordSetupUrl)
            <a href="{{ $passwordSetupUrl }}" style="display:inline-block;padding:10px 20px;background:#18181b;color:#ffffff;border-radius:8px;text-decoration:none;font-weight:bold;">Atur password</a>
            <p style="margin:16px 0 0;font-size:13px;color:#71717a;">Tautan berlaku selama 60 menit. Jika kedaluwarsa, gunakan halaman lupa kata sandi.</p>
        @else
            <a href="{{ route('login') }}" style="display:inline-block;padding:10px 20px;background:#18181b;color:#ffffff;border-radius:8px;text-decoration:none;font-weight:bold;">Masuk ke portal</a>
        @endif
        <p style="margin:16px 0 0;font-size:13px;color:#71717a;">Setelah masuk, lengkapi data bisnis di halaman detail pesanan.</p>
    </div>
    <p style="max-width:560px;margin:16px auto 0;font-size:12px;color:#71717a;">Email otomatis dari WEBIA. Kamu menerima email ini karena memiliki pesanan aktif.</p>
</body>
</html>
