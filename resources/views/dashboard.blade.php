@extends('auth.layout')

@section('title', 'Dashboard')

@section('content')
    @php
        $statusTotal = array_sum($analytics['status_counts']);
        $waitingAngle = $statusTotal ? ($analytics['status_counts']['waiting'] / $statusTotal) * 360 : 0;
        $progressAngle = $statusTotal ? (($analytics['status_counts']['waiting'] + $analytics['status_counts']['in_progress']) / $statusTotal) * 360 : 0;
        $orderPeak = max(1, ...$analytics['order_series']);
        $invoicePeak = max(1, ...$analytics['invoice_series']);
        $lineStep = count($analytics['labels']) > 1 ? 84 / (count($analytics['labels']) - 1) : 0;
        $linePoints = collect($analytics['order_series'])->map(function (int $value, int $index) use ($orderPeak, $lineStep): string {
            $x = 8 + ($index * $lineStep);
            $y = 82 - (($value / $orderPeak) * 64);

            return $x.','.$y;
        })->implode(' ');
    @endphp

    <section class="dashboard-panel customer-dashboard" aria-labelledby="dashboard-title">
        <div class="customer-page-head">
            <h1 id="dashboard-title">Halo, {{ auth()->user()->name }}</h1>
            <p>Lihat status pesanan dan tindakan yang perlu kamu selesaikan.</p>
        </div>

        @if (session('status'))
            <p role="status">{{ session('status') }}</p>
        @endif

        @if (! empty($aiQuotaAlert))
            <aside class="customer-alert customer-alert--{{ $aiQuotaAlert['type'] }}" aria-labelledby="quota-alert-title">
                <span aria-hidden="true" class="material-symbols-outlined">{{ $aiQuotaAlert['type'] === 'exhausted' ? 'error' : 'warning' }}</span>
                <div>
                    <h2 id="quota-alert-title">{{ $aiQuotaAlert['title'] }}</h2>
                    <p>{{ $aiQuotaAlert['message'] }}</p>
                </div>
                <a href="{{ route('customer.ai') }}">Kelola kuota AI</a>
            </aside>
        @endif

        <section class="customer-analytics" aria-labelledby="analytics-title">
            <header class="customer-section-head">
                <h2 id="analytics-title">Ringkasan aktivitas</h2>
                <button type="button" class="customer-period" data-modal-open="#dash-period-modal">
                    <span aria-hidden="true" class="material-symbols-outlined">calendar_month</span>{{ $analytics['period'] }}
                </button>
            </header>
            <div class="customer-analytics-grid">
                <article class="customer-chart-card customer-chart-card--wide">
                    <h3>Perkembangan pesanan</h3>
                    <p>Pesanan dibuat per bulan</p>
                    @if (array_sum($analytics['order_series']))
                        <svg class="customer-line-chart" viewBox="0 0 100 90" role="img" aria-label="Perkembangan pesanan: {{ collect($analytics['labels'])->zip($analytics['order_series'])->map(fn ($item) => $item[0].' '.$item[1])->implode(', ') }}">
                            <line x1="8" y1="18" x2="100" y2="18" />
                            <line x1="8" y1="50" x2="100" y2="50" />
                            <line x1="8" y1="82" x2="100" y2="82" />
                            <polyline points="{{ $linePoints }}" />
                            @foreach ($analytics['order_series'] as $index => $value)
                                @php
                                    $x = 8 + ($index * $lineStep);
                                    $y = 82 - (($value / $orderPeak) * 64);
                                @endphp
                                <circle cx="{{ $x }}" cy="{{ $y }}" r="1.5"><title>{{ $analytics['labels'][$index] }}: {{ $value }} pesanan</title></circle>
                            @endforeach
                        </svg>
                    @else
                        <div class="customer-chart-empty">Belum ada pesanan dalam periode ini.</div>
                    @endif
                    <div class="customer-chart-labels">
                        @foreach ($analytics['labels'] as $index => $label)
                            <span>{{ $label }} · {{ $analytics['order_series'][$index] }}</span>
                        @endforeach
                    </div>
                </article>

                <article class="customer-chart-card">
                    <h3>Komposisi status</h3>
                    @if ($statusTotal)
                        <div class="customer-donut" style="--waiting-angle: {{ $waitingAngle }}deg; --progress-angle: {{ $progressAngle }}deg" role="img" aria-label="Total {{ $statusTotal }} pesanan, menunggu {{ $analytics['status_counts']['waiting'] }}, dikerjakan {{ $analytics['status_counts']['in_progress'] }}, selesai {{ $analytics['status_counts']['completed'] }}">
                            <strong>{{ $statusTotal }}</strong>
                        </div>
                        <ul class="customer-chart-legend">
                            <li class="is-waiting">Menunggu · {{ $analytics['status_counts']['waiting'] }}</li>
                            <li class="is-progress">Dikerjakan · {{ $analytics['status_counts']['in_progress'] }}</li>
                            <li class="is-complete">Selesai · {{ $analytics['status_counts']['completed'] }}</li>
                        </ul>
                    @else
                        <div class="customer-chart-empty">Belum ada status pesanan.</div>
                    @endif
                </article>

                <article class="customer-chart-card">
                    <h3>Tagihan hosting</h3>
                    <p>Nilai invoice per bulan</p>
                    @if (array_sum($analytics['invoice_series']))
                        <div class="customer-bar-chart" role="img" aria-label="Tagihan hosting: {{ collect($analytics['labels'])->zip($analytics['invoice_series'])->map(fn ($item) => $item[0].' Rp '.number_format($item[1], 0, ',', '.'))->implode(', ') }}">
                            @foreach ($analytics['invoice_series'] as $index => $amount)
                                <span style="height: {{ max(3, ($amount / $invoicePeak) * 100) }}%"><i>{{ 'Rp '.number_format($amount, 0, ',', '.') }}</i></span>
                            @endforeach
                        </div>
                    @else
                        <div class="customer-chart-empty">Belum ada tagihan dalam periode ini.</div>
                    @endif
                    <div class="customer-chart-labels">
                        @foreach ($analytics['labels'] as $index => $label)
                            <span>{{ $label }} {{ number_format($analytics['invoice_series'][$index] / 1000, 0, ',', '.') }}k</span>
                        @endforeach
                    </div>
                </article>
            </div>
        </section>

        @if ($activeOrder)
            <article class="customer-active-card">
                <header>
                    <div>
                        <p class="account-label">Pesanan aktif</p>
                        <h2>{{ $activeOrder->package->name }}</h2>
                        <p>Nomor: {{ $activeOrder->order_number }}</p>
                    </div>
                    <a href="{{ route('orders.show', $activeOrder) }}">Lihat detail pesanan <span aria-hidden="true" class="material-symbols-outlined">arrow_forward</span></a>
                </header>
                <x-order-timeline :order="$activeOrder" />
            </article>

            @php
                $nextStep = match (true) {
                    in_array($activeOrder->status, ['awaiting_payment', 'rejected']) => [
                        'status' => 'Menunggu Pembayaran',
                        'icon' => 'schedule',
                        'heading' => 'Upload bukti pembayaran untuk pesanan '.$activeOrder->order_number,
                        'copy' => 'Tim WEBIA menunggu bukti transfer untuk melanjutkan pengerjaan website kamu.',
                        'action' => 'Upload bukti pembayaran',
                    ],
                    $activeOrder->status === 'payment_uploaded' => [
                        'status' => 'Menunggu Verifikasi',
                        'icon' => 'pending_actions',
                        'heading' => 'Bukti pembayaran sedang diperiksa',
                        'copy' => 'Bukti pembayaranmu sudah kami terima dan sedang diperiksa admin.',
                        'action' => 'Buka pesanan',
                    ],
                    $activeOrder->delivery_status === 'in_progress' => [
                        'status' => 'Sedang Dikerjakan',
                        'icon' => 'pending',
                        'heading' => 'Website sedang dikerjakan',
                        'copy' => 'Tim WEBIA sedang mengerjakan website. Pantau progres di halaman detail.',
                        'action' => 'Pantau progres',
                    ],
                    ! $activeOrder->business_data => [
                        'status' => 'Data Bisnis',
                        'icon' => 'assignment',
                        'heading' => 'Lengkapi data bisnis',
                        'copy' => 'Isi data bisnis agar tim WEBIA bisa segera mulai mengerjakan website.',
                        'action' => 'Isi data bisnis',
                    ],
                    default => [
                        'status' => 'Siap Dikerjakan',
                        'icon' => 'task_alt',
                        'heading' => 'Data bisnis siap diproses',
                        'copy' => 'Data bisnis sudah lengkap dan siap diproses tim WEBIA.',
                        'action' => 'Buka pesanan',
                    ],
                };
            @endphp
            <article class="customer-action-card">
                <x-status-pill :status="$activeOrder->status" />
                <h2>{{ $nextStep['heading'] }}</h2>
                <p>{{ $nextStep['copy'] }}</p>
                <div>
                    <a href="{{ route('orders.show', $activeOrder) }}">{{ $nextStep['action'] }}</a>
                    <small>Tindakan ini dibutuhkan untuk melanjutkan pengerjaan.</small>
                </div>
            </article>
        @endif

        <div class="customer-dashboard-columns">
            @if ($orders->isNotEmpty())
                <section class="customer-dashboard-card customer-orders-latest" aria-labelledby="latest-orders-title">
                    <header class="customer-section-head">
                        <h2 id="latest-orders-title">Pesanan terbaru</h2>
                        <a href="{{ route('orders.index') }}">Lihat semua pesanan <span aria-hidden="true" class="material-symbols-outlined">chevron_right</span></a>
                    </header>
                    <div>
                        @foreach ($orders as $order)
                            <article>
                                <div>
                                    <h3>{{ $order->package->name }}</h3>
                                    <p>Nomor: {{ $order->order_number }}</p>
                                </div>
                                <x-status-pill :status="$order->delivery_status === 'delivered' ? 'delivered' : $order->status" />
                                <button type="button" class="customer-detail-btn" data-modal-open="#dash-order-{{ $order->id }}">Detail</button>
                            </article>
                        @endforeach
                    </div>
                </section>
            @else
                <section class="customer-dashboard-card customer-empty-state">
                    <span aria-hidden="true" class="material-symbols-outlined">shopping_bag</span>
                    <h2>Belum ada pesanan</h2>
                    <p>Pilih template yang cocok untuk memulai website pertamamu.</p>
                    <a href="{{ route('collections') }}">Pilih template</a>
                </section>
            @endif

            @if ($deliveredSite)
                <article class="customer-dashboard-card customer-site-complete">
                    <p class="customer-done-badge"><span aria-hidden="true" class="material-symbols-outlined">check_circle</span> Sudah dipublikasi</p>
                    <h2>Website selesai</h2>
                    @if ($deliveredSite->business_data['business_name'] ?? null)
                        <p class="customer-site-name">{{ $deliveredSite->business_data['business_name'] }}</p>
                    @endif
                    <div class="customer-site-meta">
                        <span>Template: <strong>{{ $deliveredSite->template?->name ?? $deliveredSite->template_snapshot['name'] ?? '-' }}</strong></span>
                        <span>URL: <strong>{{ route('sites.show', ['order' => $deliveredSite->site_slug]) }}</strong></span>
                    </div>
                    <div class="customer-site-actions">
                        <button type="button" class="customer-site-open" data-modal-open="#dash-site-modal">Buka website <span aria-hidden="true" class="material-symbols-outlined">open_in_new</span></button>
                        <a href="{{ route('customer.ai') }}">Pantau AI &amp; Kuota <span aria-hidden="true" class="material-symbols-outlined">smart_toy</span></a>
                    </div>
                </article>
            @endif
        </div>

        @if ($hostingInvoices->isNotEmpty())
            <section class="customer-dashboard-card customer-invoices" aria-labelledby="invoices-title">
                <header class="customer-section-head">
                    <div>
                        <p class="account-label">Perlu dibayar</p>
                        <h2 id="invoices-title">Tagihan hosting</h2>
                    </div>
                    <a href="{{ route('hosting-invoices.index') }}">Lihat semua tagihan <span aria-hidden="true" class="material-symbols-outlined">chevron_right</span></a>
                </header>
                @foreach ($hostingInvoices as $invoice)
                    <article>
                        <div>
                            <strong>{{ $invoice->service->website_name }}</strong>
                            <span>{{ $invoice->invoice_number }} · Jatuh tempo {{ $invoice->due_at->translatedFormat('d M Y') }}</span>
                        </div>
                        <b>{{ 'Rp '.number_format($invoice->amount, 0, ',', '.') }}</b>
                        <x-status-pill :status="$invoice->status" />
                        <button type="button" class="customer-detail-btn" data-modal-open="#dash-invoice-{{ $invoice->id }}">Detail</button>
                    </article>
                @endforeach
            </section>
        @endif

        {{-- Modal pilih periode analitik --}}
        <x-customer-modal id="dash-period-modal" title="Pilih periode analitik" subtitle="Atur rentang data yang tampil pada chart." icon="tune">
            <form method="GET" action="{{ route('dashboard') }}">
                <div class="customer-modal-rows">
                    <div class="customer-modal-row"><span>Periode</span>
                        <span class="customer-period-options">
                            @foreach ([3, 6, 12] as $option)
                                <label><input type="radio" name="period" value="{{ $option }}" @checked($monthsCount === $option)> {{ $option }} bulan</label>
                            @endforeach
                        </span>
                    </div>
                    <div class="customer-modal-row"><span>Data</span><span>{{ $statusTotal }} pesanan</span></div>
                </div>
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Batal</button>
                    <button class="customer-btn customer-btn--primary" type="submit">Terapkan periode</button>
                </div>
            </form>
        </x-customer-modal>

        @foreach ($orders as $order)
            <x-customer-modal id="dash-order-{{ $order->id }}" title="Detail pesanan aktif" :subtitle="$order->order_number.' · '.($order->package->name ?? '-')" icon="info">
                <div class="customer-modal-rows">
                    <div class="customer-modal-row"><span>Nomor pesanan</span><span>{{ $order->order_number }}</span></div>
                    <div class="customer-modal-row"><span>Status</span><x-status-pill :status="$order->delivery_status === 'delivered' ? 'delivered' : $order->status" /></div>
                    <div class="customer-modal-row"><span>Total</span><span>Rp{{ number_format($order->total_price, 0, ',', '.') }}</span></div>
                </div>
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Tutup</button>
                    <a class="customer-btn customer-btn--primary" href="{{ route('orders.show', $order) }}">Buka halaman detail</a>
                </div>
            </x-customer-modal>
        @endforeach

        @foreach ($hostingInvoices as $invoice)
            <x-customer-modal id="dash-invoice-{{ $invoice->id }}" title="Detail tagihan hosting" :subtitle="$invoice->invoice_number.' · jatuh tempo '.$invoice->due_at->translatedFormat('d M Y')" icon="info">
                <div class="customer-modal-rows">
                    <div class="customer-modal-row"><span>Website</span><span>{{ $invoice->service->website_name }}</span></div>
                    <div class="customer-modal-row"><span>Periode</span><span>{{ $invoice->period_start->translatedFormat('M Y') }}–{{ $invoice->period_end->translatedFormat('M Y') }}</span></div>
                    <div class="customer-modal-row"><span>Total</span><span>Rp{{ number_format($invoice->amount, 0, ',', '.') }}</span></div>
                </div>
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Tutup</button>
                    <a class="customer-btn customer-btn--primary" href="{{ route('hosting-invoices.show', $invoice) }}">Bayar tagihan</a>
                </div>
            </x-customer-modal>
        @endforeach

        @if ($deliveredSite)
            <x-customer-modal id="dash-site-modal" tone="success" title="Website siap digunakan" :subtitle="($deliveredSite->business_data['business_name'] ?? 'Website Anda').' sudah dipublikasikan.'" icon="check_circle">
                <div class="customer-modal-rows">
                    <div class="customer-modal-row"><span>URL</span><span>{{ route('sites.show', ['order' => $deliveredSite->site_slug]) }}</span></div>
                    <div class="customer-modal-row"><span>Template</span><span>{{ $deliveredSite->template?->name ?? $deliveredSite->template_snapshot['name'] ?? '-' }}</span></div>
                    <div class="customer-modal-row"><span>Status</span><span>Sudah dipublikasi</span></div>
                </div>
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Tutup</button>
                    <a class="customer-btn customer-btn--primary" href="{{ route('sites.show', ['order' => $deliveredSite->site_slug]) }}" rel="noopener" target="_blank">Buka website</a>
                </div>
            </x-customer-modal>
        @endif
    </section>
@endsection
