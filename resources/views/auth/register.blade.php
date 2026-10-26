@extends('auth.layout')

@section('title', 'Daftar Akun')

@section('content')
    <section class="auth-split" aria-labelledby="register-title">
        <aside class="auth-brand">
            <div class="auth-brand-grid" aria-hidden="true"></div>

            <div class="auth-brand-top">
                <span class="auth-logo" aria-hidden="true">W</span>
                <span class="auth-brand-name">WEBIA</span>
                <span class="auth-brand-tag">Enterprise Ready</span>
            </div>

            <div>
                <p class="auth-brand-kicker">Setup kilat 24 jam, garansi live</p>
                <h1 id="register-title">Beli template, website langsung dikerjakan tim <em>WEBIA</em></h1>
                <p class="auth-brand-lede">Daftarkan profil bisnismu dan mulai pemilihan template yang paling tepat; sisanya tim WEBIA yang urus.</p>

                <ul class="auth-points">
                    <li>
                        <i aria-hidden="true">🚀</i>
                        <div><b>Dukungan Setup End-to-End</b><span>Domain, SSL, database, hingga website live — tim teknis kami kerjakan.</span></div>
                    </li>
                    <li>
                        <i aria-hidden="true">📱</i>
                        <div><b>Integrasi Pembayaran Indonesia</b><span>Modul Midtrans, QRIS otomatis, &amp; BCA Virtual Account.</span></div>
                    </li>
                    <li>
                        <i aria-hidden="true">🧩</i>
                        <div><b>Fleksibilitas Tanpa Batas</b><span>Full source code bersih + arsitektur siap dikembangkan.</span></div>
                    </li>
                </ul>
            </div>

            <div class="auth-brand-bottom">
                <span>Butuh onboarding khusus? sales@webia.id</span>
                <span>PT WEBIA DIGITAL NUSANTARA</span>
            </div>
        </aside>

        <div class="auth-panel">
            <div class="auth-card">
                <p class="auth-pill">Daftar Klien Baru</p>
                <h2>Buat Akun WEBIA</h2>
                <p class="auth-card-lede">Registrasi sekali untuk pesan template, pembayaran, hingga lisensi &amp; source code.</p>

                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf

                    <div class="auth-field">
                        <label for="name">Nama Lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                            placeholder="Nama lengkap / PIC bisnis" required autofocus
                            aria-describedby="name-error">
                        @error('name')
                            <p class="auth-error" id="name-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label for="email">Email Bisnis</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            placeholder="nama@perusahaan.com" autocomplete="email" required
                            aria-describedby="email-error">
                        @error('email')
                            <p class="auth-error" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label for="password">Kata Sandi</label>
                        <input id="password" name="password" type="password" autocomplete="new-password"
                            placeholder="8+ karakter, kombinasi huruf & angka" required
                            aria-describedby="password-error">
                        @error('password')
                            <p class="auth-error" id="password-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            autocomplete="new-password" placeholder="Ketik ulang kata sandi" required>
                    </div>

                    <button type="submit" class="auth-submit">Buat Akun Sekarang</button>
                </form>

                <p class="auth-swap">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk di sini</a></p>

                <p class="auth-fineprint">Dengan mendaftar, kamu menyetujui Syarat &amp; Ketentuan Lisensi serta Kebijakan Privasi WEBIA.</p>
            </div>
        </div>
    </section>
@endsection
