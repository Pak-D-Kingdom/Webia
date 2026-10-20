@extends('auth.layout')

@section('title', 'Pesanan customer')
@section('header-action')
    <a class="account-header-link" href="{{ route('admin.dashboard') }}">Panel admin</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="admin-orders-title">
        <p class="account-label">Operasional</p><h1 id="admin-orders-title">Pesanan customer</h1>
        <nav class="admin-filter" aria-label="Filter status pesanan">
            <a href="{{ route('admin.orders.index') }}" @if ($activeStatus === '') aria-current="page" @endif>Semua</a>
            @foreach ($statuses as $status)
                <a href="{{ route('admin.orders.index', ['status' => $status]) }}" @if ($activeStatus === $status) aria-current="page" @endif>{{ ucfirst(str_replace('_', ' ', $status)) }}</a>
            @endforeach
        </nav>
        <div class="admin-list">
            @forelse ($orders as $order)
                <article class="admin-list-item"><div><h2>{{ $order->order_number }}</h2><p>{{ $order->user->name }} · {{ $order->package->name }} · {{ str_replace('_', ' ', $order->status) }}</p></div><a href="{{ route('admin.orders.show', $order) }}">Periksa</a></article>
            @empty
                <div class="dashboard-empty" role="status"><h2>Belum ada pesanan</h2><p>Pesanan customer akan muncul di sini.</p></div>
            @endforelse
        </div>
        {{ $orders->links('pagination.webia') }}
    </section>
@endsection
