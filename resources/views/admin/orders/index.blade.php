@extends('auth.layout')

@section('title', 'Pesanan customer')
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
        <div class="admin-table-wrap">
            <table class="admin-table">
                <caption class="sr-only">Daftar pesanan customer</caption>
                <thead>
                    <tr>
                        <th scope="col">Pesanan</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Pengerjaan</th>
                        <th scope="col"><span class="sr-only">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->order_number }}</th>
                            <td data-label="Customer">{{ $order->user?->name ?? 'Akun dihapus' }}</td>
                            <td data-label="Paket">{{ $order->package->name }}</td>
                            <td data-label="Pembayaran"><x-status-pill :status="$order->status" /></td>
                            <td data-label="Pengerjaan"><x-status-pill :status="$order->delivery_status" /></td>
                            <td class="admin-table-action"><a href="{{ route('admin.orders.show', $order) }}">Periksa</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="6"><div class="dashboard-empty" role="status"><h2>Belum ada pesanan</h2><p>Pesanan customer akan muncul di sini.</p></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $orders->links('pagination.webia') }}
    </section>
@endsection
