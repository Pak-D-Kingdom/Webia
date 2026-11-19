@extends('auth.layout')

@section('title', 'Detail Layanan Hosting')

@section('content')
    <div class="flex flex-col gap-space-md py-space-md">
        @if (session('status')) <p class="rounded-lg bg-primary-fixed p-3 text-primary" role="status">{{ session('status') }}</p> @endif
        <div>
            <a class="text-sm font-semibold text-primary hover:underline" href="{{ route('admin.hosting-services.index') }}">Kembali ke layanan hosting</a>
            <div class="mt-3 flex flex-wrap items-start justify-between gap-space-sm">
                <div><h1 class="font-headline-lg text-headline-lg font-bold text-on-surface">{{ $service->website_name }}</h1><p class="text-on-surface-variant">{{ $service->domain }} · {{ $service->user->name }}</p></div>
                <x-status-pill :status="$service->billing_status" />
            </div>
        </div>

        <dl class="grid gap-3 rounded-xl border border-outline-variant bg-surface-container-lowest p-margin-md sm:grid-cols-3">
            <div><dt class="text-sm text-on-surface-variant">Biaya bulanan</dt><dd class="font-semibold text-on-surface">Rp{{ number_format($service->monthly_price, 0, ',', '.') }}</dd></div>
            <div><dt class="text-sm text-on-surface-variant">Tanggal aktivasi</dt><dd class="font-semibold text-on-surface">{{ $service->activation_date->translatedFormat('d F Y') }}</dd></div>
            <div><dt class="text-sm text-on-surface-variant">Status operasional</dt><dd class="font-semibold text-on-surface">{{ str_replace('_', ' ', ucfirst($service->operational_status)) }}</dd></div>
        </dl>

        <div class="grid gap-4 lg:grid-cols-2">
            <form class="flex flex-col gap-3 rounded-xl border border-outline-variant bg-surface-container-lowest p-4" method="POST" action="{{ route('admin.hosting-services.price', $service) }}">@csrf @method('PATCH')<h2 class="font-semibold text-on-surface">Ubah harga siklus berikutnya</h2><input class="min-h-11 rounded-lg border border-outline-variant bg-surface px-3" name="monthly_price" type="number" min="1" value="{{ $service->monthly_price }}" required><button class="min-h-11 rounded-lg bg-primary px-4 font-semibold text-on-primary" type="submit">Simpan harga baru</button></form>
            <form class="flex flex-col gap-3 rounded-xl border border-outline-variant bg-surface-container-lowest p-4" method="POST" action="{{ route('admin.hosting-services.stop', $service) }}">@csrf @method('PATCH')<h2 class="font-semibold text-on-surface">Tetapkan tanggal berhenti</h2><input class="min-h-11 rounded-lg border border-outline-variant bg-surface px-3" name="stopped_at" type="date" min="{{ now()->toDateString() }}" value="{{ $service->stopped_at?->toDateString() }}" required><button class="min-h-11 rounded-lg border border-primary px-4 font-semibold text-primary" type="submit">Simpan tanggal berhenti</button></form>
        </div>

        <section aria-labelledby="invoice-title">
            <h2 class="mb-3 font-headline-sm font-bold text-on-surface" id="invoice-title">Riwayat tagihan</h2>
            @if ($service->invoices->isEmpty())
                <div class="rounded-xl border border-outline-variant bg-surface-container-lowest p-margin-md text-on-surface-variant">Tagihan gratis akan dibuat saat tanggal aktivasi.</div>
            @else
                <div class="overflow-x-auto rounded-xl border border-outline-variant bg-surface-container-lowest">
                    <table class="min-w-full text-left text-sm"><thead class="bg-surface-container"><tr><th class="p-3">Nomor</th><th class="p-3">Periode</th><th class="p-3">Nominal</th><th class="p-3">Status</th></tr></thead><tbody class="divide-y divide-outline-variant">
                        @foreach ($service->invoices as $invoice)
                            <tr><td class="p-3">{{ $invoice->invoice_number }}</td><td class="p-3">{{ $invoice->period_start->format('d M Y') }} - {{ $invoice->period_end->format('d M Y') }}</td><td class="p-3">Rp{{ number_format($invoice->amount, 0, ',', '.') }}</td><td class="p-3"><x-status-pill :status="$invoice->status" /> @if (in_array($invoice->status, ['unpaid', 'overdue'], true))<form class="mt-2 flex gap-2" method="POST" action="{{ route('admin.hosting-invoices.cancel', $invoice) }}">@csrf<input class="min-h-11 min-w-0 rounded-lg border border-outline-variant px-2" name="cancellation_reason" placeholder="Alasan pembatalan" required><button class="min-h-11 rounded-lg border border-error px-3 text-error" type="submit">Batalkan</button></form>@elseif ($invoice->status === 'cancelled' && $invoice->replacement === null)<form class="mt-2 flex gap-2" method="POST" action="{{ route('admin.hosting-invoices.replace', $invoice) }}">@csrf<input class="min-h-11 min-w-0 rounded-lg border border-outline-variant px-2" name="amount" type="number" min="1" value="{{ $service->monthly_price }}" required><button class="min-h-11 rounded-lg border border-primary px-3 text-primary" type="submit">Terbitkan pengganti</button></form>@endif</td></tr>
                        @endforeach
                    </tbody></table>
                </div>
            @endif
        </section>
    </div>
@endsection
