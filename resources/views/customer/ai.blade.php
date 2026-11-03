@extends('auth.layout')

@section('title', 'Asisten AI & Kuota')

@section('content')
<section class="dashboard-panel" aria-labelledby="ai-title">
    {{-- Header Halaman --}}
    <div class="customer-page-head" style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:1rem;">
        <div>
            <h1 id="ai-title" style="display:flex; align-items:center; gap:0.5rem;">
                <span class="material-symbols-outlined" style="color:var(--account-sidebar); font-size:2rem;">smart_toy</span>
                Asisten AI &amp; Kuota Pesan
            </h1>
            <p>Pantau sisa kuota percakapan AI chatbot bisnis Anda dan status operasional situs secara realtime.</p>
        </div>
        <div style="display:flex; align-items:center; gap:0.75rem; flex-wrap:wrap;">
            @if ($aiOnline)
                <span style="display:inline-flex; align-items:center; gap:0.4rem; padding:0.4rem 0.85rem; border-radius:999px; font-size:0.8rem; font-weight:700; background:#e6f4ea; color:#137333; border:1px solid #ceead6;">
                    <span style="width:8px; height:8px; border-radius:50%; background:#1e8e3e; box-shadow:0 0 6px rgba(30,142,62,0.6);"></span>
                    Live Sync Terhubung
                </span>
            @else
                <span style="display:inline-flex; align-items:center; gap:0.4rem; padding:0.4rem 0.85rem; border-radius:999px; font-size:0.8rem; font-weight:700; background:#fef7e0; color:#b06000; border:1px solid #fde293;">
                    <span style="width:8px; height:8px; border-radius:50%; background:#f9ab00;"></span>
                    Estimasi Paket (Sync Standby)
                </span>
            @endif
        </div>
    </div>

    {{-- Banner Simulasi jika akun sedang melihat Pratinjau --}}
    @if ($isDemo)
        <div style="background:linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%); border:1px solid #c7d2fe; border-radius:var(--account-radius); padding:0.9rem 1.25rem; margin-top:1.25rem; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.75rem;">
            <div style="display:flex; align-items:center; gap:0.65rem;">
                <span class="material-symbols-outlined" style="color:#4338ca; font-size:1.4rem;">visibility</span>
                <span style="font-size:0.875rem; color:#3730a3;">
                    <strong>Contoh Pratinjau Interaktif:</strong> Ini adalah simulasi tampilan ketika Anda sudah memiliki website aktif dengan template <strong>{{ $order->template?->name ?? 'Pitstop Garage' }}</strong> (Paket Pixel).
                </span>
            </div>
            <a href="{{ route('collections') }}" style="font-size:0.8rem; font-weight:700; color:#fff; background:#4338ca; padding:0.35rem 0.85rem; border-radius:6px; text-decoration:none; display:inline-flex; align-items:center; gap:0.3rem;">
                Pilih Template Anda <span class="material-symbols-outlined" style="font-size:1rem;">arrow_forward</span>
            </a>
        </div>
    @endif

    {{-- Alert Notifikasi jika kuota habis / menipis --}}
    @php
        $percent = (float) ($quotaData['percentage_used'] ?? 0);
        $isExhausted = !empty($quotaData['is_quota_exhausted']) || $percent >= 100;
        $isWarning = $percent >= 80 && ! $isExhausted;
    @endphp

    @if ($isExhausted)
        <div style="background:#fce8e6; border:1px solid #fad2cf; border-radius:var(--account-radius); padding:1rem 1.25rem; margin-top:1.25rem; display:flex; align-items:flex-start; gap:0.75rem;">
            <span class="material-symbols-outlined" style="color:#d93025; font-size:1.5rem; flex-shrink:0;">error</span>
            <div style="flex:1;">
                <strong style="color:#c5221f; font-size:0.95rem; display:block;">Kuota Pesan Bulan Ini Telah Habis (100%)</strong>
                <p style="margin:0.25rem 0 0.5rem; font-size:0.875rem; color:#5f2120; line-height:1.4;">
                    Asisten AI di website Anda untuk sementara dialihkan langsung ke kontak WhatsApp agar calon pelanggan tetap dapat menghubungi Anda tanpa kendala.
                </p>
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Webia,%20saya%20ingin%20upgrade%20kuota%20AI%20website%20{{ $order->site_slug ?? $order->order_number }}" target="_blank" style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.825rem; font-weight:700; color:#fff; background:#d93025; padding:0.4rem 0.85rem; border-radius:6px; text-decoration:none;">
                    Upgrade Kuota Sekarang &rarr;
                </a>
            </div>
        </div>
    @elseif ($isWarning)
        <div style="background:#fef7e0; border:1px solid #fde293; border-radius:var(--account-radius); padding:1rem 1.25rem; margin-top:1.25rem; display:flex; align-items:flex-start; gap:0.75rem;">
            <span class="material-symbols-outlined" style="color:#b06000; font-size:1.5rem; flex-shrink:0;">warning</span>
            <div style="flex:1;">
                <strong style="color:#934800; font-size:0.95rem; display:block;">Kuota Pesan Tersisa Sedikit ({{ 100 - round($percent) }}% Tersisa)</strong>
                <p style="margin:0.25rem 0 0.5rem; font-size:0.875rem; color:#6b3500; line-height:1.4;">
                    Penggunaan asisten AI Anda telah mencapai {{ round($percent) }}%. Pertimbangkan untuk meningkatkan paket sebelum kuota habis agar bot tetap aktif melayani prospek.
                </p>
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Webia,%20saya%20ingin%20konsultasi%20upgrade%20paket%20AI" target="_blank" style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.825rem; font-weight:700; color:#fff; background:#b06000; padding:0.4rem 0.85rem; border-radius:6px; text-decoration:none;">
                    Hubungi Tim Kami
                </a>
            </div>
        </div>
    @endif

    {{-- Bento Grid Ringkasan Kuota & Website --}}
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1.25rem; margin-top:1.25rem;">
        {{-- Kartu 1: Kuota Pesan Utama --}}
        <div style="background:var(--account-surface); border:1px solid var(--account-line); border-radius:var(--account-radius-lg); padding:1.5rem; box-shadow:var(--account-shadow); display:flex; flex-direction:column; justify-content:space-between;">
            <div>
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
                    <span style="font-size:0.8rem; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:var(--account-muted);">Sisa Kuota Pesan</span>
                    <span class="material-symbols-outlined" style="color:var(--account-action); font-size:1.25rem;">chat</span>
                </div>
                <div style="display:flex; align-items:baseline; gap:0.5rem; margin-bottom:0.75rem;">
                    <span style="font-size:2.25rem; font-weight:800; color:var(--account-ink); line-height:1;">
                        {{ number_format($quotaData['remaining_messages'] ?? 0) }}
                    </span>
                    <span style="font-size:0.95rem; font-weight:600; color:var(--account-muted);">
                        / {{ number_format($quotaData['monthly_quota'] ?? 500) }} pesan
                    </span>
                </div>

                {{-- Progress Bar --}}
                @php
                    $barColor = $percent >= 90 ? '#d93025' : ($percent >= 70 ? '#f9ab00' : '#1e8e3e');
                @endphp
                <div style="width:100%; height:8px; background:#e8eaed; border-radius:999px; overflow:hidden; margin-bottom:0.6rem;">
                    <div style="width:{{ min(100, $percent) }}%; height:100%; background:{{ $barColor }}; border-radius:999px; transition:width 0.4s ease;"></div>
                </div>
                <div style="display:flex; justify-content:space-between; font-size:0.8rem; color:var(--account-muted);">
                    <span>{{ number_format($quotaData['used_messages'] ?? 0) }} terpakai</span>
                    <span style="font-weight:700; color:var(--account-ink);">{{ round($percent, 1) }}% digunakan</span>
                </div>
            </div>

            <div style="margin-top:1.25rem; padding-top:1rem; border-top:1px solid var(--account-line); font-size:0.785rem; color:var(--account-muted); display:flex; align-items:center; gap:0.4rem;">
                <span class="material-symbols-outlined" style="font-size:1rem; color:#1e8e3e;">check_circle</span>
                1 interaksi pengunjung = 1 pesan kuota
            </div>
        </div>

        {{-- Kartu 2: Masa Berlaku & Siklus Reset --}}
        <div style="background:var(--account-surface); border:1px solid var(--account-line); border-radius:var(--account-radius-lg); padding:1.5rem; box-shadow:var(--account-shadow); display:flex; flex-direction:column; justify-content:space-between;">
            <div>
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
                    <span style="font-size:0.8rem; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:var(--account-muted);">Siklus Reset Kuota</span>
                    <span class="material-symbols-outlined" style="color:var(--account-action); font-size:1.25rem;">event_repeat</span>
                </div>
                <div style="font-size:1.35rem; font-weight:800; color:var(--account-ink); margin-bottom:0.35rem;">
                    {{ $resetDateFormatted }}
                </div>
                <p style="font-size:0.85rem; color:var(--account-muted); margin:0;">
                    Reset otomatis dalam <strong style="color:var(--account-action);">{{ $daysUntilReset }} hari lagi</strong>.
                </p>
            </div>

            <div style="margin-top:1.25rem; padding-top:1rem; border-top:1px solid var(--account-line);">
                <div style="display:flex; align-items:center; justify-content:space-between;">
                    <span style="font-size:0.8rem; color:var(--account-muted);">Periode Berjalan:</span>
                    <span style="font-size:0.85rem; font-weight:700; color:var(--account-ink);">{{ $quotaData['period'] ?? now()->format('Y-m') }}</span>
                </div>
                <p style="margin:0.35rem 0 0; font-size:0.75rem; color:var(--account-muted);">
                    * Kuota baru akan kembali 100% pada tanggal 1 pukul 00:00 WIB.
                </p>
            </div>
        </div>

        {{-- Kartu 3: Paket, Template & WhatsApp Toko --}}
        <div style="background:var(--account-surface); border:1px solid var(--account-line); border-radius:var(--account-radius-lg); padding:1.5rem; box-shadow:var(--account-shadow); display:flex; flex-direction:column; justify-content:space-between;">
            <div>
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
                    <span style="font-size:0.8rem; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:var(--account-muted);">Website &amp; Bisnis</span>
                    <span class="material-symbols-outlined" style="color:var(--account-action); font-size:1.25rem;">web</span>
                </div>
                <div style="font-size:1.2rem; font-weight:800; color:var(--account-ink); margin-bottom:0.25rem;">
                    {{ $order->business_data['business_name'] ?? 'Website Bisnis Anda' }}
                </div>
                <div style="font-size:0.85rem; color:var(--account-muted); margin-bottom:0.35rem;">
                    Template: <strong style="color:var(--account-ink);">{{ $order->template?->name ?? $order->template_snapshot['name'] ?? 'Pitstop Garage' }}</strong>
                </div>
                <div style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.8rem; font-weight:600; color:var(--account-teal); margin-bottom:0.5rem;">
                    <span class="material-symbols-outlined" style="font-size:0.95rem;">verified</span>
                    Paket {{ $order->package?->name ?? ucfirst($quotaData['package_tier'] ?? 'Pixel') }} ({{ number_format($quotaData['monthly_quota'] ?? 500) }} pesan/bln)
                </div>

                {{-- WhatsApp Admin Terverifikasi --}}
                <div style="padding:0.6rem 0.75rem; background:#ecfdf5; border:1px solid #a7f3d0; border-radius:6px; display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <span style="font-size:0.7rem; font-weight:700; color:#065f46; text-transform:uppercase; display:block;">WhatsApp Toko (Zero Lost Lead):</span>
                        <strong style="font-size:0.85rem; color:#047857; font-family:monospace;">{{ $registeredWhatsApp }}</strong>
                    </div>
                    <span style="font-size:0.65rem; font-weight:700; color:#059669; background:#d1fae5; padding:0.1rem 0.35rem; border-radius:999px;">Aktif</span>
                </div>
            </div>

            <div style="margin-top:1.25rem; padding-top:1rem; border-top:1px solid var(--account-line); display:flex; justify-content:space-between; align-items:center;">
                <div style="font-size:0.785rem; color:var(--account-muted);">
                    Tenant ID: <code>{{ $quotaData['tenant_id'] ?? 'tenant_automotive_01' }}</code>
                </div>
                @if ($order->site_slug)
                    <a href="{{ route('sites.show', ['order' => $order->site_slug]) }}" target="_blank" style="font-size:0.785rem; font-weight:700; color:var(--account-action); text-decoration:none; display:inline-flex; align-items:center; gap:0.2rem;">
                        Buka Web <span class="material-symbols-outlined" style="font-size:0.95rem;">open_in_new</span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Detail Informasi & Perbandingan Paket --}}
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:1.25rem; margin-top:1.5rem;">
        {{-- Panduan Cara Kerja Kuota --}}
        <div style="background:var(--account-surface); border:1px solid var(--account-line); border-radius:var(--account-radius-lg); padding:1.5rem;">
            <h3 style="font-size:1rem; font-weight:800; color:var(--account-ink); margin:0 0 1rem; display:flex; align-items:center; gap:0.5rem;">
                <span class="material-symbols-outlined" style="color:var(--account-action);">help_outline</span>
                Bagaimana Kuota AI Dihitung?
            </h3>
            <div style="display:grid; gap:0.85rem; font-size:0.85rem; color:var(--account-muted); line-height:1.5;">
                <div style="display:flex; gap:0.75rem; align-items:flex-start;">
                    <span class="material-symbols-outlined" style="color:var(--account-action); font-size:1.2rem; flex-shrink:0;">forum</span>
                    <div>
                        <strong style="color:var(--account-ink); display:block;">1 Interaksi = 1 Pesan Kuota</strong>
                        Setiap kali calon pelanggan bertanya dan dijawab secara cerdas oleh asisten AI, kuota akan terpotong 1 pesan.
                    </div>
                </div>
                <div style="display:flex; gap:0.75rem; align-items:flex-start;">
                    <span class="material-symbols-outlined" style="color:var(--account-action); font-size:1.2rem; flex-shrink:0;">schedule</span>
                    <div>
                        <strong style="color:var(--account-ink); display:block;">Siklus Bulanan Kalender</strong>
                        Kuota berlaku mulai tanggal 1 hingga akhir bulan. Pada awal bulan baru, jumlah kuota akan otomatis di-reset ke batas penuh paket Anda.
                    </div>
                </div>
                <div style="display:flex; gap:0.75rem; align-items:flex-start;">
                    <span class="material-symbols-outlined" style="color:#1e8e3e; font-size:1.2rem; flex-shrink:0;">support_agent</span>
                    <div>
                        <strong style="color:var(--account-ink); display:block;">WhatsApp Handoff Otomatis</strong>
                        Bila kuota pesan habis sebelum akhir bulan, website tidak akan rusak. Pengunjung akan disambut ramah dan dialihkan langsung ke WhatsApp tim Anda.
                    </div>
                </div>
            </div>
        </div>

        {{-- Komparasi Kapasitas Paket --}}
        <div style="background:var(--account-surface); border:1px solid var(--account-line); border-radius:var(--account-radius-lg); padding:1.5rem;">
            <h3 style="font-size:1rem; font-weight:800; color:var(--account-ink); margin:0 0 1rem; display:flex; align-items:center; gap:0.5rem;">
                <span class="material-symbols-outlined" style="color:var(--account-action);">tune</span>
                Tingkatan Kuota Paket WEBIA
            </h3>
            <div style="display:grid; gap:0.65rem;">
                @php
                    $tiers = [
                        ['name' => 'Pixel', 'quota' => '500 pesan/bln', 'desc' => 'Landing page esensial untuk usaha rintisan', 'slug' => 'pixel'],
                        ['name' => 'Pulse', 'quota' => '1.500 pesan/bln', 'desc' => 'Cocok untuk profil bisnis dengan interaksi harian', 'slug' => 'pulse'],
                        ['name' => 'Nexus', 'quota' => '2.500 pesan/bln', 'desc' => 'Website multipage dinamis + CMS & pelacakan leads', 'slug' => 'nexus'],
                        ['name' => 'Infinity', 'quota' => '5.000 pesan/bln', 'desc' => 'Solusi kustom premium dengan volume interaksi tinggi', 'slug' => 'infinity'],
                    ];
                    $currentSlug = strtolower($quotaData['package_tier'] ?? 'pixel');
                @endphp

                @foreach ($tiers as $tier)
                    @php $isCurrent = ($tier['slug'] === $currentSlug); @endphp
                    <div style="display:flex; justify-content:space-between; align-items:center; padding:0.65rem 0.85rem; border-radius:var(--account-radius); border:1px solid {{ $isCurrent ? 'var(--account-lavender-strong)' : 'var(--account-line)' }}; background:{{ $isCurrent ? 'var(--account-lavender)' : 'transparent' }};">
                        <div>
                            <div style="display:flex; align-items:center; gap:0.4rem;">
                                <strong style="font-size:0.875rem; color:var(--account-ink);">{{ $tier['name'] }}</strong>
                                @if ($isCurrent)
                                    <span style="font-size:0.675rem; font-weight:700; background:var(--account-action); color:#fff; padding:0.15rem 0.45rem; border-radius:999px;">Paket Anda</span>
                                @endif
                            </div>
                            <span style="font-size:0.75rem; color:var(--account-muted); scale:0.95; transform-origin:left;">{{ $tier['desc'] }}</span>
                        </div>
                        <span style="font-size:0.825rem; font-weight:700; color:var(--account-action); flex-shrink:0;">
                            {{ $tier['quota'] }}
                        </span>
                    </div>
                @endforeach
            </div>

            <div style="margin-top:1rem; text-align:right;">
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Webia,%20saya%20ingin%20konsultasi%20upgrade%20kuota%20AI" target="_blank" style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.825rem; font-weight:700; color:var(--account-action); text-decoration:none;">
                    Butuh Kuota Lebih Besar? Hubungi Kami &rarr;
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
