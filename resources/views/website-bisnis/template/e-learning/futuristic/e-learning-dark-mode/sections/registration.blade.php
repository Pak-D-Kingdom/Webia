@php($r = $e['route'])
@php($full = $full ?? false)
@php($g = $e['registration'])
<section class="nl-sec nl-sec--registration" id="registration" aria-labelledby="registration-title">
    <div class="nl-banner">
        <div class="nl-banner__art" aria-hidden="true"><img src="{{ asset($e['img'].'/banner-vr.png') }}" alt="" width="326" height="362" loading="lazy"></div>
        <div class="nl-banner__txt">
            <span class="nl-pill nl-pill--sm"><svg class="ic"><use href="#i-star"/></svg>{{ $g['badge'] }}</span>
            <h2 id="registration-title">{{ $g['title'] }}</h2>
            <p>{{ $g['text'] }}</p>
            <div class="nl-banner__cta">
                <a class="nl-btn nl-btn--primary" href="{{ route($r.'programs') }}">Lihat Program <svg class="ic"><use href="#i-arrow"/></svg></a>
                @unless($full)<a class="nl-btn nl-btn--ghost" href="{{ route($r.'registration') }}#form-registrasi">Daftar Sekarang</a>@endunless
            </div>
        </div>
    </div>

    @if($full)
        <div class="nl-reg">
            <ul class="nl-reg__perks">
                @foreach($e['hero']['features'] as $f)
                    <li class="nl-card">
                        <span class="nl-feats__ic"><svg class="ic"><use href="#i-{{ $f['icon'] }}"/></svg></span>
                        <span><strong>{{ $f['value'] }}</strong><small>{{ $f['label'] }}</small></span>
                    </li>
                @endforeach
            </ul>

            {{-- Tanpa backend: data dikirim ke WhatsApp admin lewat JS (atribut data-wa-form) --}}
            <form class="nl-card nl-form" id="form-registrasi" data-wa-form data-wa="{{ $e['whatsapp']['number'] }}" data-wa-title="Pendaftaran Baru" novalidate aria-labelledby="form-title">
                <h2 id="form-title">Formulir Registrasi</h2>
                <p class="nl-form__hint"><svg class="ic"><use href="#i-whatsapp"/></svg>Data pendaftaranmu akan dikirim ke WhatsApp admin NovaLearn ({{ $e['whatsapp']['display'] }}).</p>
                <div class="nl-form__grid">
                    <div class="nl-field"><label for="reg-name">Nama lengkap</label>
                        <input id="reg-name" name="name" type="text" autocomplete="name" required aria-describedby="reg-name-err"><small class="nl-err" id="reg-name-err"></small></div>
                    <div class="nl-field"><label for="reg-email">Email</label>
                        <input id="reg-email" name="email" type="email" autocomplete="email" required aria-describedby="reg-email-err"><small class="nl-err" id="reg-email-err"></small></div>
                    <div class="nl-field"><label for="reg-phone">Nomor WhatsApp</label>
                        <input id="reg-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xx xxxx xxxx" required aria-describedby="reg-phone-err"><small class="nl-err" id="reg-phone-err"></small></div>
                    <div class="nl-field"><label for="reg-program">Program</label>
                        <select id="reg-program" name="program" required aria-describedby="reg-program-err">
                            <option value="">Pilih program</option>
                            @foreach($e['programs'] as $p)<option value="{{ $p['slug'] }}">{{ $p['title'] }}</option>@endforeach
                        </select><small class="nl-err" id="reg-program-err"></small></div>
                    <div class="nl-field nl-field--wide"><label for="reg-plan">Paket</label>
                        <select id="reg-plan" name="plan" required aria-describedby="reg-plan-err">
                            <option value="">Pilih paket</option>
                            @foreach($e['pricing']['plans'] as $p)<option value="{{ $p['slug'] }}">{{ $p['name'] }} – Rp {{ number_format($p['monthly'], 0, ',', '.') }}/bulan</option>@endforeach
                        </select><small class="nl-err" id="reg-plan-err"></small></div>
                    <div class="nl-field nl-field--wide"><label for="reg-note">Catatan (opsional)</label>
                        <textarea id="reg-note" name="note" rows="3" maxlength="300" placeholder="Tulis pertanyaan atau kebutuhan belajarmu..."></textarea></div>
                </div>
                <label class="nl-check"><input type="checkbox" name="agree" required> <span>Saya setuju data saya dikirim ke admin {{ $e['brand']['name'] }} melalui WhatsApp.</span></label>
                <small class="nl-err" data-agree-err></small>
                <button class="nl-btn nl-btn--primary nl-btn--block" type="submit"><svg class="ic"><use href="#i-whatsapp"/></svg>Kirim via WhatsApp</button>
                <p class="nl-form-msg" data-form-msg role="status" aria-live="polite"></p>
            </form>
        </div>
    @endif
</section>
