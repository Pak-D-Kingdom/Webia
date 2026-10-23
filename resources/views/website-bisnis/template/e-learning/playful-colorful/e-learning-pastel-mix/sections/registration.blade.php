{{-- Registration. $full=false → banner CTA beranda; $full=true → formulir pendaftaran --}}
@php
    $full = $full ?? false;
    $reg  = $t['registration'];
    $selProgram = request('program');
    $selPlan    = request('plan', 'pro');
@endphp
@if (! $full)
    <section id="registration" class="cta" aria-labelledby="registration-title">
        <img class="cta__art" src="{{ $img }}cta-girl.jpg" alt="" width="492" height="540" loading="lazy">
        <div class="cta__body">
            <h2 id="registration-title">{{ $reg['title'] }}</h2>
            <p>{{ $reg['desc'] }}</p>
            <a class="btn btn--primary btn--lg" href="{{ route($rp.'registration') }}">{{ $reg['cta'] }} <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>
    </section>
@else
    <section id="registration" class="block reg" aria-labelledby="registration-title">
        <div class="reg__grid">
            <div class="card form-card">
                <h2 id="registration-title">Formulir Pendaftaran</h2>
                <p class="muted">Isi data berikut. Setelah dikirim, pesan pendaftaranmu otomatis disiapkan di WhatsApp EduPlus ({{ $t['contact']['form_whatsapp_display'] }}).</p>

                <form class="form" method="get" action="https://wa.me/{{ $t['contact']['form_whatsapp'] }}" target="_blank" novalidate data-wa-form="registration">
                    <div class="form__grid">
                        <div class="field">
                            <label for="reg-name">Nama Lengkap</label>
                            <input id="reg-name" name="name" type="text" autocomplete="name" placeholder="Contoh: Aulia Rahma" required>
                            <small class="field__err" data-err hidden></small>
                        </div>
                        <div class="field">
                            <label for="reg-email">Email</label>
                            <input id="reg-email" name="email" type="email" autocomplete="email" placeholder="nama@email.com" required>
                            <small class="field__err" data-err hidden></small>
                        </div>
                        <div class="field">
                            <label for="reg-phone">No. WhatsApp</label>
                            <input id="reg-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="0812 3456 7890" required>
                            <small class="field__err" data-err hidden></small>
                        </div>
                        <div class="field">
                            <label for="reg-slot">Jadwal Belajar</label>
                            <select id="reg-slot" name="slot" required>
                                <option value="">Pilih jadwal</option>
                                @foreach ($reg['slots'] as $slot)<option value="{{ $slot }}">{{ $slot }}</option>@endforeach
                            </select>
                            <small class="field__err" data-err hidden></small>
                        </div>
                    </div>

                    <div class="field">
                        <label for="reg-program">Program</label>
                        <select id="reg-program" name="program" required>
                            <option value="">Pilih program</option>
                            @foreach ($t['programs'] as $p)
                                <option value="{{ $p['slug'] }}" @selected($selProgram === $p['slug'])>{{ $p['title'] }}</option>
                            @endforeach
                        </select>
                        <small class="field__err" data-err hidden></small>
                    </div>

                    <fieldset class="field plans-pick">
                        <legend>Paket</legend>
                        <div class="plans-pick__grid">
                            @foreach ($t['plans'] as $pl)
                                <label class="radio-card">
                                    <input type="radio" name="plan" value="{{ $pl['key'] }}" @checked($selPlan === $pl['key'])>
                                    <span><strong>{{ $pl['name'] }}</strong><small>Rp {{ number_format($pl['price'], 0, ',', '.') }}{{ $pl['period'] }}</small></span>
                                </label>
                            @endforeach
                        </div>
                    </fieldset>

                    <div class="field">
                        <label for="reg-note">Catatan <span class="muted">(opsional)</span></label>
                        <textarea id="reg-note" name="note" rows="3" placeholder="Tuliskan kebutuhan atau pertanyaanmu"></textarea>
                    </div>

                    <div class="field field--check">
                        <label class="check"><input type="checkbox" name="agree" required><span>Saya setuju data saya digunakan untuk keperluan pendaftaran kursus.</span></label>
                        <small class="field__err" data-err hidden></small>
                    </div>

                    <button class="btn btn--primary btn--lg" type="submit"><i class="bi bi-whatsapp" aria-hidden="true"></i> Kirim via WhatsApp</button>
                    <p class="form__note" role="status" aria-live="polite" data-form-note></p>
                </form>
            </div>

            <aside class="reg__side">
                <img src="{{ $img }}cta-girl.jpg" alt="" width="492" height="540" loading="lazy">
                <h3>{{ $reg['title'] }}</h3>
                <p>{{ $reg['desc'] }}</p>
                <ul class="checklist">@foreach ($reg['perks'] as $perk)<li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>{{ $perk }}</li>@endforeach</ul>
            </aside>
        </div>
    </section>
@endif
