@extends('auth.layout')

@section('title', 'Pesanan Dibuat')

@section('content')
    @php
        $guestOrder = session('guest_order');
        $snapToken = $guestOrder['snap_token'] ?? null;
    @endphp
    <section class="dashboard-panel" aria-labelledby="order-success-title">
        <div class="customer-create-card customer-verify-panel">
            <span class="customer-verify-icon" aria-hidden="true">
                <span class="material-symbols-outlined">mark_email_read</span>
            </span>
            <h1 id="order-success-title">Pesanan kamu sudah dibuat</h1>
            <p>Nomor pesanan <strong>{{ $guestOrder['order_number'] }}</strong> sudah masuk ke akun WEBIA.</p>
            <p>Kami mengirim email berisi email dan kata sandi untuk masuk ke portal ke <strong>{{ $guestOrder['email'] }}</strong>.</p>

            @if ($snapToken && config('webia.midtrans.client_key'))
                <div class="customer-create-submit">
                    <button id="snap-pay-button" class="account-submit customer-create-submit-btn" type="button">Bayar sekarang</button>
                    <p class="customer-verify-note" id="snap-pay-hint" hidden>Popup pembayaran terbuka di atas halaman ini.</p>
                </div>
                <p class="customer-verify-note" id="snap-paid-note" hidden>Pembayaran kamu diterima. Masuk ke portal untuk melanjutkan.</p>
                <a class="customer-detail-secondary" href="{{ route('login') }}">Masuk ke portal</a>
            @elseif ($snapToken && isset($guestOrder['snap_redirect_url']))
                <p class="customer-verify-note">Popup pembayaran halaman ini belum aktif karena kredensial publik Midtrans (MIDTRANS_CLIENT_KEY) belum diisi.</p>
                <a class="account-submit customer-create-submit-btn" href="{{ $guestOrder['snap_redirect_url'] }}">Bayar via Midtrans</a>
            @elseif (isset($guestOrder['simulate_url']))
                <div class="customer-create-submit">
                    <a class="account-submit customer-create-submit-btn" href="{{ $guestOrder['simulate_url'] }}">Bayar via Midtrans (simulasi)</a>
                </div>
                <p class="customer-verify-note">Mode dev tanpa kredensial Midtrans: pembayaran disimulasikan lokal.</p>
            @else
                <p class="customer-verify-note">Pembayaran gagal dibuat otomatis. Masuk ke portal lalu tekan "Bayar via Midtrans" di detail pesanan.</p>
                <a class="account-submit customer-create-submit-btn" href="{{ route('login') }}">Masuk ke portal</a>
            @endif
        </div>
    </section>

    @if ($snapToken && config('webia.midtrans.client_key'))
        <script src="https://app.{{ config('webia.midtrans.is_production') ? '' : 'sandbox.' }}midtrans.com/snap/snap.js"
            data-client-key="{{ config('webia.midtrans.client_key') }}"></script>
        <script>
            (function () {
                var token = @js($snapToken);
                var hint = document.getElementById('snap-pay-hint');
                var button = document.getElementById('snap-pay-button');
                var paidNote = document.getElementById('snap-paid-note');
                var opened = false;

                var open = function () {
                    if (!window.snap || opened) return;
                    opened = true;
                    if (hint) hint.hidden = false;
                    window.snap.pay(token, {
                        onSuccess: function () { finish(); },
                        onPending: function () { finish(); },
                        onError: function () {
                            opened = false;
                            if (hint) hint.hidden = true;
                        },
                        onClose: function () {
                            opened = false;
                            if (hint) hint.hidden = true;
                        }
                    });
                };

                var finish = function () {
                    if (button) button.hidden = true;
                    if (hint) hint.hidden = true;
                    if (paidNote) paidNote.hidden = false;
                };

                if (button) button.addEventListener('click', open);
                // Popup pembayaran muncul otomatis tanpa pindah halaman.
                var tries = 0;
                (function wait() {
                    if (window.snap) { open(); return; }
                    if (++tries > 25) return;
                    setTimeout(wait, 200);
                })();
            })();
        </script>
    @endif
@endsection
