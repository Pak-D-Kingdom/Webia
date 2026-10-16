@php($b = $cafe['booking'])
{{-- Statis: data dikirim lewat WhatsApp. JS juga memicu event "lm:reservation" (detail = data form) untuk backend. --}}
<div class="lm-card lm-reserve__card">
    <p class="lm-eyebrow">{{ $b['eyebrow'] }}</p>
    <h2 class="lm-card__title">{{ $b['title'] }}</h2>
    <p class="lm-muted">{{ $b['form_text'] }}</p>

    <form class="lm-form" id="reservasi-form" data-wa="{{ $cafe['contact']['whatsapp'] }}" data-brand="{{ $cafe['brand']['title'] }}">
        <div class="lm-form__row">
            <label class="lm-field">Nama
                <input type="text" name="nama" required maxlength="60" autocomplete="name">
            </label>
            <label class="lm-field">No. WhatsApp
                <input type="tel" name="telepon" required inputmode="tel" maxlength="18" pattern="[0-9+ \-]{8,18}" autocomplete="tel" placeholder="08xx xxxx xxxx">
            </label>
        </div>

        <div class="lm-form__row">
            <label class="lm-field">Tanggal
                <input type="date" name="tanggal" required>
            </label>
            <label class="lm-field">Jam
                <input type="time" name="jam" required min="07:00" max="22:00" value="19:00">
            </label>
        </div>

        <label class="lm-field">Jumlah tamu
            <select name="tamu">
                @for ($n = 1; $n <= $b['max_guests']; $n++)
                    <option value="{{ $n }}" @selected($n === 2)>{{ $n }} orang</option>
                @endfor
            </select>
        </label>

        <label class="lm-field">Catatan (opsional)
            <textarea name="catatan" rows="3" maxlength="240" placeholder="Contoh: area outdoor, kursi bayi, acara ulang tahun"></textarea>
        </label>

        <button class="lm-btn lm-btn--gold" type="submit">
            <svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg> Kirim via WhatsApp
        </button>

        <div class="lm-form__status" role="status" hidden></div>
    </form>
</div>
