{{-- Floating WhatsApp + AI Chat (maskot robot dari desain UI) --}}
@php
    $wa = 'https://wa.me/' . $ta['contact']['whatsapp'] . '?text=' . rawurlencode('Halo ' . $ta['brand']['name'] . ', saya ingin bertanya tentang paket tour.');
@endphp
<div class="ta-dock" data-ta-dock>
    <div class="ta-hint" data-ta-hint hidden role="status">
        <button class="ta-hint__close" type="button" data-ta-hint-close aria-label="Tutup saran">{{ $icon('close') }}</button>
        <p>Bingung pilih destinasi? <strong>Tanya saya!</strong></p>
    </div>

    <a class="ta-fab ta-fab--wa" href="{{ $wa }}" target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp">
        <span class="ta-fab__ring" aria-hidden="true"></span>
        <span class="ta-fab__badge" aria-hidden="true">{{ $icon('whatsapp-solid', 'ta-ic--solid') }}</span>
        <span class="ta-fab__txt"><strong>WhatsApp</strong><small>Chat sekarang</small></span>
    </a>

    <button class="ta-fab ta-fab--ai" type="button" data-ta-chat-open aria-haspopup="dialog" aria-controls="ta-chat" aria-expanded="false" aria-label="Buka AI Chat">
        <span class="ta-fab__avatar" aria-hidden="true">
            <img src="{{ $img('mascot-ai.jpg') }}" alt="" width="66" height="66">
            <span class="ta-fab__tag">AI</span>
        </span>
        <span class="ta-fab__txt"><strong>AI Chat</strong><small>Tanya destinasi</small></span>
        <span class="ta-fab__spark ta-fab__spark--1" aria-hidden="true">{{ $icon('sparkle') }}</span>
        <span class="ta-fab__spark ta-fab__spark--2" aria-hidden="true">{{ $icon('sparkle') }}</span>
    </button>
</div>
