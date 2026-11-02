{{-- Tombol melayang: WhatsApp + AI Chat (maskot Nusa AI) + panel chat --}}
@php
    $waHref = 'https://wa.me/' . $c['contact']['whatsapp'] . '?text=' . rawurlencode($c['contact']['whatsapp_text']);
@endphp
<div class="fab-stack">
    <div class="fab-teaser" data-fab-teaser hidden>
        <span>Halo! Ada yang bisa dibantu? Tanya <strong>Nusa AI</strong></span>
        <button type="button" data-fab-teaser-close aria-label="Tutup sapaan">
            <svg class="ic ic--xs" aria-hidden="true"><use href="#i-close"/></svg>
        </button>
    </div>

    <a class="fab fab--wa" href="{{ $waHref }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="fab__ico"><svg class="ic ic--fill" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
        <span class="fab__label">WhatsApp</span>
    </a>

    <button type="button" class="fab fab--ai" data-chat-open aria-haspopup="dialog" aria-expanded="false" aria-controls="chat-panel" aria-label="Buka AI Chat Nusa AI">
        <span class="fab__avatar">
            <img src="{{ $img('nusa-ai-avatar.png') }}" alt="" width="56" height="56">
            <i class="fab__dot" aria-hidden="true"></i>
        </span>
        <span class="fab__label">AI Chat</span>
    </button>
</div>

<div class="chat-panel" id="chat-panel" data-chat-panel role="dialog" aria-label="Nusa AI — asisten logistik" hidden>
    @include($vb . 'partials.chat-window', ['chatClosable' => true])
</div>
