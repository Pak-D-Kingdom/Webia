<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulasi pembayaran Midtrans — WEBIA</title>
    <style>
        body { font-family: system-ui, sans-serif; display: grid; place-items: center; min-height: 100vh; margin: 0; background: #f3f5f9; }
        main { max-width: 22rem; padding: 2rem; background: #fff; border: 1px solid #dfe3ea; border-radius: 1rem; }
        h1 { font-size: 1.1rem; margin: 0 0 0.25rem; }
        p { color: #6b7280; margin: 0 0 1.25rem; }
        button { width: 100%; padding: 0.6rem 1rem; color: #fff; background: #0f4c81; border: 0; border-radius: 0.6rem; font-weight: 700; }
    </style>
</head>
<body>
    <main>
        <h1>Simulasi pembayaran Midtrans</h1>
        <p>Sesi {{ $payment->midtrans_order_id }} untuk order {{ $payment->order->order_number }}. Halaman ini hanya muncul tanpa kredensial Midtrans.</p>
        <form method="POST" action="{{ route('payments.midtrans.simulate.pay', $payment) }}">
            @csrf
            <button type="submit">Selesaikan pembayaran (simulasi)</button>
        </form>
    </main>
</body>
</html>
