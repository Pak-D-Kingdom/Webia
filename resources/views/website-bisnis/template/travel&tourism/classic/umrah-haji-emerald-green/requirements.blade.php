@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Persyaratan Pendaftaran — Nur Rahmat Travel')
@section('description', 'Dokumen dan langkah pendaftaran umrah dan haji bersama Nur Rahmat Travel.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'requirements'])

    <section class="uh-section">
        <div class="uh-container uh-split uh-split--even">
            <section class="uh-card uh-reqcard" data-uh-checklist aria-labelledby="uh-req-title">
                <header class="uh-reqcard__head">
                    <h2 id="uh-req-title" class="uh-card__title">Daftar dokumen</h2>
                    <p class="uh-card__sub">Centang dokumen yang sudah Anda siapkan.</p>
                </header>
                <div class="uh-progress" role="progressbar" aria-label="Kesiapan dokumen" aria-valuemin="0" aria-valuemax="{{ count($uh['requirements']['items']) }}" aria-valuenow="0" data-uh-progress>
                    <span class="uh-progress__bar" data-uh-progress-bar></span>
                </div>
                <p class="uh-progress__text"><span data-uh-progress-count>0</span> dari {{ count($uh['requirements']['items']) }} dokumen siap</p>
                <ul class="uh-reqlist">
                    @foreach ($uh['requirements']['items'] as $r)
                        <li>
                            <label class="uh-req">
                                <input type="checkbox" class="uh-req__input" data-uh-check>
                                <span class="uh-req__box" aria-hidden="true"><svg class="uh-i"><use href="#i-check"/></svg></span>
                                <span class="uh-req__text">
                                    <strong>{{ $r['label'] }}</strong>
                                    <small>{{ $r['note'] }}</small>
                                </span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </section>

            <aside class="uh-card uh-steps" aria-labelledby="uh-steps-title">
                <h2 id="uh-steps-title" class="uh-card__title">Langkah pendaftaran</h2>
                <ol class="uh-steps__list">
                    @foreach ($uh['requirements']['steps'] as $i => $s)
                        <li>
                            <span class="uh-steps__n">{{ $i + 1 }}</span>
                            <div>
                                <h3>{{ $s['title'] }}</h3>
                                <p>{{ $s['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
                <a class="uh-btn uh-btn--gold uh-btn--block" href="{{ $wa($uh['requirements']['wa_register']) }}" target="_blank" rel="noopener noreferrer">
                    <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                    <span>Daftar via WhatsApp</span>
                </a>
            </aside>
        </div>
    </section>

    <section class="uh-section uh-section--tight" id="daftar">
        <div class="uh-container">
            <div class="uh-card uh-regform">
                <div class="uh-regform__intro">
                    <span class="uh-eyebrow">{{ $uh['requirements']['form']['eyebrow'] }}</span>
                    <h2 class="uh-regform__title">{{ $uh['requirements']['form']['title'] }}</h2>
                    <p class="uh-regform__text">{{ $uh['requirements']['form']['text'] }}</p>
                    <ul class="uh-checklist">
                        @foreach ($uh['requirements']['form']['points'] as $pt)
                            <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg><span>{{ $pt }}</span></li>
                        @endforeach
                    </ul>
                    <p class="uh-regform__wa"><svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>Dikirim ke <strong>{{ $uh['brand']['phone_display'] }}</strong></p>
                </div>

                <form class="uh-form" data-uh-waform novalidate action="{{ $url('requirements') }}" method="get">
                    <div class="uh-form__grid">
                        <div class="uh-field">
                            <label for="uh-f-name">Nama lengkap <em>*</em></label>
                            <input id="uh-f-name" name="name" type="text" autocomplete="name" placeholder="Sesuai paspor / KTP" required data-uh-required="Nama lengkap wajib diisi" minlength="3">
                            <p class="uh-field__msg" data-uh-msg hidden></p>
                        </div>
                        <div class="uh-field">
                            <label for="uh-f-phone">Nomor WhatsApp <em>*</em></label>
                            <input id="uh-f-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="Contoh: 0812-3456-7890" required data-uh-required="Nomor WhatsApp wajib diisi">
                            <p class="uh-field__msg" data-uh-msg hidden></p>
                        </div>
                        <div class="uh-field">
                            <label id="uh-f-package-label" for="uh-f-package">Pilihan paket <em>*</em></label>
                            <select id="uh-f-package" class="uh-native" name="package" data-uh-select required data-uh-required="Silakan pilih paket">
                                <option value="">Pilih paket</option>
                                @foreach ($uh['packages'] as $pkg)
                                    <option value="{{ $pkg['name'] }}">{{ $pkg['name'] }} · {{ $pkg['price'] }}</option>
                                @endforeach
                            </select>
                            <p class="uh-field__msg" data-uh-msg hidden></p>
                        </div>
                        <div class="uh-field">
                            <label id="uh-f-date-label" for="uh-f-date">Jadwal keberangkatan</label>
                            <select id="uh-f-date" class="uh-native" name="date" data-uh-select>
                                <option value="">Belum menentukan</option>
                                @foreach ($uh['schedules'] as $row)
                                    @if ($row['tone'] !== 'full')
                                        <option value="{{ $row['date'] }} · {{ $row['package'] }}">{{ $row['date'] }} · {{ $row['package'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="uh-field">
                            <label for="uh-f-pax">Jumlah jemaah</label>
                            <div class="uh-stepper" data-uh-stepper>
                                <button type="button" class="uh-stepper__btn" data-step="-1" aria-label="Kurangi jumlah jemaah">−</button>
                                <input id="uh-f-pax" name="pax" type="number" inputmode="numeric" min="1" max="50" value="1">
                                <button type="button" class="uh-stepper__btn" data-step="1" aria-label="Tambah jumlah jemaah">+</button>
                            </div>
                        </div>
                        <div class="uh-field uh-field--full">
                            <label for="uh-f-note">Catatan (opsional)</label>
                            <textarea id="uh-f-note" name="note" rows="3" maxlength="400" placeholder="Misalnya: berangkat bersama orang tua, butuh kursi roda, atau pertanyaan lain."></textarea>
                        </div>
                    </div>
                    <button type="submit" class="uh-btn uh-btn--wa uh-btn--block uh-btn--lg">
                        <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                        <span>Kirim via WhatsApp</span>
                    </button>
                    <p class="uh-form__hint">WhatsApp akan terbuka dengan pesan yang sudah terisi. Anda tinggal menekan kirim.</p>
                </form>
            </div>
        </div>
    </section>
@endsection
