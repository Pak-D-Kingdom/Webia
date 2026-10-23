@extends('auth.layout')

@section('title', 'Panel Kontrol')

@section('content')
@php
    $xs = fn (int $i): float => round($i * 700 / 29, 1);
    $yOf = fn (float $v, float $max): float => round(195 - $v / $max * 165, 1);
    $revSeq = $chart->pluck('total');
    $maxRev = max($revSeq->max(), 1);
    $maxVol = max($chart->pluck('count')->max(), 1);
    $revPts = $chart->map(fn ($p, $i) => $xs($i).','.$yOf($p['total'], $maxRev))->implode(' ');
    $volPts = $chart->map(fn ($p, $i) => $xs($i).','.$yOf($p['count'], $maxVol))->implode(' ');
    $prevPts = $prevChart->map(fn ($v, $i) => $xs($i).','.$yOf($v, $maxRev))->implode(' ');
    $peakIdx = $revSeq->search($revSeq->max());
    $peak = $chart[$peakIdx];
    $peakLeft = round($xs($peakIdx) / 700 * 100, 1);
    $peakTop = round((220 - $yOf($peak['total'], $maxRev)) / 220 * 100, 1);
    $axisFirst = $chart->first()['date']->isoFormat('D MMM');
    $axisLast = $chart->last()['date']->isoFormat('D MMM (Hari ini)');
    $avgPerOrder = $paidCount30 > 0 ? intdiv($revenue30, $paidCount30) : 0;
    $conversion = $createdCount30 > 0 ? round($paidCount30 / $createdCount30 * 100, 1) : null;
@endphp
<div class="ops-glow" aria-hidden="true"><i></i><i></i></div>

<section class="ops-header">
    <div class="ops-header-copy">
        <div class="ops-header-badges">
            <span class="ops-pill"><span aria-hidden="true"></span> Real-time ops</span>
        </div>
        <h1 id="admin-title">Dashboard Operasional</h1>
        <p>Pantau antrean pesanan aktif, verifikasi transfer manual, dan progres pengerjaan template hari ini.</p>
    </div>
    <div class="ops-actionbar">
        <span class="ops-sync"><span class="material-symbols-outlined" aria-hidden="true">schedule</span>Sinkron: {{ now()->isoFormat('D MMM YYYY, HH:mm:ss') }} WIB</span>
        <button class="ops-refresh" type="button" onclick="location.reload()">
            <span class="material-symbols-outlined" aria-hidden="true">refresh</span>Refresh Data
        </button>
    </div>
</section>

