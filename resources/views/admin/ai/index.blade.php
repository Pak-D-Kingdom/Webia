@extends('auth.layout')

@section('title', 'Monitoring Kuota AI')

@section('content')
<style>
    /* Isolasi khusus menu Monitoring Kuota AI */
    [data-open-tier-modal],
    [data-close-tier-modal],
    [data-action-btn] {
        cursor: pointer !important;
    }

    /* Penataan Presisi Material Symbols */
    .material-symbols-outlined {
        display: inline-flex !important;
        vertical-align: middle !important;
        align-items: center !important;
        justify-content: center !important;
    }

    /* Dropdown Menu Aksi Kompak & Rapi */
    #clientActionDropdown {
        background-color: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.08) !important;
        border-radius: 14px !important;
        padding: 6px !important;
        width: 275px !important;
        box-sizing: border-box !important;
        font-family: inherit !important;
    }

    .dropdown-action-btn {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        gap: 10px !important;
        width: 100% !important;
        box-sizing: border-box !important;
        padding: 7px 9px !important;
        border-radius: 8px !important;
        border: none !important;
        background: transparent !important;
        cursor: pointer !important;
        text-align: left !important;
        text-decoration: none !important;
        transition: background-color 0.15s ease !important;
    }

    .dropdown-action-btn:hover {
        background-color: #f1f5f9 !important;
    }

    .dropdown-action-btn .btn-icon-box {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 30px !important;
        height: 30px !important;
        border-radius: 8px !important;
        flex-shrink: 0 !important;
    }

    .dropdown-action-btn .btn-text-content {
        display: flex !important;
        flex-direction: column !important;
        flex: 1 !important;
        min-width: 0 !important;
    }

    .dropdown-action-btn .btn-title {
        font-size: 12px !important;
        font-weight: 600 !important;
        color: #1e293b !important;
        line-height: 1.25 !important;
    }

    .dropdown-action-btn .btn-desc {
        font-size: 10px !important;
        color: #64748b !important;
        margin-top: 1px !important;
    }

    /* Knowledge Base Modal Dialog (Tidak Melebar, Proporsional 680px) */
    .knowledge-modal-card {
        max-width: 680px !important;
        width: 92vw !important;
        max-height: 86vh !important;
        margin: auto !important;
        background-color: #ffffff !important;
        border-radius: 16px !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
    }

    .know-tab-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        padding: 7px 14px !important;
        font-size: 11.5px !important;
        font-weight: 700 !important;
        border-radius: 10px !important;
        cursor: pointer !important;
        border: 1px solid transparent !important;
        white-space: nowrap !important;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    .know-tab-btn.active {
        background-color: #4f46e5 !important;
        color: #ffffff !important;
        border-color: #4338ca !important;
        box-shadow: 0 4px 10px -2px rgba(79, 70, 229, 0.35) !important;
    }

    .know-tab-btn.inactive {
        background-color: #f8fafc !important;
        color: #64748b !important;
        border-color: #e2e8f0 !important;
    }

    .know-tab-btn.inactive:hover {
        background-color: #f1f5f9 !important;
        color: #0f172a !important;
        border-color: #cbd5e1 !important;
    }

    .know-editor-textarea {
        width: 100% !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 12px !important;
        padding: 12px 14px !important;
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace !important;
        font-size: 12.5px !important;
        line-height: 1.65 !important;
        color: #0f172a !important;
        background-color: #f8fafc !important;
        box-sizing: border-box !important;
        resize: vertical !important;
        min-height: 190px !important;
        transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease !important;
    }

    .know-editor-textarea:focus {
        background-color: #ffffff !important;
        border-color: #4f46e5 !important;
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.14) !important;
    }

    .quick-snippet-chip {
        display: inline-flex !important;
        align-items: center !important;
        gap: 4px !important;
        padding: 3px 8px !important;
        font-size: 10.5px !important;
        font-weight: 600 !important;
        border-radius: 6px !important;
        cursor: pointer !important;
        border: 1px solid #cbd5e1 !important;
        background-color: #ffffff !important;
        color: #334155 !important;
        transition: all 0.15s ease !important;
        user-select: none !important;
    }

    .quick-snippet-chip:hover {
        background-color: #eef2ff !important;
        border-color: #c7d2fe !important;
        color: #4338ca !important;
    }

    .quick-add-btn {
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    .quick-add-btn:hover {
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05) !important;
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
                        Sinkronisasi Standby
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

    <!-- Stat cards Bento Grid (1 Baris Horisontal Kesamping Penuh) -->
    <div style="display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 0.75rem; width: 100%;" class="w-full">
        <!-- Card 1: Total Klien Aktif -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-3 shadow-xs transition-all hover:shadow-md border border-outline-variant/60" style="min-width: 0;">
            <div class="absolute left-0 top-0 h-full w-1 bg-primary"></div>
            <div class="flex items-center justify-between gap-1">
                <span class="font-label-sm text-[11px] font-bold tracking-tight text-on-surface-variant truncate">Total Klien Chatbot</span>
                <div class="flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-lg bg-primary-fixed text-primary">
                    <span class="material-symbols-outlined text-[16px]">smart_toy</span>
                </div>
            </div>
            <div class="mt-1 flex items-baseline gap-1">
                <span class="font-display font-extrabold text-primary text-xl tracking-tight">{{ $totalClients }}</span>
                <span class="text-[11px] text-on-surface-variant font-medium">Klien</span>
            </div>
            <div class="mt-1 flex items-center justify-between text-[10px]">
                <span class="text-on-surface-variant truncate">Website aktif AI</span>
                <span class="rounded bg-surface-container-low px-1.5 py-0.2 font-bold text-on-surface-variant">Layer 4</span>
            </div>
        </div>

        <!-- Card 2: Klien Kritis (Upselling Lead) -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-3 shadow-xs transition-all hover:shadow-md border border-outline-variant/60" style="min-width: 0;">
            <div class="absolute left-0 top-0 h-full w-1 {{ $criticalCount > 0 ? 'bg-error' : 'bg-secondary' }}"></div>
            <div class="flex items-center justify-between gap-1">
                <span class="font-label-sm text-[11px] font-bold tracking-tight text-on-surface-variant truncate">Peluang Upselling</span>
                <div class="flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-lg {{ $criticalCount > 0 ? 'bg-error-container text-on-error-container' : 'bg-secondary-fixed text-secondary' }}">
                    <span class="material-symbols-outlined text-[16px]">trending_up</span>
                </div>
            </div>
            <div class="mt-1 flex items-baseline gap-1">
                <span class="font-display font-extrabold text-xl {{ $criticalCount > 0 ? 'text-error' : 'text-on-surface' }} tracking-tight">{{ $criticalCount }}</span>
                <span class="text-[11px] text-on-surface-variant font-medium">Kritis</span>
            </div>
            <div class="mt-1 flex items-center justify-between text-[10px]">
                <span class="inline-flex items-center gap-1 rounded bg-amber-100 px-1.5 py-0.2 font-bold text-amber-900">
                    <span class="h-1 w-1 animate-pulse rounded-full bg-amber-600"></span>{{ $warningCount }} Waspada
                </span>
                <span class="rounded bg-error-container px-1.5 py-0.2 font-bold text-on-error-container">
                    {{ $exhaustedCount }} Habis
                </span>
            </div>
        </div>

        <!-- Card 3: Konsumsi Pesan Global -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-3 shadow-xs transition-all hover:shadow-md border border-outline-variant/60" style="min-width: 0;">
            <div class="absolute left-0 top-0 h-full w-1 bg-secondary"></div>
            <div class="flex items-center justify-between gap-1">
                <span class="font-label-sm text-[11px] font-bold tracking-tight text-on-surface-variant truncate">Total Pesan Bulan Ini</span>
                <div class="flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-lg bg-secondary-fixed/40 text-secondary">
                    <span class="material-symbols-outlined text-[16px]">forum</span>
                </div>
            </div>
            <div class="mt-1 flex items-baseline gap-1">
                <span class="font-display font-extrabold text-primary text-xl tracking-tight">{{ number_format($totalUsedMessages, 0, ',', '.') }}</span>
                <span class="text-[11px] text-on-surface-variant font-medium">Pesan</span>
            </div>
            <div class="mt-1 flex items-center justify-between text-[10px]">
                <span class="tabular-nums text-on-surface-variant truncate">Kapasitas: {{ number_format($totalQuotaMessages, 0, ',', '.') }}</span>
                <span class="rounded bg-surface-container-low px-1.5 py-0.2 text-on-surface-variant font-bold">global</span>
            </div>
        </div>

        <!-- Card 4: Efisiensi Cache Semantik (Semantic Cache Hit Rate) -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-3 shadow-xs transition-all hover:shadow-md border border-outline-variant/60" style="min-width: 0;">
            <div class="absolute left-0 top-0 h-full w-1 bg-emerald-500"></div>
            <div class="flex items-center justify-between gap-1">
                <span class="font-label-sm text-[11px] font-bold tracking-tight text-on-surface-variant truncate">Cache Hit Semantik</span>
                <div class="flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-emerald-700">
                    <span class="material-symbols-outlined text-[16px]">bolt</span>
                </div>
            </div>
            <div class="mt-1 flex items-baseline gap-1">
                <span class="font-display font-extrabold text-emerald-600 text-xl tracking-tight">{{ $cacheStats['hit_ratio_percent'] ?? 68.4 }}%</span>
                <span class="text-[11px] text-on-surface-variant font-medium">Hit Rate</span>
            </div>
            <div class="mt-1 flex items-center justify-between text-[10px]">
                <span class="text-on-surface-variant truncate">Hemat {{ number_format($cacheStats['tokens_saved_estimate'] ?? 158200, 0, ',', '.') }} token</span>
                <span class="rounded bg-emerald-100 px-1.5 py-0.2 text-emerald-800 font-bold">&lt;20ms</span>
            </div>
        </div>

        <!-- Card 5: Jadwal Reset Siklus -->
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-3 shadow-xs transition-all hover:shadow-md border border-outline-variant/60" style="min-width: 0;">
            <div class="absolute left-0 top-0 h-full w-1 bg-tertiary"></div>
            <div class="flex items-center justify-between gap-1">
                <span class="font-label-sm text-[11px] font-bold tracking-tight text-on-surface-variant truncate">Siklus Reset Kuota</span>
                <div class="flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-lg bg-tertiary-fixed text-tertiary">
                    <span class="material-symbols-outlined text-[16px]">event_repeat</span>
                </div>
            </div>
            <div class="mt-1 flex items-baseline gap-1">
                <span class="font-display font-extrabold text-on-surface text-xl tracking-tight">{{ $daysUntilReset }}</span>
                <span class="text-[11px] text-on-surface-variant font-medium">Hari Tersisa</span>
            </div>
            <div class="mt-1 flex items-center justify-between text-[10px]">
                <span class="text-on-surface-variant truncate">Reset: {{ $resetDateFormatted }}</span>
                <span class="rounded bg-surface-container-low px-1.5 py-0.2 text-on-surface-variant font-bold">otomatis</span>
            </div>
        </div>
    </div>

    <!-- Search & Filter Bar (Identik dengan Admin Orders Toolbar) -->
    <div class="flex flex-col items-center justify-between gap-space-md rounded-xl bg-surface-container-lowest p-space-md shadow-sm lg:flex-row">
        <!-- Search Input Form -->
        <form method="GET" action="{{ route('admin.ai.index') }}" class="relative flex w-full items-center lg:w-80">
            @if ($statusFilter !== 'semua')
                <input type="hidden" name="status" value="{{ $statusFilter }}">
            @endif
            @if ($categoryFilter !== 'semua')
                <input type="hidden" name="kategori" value="{{ $categoryFilter }}">
            @endif
            <span class="material-symbols-outlined pointer-events-none absolute left-space-sm text-lg text-outline">search</span>
            <input aria-label="Cari klien atau bisnis" class="h-9 w-full rounded-lg bg-surface-container-low pl-9 pr-3 font-body-sm text-body-sm text-on-surface placeholder:text-outline transition-all focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/20" name="q" value="{{ $search }}" placeholder="Cari nama bisnis, klien, atau tenant ID..." type="text">
        </form>

        <!-- Filter Controls (Kategori Industri & Status Kuota) -->
        <div class="flex flex-wrap items-center gap-space-md w-full lg:w-auto justify-end">
            <!-- Filter Kategori Dropdown -->
            <div class="flex items-center gap-1.5">
                <span class="font-caption text-caption uppercase tracking-wider text-outline">Industri:</span>
                <select onchange="window.location.href=this.value" class="h-9 rounded-lg bg-surface-container-low px-2.5 font-body-sm text-body-sm text-on-surface border border-outline-variant/60 focus:outline-none focus:ring-2 focus:ring-primary/20 cursor-pointer">
                    <option value="{{ route('admin.ai.index', array_merge(request()->except('kategori'), ['kategori' => 'semua'])) }}" {{ $categoryFilter === 'semua' ? 'selected' : '' }}>Semua Industri</option>
                    @foreach ($categories as $cat)
                        <option value="{{ route('admin.ai.index', array_merge(request()->except('kategori'), ['kategori' => $cat])) }}" {{ strtolower($categoryFilter) === strtolower($cat) ? 'selected' : '' }}>
                            {{ ucwords($cat) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter Tabs -->
            <nav aria-label="Filter status kuota" class="flex flex-wrap items-center gap-space-xs">
                <span class="font-caption text-caption uppercase tracking-wider text-outline">Status:</span>
                
                <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $statusFilter === 'semua' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" href="{{ route('admin.ai.index', array_merge(request()->except('status'), ['status' => 'semua'])) }}">
                    Semua
                    <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $statusFilter === 'semua' ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $totalClients }}</span>
                </a>

                <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $statusFilter === 'kritis' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" href="{{ route('admin.ai.index', array_merge(request()->except('status'), ['status' => 'kritis'])) }}">
                    Kritis (≥80%)
                    <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $statusFilter === 'kritis' ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $criticalCount }}</span>
                </a>

                <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $statusFilter === 'waspada' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" href="{{ route('admin.ai.index', array_merge(request()->except('status'), ['status' => 'waspada'])) }}">
                    Waspada (80–99%)
                    <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $statusFilter === 'waspada' ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $warningCount }}</span>
                </a>

                <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $statusFilter === 'habis' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" href="{{ route('admin.ai.index', array_merge(request()->except('status'), ['status' => 'habis'])) }}">
                    Habis (100%)
                    <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $statusFilter === 'habis' ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $exhaustedCount }}</span>
                </a>
            </nav>
        </div>
    </div>

    <!-- Tabel Monitoring Kuota AI Klien -->
    <div class="overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="border-b border-surface-container bg-surface-container-low text-on-surface-variant">
                    <tr>
                        <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Klien &amp; Bisnis</th>
                        <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Template Website</th>
                        <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Paket AI</th>
                        <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4 min-w-[190px]">Konsumsi Pesan</th>
                        <th class="px-3 py-space-sm text-center font-label-sm text-label-sm font-bold md:px-4">Status</th>
                        <th class="px-3 py-space-sm text-center font-label-sm text-label-sm font-bold md:px-4 w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container font-body-sm text-body-sm text-on-surface">
                    @forelse ($filteredClients as $client)
                        @php
                            $p = $client['percentage'];
                            $barClass = $p >= 100 ? 'bg-error' : ($p >= 80 ? 'bg-amber-500' : 'bg-secondary');
                            if ($client['is_exhausted'] || $client['is_warning']) {
                                $waMessage = "Halo {$client['client_name']}, kuota AI Chatbot website {$client['business_name']} Anda tersisa {$client['remaining_messages']} pesan. Untuk memastikan chatbot tetap melayani pelanggan Anda 24/7, silakan lakukan top-up kuota atau upgrade paket di Portal Konsumen Anda.";
                            } else {
                                $waMessage = "Halo Kak {$client['client_name']}, kami dari Tim Webia ingin menginfokan bahwa kuota chatbot AI website {$client['business_name']} saat ini telah terpakai {$p}% ({$client['used_messages']}/{$client['monthly_quota']} pesan).

Apakah ingin tambah kuota atau upgrade paket website agar chatbot tetap aktif melayani pengunjung?";
                            }
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
                                        <div class="flex items-center gap-1.5">
                                            <span class="truncate font-label-md text-label-md font-semibold text-on-surface">{{ $client['business_name'] }}</span>
                                            @if (!empty($client['order']?->site_slug))
                                                <a href="{{ route('sites.show', ['order' => $client['order']->site_slug]) }}" target="_blank" rel="noopener" title="Buka Live Website Klien" class="inline-flex items-center text-outline hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-[15px]">open_in_new</span>
                                                </a>
                                            @endif
                                        </div>
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

                            <!-- Aksi: Cuma 2 Tombol (Chat & Aksi Pop-up) -->
                            <td class="px-3 py-3.5 text-center md:px-4">
                                <div class="inline-flex items-center justify-center gap-1.5">
                                    <!-- 1. Tombol Chat WhatsApp Langsung -->
                                    <a href="{{ $waUrl }}" target="_blank"
                                       title="{{ $client['is_exhausted'] || $client['is_warning'] ? 'Kirim Reminder Kuota via WhatsApp' : 'Kirim Pesan WhatsApp Sales' }}"
                                       class="inline-flex h-8 items-center gap-1 rounded-lg {{ $client['is_exhausted'] ? 'bg-error text-on-error hover:bg-error/90' : ($client['is_warning'] ? 'bg-amber-600 text-white hover:bg-amber-700' : 'bg-emerald-600 text-white hover:bg-emerald-700') }} px-2.5 font-label-sm text-xs font-bold shadow-xs transition-all">
                                        <span class="material-symbols-outlined text-[16px]">{{ $client['is_exhausted'] ? 'notification_important' : ($client['is_warning'] ? 'notifications_active' : 'chat') }}</span>
                                        <span>Chat</span>
                                    </a>

                                    <!-- 2. Tombol Aksi (Membuka Pop-up Opsi Lengkap) -->
                                    <button type="button"
                                        data-action-btn
                                        data-tenant-id="{{ $client['tenant_id'] }}"
                                        data-tenant-name="{{ $client['business_name'] }}"
                                        data-client-name="{{ $client['client_name'] }}"
                                        data-client-email="{{ $client['client_email'] }}"
                                        data-package-tier="{{ $client['package_tier'] }}"
                                        data-monthly-quota="{{ $client['monthly_quota'] }}"
                                        data-used-messages="{{ $client['used_messages'] }}"
                                        data-remaining-messages="{{ $client['remaining_messages'] }}"
                                        data-percentage="{{ round($p, 1) }}"
                                        data-wa-url="{{ $waUrl }}"
                                        data-order-url="{{ $client['order'] ? route('admin.orders.show', $client['order']) : '' }}"
                                        data-order-number="{{ $client['order'] ? $client['order']->order_number : '' }}"
                                        onclick="openClientActionPopup(this, event)"
                                        title="Buka Pilihan Aksi Klien"
                                        class="inline-flex h-8 items-center gap-1 rounded-lg border border-outline-variant bg-surface-container-lowest px-2.5 font-label-sm text-xs font-bold text-on-surface hover:border-primary hover:text-primary hover:bg-surface-container-low transition-all cursor-pointer">
                                        <span>Aksi</span>
                                        <span class="material-symbols-outlined text-[16px]">more_vert</span>
                                    </button>
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

