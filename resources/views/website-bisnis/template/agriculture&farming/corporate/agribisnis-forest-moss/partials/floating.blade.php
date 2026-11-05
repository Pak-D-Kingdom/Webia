<div class="dock" id="dock" data-dock>
    <a class="fab fab--wa" href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ urlencode($cfg['site']['whatsapp_text']) }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="fab__tip"><b>WhatsApp</b><small>Chat langsung dengan tim kami</small></span>
        <span class="fab__ring" aria-hidden="true"></span>
        <span class="fab__core"><svg class="ic" aria-hidden="true"><use href="#i-wa-fill"/></svg></span>
    </a>

    <button class="fab fab--ai" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="chatPanel" data-chat-open aria-label="Buka AI Assistant">
        <span class="fab__tip"><b>AI Assistant</b><small>Tanya seputar komoditas &amp; kemitraan</small></span>
        <span class="fab__ring" aria-hidden="true"></span>
        <span class="fab__core">
            <img src="{{ asset($cfg['img']['bot']) }}" alt="" width="52" height="52">
        </span>
        <span class="fab__online" aria-hidden="true"></span>
        <span class="fab__badge" data-ai-badge aria-hidden="true">1</span>
    </button>
</div>

<section class="chat-panel" id="chatPanel" role="dialog" aria-label="{{ $cfg['chatbot']['name'] }}" hidden>
    <header class="chat-panel__head">
        <span class="chat-panel__av">
            <img src="{{ asset($cfg['img']['bot']) }}" alt="" width="44" height="44">
            <i class="chat-panel__on" aria-hidden="true"></i>
        </span>
        <div>
            <strong>{{ $cfg['chatbot']['name'] }}</strong>
            <small>{{ $cfg['chatbot']['status'] }}</small>
        </div>
        <button class="icon-btn icon-btn--light" type="button" aria-label="Mulai ulang percakapan" title="Mulai ulang" data-chat-reset>
            <svg class="ic" aria-hidden="true"><use href="#i-refresh"/></svg>
        </button>
        <button class="icon-btn icon-btn--light" type="button" aria-label="Tutup chat" title="Tutup" data-chat-close>
            <svg class="ic" aria-hidden="true"><use href="#i-x"/></svg>
        </button>
    </header>
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.chat-box', ['suffix' => 'Float'])
    <footer class="chat-panel__foot">
        <a href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ urlencode($cfg['site']['whatsapp_text']) }}" target="_blank" rel="noopener">
            <svg class="ic" aria-hidden="true"><use href="#i-wa-fill"/></svg> Lanjutkan via WhatsApp
        </a>
    </footer>
</section>
