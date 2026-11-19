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

        @if (session('status') === 'Kata sandi berhasil diperbarui.')
            <x-customer-modal id="password-success-modal" tone="success" open title="Kata sandi diperbarui" subtitle="Gunakan kata sandi baru saat masuk berikutnya." icon="check_circle">
                <div class="customer-modal-rows">
                    <div class="customer-modal-row"><span>Akun</span><span>{{ auth()->user()->email }}</span></div>
                    <div class="customer-modal-row"><span>Status</span><span>Berhasil</span></div>
                    <div class="customer-modal-row"><span>Keamanan</span><span>Tetap aktif</span></div>
                </div>
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Tutup</button>
                    <a class="customer-btn customer-btn--primary" href="{{ route('profile.edit') }}">Kembali ke profil</a>
                </div>
            </x-customer-modal>
        @endif

        <div class="profile-grid">
            <form method="POST" action="{{ route('profile.update') }}" class="account-form" data-confirm="profile-save-modal">
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

            <form method="POST" action="{{ route('profile.password') }}" class="account-form" data-confirm="password-save-modal">
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

        <x-customer-modal id="profile-save-modal" title="Simpan perubahan profil?" subtitle="Nama dan email akan digunakan pada akun portal." icon="help">
            <div class="customer-modal-rows">
                <div class="customer-modal-row"><span>Nama</span><strong data-fill="[name=&quot;name&quot;]">-</strong></div>
                <div class="customer-modal-row"><span>Email</span><strong data-fill="[name=&quot;email&quot;]">-</strong></div>
                <div class="customer-modal-row"><span>Status</span><span>Siap disimpan</span></div>
            </div>
            <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                <button class="customer-btn" type="button" data-modal-close>Kembali</button>
                <button class="customer-btn customer-btn--primary" type="button" data-confirm-submit>Simpan profil</button>
            </div>
        </x-customer-modal>

        <x-customer-modal id="password-save-modal" title="Ubah kata sandi" subtitle="Gunakan minimal 8 karakter." icon="help">
            <div class="customer-modal-rows">
                <div class="customer-modal-row"><span>Kata sandi saat ini</span><span data-fill="[name=&quot;current_password&quot;]">-</span></div>
                <div class="customer-modal-row"><span>Kata sandi baru</span><span data-fill="[name=&quot;password&quot;]">-</span></div>
                <div class="customer-modal-row"><span>Ulangi kata sandi</span><span data-fill="[name=&quot;password_confirmation&quot;]">-</span></div>
            </div>
            <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                <button class="customer-btn" type="button" data-modal-close>Batal</button>
                <button class="customer-btn customer-btn--primary" type="button" data-confirm-submit>Perbarui kata sandi</button>
            </div>
        </x-customer-modal>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('form[data-confirm]').forEach(function (form) {
                const modal = document.getElementById(form.dataset.confirm);
                if (!modal) return;
                const submitBtn = form.querySelector('button[type=submit]');
                form.addEventListener('submit', function (event) {
                    if (form.dataset.confirmed === '1') {
                        delete form.dataset.confirmed;
                        return;
                    }
                    event.preventDefault();
                    modal.querySelectorAll('[data-fill]').forEach(function (el) {
                        const src = form.querySelector(el.getAttribute('data-fill'));
                        el.textContent = src && src.value ? (src.type === 'password' ? '••••••••' : src.value) : '-';
                    });
                    window.webiaModal && window.webiaModal.open(modal, submitBtn);
                });
                modal.querySelectorAll('[data-confirm-submit]').forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        form.dataset.confirmed = '1';
                        window.webiaModal && window.webiaModal.close(modal);
                        if (form.requestSubmit) form.requestSubmit(submitBtn); else form.submit();
                    });
                });
            });
        });
        </script>
    </section>
@endsection
