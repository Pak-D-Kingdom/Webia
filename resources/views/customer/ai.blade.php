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
                    AI Engine &amp; 9-router aktif
                </span>
            @else
                <span style="display:inline-flex; align-items:center; gap:0.4rem; padding:0.4rem 0.85rem; border-radius:999px; font-size:0.8rem; font-weight:700; background:#fef7e0; color:#b06000; border:1px solid #fde293;">
                    <span style="width:8px; height:8px; border-radius:50%; background:#f9ab00;"></span>
                    AI Engine offline{{ ($aiConnection['sqlite_available'] ?? false) ? ' · data lokal tersedia' : '' }}
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
    {{-- Notifikasi Pop-Up (Muncul Mengambang / Pop Up Saja, Tidak Di Atas Halaman) --}}
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof showAiPopup === 'function') {
                    showAiPopup('Berhasil Disimpan!', @json(session('success')), true);
                }
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof showAiPopup === 'function') {
                    showAiPopup('Terjadi Kesalahan', @json(session('error')), false);
                }
            });
        </script>
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
                <button type="button" data-ai-quota-alert style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.825rem; font-weight:700; color:#fff; background:#d93025; border:none; padding:0.45rem 0.95rem; border-radius:6px; cursor:pointer;">
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
                <button type="button" data-ai-quota-alert style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.825rem; font-weight:700; color:#fff; background:#b06000; border:none; padding:0.45rem 0.95rem; border-radius:6px; cursor:pointer;">
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
                    Template: <strong style="color:var(--account-ink);">{{ $order->template?->name ?? $order->template_snapshot['name'] ?? 'Template Webia' }}</strong>
                </div>
                <div style="display:inline-flex; align-items:center; gap:0.35rem; font-size:0.8rem; font-weight:600; color:var(--account-teal); margin-bottom:0.5rem;">
                    <span class="material-symbols-outlined" style="font-size:0.95rem;">verified</span>
                    Paket {{ $order->package?->name ?? ucfirst($quotaData['package_tier'] ?? 'Pixel') }} ({{ number_format($quotaData['monthly_quota'] ?? 500) }} pesan/bln)
                </div>
            </div>
            <div style="margin-top:1.25rem; padding-top:1rem; border-top:1px solid var(--account-line); display:flex; justify-content:space-between; align-items:center;">
                <div style="font-size:0.785rem; color:var(--account-muted);">
                    Tenant ID: <code>{{ $quotaData['tenant_id'] ?? ($order->site_slug ?? 'Dalam Proses') }}</code>
                </div>
                @if ($order->site_slug)
                    <a href="{{ route('sites.show', ['order' => $order->site_slug]) }}" target="_blank" style="font-size:0.785rem; font-weight:700; color:var(--account-action); text-decoration:none; display:inline-flex; align-items:center; gap:0.2rem;">
                        Buka Web <span class="material-symbols-outlined" style="font-size:0.95rem;">open_in_new</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
    {{-- Dipensiunkan: seluruh informasi kini dikelola dari satu editor Knowledge Base di bawah. --}}
    @if (false)
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

        <form id="businessInfoForm" method="POST" action="{{ route('customer.ai.business-info') }}">
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

                        {{-- Quick Preset Template Buttons (3 Pilihan Utama) --}}
                        <div style="display:flex; align-items:center; gap:0.4rem; flex-wrap:wrap; margin-bottom:0.6rem;">
                            <span style="font-size:0.7rem; font-weight:700; color:var(--account-muted);">Template Cepat:</span>
                            <button type="button" onclick="applyWelcomeTemplate('friendly')" style="background:#eef2ff; border:1px solid #c7d2fe; color:#4338ca; border-radius:6px; padding:0.25rem 0.6rem; font-size:0.72rem; font-weight:600; cursor:pointer; transition:all 0.15s;">
                                ✨ Ramah &amp; Santai
                            </button>
                            <button type="button" onclick="applyWelcomeTemplate('professional')" style="background:#f0fdf4; border:1px solid #bbf7d0; color:#15803d; border-radius:6px; padding:0.25rem 0.6rem; font-size:0.72rem; font-weight:600; cursor:pointer; transition:all 0.15s;">
                                💼 Profesional &amp; Solutif
                            </button>
                            <button type="button" onclick="applyWelcomeTemplate('sales')" style="background:#fef3c7; border:1px solid #fde68a; color:#b45309; border-radius:6px; padding:0.25rem 0.6rem; font-size:0.72rem; font-weight:600; cursor:pointer; transition:all 0.15s;">
                                🛍️ Promo &amp; Penjualan
                            </button>
                        </div>

                        <textarea id="welcome_message" name="welcome_message" rows="3" required
                                  placeholder="Contoh: Halo! Senang Anda mampir ke website kami. Ada yang bisa kami bantu hari ini?"
                                  oninput="updateWelcomePreview(this.value)"
                                  style="width:100%; box-sizing:border-box; padding:0.75rem 0.85rem; border:1px solid var(--account-line); border-radius:var(--account-radius); font-size:0.85rem; background:#fff; color:var(--account-ink); resize:none; line-height:1.45; font-family:inherit;">{{ $currentWelcome }}</textarea>
                        
                        {{-- Live Preview Balon Chat (Modern Messenger UI) --}}
                        <div style="margin-top:0.85rem; background:#f1f5f9; border:1px solid #e2e8f0; border-radius:12px; padding:0.85rem; box-shadow:inset 0 1px 2px rgba(0,0,0,0.03);">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;">
                                <div style="display:flex; align-items:center; gap:0.4rem;">
                                    <span class="material-symbols-outlined" style="font-size:0.95rem; color:#6366f1;">visibility</span>
                                    <span style="font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; color:#475569;">
                                        Preview Balon Chatbot
                                    </span>
                                </div>
                                <span style="font-size:0.65rem; color:#15803d; font-weight:700; background:#dcfce7; border:1px solid #bbf7d0; padding:0.15rem 0.5rem; border-radius:999px; display:inline-flex; align-items:center; gap:0.25rem;">
                                    <span style="width:5px; height:5px; border-radius:50%; background:#16a34a; box-shadow:0 0 0 2px rgba(22,163,74,0.2);"></span>
                                    Tampil di Website
                                </span>
                            </div>

                            <div style="display:flex; align-items:flex-start; gap:0.6rem;">
                                <div style="width:30px; height:30px; border-radius:50%; background:linear-gradient(135deg, #6366f1 0%, #4338ca 100%); color:#fff; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 4px rgba(99,102,241,0.25); flex-shrink:0;">
                                    <span class="material-symbols-outlined" style="font-size:1rem;">smart_toy</span>
                                </div>
                                <div style="position:relative; background:#ffffff; border:1px solid #e2e8f0; border-radius:14px; border-top-left-radius:3px; padding:0.75rem 0.95rem; box-shadow:0 2px 8px -2px rgba(15,23,42,0.06); max-width:100%; width:100%;">
                                    <div style="font-size:0.68rem; font-weight:700; color:#6366f1; margin-bottom:0.25rem; display:flex; align-items:center; gap:0.25rem;">
                                        <span>Asisten AI</span>
                                        <span style="color:#94a3b8; font-weight:400;">• Balon Sapaan</span>
                                    </div>
                                    <div id="welcomePreviewText" style="font-size:0.825rem; color:#0f172a; line-height:1.5; word-break:break-word;">
                                        {{ $currentWelcome }}
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-modal-open="#ai-preview-modal" style="margin-top:0.75rem; display:inline-flex; align-items:center; gap:0.35rem; font-size:0.775rem; font-weight:700; color:var(--account-action); background:#fff; border:1px solid var(--account-line); padding:0.45rem 0.85rem; border-radius:var(--account-radius); cursor:pointer;">
                                <span class="material-symbols-outlined" style="font-size:0.95rem;">visibility</span>
                                Preview chatbot bisnis
                            </button>
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

                        {{-- Live Preview Balasan Bot AI Mengenai Alamat (Mini Conversation UI) --}}
                        <div style="margin-top:0.85rem; background:#f1f5f9; border:1px solid #e2e8f0; border-radius:12px; padding:0.85rem; box-shadow:inset 0 1px 2px rgba(0,0,0,0.03);">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.55rem;">
                                <div style="display:flex; align-items:center; gap:0.4rem;">
                                    <span class="material-symbols-outlined" style="font-size:0.95rem; color:#0284c7;">forum</span>
                                    <span style="font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; color:#475569;">
                                        Simulasi Tanya Lokasi
                                    </span>
                                </div>
                                <span style="font-size:0.65rem; color:#0369a1; font-weight:700; background:#e0f2fe; border:1px solid #bae6fd; padding:0.15rem 0.5rem; border-radius:999px;">
                                    Respon Otomatis
                                </span>
                            </div>

                            <div style="display:flex; flex-direction:column; gap:0.5rem;">
                                {{-- Balon Pengunjung (User Bubble) --}}
                                <div style="display:flex; justify-content:flex-end;">
                                    <div style="background:#e0e7ff; color:#3730a3; border-radius:12px; border-bottom-right-radius:2px; padding:0.4rem 0.75rem; font-size:0.75rem; font-weight:600; max-width:85%; display:inline-flex; align-items:center; gap:0.35rem;">
                                        <span>Kak, lokasi operasional atau alamat tokonya di mana?</span>
                                    </div>
                                </div>

                                {{-- Balon Asisten AI (Bot Bubble) --}}
                                <div style="display:flex; align-items:flex-start; gap:0.5rem;">
                                    <div style="width:28px; height:28px; border-radius:50%; background:linear-gradient(135deg, #0284c7 0%, #0369a1 100%); color:#fff; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 4px rgba(2,132,199,0.25); flex-shrink:0;">
                                        <span class="material-symbols-outlined" style="font-size:0.95rem;">smart_toy</span>
                                    </div>
                                    <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:12px; border-top-left-radius:2px; padding:0.65rem 0.85rem; box-shadow:0 2px 8px -2px rgba(15,23,42,0.06); max-width:92%; width:100%;">
                                        <div style="display:flex; align-items:center; gap:0.35rem; font-size:0.68rem; font-weight:700; color:#0284c7; margin-bottom:0.25rem;">
                                            <span class="material-symbols-outlined" style="font-size:0.85rem;">pin_drop</span>
                                            <span>Info Lokasi Bot</span>
                                        </div>
                                        <div id="previewAlamatText" style="font-size:0.8rem; color:#0f172a; line-height:1.45; word-break:break-word;">
                                            {{ $isOnlineOnly ? 'Layanan kami beroperasi penuh secara online dan melayani pelanggan secara digital tanpa kantor fisik.' : ($currentAlamat ?: 'Alamat fisik belum diatur') }}
                                        </div>
                                    </div>
                                </div>
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
                <button id="btnSubmitBusinessInfo" type="submit" style="background:var(--account-action); color:#fff; border:none; padding:0.75rem 1.75rem; border-radius:var(--account-radius); font-weight:700; font-size:0.875rem; cursor:pointer; display:inline-flex; align-items:center; gap:0.45rem; box-shadow:0 2px 4px rgba(0,0,0,0.08); transition:opacity 0.2s;">
                    <span class="material-symbols-outlined" style="font-size:1.15rem;">save</span>
                    Simpan Pengaturan &amp; Info Bisnis
                </button>
            </div>
        </form>
    </div>
    @endif

    {{-- FORM KNOWLEDGE BASE MANDIRI: 4 Dokumen Panduan AI --}}
    @if ($canEditKnowledge)
        <div class="legacy-customer-kb-editor customer-create-card" aria-hidden="true" style="display: none;">
            <div style="margin-bottom: 1.25rem;">
                <h2 class="customer-create-legend" style="margin: 0;">
                    <span aria-hidden="true" class="material-symbols-outlined">auto_stories</span>
                    Editor Knowledge Base
                </h2>
                <p class="customer-create-option-desc" style="margin-top: 0.35rem;">
                    Tambahkan informasi yang memang berlaku untuk bisnis Anda. Setiap bagian bersifat opsional dan tidak dibatasi jenis usaha tertentu.
                </p>
            </div>

            <form method="POST" action="{{ route('customer.ai.knowledge') }}" id="custKnowledgeForm" onsubmit="syncAllCustStructuredToRaw()">
                @csrf
                {{-- Selector 4 Berkas menggunakan .customer-filter Webia (1 baris penuh, tanpa teks .md) --}}
                <div style="margin-bottom: 1.25rem; width: 100%;">
                    <nav class="customer-filter kb-tabs-row" aria-label="Pilih kategori knowledge base" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px; width: 100%;">
                        <button type="button" id="custKbBtnLayanan" aria-current="page" onclick="switchCustomerKbTab('layanan')" style="justify-content: center; text-align: center; white-space: nowrap; padding: 10px 8px;">
                            <span class="material-symbols-outlined" style="font-size: 1.15rem; margin-right: 4px;">restaurant_menu</span>
                            Informasi
                        </button>
                        <button type="button" id="custKbBtnFaq" onclick="switchCustomerKbTab('faq')" style="justify-content: center; text-align: center; white-space: nowrap; padding: 10px 8px;">
                            <span class="material-symbols-outlined" style="font-size: 1.15rem; margin-right: 4px;">help</span>
                            FAQ
                        </button>
                        <button type="button" id="custKbBtnKebijakan" onclick="switchCustomerKbTab('kebijakan')" style="justify-content: center; text-align: center; white-space: nowrap; padding: 10px 8px;">
                            <span class="material-symbols-outlined" style="font-size: 1.15rem; margin-right: 4px;">policy</span>
                            Kebijakan
                        </button>
                        <button type="button" id="custKbBtnProfil" onclick="switchCustomerKbTab('profil')" style="justify-content: center; text-align: center; white-space: nowrap; padding: 10px 8px;">
                            <span class="material-symbols-outlined" style="font-size: 1.15rem; margin-right: 4px;">badge</span>
                            Profil
                        </button>
                    </nav>
                </div>

                @php
                    $rawFaq = $knowledge['faq_raw'] ?? (is_string($knowledge['faq'] ?? null) ? $knowledge['faq'] : '');
                    if (empty($rawFaq) && is_array($knowledge['faq'] ?? null)) {
                        $rawFaq = "# Tanya Jawab (FAQ)\n\n";
                        foreach ($knowledge['faq'] as $fItem) {
                            $rawFaq .= "### Q: " . ($fItem['question'] ?? '') . "\nA: " . ($fItem['answer'] ?? '') . "\n\n";
                        }
                    }
                @endphp

                {{-- Hidden textareas to submit markdown to backend --}}
                <textarea id="layanan" name="layanan" style="display: none;">{{ old('layanan', $knowledge['layanan'] ?? '') }}</textarea>
                <textarea id="faq" name="faq" style="display: none;">{{ old('faq', $rawFaq) }}</textarea>
                <textarea id="kebijakan" name="kebijakan" style="display: none;">{{ old('kebijakan', $knowledge['kebijakan'] ?? '') }}</textarea>
                <textarea id="profil" name="profil" style="display: none;">{{ old('profil', $knowledge['profil'] ?? '') }}</textarea>

                {{-- ======================================================== --}}
                {{-- Tab 1: Informasi bisnis --}}
                {{-- ======================================================== --}}
                <div id="custKbDocLayanan" class="cust-kb-pane">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1rem; font-size: 0.825rem; color: #475569; display: flex; align-items: center; gap: 0.5rem;">
                        <span class="material-symbols-outlined" style="color: var(--account-action, #1a146b); font-size: 1.15rem;">info</span>
                        <span>Tambahkan produk, jasa, program, fasilitas, area, proses, portofolio, atau informasi lain yang relevan untuk bisnis Anda.</span>
                    </div>

                    <div id="custLayananItemsContainer">
                        {{-- Dynamic items --}}
                    </div>

                    <button type="button" onclick="addCustLayananItem()" style="display: inline-flex; align-items: center; gap: 0.4rem; background: #ffffff; border: 1px dashed var(--account-action, #1a146b); color: var(--account-action, #1a146b); padding: 0.65rem 1rem; border-radius: 8px; font-size: 0.825rem; font-weight: 700; cursor: pointer; width: 100%; justify-content: center; margin-top: 0.5rem; transition: background 0.2s;">
                        <span class="material-symbols-outlined" style="font-size: 1.15rem;">add_circle</span>
                        Tambah Informasi
                    </button>
                </div>

                {{-- ======================================================== --}}
                {{-- Tab 2: FAQ --}}
                {{-- ======================================================== --}}
                <div id="custKbDocFaq" class="cust-kb-pane" style="display: none;">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1rem; font-size: 0.825rem; color: #475569; display: flex; align-items: center; gap: 0.5rem;">
                        <span class="material-symbols-outlined" style="color: var(--account-action, #1a146b); font-size: 1.15rem;">help</span>
                        <span>Daftar tanya jawab umum (FAQ). Saat pengunjung menanyakan hal serupa, Chatbot AI akan menjawab sesuai jawaban di sini.</span>
                    </div>

                    <div id="custFaqItemsContainer">
                        {{-- Dynamic FAQ items --}}
                    </div>

                    <button type="button" onclick="addCustFaqItem()" style="display: inline-flex; align-items: center; gap: 0.4rem; background: #ffffff; border: 1px dashed var(--account-action, #1a146b); color: var(--account-action, #1a146b); padding: 0.65rem 1rem; border-radius: 8px; font-size: 0.825rem; font-weight: 700; cursor: pointer; width: 100%; justify-content: center; margin-top: 0.5rem; transition: background 0.2s;">
                        <span class="material-symbols-outlined" style="font-size: 1.15rem;">add_circle</span>
                        Tambah Tanya &amp; Jawab (FAQ)
                    </button>
                </div>

                {{-- ======================================================== --}}
                {{-- Tab 3: Kebijakan --}}
                {{-- ======================================================== --}}
                <div id="custKbDocKebijakan" class="cust-kb-pane" style="display: none;">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1rem; font-size: 0.825rem; color: #475569; display: flex; align-items: center; gap: 0.5rem;">
                        <span class="material-symbols-outlined" style="color: var(--account-action, #1a146b); font-size: 1.15rem;">policy</span>
                        <span>Tambahkan aturan, batasan, proses, atau ketentuan yang harus dipatuhi chatbot. Isi hanya bagian yang benar-benar berlaku untuk bisnis Anda.</span>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                            <div style="display: flex; align-items: center; gap: 0.45rem; margin-bottom: 0.45rem;">
                                <span class="material-symbols-outlined" style="font-size: 1.15rem; color: var(--account-action, #1a146b);">payments</span>
                                <strong style="font-size: 0.85rem; color: #1e293b;">1. Ketentuan utama (opsional)</strong>
                            </div>
                            <textarea id="custKbPayment" rows="3" placeholder="Contoh: Ketentuan pemesanan, akses layanan, jadwal, atau aturan utama bisnis." oninput="syncCustKebijakanToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;"></textarea>
                        </div>

                        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                            <div style="display: flex; align-items: center; gap: 0.45rem; margin-bottom: 0.45rem;">
                                <span class="material-symbols-outlined" style="font-size: 1.15rem; color: var(--account-action, #1a146b);">event_busy</span>
                                <strong style="font-size: 0.85rem; color: #1e293b;">2. Batasan atau pengecualian (opsional)</strong>
                            </div>
                            <textarea id="custKbCancel" rows="3" placeholder="Contoh: Hal yang tidak tersedia, syarat khusus, batas wilayah, atau batas waktu." oninput="syncCustKebijakanToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;"></textarea>
                        </div>

                        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                            <div style="display: flex; align-items: center; gap: 0.45rem; margin-bottom: 0.45rem;">
                                <span class="material-symbols-outlined" style="font-size: 1.15rem; color: var(--account-action, #1a146b);">verified_user</span>
                                <strong style="font-size: 0.85rem; color: #1e293b;">3. Proses tindak lanjut (opsional)</strong>
                            </div>
                            <textarea id="custKbWarranty" rows="3" placeholder="Contoh: Cara menghubungi admin, alur pengajuan, atau tindak lanjut pertanyaan khusus." oninput="syncCustKebijakanToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;"></textarea>
                        </div>
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- Tab 4: Profil --}}
                {{-- ======================================================== --}}
                <div id="custKbDocProfil" class="cust-kb-pane" style="display: none;">
                    <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1rem; font-size: 0.825rem; color: #475569; display: flex; align-items: center; gap: 0.5rem;">
                        <span class="material-symbols-outlined" style="color: var(--account-action, #1a146b); font-size: 1.15rem;">badge</span>
                        <span>Atur identitas bisnis serta gaya komunikasi yang diinginkan saat chatbot menyapa pengunjung.</span>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
                            <div class="form-field" style="margin: 0;">
                                <label for="custProfBrandName" style="font-size: 0.78rem;">Nama Brand / Usaha</label>
                                <input type="text" id="custProfBrandName" value="{{ $business['business_name'] ?? 'Bisnis Klien' }}" oninput="syncCustProfilToRaw()">
                            </div>
                            <div class="form-field" style="margin: 0;">
                                <label for="custProfTagline" style="font-size: 0.78rem;">Tagline Bisnis</label>
                                <input type="text" id="custProfTagline" value="{{ $business['tagline'] ?? 'Layanan Profesional dan Terpercaya' }}" oninput="syncCustProfilToRaw()">
                            </div>
                        </div>

                        <div class="form-field" style="margin: 0;">
                            <label for="custProfTone" style="font-size: 0.78rem;">Gaya komunikasi</label>
                            <select id="custProfTone" onchange="syncCustProfilToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;">
                                <option value="Ramah, sopan, informatif, dan solutif.">Ramah, Sopan &amp; Solutif (Disarankan untuk Bisnis Jasa / Toko)</option>
                                <option value="Kasual, santai, akrab, dan bersahabat.">Kasual, Santai &amp; Akrab (Cocok untuk Kafe / Brand Komunitas)</option>
                                <option value="Formal, profesional, ringkas, dan presisi.">Formal, Profesional &amp; Korporat (Cocok untuk B2B / Konsultan)</option>
                            </select>
                        </div>

                        <div class="form-field" style="margin: 0;">
                            <label for="custProfGreeting" style="font-size: 0.78rem;">Sapaan pembuka</label>
                            <textarea id="custProfGreeting" rows="3" placeholder="Sapaan yang diucapkan bot saat balon chat dibuka pengunjung..." oninput="syncCustProfilToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0.6rem; font-size: 0.825rem;">Halo! Selamat datang di {{ $business['business_name'] ?? 'website kami' }}, ada yang bisa kami bantu hari ini? 😊</textarea>
                        </div>
                    </div>
                </div>

                <div class="customer-create-submit" style="margin-top: 1.25rem;">
                    <button class="account-submit customer-create-submit-btn" type="submit">
                        Simpan Seluruh Dokumen Knowledge Base
                    </button>
                </div>
            </form>
        </div>

        <script>
            // Sub-doc Tabs
            function switchCustomerKbTab(doc) {
                const tabs = ['layanan', 'faq', 'kebijakan', 'profil'];
                tabs.forEach(function(t) {
                    const pane = document.getElementById('custKbDoc' + t.charAt(0).toUpperCase() + t.slice(1));
                    const btn = document.getElementById('custKbBtn' + t.charAt(0).toUpperCase() + t.slice(1));
                    if (t === doc) {
                        if (pane) pane.style.display = 'block';
                        if (btn) btn.setAttribute('aria-current', 'page');
                    } else {
                        if (pane) pane.style.display = 'none';
                        if (btn) btn.removeAttribute('aria-current');
                    }
                });
            }

            // Dynamic Layanan Items
            function addCustLayananItem(name = '', price = '', desc = '') {
                const container = document.getElementById('custLayananItemsContainer');
                if (!container) return;
                const idx = container.querySelectorAll('.cust-lay-card').length + 1;
                const card = document.createElement('div');
                card.className = 'cust-lay-card';
                card.style.cssText = 'background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; margin-bottom: 0.85rem;';
                card.innerHTML = `
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.65rem;">
                        <span style="font-weight: 700; font-size: 0.825rem; color: var(--account-action, #1a146b);">Informasi #<span class="cust-card-num">${idx}</span></span>
                        <button type="button" onclick="removeCustLayananItem(this)" style="background: transparent; border: none; color: #dc2626; cursor: pointer; padding: 0; display: inline-flex; align-items: center;" title="Hapus Layanan">
                            <span class="material-symbols-outlined" style="font-size: 1.15rem;">delete</span>
                        </button>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.65rem; margin-bottom: 0.65rem;">
                        <div>
                            <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Judul informasi</label>
                            <input type="text" class="c-lay-name" value="${escapeCustHtml(name)}" placeholder="Contoh: Area layanan atau program unggulan" oninput="syncCustLayananToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Nilai, harga, atau status (opsional)</label>
                            <input type="text" class="c-lay-price" value="${escapeCustHtml(price)}" placeholder="Contoh: Mulai Rp150.000 atau Tersedia online" oninput="syncCustLayananToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">
                        </div>
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Detail informasi</label>
                        <textarea class="c-lay-desc" rows="2" placeholder="Jelaskan apa saja yang didapat, pengerjaan, atau garansinya..." oninput="syncCustLayananToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">${escapeCustHtml(desc)}</textarea>
                    </div>
                `;
                container.appendChild(card);
                syncCustLayananToRaw();
            }

            function removeCustLayananItem(btn) {
                const card = btn.closest('.cust-lay-card');
                if (card) {
                    card.remove();
                    renumberCustCards('custLayananItemsContainer', '.cust-card-num');
                    syncCustLayananToRaw();
                }
            }

            // Dynamic FAQ Items
            function addCustFaqItem(question = '', answer = '') {
                const container = document.getElementById('custFaqItemsContainer');
                if (!container) return;
                const idx = container.querySelectorAll('.cust-faq-card').length + 1;
                const card = document.createElement('div');
                card.className = 'cust-faq-card';
                card.style.cssText = 'background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem; margin-bottom: 0.85rem;';
                card.innerHTML = `
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.65rem;">
                        <span style="font-weight: 700; font-size: 0.825rem; color: var(--account-action, #1a146b);">Pertanyaan #<span class="cust-card-num">${idx}</span></span>
                        <button type="button" onclick="removeCustFaqItem(this)" style="background: transparent; border: none; color: #dc2626; cursor: pointer; padding: 0; display: inline-flex; align-items: center;" title="Hapus Tanya Jawab">
                            <span class="material-symbols-outlined" style="font-size: 1.15rem;">delete</span>
                        </button>
                    </div>
                    <div style="margin-bottom: 0.65rem;">
                        <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Pertanyaan Pelanggan (Q)</label>
                        <input type="text" class="c-faq-q" value="${escapeCustHtml(question)}" placeholder="Contoh: Bagaimana cara memesan?" oninput="syncCustFaqToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.75rem; color: #475569; margin-bottom: 0.25rem;">Jawaban Akurat Chatbot (A)</label>
                        <textarea class="c-faq-a" rows="2" placeholder="Jawaban resmi yang harus disampaikan oleh chatbot..." oninput="syncCustFaqToRaw()" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 0.5rem; font-size: 0.825rem;">${escapeCustHtml(answer)}</textarea>
                    </div>
                `;
                container.appendChild(card);
                syncCustFaqToRaw();
            }

            function removeCustFaqItem(btn) {
                const card = btn.closest('.cust-faq-card');
                if (card) {
                    card.remove();
                    renumberCustCards('custFaqItemsContainer', '.cust-card-num');
                    syncCustFaqToRaw();
                }
            }

            function renumberCustCards(containerId, selector) {
                const container = document.getElementById(containerId);
                if (!container) return;
                container.querySelectorAll(selector).forEach((el, i) => {
                    el.textContent = i + 1;
                });
            }

            function escapeCustHtml(text) {
                if (!text) return '';
                return String(text)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;');
            }

            // Syncing Logic
            function syncCustLayananToRaw() {
                const container = document.getElementById('custLayananItemsContainer');
                const rawTextarea = document.getElementById('layanan');
                if (!container || !rawTextarea) return;

                let md = "# Informasi Bisnis\n\n";
                const cards = container.querySelectorAll('.cust-lay-card');
                cards.forEach(card => {
                    const name = card.querySelector('.c-lay-name')?.value?.trim();
                    const price = card.querySelector('.c-lay-price')?.value?.trim();
                    const desc = card.querySelector('.c-lay-desc')?.value?.trim();
                    if (name) {
                        md += `- **${name}**: ${desc || 'Informasi bisnis'}${price ? '. ' + price : ''}.\n`;
                    }
                });
                rawTextarea.value = md;
            }

            function syncCustFaqToRaw() {
                const container = document.getElementById('custFaqItemsContainer');
                const rawTextarea = document.getElementById('faq');
                if (!container || !rawTextarea) return;

                let md = "# Tanya Jawab (FAQ)\n\n";
                const cards = container.querySelectorAll('.cust-faq-card');
                cards.forEach(card => {
                    const q = card.querySelector('.c-faq-q')?.value?.trim();
                    const a = card.querySelector('.c-faq-a')?.value?.trim();
                    if (q && a) {
                        md += `### Q: ${q}\nA: ${a}\n\n`;
                    }
                });
                rawTextarea.value = md.trim() + "\n";
            }

            function syncCustKebijakanToRaw() {
                const rawTextarea = document.getElementById('kebijakan');
                if (!rawTextarea) return;

                const pay = document.getElementById('custKbPayment')?.value?.trim();
                const cancel = document.getElementById('custKbCancel')?.value?.trim();
                const warranty = document.getElementById('custKbWarranty')?.value?.trim();

                let md = "# Aturan & Ketentuan\n\n";
                if (pay) md += `## 1. Ketentuan Utama\n${pay}\n\n`;
                if (cancel) md += `## 2. Batasan atau Pengecualian\n${cancel}\n\n`;
                if (warranty) md += `## 3. Proses Tindak Lanjut\n${warranty}\n\n`;

                rawTextarea.value = md.trim() + "\n";
            }

            function syncCustProfilToRaw() {
                const rawTextarea = document.getElementById('profil');
                if (!rawTextarea) return;

                const brand = document.getElementById('custProfBrandName')?.value?.trim() || 'Bisnis Klien';
                const tagline = document.getElementById('custProfTagline')?.value?.trim() || 'Layanan Profesional dan Terpercaya';
                const tone = document.getElementById('custProfTone')?.value || 'Ramah, sopan, informatif, dan solutif.';
                const greeting = document.getElementById('custProfGreeting')?.value?.trim() || `Halo! Selamat datang di ${brand}, ada yang bisa kami bantu? 😊`;

                let md = "# Profil Bisnis\n\n";
                md += `- **Nama Brand**: ${brand}\n`;
                md += `- **Tagline**: ${tagline}\n`;
                md += `- **Sapaan AI**: ${greeting}\n`;
                md += `- **Gaya Komunikasi**: ${tone}\n`;

                rawTextarea.value = md;
            }

            function syncAllCustStructuredToRaw() {
                syncCustLayananToRaw();
                syncCustFaqToRaw();
                syncCustKebijakanToRaw();
                syncCustProfilToRaw();
            }

            // Init from raw markdown
            function initCustStructuredForms() {
                // 1. Layanan
                const rawLayanan = document.getElementById('layanan')?.value || '';
                const layLines = rawLayanan.split('\n');
                let foundLayanan = false;
                for (const line of layLines) {
                    const m = line.match(/^[-*]\s+\*\*(.*?)\*\*:\s*(.*)$/);
                    if (m) {
                        foundLayanan = true;
                        const name = m[1].trim();
                        const text = m[2].trim();
                        let price = '';
                        let desc = text;
                        const pMatch = text.match(/(Mulai\s+Rp[\d\.\,]+|Rp[\d\.\,]+[^\.\n]*)/i);
                        if (pMatch) {
                            price = pMatch[0].trim();
                            desc = text.replace(price, '').trim().replace(/^[\.\,\s\-]+|[\.\,\s\-]+$/g, '');
                        }
                        addCustLayananItem(name, price, desc);
                    }
                }

                // 2. FAQ
                const rawFaq = document.getElementById('faq')?.value || '';
                const faqMatches = [...rawFaq.matchAll(/###\s*Q:\s*([^\n]+)\s*\n+\s*A:\s*([\s\S]*?)(?=(?:###\s*Q:|$))/g)];
                if (faqMatches.length > 0) {
                    faqMatches.forEach(m => {
                        addCustFaqItem(m[1].trim(), m[2].trim());
                    });
                }

                // 3. Kebijakan
                const rawKebijakan = document.getElementById('kebijakan')?.value || '';
                const sec1 = rawKebijakan.match(/## 1\.[^\n]*\n([\s\S]*?)(?=(?:## 2\.|$))/);
                const sec2 = rawKebijakan.match(/## 2\.[^\n]*\n([\s\S]*?)(?=(?:## 3\.|$))/);
                const sec3 = rawKebijakan.match(/## 3\.[^\n]*\n([\s\S]*?)(?=(?:## \d+\.|$))/);
                if (sec1 && document.getElementById('custKbPayment')) document.getElementById('custKbPayment').value = sec1[1].trim();
                if (sec2 && document.getElementById('custKbCancel')) document.getElementById('custKbCancel').value = sec2[1].trim();
                if (sec3 && document.getElementById('custKbWarranty')) document.getElementById('custKbWarranty').value = sec3[1].trim();

                // 4. Profil
                const rawProfil = document.getElementById('profil')?.value || '';
                const getProfVal = (label) => {
                    const m = rawProfil.match(new RegExp('- \\*\\*' + label + '\\*\\*:\\s*(.*)', 'i'));
                    return m ? m[1].trim() : '';
                };
                const bName = getProfVal('Nama Brand');
                const tag = getProfVal('Tagline');
                const sap = getProfVal('Sapaan AI');
                if (bName && document.getElementById('custProfBrandName')) document.getElementById('custProfBrandName').value = bName;
                if (tag && document.getElementById('custProfTagline')) document.getElementById('custProfTagline').value = tag;
                if (sap && document.getElementById('custProfGreeting')) document.getElementById('custProfGreeting').value = sap;
            }

            document.addEventListener('DOMContentLoaded', function() {
                initCustStructuredForms();
            });
        </script>

        <div class="customer-create-card" style="margin-top: 1.5rem; padding: 1.5rem;">
            <style>
                .portal-kb-workspace { max-width:820px; margin:0 auto; border:1px solid #e2e8f0; border-radius:16px; overflow:hidden; background:#fff; }
                .portal-kb-tabs { max-width:820px; margin:0 auto 1.5rem !important; }
                .portal-kb-layout { display:grid; grid-template-columns:220px minmax(0, 1fr); gap:1.25rem; max-width:1080px; margin:0 auto; align-items:start; }
                .portal-kb-nav { position:sticky; top:1rem; padding:.75rem; border:1px solid #e2e8f0; border-radius:14px; background:#f8fafc; }
                .portal-kb-nav__label { display:block; padding:.35rem .5rem .65rem; color:#64748b; font-size:.7rem; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
                .portal-kb-tabs { display:flex !important; flex-direction:column; gap:.35rem !important; width:100% !important; margin:0 !important; }
                .portal-kb-tabs button { display:flex !important; align-items:center; gap:.65rem; width:100%; padding:.75rem !important; text-align:left; border-radius:10px; }
                .portal-kb-tabs button .material-symbols-outlined { font-size:1.1rem; }
                .portal-kb-tabs button[aria-current="page"] { background:#fff; box-shadow:0 1px 3px rgba(15,23,42,.1); }
                .portal-kb-canvas { min-width:0; }
                .portal-kb-overview { display:none; }
                .portal-kb-overview div { padding:.7rem; border:1px solid #e2e8f0; border-radius:10px; background:#f8fafc; color:#475569; font-size:.73rem; }
                .portal-kb-overview strong { display:block; color:#1e293b; font-size:.78rem; margin-top:.2rem; }
                .portal-kb-panel-head { display:flex; align-items:flex-start; gap:1rem; padding:1.5rem 1.5rem 1.25rem; background:linear-gradient(135deg,#fafafa,#f5f3ff); border-bottom:1px solid #e2e8f0; }
                .portal-kb-panel-head .material-symbols-outlined { color:var(--account-action); background:#fff; border-radius:12px; padding:.65rem; box-shadow:0 1px 3px rgba(15,23,42,.1); }
                .portal-kb-panel-head h3 { margin:0; color:#1e293b; font-size:1.05rem; }
                .portal-kb-panel-head p { margin:.35rem 0 0; color:#64748b; font-size:.84rem; line-height:1.55; max-width:560px; }
                .portal-kb-body { padding:1.5rem; }
                .portal-kb-body > label.form-field { display:none; }
                .portal-kb-card-list { display:flex; flex-direction:column; gap:1rem; }
                .portal-kb-entry { border:1px solid #e2e8f0; border-radius:12px; padding:1.1rem; background:#fff; box-shadow:0 2px 5px rgba(15,23,42,.04); }
                .portal-kb-entry-top { display:flex; gap:.75rem; align-items:center; margin-bottom:.85rem; }
                .portal-kb-entry-title { flex:1; min-width:0; border:1px solid #cbd5e1; border-radius:8px; padding:.7rem .75rem; font-weight:700; color:#1e293b; }
                .portal-kb-entry-remove { border:0; background:#fef2f2; color:#dc2626; border-radius:8px; padding:.45rem; cursor:pointer; display:inline-flex; }
                .portal-kb-entry textarea { width:100%; box-sizing:border-box; border:1px solid #cbd5e1; border-radius:8px; padding:.9rem; min-height:230px; resize:vertical; font:inherit; line-height:1.7; color:#334155; }
                .portal-kb-add { width:100%; margin-top:1rem; border:1px dashed var(--account-action); background:#f8fafc; color:var(--account-action); border-radius:10px; padding:.8rem; font-weight:700; cursor:pointer; }
                .portal-kb-add:hover { background:#f5f3ff; }
                .portal-kb-quick { display:none; }
                .portal-kb-quick button { border:1px solid #cbd5e1; background:#fff; color:#334155; border-radius:999px; padding:.35rem .65rem; font-size:.72rem; font-weight:700; cursor:pointer; }
                .portal-kb-quick button:hover { border-color:var(--account-action); color:var(--account-action); background:#f5f3ff; }
                .portal-kb-meta { display:flex; justify-content:space-between; gap:.75rem; margin-top:.85rem; color:#64748b; font-size:.76rem; }
                @media (max-width: 640px) {
                    .portal-kb-layout { display:block; }
                    .portal-kb-nav { position:static; margin-bottom:1rem; padding:.55rem; overflow-x:auto; }
                    .portal-kb-nav__label { display:none; }
                    .portal-kb-tabs { display:flex !important; flex-direction:row; width:max-content !important; }
                    .portal-kb-tabs button { width:auto; white-space:nowrap !important; min-height:44px; }
                    .portal-kb-overview { grid-template-columns:repeat(2, minmax(0, 1fr)); }
                    .portal-kb-body { padding:1rem; }
                    .portal-kb-panel-head { padding:1.15rem 1rem; }
                }
            </style>
            <div style="margin-bottom: 1.25rem;">
                <h2 class="customer-create-legend" style="margin: 0;">
                    <span aria-hidden="true" class="material-symbols-outlined">auto_stories</span>
                    Editor Knowledge Base
                </h2>
                <p class="customer-create-option-desc" style="margin-top: 0.35rem;">
                    Format dokumen sama dengan Superadmin. Isi hanya informasi yang berlaku untuk bisnis Anda.
                </p>
                @if (!empty($order?->business_data['ai_knowledge_saved_at']))
                    <p class="customer-create-option-desc" style="margin-top:0.55rem; font-size:0.76rem;">
                        Terakhir disimpan: {{ \Carbon\Carbon::parse($order->business_data['ai_knowledge_saved_at'])->locale('id')->isoFormat('D MMM Y, HH:mm') }} WIB
                        @if (!empty($order?->business_data['ai_rag_indexed_at']))
                            · Indeks AI diperbarui: {{ \Carbon\Carbon::parse($order->business_data['ai_rag_indexed_at'])->locale('id')->isoFormat('D MMM Y, HH:mm') }} WIB
                        @else
                            · Menunggu indeks AI saat engine tersedia
                        @endif
                    </p>
                @endif
            </div>

            <form method="POST" action="{{ route('customer.ai.knowledge') }}">
                @csrf
                <div class="portal-kb-overview" aria-label="Ringkasan dokumen">
                    <div><span class="material-symbols-outlined">badge</span><strong>Profil</strong>Identitas bisnis</div>
                    <div><span class="material-symbols-outlined">inventory_2</span><strong>Informasi</strong>Hal yang ditawarkan</div>
                    <div><span class="material-symbols-outlined">policy</span><strong>Ketentuan</strong>Aturan yang berlaku</div>
                    <div><span class="material-symbols-outlined">quiz</span><strong>FAQ</strong>Jawaban siap pakai</div>
                </div>
                <div class="portal-kb-layout">
                    <aside class="portal-kb-nav">
                        <span class="portal-kb-nav__label">Bagian Knowledge Base</span>
                        <nav class="customer-filter kb-tabs-row portal-kb-tabs" aria-label="Pilih dokumen knowledge base">
                            <button type="button" data-portal-kb-tab="profil" aria-current="page"><span class="material-symbols-outlined">badge</span>Profil</button>
                            <button type="button" data-portal-kb-tab="layanan"><span class="material-symbols-outlined">inventory_2</span>Informasi Bisnis</button>
                            <button type="button" data-portal-kb-tab="kebijakan"><span class="material-symbols-outlined">policy</span>Ketentuan</button>
                            <button type="button" data-portal-kb-tab="faq"><span class="material-symbols-outlined">quiz</span>FAQ</button>
                        </nav>
                    </aside>
                    <section class="portal-kb-canvas">

                @php
                    $portalRawFaq = $knowledge['faq_raw'] ?? (is_string($knowledge['faq'] ?? null) ? $knowledge['faq'] : '');
                    if (empty($portalRawFaq) && is_array($knowledge['faq'] ?? null)) {
                        $portalRawFaq = collect($knowledge['faq'])
                            ->map(fn ($item) => '### Q: ' . ($item['question'] ?? '') . "\nA: " . ($item['answer'] ?? ''))
                            ->implode("\n\n");
                    }
                    $plainKnowledge = static function ($value): string {
                        $value = (string) $value;
                        $value = preg_replace('/^\s{0,3}#{1,6}\s*/m', '', $value);
                        $value = str_replace('**', '', $value);
                        $value = preg_replace('/^\s*[-*]\s+/m', '', $value);

                        return trim($value);
                    };
                @endphp

                <div class="portal-kb-workspace" data-portal-kb-panel="profil">
                    <div class="portal-kb-panel-head"><span class="material-symbols-outlined">badge</span><div><h3>Profil</h3><p>Identitas bisnis dan pengaturan dasar yang dipakai oleh website serta asisten AI.</p></div></div>
                    <div class="portal-kb-body" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(210px,1fr)); gap:0.85rem;">
                        <label class="form-field"><span>Nama bisnis</span><input name="business_name" value="{{ old('business_name', $order?->business_data['business_name'] ?? '') }}" maxlength="150" placeholder="Nama bisnis Anda"></label>
                        <label class="form-field"><span>WhatsApp resmi</span><input name="whatsapp_cs" value="{{ old('whatsapp_cs', $currentWhatsappCs) }}" maxlength="25" placeholder="0812... atau 62812..."></label>
                        <label class="form-field"><span>Jam operasional</span><input name="jam_operasional" value="{{ old('jam_operasional', $currentJamOperasional) }}" maxlength="255" placeholder="Senin–Sabtu, 09.00–17.00"></label>
                        <label class="form-field" style="grid-column:1/-1;"><span>Alamat atau area layanan</span><textarea name="alamat" rows="2" maxlength="500" placeholder="Alamat fisik, area layanan, atau keterangan bahwa bisnis beroperasi online.">{{ old('alamat', $currentAlamat) }}</textarea></label>
                        <label class="form-field" style="grid-column:1/-1;"><span>Sapaan awal chatbot</span><textarea name="welcome_message" rows="2" maxlength="255" placeholder="Halo, ada yang bisa kami bantu?">{{ old('welcome_message', $currentWelcome) }}</textarea></label>
                        <label class="form-field" style="grid-column:1/-1;"><span>Catatan atau konteks tambahan untuk AI (opsional)</span><textarea name="profil_context" rows="3" maxlength="3000" placeholder="Contoh: gunakan gaya bahasa ramah, jangan menjanjikan stok, dan arahkan pertanyaan khusus ke WhatsApp."></textarea></label>
                    </div>
                </div>
                <div class="portal-kb-workspace" data-portal-kb-panel="layanan" hidden>
                    <div class="portal-kb-panel-head"><span class="material-symbols-outlined">inventory_2</span><div><h3>Informasi Bisnis</h3><p>Hal yang perlu diketahui pengunjung tentang penawaran bisnis Anda.</p></div></div>
                    <div class="portal-kb-body"><div class="portal-kb-quick"><button type="button" data-kb-insert="portalKbLayanan" data-kb-text="Produk atau layanan: ">+ Produk/jasa</button><button type="button" data-kb-insert="portalKbLayanan" data-kb-text="Area layanan: ">+ Area layanan</button><button type="button" data-kb-insert="portalKbLayanan" data-kb-text="Harga atau kisaran: ">+ Harga</button></div><label for="portalKbLayanan" class="form-field">
                        <span>Informasi untuk pengunjung</span>
                        <textarea id="portalKbLayanan" name="layanan" rows="9" placeholder="Tulis produk, jasa, program, fasilitas, harga bila ada, area layanan, atau informasi lain dengan kalimat biasa.">{{ old('layanan', $plainKnowledge($knowledge['layanan'] ?? '')) }}</textarea>
                    </label><div class="portal-kb-card-list" data-kb-card-list="layanan"></div><button class="portal-kb-add" type="button" data-kb-add-card="layanan">+ Tambah informasi bisnis</button><div class="portal-kb-meta"><span>Harga opsional; jangan tulis janji yang belum pasti.</span><span data-kb-count="portalKbLayanan">0 karakter</span></div></div>
                </div>
                <div class="portal-kb-workspace" data-portal-kb-panel="kebijakan" hidden>
                    <div class="portal-kb-panel-head"><span class="material-symbols-outlined">policy</span><div><h3>Aturan &amp; Ketentuan</h3><p>Batasan dan proses yang harus menjadi acuan jawaban chatbot.</p></div></div>
                    <div class="portal-kb-body"><div class="portal-kb-quick"><button type="button" data-kb-insert="portalKbKebijakan" data-kb-text="Ketentuan utama: ">+ Ketentuan</button><button type="button" data-kb-insert="portalKbKebijakan" data-kb-text="Batasan: ">+ Batasan</button><button type="button" data-kb-insert="portalKbKebijakan" data-kb-text="Untuk konfirmasi, hubungi: ">+ Arahkan ke CS</button></div><label for="portalKbKebijakan" class="form-field">
                        <span>Ketentuan bisnis</span>
                        <textarea id="portalKbKebijakan" name="kebijakan" rows="9" placeholder="Tulis ketentuan utama, batasan, pengecualian, atau proses tindak lanjut dengan kalimat biasa.">{{ old('kebijakan', $plainKnowledge($knowledge['kebijakan'] ?? '')) }}</textarea>
                    </label><div class="portal-kb-card-list" data-kb-card-list="kebijakan"></div><button class="portal-kb-add" type="button" data-kb-add-card="kebijakan">+ Tambah ketentuan</button><div class="portal-kb-meta"><span>Jangan menjanjikan hal di luar kebijakan resmi.</span><span data-kb-count="portalKbKebijakan">0 karakter</span></div></div>
                </div>
                <div class="portal-kb-workspace" data-portal-kb-panel="faq" hidden>
                    <div class="portal-kb-panel-head"><span class="material-symbols-outlined">quiz</span><div><h3>FAQ</h3><p>Siapkan jawaban resmi untuk pertanyaan yang paling sering muncul.</p></div></div>
                    <div class="portal-kb-body"><div class="portal-kb-quick"><button type="button" data-kb-insert="portalKbFaq" data-kb-text="Pertanyaan: \nJawaban: ">+ Tambah Q&amp;A</button><button type="button" data-kb-insert="portalKbFaq" data-kb-text="Pertanyaan: Bagaimana cara menghubungi kami?\nJawaban: ">+ Kontak</button></div><label for="portalKbFaq" class="form-field">
                        <span>Pertanyaan dan jawaban</span>
                        <textarea id="portalKbFaq" name="faq" rows="9" placeholder="Pertanyaan: Bagaimana cara menghubungi kami?&#10;Jawaban: Hubungi WhatsApp resmi kami pada jam operasional.">{{ old('faq', $plainKnowledge($portalRawFaq)) }}</textarea>
                    </label><div class="portal-kb-card-list" data-kb-card-list="faq"></div><button class="portal-kb-add" type="button" data-kb-add-card="faq">+ Tambah FAQ</button><div class="portal-kb-meta"><span>Tulis satu Pertanyaan dan satu Jawaban pada setiap pasangan.</span><span data-kb-count="portalKbFaq">0 karakter</span></div></div>
                </div>

                    </section>
                </div>

                <div class="customer-create-submit" style="max-width:820px; margin: 1.5rem auto 0;">
                    <button class="account-submit customer-create-submit-btn" type="submit">Simpan Knowledge Base</button>
                </div>
            </form>
        </div>

        <script>
            const portalKbFields = {
                profil: 'portalKbProfil',
                layanan: 'portalKbLayanan',
                kebijakan: 'portalKbKebijakan',
                faq: 'portalKbFaq',
            };

            function syncPortalKbCards(section) {
                const input = document.getElementById(portalKbFields[section]);
                const cards = document.querySelectorAll('[data-kb-card-list="' + section + '"] .portal-kb-entry');
                if (!input) return;
                const blocks = Array.from(cards).map(function(card) {
                    const title = card.querySelector('[data-kb-entry-title]').value.trim();
                    const content = card.querySelector('[data-kb-entry-content]').value.trim();
                    if (!title && !content) return '';
                    return section === 'faq'
                        ? 'Pertanyaan: ' + title + '\nJawaban: ' + content
                        : title + (content ? '\n' + content : '');
                }).filter(Boolean);
                input.value = blocks.join('\n\n');
                const count = document.querySelector('[data-kb-count="' + input.id + '"]');
                if (count) count.textContent = input.value.length.toLocaleString('id-ID') + ' karakter';
            }

            function addPortalKbCard(section, title = '', content = '') {
                const list = document.querySelector('[data-kb-card-list="' + section + '"]');
                if (!list) return;
                const entry = document.createElement('article');
                entry.className = 'portal-kb-entry';
                const top = document.createElement('div');
                top.className = 'portal-kb-entry-top';
                const titleInput = document.createElement('input');
                titleInput.type = 'text';
                titleInput.className = 'portal-kb-entry-title';
                titleInput.setAttribute('data-kb-entry-title', '');
                titleInput.placeholder = section === 'faq' ? 'Tulis pertanyaan' : 'Tulis subjudul';
                titleInput.value = title;
                const remove = document.createElement('button');
                remove.type = 'button';
                remove.className = 'portal-kb-entry-remove';
                remove.setAttribute('aria-label', 'Hapus item');
                remove.innerHTML = '<span class="material-symbols-outlined">delete</span>';
                const body = document.createElement('textarea');
                body.setAttribute('data-kb-entry-content', '');
                body.placeholder = section === 'faq' ? 'Tulis jawaban resmi' : 'Tulis penjelasan untuk subjudul ini';
                body.value = content;
                [titleInput, body].forEach(function(field) {
                    field.addEventListener('input', function() { syncPortalKbCards(section); });
                });
                remove.addEventListener('click', function() {
                    entry.remove();
                    syncPortalKbCards(section);
                });
                top.appendChild(titleInput);
                top.appendChild(remove);
                entry.appendChild(top);
                entry.appendChild(body);
                list.appendChild(entry);
                syncPortalKbCards(section);
                titleInput.focus();
            }

            function loadPortalKbCards(section) {
                const input = document.getElementById(portalKbFields[section]);
                if (!input || !input.value.trim()) return;
                if (section === 'faq') {
                    const matches = input.value.matchAll(/(?:Pertanyaan|Q)\s*:\s*([^\n]+)\n(?:Jawaban|A)\s*:\s*([\s\S]*?)(?=(?:\n\s*(?:Pertanyaan|Q)\s*:)|$)/gi);
                    let found = false;
                    for (const match of matches) {
                        addPortalKbCard(section, match[1].trim(), match[2].trim());
                        found = true;
                    }
                    if (!found) addPortalKbCard(section, 'FAQ', input.value.trim());
                    return;
                }
                const blocks = input.value.trim().split(/\n\s*\n/);
                blocks.forEach(function(block) {
                    const lines = block.split('\n');
                    const title = lines.shift().replace(/^#+\s*/, '').replace(/\*\*/g, '').trim();
                    addPortalKbCard(section, title || 'Informasi', lines.join('\n').replace(/^\s*[-*]\s*/, '').trim());
                });
            }

            Object.keys(portalKbFields).forEach(loadPortalKbCards);
            document.querySelectorAll('[data-kb-add-card]').forEach(function(button) {
                button.addEventListener('click', function() { addPortalKbCard(button.dataset.kbAddCard); });
            });
            document.querySelectorAll('[data-kb-insert]').forEach(function(button) {
                button.addEventListener('click', function() {
                    const section = Object.keys(portalKbFields).find(function(key) { return portalKbFields[key] === button.dataset.kbInsert; });
                    if (section) addPortalKbCard(section);
                });
            });

            document.querySelectorAll('[data-portal-kb-tab]').forEach(function(button) {
                button.addEventListener('click', function() {
                    const selected = button.dataset.portalKbTab;
                    document.querySelectorAll('[data-portal-kb-tab]').forEach(function(tab) {
                        if (tab === button) {
                            tab.setAttribute('aria-current', 'page');
                        } else {
                            tab.removeAttribute('aria-current');
                        }
                    });
                    document.querySelectorAll('[data-portal-kb-panel]').forEach(function(panel) {
                        panel.hidden = panel.dataset.portalKbPanel !== selected;
                    });
                });
            });
        </script>
    @elseif ($tenantId)
        <div class="customer-create-card" style="margin-top: 1.5rem; padding: 1.25rem;">
            <div style="display:flex; align-items:flex-start; gap:0.75rem; color:var(--account-muted);">
                <span class="material-symbols-outlined" style="color:var(--account-sidebar);">lock</span>
                <div>
                    <h2 class="customer-create-legend" style="margin:0;">Knowledge Base dikelola WEBIA</h2>
                    <p class="customer-create-option-desc" style="margin:0.35rem 0 0;">Editor Knowledge Base untuk website ini saat ini dikelola oleh tim WEBIA. Chatbot tetap menggunakan data terakhir yang sudah aktif.</p>
                </div>
            </div>
        </div>
    @endif

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
        } else if (type === 'professional') {
            welcomeInput.value = 'Selamat datang di website kami. Kami siap memberikan informasi layanan dan solusi terbaik yang Anda butuhkan.';
        } else if (type === 'sales') {
            welcomeInput.value = 'Halo! Selamat datang. Sedang mencari produk, promo terbaru, atau butuh bantuan pemesanan hari ini?';
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

    function showAiPopup(title, message, isSuccess = true) {
        let popup = document.getElementById('aiFlashPopup');
        if (!popup) {
            popup = document.createElement('div');
            popup.id = 'aiFlashPopup';
            document.body.appendChild(popup);
        }
        popup.style.cssText = `
            position: fixed;
            top: 2rem;
            right: 2rem;
            z-index: 99999;
            max-width: 440px;
            width: calc(100% - 4rem);
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid ${isSuccess ? '#bbf7d0' : '#fecaca'};
            box-shadow: 0 16px 36px -4px rgba(15,23,42,0.18), 0 6px 14px -2px rgba(15,23,42,0.08);
            padding: 1.15rem 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
            animation: popInFlash 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            font-family: inherit;
        `;

        const bgIcon = isSuccess ? '#dcfce7' : '#fee2e2';
        const colorIcon = isSuccess ? '#15803d' : '#b91c1c';
        const iconName = isSuccess ? 'check_circle' : 'error';

        popup.innerHTML = `
            <div style="width:38px; height:38px; border-radius:10px; background:${bgIcon}; color:${colorIcon}; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <span class="material-symbols-outlined" style="font-size:1.35rem;">${iconName}</span>
            </div>
            <div style="flex:1;">
                <div style="font-size:0.9rem; font-weight:800; color:#0f172a; margin-bottom:0.25rem;">
                    ${title}
                </div>
                <div style="font-size:0.825rem; color:#475569; line-height:1.45;">
                    ${message}
                </div>
            </div>
            <button type="button" onclick="closeAiPopup()" style="background:transparent; border:none; color:#94a3b8; cursor:pointer; padding:0.2rem; border-radius:6px; display:flex; align-items:center; justify-content:center; transition:color 0.15s;" onmouseover="this.style.color='#0f172a'" onmouseout="this.style.color='#94a3b8'">
                <span class="material-symbols-outlined" style="font-size:1.2rem;">close</span>
            </button>
        `;

        if (window.aiPopupTimer) clearTimeout(window.aiPopupTimer);
        window.aiPopupTimer = setTimeout(() => {
            closeAiPopup();
        }, 5000);
    }

    function closeAiPopup() {
        const popup = document.getElementById('aiFlashPopup');
        if (popup) {
            popup.style.opacity = '0';
            popup.style.transform = 'translateY(-12px) scale(0.96)';
            popup.style.transition = 'all 0.25s cubic-bezier(0.4, 0, 0.2, 1)';
            setTimeout(() => popup.remove(), 250);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const bizForm = document.getElementById('businessInfoForm');
        if (bizForm) {
            bizForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                if (bizForm.dataset.confirmed !== '1') {
                    // Aksi simpan wajib lewat modal konfirmasi (frame "Simpan Pengaturan").
                    const modal = document.getElementById('ai-save-modal');
                    window.webiaModal?.open(modal, document.getElementById('btnSubmitBusinessInfo'));
                    return;
                }
                delete bizForm.dataset.confirmed;
                const submitBtn = document.getElementById('btnSubmitBusinessInfo');
                const originalHtml = submitBtn ? submitBtn.innerHTML : '';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.style.opacity = '0.75';
                    submitBtn.innerHTML = '<span class="material-symbols-outlined" style="font-size:1.15rem; animation:spinAi 1s linear infinite;">sync</span> Menyimpan...';
                }

                try {
                    const formData = new FormData(bizForm);
                    const res = await fetch(bizForm.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    });

                    const data = await res.json();
                    if (res.ok && data.status === 'success') {
                        showAiPopup('Berhasil Disimpan!', data.message || 'Pengaturan & informasi bisnis berhasil disimpan! Asisten AI website Anda langsung diperbarui.', true);
                    } else {
                        showAiPopup('Terjadi Kesalahan', data.message || 'Gagal memperbarui informasi bisnis ke AI. Silakan coba lagi.', false);
                    }
                } catch (err) {
                    bizForm.submit();
                } finally {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.style.opacity = '1';
                        submitBtn.innerHTML = originalHtml;
                    }
                }
            });
        }
    });
    </script>

    <x-customer-modal id="ai-preview-modal" title="Preview chatbot bisnis" subtitle="Simulasi percakapan memakai sapaan yang tersimpan." icon="visibility">
        <div class="customer-modal-rows">
            <div class="customer-modal-row"><span>Sapaan</span><strong data-ai-preview-message>-</strong></div>
            <div class="customer-modal-row"><span>Lokasi</span><strong data-ai-preview-location>-</strong></div>
            <div class="customer-modal-row"><span>Handoff</span><strong data-ai-preview-handoff>-</strong></div>
        </div>
        <div class="customer-modal-actions" style="margin-top: 1.1rem;">
            <button class="customer-btn" type="button" data-modal-close>Tutup</button>
            <button class="customer-btn customer-btn--primary" type="button" data-ai-save-from-preview>Simpan pengaturan</button>
        </div>
    </x-customer-modal>

    <x-customer-modal id="ai-save-modal" title="Simpan perubahan AI?" subtitle="Pesan sapaan dan informasi bisnis akan langsung disinkronkan." icon="help">
        <div class="customer-modal-rows">
            <div class="customer-modal-row"><span>Website</span><span>{{ $order->business_data['business_name'] ?? 'Website Bisnis Anda' }}</span></div>
            <div class="customer-modal-row"><span>Kuota</span><span>{{ number_format($quotaData['used_messages'] ?? 0) }} / {{ number_format($quotaData['monthly_quota'] ?? 500) }} pesan</span></div>
            <div class="customer-modal-row"><span>Sinkronisasi</span><span>Realtime</span></div>
        </div>
        <div class="customer-modal-actions" style="margin-top: 1.1rem;">
            <button class="customer-btn" type="button" data-modal-close>Kembali</button>
            <button class="customer-btn customer-btn--primary" type="button" data-ai-save-confirm>Simpan perubahan</button>
        </div>
    </x-customer-modal>

    <x-customer-modal id="ai-quota-modal" tone="warning" title="Kuota pesan hampir habis" subtitle="Siapkan paket berikutnya agar chatbot tetap aktif." icon="warning" :open="($isWarning || $isExhausted)">
        <div class="customer-modal-rows">
            <div class="customer-modal-row"><span>Sisa</span><span>{{ number_format($quotaData['remaining_messages'] ?? 0) }} pesan</span></div>
            <div class="customer-modal-row"><span>Terpakai</span><span>{{ number_format($quotaData['used_messages'] ?? 0) }} pesan</span></div>
            <div class="customer-modal-row"><span>Reset</span><span>{{ $resetDateFormatted }}</span></div>
        </div>
        <div class="customer-modal-actions" style="margin-top: 1.1rem;">
            <button class="customer-btn" type="button" data-modal-close>Nanti</button>
            <button class="customer-btn customer-btn--primary" type="button" onclick="window.webiaModal && window.webiaModal.close(document.getElementById('ai-quota-modal')); openQuotaModal('booster');">Lihat pilihan paket</button>
        </div>
    </x-customer-modal>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview chatbot: baris diisi dari nilai form terkini.
        document.querySelectorAll('[data-modal-open="#ai-preview-modal"]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const msg = document.getElementById('welcome_message');
                const loc = document.getElementById('alamat');
                const online = document.getElementById('is_online_only');
                const hand = document.getElementById('whatsapp_cs');
                const set = (sel, val) => { const el = document.querySelector(sel); if (el) el.textContent = val; };
                set('[data-ai-preview-message]', msg ? (msg.value.length > 60 ? msg.value.slice(0, 60) + '…' : msg.value) : '-');
                set('[data-ai-preview-location]', online && online.checked ? 'Layanan online' : (loc && loc.value.trim() ? loc.value.trim() : '-'));
                set('[data-ai-preview-handoff]', hand ? hand.value : '-');
            });
        });

        // Dari preview langsung ke modal simpan.
        document.querySelectorAll('[data-ai-save-from-preview]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                window.webiaModal && window.webiaModal.close(document.getElementById('ai-preview-modal'));
                window.webiaModal && window.webiaModal.open(document.getElementById('ai-save-modal'), btn);
            });
        });

        // Konfirmasi simpan: lanjut ke submit AJAX asli.
        const saveBtn = document.getElementById('btnSubmitBusinessInfo');
        const saveConfirm = document.querySelector('[data-ai-save-confirm]');
        if (saveBtn && saveConfirm) {
            saveConfirm.addEventListener('click', function () {
                const bizForm = document.getElementById('businessInfoForm');
                const modal = document.getElementById('ai-save-modal');
                if (bizForm && modal) {
                    bizForm.dataset.confirmed = '1';
                    window.webiaModal && window.webiaModal.close(modal);
                    if (bizForm.requestSubmit) bizForm.requestSubmit(saveBtn); else bizForm.submit();
                }
            });
        }

        // Banner kuota menipis/habis membuka modal ringkasan kuota.
        document.querySelectorAll('[data-ai-quota-alert]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                window.webiaModal && window.webiaModal.open(document.getElementById('ai-quota-modal'), btn);
            });
        });
    });
    </script>
    <style>
    @keyframes popInFlash {
        from {
            opacity: 0;
            transform: translateY(-16px) scale(0.96);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    @keyframes spinAi {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    </style>
    @endif
</section>
@endsection
