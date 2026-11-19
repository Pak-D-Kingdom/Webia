@if ($page !== 'chat')
    @include($v . '.partials.chat', ['mode' => 'float'])
@endif

<div class="uh-fab" aria-label="Bantuan cepat">
    <a class="uh-fab__btn uh-fab__btn--wa" href="{{ $wa($d['contact']['wa_text']) }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="uh-fab__ring" aria-hidden="true"></span>
        <svg class="uh-ico" aria-hidden="true"><use href="#i-whatsapp"/></svg>
        <span class="uh-fab__label">WhatsApp</span>
    </a>
    <button type="button" class="uh-fab__btn uh-fab__btn--ai" data-chat-open aria-label="Buka AI Chat">
        <span class="uh-fab__ring" aria-hidden="true"></span>
        <span class="uh-fab__bot"><img src="{{ $img('bot.svg') }}" alt="" width="40" height="40"></span>
        <span class="uh-fab__label">AI Chat</span>
    </button>
</div>
