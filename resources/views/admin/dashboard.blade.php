@extends('auth.layout')

@section('title', 'Dashboard')

@section('content')
@php
    // ===== Data turunan riil =====
    $newTodayDelta = $counts['new_today'] > 0 && $newYesterday > 0
        ? round(($counts['new_today'] - $newYesterday) / $newYesterday * 100, 1)
        : null;
    $conversion = $createdCount30 > 0 ? round($paidCount30 / $createdCount30 * 100) : 0;
    $backlogShare = $totalOrders > 0 ? round($counts['awaiting'] / $totalOrders * 100) : 0;
    $progressShare = $totalOrders > 0 ? round($counts['in_progress'] / $totalOrders * 100) : 0;
    $avgDaily = intdiv($revenue30, 30);

    // ===== SVG generator (700x220) =====
    $xs = fn (int $i): float => $i * 700 / 29;
    $yOf = fn (float $v, float $max): float => 195 - $v / $max * 165;
    $revSeq = $chart->pluck('total');
    $maxRev = max($revSeq->max(), 1);
    $maxVol = max($chart->pluck('count')->max(), 1);
    $revPts = $chart->map(fn ($p, $i) => ['x' => $xs($i), 'y' => $yOf($p['total'], $maxRev)]);
    $volPts = $chart->map(fn ($p, $i) => ['x' => $xs($i), 'y' => $yOf($p['count'], $maxVol)]);
    $prevPts = $prevChart->map(fn ($v, $i) => ['x' => $xs($i), 'y' => $yOf($v, $maxRev)]);

    $smoothPath = function (iterable $points): string {
        $points = collect($points)->map(fn ($p) => ['x' => round($p['x'], 1), 'y' => round($p['y'], 1)]);
        $first = $points->first();
        $d = 'M '.$first['x'].' '.$first['y'];
        $prev = $first;
        for ($i = 1; $i < $points->count(); $i++) {
            $p = $points[$i];
            $d .= ' Q '.$prev['x'].' '.$prev['y'].' '.round(($prev['x'] + $p['x']) / 2, 1).' '.round(($prev['y'] + $p['y']) / 2, 1);
            $prev = $p;
        }

        return $d.' L '.$prev['x'].' '.$prev['y'];
    };

    $revLine = $smoothPath($revPts);
    $revArea = $revLine.' L 700,195 L 0,195 Z';
    $volLine = $smoothPath($volPts);
    $volArea = $volLine.' L 700,195 L 0,195 Z';
    $prevLine = $smoothPath($prevPts);

    $peakIdx = (int) $revSeq->search($revSeq->max());
    $peak = $chart[$peakIdx];
    $last = $chart->last();
    $peakLeftPct = round($xs($peakIdx) / 700 * 100, 1);

    $sparkPts = $chart->map(fn ($p, $i) => ['x' => $i * 100 / 29, 'y' => 24 - $p['total'] / $maxRev * 22]);
    $sparkLine = $smoothPath($sparkPts);

    $axisIdx = [0, 6, 12, 18, $peakIdx, 29];
@endphp
<!-- Glow -->
<div class="relative mb-space-lg w-full overflow-hidden pointer-events-none">
    <div class="absolute -left-20 -top-24 h-96 w-96 rounded-full bg-primary-container/10 blur-3xl"></div>
    <div class="absolute -top-28 right-12 h-80 w-80 rounded-full bg-secondary-container/20 blur-3xl"></div>
</div>

