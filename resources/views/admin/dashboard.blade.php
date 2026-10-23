@extends('auth.layout')

@section('title', 'Dashboard Admin')

@section('content')
    <section class="dash-header">
        <div>
            <p class="dash-pill"><span aria-hidden="true"></span> Real-time ops</p>
            <h1 id="admin-title">Operational Dashboard</h1>
            <p class="dash-lede">Pantau pipeline pengerjaan, verifikasi pembayaran, dan progres pengiriman pesanan klien.</p>
        </div>
    </section>

    @if (session('status'))
        <p role="status">{{ session('status') }}</p>
    @endif

    <section class="dash-kpis" aria-label="Ringkasan operasional">
        <article class="dash-kpi dash-kpi-attention">
            <p>Menunggu verifikasi</p>
            <strong>{{ $counts['verification'] }}</strong>
            <span>bukti transfer masuk</span>
        </article>
        <article class="dash-kpi">
            <p>Sedang dikerjakan</p>
            <strong>{{ $counts['in_progress'] }}</strong>
            <span>pesanan dalam pengerjaan</span>
        </article>
        <article class="dash-kpi">
            <p>Belum selesai</p>
            <strong>{{ $counts['active'] }}</strong>
            <span>belum dikirim ke klien</span>
        </article>
        <article class="dash-kpi">
            <p>Uang masuk 30 hari</p>
            <strong>Rp {{ number_format($revenue30, 0, ',', '.') }}</strong>
            <span>{{ $paidCount30 }} pesanan lunas</span>
        </article>
    </section>

    <section class="dash-split">
        <article class="dash-card dash-chart-card">
            <header>
                <div>
                    <h2>Pendapatan 30 hari</h2>
                    <p>Data riil dari pesanan lunas (tanggal verifikasi)</p>
                </div>
                <strong>Rp {{ number_format($revenue30, 0, ',', '.') }}</strong>
            </header>

            @php
                $maxTotal = max($chart->max('total'), 1);
                $peak = $chart->sortByDesc('total')->first();
            @endphp

            <div class="dash-chart" role="img"
                aria-label="Grafik pendapatan harian 30 hari; total Rp {{ number_format($revenue30, 0, ',', '.') }}; puncak {{ $peak['date']->isoFormat('D MMM') }} Rp {{ number_format($peak['total'], 0, ',', '.') }}">
                @foreach ($chart as $point)
                    <span class="dash-bar {{ $point['total'] === $peak['total'] ? 'dash-bar-peak' : '' }}"
                        style="height: {{ max($point['total'] > 0 ? 4 : 2, (int) round($point['total'] / $maxTotal * 100)) }}%"
                        title="{{ $point['date']->isoFormat('D MMM YYYY') }} — Rp {{ number_format($point['total'], 0, ',', '.') }}"></span>
                @endforeach
            </div>
            <p class="dash-chart-axis">
                <span>{{ $chart->first()['date']->isoFormat('D MMM') }}</span>
                <span>Puncak: {{ $peak['date']->isoFormat('D MMM') }} — Rp {{ number_format($peak['total'], 0, ',', '.') }}</span>
                <span>Hari ini</span>
            </p>

            <footer class="dash-stats">
                <div>
                    <p>Pesanan lunas</p>
                    <strong>{{ $paidCount30 }}</strong>
                </div>
                <div>
                    <p>Rata-rata per transaksi</p>
                    <strong>Rp {{ number_format($paidCount30 > 0 ? intdiv($revenue30, $paidCount30) : 0, 0, ',', '.') }}</strong>
                </div>
                <div>
                    <p>Hari dengan transaksi</p>
                    <strong>{{ $chart->where('total', '>', 0)->count() }} / 30</strong>
                </div>
            </footer>
        </article>

        <article class="dash-card dash-actions-card">
            <header>
                <div>
                    <h2>Perlu Tindakan</h2>
                    <p>Antrean verifikasi bukti transfer</p>
                </div>
                <span class="dash-count-pill">{{ $counts['verification'] }} antrean</span>
            </header>

            <div class="dash-actions">
                @forelse ($attention as $order)
                    <article class="dash-action-item">
                        <div class="dash-action-top">
                            <strong>{{ $order->order_number }}</strong>
                            <span>{{ $order->user?->name ?? 'Akun dihapus' }}</span>
                            <b>Rp {{ number_format($order->total_price, 0, ',', '.') }}</b>
                        </div>
                        <p>{{ $order->package->name }}</p>
                        <div class="dash-action-buttons">
                            @if ($order->payment_receipt_path)
                                <a href="{{ route('admin.orders.receipt', $order) }}">Lihat bukti transfer</a>
                            @endif
                            <form method="POST" action="{{ route('admin.orders.verify', $order) }}" class="dash-reject-form">
                                @csrf
                                <input type="hidden" name="action" value="reject">
                                <input type="text" name="note" required maxlength="500" placeholder="Alasan penolakan" aria-label="Alasan penolakan pesanan {{ $order->order_number }}">
                                <button type="submit">Tolak</button>
                            </form>
                            <form method="POST" action="{{ route('admin.orders.verify', $order) }}">
                                @csrf
                                <input type="hidden" name="action" value="approve">
                                <button type="submit" class="dash-approve">Verifikasi</button>
                            </form>
                        </div>
                    </article>
                @empty
                    <p class="dash-empty">Tidak ada antrean verifikasi. Semua pembayaran tertangani.</p>
                @endforelse
            </div>
        </article>
    </section>

    <section class="dash-card dash-recent" aria-labelledby="recent-title">
        <header class="dash-recent-head">
            <div>
                <h2 id="recent-title">Pesanan Terkini</h2>
                <p>Lima transaksi terakhir beserta status pipeline-nya</p>
            </div>
            <a href="{{ route('admin.orders.index') }}">Buka antrean lengkap →</a>
        </header>

        <div class="admin-table-wrap dash-recent-table">
            <table class="admin-table dash-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Konsumen</th>
                        <th scope="col">Paket</th>
                        <th scope="col" class="dash-num">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Verifikasi</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recent as $order)
                        <tr>
                            <th scope="row">{{ $order->order_number }}</th>
                            <td>{{ $order->user?->name ?? 'Akun dihapus' }}</td>
                            <td>{{ $order->package->name }}</td>
                            <td class="dash-num">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td><x-status-pill :status="$order->status" /></td>
                            <td>{{ $order->paid_at?->format('d M Y, H:i') ?? '—' }}</td>
                            <td class="dash-link"><a href="{{ route('admin.orders.show', $order) }}">Detail →</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
