{{-- Member area. $full=false → kartu ajakan; $full=true → form login + keuntungan member --}}
@php $full = $full ?? false; $m = $t['member']; @endphp
@if (! $full)
    <section id="member-area" class="panel panel--member" aria-labelledby="member-title">
        <header class="panel__head">
            <h2 id="member-title">{{ $m['title'] }}</h2>
            <a class="link-more" href="{{ route($rp.'member-area') }}">Selengkapnya <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
        <div class="member__intro">
            <img class="member__icon" src="{{ $img }}member-icon.jpg" alt="" width="276" height="204" loading="lazy">
            <p>{{ $m['desc'] }}</p>
        </div>
        <ul class="member__perks">
            @foreach ($m['benefits'] as $b)
                <li class="tone-{{ $b['tone'] }}"><span class="member__perk-ico"><i class="bi {{ $b['icon'] }}" aria-hidden="true"></i></span><span>{{ $b['title'] }}</span></li>
            @endforeach
        </ul>
        <a class="btn btn--primary btn--block" href="{{ route($rp.'member-area') }}">{{ $m['cta'] }} <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
    </section>
@else
    <section id="member-area" class="block member" aria-labelledby="member-title">
        <div class="member__grid">
            <div class="card form-card">
                <h2 id="member-title">Masuk ke Member Area</h2>
                <p class="muted">Gunakan akun EduPlus kamu untuk melanjutkan belajar.</p>
                <form class="form" method="post" action="{{ $m['action'] ?? '#' }}" novalidate data-demo-form="login">
                    @csrf
                    <div class="field">
                        <label for="login-email">Email</label>
                        <input id="login-email" name="email" type="email" autocomplete="email" placeholder="nama@email.com" required>
                        <small class="field__err" data-err hidden></small>
                    </div>
                    <div class="field">
                        <label for="login-pass">Kata Sandi</label>
                        <div class="field__pass">
                            <input id="login-pass" name="password" type="password" autocomplete="current-password" placeholder="Masukkan kata sandi" required minlength="6">
                            <button type="button" data-pass-toggle aria-label="Tampilkan kata sandi" aria-pressed="false"><i class="bi bi-eye-fill" aria-hidden="true"></i></button>
                        </div>
                        <small class="field__err" data-err hidden></small>
                    </div>
                    <label class="check"><input type="checkbox" name="remember"><span>Ingat saya di perangkat ini</span></label>
                    <button class="btn btn--primary btn--lg btn--block" type="submit">Masuk <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                    <p class="form__note" role="status" aria-live="polite" data-form-note></p>
                    <p class="muted center">Belum punya akun? <a href="{{ route($rp.'registration') }}">Daftar sekarang</a></p>
                </form>
            </div>

            <div class="member__side">
                <img class="member__icon member__icon--lg" src="{{ $img }}member-icon.jpg" alt="" width="276" height="204" loading="lazy">
                <h3>Yang kamu dapatkan sebagai member</h3>
                <ul class="benefits">
                    @foreach ($m['benefits'] as $b)
                        <li class="benefit">
                            <span class="benefit__icon tone-{{ $b['tone'] }}"><i class="bi {{ $b['icon'] }}" aria-hidden="true"></i></span>
                            <div><strong>{{ $b['title'] }}</strong><p>{{ $b['text'] }}</p></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