<!-- Header -->
<section class="mb-space-xl flex flex-col justify-between gap-space-md lg:flex-row lg:items-start">
    <div class="flex max-w-3xl flex-col">
        <h1 class="font-headline-lg text-headline-lg text-primary font-extrabold tracking-tight" id="admin-title">Dashboard Operasional</h1>
        <p class="mt-0.5 font-body-md text-body-md text-on-surface-variant">Pantau antrean pesanan aktif, verifikasi transfer manual, dan progres pengerjaan template hari ini.</p>
    </div>
    <!-- Action Bar -->
    <div class="flex flex-col gap-1.5 rounded-xl border border-primary/20 bg-surface-container-lowest p-1.5 shadow-sm">
        <div class="flex flex-wrap items-center gap-1.5">
            <div class="flex items-center gap-2 rounded-lg border border-primary/20 bg-surface-container-low px-3 py-1.5 text-on-surface-variant">
                <span class="material-symbols-outlined text-base text-secondary">schedule</span>
                <span class="font-label-md text-label-md" id="syncTimestamp">Sinkron: {{ now()->isoFormat('D MMM Y, HH:mm:ss') }} WIB</span>
            </div>
            <button class="flex items-center gap-1.5 rounded-lg border border-primary/20 bg-surface-container-lowest px-3 py-1.5 text-primary transition-colors hover:bg-surface-container-low active:scale-95" id="btnRefreshData" title="Muat ulang data" type="button">
                <span class="material-symbols-outlined text-base">refresh</span>
                <span class="font-label-md text-label-md">Refresh Data</span>
            </button>
            <div class="relative" data-range-dropdown>
                <button aria-expanded="false" aria-haspopup="listbox" class="flex items-center gap-1.5 rounded-lg border border-primary/20 bg-surface-container-low py-1.5 pl-3 pr-2.5 font-label-md text-label-md text-on-surface transition-colors hover:bg-surface-container-high" data-range-toggle title="Rentang waktu data" type="button">
                    <span data-range-label>30 Hari Terakhir</span>
                    <span aria-hidden="true" class="material-symbols-outlined text-base leading-none text-outline transition-transform duration-200" data-range-chevron>expand_more</span>
                </button>
                <div aria-label="Rentang waktu data" class="absolute right-0 top-full z-20 mt-1 hidden min-w-full rounded-lg border border-outline-variant bg-surface-container-lowest py-1 shadow-lg" data-range-menu role="listbox">
                    <button aria-selected="true" class="flex w-full items-center justify-between gap-3 whitespace-nowrap px-3 py-1.5 text-left font-label-md text-label-md transition-colors hover:bg-surface-container-low" data-range-option role="option" type="button">
                        <span data-range-text>30 Hari Terakhir</span>
                        <span aria-hidden="true" class="material-symbols-outlined text-base">check</span>
                    </button>
                </div>
            </div>
        </div>
        <button class="flex w-full items-center justify-center gap-1.5 rounded-lg bg-primary px-3.5 py-2 font-label-md text-label-md text-on-primary shadow-sm transition-all hover:bg-primary-container active:scale-95" id="btnProsesSemua" type="button">
            <span class="material-symbols-outlined text-base text-secondary-fixed">bolt</span>
            <span>Proses Semua Verifikasi</span>
        </button>
    </div>
</section>

