<div class="dock" id="dock">
    <a class="fab fab--wa" href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ urlencode($cfg['site']['whatsapp_text']) }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="fab__ic"><svg class="ic" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
        <span class="fab__label">WhatsApp</span>
    </a>

    <button class="fab fab--ai" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="chatPanel" data-chat-open>
        <span class="fab__bot">
            <img src="{{ asset($cfg['img']['bot']) }}" alt="" width="44" height="44">
            <i class="fab__ring" aria-hidden="true"></i>
            <i class="fab__spark" aria-hidden="true"></i>
        </span>
        <span class="fab__label">AI Chat</span>
    </button>
</div>

<section class="chat-panel" id="chatPanel" role="dialog" aria-label="{{ $cfg['chatbot']['name'] }}" hidden>
    <header class="chat-panel__head">
        <img src="{{ asset($cfg['img']['bot']) }}" alt="" width="42" height="42">
        <div>
            <strong>{{ $cfg['chatbot']['name'] }}</strong>
            <small><i class="dot" aria-hidden="true"></i>{{ $cfg['chatbot']['status'] }}</small>
        </div>
        <button class="icon-btn icon-btn--light" type="button" aria-label="Tutup chat" data-chat-close>
            <svg class="ic" aria-hidden="true"><use href="#i-x"/></svg>
        </button>
    </header>
    @include('website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.partials.chat-box', ['suffix' => 'Float'])
    <footer class="chat-panel__foot">
        <a href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ urlencode($cfg['site']['whatsapp_text']) }}" target="_blank" rel="noopener">
            <svg class="ic" aria-hidden="true"><use href="#i-whatsapp"/></svg> Lanjutkan via WhatsApp
        </a>
    </footer>
</section>
