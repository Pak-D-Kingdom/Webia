@extends('auth.layout')

@section('title', 'Detail Pesanan')

@section('content')
    <section class="dashboard-panel" aria-labelledby="order-title">
        <div class="order-heading">
            <div>
                <p class="account-label">{{ $order->order_number }}</p>
                <h1 id="order-title">Detail Pesanan</h1>
            </div>
            <div class="admin-actions">
                <x-status-pill :status="$order->status" />
                <x-status-pill :status="$order->delivery_status" />
            </div>
        </div>

        <div class="order-summary customer-order-summary">
            <dl>
                <div><dt>Paket</dt><dd>{{ $order->package->name }}</dd></div>
                @if ($order->template)
                    <div><dt>Template</dt><dd>{{ $order->template->name }}</dd></div>
                @endif
                @if ($order->addon_snapshot)
                    <div><dt>Layanan tambahan</dt><dd>{{ collect($order->addon_snapshot)->pluck('name')->implode(', ') }}</dd></div>
                @endif
                <div><dt>Total</dt><dd>Rp{{ number_format($order->total_price, 0, ',', '.') }}</dd></div>
                <div><dt>Dibuat</dt><dd>{{ $order->created_at->translatedFormat('d M Y') }}</dd></div>
            </dl>
        </div>

        <x-order-timeline :order="$order" />

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        @if (in_array($order->status, ['awaiting_payment', 'rejected']))
            <div class="dashboard-empty">
                <h2>Bayar via Midtrans</h2>
                <p>QRIS, virtual account, e-wallet, atau kartu kredit di halaman pembayaran Midtrans @if (! config('webia.midtrans.server_key'))<em>(mode simulasi lokal)</em>@endif.</p>
                <form method="POST" action="{{ route('orders.pay', $order) }}">
                    @csrf
                    <button class="account-submit" type="submit">Bayar via Midtrans</button>
                </form>
                @if ($pendingPayment?->snap_redirect_url)
                    <p><a href="{{ $pendingPayment->snap_redirect_url }}">Lanjutkan sesi pembayaran sebelumnya</a></p>
                    <form method="POST" action="{{ route('orders.pay.check', $order) }}">
                        @csrf
                        <button class="account-submit" type="submit">Cek status pembayaran</button>
                    </form>
                @endif
            </div>

            <div class="dashboard-empty">
                <h2>Instruksi transfer</h2>
                @if (config('webia.payment_accounts'))
                    <ul>
                        @foreach (config('webia.payment_accounts') as $account)
                            <li><strong>{{ $account['bank'] }}</strong> {{ $account['number'] }} a.n. {{ $account['holder'] }}</li>
                        @endforeach
                    </ul>
                    <p>Transfer sesuai total ke salah satu rekening di atas, lalu unggah bukti di bawah.</p>
                    @if (config('webia.payment_note'))<p>{{ config('webia.payment_note') }}</p>@endif
                @else
                    <p>Transfer sesuai total ke rekening WEBIA yang dikonfirmasi tim, lalu unggah bukti di bawah.</p>
                @endif
            </div>
        @endif

        @if ($order->status === 'rejected' && $order->logs->where('to_status', 'rejected')->last()?->note)
            <div class="dashboard-empty">
                <h2>Catatan admin</h2>
                <p>{{ $order->logs->where('to_status', 'rejected')->last()->note }}</p>
            </div>
        @endif

        @if (in_array($order->status, ['awaiting_payment', 'rejected']))
            <form class="account-form admin-form" method="POST" action="{{ route('orders.receipt', $order) }}" enctype="multipart/form-data">
                @csrf
                <h2>Kirim bukti pembayaran</h2>
                @if ($order->status === 'rejected') <p class="form-error">Bukti sebelumnya ditolak. Periksa catatan admin dan unggah kembali.</p> @endif
                <div class="form-field"><label for="payment_receipt">Bukti transfer JPG, PNG, atau PDF (maks. 2 MB)</label><input id="payment_receipt" name="payment_receipt" type="file" accept=".jpg,.jpeg,.png,.pdf" required>@error('payment_receipt') <p class="form-error">{{ $message }}</p> @enderror</div>
                <div class="form-field"><label for="payment_note">Catatan (opsional)</label><textarea id="payment_note" name="payment_note" rows="3">{{ old('payment_note') }}</textarea>@error('payment_note') <p class="form-error">{{ $message }}</p> @enderror</div>
                <button class="account-submit" type="submit">Kirim bukti</button>
            </form>
        @elseif ($order->status === 'payment_uploaded')
            <div class="dashboard-empty" role="status"><h2>Menunggu verifikasi</h2><p>Admin sedang memeriksa bukti pembayaranmu.</p></div>
        @elseif ($order->status === 'paid')
            <div class="dashboard-empty">
                @if ($order->delivery_status === 'delivered' && $order->site_slug)
                    <h2>Website kamu siap</h2>
                    <p>Data bisnismu sudah diterapkan ke template yang dipilih.</p>
                    <dl class="business-data-list">
                        <div><dt>URL</dt><dd>{{ route('sites.show', ['order' => $order->site_slug]) }}</dd></div>
                    </dl>
                    <div class="admin-actions">
                        <a class="account-submit" href="{{ route('sites.show', ['order' => $order->site_slug]) }}" rel="noopener" target="_blank">Buka website</a>
                    </div>
                    <p>Hubungi tim WEBIA jika data website perlu diubah.</p>
                @elseif ($order->delivery_status === 'delivered')
                    <h2>Pesanan selesai</h2>
                    <p>Pesanan ini sudah selesai. Silakan hubungi tim WEBIA untuk perubahan data.</p>
                @else
                    <h2>Data bisnis</h2>
                    @if ($order->business_data)
                        <dl class="business-data-list">
                            <div><dt>Nama usaha</dt><dd>{{ $order->business_data['business_name'] }}</dd></div>
                            @if ($order->business_data['tagline'] ?? null)<div><dt>Tagline</dt><dd>{{ $order->business_data['tagline'] }}</dd></div>@endif
                            @if ($order->business_data['whatsapp'] ?? null)<div><dt>WhatsApp</dt><dd>{{ $order->business_data['whatsapp'] }}</dd></div>@endif
                            @if ($order->business_data['description'] ?? null)<div><dt>Deskripsi</dt><dd>{{ $order->business_data['description'] }}</dd></div>@endif
                            @if ($order->business_data['address'] ?? null)<div><dt>Alamat</dt><dd>{{ $order->business_data['address'] }}@if ($order->business_data['city'] ?? null), {{ $order->business_data['city'] }}@endif</dd></div>@endif
                            @if ($order->business_data['address_url'] ?? null)<div><dt>Google Maps</dt><dd><a href="{{ $order->business_data['address_url'] }}" rel="noopener">Lihat lokasi</a></dd></div>@endif
                            @if ($order->business_data['instagram'] ?? null)<div><dt>Instagram</dt><dd>{{ $order->business_data['instagram'] }}</dd></div>@endif
                        </dl>
                    @endif
                    <p>Isi data bisnis di bawah agar tim WEBIA bisa mulai mengerjakan website. Data bisa diubah sampai pesanan selesai.</p>
                @endif
            </div>

            @if ($order->delivery_status !== 'delivered')
                <form class="account-form admin-form" method="POST" action="{{ route('orders.business', $order) }}">
                    @csrf
                    <h2>{{ $order->business_data ? 'Ubah data bisnis' : 'Isi data bisnis' }}</h2>
                    @php $business = $order->business_data ?? []; @endphp
                    <div class="form-field"><label for="business_name">Nama usaha</label><input id="business_name" name="business_name" type="text" value="{{ old('business_name', $business['business_name'] ?? '') }}" required>@error('business_name') <p class="form-error">{{ $message }}</p> @enderror</div>
                    <div class="form-field"><label for="tagline">Tagline (opsional)</label><input id="tagline" name="tagline" type="text" value="{{ old('tagline', $business['tagline'] ?? '') }}">@error('tagline') <p class="form-error">{{ $message }}</p> @enderror</div>
                    <div class="form-field"><label for="whatsapp">Nomor WhatsApp {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="whatsapp" name="whatsapp" type="text" inputmode="tel" value="{{ old('whatsapp', $business['whatsapp'] ?? '') }}" @required($order->supportsCustomerSite())>@error('whatsapp') <p class="form-error">{{ $message }}</p> @enderror</div>
                    <div class="form-field"><label for="description">Deskripsi usaha (opsional)</label><textarea id="description" name="description" rows="3">{{ old('description', $business['description'] ?? '') }}</textarea>@error('description') <p class="form-error">{{ $message }}</p> @enderror</div>
                    <div class="form-field"><label for="address">Alamat usaha {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="address" name="address" type="text" value="{{ old('address', $business['address'] ?? '') }}" @required($order->supportsCustomerSite())>@error('address') <p class="form-error">{{ $message }}</p> @enderror</div>
                    <div class="form-field"><label for="city">Kota {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="city" name="city" type="text" value="{{ old('city', $business['city'] ?? '') }}" @required($order->supportsCustomerSite())>@error('city') <p class="form-error">{{ $message }}</p> @enderror</div>
                    <div class="form-field"><label for="address_url">Link lokasi Google Maps (opsional)</label><input id="address_url" name="address_url" type="url" value="{{ old('address_url', $business['address_url'] ?? '') }}">@error('address_url') <p class="form-error">{{ $message }}</p> @enderror</div>
                    <div class="form-field"><label for="instagram">Instagram (opsional)</label><input id="instagram" name="instagram" type="text" value="{{ old('instagram', $business['instagram'] ?? '') }}">@error('instagram') <p class="form-error">{{ $message }}</p> @enderror</div>
                    <button class="account-submit" type="submit">Simpan data bisnis</button>
                </form>
            @endif
        @endif
    </section>
@endsection
