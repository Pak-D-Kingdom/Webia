@php
    $r     = $cafe['reservation'];
    $viaWa = ($r['send_to'] ?? 'whatsapp') === 'whatsapp';
@endphp
<section class="kl-panel kl-reserve" id="form-reservasi" aria-labelledby="kl-reserve-title">
    <h2 class="kl-panel__title kl-panel__title--icon" id="kl-reserve-title">
        <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-calendar"/></svg>
        <span>{{ $r['title'] }}</span>
    </h2>
    <p class="kl-panel__text">{{ $r['text'] }}</p>

    <div class="kl-reserve__success" data-kl-success role="status" tabindex="-1" hidden>
        <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-check"/></svg>
        <div>
            <p>{{ $r['success'] }}</p>
            <a class="kl-reserve__link" data-kl-success-link href="#" target="_blank" rel="noopener" hidden>{{ $r['success_link'] }}</a>
        </div>
    </div>

    <form class="kl-form" action="{{ $r['action'] }}" method="{{ $r['method'] }}" novalidate
          data-kl-reservation data-time-min="{{ $r['time_min'] }}" data-time-max="{{ $r['time_max'] }}" data-max-guests="{{ $r['max_guests'] }}"
          @if ($viaWa)
              data-kl-wa="https://wa.me/{{ $cafe['contact']['wa_number'] }}"
              data-kl-wa-title="{{ $r['wa_title'] }}"
          @endif>
        @csrf

        <div class="kl-field">
            <label for="kl-nama">Nama lengkap</label>
            <input class="kl-input" id="kl-nama" name="nama" type="text" autocomplete="name" required minlength="3" aria-describedby="kl-err-nama">
            <p class="kl-field__error" id="kl-err-nama" data-kl-error="nama"></p>
        </div>

        <div class="kl-field">
            <label for="kl-telepon">Nomor WhatsApp</label>
            <input class="kl-input" id="kl-telepon" name="telepon" type="tel" inputmode="tel" autocomplete="tel" placeholder="0812 3456 7890" required aria-describedby="kl-err-telepon">
            <p class="kl-field__error" id="kl-err-telepon" data-kl-error="telepon"></p>
        </div>

        <div class="kl-field">
            <label for="kl-tanggal">Tanggal</label>
            <input class="kl-input" id="kl-tanggal" name="tanggal" type="date" required aria-describedby="kl-err-tanggal">
            <p class="kl-field__error" id="kl-err-tanggal" data-kl-error="tanggal"></p>
        </div>

        <div class="kl-field">
            <label for="kl-jam">Jam</label>
            <input class="kl-input" id="kl-jam" name="jam" type="time" min="{{ $r['time_min'] }}" max="{{ $r['time_max'] }}" required aria-describedby="kl-err-jam">
            <p class="kl-field__hint">Jam reservasi {{ str_replace(':', '.', $r['time_min']) }} – {{ str_replace(':', '.', $r['time_max']) }}</p>
            <p class="kl-field__error" id="kl-err-jam" data-kl-error="jam"></p>
        </div>

        <div class="kl-field">
            <label for="kl-tamu">Jumlah tamu</label>
            <input class="kl-input" id="kl-tamu" name="tamu" type="number" min="1" max="{{ $r['max_guests'] }}" value="2" inputmode="numeric" required aria-describedby="kl-err-tamu">
            <p class="kl-field__error" id="kl-err-tamu" data-kl-error="tamu"></p>
        </div>

        <div class="kl-field kl-field--full">
            <label for="kl-catatan">Catatan <span class="kl-field__opt">(opsional)</span></label>
            <textarea class="kl-input" id="kl-catatan" name="catatan" rows="3" maxlength="300" placeholder="Mis. area dekat jendela, kursi bayi, atau acara ulang tahun"></textarea>
        </div>

        <div class="kl-field kl-field--full">
            <button class="kl-btn kl-btn--red" type="submit">
                <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-calendar"/></svg>
                <span>{{ $r['submit'] }}</span>
            </button>
        </div>
    </form>
</section>
