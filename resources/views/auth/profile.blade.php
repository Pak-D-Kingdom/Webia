@extends('auth.layout')

@section('title', 'Profil & Keamanan')

@section('content')
    <section class="dashboard-panel profile-page" aria-labelledby="profile-title">
        <div class="customer-page-head">
            <h1 id="profile-title">Profil &amp; Keamanan</h1>
            <p>Perbarui identitas akun dan kata sandi portal WEBIA.</p>
        </div>

        @if (session('status'))
            <p role="status">{{ session('status') }}</p>
        @endif

        <div class="profile-grid">
            <form method="POST" action="{{ route('profile.update') }}" class="account-form">
                @csrf
                @method('PATCH')
                <h2>Informasi akun</h2>

                <div class="form-field">
                    <label for="name">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name) }}" autocomplete="name" required aria-describedby="name-error">
                    @error('name', 'profileUpdate') <p class="form-error" id="name-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" autocomplete="email" required aria-describedby="email-hint email-error">
                    <p class="form-hint" id="email-hint">Mengubah email memerlukan kata sandi saat ini.</p>
                    @error('email', 'profileUpdate') <p class="form-error" id="email-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                    <label for="profile-current-password">Kata sandi saat ini</label>
                    <input id="profile-current-password" name="current_password" type="password" autocomplete="current-password" aria-describedby="profile-current-password-error">
                    @error('current_password', 'profileUpdate') <p class="form-error" id="profile-current-password-error">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="account-submit">Simpan profil</button>
            </form>

            <form method="POST" action="{{ route('profile.password') }}" class="account-form">
                @csrf
                @method('PATCH')
                <h2>Ganti kata sandi</h2>

                <div class="form-field">
                    <label for="password-current">Kata sandi saat ini</label>
                    <input id="password-current" name="current_password" type="password" autocomplete="current-password" required aria-describedby="password-current-error">
                    @error('current_password', 'passwordUpdate') <p class="form-error" id="password-current-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                    <label for="password">Kata sandi baru</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required aria-describedby="password-hint password-error">
                    <p class="form-hint" id="password-hint">Gunakan minimal 8 karakter.</p>
                    @error('password', 'passwordUpdate') <p class="form-error" id="password-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                    <label for="password-confirmation">Ulangi kata sandi baru</label>
                    <input id="password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>
                </div>

                <button type="submit" class="account-submit">Perbarui kata sandi</button>
            </form>
        </div>
    </section>
@endsection
