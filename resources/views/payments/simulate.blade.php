<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulasi pembayaran Midtrans | WEBIA</title>
    <style>
        :root {
            --ink: #29234f;
            --muted: #595679;
            --action: #5a3f9f;
            --action-hover: #432b80;
        }

        body {
            font-family: Inter, "Instrument Sans", "Segoe UI", system-ui, Arial, sans-serif;
            display: grid;
            place-items: center;
            min-height: 100dvh;
            margin: 0;
            padding: 1rem;
            background: #fbf9ff;
            color: var(--ink);
        }

        main {
            max-width: 24rem;
            padding: 2rem 1.75rem;
            background: #ffffff;
            border: 1px solid #e9e4f6;
            border-radius: 1rem;
            box-shadow: 0 18px 48px rgba(76, 55, 139, 0.10);
        }

        h1 {
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin: 0 0 0.35rem;
        }

        p {
            color: var(--muted);
            margin: 0 0 1.25rem;
            font-size: 0.95rem;
        }

        button {
            width: 100%;
            min-height: 48px;
            padding: 0.65rem 1rem;
            color: #ffffff;
            background: var(--action);
            border: 0;
            border-radius: 0.6rem;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 10px 24px rgba(90, 63, 159, 0.25);
        }

        button:hover {
            background: var(--action-hover);
        }

        button:focus-visible {
            outline: 3px solid var(--action);
            outline-offset: 3px;
        }
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
