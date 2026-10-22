@extends('auth.layout')

@section('title', 'Buat akun')

@section('header-action')
    <a class="account-header-link" href="{{ route('login') }}">Sudah punya akun</a>
@endsection

@section('content')
    <section class="account-panel" aria-labelledby="register-title">
        <div class="account-copy">
            <p class="account-label">Akun WEBIA</p>
            <h1 id="register-title">Buat akun customer</h1>
            <p>Gunakan akun ini untuk mengelola pesanan dan data website bisnis.</p>
            <ul class="account-points">
                <li>Pilih paket sesuai kebutuhan bisnis</li>
                <li>Kirim pembayaran dari halaman pesanan</li>
                <li>Pantau progres sampai website diserahkan</li>
            </ul>
        </div>

        <form method="POST" action="{{ route('register') }}" class="account-form">
            @csrf

            <div class="form-field">
                <label for="name">Nama</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" required autofocus
                    aria-describedby="name-error">
                @error('name')
                    <p class="form-error" id="name-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required
                    aria-describedby="email-error">
                @error('email')
                    <p class="form-error" id="email-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="new-password" required
                    aria-describedby="password-error password-hint">
                <p class="form-hint" id="password-hint">Minimal 8 karakter.</p>
                @error('password')
                    <p class="form-error" id="password-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="password_confirmation">Ulangi password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>
            </div>

            <button type="submit" class="account-submit">Buat akun</button>
        </form>
    </section>
@endsection
