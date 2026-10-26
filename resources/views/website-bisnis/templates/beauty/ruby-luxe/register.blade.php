<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register — Ruby Luxe</title>

    <link rel="stylesheet"
          href="{{ asset('css/website-bisnis/templates/beauty/register-ruby-luxe.css') }}">
</head>
<body>

<main class="rl-register">

    <!-- LEFT VISUAL PANEL -->
    <section class="rl-register-visual">

        <a href="{{ url('/templates/ruby-luxe') }}"
           class="rl-register-brand">
            <span class="rl-register-brand-mark">R</span>
            <span>
                <strong>RUBY LUXE</strong>
                <small>ORGANIC BEAUTY</small>
            </span>
        </a>

        <div class="rl-register-message">
            <span class="rl-register-eyebrow">YOUR BEAUTY, YOUR RITUAL</span>

            <h1>Begin your journey to a more beautiful you.</h1>

            <p>
                Bergabung dengan Ruby Luxe dan nikmati pengalaman
                kecantikan yang lebih personal, nyaman, dan istimewa.
            </p>
        </div>

        <small class="rl-register-copyright">
            RUBY LUXE · ORGANIC BEAUTY
        </small>

    </section>

    <!-- RIGHT REGISTER FORM -->
    <section class="rl-register-content">
        <div class="rl-register-card">

            <a href="{{ url('/templates/ruby-luxe/login') }}"
               class="rl-register-back">
                ← Kembali ke halaman login
            </a>

            <div class="rl-register-heading">
                <span class="rl-register-eyebrow">CREATE YOUR ACCOUNT</span>
                <h2>Join Ruby Luxe</h2>
                <p>
                    Buat akun untuk memulai pengalaman kecantikanmu.
                </p>
            </div>

            @if ($errors->any())
                <div class="rl-register-error" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="rl-register-status" role="status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('ruby-luxe.register.submit') }}">
                @csrf

                <div class="rl-register-field">
                    <label for="name">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="name"
                        required
                        autofocus>
                </div>

                <div class="rl-register-field">
                    <label for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="email"
                        required>
                </div>

                <div class="rl-register-field">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        autocomplete="new-password"
                        minlength="8"
                        required>
                </div>

                <div class="rl-register-field">
                    <label for="password_confirmation">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        autocomplete="new-password"
                        minlength="8"
                        required>
                </div>

                <label class="rl-register-terms">
                    <input type="checkbox" name="terms" value="1" required>
                    <span>
                        Saya menyetujui syarat dan ketentuan
                        penggunaan Ruby Luxe.
                    </span>
                </label>

                <button type="submit" class="rl-register-submit">
                    Create Account <span>↗</span>
                </button>
            </form>

            <div class="rl-register-login">
                Sudah memiliki akun?
                <a href="{{ url('/templates/ruby-luxe/login') }}">
                    Sign in
                </a>
            </div>

            <div class="rl-register-footer">
                © {{ date('Y') }} Ruby Luxe. All rights reserved.
            </div>

        </div>
    </section>

</main>

</body>
</html>