@php
    $f = $furniture;
    $ai = $f['ai'];
    $wa = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode('Halo ' . $f['brand']['name'] . ', saya ingin bertanya tentang produk / kustomisasi furniture.');
@endphp

{{-- Defs maskot "Luxe" (gradien dipakai oleh semua instance) --}}
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
    <defs>
        <radialGradient id="lfb-face" cx="40%" cy="30%" r="80%"><stop offset="0" stop-color="#fffaf1"/><stop offset=".6" stop-color="#efe0c8"/><stop offset="1" stop-color="#cdb18a"/></radialGradient>
        <linearGradient id="lfb-cap" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#efdcbc"/><stop offset="1" stop-color="#bd9d70"/></linearGradient>
        <linearGradient id="lfb-visor" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#3b3a3c"/><stop offset="1" stop-color="#0d0c0d"/></linearGradient>
        <linearGradient id="lfb-brass" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#f1cf99"/><stop offset="1" stop-color="#a1722d"/></linearGradient>
        <symbol id="lf-bot-static" viewBox="0 0 100 100">
            <path d="M52 15c2-8 8-10 13-7" fill="none" stroke="#3a2a20" stroke-width="3" stroke-linecap="round"/>
            <circle cx="12" cy="58" r="9" fill="url(#lfb-brass)"/><circle cx="88" cy="58" r="9" fill="url(#lfb-brass)"/>
            <ellipse cx="50" cy="54" rx="38" ry="34" fill="url(#lfb-face)"/>
            <path d="M13 48C13 24 31 13 51 13c21 0 37 12 37 35-14-8-60-8-75 0z" fill="url(#lfb-cap)"/>
            <rect x="37" y="21" width="28" height="9" rx="4.5" fill="#2b2420"/>
            <rect x="19" y="41" width="62" height="38" rx="19" fill="url(#lfb-visor)"/>
            <ellipse cx="37" cy="59" rx="6.5" ry="8.5" fill="#0a0c10" stroke="#c4f1f6" stroke-width="2.2"/>
            <ellipse cx="63" cy="59" rx="6.5" ry="8.5" fill="#0a0c10" stroke="#c4f1f6" stroke-width="2.2"/>
            <path d="M44 71q6 4 12 0" fill="none" stroke="#8fd3dc" stroke-width="1.8" stroke-linecap="round"/>
        </symbol>
    </defs>
</svg>

<button class="lf-ai" type="button" data-chat-open aria-controls="lf-chat" aria-expanded="false" aria-label="Buka {{ $ai['title'] }}">
    <span class="lf-ai__bubble" data-ai-bubble aria-hidden="true">{{ $ai['bubble'] }}</span>
    <span class="lf-ai__bot" aria-hidden="true">
        <span class="lf-ai__halo"></span>
        <svg viewBox="0 0 100 100" class="lf-bot">
            <g class="lf-bot__antenna"><path d="M52 15c2-8 8-10 13-7" fill="none" stroke="#3a2a20" stroke-width="3" stroke-linecap="round"/><circle cx="65" cy="8" r="3" fill="#e7c08d"/></g>
            <circle cx="12" cy="58" r="9" fill="url(#lfb-brass)"/><circle cx="88" cy="58" r="9" fill="url(#lfb-brass)"/>
            <ellipse cx="50" cy="54" rx="38" ry="34" fill="url(#lfb-face)"/>
            <path d="M13 48C13 24 31 13 51 13c21 0 37 12 37 35-14-8-60-8-75 0z" fill="url(#lfb-cap)"/>
            <rect x="37" y="21" width="28" height="9" rx="4.5" fill="#2b2420"/>
            <rect x="19" y="41" width="62" height="38" rx="19" fill="url(#lfb-visor)"/>
            <g class="lf-bot__eyes">
                <ellipse cx="37" cy="59" rx="6.5" ry="8.5" fill="#0a0c10" stroke="#c4f1f6" stroke-width="2.2"/>
                <ellipse cx="63" cy="59" rx="6.5" ry="8.5" fill="#0a0c10" stroke="#c4f1f6" stroke-width="2.2"/>
                <ellipse cx="38.5" cy="56" rx="1.8" ry="2.6" fill="#e8fdff"/>
                <ellipse cx="64.5" cy="56" rx="1.8" ry="2.6" fill="#e8fdff"/>
            </g>
            <path d="M44 71q6 4 12 0" fill="none" stroke="#8fd3dc" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
    </span>
    <span class="lf-ai__label">AI Chat</span>
</button>

<section class="lf-chat" id="lf-chat" role="dialog" aria-modal="false" aria-label="Chat dengan {{ $ai['name'] }}" hidden>
    <header class="lf-chat__head">
        <span class="lf-chat__avatar" aria-hidden="true"><svg viewBox="0 0 100 100"><use href="#lf-bot-static"/></svg></span>
        <div class="lf-chat__who">
            <strong>{{ $ai['name'] }}</strong>
            <small><i aria-hidden="true"></i> AI Assistant &middot; FAQ produk &amp; kustomisasi</small>
        </div>
        <button type="button" class="lf-chat__close" data-chat-close aria-label="Tutup chat"><svg class="ic"><use href="#i-close"/></svg></button>
    </header>

    <div class="lf-chat__log" data-chat-log role="log" aria-live="polite"></div>

    <div class="lf-chat__chips" data-chat-chips></div>

    <form class="lf-chat__form" data-chat-form autocomplete="off">
        <label class="lf-sr" for="lf-chat-input">Tulis pertanyaan Anda</label>
        <input id="lf-chat-input" type="text" name="q" placeholder="Tanya soal produk atau custom..." maxlength="200" required>
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="ic"><use href="#i-send"/></svg></button>
    </form>

    <a class="lf-chat__wa" href="{{ $wa }}" target="_blank" rel="noopener">
        <svg class="ic"><use href="#i-whatsapp"/></svg> Lanjut ngobrol dengan tim via WhatsApp
    </a>
</section>
