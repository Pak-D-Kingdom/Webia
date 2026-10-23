@php $full = ($mode ?? 'preview') === 'full'; $reg = $e['registration']; @endphp

@unless ($full)
{{-- Preview beranda: banner ajakan daftar --}}
<section class="el-cta" id="registration" aria-labelledby="ctaTitle">
    <div class="el-container">
        <div class="el-cta__box">
            <img class="el-cta__img" src="{{ $img('cta-books.jpg') }}" alt="" width="927" height="264" loading="lazy">
            <div class="el-cta__copy">
                <h2 id="ctaTitle">{{ $reg['cta']['title'] }}</h2>
                <p>{{ $reg['cta']['text'] }}</p>
            </div>
            <a class="el-btn el-btn--white el-btn--lg" href="{{ route('elearning.registration') }}">{{ $reg['cta']['button'] }}<svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
    </div>
</section>
@else
<section class="el-section el-registration is-full" id="registration" aria-labelledby="regTitle">
    <div class="el-container el-reg__grid">
        <form class="el-card el-form" method="POST" action="{{ $reg['action'] ?? '#' }}" novalidate data-reg-form @if (empty($reg['action'])) data-demo @endif>
            @csrf
            <h2 class="el-title el-title--sm" id="regTitle">Formulir Pendaftaran</h2>
            <p class="el-sub">Semua kolom bertanda <span aria-hidden="true">*</span><span class="el-sr">bintang</span> wajib diisi.</p>

            <div class="el-form__grid">
                <div class="el-field">
                    <label for="regName">Nama lengkap *</label>
                    <input id="regName" name="name" type="text" autocomplete="name" required minlength="3" placeholder="Nama sesuai identitas">
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="regEmail">Email *</label>
                    <input id="regEmail" name="email" type="email" autocomplete="email" required placeholder="nama@email.com">
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="regPhone">Nomor WhatsApp *</label>
                    <input id="regPhone" name="phone" type="tel" inputmode="tel" autocomplete="tel" required pattern="^(\+?62|0)8[0-9]{8,12}$" placeholder="08xx xxxx xxxx">
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="regLevel">Pengalaman belajar *</label>
                    <select id="regLevel" name="level" required>
                        <option value="">Pilih level</option>
                        @foreach ($reg['levels'] as $lv)<option>{{ $lv }}</option>@endforeach
                    </select>
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="regProgram">Program *</label>
                    <select id="regProgram" name="program" required>
                        <option value="">Pilih program</option>
                        @foreach ($e['programs'] as $p)<option value="{{ $p['slug'] }}">{{ $p['title'] }}</option>@endforeach
                    </select>
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="regSchedule">Jadwal kelas live</label>
                    <select id="regSchedule" name="schedule">
                        <option value="">Belum menentukan</option>
                        @foreach ($e['schedules'] as $s)<option value="{{ $s['title'] }}">{{ $s['day'] }} {{ $s['month'] }} · {{ $s['title'] }}</option>@endforeach
                    </select>
                </div>
            </div>

            <fieldset class="el-field el-plan-pick">
                <legend>Paket belajar *</legend>
                <div class="el-plan-pick__grid">
                    @foreach ($e['plans'] as $p)
                        <label class="el-plan-pick__opt">
                            <input type="radio" name="plan" value="{{ $p['slug'] }}" {{ $p['featured'] ? 'checked' : '' }} required>
                            <span><strong>{{ $p['name'] }}</strong><small>Rp {{ number_format($p['price'], 0, ',', '.') }}/bulan</small></span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <div class="el-field">
                <label for="regNote">Catatan (opsional)</label>
                <textarea id="regNote" name="note" rows="3" maxlength="400" placeholder="Ceritakan tujuan belajarmu"></textarea>
            </div>

            <div class="el-field el-check">
                <label><input type="checkbox" name="agree" required> <span>Saya setuju data saya digunakan untuk keperluan pendaftaran kelas.</span></label>
                <small class="el-error" data-error></small>
            </div>

            <button type="submit" class="el-btn el-btn--primary el-btn--lg">Kirim Pendaftaran<svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            <p class="el-form__status" role="status" data-form-status hidden></p>
        </form>

        <aside class="el-reg__aside" aria-label="Alur pendaftaran">
            <div class="el-card">
                <h2 class="el-title el-title--sm">Alur Pendaftaran</h2>
                <ol class="el-steps">
                    @foreach ($reg['steps'] as $st)
                        <li><span class="el-steps__n">{{ $loop->iteration }}</span><div><h3>{{ $st['title'] }}</h3><p>{{ $st['text'] }}</p></div></li>
                    @endforeach
                </ol>
            </div>
            <div class="el-card el-card--blue">
                <img src="{{ $img('mascot-head.png') }}" alt="" width="56" height="56" loading="lazy">
                <h3>Yang kamu dapatkan</h3>
                <ul class="el-checks">@foreach ($reg['perks'] as $pk)<li><svg class="el-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $pk }}</li>@endforeach</ul>
            </div>
        </aside>
    </div>
</section>
@endunless
