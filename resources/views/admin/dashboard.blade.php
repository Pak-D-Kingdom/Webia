@extends('auth.layout')

@section('title', 'Admin')

@section('content')
    <section class="dashboard-panel dashboard-panel-block" aria-labelledby="admin-title">
        <p class="account-label">Admin WEBIA</p>
        <h1 id="admin-title">Panel pengelolaan</h1>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        <div class="dashboard-grid admin-grid-wide">
            <div class="dashboard-empty dashboard-card-active">
                <div class="order-heading">
                    <h2>Perlu perhatian</h2>
                    <x-status-pill :status="'payment_uploaded'" />
                </div>
                <div class="admin-list dashboard-history-list">
                    @forelse ($attention as $order)
                        <article class="admin-list-item">
                            <div>
                                <h2>{{ $order->order_number }}</h2>
                                <p>{{ $order->user?->name ?? 'Akun dihapus' }} · {{ $order->package->name }}</p>
                            </div>
                            <div class="list-item-meta">
                                <a href="{{ route('admin.orders.show', $order) }}">Periksa</a>
                            </div>
                        </article>
                    @empty
                        <p role="status">Tidak ada pembayaran yang menunggu verifikasi.</p>
                    @endforelse
                </div>
                <div class="admin-actions dashboard-card-action">
                    <a href="{{ route('admin.orders.index') }}">Kelola pesanan</a>
                    <a href="{{ route('admin.packages.index') }}">Kelola paket</a>
                    <a href="{{ route('admin.addons.index') }}">Kelola add-on</a>
                </div>
            </div>

            <div class="dashboard-empty dashboard-card-side">
                <h2>Status operasional</h2>
                <dl class="business-data-list admin-count-list">
                    <div><dt>Perlu verifikasi</dt><dd>{{ $counts['verification'] }}</dd></div>
                    <div><dt>Sedang dikerjakan</dt><dd>{{ $counts['in_progress'] }}</dd></div>
                    <div><dt>Pesanan aktif</dt><dd>{{ $counts['active'] }}</dd></div>
                    <div><dt>Sudah selesai</dt><dd>{{ $counts['delivered'] }}</dd></div>
                </dl>
            </div>
        </div>

        <div class="order-summary dashboard-history">
            <div class="order-heading">
                <h2>Pesanan terbaru</h2>
                <div class="list-item-meta">
                    <a href="{{ route('admin.orders.index') }}">Semua pesanan</a>
                </div>
            </div>
            <div class="admin-list dashboard-history-list">
                @forelse ($recent as $order)
                    <article class="admin-list-item">
                        <div>
                            <h2>{{ $order->order_number }}</h2>
                            <p>{{ $order->user?->name ?? 'Akun dihapus' }} · {{ $order->package->name }}</p>
                        </div>
                        <div class="list-item-meta">
                            <x-status-pill :status="$order->status" />
                            <a href="{{ route('admin.orders.show', $order) }}">Periksa</a>
                        </div>
                    </article>
                @empty
                    <div class="dashboard-empty" role="status"><h2>Belum ada pesanan</h2><p>Pesanan customer akan muncul di sini.</p></div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
