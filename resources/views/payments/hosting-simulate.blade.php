<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulasi pembayaran hosting | WEBIA</title>
    <style>
        body { font-family: Inter, "Segoe UI", system-ui, sans-serif; display: grid; place-items: center; min-height: 100dvh; margin: 0; padding: 1rem; background: #fbf9ff; color: #29234f; }
        main { max-width: 24rem; padding: 2rem 1.75rem; background: #fff; border: 1px solid #e9e4f6; border-radius: 1rem; box-shadow: 0 18px 48px rgba(76, 55, 139, .1); }
        h1 { margin: 0 0 .35rem; font-size: 1.15rem; }
        p { margin: 0 0 1.25rem; color: #595679; }
        button { width: 100%; min-height: 48px; padding: .65rem 1rem; border: 0; border-radius: .6rem; color: #fff; background: #5a3f9f; font-weight: 800; cursor: pointer; }
        button:focus-visible { outline: 3px solid #5a3f9f; outline-offset: 3px; }
    </style>
</head>
<body>
    <main>
        <h1>Simulasi pembayaran hosting</h1>
        <p>{{ $payment->invoice->invoice_number }} · Rp{{ number_format($payment->invoice->amount, 0, ',', '.') }}. Halaman ini hanya muncul tanpa kredensial Midtrans.</p>
        <form method="POST" action="{{ route('payments.midtrans.hosting.simulate.pay', $payment) }}">
            @csrf
            <button type="submit">Selesaikan pembayaran (simulasi)</button>
        </form>
    </main>
</body>
</html>
