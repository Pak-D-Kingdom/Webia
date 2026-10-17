@php($b = $cafe['booking'])
{{-- Statis: data dikirim lewat WhatsApp. JS juga memicu event "lm:reservation" (detail = data form) untuk backend. --}}
<div class="lm-card lm-reserve__card">
    <p class="lm-eyebrow">{{ $b['eyebrow'] }}</p>
    <h2 class="lm-card__title">{{ $b['title'] }}</h2>
    <p class="lm-muted">{{ $b['form_text'] }}</p>

    <form class="lm-form" id="reservasi-form" data-wa="{{ $cafe['contact']['whatsapp'] }}" data-brand="{{ $cafe['brand']['title'] }}">
        <div class="lm-form__row">
            <label class="lm-field">Nama
                <span class="lm-input"><svg class="i" aria-hidden="true"><use href="#i-user"/></svg>
                    <input type="text" name="nama" required maxlength="60" autocomplete="name" placeholder="Nama lengkap"></span>
            </label>
            <label class="lm-field">No. WhatsApp
                <span class="lm-input"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg>
                    <input type="tel" name="telepon" required inputmode="tel" maxlength="18" pattern="[0-9+ \-]{8,18}" autocomplete="tel" placeholder="08xx xxxx xxxx"></span>
            </label>
        </div>

        <div class="lm-form__row">
            <label class="lm-field">Tanggal
                <span class="lm-input"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg>
                    <input type="date" name="tanggal" required></span>
            </label>
            <label class="lm-field">Jam
                <span class="lm-input"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg>
                    <input type="time" name="jam" required min="07:00" max="22:00" value="19:00"></span>
            </label>
        </div>

        <label class="lm-field">Jumlah tamu
            <span class="lm-input"><svg class="i" aria-hidden="true"><use href="#i-users"/></svg>
                <select name="tamu">
                    @for ($n = 1; $n <= $b['max_guests']; $n++)
                        <option value="{{ $n }}" @selected($n === 2)>{{ $n }} orang</option>
                    @endfor
                </select></span>
        </label>

        <label class="lm-field">Catatan (opsional)
            <span class="lm-input lm-input--area"><svg class="i" aria-hidden="true"><use href="#i-edit"/></svg>
                <textarea name="catatan" rows="3" maxlength="240" placeholder="Contoh: area outdoor, kursi bayi, acara ulang tahun"></textarea></span>
        </label>

        <button class="lm-btn lm-btn--gold lm-btn--block" type="submit">
            <svg class="i" aria-hidden="true"><use href="#i-wa-fill"/></svg> Kirim via WhatsApp
        </button>

        <div class="lm-form__status" role="status" hidden></div>
    </form>
</div>
