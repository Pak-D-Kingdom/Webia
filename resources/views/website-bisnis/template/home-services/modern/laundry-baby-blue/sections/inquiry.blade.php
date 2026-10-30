@php
    $mode = $mode ?? 'preview';
    $uid  = 'iq' . \Illuminate\Support\Str::lower(\Illuminate\Support\Str::random(4));
@endphp
<article class="lb-card lb-inquiry {{ $mode === 'full' ? 'lb-card--lg' : '' }}" aria-labelledby="{{ $uid }}-title">
    <header class="lb-card__head">
        <span class="lb-card__icon"><svg class="lb-i" aria-hidden="true"><use href="#i-chat"/></svg></span>
        <div><h2 class="lb-card__title" id="{{ $uid }}-title">@if ($mode === 'preview')<a href="{{ route('webia.laundry-baby-blue.order-inquiry') }}">Order Inquiry</a>@else Order Inquiry @endif</h2><p class="lb-card__sub">Konsultasi atau konfirmasi order Anda.</p></div>
    </header>

    <form class="lb-form lb-form--{{ $mode }}" data-lb-inquiry novalidate>
        <div class="lb-form__grid">
            <div class="lb-form__cell">
                <label class="lb-field" for="{{ $uid }}-nama"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-user"/></svg>
                    <input id="{{ $uid }}-nama" name="nama" type="text" placeholder="Nama Lengkap" autocomplete="name" maxlength="80" required></label>
                <small class="lb-field__err" data-err-for="nama" hidden></small>
            </div>
            <div class="lb-form__cell">
                <label class="lb-field" for="{{ $uid }}-wa"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                    <input id="{{ $uid }}-wa" name="wa" type="tel" inputmode="tel" placeholder="No. WhatsApp" autocomplete="tel" maxlength="20" required></label>
                <small class="lb-field__err" data-err-for="wa" hidden></small>
            </div>
            <div class="lb-form__cell">
                <label class="lb-field lb-field--select" for="{{ $uid }}-layanan"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-tag"/></svg>
                    <select id="{{ $uid }}-layanan" name="layanan" required>
                        <option value="">Pilih Layanan</option>
                        @foreach ($laundry['inquiry_services'] as $opt)<option value="{{ $opt }}">{{ $opt }}</option>@endforeach
                    </select><svg class="lb-i lb-field__chev" aria-hidden="true"><use href="#i-chevron"/></svg></label>
                <small class="lb-field__err" data-err-for="layanan" hidden></small>
            </div>

            @if ($mode === 'full')
                <div class="lb-form__cell">
                    <label class="lb-field lb-field--select" for="{{ $uid }}-area"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-pin"/></svg>
                        <select id="{{ $uid }}-area" name="area">
                            <option value="">Area Penjemputan (opsional)</option>
                            @foreach ($laundry['areas'] as $a)<option value="{{ $a['name'] }}">{{ $a['name'] }}</option>@endforeach
                        </select><svg class="lb-i lb-field__chev" aria-hidden="true"><use href="#i-chevron"/></svg></label>
                </div>
                <div class="lb-form__cell lb-form__cell--full">
                    <label class="lb-field" for="{{ $uid }}-alamat"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-truck"/></svg>
                        <input id="{{ $uid }}-alamat" name="alamat" type="text" placeholder="Alamat Penjemputan (opsional)" autocomplete="street-address" maxlength="160"></label>
                </div>
                <div class="lb-form__cell">
                    <label class="lb-field" for="{{ $uid }}-tgl"><svg class="lb-i lb-field__ico" aria-hidden="true"><use href="#i-calendar"/></svg>
                        <input id="{{ $uid }}-tgl" name="jadwal" type="datetime-local" aria-label="Jadwal jemput (opsional)"></label>
                </div>
                <div class="lb-form__cell lb-form__cell--full">
                    <label class="lb-field lb-field--area" for="{{ $uid }}-catatan">
                        <textarea id="{{ $uid }}-catatan" name="catatan" rows="3" placeholder="Catatan (jumlah kg/pcs, bahan khusus, dll.)" maxlength="300"></textarea></label>
                </div>
            @endif

            <div class="lb-form__cell lb-form__cell--submit">
                <button class="lb-btn lb-btn--primary lb-btn--block" type="submit"><span>Kirim Inquiry</span><svg class="lb-i" aria-hidden="true"><use href="#i-send"/></svg></button>
            </div>
        </div>
        <p class="lb-form__note" data-lb-form-msg role="status" aria-live="polite" hidden></p>
        @if ($mode === 'full')
            <p class="lb-form__hint">Inquiry akan dibuka di WhatsApp BlueLaundry agar tim kami dapat langsung mengonfirmasi order Anda.</p>
        @endif
    </form>
</article>
