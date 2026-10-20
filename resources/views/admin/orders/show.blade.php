@extends('auth.layout')

@section('title', $order->order_number)
@section('header-action')
    <a class="account-header-link" href="{{ route('admin.orders.index') }}">Daftar pesanan</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="admin-order-title">
        <p class="account-label">{{ $order->order_number }}</p>
        <h1 id="admin-order-title">{{ $order->user?->name ?? 'Akun dihapus' }}</h1>
        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        <div class="order-summary">
            <dl>
                <div><dt>Paket</dt><dd>{{ $order->package_snapshot['name'] ?? $order->package->name }}</dd></div>
                <div><dt>Status</dt><dd>{{ str_replace('_', ' ', $order->status) }}</dd></div>
                <div><dt>Total</dt><dd>Rp{{ number_format($order->total_price, 0, ',', '.') }}</dd></div>
                <div><dt>Kategori</dt><dd>{{ $order->category_slug ?: 'Tidak dipilih' }}</dd></div>
                <div><dt>Template</dt><dd>{{ $order->template_snapshot['name'] ?? $order->template?->name ?? 'Tidak dipilih' }}</dd></div>
            </dl>
        </div>

        @if ($order->addon_snapshot)
            <div class="dashboard-empty">
                <h2>Add-on</h2>
                <ul>
                    @foreach ($order->addon_snapshot as $addon)
                        <li>{{ $addon['name'] }} — {{ $addon['price'] === null ? 'Konsultasi' : 'Rp'.number_format($addon['price'], 0, ',', '.') }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($order->payment_note)
            <div class="dashboard-empty"><h2>Catatan pembayaran</h2><p>{{ $order->payment_note }}</p></div>
        @endif

        @if ($order->status === 'payment_uploaded')
            <form class="account-form admin-form" method="POST" action="{{ route('admin.orders.verify', $order) }}">
                @csrf
                <h2>Verifikasi pembayaran</h2>
                <p><a href="{{ route('admin.orders.receipt', $order) }}">Unduh bukti transfer: {{ basename($order->payment_receipt_path) }}</a></p>
                <div class="form-field"><label for="note">Catatan</label><textarea id="note" name="note" rows="3">{{ old('note') }}</textarea>@error('note') <p class="form-error">{{ $message }}</p> @enderror</div>
                <div class="admin-actions"><button name="action" value="approve" type="submit">Terima pembayaran</button><button name="action" value="reject" type="submit">Tolak pembayaran</button></div>
            </form>
        @else
            <div class="dashboard-empty" role="status"><h2>Belum dapat diverifikasi</h2><p>Verifikasi tersedia setelah customer mengirim bukti pembayaran.</p></div>
        @endif
    </section>
@endsection