<!-- 4 KPI -->
<section class="mb-space-xl grid grid-cols-1 gap-space-md sm:grid-cols-2 xl:grid-cols-4">
    <!-- Pesanan Baru -->
    <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
        <div class="absolute left-0 top-0 h-full w-1.5 bg-secondary"></div>
        <div class="flex items-start justify-between">
            <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Pesanan Baru</span>
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-surface-container-low text-primary">
                <span class="material-symbols-outlined text-lg">add_shopping_cart</span>
            </div>
        </div>
        <div class="mt-space-sm flex items-baseline gap-space-sm">
            <span class="font-display text-display text-primary font-extrabold tracking-tight">{{ $counts['new_today'] }}</span>
            <span class="font-label-md text-label-md text-on-surface-variant">Pesanan</span>
        </div>
        <div class="mt-space-xs flex items-center justify-between">
            @if ($newTodayDelta !== null)
                <div class="inline-flex items-center gap-1 font-label-sm text-label-sm {{ $newTodayDelta >= 0 ? 'text-secondary' : 'text-error' }}">
                    <span class="material-symbols-outlined text-sm font-bold">{{ $newTodayDelta >= 0 ? 'trending_up' : 'trending_down' }}</span>
                    <span>{{ ($newTodayDelta >= 0 ? '+' : '').$newTodayDelta }}% vs kemarin</span>
                </div>
            @endif
            <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">{{ $counts['awaiting'] }} belum bayar</span>
        </div>
        <div class="mt-3 h-1 w-full overflow-hidden rounded-full bg-surface-container">
            <div class="h-full rounded-full bg-secondary transition-all duration-700" style="width: {{ min(100, $conversion) }}%"></div>
        </div>
    </div>
    <!-- Menunggu Pembayaran -->
    <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
        <div class="absolute left-0 top-0 h-full w-1.5 bg-amber-500"></div>
        <div class="flex items-start justify-between">
            <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Menunggu Pembayaran</span>
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-700">
                <span class="material-symbols-outlined text-lg">hourglass_top</span>
            </div>
        </div>
        <div class="mt-space-sm flex items-baseline gap-space-sm">
            <span class="font-display text-display text-on-surface font-extrabold tracking-tight">{{ $counts['awaiting'] }}</span>
            <span class="font-label-md text-label-md text-on-surface-variant">Pesanan</span>
        </div>
        <div class="mt-space-xs flex items-center justify-between">
            <span class="inline-flex items-center gap-1.5 rounded bg-amber-100 px-2 py-0.5 font-label-sm text-label-sm font-bold text-amber-900">
                <span class="h-1.5 w-1.5 rounded-full bg-amber-600"></span>
                Transfer Manual
            </span>
            <span class="font-caption text-caption tabular-nums text-on-surface-variant">Total: Rp {{ number_format($counts['awaitingTotal'], 0, ',', '.') }}</span>
        </div>
        <div class="mt-3 h-1 w-full overflow-hidden rounded-full bg-surface-container">
            <div class="h-full rounded-full bg-amber-500 transition-all duration-700" style="width: {{ min(100, $backlogShare) }}%"></div>
        </div>
    </div>
    <!-- Pesanan Dikerjakan -->
    <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
        <div class="absolute left-0 top-0 h-full w-1.5 bg-primary-container"></div>
        <div class="flex items-start justify-between">
            <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Pesanan Dikerjakan</span>
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-fixed text-primary">
                <span class="material-symbols-outlined text-lg">design_services</span>
            </div>
        </div>
        <div class="mt-space-sm flex items-baseline gap-space-sm">
            <span class="font-display text-display text-primary font-extrabold tracking-tight">{{ $counts['in_progress'] }}</span>
            <span class="font-label-md text-label-md text-on-surface-variant">Project</span>
        </div>
        <div class="mt-space-xs flex items-center justify-between">
            <span class="inline-flex items-center gap-1.5 rounded bg-primary-fixed px-2 py-0.5 font-label-sm text-label-sm font-bold text-primary">
                <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-primary"></span>
                Dalam Progres
            </span>
            <span class="font-caption text-caption font-semibold text-on-surface-variant">{{ $counts['verification'] }} antrean verifikasi</span>
        </div>
        <div class="mt-3 h-1 w-full overflow-hidden rounded-full bg-surface-container">
            <div class="h-full rounded-full bg-primary-container transition-all duration-700" style="width: {{ min(100, $progressShare) }}%"></div>
        </div>
    </div>
    <!-- Pendapatan Bulan Ini -->
    <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
        <div class="absolute left-0 top-0 h-full w-1.5 bg-secondary"></div>
        <div class="flex items-start justify-between">
            <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Pendapatan Bulan Ini</span>
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary-fixed/40 text-secondary">
                <span class="material-symbols-outlined text-lg">payments</span>
            </div>
        </div>
        <div class="mt-space-sm flex items-baseline justify-between">
            <span class="font-headline-lg text-headline-lg tabular-nums text-primary font-extrabold tracking-tight">Rp {{ number_format($revenueMonth, 0, ',', '.') }}</span>
        </div>
        <div class="mt-1 flex items-center justify-between gap-space-sm">
            <span class="font-caption text-caption text-on-surface-variant">{{ $paidCount30 }} lunas (30 hari)
                @if ($revenueDelta !== null)
                    <span class="ml-1 inline-flex items-center gap-0.5 font-label-sm font-bold {{ $revenueDelta >= 0 ? 'text-secondary' : 'text-error' }}"><span class="material-symbols-outlined text-sm">{{ $revenueDelta >= 0 ? 'north_east' : 'south_east' }}</span>{{ ($revenueDelta >= 0 ? '+' : '').$revenueDelta }}%</span>
                @endif
            </span>
            <div class="h-6 w-24">
                <svg class="h-full w-full text-secondary" fill="none" viewBox="0 0 100 28" aria-hidden="true">
                    <path d="{{ $sparkLine }}" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2.2"></path>
                    <path d="{{ $sparkLine }} L 100,28 L 0,28 Z" fill="currentColor" fill-opacity="0.12"></path>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- 2-Column Grid -->
