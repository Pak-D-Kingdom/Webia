@extends('auth.layout')

@section('title', 'Lupa Kata Sandi')

@section('content')
    <main class="auth-panel auth-page">
        <div class="auth-card">
            <a class="auth-back" href="{{ route('login') }}">Kembali ke halaman masuk</a>
            <p class="auth-pill">Pemulihan Akun</p>
            <h1>Lupa kata sandi?</h1>
            <p class="auth-card-lede">Masukkan email akun. Kami akan mengirim tautan untuk membuat kata sandi baru.</p>

            @if (session('status'))
                <p class="auth-status" role="status">{{ session('status') }}</p>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus aria-describedby="email-error">
                    @error('email')
                        <p class="auth-error" id="email-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="auth-submit">Kirim tautan reset</button>
            </form>
        </div>
    </main>
@endsection
