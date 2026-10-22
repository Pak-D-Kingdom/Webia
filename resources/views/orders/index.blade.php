@extends('auth.layout')

@section('title', 'Pesanan')
@section('header-action')
    <a class="account-header-link" href="{{ route('dashboard') }}">Dashboard</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="orders-title">
        <p class="account-label">Akun customer</p>
        <h1 id="orders-title">Pesanan saya</h1>
        <div class="admin-list">
            @forelse ($orders as $order)
                <article class="admin-list-item">
                    <div>
                        <h2>{{ $order->package->name }}</h2>
                        <p>{{ $order->order_number }}</p>
                    </div>
                    <div class="list-item-meta">
                        <x-status-pill :status="$order->status" />
                        <a href="{{ route('orders.show', $order) }}">Lihat detail</a>
                    </div>
                </article>
            @empty
                <div class="dashboard-empty" role="status"><h2>Belum ada pesanan</h2><p>Pilih paket dari halaman utama untuk memulai.</p><a class="account-submit" href="{{ route('home') }}#paket-website">Lihat paket</a></div>
            @endforelse
        </div>
    </section>
@endsection
