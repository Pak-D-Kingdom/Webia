@php
    $c  = $site['contact'];
    $wa = 'https://wa.me/' . $c['whatsapp'] . '?text=' . rawurlencode($c['whatsapp_text']);
@endphp
<div class="lc-float" data-lc-float>
    <a class="lc-fab lc-fab--wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
        <span class="lc-fab__ring" aria-hidden="true"></span>
        <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-whatsapp"></use></svg>
        <span class="lc-fab__label">WhatsApp</span>
    </a>

    <button class="lc-fab lc-fab--ai" type="button" aria-label="Buka AI Assistant" aria-expanded="false" aria-controls="lc-chat" data-lc-chat-open>
        <span class="lc-fab__bot" aria-hidden="true">@include($site['view'] . '.partials.bot-face')</span>
        <span class="lc-fab__label">AI Chat</span>
        <span class="lc-fab__ping" aria-hidden="true"></span>
    </button>
</div>

@include($site['view'] . '.partials.chat-panel', ['inline' => false])
