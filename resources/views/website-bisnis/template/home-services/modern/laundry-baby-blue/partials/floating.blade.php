@php $waLink = 'https://wa.me/' . $contact['whatsapp'] . '?text=' . rawurlencode($contact['wa_greeting']); @endphp
<div class="lb-float" data-lb-float>
    <a class="lb-fab lb-fab--wa" href="{{ $waLink }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="lb-fab__ring" aria-hidden="true"></span>
        <span class="lb-fab__ico"><svg class="lb-i" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
        <span class="lb-fab__label">WhatsApp</span>
    </a>

    @unless ($slug === 'ai-chatbot')
    <button class="lb-fab lb-fab--ai" type="button" data-lb-chat-open aria-haspopup="dialog" aria-controls="lbChat" aria-expanded="false" aria-label="Buka AI Chat">
        <span class="lb-fab__hint" aria-hidden="true">Tanya aku, yuk!</span>
        <span class="lb-fab__bubbles" aria-hidden="true"><i></i><i></i><i></i><i></i></span>
        <span class="lb-fab__robot" aria-hidden="true"><img src="{{ $lbAsset('img', 'ai-robot-head.png') }}" alt="" width="52" height="32"></span>
        <span class="lb-fab__label">AI Chat</span>
        <span class="lb-fab__dot" aria-hidden="true"></span>
    </button>
    @endunless
</div>
