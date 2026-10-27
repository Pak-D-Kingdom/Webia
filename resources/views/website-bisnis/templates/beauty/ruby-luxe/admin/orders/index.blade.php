
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Manage Orders | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">COMMERCE MANAGEMENT</span>
        <h1>Manage <em>Orders.</em></h1>
        <p>Track skincare orders, payments, and fulfillment progress.</p>
    </div>
</section>

<section class="section">
    <div class="container admin-panel">
        <div class="section-heading">
            <div>
                <span class="eyebrow">CUSTOMER PURCHASES</span>
                <h2>Order <em>Overview.</em></h2>
            </div>
        </div>

        <div class="catalog-toolbar">
            <input type="search" id="catalogSearch"
                   placeholder="Search order or customer..."
                   aria-label="Search orders">

            <select id="catalogFilter" aria-label="Filter order status">
                <option value="all">All Statuses</option>
                <option value="processing">Processing</option>
                <option value="paid">Paid</option>
                <option value="shipped">Shipped</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        @php
            $orders = [
                [
                    'reference' => 'RL-ORD-2001',
                    'customer' => 'Amelia Putri',
                    'items' => 'Botanical Cleanser × 2',
                    'date' => '2026-10-22',
                    'total' => 370000,
                    'status' => 'Paid',
                ],
                [
                    'reference' => 'RL-ORD-2002',
                    'customer' => 'Nadia Safira',
                    'items' => 'Radiance Serum × 1',
                    'date' => '2026-10-23',
                    'total' => 275000,
                    'status' => 'Processing',
                ],
                [
                    'reference' => 'RL-ORD-2003',
                    'customer' => 'Clara Anindya',
                    'items' => 'Daily Moisturizer × 1',
                    'date' => '2026-10-18',
                    'total' => 220000,
                    'status' => 'Completed',
                ],
            ];
        @endphp

        <div class="table-scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="catalog-item"
                            data-category="{{ strtolower($order['status']) }}"
                            data-search="{{ strtolower($order['reference'] . ' ' . $order['customer'] . ' ' . $order['items']) }}">
                            <td>{{ $order['reference'] }}</td>
                            <td><strong>{{ $order['customer'] }}</strong></td>
                            <td>{{ $order['items'] }}</td>
                            <td>{{ $order['date'] }}</td>
                            <td>Rp{{ number_format($order['total'], 0, ',', '.') }}</td>
                            <td>
                                <span class="admin-status {{ strtolower($order['status']) }}">
                                    {{ $order['status'] }}
                                </span>
                            </td>
                            <td>
                                <div class="admin-actions">
                                    <button type="button" class="admin-action"
                                            onclick="alert('Hubungkan ke detail pesanan.')">
                                        View
                                    </button>
                                    <button type="button" class="admin-action"
                                            onclick="alert('Hubungkan ke pembaruan status pesanan.')">
                                        Update
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p class="disclaimer">
            Pesanan dan nilai transaksi di atas merupakan data contoh, bukan
            catatan transaksi nyata.
        </p>
    </div>
</section>
@endsection
