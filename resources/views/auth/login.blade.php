@extends('auth.layout')

@section('title', 'Masuk')

@section('content')
    <section class="auth-split" aria-labelledby="login-title">
        <aside class="auth-brand">
            <div class="auth-brand-grid" aria-hidden="true"></div>

            <div class="auth-brand-top">
                <span class="auth-logo" aria-hidden="true">W</span>
                <span class="auth-brand-name">WEBIA</span>
                <span class="auth-brand-tag">v2.4 Ready</span>
            </div>

            <div>
                <p class="auth-brand-kicker">Setup kilat 24 jam, garansi live</p>
                <h1 id="login-title">Beli template, website langsung dikerjakan tim <em>WEBIA</em></h1>
                <p class="auth-brand-lede">Platform marketplace template website untuk bisnis Indonesia, terintegrasi pembayaran Midtrans dan setup cloud VPS instan.</p>

                <ul class="auth-points">
                    <li>
                        <i aria-hidden="true">⚡</i>
                        <div><b>Setup Domain &amp; Cloud VPS Siap Pakai</b><span>Konfigurasi server, database, &amp; SSL tuntas dalam 24 jam.</span></div>
                    </li>
                    <li>
                        <i aria-hidden="true">💳</i>
                        <div><b>Integrasi Midtrans Snap Otomatis</b><span>Terima QRIS, Virtual Account &amp; kartu kredit tanpa ribet.</span></div>
                    </li>
                    <li>
                        <i aria-hidden="true">🛡️</i>
                        <div><b>Full Source Code &amp; Garansi SLA</b><span>Lisensi komersial resmi dengan dokumentasi &amp; bantuan teknis.</span></div>
                    </li>
                </ul>
            </div>

            <div class="auth-brand-bottom">
                <span>© {{ now()->year }} WEBIA Solusi Digital Indonesia</span>
                <span>🔒 Keamanan terenkripsi SSL 256-bit</span>
            </div>
        </aside>

        <div class="auth-panel">
            <div class="auth-card">
                <p class="auth-pill">{{ request()->routeIs('admin.*') ? 'Area Admin Webia' : 'Akun Webia' }}</p>
                <h2>Selamat Datang Kembali</h2>
                <p class="auth-card-lede">Masuk untuk mengelola pesanan, pembayaran, dan progress website kamu dari satu tempat.</p>

                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf

                    <div class="auth-field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            placeholder="nama@perusahaan.com" autocomplete="email" required autofocus
                            aria-describedby="email-error">
                        @error('email')
                            <p class="auth-error" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label for="password">Kata Sandi</label>
                        <input id="password" name="password" type="password" placeholder="Masukkan kata sandi..."
                            autocomplete="current-password" required aria-describedby="password-error">
                        @error('password')
                            <p class="auth-error" id="password-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="auth-submit">Masuk</button>
                </form>

                <p class="auth-swap">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>

                <a class="auth-admin-link" href="{{ route('login') }}">
                    <span aria-hidden="true">⚙️</span> Masuk dari Portal Admin WEBIA
                </a>

                <p class="auth-fineprint">Dengan masuk, kamu menyetujui Syarat &amp; Ketentuan Lisensi serta Kebijakan Privasi WEBIA.</p>
            </div>
        </div>
    </section>
@endsection