<!-- Floating Pop-up Dropdown Menu Aksi (Kompak & Menempel di Tombol) -->
<div id="clientActionDropdown" class="hidden fixed z-[9999]" style="display: none;">
    <!-- Mini Header Info Klien -->
    <div style="padding: 8px 10px; margin-bottom: 5px; background: #f8fafc; border-radius: 9px; border: 1px solid #f1f5f9;">
        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
            <div id="dropTenantName" style="font-weight: 700; font-size: 12.5px; color: #0f172a; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Nama Bisnis</div>
            <span id="dropTierBadge" style="font-size: 9.5px; font-weight: 800; padding: 2px 6px; border-radius: 5px; background: #e0e7ff; color: #3730a3; text-transform: uppercase;">PIXEL</span>
        </div>
        <div style="display: flex; align-items: center; gap: 5px; margin-top: 2px; font-size: 10.5px; color: #64748b;">
            <span style="font-family: monospace; font-weight: 600; color: #4f46e5;" id="dropTenantId">tenant_id</span>
        </div>
    </div>

    <!-- Opsi Tindakan Cepat -->
    <div style="display: flex; flex-direction: column; gap: 2px;">
        <!-- Opsi 1: Kelola Pengetahuan AI -->
        <button type="button" onclick="triggerActionKnowledge()" class="dropdown-action-btn">
            <div class="btn-icon-box" style="background: #eef2ff; color: #4f46e5;">
                <span class="material-symbols-outlined" style="font-size: 17px;">psychology</span>
            </div>
            <div class="btn-text-content">
                <span class="btn-title">Kelola Pengetahuan AI</span>
                <span class="btn-desc">Profil, Layanan &amp; FAQ Resmi</span>
            </div>
            <span class="material-symbols-outlined" style="font-size: 16px; color: #94a3b8;">chevron_right</span>
        </button>

        <!-- Opsi 2: Ubah Paket & Kuota -->
        <button type="button" onclick="triggerActionTier()" class="dropdown-action-btn">
            <div class="btn-icon-box" style="background: #fef3c7; color: #d97706;">
                <span class="material-symbols-outlined" style="font-size: 17px;">tune</span>
            </div>
            <div class="btn-text-content">
                <span class="btn-title">Ubah Paket &amp; Kuota</span>
                <span class="btn-desc">Upgrade tier atau top-up pesan</span>
            </div>
            <span class="material-symbols-outlined" style="font-size: 16px; color: #94a3b8;">chevron_right</span>
        </button>

        <!-- Opsi 3: Detail Pesanan Webia -->
        <div id="dropOrderContainer">
            <a id="dropOrderLink" href="#" onclick="closeClientActionDropdown()" class="dropdown-action-btn">
                <div class="btn-icon-box" style="background: #f0f9ff; color: #0284c7;">
                    <span class="material-symbols-outlined" style="font-size: 17px;">receipt_long</span>
                </div>
                <div class="btn-text-content">
                    <span class="btn-title" id="dropOrderText">Detail Pesanan</span>
                    <span class="btn-desc">Rincian invoice &amp; hosting</span>
                </div>
                <span class="material-symbols-outlined" style="font-size: 16px; color: #94a3b8;">chevron_right</span>
            </a>
        </div>

        <div style="height: 1px; background: #f1f5f9; margin: 3px 6px;"></div>

        <!-- Opsi 4: Kirim WhatsApp -->
        <a id="dropWaLink" href="#" target="_blank" onclick="closeClientActionDropdown()" class="dropdown-action-btn" onmouseover="this.style.backgroundColor='#ecfdf5'" onmouseout="this.style.backgroundColor='transparent'">
            <div class="btn-icon-box" style="background: #ecfdf5; color: #059669;">
                <span class="material-symbols-outlined" style="font-size: 17px;">chat</span>
            </div>
            <div class="btn-text-content">
                <span class="btn-title" style="color: #059669;">Kirim WhatsApp</span>
                <span class="btn-desc" style="color: #047857;">Hubungi klien langsung</span>
            </div>
            <span class="material-symbols-outlined" style="font-size: 16px; color: #10b981;">open_in_new</span>
        </a>
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
                            <span class="block font-bold">+500 Pesan</span>
                            <span class="text-[10px] text-on-surface-variant font-normal">Rp49.000</span>
                        </button>
                        <button type="button" id="btn-add-1000" onclick="applyAddQuota(1000)" class="quick-add-btn cursor-pointer py-2 px-2 text-xs font-bold rounded-xl border border-outline-variant bg-surface-container-low hover:border-primary hover:bg-primary/5 transition-all text-on-surface text-center flex flex-col items-center justify-center">
                            <span class="block font-bold">+1.000 Pesan</span>
                            <span class="text-[10px] text-on-surface-variant font-normal">Rp89.000</span>
                        </button>
                        <button type="button" id="btn-add-2500" onclick="applyAddQuota(2500)" class="quick-add-btn cursor-pointer py-2 px-2 text-xs font-bold rounded-xl border border-outline-variant bg-surface-container-low hover:border-primary hover:bg-primary/5 transition-all text-on-surface text-center flex flex-col items-center justify-center">
                            <span class="block font-bold">+2.500 Pesan</span>
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

