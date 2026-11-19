{{-- Variabel: $kind ('konsultasi' | 'penawaran'). Definisi ada di config: forms.{kind} --}}
<form class="abd-form" data-wa-form="{{ $kind }}" data-intro="{{ $site['forms'][$kind]['intro'] }}" novalidate data-reveal>
    <header class="abd-form__head">
        <span class="abd-form__ico" aria-hidden="true"><svg class="i"><use href="#i-{{ $site['forms'][$kind]['icon'] }}"/></svg></span>
        <div><h2>{{ $site['forms'][$kind]['title'] }}</h2><p>{{ $site['forms'][$kind]['hint'] }}</p></div>
    </header>
    <div class="abd-progress" aria-hidden="true"><span class="abd-progress__bar"><i data-progress></i></span><span class="abd-progress__txt" data-progress-text>0% terisi</span></div>

    @foreach ($site['forms'][$kind]['sections'] as $sec)
        <fieldset class="abd-fset">
            <legend><span class="abd-fset__n">{{ $loop->iteration }}</span>{{ $sec['title'] }}</legend>
            <div class="abd-fields">
                @foreach ($sec['fields'] as $fld)
                    @include($v . '.partials.field', ['f' => $fld, 'idp' => $kind])
                @endforeach
            </div>
        </fieldset>
    @endforeach

    <details class="abd-preview">
        <summary><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Pratinjau pesan WhatsApp</span><svg class="i abd-preview__chev" aria-hidden="true"><use href="#i-chevron"/></svg></summary>
        <pre data-preview>Isi formulir untuk melihat pratinjau pesan.</pre>
    </details>

    <button type="submit" class="abd-btn abd-btn--primary abd-btn--block abd-submit">
        <svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>{{ $site['forms'][$kind]['submit'] }}</span>
    </button>
    <p class="abd-form__note"><svg class="i" aria-hidden="true"><use href="#i-lock"/></svg>Data Anda dikirim langsung ke WhatsApp {{ $site['brand']['name'] }} dan tidak disimpan di situs ini.</p>

    <div class="abd-done" data-done hidden role="status">
        <span class="abd-done__ico" aria-hidden="true"><svg class="i"><use href="#i-check"/></svg></span>
        <div><strong>WhatsApp sedang dibuka</strong><p>Kirim pesan yang sudah terisi untuk menyelesaikan permintaan Anda. Jika tidak terbuka, gunakan tombol di bawah.</p>
        <a class="abd-btn abd-btn--primary abd-btn--sm" data-done-link href="#" target="_blank" rel="noopener noreferrer"><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Buka WhatsApp</span></a></div>
    </div>
</form>
