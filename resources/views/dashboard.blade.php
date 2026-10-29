@extends('auth.layout')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard-panel" aria-labelledby="dashboard-title">
        <p class="account-label">Dashboard</p>
        <h1 id="dashboard-title">Halo, {{ auth()->user()->name }}</h1>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        @if ($activeOrder)
            <div class="dashboard-grid">
                <div class="dashboard-empty dashboard-card-active">
                    <div class="order-heading">
                        <div>
                            <p class="account-label">Pesanan aktif</p>
                            <h2>{{ $activeOrder->order_number }} &middot; {{ $activeOrder->package->name }}</h2>
                        </div>
                        <div class="admin-actions">
                            <x-status-pill :status="$activeOrder->status" />
                            <x-status-pill :status="$activeOrder->delivery_status" />
                        </div>
                    </div>

                    <x-order-timeline :order="$activeOrder" />

                    <div class="admin-actions dashboard-card-action">
                        <a href="{{ route('orders.show', $activeOrder) }}">Lihat detail pesanan</a>
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
                <div class="dashboard-empty dashboard-card-side">
                    <h2>Fokus tindakan</h2>
                    <p><strong>{{ $nextStep['heading'] }}</strong>: {{ $nextStep['copy'] }}</p>
                    <div class="admin-actions">
                        <a href="{{ route('orders.show', $activeOrder) }}">{{ $nextStep['action'] }}</a>
                    </div>
                </div>
            </div>
        @endif

        @if ($deliveredSite)
            <div class="dashboard-empty dashboard-site-done">
                <h2>Website selesai</h2>
                <p><strong>{{ $deliveredSite->package->name }}</strong> sudah dipublikasi.</p>
                <dl class="business-data-list">
                    <div><dt>URL</dt><dd>{{ route('sites.show', ['order' => $deliveredSite->site_slug]) }}</dd></div>
                </dl>
                <div class="admin-actions">
                    <a href="{{ route('sites.show', ['order' => $deliveredSite->site_slug]) }}" rel="noopener" target="_blank">Buka website</a>
                </div>
            </div>
        @endif

        <div class="order-summary dashboard-history">
            <div class="order-heading">
                <h2>Pesanan terbaru</h2>
                <div class="list-item-meta">
                    <a href="{{ route('orders.index') }}">Lihat semua pesanan</a>
                </div>
            </div>
            <div class="admin-list dashboard-history-list">
                @forelse ($orders as $order)
                    <article class="admin-list-item">
                        <div>
                            <h2>{{ $order->package->name }}</h2>
                            <p>{{ $order->order_number }}</p>
                        </div>
                        <div class="list-item-meta">
                            <x-status-pill :status="$order->status" />
                            <a href="{{ route('orders.show', $order) }}">Detail</a>
                        </div>
                    </article>
                @empty
                    <div class="dashboard-empty" role="status"><h2>Belum ada pesanan</h2><p>Pilih template dari katalog WEBIA untuk memulai.</p><a class="account-submit" href="{{ route('collections') }}">Pilih template</a></div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