<!-- Modal Dialog: Kelola Pengetahuan AI Bisnis (Upgraded Clean UI/UX) -->
<div id="knowledgeModal" class="fixed inset-0 z-[70] hidden items-center justify-center p-3 md:p-6 bg-slate-900/60 backdrop-blur-sm">
    <div class="knowledge-modal-card animate-in fade-in zoom-in-95 duration-150" style="max-width: 620px; width: 100%;">
        {{-- Header Modal --}}
        <div class="flex items-center justify-between border-b border-surface-container px-5 py-3 bg-surface-container-lowest">
            <div class="flex items-center gap-2.5">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-primary/10 text-primary shrink-0">
                    <span class="material-symbols-outlined text-xl">psychology</span>
                </div>
                <div>
                    <h3 class="font-headline-sm text-sm font-bold text-on-surface">Kelola Pengetahuan AI Bisnis</h3>
                    <p class="font-caption text-[11px] text-on-surface-variant">Pusat data kecerdasan buatan untuk chatbot website klien</p>
                </div>
            </div>
            <button type="button" onclick="closeKnowledgeModal()" class="cursor-pointer text-on-surface-variant hover:text-on-surface font-bold text-xl w-7 h-7 rounded-lg flex items-center justify-center hover:bg-surface-container-low transition-colors">&times;</button>
        </div>

        {{-- Hero Strip Info Tenant & Status --}}
        <div class="px-5 py-2.5 bg-gradient-to-r from-slate-50 via-indigo-50/20 to-slate-50 border-b border-surface-container flex flex-wrap items-center justify-between gap-2 text-xs">
            <div class="flex items-center gap-2 min-w-0">
                <div class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[15px]">storefront</span>
                </div>
                <div class="min-w-0">
                    <span id="knowTenantName" class="font-bold text-on-surface truncate text-xs block"></span>
                    <span id="knowTenantId" class="font-mono text-[10px] font-bold text-primary"></span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span id="knowCurrentTierBadge" class="rounded-full bg-white border border-outline-variant px-2 py-0.5 text-[10.5px] font-bold text-on-surface-variant shadow-2xs"></span>
                <button type="button" onclick="openTierFromKnowledge()" class="text-[10.5px] font-bold text-primary hover:underline cursor-pointer flex items-center gap-1 bg-primary/5 hover:bg-primary/10 px-2 py-0.5 rounded-md transition-colors">
                    <span class="material-symbols-outlined text-[12px]">tune</span> Ubah Paket &rarr;
                </button>
            </div>
        </div>

        {{-- Loading State --}}
        <div id="knowLoading" class="py-12 flex flex-col items-center justify-center gap-2">
            <div class="h-7 w-7 animate-spin rounded-full border-2 border-primary border-t-transparent"></div>
            <span class="text-xs text-on-surface-variant font-medium">Memuat berkas knowledge base &amp; data AI...</span>
        </div>

        {{-- Content Area --}}
        <div id="knowContent" class="hidden flex-1 overflow-y-auto px-5 py-3 space-y-3">
            {{-- Modern Segmented Tab Bar (5 Tabs) --}}
            <div class="flex gap-1.5 pb-2 overflow-x-auto border-b border-surface-container">
                <button type="button" id="tabBtnProfil" onclick="switchKnowTab('profil')" class="know-tab-btn active">
                    <span class="material-symbols-outlined text-[15px]">storefront</span> Profil Usaha
                </button>
                <button type="button" id="tabBtnLayanan" onclick="switchKnowTab('layanan')" class="know-tab-btn inactive">
                    <span class="material-symbols-outlined text-[15px]">inventory_2</span> Layanan &amp; Harga
                </button>
                <button type="button" id="tabBtnKebijakan" onclick="switchKnowTab('kebijakan')" class="know-tab-btn inactive">
                    <span class="material-symbols-outlined text-[15px]">gavel</span> Kebijakan Layanan
                </button>
                <button type="button" id="tabBtnFaq" onclick="switchKnowTab('faq')" class="know-tab-btn inactive">
                    <span class="material-symbols-outlined text-[15px]">quiz</span> FAQ Resmi
                </button>
                <button type="button" id="tabBtnUnanswered" onclick="switchKnowTab('unanswered')" class="know-tab-btn inactive">
                    <span class="material-symbols-outlined text-[15px] text-amber-500">help_center</span>
                    <span>Pertanyaan Pengunjung</span>
                    <span id="unansweredCountPill" class="hidden rounded-full bg-amber-500 text-white px-1.5 py-0.1 text-[9px] font-bold">0</span>
                </button>
            </div>

            {{-- Tab 1: Profil --}}
            <div id="tabPanelProfil" class="space-y-2">
                {{-- Smart Workspace Control Bar --}}
                <div class="flex items-center justify-between flex-wrap gap-2 p-2.5 rounded-xl bg-blue-50/70 border border-blue-200/60 text-xs">
                    <div class="flex items-center gap-1.5">
                        <span class="font-mono text-[11px] font-bold text-blue-900 bg-blue-100/80 px-2 py-0.5 rounded">📄 profil.md</span>
                        <span class="text-blue-800 text-[11.5px]">Identitas usaha, alamat cabang, jam operasional, dan sapaan bot.</span>
                    </div>
                    <div class="flex items-center gap-1 flex-wrap">
                        <button type="button" onclick="insertSnippet('knowProfilInput', 'charCountProfil', '- **Sapaan**: Halo! Senang Anda mampir ke website kami. Ada yang bisa kami bantu? 😊')" class="quick-snippet-chip">
                            + Sapaan
                        </button>
                        <button type="button" onclick="insertSnippet('knowProfilInput', 'charCountProfil', '- **Jam Operasional**: Senin – Sabtu: 08.00 – 21.00 WIB, Minggu: Tutup')" class="quick-snippet-chip">
                            + Jam Buka
                        </button>
                        <button type="button" onclick="insertSnippet('knowProfilInput', 'charCountProfil', '- **Alamat**: Jl. Contoh No. 123, Kota Surabaya (Patokan: Depan Alun-Alun)')" class="quick-snippet-chip">
                            + Alamat
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <textarea id="knowProfilInput" rows="7" oninput="updateCharCount('knowProfilInput', 'charCountProfil')" class="know-editor-textarea" placeholder="Contoh: Toko Roti Syifa adalah toko roti keluarga sejak 2018..."></textarea>
                    <div class="flex justify-between items-center mt-1">
                        <span class="text-[10px] text-slate-400">Gunakan format markdown `- **Label**: Nilai` untuk hasil RAG AI terbaik.</span>
                        <div id="charCountProfil" class="text-[10.5px] text-slate-500 font-mono">0 karakter</div>
                    </div>
                </div>
            </div>

            {{-- Tab 2: Layanan --}}
            <div id="tabPanelLayanan" class="space-y-2 hidden">
                {{-- Smart Workspace Control Bar --}}
                <div class="flex items-center justify-between flex-wrap gap-2 p-2.5 rounded-xl bg-indigo-50/70 border border-indigo-200/60 text-xs">
                    <div class="flex items-center gap-1.5">
                        <span class="font-mono text-[11px] font-bold text-indigo-900 bg-indigo-100/80 px-2 py-0.5 rounded">📄 layanan.md</span>
                        <span class="text-indigo-800 text-[11.5px]">Katalog produk, daftar harga, dan paket layanan unggulan.</span>
                    </div>
                    <div class="flex items-center gap-1 flex-wrap">
                        <button type="button" onclick="insertSnippet('knowLayananInput', 'charCountLayanan', '### Paket Layanan &amp; Tarif\n- **Paket Standar**: Rp150.000 (Konsultasi &amp; Pengerjaan Cepat)\n- **Paket Lengkap**: Rp350.000 (Semua Fitur + Garansi 1 Bulan)')" class="quick-snippet-chip">
                            + Format Tarif
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <textarea id="knowLayananInput" rows="7" oninput="updateCharCount('knowLayananInput', 'charCountLayanan')" class="know-editor-textarea" placeholder="Contoh: Paket Website Personal Rp499.000..."></textarea>
                    <div class="flex justify-between items-center mt-1">
                        <span class="text-[10px] text-slate-400">Rincian harga mempermudah bot merespon saat calon pelanggan bertanya tarif.</span>
                        <div id="charCountLayanan" class="text-[10.5px] text-slate-500 font-mono">0 karakter</div>
                    </div>
                </div>
            </div>

            {{-- Tab 3: Kebijakan --}}
            <div id="tabPanelKebijakan" class="space-y-2 hidden">
                {{-- Smart Workspace Control Bar --}}
                <div class="flex items-center justify-between flex-wrap gap-2 p-2.5 rounded-xl bg-emerald-50/70 border border-emerald-200/60 text-xs">
                    <div class="flex items-center gap-1.5">
                        <span class="font-mono text-[11px] font-bold text-emerald-900 bg-emerald-100/80 px-2 py-0.5 rounded">📄 kebijakan.md</span>
                        <span class="text-emerald-800 text-[11.5px]">Ketentuan pemesanan, proses refund, syarat DP, dan garansi.</span>
                    </div>
                    <div class="flex items-center gap-1 flex-wrap">
                        <button type="button" onclick="insertSnippet('knowKebijakanInput', 'charCountKebijakan', '### Ketentuan Pemesanan &amp; Pembayaran\n- Pembayaran DP minimal 50% di awal sebelum pesanan diproses.\n- Pelunasan dilakukan setelah pekerjaan selesai terverifikasi.')" class="quick-snippet-chip">
                            + Format Pembayaran
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <textarea id="knowKebijakanInput" rows="7" oninput="updateCharCount('knowKebijakanInput', 'charCountKebijakan')" class="know-editor-textarea" placeholder="Contoh: Pembayaran DP minimal 50%, sisa dilunasi setelah..."></textarea>
                    <div class="flex justify-between items-center mt-1">
                        <span class="text-[10px] text-slate-400">Bot akan merujuk kebijakan ini untuk menjawab pertanyaan syarat dan komplain.</span>
                        <div id="charCountKebijakan" class="text-[10.5px] text-slate-500 font-mono">0 karakter</div>
                    </div>
                </div>
            </div>

            {{-- Tab 4: FAQ --}}
            <div id="tabPanelFaq" class="space-y-2 hidden">
                {{-- Smart Workspace Control Bar --}}
                <div class="flex items-center justify-between flex-wrap gap-2 p-2.5 rounded-xl bg-purple-50/70 border border-purple-200/60 text-xs">
                    <div class="flex items-center gap-1.5">
                        <span class="font-mono text-[11px] font-bold text-purple-900 bg-purple-100/80 px-2 py-0.5 rounded">📄 faq.md</span>
                        <span class="text-purple-800 text-[11.5px]">Tanya-Jawab resmi yang dijawab instan via Semantic Cache (&lt;20ms).</span>
                    </div>
                    <div class="flex items-center gap-1 flex-wrap">
                        <button type="button" onclick="insertFaqTemplate()" class="quick-snippet-chip font-bold text-primary">
                            <span class="material-symbols-outlined text-[12px]">add</span> + Tambah Q&amp;A
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <textarea id="knowFaqInput" rows="7" oninput="updateCharCount('knowFaqInput', 'charCountFaq')" placeholder="Q: Apakah melayani konsultasi gratis?&#10;A: Ya, kami menyediakan konsultasi gratis melalui WhatsApp kami." class="know-editor-textarea"></textarea>
                    <div class="flex justify-between items-center mt-1">
                        <span class="text-[10px] text-slate-400">Format: Baris `Q: [Pertanyaan]` diikuti baris `A: [Jawaban]`.</span>
                        <div id="charCountFaq" class="text-[10.5px] text-slate-500 font-mono">0 karakter</div>
                    </div>
                </div>
            </div>

            {{-- Tab 5: Pertanyaan Pengunjung Belum Terjawab --}}
            <div id="tabPanelUnanswered" class="space-y-2.5 hidden">
                <div class="rounded-xl bg-amber-500/10 border border-amber-500/20 p-3 text-xs text-amber-900 flex items-start gap-2.5">
                    <span class="material-symbols-outlined text-lg text-amber-600 shrink-0 mt-0.5">lightbulb</span>
                    <div>
                        <strong class="block mb-0.5 font-bold">Peluang Penyempurnaan Knowledge Base:</strong>
                        <span class="text-amber-800 leading-relaxed">Pertanyaan di bawah diajukan oleh calon pelanggan namun memicu *fallback* / belum ada di database bot. Klik <strong>"Jadikan FAQ"</strong> untuk langsung memasukkannya ke daftar FAQ resmi.</span>
                    </div>
                </div>
                <div id="unansweredListContainer" class="space-y-2 max-h-[260px] overflow-y-auto pr-1">
                    {{-- Dinamis via JS --}}
                </div>
            </div>

            {{-- Status simpan alert --}}
            <div id="knowSaveStatus" class="hidden rounded-xl p-3 text-xs font-bold transition-all shadow-xs"></div>
        </div>

        {{-- Footer Modal --}}
        <div class="px-6 py-3.5 border-t border-surface-container bg-surface-container-lowest flex justify-between items-center text-xs">
            <span class="text-on-surface-variant flex items-center gap-1.5 text-[11px] font-medium">
                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Tersinkronisasi otomatis ke FAISS Vector Engine
            </span>
            <div class="flex items-center gap-2">
                <button type="button" onclick="closeKnowledgeModal()" class="cursor-pointer rounded-xl border border-outline-variant px-4 py-2 text-xs font-bold text-on-surface-variant hover:bg-surface-container-low transition-colors">
                    Tutup
                </button>
                <button type="button" id="btnSaveKnowledge" onclick="saveKnowledgeData()" class="cursor-pointer rounded-xl bg-primary px-4 py-2 text-xs font-bold text-on-primary shadow-sm hover:bg-primary/90 flex items-center gap-1.5 transition-all">
                    <span class="material-symbols-outlined text-[16px]">save</span>
                    Simpan Knowledge Base
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let activeClientQuota = 500;
    let selectedQuickAdd = null;
    let activeKnowledgeTenantId = null;
    let activeKnowledgeTier = 'pixel';
    let activeActionClient = null;

    const TIER_DEFAULT_QUOTAS = {
        'pixel': 500,
        'pulse': 1500,
        'nexus': 2500,
        'infinity': 5000
    };

    // ==================== ACTION DROPDOWN SCRIPT (KOMPAK & MENEMPEL) ====================
    let activeActionButton = null;

    window.openClientActionPopup = function(buttonEl, evt) {
        const ev = evt || window.event;
        if (ev) {
            ev.preventDefault();
            ev.stopPropagation();
        }

        const dropdown = document.getElementById('clientActionDropdown');
        if (!dropdown) return;

        // Toggle tutup jika mengklik tombol yang sama saat sedang terbuka
        if (activeActionButton === buttonEl && dropdown.style.display === 'block') {
            closeClientActionDropdown();
            return;
        }

        activeActionButton = buttonEl;
        const d = buttonEl.dataset;
        activeActionClient = {
            tenantId: d.tenantId,
            tenantName: d.tenantName,
            packageTier: d.packageTier || 'pixel',
            monthlyQuota: parseInt(d.monthlyQuota) || 500,
            waUrl: d.waUrl || '#',
            orderUrl: d.orderUrl || '',
            orderNumber: d.orderNumber || ''
        };

        // Isi data mini header dropdown
        document.getElementById('dropTenantName').innerText = activeActionClient.tenantName || activeActionClient.tenantId;
        document.getElementById('dropTenantId').innerText = activeActionClient.tenantId;
        document.getElementById('dropTierBadge').innerText = activeActionClient.packageTier.toUpperCase();
        document.getElementById('dropWaLink').href = activeActionClient.waUrl;

        const orderLink = document.getElementById('dropOrderLink');
        const orderText = document.getElementById('dropOrderText');
        if (orderLink && orderText) {
            if (activeActionClient.orderUrl) {
                orderLink.href = activeActionClient.orderUrl;
                orderLink.classList.remove('opacity-40', 'pointer-events-none');
                orderText.innerText = `Pesanan #${activeActionClient.orderNumber}`;
            } else {
                orderLink.href = '#';
                orderLink.classList.add('opacity-40', 'pointer-events-none');
                orderText.innerText = 'Tidak Ada Pesanan';
            }
        }

        // Tampilkan sementara secara transparan untuk mengukur tinggi aslinya
        dropdown.style.visibility = 'hidden';
        dropdown.style.display = 'block';
        dropdown.classList.remove('hidden');

        // Hitung posisi mengambang (floating) tepat di bawah tombol aksi
        const rect = buttonEl.getBoundingClientRect();
        const dropHeight = dropdown.offsetHeight || 220;
        let top = rect.bottom + 6;
        let right = Math.max(10, window.innerWidth - rect.right);

        // Jika terpotong di bagian bawah layar, posisikan ke atas tombol
        if (top + dropHeight > window.innerHeight && rect.top - dropHeight > 10) {
            top = Math.max(10, rect.top - dropHeight - 6);
        }

        dropdown.style.top = `${top}px`;
        dropdown.style.right = `${right}px`;
        dropdown.style.left = 'auto';
        dropdown.style.visibility = 'visible';
    };

    window.closeClientActionDropdown = function() {
        const dropdown = document.getElementById('clientActionDropdown');
        if (dropdown) {
            dropdown.style.display = 'none';
            dropdown.style.visibility = 'hidden';
            dropdown.classList.add('hidden');
        }
        activeActionButton = null;
    };

    window.triggerActionKnowledge = function() {
        if (!activeActionClient) return;
        const c = activeActionClient;
        closeClientActionDropdown();
        openKnowledgeModal(c.tenantId, c.tenantName, c.packageTier, c.monthlyQuota);
    };

    window.triggerActionTier = function() {
        if (!activeActionClient) return;
        const c = activeActionClient;
        closeClientActionDropdown();
        openTierModal(c.tenantId, c.tenantName, c.packageTier, c.monthlyQuota);
    };

    window.openTierFromKnowledge = function() {
        if (!activeKnowledgeTenantId) return;
        const tId = activeKnowledgeTenantId;
        const tName = document.getElementById('knowTenantName')?.innerText || tId;
        const tTier = activeKnowledgeTier;
        const tQuota = activeClientQuota;
        closeKnowledgeModal();
        setTimeout(() => {
            openTierModal(tId, tName, tTier, tQuota);
        }, 150);
    };

    // ==================== TIER & QUOTA MODAL SCRIPT ====================
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

    // ==================== KNOWLEDGE MODAL SCRIPT ====================
    function updateCharCount(inputId, labelId) {
        const input = document.getElementById(inputId);
        const label = document.getElementById(labelId);
        if (!input || !label) return;
        const len = input.value.length;
        const words = input.value.trim() ? input.value.trim().split(/\s+/).length : 0;
        label.innerText = `${len.toLocaleString('id-ID')} karakter · ${words.toLocaleString('id-ID')} kata`;
    }

    window.insertSnippet = function(textareaId, counterId, snippet) {
        const input = document.getElementById(textareaId);
        if (!input) return;
        const currentVal = input.value.trim();
        input.value = currentVal ? (currentVal + "\n\n" + snippet) : snippet;
        updateCharCount(textareaId, counterId);
        input.focus();
        input.setSelectionRange(input.value.length, input.value.length);
    };

    function insertFaqTemplate() {
        const input = document.getElementById('knowFaqInput');
        if (!input) return;
        const template = `\n\nQ: [Tulis pertanyaan baru di sini]\nA: [Tulis jawaban resmi di sini]`;
        input.value = (input.value.trim() ? input.value.trim() : "") + template;
        updateCharCount('knowFaqInput', 'charCountFaq');
        input.focus();
        input.setSelectionRange(input.value.length, input.value.length);
    }

    window.openKnowledgeModal = function(tenantId, tenantName, currentTier, currentQuota) {
        activeKnowledgeTenantId = tenantId;
        activeKnowledgeTier = (currentTier || 'pixel').toLowerCase();
        activeClientQuota = parseInt(currentQuota) || 500;

        const modal = document.getElementById('knowledgeModal');
        const nameEl = document.getElementById('knowTenantName');
        const idEl = document.getElementById('knowTenantId');
        const tierBadgeEl = document.getElementById('knowCurrentTierBadge');
        const loadingEl = document.getElementById('knowLoading');
        const contentEl = document.getElementById('knowContent');
        const statusEl = document.getElementById('knowSaveStatus');

        if (!modal) return;

        if (nameEl) nameEl.innerText = tenantName || tenantId;
        if (idEl) idEl.innerText = tenantId;
        if (tierBadgeEl) tierBadgeEl.innerText = `Paket: ${activeKnowledgeTier.toUpperCase()} (${activeClientQuota.toLocaleString('id-ID')} pesan/bln)`;
        if (statusEl) {
            statusEl.className = 'hidden';
            statusEl.innerText = '';
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.toggle('overflow-hidden', true);

        loadingEl.classList.remove('hidden');
        contentEl.classList.add('hidden');

        switchKnowTab('profil');

        // Fetch Unanswered Queries
        const unansContainer = document.getElementById('unansweredListContainer');
        const unansPill = document.getElementById('unansweredCountPill');
        if (unansContainer) {
            unansContainer.innerHTML = '<div class="py-4 text-center text-xs text-on-surface-variant">Memuat pertanyaan yang belum terjawab...</div>';
            fetch(`/admin/ai-quotas/${encodeURIComponent(tenantId)}/unanswered`)
                .then(r => r.json())
                .then(uData => {
                    const list = uData.unanswered_queries || [];
                    if (unansPill) {
                        if (list.length > 0) {
                            unansPill.innerText = list.length;
                            unansPill.classList.remove('hidden');
                        } else {
                            unansPill.classList.add('hidden');
                        }
                    }

                    if (list.length === 0) {
                        unansContainer.innerHTML = '<div class="py-8 text-center text-xs text-on-surface-variant flex flex-col items-center gap-1.5"><span class="material-symbols-outlined text-2xl text-emerald-600">verified</span><span>Tidak ada pertanyaan yang belum terjawab. Bot melayani semua topik pengunjung dengan baik!</span></div>';
                        return;
                    }

                    let html = '';
                    list.forEach(item => {
                        const safeQ = item.question.replace(/'/g, "\\'");
                        html += `
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-outline-variant/80 bg-surface-container-lowest hover:border-primary/40 hover:bg-surface-container-low transition-all shadow-2xs">
                                <div class="min-w-0 pr-3 flex items-start gap-2.5">
                                    <div class="w-7 h-7 rounded-lg bg-amber-500/10 text-amber-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <span class="material-symbols-outlined text-[16px]">chat_bubble</span>
                                    </div>
                                    <div>
                                        <strong class="text-xs text-on-surface block leading-snug font-bold">${item.question}</strong>
                                        <span class="inline-flex items-center gap-1.5 text-[10.5px] text-amber-900 font-semibold mt-1 bg-amber-500/15 px-2 py-0.5 rounded-md">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span> Ditanyakan ${item.count}x oleh pengunjung
                                        </span>
                                    </div>
                                </div>
                                <button type="button" onclick="adoptAsFaq('${safeQ}')" class="shrink-0 cursor-pointer text-xs font-bold text-primary bg-primary/10 hover:bg-primary hover:text-on-primary px-3 py-1.5 rounded-xl transition-all flex items-center gap-1 shadow-2xs hover:shadow-xs">
                                    <span class="material-symbols-outlined text-[15px]">add_circle</span> Jadikan FAQ
                                </button>
                            </div>
                        `;
                    });
                    unansContainer.innerHTML = html;
                })
                .catch(() => {
                    unansContainer.innerHTML = '<div class="py-4 text-center text-xs text-error">Gagal memuat pertanyaan belum terjawab.</div>';
                });
        }

        // Fetch Knowledge Base
        fetch(`/admin/ai-quotas/${encodeURIComponent(tenantId)}/knowledge`)
            .then(res => res.json())
            .then(data => {
                loadingEl.classList.add('hidden');
                contentEl.classList.remove('hidden');

                const k = data.knowledge || {};
                document.getElementById('knowProfilInput').value = k.profil || '';
                document.getElementById('knowLayananInput').value = k.layanan || '';
                document.getElementById('knowKebijakanInput').value = k.kebijakan || '';

                let faqStr = '';
                if (Array.isArray(k.faq)) {
                    faqStr = k.faq.map(item => `Q: ${item.tanya}\nA: ${item.jawab}`).join('\n\n');
                } else if (typeof k.faq === 'string') {
                    faqStr = k.faq;
                }
                document.getElementById('knowFaqInput').value = faqStr;

                updateCharCount('knowProfilInput', 'charCountProfil');
                updateCharCount('knowLayananInput', 'charCountLayanan');
                updateCharCount('knowKebijakanInput', 'charCountKebijakan');
                updateCharCount('knowFaqInput', 'charCountFaq');
            })
            .catch(err => {
                loadingEl.classList.add('hidden');
                contentEl.classList.remove('hidden');
                if (statusEl) {
                    statusEl.className = 'rounded-lg p-3 text-xs font-bold bg-error-container text-on-error-container block';
                    statusEl.innerText = 'Gagal memuat berkas knowledge base: ' + err.message;
                }
            });
    };

    window.switchKnowTab = function(tabName) {
        const tabs = ['profil', 'layanan', 'kebijakan', 'faq', 'unanswered'];
        tabs.forEach(t => {
            const btn = document.getElementById('tabBtn' + t.charAt(0).toUpperCase() + t.slice(1));
            const panel = document.getElementById('tabPanel' + t.charAt(0).toUpperCase() + t.slice(1));
            if (!btn || !panel) return;
            if (t === tabName) {
                btn.className = 'know-tab-btn active';
                panel.classList.remove('hidden');
            } else {
                btn.className = 'know-tab-btn inactive';
                panel.classList.add('hidden');
            }
        });
    };

    window.saveKnowledgeData = function() {
        if (!activeKnowledgeTenantId) return;
        const btn = document.getElementById('btnSaveKnowledge');
        const statusEl = document.getElementById('knowSaveStatus');
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined text-[18px] animate-spin">refresh</span> Menyimpan...';

        const payload = {
            profil: document.getElementById('knowProfilInput').value,
            layanan: document.getElementById('knowLayananInput').value,
            kebijakan: document.getElementById('knowKebijakanInput').value,
            faq: document.getElementById('knowFaqInput').value,
        };

        fetch(`/admin/ai-quotas/${encodeURIComponent(activeKnowledgeTenantId)}/knowledge`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
            },
            body: JSON.stringify(payload),
        })
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            btn.innerHTML = '<span class="material-symbols-outlined text-[18px]">save</span> Simpan Knowledge Base';

            if (statusEl) {
                statusEl.className = 'rounded-lg p-3 text-xs font-bold bg-secondary-fixed text-on-secondary-fixed block';
                statusEl.innerText = 'Knowledge base AI berhasil diperbarui dan re-indexing FAISS sukses!';
                setTimeout(() => {
                    statusEl.classList.add('hidden');
                }, 4000);
            }
        })
        .catch(err => {
            btn.disabled = false;
            btn.innerHTML = '<span class="material-symbols-outlined text-[18px]">save</span> Simpan Knowledge Base';

            if (statusEl) {
                statusEl.className = 'rounded-lg p-3 text-xs font-bold bg-error-container text-on-error-container block';
                statusEl.innerText = 'Gagal menyimpan perubahan: ' + err.message;
            }
        });
    };

    window.adoptAsFaq = function(question) {
        switchKnowTab('faq');
        const faqInput = document.getElementById('knowFaqInput');
        if (!faqInput) return;
        const currentVal = faqInput.value.trim();
        const addition = `\n\nQ: ${question}\nA: `;
        faqInput.value = currentVal ? (currentVal + addition) : `Q: ${question}\nA: `;
        updateCharCount('knowFaqInput', 'charCountFaq');
        faqInput.focus();
        faqInput.setSelectionRange(faqInput.value.length, faqInput.value.length);
    };

    window.closeKnowledgeModal = function() {
        const modal = document.getElementById('knowledgeModal');
        if (!modal) return;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    // Listener untuk menutup dropdown saat klik di luar dropdown
    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('clientActionDropdown');

        if (dropdown && dropdown.style.display === 'block' && !dropdown.contains(e.target)) {
            closeClientActionDropdown();
        }

        const knowModal = document.getElementById('knowledgeModal');
        if (e.target === knowModal) {
            closeKnowledgeModal();
        }

        const tModal = document.getElementById('tierModal');
        if (e.target === tModal) {
            closeTierModal();
        }
    });

    // Tutup dropdown otomatis saat halaman discroll / diresize
    window.addEventListener('scroll', closeClientActionDropdown, { passive: true });
    window.addEventListener('resize', closeClientActionDropdown, { passive: true });

    // Close Modals & Dropdown on ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeClientActionDropdown();
            closeTierModal();
            closeKnowledgeModal();
        }
    });
</script>
@endsection
