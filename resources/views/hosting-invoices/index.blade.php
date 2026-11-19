@extends('auth.layout')

@section('title', 'Tagihan Hosting')

@section('content')
    <section class="dashboard-panel" aria-labelledby="hosting-invoices-title">
        <div class="customer-page-head">
            <h1 id="hosting-invoices-title">Tagihan Hosting</h1>
            <p>Lihat tagihan bulanan untuk setiap website milikmu.</p>
        </div>

        @if ($invoices->isEmpty())
            <div class="dashboard-empty">
                <h2>Belum ada tagihan hosting</h2>
                <p>Tagihan akan tampil setelah layanan hosting diaktifkan oleh admin.</p>
            </div>
        @else
            <div class="admin-list customer-recent-list">
                @foreach ($invoices as $invoice)
                    <article class="admin-list-item">
                        <div>
                            <p class="account-label">{{ $invoice->invoice_number }}</p>
                            <h2>{{ $invoice->service->website_name }}</h2>
                            <p>{{ $invoice->service->domain }}</p>
                            <p>{{ $invoice->period_start->translatedFormat('d M Y') }} - {{ $invoice->period_end->translatedFormat('d M Y') }}</p>
                        </div>
                        <div class="list-item-meta">
                            <strong>Rp{{ number_format($invoice->amount, 0, ',', '.') }}</strong>
                            <x-status-pill :status="$invoice->status" />
                            <button type="button" class="customer-detail-btn" data-modal-open="#hst-detail-{{ $invoice->id }}">Detail</button>
                        </div>
                    </article>
                @endforeach
            </div>
            {{ $invoices->links() }}
        @endif

        @foreach ($invoices as $invoice)
            <x-customer-modal id="hst-detail-{{ $invoice->id }}" title="Detail invoice hosting" :subtitle="$invoice->invoice_number" icon="info">
                <div class="customer-modal-rows">
                    <div class="customer-modal-row"><span>Website</span><span>{{ $invoice->service->website_name }}</span></div>
                    <div class="customer-modal-row"><span>Jatuh tempo</span><span>{{ $invoice->due_at->translatedFormat('d M Y') }}</span></div>
                    <div class="customer-modal-row"><span>Total</span><span>Rp{{ number_format($invoice->amount, 0, ',', '.') }}</span></div>
                </div>
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <a class="customer-btn" href="{{ route('hosting-invoices.show', $invoice) }}">Detail invoice</a>
                    @if (in_array($invoice->status, ['unpaid', 'overdue'], true) && $invoice->amount > 0)
                        <button class="customer-btn customer-btn--primary" type="button" data-modal-open="#hst-pay-{{ $invoice->id }}">Bayar invoice</button>
                    @endif
                </div>
            </x-customer-modal>

            @if (in_array($invoice->status, ['unpaid', 'overdue'], true) && $invoice->amount > 0)
                <x-customer-modal id="hst-pay-{{ $invoice->id }}" title="Konfirmasi pembayaran" subtitle="Pembayaran diproses melalui metode yang dipilih." icon="help">
                    <form method="POST" action="{{ route('hosting-invoices.pay', $invoice) }}">
                        @csrf
                        <div class="customer-modal-rows">
                            <div class="customer-modal-row"><span>Invoice</span><span>{{ $invoice->invoice_number }}</span></div>
                            <div class="customer-modal-row"><span>Metode</span><span>Midtrans</span></div>
                            <div class="customer-modal-row"><span>Total</span><span>Rp{{ number_format($invoice->amount, 0, ',', '.') }}</span></div>
                        </div>
                        <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                            <button class="customer-btn" type="button" data-modal-close>Kembali</button>
                            <button class="customer-btn customer-btn--primary" type="submit">Bayar sekarang</button>
                        </div>
                    </form>
                </x-customer-modal>
            @endif
        @endforeach
    </section>
@endsection