<section class="ops-kpis" aria-label="Ringkasan operasional">
    <article class="ops-kpi ops-tone-teal">
        <div class="ops-kpi-top">
            <span class="ops-kpi-label">Pesanan Baru</span>
            <span class="ops-kpi-tile"><span class="material-symbols-outlined" aria-hidden="true">add_shopping_cart</span></span>
        </div>
        <p class="ops-kpi-number">{{ $counts['new_today'] }}<small>hari ini</small></p>
        <span class="ops-kpi-chip">{{ $counts['awaiting'] }} belum bayar</span>
    </article>

    <article class="ops-kpi ops-tone-amber">
        <div class="ops-kpi-top">
            <span class="ops-kpi-label">Menunggu Pembayaran</span>
            <span class="ops-kpi-tile"><span class="material-symbols-outlined" aria-hidden="true">hourglass_top</span></span>
        </div>
        <p class="ops-kpi-number">{{ $counts['awaiting'] }}<small>pesanan</small></p>
        <span class="ops-kpi-chip">Total: Rp {{ number_format($counts['awaitingTotal'], 0, ',', '.') }}</span>
    </article>

    <article class="ops-kpi ops-tone-indigo">
        <div class="ops-kpi-top">
            <span class="ops-kpi-label">Sedang Dikerjakan</span>
            <span class="ops-kpi-tile"><span class="material-symbols-outlined" aria-hidden="true">design_services</span></span>
        </div>
        <p class="ops-kpi-number">{{ $counts['in_progress'] }}<small>project</small></p>
        <span class="ops-kpi-chip">{{ $counts['verification'] }} antrean verifikasi</span>
    </article>

    <article class="ops-kpi ops-tone-teal">
        <div class="ops-kpi-top">
            <span class="ops-kpi-label">Pendapatan Bulan Ini</span>
            @if ($revenueDelta !== null)
                <span class="ops-trend {{ $revenueDelta >= 0 ? 'is-up' : 'is-down' }}">
                    <span class="material-symbols-outlined" aria-hidden="true">{{ $revenueDelta >= 0 ? 'north_east' : 'south_east' }}</span>{{ abs($revenueDelta) }}%
                </span>
            @endif
        </div>
        <p class="ops-kpi-number ops-price">Rp {{ number_format($revenueMonth, 0, ',', '.') }}</p>
        <svg class="ops-spark" viewBox="0 0 120 28" preserveAspectRatio="none" aria-hidden="true">
            <path d="M{{ $chart->map(fn ($p, $i) => round($i * 120 / 29, 1).','.(26 - round($p['total'] / $maxRev * 22, 1)))->implode(' L ') }} L 120,28 L 0,28 Z" fill="currentColor" opacity="0.14"></path>
            <path d="M{{ $chart->map(fn ($p, $i) => round($i * 120 / 29, 1).','.(26 - round($p['total'] / $maxRev * 22, 1)))->implode(' L ') }}" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
        </svg>
    </article>
</section>

