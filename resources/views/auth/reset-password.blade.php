@extends('auth.layout')

@section('title', 'Reset Kata Sandi')

@section('content')
    <main class="auth-panel auth-page">
        <div class="auth-card">
            <a class="auth-back" href="{{ route('login') }}">Kembali ke halaman masuk</a>
            <p class="auth-pill">Pemulihan Akun</p>
            <h1>Buat kata sandi baru</h1>
            <p class="auth-card-lede">Gunakan minimal 8 karakter, lalu masuk kembali dengan kata sandi baru.</p>

            <form method="POST" action="{{ route('password.store') }}" class="auth-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="auth-field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $email) }}" autocomplete="email" required autofocus aria-describedby="email-error">
                    @error('email')
                        <p class="auth-error" id="email-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="password">Kata sandi baru</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required aria-describedby="password-error">
                    @error('password')
                        <p class="auth-error" id="password-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="password_confirmation">Ulangi kata sandi baru</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>
                </div>

                <button type="submit" class="auth-submit">Simpan kata sandi baru</button>
            </form>
        </div>
    </main>
@endsection
