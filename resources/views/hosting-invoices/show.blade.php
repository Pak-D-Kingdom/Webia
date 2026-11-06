@extends('auth.layout')

@section('title', 'Detail Tagihan Hosting')

@section('content')
    <section class="dashboard-panel" aria-labelledby="hosting-invoice-title">
        <div class="customer-page-head">
            <a class="customer-recent-link" href="{{ route('hosting-invoices.index') }}">Kembali ke tagihan hosting</a>
            <h1 id="hosting-invoice-title">{{ $invoice->invoice_number }}</h1>
            <p>{{ $invoice->service->website_name }} · {{ $invoice->service->domain }}</p>
        </div>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        <div class="dashboard-empty customer-order-card">
            <div class="order-heading">
                <div><p class="account-label">Periode layanan</p><h2>{{ $invoice->period_start->translatedFormat('d F Y') }} - {{ $invoice->period_end->translatedFormat('d F Y') }}</h2></div>
                <x-status-pill :status="$invoice->status" />
            </div>
            <div class="customer-site-meta">
                <span>Nominal: <strong>Rp{{ number_format($invoice->amount, 0, ',', '.') }}</strong></span>
                <span>Jatuh tempo: <strong>{{ $invoice->due_at->translatedFormat('d F Y') }}</strong></span>
            </div>
            @if ($invoice->label)<p>{{ $invoice->label }}</p>@endif
            @if ($invoice->status === 'cancelled')<p>Alasan pembatalan: {{ $invoice->cancellation_reason }}</p>@endif

            @if (in_array($invoice->status, ['unpaid', 'overdue'], true) && $invoice->amount > 0)
                <form method="POST" action="{{ route('hosting-invoices.pay', $invoice) }}">
                    @csrf
                    <button class="account-submit" type="submit">{{ $invoice->payments->isEmpty() ? 'Bayar melalui Midtrans' : 'Bayar ulang melalui Midtrans' }}</button>
                </form>
            @endif
        </div>

        @if ($invoice->payments->isNotEmpty())
            <div class="dashboard-empty customer-recent-card">
                <h2>Riwayat percobaan pembayaran</h2>
                <div class="admin-list">
                    @foreach ($invoice->payments as $payment)
                        <div class="admin-list-item"><span>{{ $payment->midtrans_order_id }}</span><x-status-pill :status="$payment->status" /></div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
@endsection