<section class="ops-grid">
    <article class="ops-card chart-col">
        <header class="ops-chart-head">
            <div>
                <h2 class="ops-h2"><span class="material-symbols-outlined" aria-hidden="true">monitoring</span>Tren Pendapatan &amp; Volume Pesanan</h2>
                <p class="ops-caption">30 hari terakhir ({{ $axisFirst }} – {{ $chart->last()['date']->isoFormat('D MMM YYYY') }})</p>
            </div>
            <div class="ops-tabs" role="tablist">
                <button type="button" class="ops-tab is-active" data-series="revenue">Pendapatan (Rp)</button>
                <button type="button" class="ops-tab" data-series="volume">Volume Pesanan</button>
            </div>
        </header>

        <div class="ops-chart">
            <svg class="ops-svg is-active" data-svg="revenue" viewBox="0 0 700 220" preserveAspectRatio="none" aria-label="Grafik pendapatan harian; total Rp {{ number_format($revenue30, 0, ',', '.') }}; puncak {{ $peak['date']->isoFormat('D MMM') }} Rp {{ number_format($peak['total'], 0, ',', '.') }}">
                <defs>
                    <linearGradient id="opsArea" x1="0" x2="0" y1="0" y2="1">
                        <stop offset="0%" stop-color="#1a146b" stop-opacity="0.28"></stop>
                        <stop offset="50%" stop-color="#006a61" stop-opacity="0.12"></stop>
                        <stop offset="100%" stop-color="#86f2e4" stop-opacity="0"></stop>
                    </linearGradient>
                </defs>
                <line x1="0" x2="700" y1="30" y2="30" stroke="#eceef0" stroke-dasharray="4 4"></line>
                <line x1="0" x2="700" y1="85" y2="85" stroke="#eceef0" stroke-dasharray="4 4"></line>
                <line x1="0" x2="700" y1="140" y2="140" stroke="#eceef0" stroke-dasharray="4 4"></line>
                <line x1="0" x2="700" y1="195" y2="195" stroke="#eceef0"></line>
                <polyline points="{{ $prevPts }}" fill="none" stroke="#c8c5d3" stroke-dasharray="3 3" stroke-width="1.8"></polyline>
                <polygon points="0,195 {{ $revPts }} {{ $xs(29) }},195" fill="url(#opsArea)"></polygon>
                <polyline points="{{ $revPts }}" fill="none" stroke="#006a61" stroke-linecap="round" stroke-width="3"></polyline>
            </svg>
            <svg class="ops-svg" data-svg="volume" viewBox="0 0 700 220" preserveAspectRatio="none" aria-label="Grafik jumlah pesanan lunas harian">
                <line x1="0" x2="700" y1="30" y2="30" stroke="#eceef0" stroke-dasharray="4 4"></line>
                <line x1="0" x2="700" y1="85" y2="85" stroke="#eceef0" stroke-dasharray="4 4"></line>
                <line x1="0" x2="700" y1="140" y2="140" stroke="#eceef0" stroke-dasharray="4 4"></line>
                <line x1="0" x2="700" y1="195" y2="195" stroke="#eceef0"></line>
                <polyline points="{{ $volPts }}" fill="none" stroke="#006a61" stroke-linecap="round" stroke-width="3"></polyline>
            </svg>
            @if ($peak['total'] > 0)
                <div class="ops-peak" style="left: {{ $peakLeft }}%; top: {{ max(2, $peakTop - 18) }}%;">
                    <span>Puncak: {{ $peak['date']->isoFormat('D MMM') }}</span>
                    <strong>Rp {{ number_format($peak['total'], 0, ',', '.') }}</strong>
                    <small>{{ $peak['count'] }} pesanan lunas</small>
                </div>
            @endif
        </div>
        <p class="ops-axis">
            <span>{{ $axisFirst }}</span>
            <span class="ops-axis-peak {{ $peak['total'] > 0 ? '' : 'is-void' }}">{{ $peak['total'] > 0 ? $peak['date']->isoFormat('D MMM (Puncak)') : 'Belum ada transaksi' }}</span>
            <span>{{ $axisLast }}</span>
        </p>

        <footer class="ops-ministats">
            <div><small>Rata-rata per transaksi</small><strong>Rp {{ number_format($avgPerOrder, 0, ',', '.') }}</strong></div>
            <div><small>Konversi order → lunas (30 hari)</small><strong>{{ $conversion === null ? '—' : $conversion.'%' }}</strong><small>{{ $paidCount30 }} dari {{ $createdCount30 }}</small></div>
            <div><small>Hari dengan transaksi</small><strong>{{ $chart->where('total', '>', 0)->count() }} / 30</strong></div>
        </footer>
    </article>

    <article class="ops-card actions-col">
        <header class="ops-actions-head">
            <h2 class="ops-h2"><span class="material-symbols-outlined" aria-hidden="true">crisis_alert</span>Perlu Tindakan Segera</h2>
            <span class="ops-count-pill">{{ $counts['verification'] }} Antrean</span>
        </header>

        <div class="ops-queue">
            @forelse ($attention as $order)
                <article class="ops-action-item">
                    <div class="ops-action-top">
                        <div class="ops-action-id">
                            <span class="ops-method">TRANSFER</span>
                            <strong>{{ $order->order_number }}</strong>
                            <span>{{ $order->user?->name ?? 'Akun dihapus' }}</span>
                        </div>
                        <b>Rp {{ number_format($order->total_price, 0, ',', '.') }}</b>
                    </div>
                    <p>Bisnis: <span>{{ $order->business_data['business_name'] ?? ($order->user?->name ?? '—') }}</span> • {{ $order->package->name }}</p>
                    <div class="ops-action-foot">
                        @if ($order->payment_receipt_path)
                            <a href="{{ route('admin.orders.receipt', $order) }}"><span class="material-symbols-outlined" aria-hidden="true">receipt_long</span>Unduh Bukti</a>
                        @endif
                        <div class="ops-action-buttons">
                            <form method="POST" action="{{ route('admin.orders.verify', $order) }}">
                                @csrf
                                <input type="hidden" name="action" value="reject">
                                <input type="text" name="note" required maxlength="500" placeholder="Alasan penolakan" aria-label="Alasan penolakan {{ $order->order_number }}">
                                <button class="ops-btn-reject" type="submit">Tolak</button>
                            </form>
                            <form method="POST" action="{{ route('admin.orders.verify', $order) }}">
                                @csrf
                                <input type="hidden" name="action" value="approve">
                                <button class="ops-btn-verify" type="submit">Verifikasi</button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <p class="ops-empty">Tidak ada antrean verifikasi. Semua pembayaran tertangani.</p>
            @endforelse
        </div>

        <footer class="ops-queue-foot">
            <span><i aria-hidden="true"></i>{{ $counts['verification'] }} pembayaran menunggu keputusan</span>
            <a href="{{ route('admin.orders.index', ['status' => 'payment_uploaded']) }}">Buka Antrean Lengkap →</a>
        </footer>
    </article>
