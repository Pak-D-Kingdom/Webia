@extends('auth.layout')

@section('title', 'Pesanan Saya')

@section('content')
    <section class="dashboard-panel" aria-labelledby="orders-title">
        <div class="customer-orders-head">
            <div class="customer-page-head">
                <h1 id="orders-title">Pesanan Saya</h1>
                <p>Lihat pembayaran dan progres seluruh pesananmu.</p>
            </div>
            <a class="account-submit" href="{{ route('orders.create') }}">
                <span aria-hidden="true" class="material-symbols-outlined">add</span>
                Buat Pesanan
            </a>
        </div>

        <nav class="customer-filter" aria-label="Filter status pesanan">
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
        <div class="customer-orders-card">
            <div class="customer-orders-scroll">
                <table class="customer-orders-table">
                    <thead>
                        <tr>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Paket &amp; Template</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Status Pengerjaan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col" class="customer-orders-action" aria-label="Aksi"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="customer-orders-no">{{ $order->order_number }}</td>
                                <td>
                                    <span class="customer-orders-pkg">{{ $order->package->name }}</span>
                                    <span class="customer-orders-tpl">{{ $order->template?->name ?? $order->template_snapshot['name'] ?? '-' }}</span>
                                </td>
                                <td class="customer-orders-total">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td><x-status-pill :status="$order->status" with-icon /></td>
                                <td><x-status-pill :status="$order->delivery_status" with-icon /></td>
                                <td class="customer-orders-date">{{ $order->created_at->translatedFormat('d M Y') }}</td>
                                <td class="customer-orders-action">
                                    <a class="customer-orders-detail" href="{{ route('orders.show', $order) }}">
                                        Lihat detail
                                        <span aria-hidden="true" class="material-symbols-outlined">arrow_forward</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
@endsection
