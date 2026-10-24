@php
    $wa = 'https://wa.me/'.$t['contact']['whatsapp'].'?text='.rawurlencode($t['contact']['whatsapp_text']);
@endphp

{{-- Floating WhatsApp: tombol berbentuk daun, label muncul saat hover/fokus --}}
<a class="wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
    <span class="wa__icon"><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
    <span class="wa__label">Chat WhatsApp</span>
</a>

{{-- AI Property Assistant (FAQ) --}}
<div class="ai" data-ai data-faq="{{ json_encode($t['faq'], JSON_UNESCAPED_UNICODE) }}" data-fallback="{{ $t['faq_fallback'] }}" data-wa="{{ $wa }}">
    <p class="ai__tip" data-ai-tip aria-hidden="true">Tanya soal properti? Saya bantu!</p>

    <section class="ai__panel" id="ai-panel" role="dialog" aria-label="AI Property Assistant" aria-hidden="true" data-ai-panel>
        <header class="ai__head">
            @include($ns.'partials.mascot')
            <div>
                <h2 class="ai__title">AI Property Assistant</h2>
                <p class="ai__sub">Tanyakan apa saja tentang properti ini!</p>
            </div>
            <button class="ai__close" type="button" aria-label="Tutup asisten" data-ai-close><svg class="i" aria-hidden="true"><use href="#i-close"/></svg></button>
        </header>

        <div class="ai__log" data-ai-log role="log" aria-live="polite"></div>

        <div class="ai__chips" data-ai-chips>
            @foreach (array_slice($t['faq'], 0, 3) as $f)
                <button type="button" class="chip" data-q="{{ $f['q'] }}">{{ $f['q'] }}</button>
            @endforeach
        </div>

        <form class="ai__form" data-ai-form autocomplete="off">
            <label class="sr-only" for="ai-input">Pertanyaan Anda</label>
            <input id="ai-input" type="text" placeholder="Tulis pertanyaan Anda..." maxlength="200">
            <button type="submit" aria-label="Kirim pertanyaan"><svg class="i" aria-hidden="true"><use href="#i-send"/></svg></button>
        </form>
    </section>

    <button class="ai__btn" type="button" aria-label="Buka AI Property Assistant" aria-expanded="false" aria-controls="ai-panel" data-ai-toggle>
        @include($ns.'partials.mascot')
    </button>
</div>
