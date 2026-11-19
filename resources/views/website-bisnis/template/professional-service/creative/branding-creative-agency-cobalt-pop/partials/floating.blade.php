<div class="bca-float" data-bca-float>
    <button type="button" class="bca-fab bca-fab--chat" aria-expanded="false" aria-controls="bca-chat" aria-label="Buka asisten chat" data-bca-chat-toggle>
        <span class="bca-fab__icon"><span class="bca-spark">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'spark'])</span></span>
        <span class="bca-fab__label">Tanya ide kami</span>
    </button>
    <a class="bca-fab bca-fab--wa" href="https://wa.me/{{ $site['whatsapp']['number'] }}?text={{ rawurlencode($site['whatsapp']['message']) }}" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp ke {{ $site['whatsapp']['display'] }}">
        <span class="bca-fab__icon">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'whatsapp'])</span>
        <span class="bca-fab__label">Chat WhatsApp</span>
    </a>
</div>

<section class="bca-chat" id="bca-chat" data-bca-chat hidden role="dialog" aria-label="{{ $site['chatbot']['name'] }}">
    <header class="bca-chat__head">
        <span class="bca-chat__logo" aria-hidden="true">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'spark'])</span>
        <div><strong>{{ $site['chatbot']['name'] }}</strong><small>Jawaban otomatis, bukan tim sungguhan</small></div>
        <button type="button" class="bca-chat__x" data-bca-chat-close aria-label="Tutup chat">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'close'])</button>
    </header>
    <div class="bca-chat__log" data-bca-chat-log role="log" aria-live="polite"></div>
    <div class="bca-chat__quick" data-bca-chat-quick>
        @foreach($site['chatbot']['quick'] as $q)
            <button type="button" data-bca-quick="{{ $q }}">{{ $q }}</button>
        @endforeach
    </div>
    <form class="bca-chat__form" data-bca-chat-form autocomplete="off">
        <label class="bca-sr" for="bca-chat-input">Tulis pesan</label>
        <input class="bca-input" id="bca-chat-input" type="text" placeholder="Tulis pertanyaan Anda…" maxlength="200" data-bca-chat-input>
        <button type="submit" class="bca-chat__send" aria-label="Kirim">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'send'])</button>
    </form>
</section>

<script type="application/json" id="bca-chat-data">{!! json_encode($site['chatbot'], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