<section class="mb-space-xl grid grid-cols-1 gap-space-lg lg:grid-cols-12">
    <!-- Chart -->
    <div class="flex flex-col justify-between rounded-xl bg-surface-container-lowest p-space-md shadow-sm lg:col-span-7">
        <div>
            <div class="mb-space-md flex flex-col justify-between gap-space-sm sm:flex-row sm:items-center">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-xl text-primary">monitoring</span>
                        <h2 class="font-headline-sm text-headline-sm font-bold text-primary">Tren Pendapatan &amp; Volume Pesanan</h2>
                    </div>
                    <p class="mt-0.5 font-caption text-caption text-on-surface-variant">30 Hari terakhir ({{ $chart->first()['date']->isoFormat('D MMM') }} – {{ $chart->last()['date']->isoFormat('D MMM Y') }})</p>
                </div>
                <div class="inline-flex self-start rounded-lg bg-surface-container-low p-1 text-on-surface-variant" role="tablist">
                    <button class="rounded px-3 py-1 font-label-sm text-label-sm font-bold bg-surface-container-lowest text-primary shadow-sm transition-all" id="tabRevenue" type="button">Pendapatan (Rp)</button>
                    <button class="rounded px-3 py-1 font-label-sm text-label-sm transition-all text-on-surface-variant hover:text-on-surface" id="tabVolume" type="button">Volume Pesanan</button>
                </div>
            </div>
            <div class="relative my-2 h-64 w-full select-none">
                <svg width="0" height="0" class="absolute" aria-hidden="true">
                    <defs>
                        <linearGradient id="areaGradient" x1="0" x2="0" y1="0" y2="1">
                            <stop offset="0%" stop-color="#1a146b" stop-opacity="0.28"></stop>
                            <stop offset="50%" stop-color="#006a61" stop-opacity="0.12"></stop>
                            <stop offset="100%" stop-color="#86f2e4" stop-opacity="0.0"></stop>
                        </linearGradient>
                        <linearGradient id="lineGrad" x1="0" x2="1" y1="0" y2="0">
                            <stop offset="0%" stop-color="#1a146b"></stop>
                            <stop offset="70%" stop-color="#006a61"></stop>
                            <stop offset="100%" stop-color="#006f66"></stop>
                        </linearGradient>
                    </defs>
                </svg>
                <svg class="w-full overflow-visible is-chart-svg" data-chart="revenue" preserveAspectRatio="none" viewBox="0 0 700 220" aria-label="Grafik pendapatan harian 30 hari terakhir, puncak {{ $peak['date']->isoFormat('D MMM') }} Rp {{ number_format($peak['total'], 0, ',', '.') }}">
                    <line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="30" y2="30"></line>
                    <line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="85" y2="85"></line>
                    <line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="140" y2="140"></line>
                    <line stroke="#eceef0" stroke-width="1" x1="0" x2="700" y1="195" y2="195"></line>
                    <path d="{{ $prevLine }}" fill="none" opacity="0.75" stroke="#c8c5d3" stroke-dasharray="3 3" stroke-width="1.8"></path>
                    <path d="{{ $revArea }}" fill="url(#areaGradient)"></path>
                    <path d="{{ $revLine }}" fill="none" stroke="url(#lineGrad)" stroke-linecap="round" stroke-width="3.2"></path>
                    @if ($peak['total'] > 0)
                        <circle class="animate-pulse" cx="{{ round($xs($peakIdx), 1) }}" cy="{{ round($yOf($peak['total'], $maxRev), 1) }}" fill="#006a61" r="6" stroke="#ffffff" stroke-width="2.5"></circle>
                    @endif
                    <circle cx="700" cy="{{ round($yOf($last['total'], $maxRev), 1) }}" fill="#006f66" r="4.5"></circle>
                </svg>
                <svg class="hidden w-full overflow-visible is-chart-svg" data-chart="volume" preserveAspectRatio="none" viewBox="0 0 700 220" aria-label="Grafik jumlah pesanan lunas harian 30 hari terakhir">
                    <line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="30" y2="30"></line>
                    <line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="85" y2="85"></line>
                    <line stroke="#eceef0" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="700" y1="140" y2="140"></line>
                    <line stroke="#eceef0" stroke-width="1" x1="0" x2="700" y1="195" y2="195"></line>
                    <path d="{{ $volArea }}" fill="url(#areaGradient)"></path>
                    <path d="{{ $volLine }}" fill="none" stroke="url(#lineGrad)" stroke-linecap="round" stroke-width="3.2"></path>
                    <circle cx="700" cy="{{ round($yOf($last['count'], $maxVol), 1) }}" fill="#006f66" r="4.5"></circle>
                </svg>
                @if ($peak['total'] > 0)
                    <div class="absolute top-2 -translate-x-1/2 rounded-xl bg-primary-container px-3 py-2 shadow-lg pointer-events-none flex flex-col gap-0.5 text-on-primary" style="left: {{ $peakLeftPct }}%">
                        <div class="flex items-center justify-between gap-3">
                            <span class="font-caption text-caption uppercase text-on-primary-container">Puncak: {{ $peak['date']->isoFormat('D MMM') }}</span>
                            <span class="h-1.5 w-1.5 rounded-full bg-secondary-fixed"></span>
                        </div>
                        <span class="font-label-lg text-label-lg font-bold tabular-nums text-surface-container-lowest">Rp {{ number_format($peak['total'], 0, ',', '.') }}</span>
                        <span class="font-caption text-caption text-on-primary-container">{{ $peak['count'] }} Pesanan Lunas</span>
                    </div>
                @endif
            </div>
            <div class="flex justify-between pt-1 font-caption text-caption uppercase text-outline">
                @foreach ($axisIdx as $idx)
                    <span @class(['font-bold text-secondary' => $idx === $peakIdx])>{{ $chart[$idx]['date']->isoFormat('DD MMM').($idx === $peakIdx && $peak['total'] > 0 ? ' (Peak)' : '').($idx === 29 ? ' (Hari Ini)' : '') }}</span>
                @endforeach
            </div>
        </div>
        <!-- Mini Summary -->
        <div class="mt-space-md grid grid-cols-1 gap-space-sm rounded-lg bg-surface-container-low p-space-sm text-center sm:grid-cols-3">
            <div class="flex flex-col items-center">
                <span class="font-caption text-caption text-on-surface-variant">Rata-rata Transaksi Harian</span>
                <span class="mt-0.5 font-label-lg text-label-lg font-bold tabular-nums text-primary">Rp {{ number_format($avgDaily, 0, ',', '.') }}</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-caption text-caption text-on-surface-variant">Hari dengan Transaksi</span>
                <span class="mt-0.5 font-label-lg text-label-lg font-bold tabular-nums text-primary">{{ $chart->where('total', '>', 0)->count() }} / 30</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-caption text-caption text-on-surface-variant">Konversi Order → Lunas</span>
                <span class="mt-0.5 font-label-lg text-label-lg font-bold tabular-nums text-primary">{{ $paidCount30 }} dari {{ $createdCount30 }}</span>
            </div>
        </div>
    </div>
    <!-- Priority Actions -->
    <div class="flex flex-col justify-between rounded-xl bg-surface-container-lowest p-space-md shadow-sm lg:col-span-5">
        <div>
            <div class="mb-space-md flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-xl text-error">crisis_alert</span>
                    <h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">Perlu Tindakan Segera</h2>
                </div>
                <span class="flex items-center gap-1 rounded-full bg-error-container px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-error-container">
                    <span class="h-2 w-2 animate-pulse rounded-full bg-error"></span>
                    {{ $counts['verification'] }} Antrean
                </span>
            </div>
            <div class="flex flex-col gap-space-sm" id="actionQueueContainer">
                @forelse ($attention as $order)
                    <div class="group rounded-lg bg-surface-container-low p-space-sm transition-all hover:bg-surface-container" id="actionItem-{{ $order->id }}">
                        <div class="flex items-start justify-between gap-space-sm">
                            <div class="flex min-w-0 items-center gap-2">
                                <span class="rounded bg-primary-container px-1.5 py-0.5 font-caption text-caption font-bold uppercase text-on-primary">Transfer</span>
                                <span class="font-label-md text-label-md font-bold text-primary">{{ $order->order_number }}</span>
                                <span class="truncate font-caption text-caption text-on-surface-variant">{{ $order->user?->name ?? 'Akun dihapus' }}</span>
                            </div>
                            <span class="whitespace-nowrap font-label-md text-label-md font-bold tabular-nums text-primary">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                        <p class="mt-1 font-body-sm text-body-sm text-on-surface-variant">
                            Bisnis: <span class="font-medium text-on-surface">{{ $order->business_data['business_name'] ?? ($order->user?->name ?? '—') }}</span> • {{ $order->package_snapshot['name'] ?? $order->package->name }}
                        </p>
                        <div class="mt-space-sm flex items-center justify-between gap-2">
                            <button class="flex items-center gap-1 font-label-sm text-label-sm text-primary hover:text-secondary group-hover:underline" data-slip type="button"
                                data-slip-id="{{ $order->order_number }}"
                                data-slip-name="{{ $order->user?->name ?? '' }}"
                                data-slip-amount="Rp {{ number_format($order->total_price, 0, ',', '.') }}"
                                data-slip-image="{{ $order->payment_receipt_path ? route('admin.orders.receipt', $order) : '' }}">
                                <span class="material-symbols-outlined text-sm">receipt_long</span> Lihat Slip Bukti
                            </button>
                            <div class="flex items-center gap-1.5">
                                <form method="POST" action="{{ route('admin.orders.verify', $order) }}">
                                    @csrf
                                    <input name="action" type="hidden" value="reject">
                                    <input name="note" type="hidden" value="">
                                    <button class="rounded bg-error-container px-2.5 py-1 font-label-sm text-label-sm text-on-error-container transition-all hover:opacity-90" data-reject type="submit">Tolak</button>
                                </form>
                                <form method="POST" action="{{ route('admin.orders.verify', $order) }}" class="js-approve-form">
                                    @csrf
                                    <button class="rounded bg-secondary px-3 py-1 font-label-sm text-label-sm font-bold text-on-secondary transition-all hover:bg-on-secondary-container" name="action" value="approve" type="submit">Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="rounded-lg bg-secondary-container/40 p-space-sm font-body-sm text-body-sm text-on-secondary-container">Tidak ada antrean verifikasi. Semua pembayaran tertangani.</p>
                @endforelse
            </div>
        </div>
        <div class="mt-space-md flex items-center justify-between pt-space-sm font-caption text-caption text-on-surface-variant">
            <span class="flex items-center gap-1">
                <span class="h-1.5 w-1.5 rounded-full bg-secondary"></span> {{ $counts['verification'] }} pembayaran menunggu keputusan
            </span>
            <a class="font-label-sm text-label-sm text-primary hover:underline" href="{{ route('admin.orders.index', ['status' => 'payment_uploaded']) }}">Buka Antrean Lengkap →</a>
        </div>
    </div>
