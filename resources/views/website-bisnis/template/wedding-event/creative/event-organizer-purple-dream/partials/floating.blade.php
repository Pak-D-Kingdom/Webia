<div class="eo-float" data-eo-float>
    <div class="eo-ai-hint" data-eo-chat-hint hidden>
        <button type="button" class="eo-ai-hint__close" data-eo-hint-close aria-label="Tutup sapaan"><svg class="eo-i" aria-hidden="true"><use href="#i-close"/></svg></button>
        <p>Ada pertanyaan seputar event? <strong>Tanya AI kami</strong></p>
    </div>

    <a class="eo-wa" href="https://wa.me/{{ $eo['whatsapp']['number'] }}?text={{ rawurlencode($eo['whatsapp']['greeting']) }}" target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp">
        <span class="eo-wa__icon"><i class="eo-wa__ring"></i><i class="eo-wa__ring eo-wa__ring--2"></i><svg class="eo-i" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
        <span class="eo-wa__label">WhatsApp</span>
    </a>

    <button class="eo-ai-fab" type="button" data-eo-chat-open aria-label="Buka AI Chat" aria-expanded="false" aria-controls="eo-chat">
        <span class="eo-ai-fab__bot">
            <img src="{{ asset($eo['assets']['img']) }}/robot-head.svg" alt="" width="34" height="35">
            <i class="eo-ai-fab__spark eo-ai-fab__spark--1"></i><i class="eo-ai-fab__spark eo-ai-fab__spark--2"></i>
        </span>
        <span class="eo-ai-fab__label">AI Chat</span>
        <i class="eo-ai-fab__dot" aria-hidden="true"></i>
    </button>
</div>

<section class="eo-chat eo-chat--float" id="eo-chat" data-eo-chat="float" role="dialog" aria-label="AI Chatbot {{ $eo['brand']['name'] }}" hidden>
    @include($eo['view'].'partials.chat-body', ['chatid' => 'float'])
</section>
