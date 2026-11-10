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
            @if (! $hasOrder)
                <span style="display:inline-flex; align-items:center; gap:0.4rem; padding:0.4rem 0.85rem; border-radius:999px; font-size:0.8rem; font-weight:700; background:#f1f3f4; color:#5f6368; border:1px solid #dadce0;">
                    <span style="width:8px; height:8px; border-radius:50%; background:#80868b;"></span>
                    Belum Ada Website
                </span>
            @elseif (! $isDelivered)
                <span style="display:inline-flex; align-items:center; gap:0.4rem; padding:0.4rem 0.85rem; border-radius:999px; font-size:0.8rem; font-weight:700; background:#fef7e0; color:#b06000; border:1px solid #fde293;">
                    <span style="width:8px; height:8px; border-radius:50%; background:#f9ab00;"></span>
                    {{ $order->status === 'paid' ? 'Sedang Dikerjakan' : 'Menunggu Pembayaran' }}
                </span>
            @elseif ($aiOnline)
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
    @if (! $hasOrder)
        {{-- EMPTY STATE: Belum punya website / pesanan sama sekali (Contoh: budi.fresh@gmail.com) --}}
        <div style="background:var(--account-surface); border:1px solid var(--account-line); border-radius:var(--account-radius-lg); padding:3.5rem 2rem; text-align:center; margin-top:1.5rem; box-shadow:var(--account-shadow);">
            <div style="width:72px; height:72px; border-radius:50%; background:var(--account-lavender); display:inline-flex; align-items:center; justify-content:center; margin-bottom:1.25rem;">
                <span class="material-symbols-outlined" style="color:var(--account-sidebar); font-size:2.25rem;">smart_toy</span>
            </div>
            <h2 style="font-size:1.5rem; font-weight:800; color:var(--account-ink); margin-bottom:0.5rem;">
                Asisten AI Belum Aktif
            </h2>
            <p style="color:var(--account-muted); max-width:540px; margin:0 auto 1.5rem; line-height:1.6; font-size:0.95rem;">
                Halo <strong>{{ auth()->user()->name }}</strong>, akun Anda saat ini belum memiliki website bisnis aktif di WEBIA. Fitur AI Chatbot Assistant dan kuota pesan bulanan akan otomatis aktif setelah Anda memiliki website.
            </p>
            <div style="display:flex; justify-content:center; gap:0.75rem; flex-wrap:wrap;">
                <a href="{{ route('collections') }}" style="background:var(--account-action); color:#fff; padding:0.65rem 1.25rem; border-radius:var(--account-radius); font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:0.4rem;">
                    Pilih Template Website <span class="material-symbols-outlined" style="font-size:1.1rem;">arrow_forward</span>
                </a>
            </div>
        </div>
    @elseif (! $isDelivered)
        {{-- IN-PROGRESS / PENDING PAYMENT STATE (Contoh: dina.pending@gmail.com, iwan.progress@gmail.com) --}}
        @php
            $isAwaitingPay = ($order->status !== 'paid');
        @endphp
        <div style="background:var(--account-surface); border:1px solid var(--account-line); border-radius:var(--account-radius-lg); padding:3.5rem 2rem; text-align:center; margin-top:1.5rem; box-shadow:var(--account-shadow);">
            <div style="width:72px; height:72px; border-radius:50%; background:#fef7e0; display:inline-flex; align-items:center; justify-content:center; margin-bottom:1.25rem;">
                <span class="material-symbols-outlined" style="color:#b06000; font-size:2.25rem;">{{ $isAwaitingPay ? 'credit_card_clock' : 'pending_actions' }}</span>
            </div>
            <h2 style="font-size:1.5rem; font-weight:800; color:var(--account-ink); margin-bottom:0.5rem;">
                {{ $isAwaitingPay ? 'Menunggu Pembayaran Pesanan' : 'Website Sedang Dalam Proses' }}
            </h2>
            <p style="color:var(--account-muted); max-width:540px; margin:0 auto 1.5rem; line-height:1.6; font-size:0.95rem;">
                @if ($isAwaitingPay)
                    Pesanan Anda (<strong>#{{ $order->order_number }}</strong>) dengan template <strong>{{ $order->template?->name ?? 'Website' }}</strong> belum diselesaikan pembayarannya. Silakan lakukan pembayaran agar tim WEBIA dapat segera mulai mengerjakan website dan mengaktifkan AI Assistant bisnis Anda.
                @else
                    Pesanan website Anda (<strong>#{{ $order->order_number }}</strong>) dengan template <strong>{{ $order->template?->name ?? 'Website' }}</strong> sedang dalam tahap pengerjaan oleh tim WEBIA. Chatbot AI Anda akan siap melayani pelanggan setelah website selesai dipublikasikan!
                @endif
            </p>
            <div style="display:flex; justify-content:center; gap:0.75rem; flex-wrap:wrap;">
                <a href="{{ route('orders.show', $order) }}" style="background:var(--account-action); color:#fff; padding:0.65rem 1.25rem; border-radius:var(--account-radius); font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:0.4rem;">
                    {{ $isAwaitingPay ? 'Bayar Sekarang' : 'Pantau Status Pesanan' }} <span class="material-symbols-outlined" style="font-size:1.1rem;">arrow_forward</span>
                </a>
            </div>
        </div>
    @else
    @if (session('success'))
        <div style="background:#e6f4ea; border:1px solid #ceead6; border-radius:var(--account-radius); padding:1rem 1.25rem; margin-top:1.25rem; display:flex; align-items:center; justify-content:space-between; gap:0.75rem;">
            <div style="display:flex; align-items:center; gap:0.5rem; color:#137333; font-weight:600; font-size:0.9rem;">
                <span class="material-symbols-outlined" style="font-size:1.25rem;">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" style="background:none; border:none; color:#137333; cursor:pointer; font-size:1.25rem;">&times;</button>
        </div>
    @endif
    @if (session('error'))
        <div style="background:#fce8e6; border:1px solid #fad2cf; border-radius:var(--account-radius); padding:1rem 1.25rem; margin-top:1.25rem; display:flex; align-items:center; justify-content:space-between; gap:0.75rem;">
            <div style="display:flex; align-items:center; gap:0.5rem; color:#c5221f; font-weight:600; font-size:0.9rem;">
                <span class="material-symbols-outlined" style="font-size:1.25rem;">error</span>
                <span>{{ session('error') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" style="background:none; border:none; color:#c5221f; cursor:pointer; font-size:1.25rem;">&times;</button>
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
                    Asisten AI di website Anda untuk sementara dialihkan langsung ke kontak WhatsApp agar calon pelanggan tetap terlayani. Untuk menambah kuota atau upgrade paket, silakan pilih paket top-up booster atau upgrade permanen di bawah ini.
                </p>
                <button type="button" onclick="openQuotaModal('booster')" style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.825rem; font-weight:700; color:#fff; background:#d93025; border:none; padding:0.45rem 0.95rem; border-radius:6px; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:1rem;">add_shopping_cart</span>
                    Pilih Paket &amp; Tambah Kuota &rarr;
                </button>
            </div>
        </div>
    @elseif ($isWarning)
        <div style="background:#fef7e0; border:1px solid #fde293; border-radius:var(--account-radius); padding:1rem 1.25rem; margin-top:1.25rem; display:flex; align-items:flex-start; gap:0.75rem;">
            <span class="material-symbols-outlined" style="color:#b06000; font-size:1.5rem; flex-shrink:0;">warning</span>
            <div style="flex:1;">
                <strong style="color:#934800; font-size:0.95rem; display:block;">Kuota Pesan Tersisa Sedikit ({{ 100 - round($percent) }}% Tersisa)</strong>
                <p style="margin:0.25rem 0 0.5rem; font-size:0.875rem; color:#6b3500; line-height:1.4;">
                    Penggunaan asisten AI Anda telah mencapai {{ round($percent) }}%. Agar percakapan chatbot tidak terputus, Anda dapat menambah kuota darurat (booster) atau upgrade paket website Anda.
                </p>
                <button type="button" onclick="openQuotaModal('booster')" style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.825rem; font-weight:700; color:#fff; background:#b06000; border:none; padding:0.45rem 0.95rem; border-radius:6px; cursor:pointer;">
                    <span class="material-symbols-outlined" style="font-size:1rem;">add_shopping_cart</span>
                    Tambah Kuota / Upgrade Paket &rarr;
                </button>
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
    {{-- SECTION TERPADU: Pengaturan Asisten AI & Informasi Bisnis (Satu Form Bersih & Efisien) --}}
    <div style="background:var(--account-surface); border:1px solid var(--account-line); border-radius:var(--account-radius-lg); padding:1.75rem; margin-top:1.5rem; box-shadow:var(--account-shadow);">
        <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:1rem; margin-bottom:1.25rem; border-bottom:1px solid var(--account-line); padding-bottom:1rem;">
            <div>
                <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:0.25rem;">
                    <div style="width:36px; height:36px; border-radius:10px; background:var(--account-lavender); display:flex; align-items:center; justify-content:center; color:var(--account-action);">
                        <span class="material-symbols-outlined" style="font-size:1.35rem;">smart_toy</span>
                    </div>
                    <div>
                        <h2 style="font-size:1.15rem; font-weight:800; color:var(--account-ink); margin:0;">
                            Pengaturan Asisten AI &amp; Informasi Bisnis
                        </h2>
                        <p style="color:var(--account-muted); font-size:0.825rem; margin:0;">
                            Perbarui pesan sapaan, nomor kontak WhatsApp, jam operasional, dan info toko Anda secara mandiri kapan saja.
                        </p>
                    </div>
                </div>
            </div>
            <span style="font-size:0.75rem; font-weight:700; background:var(--account-lavender); color:var(--account-action); padding:0.3rem 0.75rem; border-radius:999px; display:inline-flex; align-items:center; gap:0.35rem;">
                <span class="material-symbols-outlined" style="font-size:0.95rem;">psychology</span>
                Auto-Sync Realtime
            </span>
        </div>

        <form method="POST" action="{{ route('customer.ai.business-info') }}">
            @csrf
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:1.5rem; margin-bottom:1.5rem;">
                {{-- Kolom Kiri: Interaksi Chatbot & Kontak CS --}}
                <div style="display:flex; flex-direction:column; gap:1.25rem;">
                    {{-- Field 1: Sapaan Awal (Welcome Message) --}}
                    <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:var(--account-radius); padding:1.25rem;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem; flex-wrap:wrap; gap:0.4rem;">
                            <div style="display:flex; align-items:center; gap:0.4rem;">
                                <span class="material-symbols-outlined" style="font-size:1.15rem; color:var(--account-action);">chat_bubble</span>
                                <label for="welcome_message" style="font-size:0.875rem; font-weight:700; color:var(--account-ink);">
                                    Pesan Sapaan Pengunjung (Welcome Message)
                                </label>
                            </div>
                        </div>

                        {{-- Quick Preset Template Buttons --}}
                        <div style="display:flex; align-items:center; gap:0.35rem; flex-wrap:wrap; margin-bottom:0.6rem;">
                            <span style="font-size:0.7rem; font-weight:700; color:var(--account-muted);">Template Cepat:</span>
                            <button type="button" onclick="applyWelcomeTemplate('friendly')" style="background:#eef2ff; border:1px solid #c7d2fe; color:#4338ca; border-radius:6px; padding:0.25rem 0.55rem; font-size:0.72rem; font-weight:600; cursor:pointer; transition:all 0.15s;">
                                ✨ Ramah &amp; Santai
                            </button>
                            <button type="button" onclick="applyWelcomeTemplate('sales')" style="background:#fef3c7; border:1px solid #fde68a; color:#b45309; border-radius:6px; padding:0.25rem 0.55rem; font-size:0.72rem; font-weight:600; cursor:pointer; transition:all 0.15s;">
                                🛍️ Promo &amp; Penjualan
                            </button>
                            <button type="button" onclick="applyWelcomeTemplate('service')" style="background:#f0fdf4; border:1px solid #bbf7d0; color:#15803d; border-radius:6px; padding:0.25rem 0.55rem; font-size:0.72rem; font-weight:600; cursor:pointer; transition:all 0.15s;">
                                💼 Layanan &amp; Jasa
                            </button>
                            <button type="button" onclick="applyWelcomeTemplate('formal')" style="background:#f8fafc; border:1px solid #cbd5e1; color:#334155; border-radius:6px; padding:0.25rem 0.55rem; font-size:0.72rem; font-weight:600; cursor:pointer; transition:all 0.15s;">
                                🏢 Formal Bisnis
                            </button>
                        </div>

                        <textarea id="welcome_message" name="welcome_message" rows="3" required
                                  placeholder="Contoh: Halo! Senang Anda mampir ke website kami. Ada yang bisa kami bantu hari ini?"
                                  oninput="updateWelcomePreview(this.value)"
                                  style="width:100%; box-sizing:border-box; padding:0.75rem 0.85rem; border:1px solid var(--account-line); border-radius:var(--account-radius); font-size:0.85rem; background:#fff; color:var(--account-ink); resize:none; line-height:1.45; font-family:inherit;">{{ $currentWelcome }}</textarea>
                        
                        {{-- Live Preview Bubble --}}
                        <div style="margin-top:0.75rem; padding-top:0.6rem; border-top:1px dashed #cbd5e1;">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.35rem;">
                                <span style="font-size:0.68rem; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:#94a3b8;">
                                    Preview Tampilan Balon Chat:
                                </span>
                                <span style="font-size:0.68rem; color:#16a34a; font-weight:700; display:inline-flex; align-items:center; gap:0.25rem;">
                                    <span style="width:6px; height:6px; border-radius:50%; background:#16a34a;"></span>
                                    Aktif di Website
                                </span>
                            </div>
                            <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:12px; border-top-left-radius:3px; padding:0.65rem 0.85rem; font-size:0.8rem; color:#1e293b; box-shadow:0 1px 3px rgba(0,0,0,0.04); display:flex; align-items:flex-start; gap:0.6rem;">
                                <div style="width:24px; height:24px; border-radius:50%; background:var(--account-action); color:#fff; display:flex; align-items:center; justify-content:center; font-size:0.65rem; font-weight:800; flex-shrink:0; margin-top:1px;">AI</div>
                                <span id="welcomePreviewText" style="line-height:1.45;">{{ $currentWelcome }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Field 2: Nomor WhatsApp CS Handoff --}}
                    <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:var(--account-radius); padding:1.25rem;">
                        <div style="display:flex; align-items:center; gap:0.4rem; margin-bottom:0.5rem;">
                            <span class="material-symbols-outlined" style="font-size:1.15rem; color:#15803d;">support_agent</span>
                            <label for="whatsapp_cs" style="font-size:0.875rem; font-weight:700; color:var(--account-ink);">
                                Nomor WhatsApp CS &amp; Pengalihan (Handoff)
                            </label>
                        </div>
                        <div style="position:relative;">
                            <span style="position:absolute; left:0.85rem; top:50%; transform:translateY(-50%); font-size:0.85rem; font-weight:700; color:#15803d; pointer-events:none; display:flex; align-items:center; gap:0.25rem;">
                                <span class="material-symbols-outlined" style="font-size:1.05rem;">call</span>
                            </span>
                            <input type="tel" id="whatsapp_cs" name="whatsapp_cs" value="{{ $currentWhatsappCs }}" required
                                   placeholder="08123456789 atau 628123456789"
                                   style="width:100%; box-sizing:border-box; padding:0.75rem 0.85rem 0.75rem 2.6rem; border:1px solid var(--account-line); border-radius:var(--account-radius); font-size:0.85rem; background:#fff; color:var(--account-ink); font-family:monospace; font-weight:600;">
                        </div>
                        <span style="font-size:0.75rem; color:var(--account-muted); margin-top:0.35rem; display:block;">
                            Nomor tujuan saat calon pelanggan mengklik tombol <em>"Hubungi Customer Service Langsung"</em> di chatbot, atau saat kuota pesan bulanan habis.
                        </span>
                    </div>
                </div>

                {{-- Kolom Kanan: Lokasi Bisnis & Penawaran --}}
                <div style="display:flex; flex-direction:column; gap:1.25rem;">
                    {{-- Field 3: Lokasi Operasional / Alamat Bisnis (Dengan Opsi Online Saja) --}}
                    <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:var(--account-radius); padding:1.25rem;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.6rem; flex-wrap:wrap; gap:0.5rem;">
                            <label for="alamat" style="font-size:0.875rem; font-weight:700; color:var(--account-ink); display:flex; align-items:center; gap:0.35rem; margin:0;">
                                <span class="material-symbols-outlined" style="font-size:1.15rem; color:var(--account-action);">pin_drop</span>
                                Lokasi Operasional / Alamat Bisnis
                            </label>
                            {{-- Checkbox Opsi Online Saja --}}
                            <label style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.75rem; font-weight:700; color:#334155; cursor:pointer; background:#fff; padding:0.25rem 0.65rem; border-radius:6px; border:1px solid #cbd5e1;">
                                <input type="checkbox" id="is_online_only" name="is_online_only" value="1" {{ $isOnlineOnly ? 'checked' : '' }} onchange="toggleOnlineOnlyMode(this.checked)" style="accent-color:var(--account-action); cursor:pointer;">
                                <span>🌐 Beroperasi Online Saja (Tanpa Toko/Kantor)</span>
                            </label>
                        </div>

                        {{-- Wadah Input Alamat Fisik --}}
                        <div id="physicalAddressBox" style="display:{{ $isOnlineOnly ? 'none' : 'block' }};">
                            <textarea id="alamat" name="alamat" rows="2"
                                      placeholder="Contoh: Jl. Pemuda No. 45, Surabaya (Patokan: Samping Bank BCA / Seberang Alun-Alun)"
                                      oninput="updateAlamatPreview(this.value)"
                                      style="width:100%; box-sizing:border-box; padding:0.65rem 0.85rem; border:1px solid var(--account-line); border-radius:var(--account-radius); font-size:0.85rem; background:#fff; color:var(--account-ink); resize:none; line-height:1.45; font-family:inherit;">{{ ! $isOnlineOnly ? ($currentAlamat ?? '') : '' }}</textarea>
                            <span style="font-size:0.72rem; color:var(--account-muted); margin-top:0.3rem; display:block;">
                                Cantumkan nama jalan, kota, dan patokan lokasi agar AI dapat memandu rute saat calon pembeli bertanya lokasi toko/kantor.
                            </span>
                        </div>

                        {{-- Wadah Info Online Saja --}}
                        <div id="onlineOnlyNoticeBox" style="display:{{ $isOnlineOnly ? 'flex' : 'none' }}; background:#eff6ff; border:1px solid #bfdbfe; border-radius:8px; padding:0.65rem 0.85rem; align-items:center; gap:0.5rem; color:#1e40af; font-size:0.8rem; line-height:1.4;">
                            <span class="material-symbols-outlined" style="font-size:1.25rem; color:#3b82f6; flex-shrink:0;">public</span>
                            <span>Bisnis Anda beroperasi secara daring (online). AI akan menjelaskan bahwa pesanan dan layanan diproses secara digital tanpa toko/kantor fisik.</span>
                        </div>

                        {{-- Live Preview Balasan Bot AI Mengenai Alamat --}}
                        <div style="margin-top:0.75rem; padding:0.55rem 0.75rem; background:#ffffff; border:1px dashed #cbd5e1; border-radius:8px; display:flex; align-items:flex-start; gap:0.5rem;">
                            <span class="material-symbols-outlined" style="font-size:1.1rem; color:var(--account-action); flex-shrink:0; margin-top:1px;">smart_toy</span>
                            <div>
                                <span style="font-size:0.68rem; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; color:#64748b; display:block;">Jawaban Bot Mengenai Lokasi / Alamat:</span>
                                <strong id="previewAlamatText" style="font-size:0.8rem; color:#0f172a; line-height:1.4;">
                                    {{ $isOnlineOnly ? 'Layanan kami beroperasi penuh secara online dan melayani pelanggan secara digital tanpa kantor fisik.' : ($currentAlamat ?: 'Alamat fisik belum diatur') }}
                                </strong>
                            </div>
                        </div>
                    </div>

                    {{-- Field 4: Informasi & Penawaran Bisnis (Kata-kata umum & universal) --}}
                    <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:var(--account-radius); padding:1.25rem;">
                        <label for="pengumuman" style="display:block; font-size:0.875rem; font-weight:700; color:var(--account-ink); margin-bottom:0.4rem;">
                            <span class="material-symbols-outlined" style="font-size:1.15rem; vertical-align:middle; color:var(--account-action);">info</span>
                            Informasi Khusus &amp; Catatan Bisnis (Opsional):
                        </label>
                        <div style="position:relative;">
                            <span style="position:absolute; left:0.85rem; top:50%; transform:translateY(-50%); font-size:0.85rem; color:var(--account-action); pointer-events:none; display:flex; align-items:center;">
                                <span class="material-symbols-outlined" style="font-size:1.05rem;">tips_and_updates</span>
                            </span>
                            <input type="text" id="pengumuman" name="pengumuman" value="{{ $currentPengumuman ?? '' }}"
                                   placeholder="Contoh: Konsultasi pertama gratis, melayani seluruh Indonesia, atau diskon 10% untuk pesanan baru"
                                   style="width:100%; box-sizing:border-box; padding:0.7rem 0.85rem 0.7rem 2.5rem; border:1px solid var(--account-line); border-radius:var(--account-radius); font-size:0.85rem; background:#fff; color:var(--account-ink);">
                        </div>
                        <span style="font-size:0.72rem; color:var(--account-muted); margin-top:0.35rem; display:block;">
                            Catatan khusus, penawaran menarik, atau benefit yang ingin disampaikan bot saat pengunjung menanyakan promo atau info penting bisnis Anda.
                        </span>
                    </div>
                </div>
            </div>

            {{-- Footer Aksi Form --}}
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.75rem; padding-top:1rem; border-top:1px solid var(--account-line);">
                <div style="display:flex; align-items:center; gap:0.4rem; font-size:0.775rem; color:var(--account-muted);">
                    <span class="material-symbols-outlined" style="font-size:1.1rem; color:#16a34a;">check_circle</span>
                    Pembaruan langsung disinkronkan ke chatbot website Anda tanpa jeda.
                </div>
                <button type="submit" style="background:var(--account-action); color:#fff; border:none; padding:0.75rem 1.75rem; border-radius:var(--account-radius); font-weight:700; font-size:0.875rem; cursor:pointer; display:inline-flex; align-items:center; gap:0.45rem; box-shadow:0 2px 4px rgba(0,0,0,0.08); transition:opacity 0.2s;">
                    <span class="material-symbols-outlined" style="font-size:1.15rem;">save</span>
                    Simpan Pengaturan &amp; Info Bisnis
                </button>
            </div>
        </form>
    </div>

    {{-- BANNER KOLABORASI HYBRID: Penambahan FAQ Mendalam & Katalog via Tim Webia --}}
    <div style="background:linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border:1px solid #a7f3d0; border-radius:var(--account-radius-lg); padding:1.25rem 1.5rem; margin-top:1.25rem; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem;">
        <div style="display:flex; align-items:flex-start; gap:0.85rem; max-width:650px;">
            <div style="width:40px; height:40px; border-radius:10px; background:#d1fae5; display:flex; align-items:center; justify-content:center; color:#059669; flex-shrink:0;">
                <span class="material-symbols-outlined" style="font-size:1.5rem;">support_agent</span>
            </div>
            <div>
                <h3 style="font-size:0.975rem; font-weight:800; color:#065f46; margin:0 0 0.25rem;">
                    Ingin Menambah FAQ Resmi atau Katalog Produk Baru?
                </h3>
                <p style="font-size:0.8rem; color:#047857; margin:0; line-height:1.45;">
                    Pembaruan operasional rutin (jam buka, alamat, promo, WhatsApp) dapat Anda ubah mandiri di atas. Untuk penambahan daftar FAQ resmi khusus atau katalog produk baru, tim Webia siap membantu menginput dan memformat dokumen AI Anda agar mutu bot tetap terjamin.
                </p>
            </div>
        </div>
        <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Tim Webia, saya ingin mengajukan penambahan FAQ/Knowledge Base untuk website ' . ($order->business_data['business_name'] ?? 'Bisnis') . ' (Tenant: ' . $tenantId . ')') }}" target="_blank" style="background:#059669; color:#fff; text-decoration:none; padding:0.65rem 1.15rem; border-radius:var(--account-radius); font-weight:700; font-size:0.825rem; display:inline-flex; align-items:center; gap:0.4rem; box-shadow:0 2px 4px rgba(5,150,105,0.25); white-space:nowrap;">
            <span class="material-symbols-outlined" style="font-size:1.1rem;">chat</span>
            Ajukan FAQ via WhatsApp Tim Webia &rarr;
        </a>
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
                <button type="button" onclick="openQuotaModal('upgrade')" style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.825rem; font-weight:700; color:var(--account-action); background:transparent; border:none; cursor:pointer; padding:0;">
                    Lihat Opsi Top-Up &amp; Upgrade Paket &rarr;
                </button>
            </div>
        </div>
    </div>
    {{-- MODAL POPUP 2-STEP: TOP-UP KUOTA & PEMBAYARAN --}}
    <div id="quotaModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.65); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center; padding:1rem;">
        <div style="background:#ffffff; border-radius:16px; max-width:580px; width:100%; max-height:92vh; overflow-y:auto; box-shadow:0 25px 50px -12px rgba(0,0,0,0.25); border:1px solid #e2e8f0; display:flex; flex-direction:column;">
            {{-- ==================== STEP 1: PILIH PAKET ==================== --}}
            <div id="modal-step-1" style="display:block;">
                {{-- Header Step 1 --}}
                <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #e2e8f0; display:flex; justify-content:space-between; align-items:center;">
                    <div style="display:flex; align-items:center; gap:0.6rem;">
                        <span class="material-symbols-outlined" style="color:var(--account-action); font-size:1.6rem;">shopping_bag</span>
                        <div>
                            <div style="display:flex; align-items:center; gap:0.4rem;">
                                <span style="font-size:0.7rem; font-weight:800; background:#e0e7ff; color:#3730a3; padding:0.1rem 0.4rem; border-radius:4px;">LANGKAH 1 DARI 2</span>
                            </div>
                            <h2 style="font-size:1.15rem; font-weight:800; color:#0f172a; margin:0.15rem 0 0;">Pilih Paket Kuota AI</h2>
                            <p style="font-size:0.775rem; color:#64748b; margin:0;">Pilih paket kuota tambahan atau upgrade paket website</p>
                        </div>
                    </div>
                    <button type="button" onclick="closeQuotaModal()" style="background:transparent; border:none; color:#64748b; cursor:pointer; padding:0.25rem; display:inline-flex; border-radius:6px;" aria-label="Tutup">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                {{-- Body Step 1 --}}
                <div style="padding:1.25rem 1.5rem;">
                    {{-- Tabs Pemilihan Tipe --}}
                    <div style="display:flex; background:#f1f5f9; padding:0.25rem; border-radius:10px; gap:0.25rem; margin-bottom:1.25rem;">
                        <button type="button" id="tab-booster" onclick="switchModalTab('booster')" style="flex:1; padding:0.55rem; font-size:0.8rem; font-weight:700; border:none; border-radius:8px; cursor:pointer; background:#ffffff; color:#0f172a; box-shadow:0 1px 3px rgba(0,0,0,0.1); transition:all 0.2s;">
                            ⚡ Tambah Kuota
                        </button>
                        <button type="button" id="tab-upgrade" onclick="switchModalTab('upgrade')" style="flex:1; padding:0.55rem; font-size:0.8rem; font-weight:600; border:none; border-radius:8px; cursor:pointer; background:transparent; color:#64748b; transition:all 0.2s;">
                            🚀 Upgrade Paket
                        </button>
                    </div>
                    {{-- Konten Tab 1: Tambah Kuota --}}
                    <div id="content-booster" style="display:block;">
                        <p style="font-size:0.8rem; color:#475569; margin:0 0 0.75rem;">
                            Tambahan kuota instan untuk bulan berjalan tanpa mengubah fitur website Anda:
                        </p>
                        <div style="display:grid; gap:0.6rem;">
                            <label id="opt-booster_mini" style="display:flex; justify-content:space-between; align-items:center; padding:0.75rem 1rem; border:2px solid #e2e8f0; border-radius:10px; cursor:pointer; transition:all 0.2s;" onclick="selectOption('booster_mini', '+500 Pesan', 'Rp49.000')">
                                <div style="display:flex; align-items:center; gap:0.75rem;">
                                    <input type="radio" name="quota_package" value="booster_mini" style="accent-color:var(--account-action);">
                                    <div>
                                        <strong style="font-size:0.875rem; color:#0f172a; display:block;">+500 Pesan</strong>
                                        <span style="font-size:0.75rem; color:#64748b;">Tambahan kuota darurat untuk trafik ringan</span>
                                    </div>
                                </div>
                                <span style="font-size:0.95rem; font-weight:800; color:var(--account-action);">Rp49.000</span>
                            </label>
                            <label id="opt-booster_std" style="display:flex; justify-content:space-between; align-items:center; padding:0.75rem 1rem; border:2px solid var(--account-action); background:#f8fafc; border-radius:10px; cursor:pointer; transition:all 0.2s;" onclick="selectOption('booster_std', '+1.000 Pesan', 'Rp89.000')">
                                <div style="display:flex; align-items:center; gap:0.75rem;">
                                    <input type="radio" name="quota_package" value="booster_std" checked style="accent-color:var(--account-action);">
                                    <div>
                                        <div style="display:flex; align-items:center; gap:0.4rem;">
                                            <strong style="font-size:0.875rem; color:#0f172a;">+1.000 Pesan</strong>
                                            <span style="font-size:0.65rem; font-weight:700; background:#dcfce7; color:#15803d; padding:0.1rem 0.4rem; border-radius:4px;">POPULER</span>
                                        </div>
                                        <span style="font-size:0.75rem; color:#64748b;">Paling sering dipilih untuk operasional stabil</span>
                                    </div>
                                </div>
                                <span style="font-size:0.95rem; font-weight:800; color:var(--account-action);">Rp89.000</span>
                            </label>
                            <label id="opt-booster_max" style="display:flex; justify-content:space-between; align-items:center; padding:0.75rem 1rem; border:2px solid #e2e8f0; border-radius:10px; cursor:pointer; transition:all 0.2s;" onclick="selectOption('booster_max', '+2.500 Pesan', 'Rp199.000')">
                                <div style="display:flex; align-items:center; gap:0.75rem;">
                                    <input type="radio" name="quota_package" value="booster_max" style="accent-color:var(--account-action);">
                                    <div>
                                        <strong style="font-size:0.875rem; color:#0f172a; display:block;">+2.500 Pesan</strong>
                                        <span style="font-size:0.75rem; color:#64748b;">Kapasitas besar untuk promosi ramai &amp; kampanye iklan</span>
                                    </div>
                                </div>
                                <span style="font-size:0.95rem; font-weight:800; color:var(--account-action);">Rp199.000</span>
                            </label>
                        </div>
                    </div>
                    {{-- Konten Tab 2: Upgrade Paket Permanen --}}
                    <div id="content-upgrade" style="display:none;">
                        <p style="font-size:0.8rem; color:#475569; margin:0 0 0.75rem;">
                            Tingkatkan kuota reguler setiap bulan seterusnya + fitur website yang lebih lengkap:
                        </p>
                        <div style="display:grid; gap:0.6rem;">
                            <label id="opt-up_pulse" style="display:flex; justify-content:space-between; align-items:center; padding:0.75rem 1rem; border:2px solid #e2e8f0; border-radius:10px; cursor:pointer; transition:all 0.2s;" onclick="selectOption('up_pulse', 'Upgrade ke Paket Pulse (1.500 pesan/bln)', 'Rp400.000')">
                                <div style="display:flex; align-items:center; gap:0.75rem;">
                                    <input type="radio" name="quota_package" value="up_pulse" style="accent-color:var(--account-action);">
                                    <div>
                                        <strong style="font-size:0.875rem; color:#0f172a; display:block;">Upgrade ke Pulse (1.500 pesan/bln)</strong>
                                        <span style="font-size:0.75rem; color:#64748b;">Kuota 3x lipat + fitur katalog &amp; booking interaktif</span>
                                    </div>
                                </div>
                                <span style="font-size:0.95rem; font-weight:800; color:var(--account-action);">Rp400.000</span>
                            </label>
                            <label id="opt-up_nexus" style="display:flex; justify-content:space-between; align-items:center; padding:0.75rem 1rem; border:2px solid #e2e8f0; border-radius:10px; cursor:pointer; transition:all 0.2s;" onclick="selectOption('up_nexus', 'Upgrade ke Paket Nexus (2.500 pesan/bln)', 'Rp600.000')">
                                <div style="display:flex; align-items:center; gap:0.75rem;">
                                    <input type="radio" name="quota_package" value="up_nexus" style="accent-color:var(--account-action);">
                                    <div>
                                        <strong style="font-size:0.875rem; color:#0f172a; display:block;">Upgrade ke Nexus (2.500 pesan/bln)</strong>
                                        <span style="font-size:0.75rem; color:#64748b;">Kuota bisnis + website multipage dinamis &amp; CMS</span>
                                    </div>
                                </div>
                                <span style="font-size:0.95rem; font-weight:800; color:var(--account-action);">Rp600.000</span>
                            </label>
                            <label id="opt-up_infinity" style="display:flex; justify-content:space-between; align-items:center; padding:0.75rem 1rem; border:2px solid #e2e8f0; border-radius:10px; cursor:pointer; transition:all 0.2s;" onclick="selectOption('up_infinity', 'Upgrade ke Paket Infinity (5.000 pesan/bln)', 'Rp1.000.000')">
                                <div style="display:flex; align-items:center; gap:0.75rem;">
                                    <input type="radio" name="quota_package" value="up_infinity" style="accent-color:var(--account-action);">
                                    <div>
                                        <strong style="font-size:0.875rem; color:#0f172a; display:block;">Upgrade ke Infinity (5.000 pesan/bln)</strong>
                                        <span style="font-size:0.75rem; color:#64748b;">Kapasitas enterprise 5.000 pesan + prioritas VIP</span>
                                    </div>
                                </div>
                                <span style="font-size:0.95rem; font-weight:800; color:var(--account-action);">Rp1.000.000</span>
                            </label>
                        </div>
                    </div>
                    {{-- Footer Step 1: Pilihan Terpilih & Tombol Lanjut --}}
                    <div style="margin-top:1.25rem; padding-top:1rem; border-top:1px solid #e2e8f0; display:flex; flex-direction:column; gap:0.75rem;">
                        <div style="display:flex; justify-content:space-between; align-items:center; background:#f8fafc; padding:0.75rem 1rem; border-radius:10px; border:1px solid #e2e8f0;">
                            <div>
                                <span style="font-size:0.725rem; color:#64748b; display:block;">Paket yang dipilih:</span>
                                <strong id="step1-selected-name" style="font-size:0.875rem; color:#0f172a;">+1.000 Pesan</strong>
                            </div>
                            <span id="step1-selected-price" style="font-size:1.25rem; font-weight:900; color:var(--account-action);">Rp89.000</span>
                        </div>
                        <button type="button" onclick="goToStep2()" style="display:flex; align-items:center; justify-content:center; gap:0.5rem; width:100%; padding:0.85rem; background:var(--account-action); color:#ffffff; font-weight:700; font-size:0.9rem; border:none; border-radius:10px; cursor:pointer; box-shadow:0 4px 6px -1px rgba(0,0,0,0.15); transition:all 0.2s;">
                            <span>Konfirmasi Paket &amp; Lanjut ke Pembayaran</span>
                            <span class="material-symbols-outlined" style="font-size:1.15rem;">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- ==================== STEP 2: INFORMASI PEMBAYARAN ==================== --}}
            <div id="modal-step-2" style="display:none;">
                {{-- Header Step 2 --}}
                <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #e2e8f0; display:flex; justify-content:space-between; align-items:center;">
                    <div style="display:flex; align-items:center; gap:0.6rem;">
                        <button type="button" onclick="goToStep1()" title="Kembali pilih paket" style="background:#f1f5f9; border:none; color:#334155; cursor:pointer; width:34px; height:34px; display:inline-flex; align-items:center; justify-content:center; border-radius:8px;">
                            <span class="material-symbols-outlined" style="font-size:1.2rem;">arrow_back</span>
                        </button>
                        <div>
                            <h2 style="font-size:1.15rem; font-weight:800; color:#0f172a; margin:0;">Pembayaran</h2>
                            <p style="font-size:0.775rem; color:#64748b; margin:0;">Informasi sistem pembayaran kuota AI</p>
                        </div>
                    </div>
                    <button type="button" onclick="closeQuotaModal()" style="background:transparent; border:none; color:#64748b; cursor:pointer; padding:0.25rem; display:inline-flex; border-radius:6px;" aria-label="Tutup">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                {{-- Body Step 2 --}}
                <div style="padding:1.5rem; text-align:center;">
                    {{-- Ringkasan Paket Terpilih --}}
                    <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:0.85rem 1rem; margin-bottom:1.25rem; display:flex; justify-content:space-between; align-items:center; text-align:left;">
                        <div>
                            <span style="font-size:0.725rem; color:#64748b; display:block;">Paket yang dipilih:</span>
                            <strong id="step2-selected-name" style="font-size:0.95rem; color:#0f172a;">+1.000 Pesan</strong>
                        </div>
                        <span id="step2-selected-price" style="font-size:1.2rem; font-weight:900; color:var(--account-action);">Rp89.000</span>
                    </div>
                    {{-- Pesan Sistem Pembayaran Sedang Dalam Pengembangan --}}
                    <div style="background:#fffbeb; border:1px solid #fde68a; border-radius:16px; padding:1.75rem 1.25rem; margin-bottom:1.25rem;">
                        <div style="width:52px; height:52px; background:#fef3c7; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; margin-bottom:0.75rem; color:#d97706;">
                            <span class="material-symbols-outlined" style="font-size:1.8rem;">construction</span>
                        </div>
                        <h3 style="font-size:1.05rem; font-weight:800; color:#92400e; margin:0 0 0.4rem;">
                            Sistem Pembayaran Sedang Dalam Pengembangan
                        </h3>
                        <p style="font-size:0.825rem; color:#78350f; margin:0; line-height:1.5;">
                            Fitur pembayaran otomatis via Payment Gateway saat ini belum tersedia dan sedang dibuat oleh Tim Webdev Webia.
                        </p>
                        <p style="font-size:0.8rem; color:#92400e; margin:0.75rem 0 0; font-weight:600;">
                            Untuk memproses upgrade paket ini, silakan konfirmasi langsung ke Admin kami via WhatsApp.
                        </p>
                    </div>
                    {{-- Tombol Konfirmasi WhatsApp --}}
                    <div style="display:flex; flex-direction:column; gap:0.6rem;">
                        <a id="btn-wa-confirm" href="#" target="_blank" style="display:flex; align-items:center; justify-content:center; gap:0.5rem; width:100%; padding:0.85rem; background:#1e8e3e; color:#ffffff; font-weight:800; font-size:0.9rem; border-radius:10px; text-decoration:none; box-shadow:0 4px 6px -1px rgba(30,142,62,0.3); transition:all 0.2s;">
                            <span class="material-symbols-outlined" style="font-size:1.25rem;">chat</span>
                            Konfirmasi via WhatsApp →
                        </a>
                        <button type="button" onclick="goToStep1()" style="background:transparent; border:none; color:#64748b; font-size:0.8rem; text-decoration:underline; cursor:pointer; padding:0.4rem 0;">
                            ← Kembali Pilih Paket Lain
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const CLIENT_ORDER_INFO = {
            site_slug: @json($order->site_slug ?? ''),
            order_number: @json($order->order_number ?? ''),
            business_name: @json($order->business_data['business_name'] ?? ($order->site_slug ?? 'Website Bisnis')),
            owner_name: @json(auth()->user()->name ?? 'Klien'),
            admin_wa: '6281234567890'
        };
        let currentSelected = {
            name: '+1.000 Pesan',
            price: 'Rp89.000'
        };
        function updateWaLink() {
            const btn = document.getElementById('btn-wa-confirm');
            if (!btn) return;
            const text = `Halo Admin Webia, saya ingin upgrade kuota AI website saya:\n` +
                `• Pilihan Paket: ${currentSelected.name} (${currentSelected.price})\n` +
                `• Website: ${CLIENT_ORDER_INFO.business_name} (${CLIENT_ORDER_INFO.site_slug || CLIENT_ORDER_INFO.order_number})\n` +
                `• Atas Nama: ${CLIENT_ORDER_INFO.owner_name}\n\n` +
                `Karena sistem pembayaran otomatis sedang dalam pengembangan, mohon info rekening tujuan transfer untuk memproses upgrade kuota ini secara manual. Terima kasih!`;
            btn.href = `https://wa.me/${CLIENT_ORDER_INFO.admin_wa}?text=${encodeURIComponent(text)}`;
        }
        function openQuotaModal(defaultTab = 'booster') {
            const modal = document.getElementById('quotaModal');
            if (modal) {
                modal.style.display = 'flex';
                goToStep1();
                switchModalTab(defaultTab);
            }
        }
        function closeQuotaModal() {
            const modal = document.getElementById('quotaModal');
            if (modal) modal.style.display = 'none';
        }
        function goToStep1() {
            const s1 = document.getElementById('modal-step-1');
            const s2 = document.getElementById('modal-step-2');
            if (s1 && s2) {
                s1.style.display = 'block';
                s2.style.display = 'none';
            }
        }
        function goToStep2() {
            const s1 = document.getElementById('modal-step-1');
            const s2 = document.getElementById('modal-step-2');
            if (s1 && s2) {
                // Sinkronkan data terpilih ke Step 2
                const s2Name = document.getElementById('step2-selected-name');
                const s2Price = document.getElementById('step2-selected-price');
                if (s2Name) s2Name.textContent = currentSelected.name;
                if (s2Price) s2Price.textContent = currentSelected.price;
                s1.style.display = 'none';
                s2.style.display = 'block';
                updateWaLink();
            }
        }
        function switchModalTab(tab) {
            const btnBooster = document.getElementById('tab-booster');
            const btnUpgrade = document.getElementById('tab-upgrade');
            const contentBooster = document.getElementById('content-booster');
            const contentUpgrade = document.getElementById('content-upgrade');
            if (tab === 'booster') {
                btnBooster.style.background = '#ffffff';
                btnBooster.style.color = '#0f172a';
                btnBooster.style.fontWeight = '700';
                btnBooster.style.boxShadow = '0 1px 3px rgba(0,0,0,0.1)';
                btnUpgrade.style.background = 'transparent';
                btnUpgrade.style.color = '#64748b';
                btnUpgrade.style.fontWeight = '600';
                btnUpgrade.style.boxShadow = 'none';
                contentBooster.style.display = 'block';
                contentUpgrade.style.display = 'none';
                selectOption('booster_std', '+1.000 Pesan', 'Rp89.000');
            } else {
                btnUpgrade.style.background = '#ffffff';
                btnUpgrade.style.color = '#0f172a';
                btnUpgrade.style.fontWeight = '700';
                btnUpgrade.style.boxShadow = '0 1px 3px rgba(0,0,0,0.1)';
                btnBooster.style.background = 'transparent';
                btnBooster.style.color = '#64748b';
                btnBooster.style.fontWeight = '600';
                btnBooster.style.boxShadow = 'none';
                contentUpgrade.style.display = 'block';
                contentBooster.style.display = 'none';
                selectOption('up_pulse', 'Upgrade ke Paket Pulse (1.500 pesan/bln)', 'Rp400.000');
            }
        }
        function selectOption(key, name, priceFormatted) {
            currentSelected = { name, price: priceFormatted };
            const s1Name = document.getElementById('step1-selected-name');
            const s1Price = document.getElementById('step1-selected-price');
            if (s1Name) s1Name.textContent = name;
            if (s1Price) s1Price.textContent = priceFormatted;
            // Reset borders
            const allLabels = document.querySelectorAll('#quotaModal label[id^="opt-"]');
            allLabels.forEach(lbl => {
                lbl.style.borderColor = '#e2e8f0';
                lbl.style.background = '#ffffff';
                const rad = lbl.querySelector('input[type="radio"]');
                if (rad) rad.checked = false;
            });
            // Highlight chosen
            const chosen = document.getElementById(`opt-${key}`);
            if (chosen) {
                chosen.style.borderColor = 'var(--account-action)';
                chosen.style.background = '#f8fafc';
                const rad = chosen.querySelector('input[type="radio"]');
                if (rad) rad.checked = true;
            }
        }
        function copyNorek(number, btn) {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(number).then(() => {
                    const originalText = btn.textContent;
                    btn.textContent = 'Tersalin ✓';
                    btn.style.background = '#dcfce7';
                    btn.style.color = '#15803d';
                    setTimeout(() => {
                        btn.textContent = originalText;
                        btn.style.background = '#ffffff';
                        btn.style.color = '#334155';
                    }, 2000);
                });
            }
        }
        // Close on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeQuotaModal();
        });
        // Initialize link on load
        document.addEventListener('DOMContentLoaded', updateWaLink);
    function updateWelcomePreview(text) {
        const el = document.getElementById('welcomePreviewText');
        if (el) el.innerText = text || 'Halo! Senang Anda mampir ke website kami. Ada yang bisa kami bantu hari ini?';
    }

    function applyWelcomeTemplate(type) {
        const welcomeInput = document.getElementById('welcome_message');
        if (!welcomeInput) return;
        if (type === 'friendly') {
            welcomeInput.value = 'Halo! Senang Anda mampir ke website kami. Ada yang bisa kami bantu hari ini? 😊';
        } else if (type === 'sales') {
            welcomeInput.value = 'Halo! Selamat datang. Sedang mencari produk, promo terbaru, atau butuh bantuan pemesanan?';
        } else if (type === 'service') {
            welcomeInput.value = 'Selamat datang! Silakan tanyakan informasi mengenai layanan, jadwal konsultasi, atau penawaran kami.';
        } else if (type === 'formal') {
            welcomeInput.value = 'Selamat datang di website resmi kami. Kami siap membantu memberikan informasi yang Anda butuhkan.';
        }
        updateWelcomePreview(welcomeInput.value);
    }

    function toggleOnlineOnlyMode(isOnline) {
        const physicalBox = document.getElementById('physicalAddressBox');
        const onlineNotice = document.getElementById('onlineOnlyNoticeBox');
        const previewEl = document.getElementById('previewAlamatText');
        const alamatInput = document.getElementById('alamat');

        if (physicalBox) physicalBox.style.display = isOnline ? 'none' : 'block';
        if (onlineNotice) onlineNotice.style.display = isOnline ? 'flex' : 'none';

        if (isOnline) {
            if (previewEl) previewEl.textContent = 'Layanan kami beroperasi penuh secara online dan melayani pelanggan secara digital tanpa kantor fisik.';
        } else {
            const currentVal = alamatInput ? alamatInput.value.trim() : '';
            if (previewEl) previewEl.textContent = currentVal || 'Alamat fisik belum diatur';
        }
    }

    function updateAlamatPreview(val) {
        const isOnline = document.getElementById('is_online_only')?.checked;
        if (isOnline) return;
        const previewEl = document.getElementById('previewAlamatText');
        if (previewEl) {
            previewEl.textContent = val.trim() || 'Alamat fisik belum diatur';
        }
    }
    </script>
    @endif
</section>
@endsection