</section>

<!-- Recent Orders Table -->
<section class="mb-space-lg rounded-xl bg-surface-container-lowest p-space-md shadow-sm">
    <div class="mb-space-md flex flex-col justify-between gap-space-md md:flex-row md:items-center">
        <div>
            <h2 class="font-headline-sm text-headline-sm font-bold text-primary">Pesanan Terkini</h2>
            <p class="font-caption text-caption text-on-surface-variant">Daftar transaksi dan update pipeline pengerjaan pesanan klien</p>
        </div>
        <div class="flex flex-wrap items-center gap-space-sm">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-2.5 top-2.5 text-base text-outline">search</span>
                <input class="h-9 w-64 rounded-lg bg-surface-container-low pl-8 pr-3 font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary" id="tableSearch" placeholder="Cari ID, Konsumen, atau Template..." type="text" aria-label="Cari pesanan terkini">
            </div>
            <div class="inline-flex rounded-lg bg-surface-container-low p-1 text-on-surface-variant" id="filterStatusTabs">
                <button class="filter-tab rounded px-2.5 py-1 font-label-sm text-label-sm font-bold bg-surface-container-lowest text-primary shadow-sm" data-filter="all" type="button">Semua</button>
                <button class="filter-tab rounded px-2.5 py-1 font-label-sm text-label-sm transition-all hover:text-on-surface" data-filter="Baru" type="button">Baru</button>
                <button class="filter-tab rounded px-2.5 py-1 font-label-sm text-label-sm transition-all hover:text-on-surface" data-filter="Menunggu Pembayaran" type="button">Menunggu Verifikasi</button>
                <button class="filter-tab rounded px-2.5 py-1 font-label-sm text-label-sm transition-all hover:text-on-surface" data-filter="Dikerjakan" type="button">Dikerjakan</button>
                <button class="filter-tab rounded px-2.5 py-1 font-label-sm text-label-sm transition-all hover:text-on-surface" data-filter="Selesai" type="button">Selesai</button>
            </div>
            <button class="flex h-9 items-center gap-1.5 rounded-lg bg-surface-container-low px-3 font-label-md text-label-md text-on-surface transition-all hover:bg-surface-container" id="btnExportCsv" type="button">
                <span class="material-symbols-outlined text-base">file_download</span>
                <span>Export</span>
            </button>
        </div>
    </div>
    <div class="w-full overflow-x-auto rounded-lg">
        <table class="w-full text-left" id="ordersTable">
            <thead>
                <tr class="bg-surface-container-low font-label-sm text-label-sm uppercase text-on-surface-variant">
                    <th class="px-4 py-3 font-semibold">ID Pesanan</th>
                    <th class="px-4 py-3 font-semibold">Konsumen &amp; Brand</th>
                    <th class="px-4 py-3 font-semibold">Template</th>
                    <th class="px-4 py-3 font-semibold">Paket Lisensi</th>
                    <th class="px-4 py-3 text-right font-semibold">Total</th>
                    <th class="px-4 py-3 text-center font-semibold">Status</th>
                    <th class="px-4 py-3 font-semibold">Tanggal &amp; Jam</th>
                    <th class="px-4 py-3 text-right font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="font-body-sm text-body-sm text-on-surface">
                @foreach ($recent as $order)
                    @php
                        $statusKey = match ($order->status) {
                            'awaiting_payment' => 'Baru',
                            'payment_uploaded' => 'Menunggu Pembayaran',
                            'paid' => $order->delivery_status === 'delivered' ? 'Selesai' : 'Dikerjakan',
                            'rejected', 'cancelled' => 'Ditolak',
                            default => 'Menunggu Pembayaran',
                        };
                        $brand = $order->business_data['business_name'] ?? null;
                    @endphp
                    <tr class="order-row transition-colors hover:bg-surface-container-low/60 group" data-status="{{ $statusKey }}">
                        <td class="px-4 py-3.5 font-label-md text-label-md font-bold text-primary">{{ $order->order_number }}</td>
                        <td class="px-4 py-3.5">
                            <div class="flex flex-col">
                                <span class="font-label-md text-label-md font-semibold text-on-surface">{{ $order->user?->name ?? 'Akun dihapus' }}</span>
                                @if ($brand)
                                    <span class="font-caption text-caption text-on-surface-variant">{{ $brand }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-3.5">
                            <span class="rounded bg-surface-container px-2 py-0.5 font-label-sm text-label-sm font-medium text-primary">{{ $order->template_snapshot['name'] ?? $order->template?->name ?? '—' }}</span>
                        </td>
                        <td class="px-4 py-3.5 font-body-sm text-body-sm text-on-surface-variant">{{ $order->package_snapshot['name'] ?? $order->package->name }}</td>
                        <td class="px-4 py-3.5 text-right font-label-md text-label-md font-bold tabular-nums text-primary">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3.5 text-center">
                            @switch ($statusKey)
                                @case ('Baru')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-blue-800"><span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>Baru</span>
                                @break
                                @case ('Menunggu Pembayaran')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-amber-900"><span class="h-1.5 w-1.5 rounded-full bg-amber-600"></span>Menunggu Verifikasi</span>
                                @break
                                @case ('Dikerjakan')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-fixed px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-primary"><span class="h-1.5 w-1.5 animate-pulse rounded-full bg-primary"></span>Dikerjakan</span>
                                @break
                                @case ('Selesai')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-container px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-secondary"><span class="h-1.5 w-1.5 rounded-full bg-secondary"></span>Selesai</span>
                                @break
                                @default
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-error-container px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-error-container"><span class="h-1.5 w-1.5 rounded-full bg-error"></span>Ditolak</span>
                            @endswitch
                        </td>
                        <td class="px-4 py-3.5 tabular-nums font-body-sm text-body-sm text-on-surface-variant">{{ $order->created_at->format('d M Y, H:i').' WIB' }}</td>
                        <td class="px-4 py-3.5 text-right">
                            <a class="rounded px-2.5 py-1 font-label-sm text-label-sm font-semibold text-primary transition-all hover:bg-surface-container" data-order-detail href="{{ route('admin.orders.show', $order) }}">Detail →</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Empty State -->
        <div class="hidden flex-col items-center justify-center px-4 py-12 text-center" id="tableEmptyState">
            <div class="mb-space-sm flex h-16 w-16 items-center justify-center rounded-full bg-surface-container-low text-outline">
                <span class="material-symbols-outlined text-3xl">receipt_long_off</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm font-bold text-primary">Belum Ada Pesanan yang Sesuai Filter</h3>
            <p class="mt-1 max-w-sm font-body-sm text-body-sm text-on-surface-variant">Tidak ditemukan antrean transaksi dengan kriteria yang Anda cari. Coba ubah kata kunci pencarian atau reset filter.</p>
            <button class="mt-space-md rounded-lg bg-surface-container px-4 py-1.5 font-label-md text-label-md text-primary transition-all hover:bg-primary-fixed" id="btnResetFilter" type="button">Reset Filter &amp; Pencarian</button>
        </div>
    </div>
    <div class="mt-space-md flex flex-col items-center justify-between gap-space-sm pt-space-sm font-caption text-caption text-on-surface-variant sm:flex-row">
        <span>Menampilkan <span class="font-bold text-on-surface" id="visibleRowCount">{{ $recent->count() }}</span> dari <span class="font-bold text-on-surface">{{ $totalOrders }}</span> pesanan terdaftar</span>
        <a class="rounded-lg bg-surface-container-low px-3 py-1.5 font-label-md text-label-md text-on-surface transition-all hover:bg-surface-container" href="{{ route('admin.orders.index') }}">Semua Pesanan →</a>
    </div>
</section>

<!-- Slip Modal -->
<div class="fixed inset-0 z-50 hidden items-center justify-center bg-inverse-surface/40 p-4 backdrop-blur-xs" id="slipModal">
    <div class="relative w-full max-w-2xl rounded-xl bg-surface-container-lowest p-space-lg shadow-xl">
        <div class="flex items-center justify-between border-b border-surface-container pb-space-sm">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-xl text-primary">fact_check</span>
                <h3 class="font-headline-sm text-headline-sm font-bold text-primary">Verifikasi Manual Bukti Transfer</h3>
            </div>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg bg-surface-container text-on-surface-variant transition-all hover:text-error" data-modal-close type="button">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        </div>
        <div class="mt-space-md grid grid-cols-1 gap-space-md md:grid-cols-2">
            <div class="flex flex-col">
                <span class="mb-1 font-label-sm text-label-sm text-on-surface-variant">Bukti Transfer Unggahan Klien:</span>
                <div class="relative flex h-72 w-full items-center justify-center overflow-hidden rounded-lg bg-surface-container-low" id="slipPreviewBox">
                    <img alt="Bukti transfer" class="h-full w-full object-cover" id="modalSlipImage" src="">
                </div>
            </div>
            <div class="flex flex-col justify-between gap-space-sm">
                <div class="rounded-lg bg-surface-container-low p-space-sm">
                    <span class="block font-caption text-caption text-on-surface-variant">ID Transaksi &amp; Konsumen</span>
                    <span class="font-label-lg text-label-lg font-bold text-primary" id="modalOrderId"></span>
                    <span class="mt-0.5 block font-body-sm text-body-sm text-on-surface" id="modalCustomerName"></span>
                </div>
                <div class="rounded-lg bg-surface-container-low p-space-sm">
                    <div class="flex items-center justify-between">
                        <span class="font-caption text-caption text-on-surface-variant">Metode</span>
                        <span class="rounded bg-primary-container px-2 py-0.5 font-caption text-caption font-bold text-on-primary">TRANSFER</span>
                    </div>
                    <div class="mt-2 flex items-baseline justify-between">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Nominal Invoice:</span>
                        <span class="font-label-lg text-label-lg font-bold tabular-nums text-primary" id="modalAmount"></span>
                    </div>
                </div>
                <div class="rounded-lg bg-secondary-container/40 p-2.5 font-caption text-caption text-on-secondary-container">Verifikasi menandai pembayaran lunas dan melanjutkan pipeline pengerjaan.</div>
                <div class="mt-4 flex items-center justify-end gap-2 border-t border-surface-container pt-3">
                    <button class="rounded-lg bg-surface-container px-3.5 py-1.5 font-label-md text-label-md text-on-surface transition-all hover:bg-surface-container-high" data-modal-close type="button">Tutup</button>
                    <button class="rounded-lg bg-error-container px-3.5 py-1.5 font-label-md text-label-md text-on-error-container transition-all hover:opacity-90" data-modal-reject id="btnModalReject" type="button">Tolak Slip</button>
                    <button class="rounded-lg bg-secondary px-4 py-1.5 font-label-md text-label-md font-bold text-on-secondary transition-all hover:bg-on-secondary-container" data-modal-approve id="btnModalApprove" type="button">Konfirmasi &amp; Terbitkan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
