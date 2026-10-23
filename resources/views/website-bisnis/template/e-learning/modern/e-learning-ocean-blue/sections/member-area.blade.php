@php $full = ($mode ?? 'preview') === 'full'; $m = $e['member']; $d = $m['demo']; @endphp
<section class="el-section {{ $full ? '' : 'el-section--tight ' }}el-member {{ $full ? 'is-full' : 'is-preview' }}" id="member-area" aria-labelledby="memberTitle">
    <div class="el-container">
        <header class="el-head">
            <div>
                <h2 class="el-title" id="memberTitle">{{ $e['pages']['member-area']['title'] }}</h2>
                <p class="el-sub">{{ $e['pages']['member-area']['sub'] }}</p>
            </div>
            @unless ($full)<a class="el-link" href="{{ route('elearning.member-area') }}">Lihat Semua <svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>@endunless
        </header>

        <div class="el-member__grid">
            @if ($full)
                <div class="el-card el-auth" data-auth>
                    <div class="el-auth__tabs" role="tablist" aria-label="Masuk atau daftar">
                        <button type="button" role="tab" id="tabLogin" class="is-active" aria-selected="true" aria-controls="paneLogin" data-auth-tab="login">Login</button>
                        <button type="button" role="tab" id="tabRegister" aria-selected="false" aria-controls="paneRegister" data-auth-tab="register">Register</button>
                    </div>

                    <form class="el-form" id="paneLogin" role="tabpanel" aria-labelledby="tabLogin" method="POST" action="{{ $m['login_action'] ?? '#' }}" novalidate data-auth-form @if (empty($m['login_action'])) data-demo @endif>
                        @csrf
                        <div class="el-field"><label for="loginEmail">Email</label><input id="loginEmail" name="email" type="email" autocomplete="email" required placeholder="nama@email.com"><small class="el-error" data-error></small></div>
                        <div class="el-field">
                            <label for="loginPass">Password</label>
                            <div class="el-pass"><input id="loginPass" name="password" type="password" autocomplete="current-password" required minlength="6" placeholder="Minimal 6 karakter">
                                <button type="button" class="el-icon-btn" aria-label="Tampilkan password" data-pass-toggle><svg class="el-ico" aria-hidden="true"><use href="#i-eye"/></svg></button></div>
                            <small class="el-error" data-error></small>
                        </div>
                        <div class="el-form__row"><label class="el-check-inline"><input type="checkbox" name="remember"> Ingat saya</label><a class="el-link" href="#" data-open-chat>Lupa password?</a></div>
                        <button type="submit" class="el-btn el-btn--primary el-btn--block el-btn--lg">Masuk</button>
                        <p class="el-form__status" role="status" data-form-status hidden></p>
                    </form>

                    <form class="el-form" id="paneRegister" role="tabpanel" aria-labelledby="tabRegister" method="POST" action="{{ $m['register_action'] ?? '#' }}" novalidate hidden data-auth-form @if (empty($m['register_action'])) data-demo @endif>
                        @csrf
                        <div class="el-field"><label for="rgName">Nama lengkap</label><input id="rgName" name="name" type="text" autocomplete="name" required minlength="3"><small class="el-error" data-error></small></div>
                        <div class="el-field"><label for="rgEmail">Email</label><input id="rgEmail" name="email" type="email" autocomplete="email" required><small class="el-error" data-error></small></div>
                        <div class="el-field">
                            <label for="rgPass">Password</label>
                            <div class="el-pass"><input id="rgPass" name="password" type="password" autocomplete="new-password" required minlength="6" placeholder="Minimal 6 karakter">
                                <button type="button" class="el-icon-btn" aria-label="Tampilkan password" data-pass-toggle><svg class="el-ico" aria-hidden="true"><use href="#i-eye"/></svg></button></div>
                            <small class="el-error" data-error></small>
                        </div>
                        <button type="submit" class="el-btn el-btn--primary el-btn--block el-btn--lg">Buat Akun</button>
                        <p class="el-form__status" role="status" data-form-status hidden></p>
                    </form>
                </div>
            @else
                <div class="el-member__intro el-card">
                    <h3>Satu tempat untuk semua progres belajarmu</h3>
                    <ul class="el-checks">@foreach ($m['benefits'] as $b)<li><svg class="el-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $b }}</li>@endforeach</ul>
                    <a class="el-btn el-btn--primary" href="{{ route('elearning.member-area') }}"><svg class="el-ico" aria-hidden="true"><use href="#i-user"/></svg>Login / Register</a>
                </div>
            @endif

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

            @if ($full)
                <div class="el-card el-member__perks">
                    <h3>Keuntungan member</h3>
                    <ul class="el-checks">@foreach ($m['benefits'] as $b)<li><svg class="el-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $b }}</li>@endforeach</ul>
                </div>
            @endif
        </div>
    </div>
</section>
