@extends('auth.layout')

@section('title', 'Masuk')

@section('header-action')
    <a class="account-header-link" href="{{ route('register') }}">Buat akun</a>
@endsection

@section('content')
    <section class="account-panel" aria-labelledby="login-title">
        <div class="account-copy">
            <p class="account-label">Akun WEBIA</p>
            <h1 id="login-title">Masuk ke dashboard</h1>
            <p>Pantau pesanan website dan lanjutkan proses layanan dari satu tempat.</p>
            <ul class="account-points">
                <li>Status pembayaran dan pengerjaan selalu terlihat</li>
                <li>Data bisnis tersimpan bersama pesanan</li>
                <li>Riwayat layanan mudah dibuka kembali</li>
            </ul>
        </div>

        <form method="POST" action="{{ route('login') }}" class="account-form">
            @csrf

            <div class="form-field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus
                    aria-describedby="email-error">
                @error('email')
                    <p class="form-error" id="email-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                    aria-describedby="password-error">
                @error('password')
                    <p class="form-error" id="password-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="account-submit">Masuk</button>
        </form>
    </section>
@endsection
