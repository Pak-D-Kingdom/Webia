{{-- Tombol melayang: WhatsApp (daun) + AI Chat (maskot penjelajah) + panel AI --}}
<div class="ta-fabs" data-ta-fabs>
    <a class="ta-fab ta-fab--wa"
       href="https://wa.me/{{ $cfg['contact']['whatsapp'] }}?text={{ rawurlencode($cfg['contact']['wa_greeting']) }}"
       target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="ta-fab__leaf" aria-hidden="true"><svg class="ta-i ta-i--fill"><use href="#i-whatsapp"/></svg></span>
        <span class="ta-fab__label">WhatsApp</span>
    </a>

    <button class="ta-fab ta-fab--ai" type="button" data-ta-ai-toggle aria-expanded="false" aria-controls="ta-ai-panel" aria-label="Buka AI Chat">
        <span class="ta-fab__bubble" data-ta-ai-hint aria-hidden="true">Tanya GreenTrip AI!</span>
        <span class="ta-fab__avatar" aria-hidden="true">
            <img src="{{ $img('mascot.jpg') }}" alt="" width="52" height="52">
            <i class="ta-fab__ring"></i>
        </span>
        <span class="ta-fab__label">AI Chat</span>
    </button>
</div>

<section class="ta-ai-panel" id="ta-ai-panel" role="dialog" aria-modal="false" aria-label="AI Travel Assistant" data-ta-ai-panel hidden>
    <header class="ta-ai-panel__head">
        <span class="ta-ai-panel__avatar"><img src="{{ $img('mascot.jpg') }}" alt="" width="44" height="44"></span>
        <div class="ta-ai-panel__title">
            <strong>{{ $cfg['ai']['title'] }}</strong>
            <small><i class="ta-dot"></i> FAQ destinasi & paket</small>
        </div>
        <button class="ta-iconbtn ta-iconbtn--light" type="button" data-ta-ai-close aria-label="Tutup AI Chat"><svg class="ta-i" aria-hidden="true"><use href="#i-x"/></svg></button>
    </header>
    @include($ns . '.partials.ai-chat', ['variant' => 'panel', 'cid' => 'chat-panel'])
    <footer class="ta-ai-panel__foot">
        <a href="https://wa.me/{{ $cfg['contact']['whatsapp'] }}?text={{ rawurlencode($cfg['contact']['wa_greeting']) }}" target="_blank" rel="noopener">
            <svg class="ta-i ta-i--fill" aria-hidden="true"><use href="#i-whatsapp"/></svg>Bicara dengan tim kami
        </a>
    </footer>
</section>
