@extends('auth.layout')

@section('title', 'Monitoring Kuota AI')

@section('content')
<style>
    /* Isolasi khusus menu Monitoring Kuota AI */
    [data-open-tier-modal],
    [data-close-tier-modal] {
        cursor: pointer !important;
    }
</style>
<div class="mb-space-md flex flex-col gap-space-md">
    <!-- Header Halaman Superadmin -->
    <div class="mb-space-xl mt-space-lg flex flex-col justify-between gap-space-md lg:flex-row xl:items-end">
        <div class="flex flex-col">
            <div class="flex flex-wrap items-center gap-space-sm">
                <h1 class="font-headline-lg font-extrabold text-headline-lg text-primary tracking-tight" id="admin-ai-title">Monitoring Kuota AI</h1>
                @if ($aiOnline)
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-emerald-800">
                        <span aria-hidden="true" class="h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-600"></span>
                        Live Sync Terhubung
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-amber-900">
                        <span aria-hidden="true" class="h-1.5 w-1.5 rounded-full bg-amber-600"></span>
                        AI Engine Standby
                    </span>
                @endif
            </div>
            <p class="mt-0.5 font-body-md text-body-md text-on-surface-variant">Pantau kuota percakapan AI chatbot klien, deteksi kebutuhan upgrade paket, dan kelola upselling.</p>
        </div>

        <div class="flex flex-wrap items-center gap-space-xs">
            <button onclick="window.location.reload()" type="button" title="Muat ulang data" class="flex h-9 cursor-pointer items-center gap-1.5 rounded-lg border-2 border-outline-variant bg-surface-container-lowest px-3 font-label-md text-label-md text-on-surface transition-all hover:border-primary hover:text-primary">
                <span class="material-symbols-outlined text-lg">refresh</span>
                Refresh
            </button>

            <a href="{{ route('admin.ai.export') }}" title="Unduh data kuota CSV" class="flex h-9 items-center gap-1.5 rounded-lg border-2 border-outline-variant bg-surface-container-lowest px-3 font-label-md text-label-md text-primary transition-all hover:border-primary hover:bg-primary hover:text-on-primary">
                <span class="material-symbols-outlined text-lg">file_download</span>
                Export CSV
            </a>

            <a href="http://localhost:8001/analytics" target="_blank" title="Buka AI Analytics Engineering Dashboard" class="flex h-9 items-center gap-1.5 rounded-lg bg-primary px-3.5 font-label-md text-label-md text-on-primary shadow-sm transition-all hover:bg-primary/90">
                <span class="material-symbols-outlined text-lg">insights</span>
                AI Analytics ↗
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="flex items-center justify-between rounded-xl bg-secondary-fixed p-space-md font-label-md text-label-md text-on-secondary-fixed shadow-sm">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-on-secondary-fixed/80 hover:text-on-secondary-fixed text-lg font-bold">&times;</button>
        </div>
    @endif

    <!-- Stat cards Bento Grid (Identik dengan Desain Admin Orders) -->
    <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2 xl:grid-cols-4">
        <!-- Card 1: Total Klien Aktif -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div class="absolute left-0 top-0 h-full w-1.5 bg-primary"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Total Klien Chatbot</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-fixed text-primary">
                    <span class="material-symbols-outlined text-lg">smart_toy</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-primary text-display tracking-tight">{{ $totalClients }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Klien</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="font-caption text-caption text-on-surface-variant">Website aktif AI</span>
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">Layer 4</span>
            </div>
        </div>

        <!-- Card 2: Klien Kritis (Upselling Lead) -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div class="absolute left-0 top-0 h-full w-1.5 {{ $criticalCount > 0 ? 'bg-error' : 'bg-secondary' }}"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Peluang Upselling</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg {{ $criticalCount > 0 ? 'bg-error-container text-on-error-container' : 'bg-secondary-fixed text-secondary' }}">
                    <span class="material-symbols-outlined text-lg">trending_up</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-display {{ $criticalCount > 0 ? 'text-error' : 'text-on-surface' }} tracking-tight">{{ $criticalCount }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Klien Kritis</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="inline-flex items-center gap-1.5 rounded bg-amber-100 px-2 py-0.5 font-label-sm font-bold text-label-sm text-amber-900">
                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-amber-600"></span>{{ $warningCount }} Waspada
                </span>
                <span class="rounded bg-error-container px-2 py-0.5 font-label-sm font-bold text-label-sm text-on-error-container">
                    {{ $exhaustedCount }} Habis
                </span>
            </div>
        </div>

        <!-- Card 3: Konsumsi Pesan Global -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div class="absolute left-0 top-0 h-full w-1.5 bg-secondary"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Total Pesan Bulan Ini</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary-fixed/40 text-secondary">
                    <span class="material-symbols-outlined text-lg">forum</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-primary text-display tracking-tight">{{ number_format($totalUsedMessages, 0, ',', '.') }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Pesan</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="tabular-nums font-caption text-caption text-on-surface-variant">Kapasitas: {{ number_format($totalQuotaMessages, 0, ',', '.') }}</span>
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">global</span>
            </div>
        </div>

        <!-- Card 4: Jadwal Reset Siklus -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div class="absolute left-0 top-0 h-full w-1.5 bg-tertiary"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Siklus Reset Kuota</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-tertiary-fixed text-tertiary">
                    <span class="material-symbols-outlined text-lg">event_repeat</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-on-surface text-display tracking-tight">{{ $daysUntilReset }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Hari Tersisa</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="font-caption text-caption text-on-surface-variant">Reset: {{ $resetDateFormatted }}</span>
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">otomatis</span>
            </div>
        </div>
    </div>

    <!-- Search & Filter Bar (Identik dengan Admin Orders Toolbar) -->
    <div class="flex flex-col items-center justify-between gap-space-md rounded-xl bg-surface-container-lowest p-space-md shadow-sm lg:flex-row">
        <!-- Search Input Form -->
        <form method="GET" action="{{ route('admin.ai.index') }}" class="relative flex w-full items-center lg:w-96">
            @if ($statusFilter !== 'semua')
                <input type="hidden" name="status" value="{{ $statusFilter }}">
            @endif
            <span class="material-symbols-outlined pointer-events-none absolute left-space-sm text-lg text-outline">search</span>
            <input aria-label="Cari klien atau bisnis" class="h-9 w-full rounded-lg bg-surface-container-low pl-9 pr-3 font-body-sm text-body-sm text-on-surface placeholder:text-outline transition-all focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/20" name="q" value="{{ $search }}" placeholder="Cari nama bisnis, klien, atau tenant ID..." type="text">
        </form>

        <!-- Status Filter Tabs -->
        <nav aria-label="Filter status kuota" class="flex flex-wrap items-center gap-space-xs">
            <span class="font-caption text-caption uppercase tracking-wider text-outline">Status:</span>
            
            <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $statusFilter === 'semua' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" href="{{ route('admin.ai.index', array_filter(['q' => $search], fn($v) => !empty($v))) }}">
                Semua
                <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $statusFilter === 'semua' ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $totalClients }}</span>
            </a>

            <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $statusFilter === 'kritis' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" href="{{ route('admin.ai.index', array_merge(array_filter(['q' => $search], fn($v) => !empty($v)), ['status' => 'kritis'])) }}">
                Kritis (≥80%)
                @if ($criticalCount > 0)
                    <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $statusFilter === 'kritis' ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $criticalCount }}</span>
                @endif
            </a>

            <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $statusFilter === 'habis' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" href="{{ route('admin.ai.index', array_merge(array_filter(['q' => $search], fn($v) => !empty($v)), ['status' => 'habis'])) }}">
                Habis
                @if ($exhaustedCount > 0)
                    <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $statusFilter === 'habis' ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $exhaustedCount }}</span>
                @endif
            </a>

            <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $statusFilter === 'aman' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" href="{{ route('admin.ai.index', array_merge(array_filter(['q' => $search], fn($v) => !empty($v)), ['status' => 'aman'])) }}">
                Aman
                <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $statusFilter === 'aman' ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $safeCount }}</span>
            </a>

            @if ($search || $statusFilter !== 'semua')
                <a aria-label="Reset Filter" class="flex h-9 w-9 items-center justify-center rounded-lg bg-surface-container-low text-on-surface-variant transition-all hover:bg-error-container hover:text-on-error-container" href="{{ route('admin.ai.index') }}" title="Reset Filter">
                    <span class="material-symbols-outlined text-lg">filter_alt_off</span>
                </a>
            @endif
        </nav>
    </div>

    <!-- Data Table (Standar Desain Webia Admin Orders) -->
    <div class="flex flex-col overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">
        <div class="w-full overflow-x-auto">
            <table class="select-text w-full text-left" id="aiQuotaTable">
                <thead>
                    <tr class="border-b border-surface-container uppercase tracking-wider text-on-surface-variant">
                        <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Klien &amp; Bisnis</th>
                        <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Template &amp; Tenant</th>
                        <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Paket AI</th>
                        <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4 min-w-[200px]">Konsumsi Pesan</th>
                        <th class="px-3 py-space-sm text-center font-label-sm text-label-sm font-bold md:px-4">Status</th>
                        <th class="px-3 py-space-sm text-center font-label-sm text-label-sm font-bold md:px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container font-body-sm text-body-sm text-on-surface">
                    @forelse ($filteredClients as $client)
                        @php
                            $p = $client['percentage'];
                            $barClass = $p >= 100 ? 'bg-error' : ($p >= 80 ? 'bg-amber-500' : 'bg-secondary');
                            $waMessage = "Halo Kak {$client['client_name']}, kami dari Tim Webia ingin menginfokan bahwa kuota chatbot AI website {$client['business_name']} saat ini telah terpakai {$p}% ({$client['used_messages']}/{$client['monthly_quota']} pesan).\n\nApakah ingin tambah kuota (+500 pesan Rp49rb / +1.000 pesan Rp89rb) atau upgrade paket website agar chatbot tetap aktif melayani pengunjung?";
                            $waUrl = "https://wa.me/" . preg_replace('/[^0-9]/', '', $client['whatsapp']) . "?text=" . rawurlencode($waMessage);

                            $pkgTier = strtolower($client['package_tier'] ?? 'pixel');
                        @endphp
                        <tr class="transition-colors hover:bg-surface-container-low/60">
                            <!-- Klien & Bisnis -->
                            <td class="px-3 py-3.5 md:px-4">
                                <div class="flex items-center gap-space-xs">
                                    <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-primary-fixed/40 font-label-md font-bold text-primary">
                                        {{ strtoupper(substr($client['client_name'], 0, 1)) }}
                                    </div>
                                    <div class="flex min-w-0 flex-col">
                                        <span class="truncate font-label-md text-label-md font-semibold text-on-surface">{{ $client['business_name'] }}</span>
                                        <span class="font-caption text-caption text-on-surface-variant">{{ $client['client_name'] }} · {{ $client['client_email'] }}</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Template & Tenant ID -->
                            <td class="px-3 py-3.5 md:px-4">
                                <div class="flex flex-col">
                                    <span class="font-label-md text-label-md font-semibold text-on-surface">{{ $client['template_name'] }}</span>
                                    <span class="font-caption text-caption text-primary font-mono">{{ $client['tenant_id'] }}</span>
                                </div>
                            </td>

                            <!-- Paket AI Tier Badge -->
                            <td class="px-3 py-3.5 md:px-4">
                                @switch ($pkgTier)
                                    @case ('infinity')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-amber-900">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-600"></span>Infinity
                                        </span>
                                    @break
                                    @case ('nexus')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-indigo-900">
                                            <span class="h-1.5 w-1.5 rounded-full bg-indigo-600"></span>Nexus
                                        </span>
                                    @break
                                    @case ('pulse')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-blue-900">
                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>Pulse
                                        </span>
                                    @break
                                    @default
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-surface-container px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-surface-variant">
                                            <span class="h-1.5 w-1.5 rounded-full bg-outline"></span>Pixel
                                        </span>
                                @endswitch
                                <div class="mt-0.5 font-caption text-caption text-on-surface-variant">
                                    {{ number_format($client['monthly_quota'], 0, ',', '.') }} pesan/bln
                                </div>
                            </td>

                            <!-- Penggunaan Pesan & Progress Bar -->
                            <td class="px-3 py-3.5 md:px-4">
                                <div class="flex flex-col gap-1">
                                    <div class="flex justify-between items-center">
                                        <span class="tabular-nums font-label-sm text-label-sm font-bold text-on-surface">
                                            {{ number_format($client['used_messages'], 0, ',', '.') }}
                                            <span class="font-normal text-on-surface-variant">/ {{ number_format($client['monthly_quota'], 0, ',', '.') }}</span>
                                        </span>
                                        <span class="tabular-nums font-label-sm text-label-sm font-bold {{ $p >= 80 ? 'text-error' : 'text-on-surface' }}">
                                            {{ round($p, 1) }}%
                                        </span>
                                    </div>
                                    <div class="h-2 w-full overflow-hidden rounded-full bg-surface-container">
                                        <div class="h-full rounded-full {{ $barClass }} transition-all" style="width: {{ min(100, $p) }}%"></div>
                                    </div>
                                    <span class="font-caption text-caption text-on-surface-variant">
                                        Sisa: <strong class="text-on-surface">{{ number_format($client['remaining_messages'], 0, ',', '.') }}</strong> pesan
                                    </span>
                                </div>
                            </td>

                            <!-- Status Kuota Pill -->
                            <td class="px-3 py-3.5 text-center md:px-4">
                                @if ($client['is_exhausted'])
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-error-container px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-error-container">
                                        <span class="h-1.5 w-1.5 animate-ping rounded-full bg-error"></span>Habis (Blocked)
                                    </span>
                                @elseif ($client['is_warning'])
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-amber-900">
                                        <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-amber-600"></span>Waspada (≥80%)
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-fixed px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-secondary-fixed">
                                        <span class="h-1.5 w-1.5 rounded-full bg-secondary"></span>Aman
                                    </span>
                                @endif
                            </td>

                            <!-- Aksi Sales / CRM -->
                            <td class="px-3 py-3.5 text-center md:px-4">
                                <div class="inline-flex items-center justify-center gap-1.5">
                                    <!-- Tombol WhatsApp Upselling -->
                                    <a href="{{ $waUrl }}" target="_blank" title="Hubungi Klien via WhatsApp" class="flex h-8 items-center gap-1 rounded-lg bg-emerald-600 px-2.5 font-label-sm text-label-sm font-bold text-white shadow-xs transition-all hover:bg-emerald-700">
                                        <span class="material-symbols-outlined text-[16px]">chat</span>
                                        <span class="hidden sm:inline">WA Sales</span>
                                    </a>

                                    <!-- Tombol Ubah Tier / Top-Up Kuota -->
                                    <button type="button"
                                        data-open-tier-modal
                                        data-tenant-id="{{ $client['tenant_id'] }}"
                                        data-tenant-name="{{ $client['business_name'] }}"
                                        data-current-tier="{{ $client['package_tier'] }}"
                                        data-current-quota="{{ $client['monthly_quota'] }}"
                                        onclick="openTierModal('{{ $client['tenant_id'] }}', '{{ addslashes($client['business_name']) }}', '{{ $client['package_tier'] }}', {{ $client['monthly_quota'] }})"
                                        title="Ubah Paket & Kuota Klien"
                                        class="flex h-8 cursor-pointer items-center gap-1 rounded-lg border border-outline-variant bg-surface-container-low px-2.5 font-label-sm text-label-sm font-bold text-on-surface transition-all hover:border-primary hover:text-primary">
                                        <span class="material-symbols-outlined text-[16px]">tune</span>
                                        <span class="hidden sm:inline">Ubah Paket</span>
                                    </button>

                                    @if ($client['order'])
                                        <a href="{{ route('admin.orders.show', $client['order']) }}"
                                           data-order-detail
                                           title="Detail Pesanan ({{ $client['order']->order_number }})"
                                           class="flex h-8 w-8 items-center justify-center rounded-lg bg-surface-container-low text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary">
                                            <span class="material-symbols-outlined text-[18px]">receipt_long</span>
                                        </a>
                                    @else
                                        <span title="Tenant ini belum memiliki data pesanan Webia (Tenant bawaan / dibuat via AI Engine)" class="flex h-8 w-8 cursor-not-allowed items-center justify-center rounded-lg bg-surface-container-low text-outline/50">
                                            <span class="material-symbols-outlined text-[18px]">receipt_long</span>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-space-md py-12 text-center text-on-surface-variant">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-4xl text-outline">search_off</span>
                                    <span class="font-label-lg font-bold">Tidak ada klien ditemukan</span>
                                    <span class="font-caption text-caption">Coba ubah filter status atau kata kunci pencarian Anda.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Dialog: Ubah Paket & Tambah Kuota Klien -->