</section>

<section class="ops-card ops-table-card">
    <header class="ops-table-head">
        <div>
            <h2 class="ops-h2 ops-h2-primary">Pesanan Terkini</h2>
            <p class="ops-caption">Daftar transaksi dan update pipeline pengerjaan pesanan klien</p>
        </div>
        <div class="ops-table-tools">
            <label class="ops-search">
                <span class="material-symbols-outlined" aria-hidden="true">search</span>
                <input type="search" id="opsTableSearch" placeholder="Cari ID, konsumen, atau paket..." aria-label="Cari pesanan terkini">
            </label>
            <div class="ops-tabs ops-tabs-table" role="tablist">
                <button type="button" class="ops-tab is-active" data-filter="all">Semua</button>
                <button type="button" class="ops-tab" data-filter="baru">Baru</button>
                <button type="button" class="ops-tab" data-filter="menunggu">Menunggu Verifikasi</button>
                <button type="button" class="ops-tab" data-filter="dikerjakan">Dikerjakan</button>
                <button type="button" class="ops-tab" data-filter="selesai">Selesai</button>
            </div>
        </div>
    </header>

    <div class="ops-table-wrap">
        <table class="ops-table" id="opsOrdersTable">
            <caption class="sr-only">Lima transaksi pesanan terakhir</caption>
            <thead>
                <tr>
                    <th scope="col">ID Pesanan</th>
                    <th scope="col">Konsumen</th>
                    <th scope="col">Paket Lisensi</th>
                    <th scope="col" class="right">Total</th>
                    <th scope="col" class="center">Status</th>
                    <th scope="col">Tanggal &amp; Jam</th>
                    <th scope="col" class="right"><span class="sr-only">Aksi</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recent as $order)
                    @php
                        $statusKey = match ($order->status) {
                            'awaiting_payment' => 'baru',
                            'payment_uploaded' => 'menunggu',
                            'paid' => $order->delivery_status === 'delivered' ? 'selesai' : 'dikerjakan',
                            default => 'rejected',
                        };
                    @endphp
                    <tr class="ops-row" data-status="{{ $statusKey }}">
                        <th scope="row" class="ops-order-id">{{ $order->order_number }}</th>
                        <td>{{ $order->user?->name ?? 'Akun dihapus' }}</td>
                        <td>{{ $order->package->name }}</td>
                        <td class="right ops-money">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="center"><x-status-pill :status="$order->status" /></td>
                        <td class="ops-dim">{{ $order->created_at->format('d M Y, H:i') }}</td>
                        <td class="right"><a class="ops-detail" href="{{ route('admin.orders.show', $order) }}">Detail →</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="ops-table-empty" role="status" hidden>
            <span class="material-symbols-outlined" aria-hidden="true">receipt_long_off</span>
            <strong>Belum ada pesanan yang sesuai filter</strong>
            <p>Tidak ditemukan transaksi dengan kriteria tersebut. Ubah kata kunci atau reset filter.</p>
        </div>
    </div>

    <footer class="ops-table-foot">
        <span>Menampilkan <b data-ops-visible>{{ $recent->count() }}</b> dari <b>{{ $totalOrders }}</b> pesanan terdaftar</span>
        <a class="ops-detail" href="{{ route('admin.orders.index') }}">Semua pesanan →</a>
    </footer>
</section>
@endsection
