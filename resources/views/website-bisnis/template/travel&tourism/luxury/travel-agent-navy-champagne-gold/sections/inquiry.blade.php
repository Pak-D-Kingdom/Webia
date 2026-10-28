{{-- Booking inquiry. $mode: 'preview' (form ringkas -> halaman Inquiry) | 'full' (form lengkap -> WhatsApp) --}}
@php
    $brand     = $t['brand'];
    $full      = ($mode ?? 'preview') === 'full';
    $destNames = array_values(array_unique(array_merge(array_column($t['destinations'], 'name'), array_column($t['packages'], 'destination'))));
@endphp

@if (! $full)
    <section class="ga-card ga-cta" aria-labelledby="ga-inq-title">
        <p class="ga-cta__badge">{!! $icon('sparkle') !!}<span>Booking Inquiry</span></p>
        <h2 id="ga-inq-title">Siap berangkat? Rancang perjalanan impian Anda bersama kami.</h2>
        <p class="ga-cta__text">Konsultasikan rencana perjalanan Anda bersama tim kami. Gratis dan tanpa komitmen.</p>
        <ol class="ga-cta__steps">
            <li><span class="ga-cta__num">1</span><span><strong>Isi form inquiry</strong>Pilih destinasi, paket, dan tanggal keberangkatan.</span></li>
            <li><span class="ga-cta__num">2</span><span><strong>Konsultasi via WhatsApp</strong>Tim kami menyiapkan penawaran sesuai kebutuhan Anda.</span></li>
            <li><span class="ga-cta__num">3</span><span><strong>Siap berangkat</strong>Uang muka 30% untuk mengamankan kursi Anda.</span></li>
        </ol>
        <a class="ga-btn ga-btn--dark" href="{{ $url('inquiry') }}">Isi Booking Inquiry {!! $icon('arrow') !!}</a>
    </section>
@else
    <section class="ga-block" aria-label="Form booking inquiry">
        <div class="ga-container ga-inqfull">
            <aside class="ga-inqfull__info">
                <h2>Rancang perjalanan bersama kami</h2>
                <p>Ceritakan destinasi dan tanggal impian Anda. Tim GrandJourney menghubungi Anda lewat WhatsApp untuk menyusun penawaran.</p>
                <ul class="ga-checks ga-checks--light">
                    <li>{!! $icon('check') !!}<span>Penawaran personal sesuai anggaran</span></li>
                    <li>{!! $icon('check') !!}<span>Uang muka 30% untuk mengamankan kursi</span></li>
                    <li>{!! $icon('check') !!}<span>Bantuan visa dan dokumen perjalanan</span></li>
                </ul>
                <ul class="ga-contact">
                    <li>{!! $icon('phone') !!}<span>{{ $brand['phone'] }}</span></li>
                    <li>{!! $icon('mail') !!}<span>{{ $brand['email'] }}</span></li>
                    <li>{!! $icon('whatsapp') !!}<span>{{ $brand['whatsapp_display'] }}</span></li>
                </ul>
            </aside>

            <form class="ga-card ga-form" novalidate data-inquiry-form data-wa="{{ $brand['whatsapp'] }}">
                <div class="ga-field">
                    <label for="f-nama">Nama lengkap <abbr title="wajib">*</abbr></label>
                    <input id="f-nama" name="nama" type="text" required autocomplete="name" placeholder="Nama sesuai identitas">
                    <p class="ga-err" data-error-for="nama" hidden></p>
                </div>
                <div class="ga-field">
                    <label for="f-email">Email <abbr title="wajib">*</abbr></label>
                    <input id="f-email" name="email" type="email" required autocomplete="email" placeholder="nama@email.com">
                    <p class="ga-err" data-error-for="email" hidden></p>
                </div>
                <div class="ga-field">
                    <label for="f-wa">No. WhatsApp <abbr title="wajib">*</abbr></label>
                    <input id="f-wa" name="whatsapp" type="tel" inputmode="tel" required autocomplete="tel" placeholder="08xxxxxxxxxx">
                    <p class="ga-err" data-error-for="whatsapp" hidden></p>
                </div>
                <div class="ga-field">
                    <label for="f-peserta">Jumlah peserta</label>
                    <input id="f-peserta" name="peserta" type="number" min="1" max="50" value="2" inputmode="numeric">
                </div>
                <div class="ga-field">
                    <label for="f-dest">Destinasi <abbr title="wajib">*</abbr></label>
                    <select id="f-dest" name="destinasi" required>
                        <option value="">Pilih destinasi</option>
                        @foreach ($destNames as $n)<option value="{{ $n }}">{{ $n }}</option>@endforeach
                        <option value="Rancang sendiri">Rancang paket sendiri</option>
                    </select>
                    <p class="ga-err" data-error-for="destinasi" hidden></p>
                </div>
                <div class="ga-field">
                    <label for="f-paket">Paket tour</label>
                    <select id="f-paket" name="paket">
                        <option value="">Belum menentukan</option>
                        @foreach ($t['packages'] as $p)<option value="{{ $p['name'] }}">{{ $p['name'] }} — {{ $p['duration'] }}</option>@endforeach
                        @foreach ($t['price_plans'] as $pl)<option value="{{ $pl['label'] }}">{{ $pl['label'] }}</option>@endforeach
                    </select>
                </div>
                <div class="ga-field ga-field--wide">
                    <label for="f-tgl">Tanggal keberangkatan</label>
                    <select id="f-tgl" name="tanggal">
                        <option value="">Belum menentukan</option>
                        @foreach ($t['schedules'] as $s)
                            @if ($s['status'] !== 'penuh')<option value="{{ $s['iso'] }}">{{ $s['label'] }} — {{ $s['destination'] }}</option>@endif
                        @endforeach
                    </select>
                </div>
                <div class="ga-field ga-field--wide">
                    <label for="f-catatan">Catatan</label>
                    <textarea id="f-catatan" name="catatan" rows="4" maxlength="500" placeholder="Anggaran, preferensi hotel, atau permintaan khusus"></textarea>
                </div>

                <div class="ga-form__foot">
                    <p class="ga-form__status" role="status" data-form-status></p>
                    <button class="ga-btn ga-btn--gold" type="submit">Kirim Inquiry via WhatsApp {!! $icon('arrow') !!}</button>
                </div>
            </form>
        </div>
    </section>
@endif
