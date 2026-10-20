@extends('auth.layout')

@section('title', 'Pesanan customer')
@section('header-action')
    <a class="account-header-link" href="{{ route('admin.dashboard') }}">Panel admin</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="admin-orders-title">
        <p class="account-label">Operasional</p><h1 id="admin-orders-title">Pesanan customer</h1>
        <nav class="admin-filter" aria-label="Filter status pembayaran">
            <a href="{{ route('admin.orders.index', array_filter(['delivery' => $activeDelivery], fn ($v) => $v !== '')) }}" @if ($activeStatus === '') aria-current="page" @endif>Semua</a>
            @foreach ($statuses as $status)
                <a href="{{ route('admin.orders.index', array_filter(['status' => $status, 'delivery' => $activeDelivery], fn ($v) => $v !== '')) }}" @if ($activeStatus === $status) aria-current="page" @endif>{{ ucfirst(str_replace('_', ' ', $status)) }}</a>
            @endforeach
        </nav>
        <nav class="admin-filter" aria-label="Filter status pengerjaan">
            <a href="{{ route('admin.orders.index', array_filter(['status' => $activeStatus], fn ($v) => $v !== '')) }}" @if ($activeDelivery === '') aria-current="page" @endif>Semua</a>
            @foreach ($deliveries as $delivery)
                <a href="{{ route('admin.orders.index', array_filter(['status' => $activeStatus, 'delivery' => $delivery], fn ($v) => $v !== '')) }}" @if ($activeDelivery === $delivery) aria-current="page" @endif>{{ ucfirst(str_replace('_', ' ', $delivery)) }}</a>
            @endforeach
        </nav>
        <div class="admin-list">
            @forelse ($orders as $order)
                <article class="admin-list-item"><div><h2>{{ $order->order_number }}</h2><p>{{ $order->user->name }} · {{ $order->package->name }} · {{ str_replace('_', ' ', $order->status) }} · {{ str_replace('_', ' ', $order->delivery_status) }}</p></div><a href="{{ route('admin.orders.show', $order) }}">Periksa</a></article>
            @empty
                <div class="dashboard-empty" role="status"><h2>Belum ada pesanan</h2><p>Pesanan customer akan muncul di sini.</p></div>
            @endforelse
        </div>
        {{ $orders->links('pagination.webia') }}
    </section>
@endsection
