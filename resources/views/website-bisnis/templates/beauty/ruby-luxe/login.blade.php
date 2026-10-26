<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login — Ruby Luxe</title>

    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/beauty/login-ruby-luxe.css') }}">
</head>
<body>

<main class="rl-login">

    <!-- PANEL VISUAL -->
    <section class="rl-login-visual">
        <a href="{{ url('/templates/ruby-luxe') }}"
           class="rl-login-brand">
            <span class="rl-login-brand-mark">R</span>
            <span class="rl-login-brand-copy">
                <strong>RUBY LUXE</strong>
                <small>ORGANIC BEAUTY</small>
            </span>
        </a>

        <div class="rl-login-message">
            <span class="rl-login-eyebrow">YOUR BEAUTY, YOUR RITUAL</span>
            <h1>Beauty begins with taking care of yourself.</h1>
            <p>
                Masuk ke akun Ruby Luxe untuk menikmati pengalaman
                perawatan kecantikan yang lebih personal.
            </p>
        </div>

        <small class="rl-login-copyright">
            RUBY LUXE · ORGANIC BEAUTY
        </small>
    </section>

    <!-- FORM LOGIN -->
    <section class="rl-login-content">
        <div class="rl-login-card">

            <a href="{{ url('/templates/ruby-luxe') }}"
               class="rl-login-back">
                <span>←</span> Kembali ke halaman utama
            </a>

            <div class="rl-login-heading">
                <span class="rl-login-eyebrow">WELCOME BACK</span>
                <h2>Sign in</h2>
                <p>
                    Masukkan email dan password yang terdaftar
                    untuk melanjutkan.
                </p>
            </div>

            @if ($errors->any())
                <div class="rl-login-error" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('status'))
                <div class="rl-login-status" role="status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="rl-login-field">
                    <label for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="username"
                        required
                        autofocus>
                </div>

                <div class="rl-login-field">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required>
                </div>

                <div class="rl-login-options">
                    <label class="rl-login-remember">
                        <input type="checkbox" name="remember" value="1">
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="rl-login-submit">
                    Sign In <span>↗</span>
                </button>
            </form>

            @if (Route::has('register'))
                <div class="rl-login-register">
                    Belum memiliki akun?
                    <a href="{{url('/templates/ruby-luxe/register') }}">Daftar sekarang</a>
                </div>
            @endif

            <div class="rl-login-footer">
                © {{ date('Y') }} Ruby Luxe. All rights reserved.
            </div>

        </div>
    </section>

</main>

</body>
</html>
