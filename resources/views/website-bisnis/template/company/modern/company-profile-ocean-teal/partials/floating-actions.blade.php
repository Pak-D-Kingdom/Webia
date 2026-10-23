@php
    $wa = $z['whatsapp'];
    $a  = $z['ai_faq'];
    $waUrl = 'https://wa.me/'.$wa['number'].'?text='.rawurlencode($wa['message']);
@endphp
<div class="ot-fabs">
    {{-- Floating WhatsApp --}}
    <a class="ot-wa" href="{{ $waUrl }}" target="_blank" rel="noopener" aria-label="{{ $wa['label'] }}">
        <span class="ot-wa__label">{{ $wa['label'] }}</span>
        <span class="ot-wa__icon"><svg class="ot-ic" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
    </a>

    {{-- Floating AI Chatbot --}}
    <button class="ot-ai" type="button" data-open="chat" data-ai-fab aria-label="Buka {{ $a['title'] }}" aria-controls="ot-chat">
        <span class="ot-ai__tip" role="tooltip">{{ $a['tip'] }}</span>
        <span class="ot-ai__ring" aria-hidden="true"></span>
        <span class="ot-ai__avatar"><img src="{{ $img('mascot.png') }}" alt="" width="64" height="64"></span>
        <span class="ot-ai__badge" aria-hidden="true">AI</span>
        <span class="ot-ai__dot" aria-hidden="true"></span>
    </button>
</div>
