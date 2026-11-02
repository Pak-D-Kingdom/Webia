@extends('auth.layout')

@section('title', 'Detail Pesanan')

@section('content')
    @php $uploadedAt = $order->payments->last()?->created_at ?? $order->logs->where('to_status', 'payment_uploaded')->last()?->created_at; @endphp
    <section class="dashboard-panel" aria-labelledby="order-title">
        <div class="customer-detail-head">
            <a class="customer-create-back" href="{{ route('orders.index') }}">
                <span aria-hidden="true" class="material-symbols-outlined">arrow_back</span>
                Kembali ke Pesanan Saya
            </a>
            <div class="customer-detail-row">
                <div>
                    <p class="customer-detail-id">{{ $order->order_number }}</p>
                    <h1 id="order-title" class="customer-detail-title">{{ $order->package->name }}</h1>
                    <div class="customer-detail-pills">
                        <x-status-pill :status="$order->status" with-icon />
                        <x-status-pill :status="$order->delivery_status" with-icon />
                    </div>
                </div>
                <div class="customer-detail-total">
                    <p>Total Tagihan</p>
                    <strong>Rp{{ number_format($order->total_price, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>

        <section class="customer-create-card" aria-label="Tahapan pengerjaan">
            <h2 class="customer-steps-heading">
                <span aria-hidden="true" class="material-symbols-outlined">linear_scale</span>
                Timeline Pesanan
            </h2>
            <x-order-timeline :order="$order" :payment="$order->payments->last()" />
        </section>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        <div class="customer-create-grid">
            <div class="customer-create-main">
                @if (in_array($order->status, ['awaiting_payment', 'rejected']))
                    <div class="customer-create-card" @if ($pendingPayment) data-payment-status-url="{{ route('orders.payment-status.authenticated', $order) }}" @endif>
                        <h2 class="customer-create-legend">
                            <span aria-hidden="true" class="material-symbols-outlined">account_balance_wallet</span>
                            Bayar via Midtrans
                        </h2>
                        <p class="customer-create-option-desc">QRIS, virtual account, e-wallet, atau kartu kredit di halaman pembayaran Midtrans{{ config('webia.midtrans.server_key') ? '' : ' (mode simulasi lokal)' }}.</p>
                        <form method="POST" action="{{ route('orders.pay', $order) }}">
                            @csrf
                            <button class="account-submit customer-create-submit-btn" type="submit">Bayar via Midtrans</button>
                        </form>
                        @if ($pendingPayment?->snap_redirect_url)
                            <p><a href="{{ $pendingPayment->snap_redirect_url }}">Lanjutkan sesi pembayaran sebelumnya</a></p>
                            <p class="customer-create-option-desc" data-payment-status-note role="status" aria-live="polite">Status pembayaran diperiksa otomatis.</p>
                        @endif
                    </div>

                    <div class="customer-create-card">
                        <h2 class="customer-create-legend">
                            <span aria-hidden="true" class="material-symbols-outlined">account_balance</span>
                            Instruksi transfer
                        </h2>
                        @if (config('webia.payment_accounts'))
                            <ul class="customer-detail-accounts">
                                @foreach (config('webia.payment_accounts') as $account)
                                    <li><strong>{{ $account['bank'] }}</strong> {{ $account['number'] }} a.n. {{ $account['holder'] }}</li>
                                @endforeach
                            </ul>
                            <p class="customer-create-option-desc">Transfer sesuai total ke salah satu rekening di atas, lalu unggah bukti di bawah.</p>
                            @if (config('webia.payment_note'))<p class="customer-create-option-desc">{{ config('webia.payment_note') }}</p>@endif
                        @else
                            <p class="customer-create-option-desc">Transfer sesuai total ke rekening WEBIA yang dikonfirmasi tim, lalu unggah bukti di bawah.</p>
                        @endif
                    </div>

                    @if ($order->status === 'rejected' && $order->logs->where('to_status', 'rejected')->last()?->note)
                        <div class="customer-create-card">
                            <h2 class="customer-create-legend">
                                <span aria-hidden="true" class="material-symbols-outlined">info</span>
                                Catatan admin
                            </h2>
                            <p class="customer-create-option-desc">{{ $order->logs->where('to_status', 'rejected')->last()->note }}</p>
                        </div>
                    @endif

                    <form class="customer-create-card" method="POST" action="{{ route('orders.receipt', $order) }}" enctype="multipart/form-data">
                        <h2 class="customer-create-legend">
                            <span aria-hidden="true" class="material-symbols-outlined">upload_file</span>
                            Kirim bukti pembayaran
                        </h2>
                        @if ($order->status === 'rejected') <p class="form-error">Bukti sebelumnya ditolak. Periksa catatan admin dan unggah kembali.</p> @endif
                        <div class="form-field"><label for="payment_receipt">Bukti transfer JPG, PNG, atau PDF (maks. 2 MB)</label><input id="payment_receipt" name="payment_receipt" type="file" accept=".jpg,.jpeg,.png,.pdf" required>@error('payment_receipt') <p class="form-error">{{ $message }}</p> @enderror</div>
                        <div class="form-field"><label for="payment_note">Catatan (opsional)</label><textarea id="payment_note" name="payment_note" rows="3">{{ old('payment_note') }}</textarea>@error('payment_note') <p class="form-error">{{ $message }}</p> @enderror</div>
                        <button class="account-submit customer-create-submit-btn" type="submit">Kirim bukti</button>
                    </form>
                @elseif ($order->status === 'payment_uploaded')
                    <section class="customer-create-card customer-verify-panel" role="status">
                        <span class="customer-verify-icon" aria-hidden="true">
                            <span class="material-symbols-outlined">hourglass_empty</span>
                        </span>
                        <h2>Menunggu verifikasi</h2>
                        <p>Admin sedang memeriksa bukti pembayaranmu. Proses verifikasi biasanya memakan waktu maksimal 1x24 jam kerja.</p>
                        @if ($uploadedAt)
                            <div class="customer-verify-meta">
                                <span>Waktu unggah bukti:</span>
                                <strong>{{ $uploadedAt->translatedFormat('d M Y H:i') }}</strong>
                            </div>
                        @endif
                        <p class="customer-verify-note">Formulir pembayaran dan upload dinonaktifkan sementara bukti diperiksa oleh admin.</p>
                    </section>
                @elseif ($order->status === 'paid')
                    <div class="customer-create-card">
                        @if ($order->delivery_status === 'delivered' && $order->site_slug)
                            <h2 class="customer-create-legend">
                                <span aria-hidden="true" class="material-symbols-outlined">verified</span>
                                Website kamu siap
                            </h2>
                            <p class="customer-create-option-desc">Data bisnismu sudah diterapkan ke template yang dipilih.</p>
                            <dl class="business-data-list">
                                <div><dt>URL</dt><dd>{{ route('sites.show', ['order' => $order->site_slug]) }}</dd></div>
                            </dl>
                            <div class="customer-create-submit">
                                <a class="account-submit customer-create-submit-btn" href="{{ route('sites.show', ['order' => $order->site_slug]) }}" rel="noopener" target="_blank">Buka website</a>
                            </div>
                            <p class="customer-create-note">Hubungi tim WEBIA jika data website perlu diubah.</p>
                        @elseif ($order->delivery_status === 'delivered')
                            <h2 class="customer-create-legend">
                                <span aria-hidden="true" class="material-symbols-outlined">verified</span>
                                Pesanan selesai
                            </h2>
                            <p class="customer-create-option-desc">Pesanan ini sudah selesai. Silakan hubungi tim WEBIA untuk perubahan data.</p>
                        @else
                            <h2 class="customer-create-legend">
                                <span aria-hidden="true" class="material-symbols-outlined">edit_note</span>
                                Data bisnis
                            </h2>
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
                            <p class="customer-create-option-desc">Isi data bisnis di bawah agar tim WEBIA bisa mulai mengerjakan website. Data bisa diubah sampai pesanan selesai.</p>
                        @endif
                    </div>

                    @if ($order->delivery_status !== 'delivered')
                        <form class="customer-create-card" method="POST" action="{{ route('orders.business', $order) }}">
                            <h2 class="customer-create-legend">
                                <span aria-hidden="true" class="material-symbols-outlined">edit_note</span>
                                {{ $order->business_data ? 'Ubah data bisnis' : 'Isi data bisnis' }}
                            </h2>
                            @php $business = $order->business_data ?? []; @endphp
                            <div class="form-field"><label for="business_name">Nama usaha</label><input id="business_name" name="business_name" type="text" value="{{ old('business_name', $business['business_name'] ?? '') }}" required>@error('business_name') <p class="form-error">{{ $message }}</p> @enderror</div>
                            <div class="form-field"><label for="tagline">Tagline (opsional)</label><input id="tagline" name="tagline" type="text" value="{{ old('tagline', $business['tagline'] ?? '') }}">@error('tagline') <p class="form-error">{{ $message }}</p> @enderror</div>
                            <div class="form-field"><label for="whatsapp">Nomor WhatsApp {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="whatsapp" name="whatsapp" type="text" inputmode="tel" value="{{ old('whatsapp', $business['whatsapp'] ?? '') }}" @required($order->supportsCustomerSite())>@error('whatsapp') <p class="form-error">{{ $message }}</p> @enderror</div>
                            <div class="form-field"><label for="description">Deskripsi usaha (opsional)</label><textarea id="description" name="description" rows="3">{{ old('description', $business['description'] ?? '') }}</textarea>@error('description') <p class="form-error">{{ $message }}</p> @enderror</div>
                            <div class="form-field"><label for="address">Alamat usaha {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="address" name="address" type="text" value="{{ old('address', $business['address'] ?? '') }}" @required($order->supportsCustomerSite())>@error('address') <p class="form-error">{{ $message }}</p> @enderror</div>
                            <div class="form-field"><label for="city">Kota {{ $order->supportsCustomerSite() ? '' : '(opsional)' }}</label><input id="city" name="city" type="text" value="{{ old('city', $business['city'] ?? '') }}" @required($order->supportsCustomerSite())>@error('city') <p class="form-error">{{ $message }}</p> @enderror</div>
                            <div class="form-field"><label for="address_url">Link lokasi Google Maps (opsional)</label><input id="address_url" name="address_url" type="url" value="{{ old('address_url', $business['address_url'] ?? '') }}">@error('address_url') <p class="form-error">{{ $message }}</p> @enderror</div>
                            <div class="form-field"><label for="instagram">Instagram (opsional)</label><input id="instagram" name="instagram" type="text" value="{{ old('instagram', $business['instagram'] ?? '') }}">@error('instagram') <p class="form-error">{{ $message }}</p> @enderror</div>
                            <button class="account-submit customer-create-submit-btn" type="submit">Simpan data bisnis</button>
                        </form>
                    @endif
                @endif
            </div>

            <aside aria-label="Rincian pesanan">
                <section class="customer-create-card customer-create-summary">
                    <h2 id="summary-title">
                        <span aria-hidden="true" class="material-symbols-outlined">receipt_long</span>
                        Ringkasan Pesanan
                    </h2>
                    <div class="customer-create-summary-rows">
                        <div class="customer-create-summary-row">
                            <span>Nomor Pesanan</span>
                            <strong>{{ $order->order_number }}</strong>
                        </div>
                        <div class="customer-create-summary-row">
                            <span>Template</span>
                            <strong @class(['is-unset' => ! $order->template])>{{ $order->template?->name ?? '-' }}</strong>
                        </div>
                        <div class="customer-create-summary-row">
                            <span>Paket</span>
                            <strong>{{ $order->package->name }}</strong>
                        </div>
                        <div class="customer-create-summary-addons">
                            <span>Add-on terpilih:</span>
                            <div class="customer-create-addon-list">
                                @if (collect($order->addon_snapshot)->isEmpty())
                                    <span class="is-unset">Tidak ada add-on</span>
                                @else
                                    @foreach ($order->addon_snapshot as $addon)
                                        <span class="customer-create-addon-row">
                                            <span>{{ $addon['name'] }}</span>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="customer-create-summary-row">
                            <span>Tanggal Pesanan</span>
                            <strong>{{ $order->created_at->translatedFormat('d M Y') }}</strong>
                        </div>
                        <div class="customer-create-summary-total">
                            <span>Total Tagihan</span>
                            <strong>Rp{{ number_format($order->total_price, 0, ',', '.') }}</strong>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </section>
@endsection
