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
{{-- Halaman penuh: formulir dikirim ke WhatsApp (nomor di config registration.whatsapp) --}}
<section class="el-section el-registration is-full" id="registration" aria-labelledby="regTitle">
    <div class="el-container el-reg__grid">
        <form class="el-card el-card--form el-form" method="get" action="https://wa.me/{{ $reg['whatsapp'] }}" target="_blank" novalidate data-reg-form data-wa="{{ $reg['whatsapp'] }}">
            <div>
                <h2 class="el-form-title" id="regTitle">{{ $reg['form']['title'] }}</h2>
                <p class="el-form-sub">Isi data berikut. Setelah dikirim, pesan pendaftaranmu otomatis disiapkan di WhatsApp {{ $e['brand']['name'] }} ({{ $reg['whatsapp_display'] }}).</p>
            </div>

            <div class="el-form__grid">
                <div class="el-field">
                    <label for="regName">Nama Lengkap</label>
                    <input id="regName" name="name" type="text" autocomplete="name" required minlength="3" placeholder="Contoh: Aulia Rahma">
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="regEmail">Email</label>
                    <input id="regEmail" name="email" type="email" autocomplete="email" required placeholder="nama@email.com">
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="regPhone">No. WhatsApp</label>
                    <input id="regPhone" name="phone" type="tel" inputmode="tel" autocomplete="tel" required pattern="^(\+?62|0)8[0-9]{8,12}$" placeholder="0812 3456 7890">
                    <small class="el-error" data-error></small>
                </div>
                <div class="el-field">
                    <label for="regSchedule">Jadwal Belajar</label>
                    <select id="regSchedule" name="schedule">
                        <option value="">Pilih jadwal</option>
                        @foreach ($e['schedules'] as $s)<option value="{{ $s['title'] }}">{{ $s['day'] }} {{ $s['month'] }} · {{ $s['title'] }}</option>@endforeach
                    </select>
                </div>
                <div class="el-field el-field--full">
                    <label for="regProgram">Program</label>
                    <select id="regProgram" name="program" required>
                        <option value="">Pilih program</option>
                        @foreach ($e['programs'] as $p)<option value="{{ $p['slug'] }}">{{ $p['title'] }}</option>@endforeach
                    </select>
                    <small class="el-error" data-error></small>
                </div>
            </div>

            <fieldset class="el-field el-plan-pick">
                <legend>Paket</legend>
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
                <label for="regNote">Catatan <small>(opsional)</small></label>
                <textarea id="regNote" name="note" rows="3" maxlength="400" placeholder="Tuliskan kebutuhan atau pertanyaanmu"></textarea>
            </div>

            <div class="el-field el-check">
                <label><input type="checkbox" name="agree" required> <span>Saya setuju data saya digunakan untuk keperluan pendaftaran kursus.</span></label>
                <small class="el-error" data-error></small>
            </div>

            <button type="submit" class="el-btn el-btn--primary el-btn--block el-btn--lg">Daftar Sekarang<svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            <p class="el-form__status" role="status" data-form-status hidden></p>
        </form>

        <aside class="el-reg__aside" aria-label="Keuntungan mendaftar">
            <div class="el-reg-card">
                <img class="el-reg-card__photo" src="{{ $img('register-photo.jpg') }}" alt="Pelajar tersenyum belajar online" width="300" height="300" loading="lazy">
                <h2>{{ $reg['aside']['title'] }}</h2>
                <p>{{ $reg['aside']['text'] }}</p>
                <ul class="el-checks">@foreach ($reg['perks'] as $pk)<li><svg class="el-ico" aria-hidden="true"><use href="#i-check"/></svg>{{ $pk }}</li>@endforeach</ul>
            </div>
        </aside>
    </div>
</section>
@endunless
