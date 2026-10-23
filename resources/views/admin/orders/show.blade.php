@extends('auth.layout')

@section('title', $order->order_number)
@section('header-action')
    <a class="account-header-link" href="{{ route('admin.orders.index') }}">Daftar pesanan</a>
@endsection

@section('content')
    <header class="dash-header">
        <div>
            <p class="dash-pill"><span aria-hidden="true"></span> {{ $order->order_number }}</p>
            <h1 id="admin-order-title">{{ $order->user?->name ?? 'Akun dihapus' }}</h1>
            <p class="dash-lede">{{ $order->package_snapshot['name'] ?? $order->package->name }} — total Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
        </div>
        <x-status-pill :status="$order->status" />
    </header>

    @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

    <div class="order-detail-split">
        <div class="order-detail-main">
            <article class="dash-card">
                <header>
                    <div>
                        <h2>Tagihan &amp; produk</h2>
                        <p>Rincian pesanan yang dibeli konsumen</p>
                    </div>
                </header>
                <dl class="business-data-list">
                    <div><dt>Paket</dt><dd>{{ $order->package_snapshot['name'] ?? $order->package->name }}</dd></div>
                    <div><dt>Total</dt><dd>Rp {{ number_format($order->total_price, 0, ',', '.') }}</dd></div>
                    <div><dt>Template</dt><dd>{{ $order->template_snapshot['name'] ?? $order->template?->name ?? 'Tidak dipilih' }}</dd></div>
                    <div><dt>Kategori</dt><dd>{{ $order->category_slug ?: 'Tidak dipilih' }}</dd></div>
                </dl>
                @if ($order->addon_snapshot)
                    <h3>Add-on</h3>
                    <ul class="order-detail-list">
                        @foreach ($order->addon_snapshot as $addon)
                            <li>{{ $addon['name'] }} — {{ $addon['price'] === null ? 'Konsultasi' : 'Rp '.number_format($addon['price'], 0, ',', '.') }}</li>
                        @endforeach
                    </ul>
                @endif
            </article>

            <article class="dash-card">
                <header>
                    <div>
                        <h2>Pembayaran</h2>
                        <p>Midtrans &amp; bukti transfer manual</p>
                    </div>
                </header>
                @if ($order->payments->isNotEmpty())
                    <ul class="order-detail-list">
                        @foreach ($order->payments as $payment)
                            <li @if ($payment->status === 'duplicate') class="order-payment-duplicate" aria-label="Perlu refund" @endif>
                                {{ $payment->midtrans_order_id }} — <strong>{{ str_replace('_', ' ', $payment->status) }}</strong>@if ($payment->status === 'duplicate') — pembayaran ganda, perlu refund manual @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if ($order->payment_note)
                    <h3>Catatan pembayaran</h3>
                    <p>{{ $order->payment_note }}</p>
                @endif
                @if ($order->payment_receipt_path && $order->status !== 'payment_uploaded')
                    <p class="order-detail-receipt"><a href="{{ route('admin.orders.receipt', $order) }}">Unduh bukti transfer: {{ basename($order->payment_receipt_path) }}</a></p>
                @endif

                @if ($order->status === 'payment_uploaded')
                    <form class="account-form admin-form order-verify-form" method="POST" action="{{ route('admin.orders.verify', $order) }}">
                        @csrf
                        @if ($order->payment_receipt_path)
                            <p><a href="{{ route('admin.orders.receipt', $order) }}">Unduh bukti transfer: {{ basename($order->payment_receipt_path) }}</a></p>
                        @endif
                        <div class="form-field"><label for="note">Catatan verifikasi</label><textarea id="note" name="note" rows="3" placeholder="Wajib diisi jika menolak">{{ old('note') }}</textarea>@error('note') <p class="form-error">{{ $message }}</p> @enderror</div>
                        <div class="admin-actions"><button class="dash-approve" name="action" value="approve" type="submit">Terima pembayaran</button><button name="action" value="reject" type="submit">Tolak pembayaran</button></div>
                    </form>
                @elseif ($order->status === 'awaiting_payment')
                    <p role="status">Verifikasi tersedia setelah customer mengirim bukti pembayaran.</p>
                @endif
            </article>

            @if ($order->status === 'paid')
                <article class="dash-card">
                    <header>
                        <div>
                            <h2>Progres pengerjaan</h2>
                            <p>Status: <strong>{{ ucfirst(str_replace('_', ' ', $order->delivery_status)) }}</strong></p>
                        </div>
                    </header>
                    @if ($order->business_data)
                        <dl class="business-data-list">
                            <div><dt>Nama usaha</dt><dd>{{ $order->business_data['business_name'] }}</dd></div>
                            @if ($order->business_data['tagline'] ?? null)<div><dt>Tagline</dt><dd>{{ $order->business_data['tagline'] }}</dd></div>@endif
                            @if ($order->business_data['whatsapp'] ?? null)<div><dt>WhatsApp</dt><dd>{{ $order->business_data['whatsapp'] }}</dd></div>@endif
                            @if ($order->business_data['description'] ?? null)<div><dt>Deskripsi</dt><dd>{{ $order->business_data['description'] }}</dd></div>@endif
                            @if ($order->business_data['address_url'] ?? null)<div><dt>Alamat</dt><dd><a href="{{ $order->business_data['address_url'] }}" rel="noopener">{{ $order->business_data['address_url'] }}</a></dd></div>@endif
                            @if ($order->business_data['instagram'] ?? null)<div><dt>Instagram</dt><dd>{{ $order->business_data['instagram'] }}</dd></div>@endif
                        </dl>
                    @else
                        <p role="status">Customer belum mengisi data bisnis.</p>
                    @endif
                    @if ($order->business_data && $order->delivery_status === 'not_started')
                        <form method="POST" action="{{ route('admin.orders.progress', $order) }}">
                            @csrf
                            <div class="admin-actions"><button class="dash-approve" name="action" value="start" type="submit">Mulai kerjakan</button></div>
                        </form>
                    @elseif ($order->business_data && $order->delivery_status === 'in_progress')
                        <form method="POST" action="{{ route('admin.orders.progress', $order) }}">
                            @csrf
                            <div class="admin-actions"><button class="dash-approve" name="action" value="finish" type="submit">Tandai selesai</button></div>
                        </form>
                    @endif
                </article>
            @endif
        </div>

        <aside class="order-detail-aside">
            <article class="dash-card">
                <header>
                    <div>
                        <h2>Konsumen</h2>
                        <p>Info pemesan</p>
                    </div>
                </header>
                <dl class="business-data-list">
                    <div><dt>Nama</dt><dd>{{ $order->user?->name ?? 'Akun dihapus' }}</dd></div>
                    <div><dt>Email</dt><dd>{{ $order->user?->email ?? '—' }}</dd></div>
                    <div><dt>Tanggal pesan</dt><dd>{{ $order->created_at->format('d M Y, H:i') }}</dd></div>
                    <div><dt>Lunas pada</dt><dd>{{ $order->paid_at?->format('d M Y, H:i') ?? '—' }}</dd></div>
                </dl>
            </article>

            <article class="dash-card">
                <header>
                    <div>
                        <h2>Status pipeline</h2>
                        <p>Pembayaran &amp; pengerjaan</p>
                    </div>
                </header>
                <dl class="business-data-list">
                    <div><dt>Pembayaran</dt><dd><x-status-pill :status="$order->status" /></dd></div>
                    <div><dt>Pengerjaan</dt><dd><x-status-pill :status="$order->delivery_status" /></dd></div>
                </dl>
            </article>
        </aside>
    </div>
@endsection
