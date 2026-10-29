@extends('auth.layout')

@section('title', 'Pesanan Saya')

@section('content')
    <section class="dashboard-panel" aria-labelledby="orders-title">
        <div class="order-heading">
            <div>
                <p class="account-label">Akun</p>
                <h1 id="orders-title">Pesanan Saya</h1>
            </div>
            <div class="admin-actions">
                <a href="{{ route('orders.create') }}">Buat Pesanan</a>
            </div>
        </div>

        <nav class="admin-filter customer-filter" aria-label="Filter status pesanan">
            @foreach ([
                'semua' => 'Semua',
                'menunggu_pembayaran' => 'Menunggu pembayaran',
                'menunggu_verifikasi' => 'Menunggu verifikasi',
                'dikerjakan' => 'Sedang dikerjakan',
                'selesai' => 'Selesai',
            ] as $value => $label)
                <a href="{{ $value === 'semua' ? route('orders.index') : route('orders.index', ['filter' => $value]) }}" @if (($filter ?? 'semua') === $value || ($filter === null && $value === 'semua')) aria-current="page" @endif>{{ $label }}</a>
            @endforeach
        </nav>

        @if ($orders->isEmpty())
            @if ($filter)
                <div class="dashboard-empty" role="status"><h2>Tidak ada pesanan di filter ini</h2><p>Coba pilih filter lain.</p><a href="{{ route('orders.index') }}">Lihat semua pesanan</a></div>
            @else
                <div class="dashboard-empty" role="status"><h2>Belum ada pesanan</h2><p>Pilih template dari katalog WEBIA untuk memulai.</p><a class="account-submit" href="{{ route('collections') }}">Pilih template</a></div>
            @endif
        @else
        <div class="admin-table-wrap">
            <table class="admin-table customer-orders-table">
                <thead>
                    <tr>
                        <th scope="col">Pesanan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col" class="admin-table-action"><span class="sr-only">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row" data-label="Pesanan">
                                {{ $order->package->name }}
                                <span class="customer-order-number">{{ $order->order_number }}</span>
                            </th>
                            <td data-label="Status">
                                <x-status-pill :status="$order->status" />
                                <x-status-pill :status="$order->delivery_status" />
                            </td>
                            <td data-label="Total" class="ops-money">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td data-label="Tanggal" class="ops-dim">{{ $order->created_at->translatedFormat('d M Y') }}</td>
                            <td class="admin-table-action"><a href="{{ route('orders.show', $order) }}">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </section>
@endsection
