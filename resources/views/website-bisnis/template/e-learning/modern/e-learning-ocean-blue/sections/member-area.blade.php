@php $full = ($mode ?? 'preview') === 'full'; $m = $e['member']; $d = $m['demo']; @endphp

@unless ($full)
{{-- Preview beranda --}}
<section class="el-section el-section--tight el-member is-preview" id="member-area" aria-labelledby="memberTitle">
    <div class="el-container">
        <header class="el-head">
            <div>
                <h2 class="el-title" id="memberTitle">{{ $e['pages']['member-area']['title'] }}</h2>
                <p class="el-sub">{{ $e['pages']['member-area']['sub'] }}</p>
            </div>
            <a class="el-link" href="{{ route('elearning.member-area') }}">Lihat Semua <svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </header>

        <div class="el-member__grid">
            <div class="el-member__intro el-card">
                <h3>Satu tempat untuk semua progres belajarmu</h3>
                <ul class="el-checks">@foreach ($m['benefits'] as $b)<li><svg class="el-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $b }}</li>@endforeach</ul>
                <div class="el-member__cta">
                    <a class="el-btn el-btn--primary" href="{{ route('elearning.member-area') }}">Login</a>
                    <a class="el-btn el-btn--outline" href="{{ route('elearning.registration') }}">Get Started<svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                </div>
            </div>

            <div class="el-card el-dash" aria-label="Pratinjau dashboard member">
                <div class="el-dash__top">
                    <img src="{{ $img('mascot-head.png') }}" alt="" width="48" height="48" loading="lazy">
                    <div><p class="el-dash__hello">Halo, {{ $d['name'] }}!</p><p class="el-dash__plan">Paket {{ $d['plan'] }}</p></div>
                    <span class="el-badge el-badge--online">Pratinjau</span>
                </div>
                <ul class="el-dash__stats">@foreach ($d['stats'] as $s)<li><strong>{{ $s['value'] }}</strong><span>{{ $s['label'] }}</span></li>@endforeach</ul>
                <h3 class="el-dash__h">Progres kursus</h3>
                <ul class="el-progress-list">
                    @foreach ($d['progress'] as $p)
                        <li>
                            <div><span>{{ $p['title'] }}</span><b>{{ $p['value'] }}%</b></div>
                            <div class="el-progress" role="progressbar" aria-label="{{ $p['title'] }}" aria-valuenow="{{ $p['value'] }}" aria-valuemin="0" aria-valuemax="100"><i style="width: {{ $p['value'] }}%"></i></div>
                        </li>
                    @endforeach
                </ul>
                <div class="el-dash__next"><svg class="el-ico" aria-hidden="true"><use href="#i-calendar"/></svg><div><small>Kelas berikutnya</small><strong>{{ $d['next']['title'] }}</strong><span>{{ $d['next']['time'] }}</span></div></div>
            </div>
        </div>
    </div>
</section>
@else
{{-- Halaman penuh: kartu login + keuntungan member --}}
<section class="el-section el-member is-full" id="member-area" aria-labelledby="loginTitle">
    <div class="el-container el-split">
        <div class="el-card el-card--form el-login">
            <h2 class="el-form-title" id="loginTitle">Masuk ke Member Area</h2>
            <p class="el-form-sub">Gunakan akun {{ $e['brand']['name'] }} kamu untuk melanjutkan belajar.</p>

            <form class="el-form" method="POST" action="{{ $m['login_action'] ?? '#' }}" novalidate data-auth-form @if (empty($m['login_action'])) data-demo @endif>
                @csrf
                <div class="el-field">
                    <label for="loginEmail">Email</label>
                    <input id="loginEmail" name="email" type="email" autocomplete="email" required placeholder="nama@email.com">
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="loginPass">Kata Sandi</label>
                    <div class="el-pass">
                        <input id="loginPass" name="password" type="password" autocomplete="current-password" required minlength="6" placeholder="Masukkan kata sandi">
                        <button type="button" class="el-icon-btn" aria-label="Tampilkan kata sandi" data-pass-toggle><svg class="el-ico" aria-hidden="true"><use href="#i-eye"/></svg></button>
                    </div>
                    <small class="el-error" data-error></small>
                </div>
                <label class="el-check-inline"><input type="checkbox" name="remember"> Ingat saya di perangkat ini</label>
                <button type="submit" class="el-btn el-btn--primary el-btn--block el-btn--lg">Masuk<svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></button>
                <p class="el-form__status" role="status" data-form-status hidden></p>
            </form>

            <p class="el-login__foot">Belum punya akun? <a href="{{ route('elearning.registration') }}">Daftar sekarang</a></p>
        </div>

        <div class="el-perks-wrap">
            <div class="el-perks__head">
                <img src="{{ $img('mascot-head.png') }}" alt="" width="72" height="72" loading="lazy">
                <h2>Yang kamu dapatkan sebagai member</h2>
            </div>
            <ul class="el-perks">
                @foreach ($m['perks'] as $pk)
                    <li class="el-perk">
                        <span class="el-perk__ico el-perk__ico--{{ $pk['tone'] }}" aria-hidden="true"><svg class="el-ico"><use href="#{{ $pk['icon'] }}"/></svg></span>
                        <div><h3>{{ $pk['title'] }}</h3><p>{{ $pk['text'] }}</p></div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endunless
