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
                            <a class="customer-detail-btn" href="{{ route('hosting-invoices.show', $invoice) }}">Detail</a>
                        </div>
                    </article>
                @endforeach
            </div>
            {{ $invoices->links() }}
        @endif
    </section>
@endsection