<div id="tierModal" class="fixed inset-0 z-[70] hidden items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs">
    <div class="w-full max-w-md rounded-2xl bg-surface-container-lowest border border-outline-variant p-6 shadow-xl transition-all">
        <div class="flex items-center justify-between border-b border-surface-container pb-3 mb-4">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-2xl">tune</span>
                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Ubah Paket &amp; Tambah Kuota</h3>
            </div>
            <button type="button" data-close-tier-modal onclick="closeTierModal()" class="cursor-pointer text-on-surface-variant hover:text-on-surface font-bold text-xl">&times;</button>
        </div>

        <form id="tierForm" method="POST" action="">
            @csrf
            <div class="space-y-4">
                {{-- Info Klien --}}
                <div class="rounded-lg bg-surface-container-low p-3">
                    <span class="font-caption text-caption text-on-surface-variant block mb-0.5">Klien Bisnis / Tenant:</span>
                    <div id="modalTenantName" class="font-label-md font-bold text-on-surface"></div>
                    <div class="flex items-center justify-between mt-1">
                        <span id="modalTenantId" class="font-mono text-xs text-primary"></span>
                        <span id="modalCurrentQuotaBadge" class="text-xs font-bold text-on-surface-variant bg-surface-container px-2 py-0.5 rounded"></span>
                    </div>
                </div>

                {{-- Catatan SOP Verifikasi Manual --}}
                <div class="rounded-lg bg-amber-500/10 border border-amber-500/20 p-2.5 text-xs text-amber-800 flex items-start gap-2">
                    <span class="material-symbols-outlined text-[16px] text-amber-600 shrink-0 mt-0.5">receipt_long</span>
                    <span><strong>SOP Upgrade Manual:</strong> Karena payment gateway sedang dalam pengembangan, klien mengonfirmasi pesanan via WhatsApp. Pastikan bukti transfer sudah valid sebelum menyimpan.</span>
                </div>

                {{-- Opsi Cepat Tambah Kuota Instan (Top-Up) --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="font-label-md font-bold text-on-surface block">Tambah Kuota Cepat (+Pesan):</label>
                        <span class="text-[11px] text-on-surface-variant font-normal">Klik untuk memilih</span>
                    </div>
                    <div class="grid grid-cols-3 gap-2" id="quickAddQuotaGroup">
                        <button type="button" id="btn-add-500" onclick="applyAddQuota(500)" class="quick-add-btn cursor-pointer py-2 px-2 text-xs font-bold rounded-xl border border-outline-variant bg-surface-container-low hover:border-primary hover:bg-primary/5 transition-all text-on-surface text-center flex flex-col items-center justify-center">
                            <span class="block">+500 Pesan</span>
                            <span class="text-[10px] text-on-surface-variant font-normal">Rp49.000</span>
                        </button>
                        <button type="button" id="btn-add-1000" onclick="applyAddQuota(1000)" class="quick-add-btn cursor-pointer py-2 px-2 text-xs font-bold rounded-xl border border-outline-variant bg-surface-container-low hover:border-primary hover:bg-primary/5 transition-all text-on-surface text-center flex flex-col items-center justify-center">
                            <span class="block">+1.000 Pesan</span>
                            <span class="text-[10px] text-on-surface-variant font-normal">Rp89.000</span>
                        </button>
                        <button type="button" id="btn-add-2500" onclick="applyAddQuota(2500)" class="quick-add-btn cursor-pointer py-2 px-2 text-xs font-bold rounded-xl border border-outline-variant bg-surface-container-low hover:border-primary hover:bg-primary/5 transition-all text-on-surface text-center flex flex-col items-center justify-center">
                            <span class="block">+2.500 Pesan</span>
                            <span class="text-[10px] text-on-surface-variant font-normal">Rp199.000</span>
                        </button>
                    </div>
                </div>

                {{-- Pilihan Upgrade Tingkatan Paket --}}
                <div>
                    <label for="packageTierSelect" class="font-label-md font-bold text-on-surface block mb-1.5">Atau Upgrade Paket Website:</label>
                    <select id="packageTierSelect" name="package_tier" onchange="onTierChange(this.value)" class="h-10 w-full cursor-pointer rounded-lg border border-outline-variant bg-surface-container-low px-3 font-body-sm text-body-sm text-on-surface transition-all focus:bg-surface-container-lowest focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                        <option value="pixel">Pixel — 500 Pesan / Bulan (Starter)</option>
                        <option value="pulse">Pulse — 1.500 Pesan / Bulan (Standard)</option>
                        <option value="nexus">Nexus — 2.500 Pesan / Bulan (Business CMS)</option>
                        <option value="infinity">Infinity — 5.000 Pesan / Bulan (Enterprise)</option>
                    </select>
                </div>

                {{-- Batas Kuota Baru Hasil Hitung / Kustom --}}
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label for="customQuotaInput" class="font-label-md font-bold text-on-surface">
                            Total Batas Kuota Baru:
                        </label>
                        <button type="button" onclick="resetToTierDefault()" class="text-[11px] text-primary hover:underline cursor-pointer">
                            Reset ke Default
                        </button>
                    </div>
                    <input type="number" id="customQuotaInput" name="custom_quota" placeholder="Otomatis mengikuti paket atau isi kustom" min="100" step="50" class="h-10 w-full rounded-lg border border-outline-variant bg-surface-container-low px-3 font-body-sm text-body-sm text-on-surface placeholder:text-outline transition-all focus:bg-surface-container-lowest focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <span id="quotaCalcNotice" class="font-caption text-caption text-on-surface-variant mt-1 block"></span>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-2 border-t border-surface-container pt-4">
                <button type="button" data-close-tier-modal onclick="closeTierModal()" class="cursor-pointer rounded-lg border-2 border-outline-variant px-4 py-2 font-label-md text-label-md font-bold text-on-surface-variant hover:bg-surface-container-low">
                    Batal
                </button>
                <button type="submit" class="cursor-pointer rounded-lg bg-primary px-4 py-2 font-label-md text-label-md font-bold text-on-primary shadow-sm hover:bg-primary/90">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let activeClientQuota = 500;
    let selectedQuickAdd = null;
    const TIER_DEFAULT_QUOTAS = {
        'pixel': 500,
        'pulse': 1500,
        'nexus': 2500,
        'infinity': 5000
    };

    function updateQuickAddVisuals(selectedAmount) {
        const amounts = [500, 1000, 2500];
        amounts.forEach(amt => {
            const btn = document.getElementById(`btn-add-${amt}`);
            if (!btn) return;
            if (selectedAmount === amt) {
                btn.className = 'quick-add-btn cursor-pointer py-2 px-2 text-xs font-extrabold rounded-xl border-2 border-primary bg-primary/10 text-primary shadow-xs transition-all text-center flex flex-col items-center justify-center ring-2 ring-primary/20';
            } else {
                btn.className = 'quick-add-btn cursor-pointer py-2 px-2 text-xs font-bold rounded-xl border border-outline-variant bg-surface-container-low hover:border-primary hover:bg-primary/5 transition-all text-on-surface text-center flex flex-col items-center justify-center';
            }
        });
    }

    window.openTierModal = function(tenantId, tenantName, currentTier, currentQuota) {
        const modal = document.getElementById('tierModal');
        const form = document.getElementById('tierForm');
        if (!modal || !form) return;

        form.action = `/admin/ai-quotas/${encodeURIComponent(tenantId)}/tier`;

        activeClientQuota = parseInt(currentQuota) || 500;
        selectedQuickAdd = null;
        updateQuickAddVisuals(null);

        const nameEl = document.getElementById('modalTenantName');
        const idEl = document.getElementById('modalTenantId');
        const badgeEl = document.getElementById('modalCurrentQuotaBadge');
        const selectEl = document.getElementById('packageTierSelect');
        const quotaEl = document.getElementById('customQuotaInput');
        const noticeEl = document.getElementById('quotaCalcNotice');

        if (nameEl) nameEl.innerText = tenantName || tenantId;
        if (idEl) idEl.innerText = tenantId;
        if (badgeEl) badgeEl.innerText = `Kuota Saat Ini: ${activeClientQuota.toLocaleString('id-ID')} pesan`;
        if (selectEl) selectEl.value = (currentTier || 'pixel').toLowerCase();
        if (quotaEl) quotaEl.value = '';
        if (noticeEl) noticeEl.innerText = 'Kosongkan jika ingin mengikuti kuota standar paket.';

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.toggle('overflow-hidden', true);
    };

    window.applyAddQuota = function(amount) {
        const quotaEl = document.getElementById('customQuotaInput');
        const noticeEl = document.getElementById('quotaCalcNotice');
        if (!quotaEl) return;

        // Toggle jika mengklik tombol yang sama
        if (selectedQuickAdd === amount) {
            selectedQuickAdd = null;
            updateQuickAddVisuals(null);
            quotaEl.value = '';
            if (noticeEl) noticeEl.innerText = 'Pilihan tambah kuota dibatalkan. Mengikuti default paket.';
            return;
        }

        selectedQuickAdd = amount;
        updateQuickAddVisuals(amount);

        const newTotal = activeClientQuota + amount;
        quotaEl.value = newTotal;
        if (noticeEl) {
            noticeEl.innerHTML = `<span class="inline-flex items-center gap-1 text-primary font-bold"><span class="material-symbols-outlined text-[15px]">check_circle</span> +${amount.toLocaleString('id-ID')} pesan terpilih</span> ditambahkan ke kuota berjalan (${activeClientQuota.toLocaleString('id-ID')} → <strong>${newTotal.toLocaleString('id-ID')}</strong> pesan/bulan).`;
        }
    };

    window.onTierChange = function(tier) {
        selectedQuickAdd = null;
        updateQuickAddVisuals(null);

        const quotaEl = document.getElementById('customQuotaInput');
        const noticeEl = document.getElementById('quotaCalcNotice');
        const defaultQuota = TIER_DEFAULT_QUOTAS[tier] || 500;
        if (quotaEl) quotaEl.value = defaultQuota;
        if (noticeEl) {
            noticeEl.innerText = `Batas kuota otomatis disesuaikan ke standar paket ${tier.toUpperCase()}: ${defaultQuota.toLocaleString('id-ID')} pesan/bulan.`;
        }
    };

    window.resetToTierDefault = function() {
        selectedQuickAdd = null;
        updateQuickAddVisuals(null);

        const selectEl = document.getElementById('packageTierSelect');
        const tier = selectEl ? selectEl.value : 'pixel';
        onTierChange(tier);
    };

    window.closeTierModal = function() {
        const modal = document.getElementById('tierModal');
        if (!modal) return;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };
</script>
@endsection
