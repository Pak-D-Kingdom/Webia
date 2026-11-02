@extends('auth.layout')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard-panel" aria-labelledby="dashboard-title">
        <div class="customer-page-head">
            <h1 id="dashboard-title">Halo, {{ auth()->user()->name }}</h1>
            <p>Lihat status pesanan dan tindakan yang perlu kamu selesaikan.</p>
        </div>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        @if ($activeOrder)
            <div class="dashboard-grid customer-dash-grid">
                <div class="dashboard-empty customer-order-card">
                    <div class="order-heading">
                        <div>
                            <p class="account-label">Pesanan aktif</p>
                            <h2>{{ $activeOrder->package->name }}</h2>
                            <p class="customer-order-number">Nomor: {{ $activeOrder->order_number }}</p>
                        </div>
                        <div class="admin-actions">
                            <x-status-pill :status="$activeOrder->status" />
                            <x-status-pill :status="$activeOrder->delivery_status" />
                        </div>
                    </div>

                    <div class="customer-steps-block">
                        <p class="customer-steps-label">Tahap pengerjaan</p>
                        <x-order-timeline :order="$activeOrder" />
                    </div>

                    <div class="admin-actions dashboard-card-action">
                        <a class="customer-detail-link" href="{{ route('orders.show', $activeOrder) }}">
                            Lihat detail pesanan
                            <span aria-hidden="true" class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>

                @php
                    $nextStep = match (true) {
                        in_array($activeOrder->status, ['awaiting_payment', 'rejected']) => [
                            'heading' => 'Selesaikan pembayaran',
                            'copy' => 'Lanjutkan pembayaran Midtrans atau kirim bukti transfer agar pesanan diproses.',
                            'action' => 'Bayar sekarang',
                        ],
                        $activeOrder->status === 'payment_uploaded' => [
                            'heading' => 'Menunggu verifikasi',
                            'copy' => 'Bukti pembayaranmu sudah kami terima dan sedang diperiksa admin.',
                            'action' => 'Buka pesanan',
                        ],
                        $activeOrder->delivery_status === 'in_progress' => [
                            'heading' => 'Sedang dikerjakan',
                            'copy' => 'Tim WEBIA sedang mengerjakan website. Pantau progres di halaman detail.',
                            'action' => 'Pantau progres',
                        ],
                        ! $activeOrder->business_data => [
                            'heading' => 'Lengkapi data bisnis',
                            'copy' => 'Isi data bisnis agar tim WEBIA bisa segera mulai mengerjakan website.',
                            'action' => 'Isi data bisnis',
                        ],
                        default => [
                            'heading' => 'Menunggu pengerjaan',
                            'copy' => 'Data bisnis sudah lengkap dan siap diproses tim WEBIA.',
                            'action' => 'Buka pesanan',
                        ],
                    };
                @endphp
                <div class="customer-focus-card">
                    <div class="customer-focus-head">
                        <span class="customer-focus-dot" aria-hidden="true"></span>
                        <span class="customer-focus-label">Fokus tindakan</span>
                    </div>
                    <h2>{{ $nextStep['heading'] }}</h2>
                    <p>{{ $nextStep['copy'] }}</p>
                    <div class="customer-focus-actions">
                        <a class="account-submit customer-focus-btn" href="{{ route('orders.show', $activeOrder) }}">
                            {{ $nextStep['action'] }}
                            <span aria-hidden="true" class="material-symbols-outlined">arrow_forward</span>
                        </a>
                        <p>Tindakan ini dibutuhkan untuk melanjutkan pengerjaan.</p>
                    </div>
                </div>
            </div>
        @endif

        @if ($deliveredSite)
            <div class="dashboard-empty customer-site-done">
                <div class="customer-site-done-main">
                    <p class="customer-done-badge">
                        <span aria-hidden="true" class="material-symbols-outlined">check_circle</span>
                        Sudah dipublikasi
                    </p>
                    <h2>Website selesai</h2>
                    @if ($deliveredSite->business_data['business_name'] ?? null)
                        <p class="customer-site-name">{{ $deliveredSite->business_data['business_name'] }}</p>
                    @endif
                    <div class="customer-site-meta">
                        <span>Template: <strong>{{ $deliveredSite->template?->name ?? $deliveredSite->template_snapshot['name'] ?? '-' }}</strong></span>
                        <span>URL: <span class="customer-site-url">{{ route('sites.show', ['order' => $deliveredSite->site_slug]) }}</span></span>
                    </div>
                </div>
                <div class="customer-site-done-action">
                    <a class="customer-open-site" href="{{ route('sites.show', ['order' => $deliveredSite->site_slug]) }}" rel="noopener" target="_blank">
                        Buka website
                        <span aria-hidden="true" class="material-symbols-outlined">open_in_new</span>
                    </a>
                </div>
            </div>
        @endif

        @if ($orders->isNotEmpty())
            <div class="dashboard-empty customer-recent-card">
                <div class="order-heading customer-recent-head">
                    <h2>Pesanan terbaru</h2>
                    <a class="customer-recent-link" href="{{ route('orders.index') }}">
                        Lihat semua pesanan
                        <span aria-hidden="true" class="material-symbols-outlined">chevron_right</span>
                    </a>
                </div>
                <div class="admin-list dashboard-history-list customer-recent-list">
                    @foreach ($orders->take(5) as $order)
                        <article class="admin-list-item">
                            <div>
                                <h3>{{ $order->package->name }}</h3>
                                <p>Nomor: {{ $order->order_number }}</p>
                            </div>
                            <div class="list-item-meta">
                                <x-status-pill :status="$order->status" />
                                <a class="customer-detail-btn" href="{{ route('orders.show', $order) }}">Detail</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @else
            <div class="dashboard-grid customer-dash-grid">
                <div class="dashboard-empty customer-order-card">
                    <div class="order-heading">
                        <div>
                            <p class="account-label">Pesanan pertamamu</p>
                            <h2>Pilih template untuk mulai</h2>
                        </div>
                    </div>

                    <div class="customer-steps-block">
                        <p class="customer-steps-label">Tahap pengerjaan</p>
                        <x-order-timeline :order="null" />
                    </div>

                    <div class="admin-actions dashboard-card-action">
                        <a class="customer-detail-link" href="{{ route('collections') }}">
                            Pilih template
                            <span aria-hidden="true" class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>

                <div class="customer-focus-card">
                    <div class="customer-focus-head">
                        <span class="customer-focus-dot" aria-hidden="true"></span>
                        <span class="customer-focus-label">Fokus tindakan</span>
                    </div>
                    <h2>Pilih template pertamamu</h2>
                    <p>Jelajahi katalog template WEBIA, pilih yang cocok dengan bisnismu, lalu buat pesanan.</p>
                    <div class="customer-focus-actions">
                        <a class="account-submit customer-focus-btn" href="{{ route('collections') }}">
                            Mulai sekarang
                            <span aria-hidden="true" class="material-symbols-outlined">arrow_forward</span>
                        </a>
                        <p>Pesanan pertamamu menjadi awal semua tahap pengerjaan.</p>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
