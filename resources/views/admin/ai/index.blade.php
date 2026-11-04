@extends('auth.layout')

@section('title', 'Monitoring Kuota AI')

@section('content')
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
            <button onclick="window.location.reload()" type="button" title="Muat ulang data" class="flex h-9 items-center gap-1.5 rounded-lg border-2 border-outline-variant bg-surface-container-lowest px-3 font-label-md text-label-md text-on-surface transition-all hover:border-primary hover:text-primary">
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
                            $waMessage = "Halo Kak {$client['client_name']}, kami dari Tim Sales WEBIA ingin menginfokan bahwa kuota chatbot AI website {$client['business_name']} saat ini telah terpakai {$p}% ({$client['used_messages']}/{$client['monthly_quota']} pesan). Apakah ingin kami bantu upgrade paket agar bot tetap aktif melayani calon pembeli?";
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
                                    <button type="button" onclick="openTierModal('{{ $client['tenant_id'] }}', '{{ addslashes($client['business_name']) }}', '{{ $client['package_tier'] }}', {{ $client['monthly_quota'] }})" title="Ubah Paket & Kuota Klien" class="flex h-8 items-center gap-1 rounded-lg border border-outline-variant bg-surface-container-low px-2.5 font-label-sm text-label-sm font-bold text-on-surface transition-all hover:border-primary hover:text-primary">
                                        <span class="material-symbols-outlined text-[16px]">tune</span>
                                        <span class="hidden sm:inline">Ubah Paket</span>
                                    </button>

                                    @if ($client['order'])
                                        <a href="{{ route('admin.orders.show', $client['order']) }}" title="Detail Pesanan" class="flex h-8 w-8 items-center justify-center rounded-lg bg-surface-container-low text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary">
                                            <span class="material-symbols-outlined text-[18px]">receipt_long</span>
                                        </a>
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

<!-- Modal Dialog: Ubah Paket & Top-Up Kuota (Mengikuti Styling Webdev Modal) -->
<div id="tierModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="w-full max-w-md rounded-2xl bg-surface-container-lowest border border-outline-variant p-6 shadow-xl transition-all">
        <div class="flex items-center justify-between border-b border-surface-container pb-3 mb-4">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-2xl">tune</span>
                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Ubah Paket &amp; Kuota Klien</h3>
            </div>
            <button type="button" onclick="closeTierModal()" class="text-on-surface-variant hover:text-on-surface font-bold text-xl">&times;</button>
        </div>

        <form id="tierForm" method="POST" action="">
            @csrf
            <div class="space-y-4">
                <div class="rounded-lg bg-surface-container-low p-3">
                    <span class="font-caption text-caption text-on-surface-variant block mb-0.5">Klien Bisnis / Tenant:</span>
                    <div id="modalTenantName" class="font-label-md font-bold text-on-surface"></div>
                    <div id="modalTenantId" class="font-mono text-xs text-primary"></div>
                </div>

                <div>
                    <label for="packageTierSelect" class="font-label-md font-bold text-on-surface block mb-1.5">Pilih Tingkatan Paket Baru:</label>
                    <select id="packageTierSelect" name="package_tier" class="h-10 w-full rounded-lg border border-outline-variant bg-surface-container-low px-3 font-body-sm text-body-sm text-on-surface transition-all focus:bg-surface-container-lowest focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                        <option value="pixel">Pixel — 500 Pesan / Bulan (Starter)</option>
                        <option value="pulse">Pulse — 1.500 Pesan / Bulan (Standard)</option>
                        <option value="nexus">Nexus — 2.500 Pesan / Bulan (Business CMS)</option>
                        <option value="infinity">Infinity — 5.000 Pesan / Bulan (Enterprise)</option>
                    </select>
                </div>

                <div>
                    <label for="customQuotaInput" class="font-label-md font-bold text-on-surface block mb-1.5">
                        Batas Kuota Kustom (Opsional):
                        <span class="font-normal font-caption text-caption text-on-surface-variant">(Kosongkan jika default paket)</span>
                    </label>
                    <input type="number" id="customQuotaInput" name="custom_quota" placeholder="Contoh: 3000" min="100" step="50" class="h-10 w-full rounded-lg border border-outline-variant bg-surface-container-low px-3 font-body-sm text-body-sm text-on-surface placeholder:text-outline transition-all focus:bg-surface-container-lowest focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-2 border-t border-surface-container pt-4">
                <button type="button" onclick="closeTierModal()" class="rounded-lg border-2 border-outline-variant px-4 py-2 font-label-md text-label-md font-bold text-on-surface-variant hover:bg-surface-container-low">
                    Batal
                </button>
                <button type="submit" class="rounded-lg bg-primary px-4 py-2 font-label-md text-label-md font-bold text-on-primary shadow-sm hover:bg-primary/90">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openTierModal(tenantId, tenantName, currentTier, currentQuota) {
        const form = document.getElementById('tierForm');
        form.action = `/admin/ai-quotas/${encodeURIComponent(tenantId)}/tier`;

        document.getElementById('modalTenantName').innerText = tenantName;
        document.getElementById('modalTenantId').innerText = tenantId;
        document.getElementById('packageTierSelect').value = currentTier.toLowerCase();
        document.getElementById('customQuotaInput').value = '';

        document.getElementById('tierModal').classList.remove('hidden');
    }

    function closeTierModal() {
        document.getElementById('tierModal').classList.add('hidden');
    }

    document.getElementById('tierModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeTierModal();
    });
</script>
@endsection
