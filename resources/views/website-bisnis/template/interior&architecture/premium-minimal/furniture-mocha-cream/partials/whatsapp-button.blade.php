{{-- Floating WhatsApp (bagian dari wadah .fm-fabs bersama tombol AI) --}}
<div class="fm-fabs" data-fm-fabs>
    <a class="fm-wa" href="https://wa.me/{{ $cfg['contact']['whatsapp'] }}?text={{ rawurlencode($cfg['contact']['whatsapp_greeting']) }}"
       target="_blank" rel="noopener" aria-label="Chat WhatsApp {{ $cfg['brand']['name'] }}">
        <span class="fm-wa__ring" aria-hidden="true"></span>
        <span class="fm-wa__icon"><svg class="fm-i" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
        <span class="fm-wa__txt">WhatsApp</span>
    </a>
    {{-- tombol AI dirender oleh partial ai-chatbot-button agar tetap satu wadah --}}
    @include($ns.'.partials.ai-chatbot-fab')
</div>
